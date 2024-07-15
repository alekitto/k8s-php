<?php

declare(strict_types=1);

namespace Kcs\K8s\Client;

use Kcs\K8s\Client\Exception\RuntimeException;
use Kcs\K8s\Client\KubeConfig\KubeConfigParser;
use Kcs\K8s\Client\KubeConfig\Model\FullContext;
use Kcs\K8s\Contract\HttpClientFactoryInterface;
use Kcs\K8s\Contract\WebsocketClientFactoryInterface;
use Kcs\K8s\Http\Guzzle\ClientFactory as GuzzleClientFactory;
use Kcs\K8s\Symfony\HttpClient\ClientFactory as SymfonyClientFactory;

use function class_exists;
use function file_exists;
use function file_get_contents;
use function getcwd;
use function sprintf;

use const DIRECTORY_SEPARATOR;

class K8sFactory
{
    public const WEBSOCKET_FACTORIES = [
        'Kcs\K8s\WsSwoole\AdapterFactory',
        'Kcs\K8s\WsRatchet\AdapterFactory',
    ];

    public const HTTPCLIENT_FACTORIES = [
        SymfonyClientFactory::class,
        GuzzleClientFactory::class,
    ];

    private const KUBE_CONFIG_PATH =  DIRECTORY_SEPARATOR . '.kube' . DIRECTORY_SEPARATOR . 'config';

    public function __construct(
        private readonly KubeConfigParser $kubeConfigParser = new KubeConfigParser(),
        private HttpClientFactoryInterface|null $httpClientFactory = null,
        private WebsocketClientFactoryInterface|null $websocketClientFactory = null,
    ) {
    }

    /**
     * Set a HttpClientFactory to use when instantiating the K8s client.
     *
     * @return $this
     */
    public function usingHttpClientFactory(HttpClientFactoryInterface $httpClientFactory): self
    {
        $this->httpClientFactory = $httpClientFactory;

        return $this;
    }

    /**
     * Set a WebsocketClientFactory to use when instantiating the K8s client.
     *
     * @return $this
     */
    public function usingWebsocketClientFactory(WebsocketClientFactoryInterface $websocketClientFactory): self
    {
        $this->websocketClientFactory = $websocketClientFactory;

        return $this;
    }

    /**
     * Load the k8s client from the default KubeConfig file. It will load it as follows:
     *
     *   1. If the second parameter for a file path is specified, it will use that.
     *   2. Attempt to load from the current working directory: $CWD/.kube/config).
     *   3. Attempt to load from the default home location: $HOME/.kube/config).
     *
     * @param string|null $contextName A specific context name to use from the config.
     * @param string|null $configFilePath A specific kubeconfig file path. If not provided, it will attempt to find one.
     */
    public function loadFromKubeConfig(
        string|null $contextName = null,
        string|null $configFilePath = null,
    ): K8s {
        return $this->loadFromKubeConfigData(
            $this->getKubeConfigContents($configFilePath),
            $contextName,
        );
    }

    /**
     * Convenience method for loading the config from a specific file path.
     *
     * @param string $configFilePath The full file path to load the kubeconfig from.
     * @param string|null $contextName A specific context name to use from the config.
     */
    public function loadFromKubeConfigFile(
        string $configFilePath,
        string|null $contextName = null,
    ): K8s {
        return $this->loadFromKubeConfig(
            $contextName,
            $configFilePath,
        );
    }

    /**
     * Load the k8s client from any raw YAML string of a KubeConfig file.
     *
     * @param string $kubeConfig The raw YAML string from a KubeConfig file.
     * @param string|null $contextName A specific context name to use from the config.
     */
    public function loadFromKubeConfigData(
        string $kubeConfig,
        string|null $contextName = null,
    ): K8s {
        $kubeConfig = $this->kubeConfigParser->parse($kubeConfig);
        $context = $kubeConfig->getFullContext($contextName);

        return $this->loadFromKubeConfigContext(
            $context,
        );
    }

    /**
     * Load the k8s client from a pre-processed KubeConfig context.
     *
     * @param FullContext $context the full context from the parsed kubeconfig.
     */
    private function loadFromKubeConfigContext(
        FullContext $context,
    ): K8s {
        $options = new Options(
            $context->getServer(),
            $context->getNamespace() ?? 'default',
        );
        $options->setKubeConfigContext($context);

        $httpClientFactory = $this->httpClientFactory;
        if (! $httpClientFactory) {
            foreach (self::HTTPCLIENT_FACTORIES as $clientFactory) {
                if (! $clientFactory::isAvailable()) {
                    continue;
                }

                $httpClientFactory = new $clientFactory();
            }
        }

        if ($httpClientFactory) {
            $options->setHttpClientFactory($httpClientFactory);
        }

        $websocketClientFactory = $this->websocketClientFactory;
        if (! $websocketClientFactory) {
            foreach (self::WEBSOCKET_FACTORIES as $clientFactory) {
                if (! class_exists($clientFactory)) {
                    continue;
                }

                $websocketClientFactory = new $clientFactory();
            }
        }

        if ($websocketClientFactory) {
            $options->setWebsocketClientFactory($websocketClientFactory);
        }

        return K8s::fromOptions($options);
    }

    private function getKubeConfigContents(string|null $configFilePath = null): string
    {
        $defaultConfig = getcwd() . self::KUBE_CONFIG_PATH;
        $homeConfig = ($_SERVER['HOME'] ?? '') . self::KUBE_CONFIG_PATH;

        if ($configFilePath !== null && ! file_exists($configFilePath)) {
            throw new RuntimeException(sprintf(
                'The specified kubeconfig file was not found: %s',
                $configFilePath,
            ));
        }

        if ($configFilePath !== null) {
            $configContents = (string) file_get_contents($configFilePath);
        } elseif (file_exists($defaultConfig)) {
            $configContents = (string) file_get_contents($defaultConfig);
        } elseif (file_exists($homeConfig)) {
            $configContents = (string) file_get_contents($homeConfig);
        } else {
            throw new RuntimeException(sprintf(
                'A kubeconfig file was not found. Checked these paths: %s, %s',
                $defaultConfig,
                $homeConfig,
            ));
        }

        if ($configContents === '') {
            throw new RuntimeException('The kubeconfig file is empty.');
        }

        return $configContents;
    }
}
