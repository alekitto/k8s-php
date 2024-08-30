<?php

declare(strict_types=1);

namespace Kcs\K8s\Client;

use Closure;
use Kcs\K8s\Client\KubeConfig\KubeConfigParser;
use Kcs\K8s\Client\KubeConfig\Model\FullContext;
use Kcs\K8s\Contract\AuthType;
use Kcs\K8s\Contract\HttpClientFactoryInterface;
use Kcs\K8s\Contract\WebsocketClientFactoryInterface;
use Kcs\K8s\Websocket\Contract\WebsocketClientInterface;
use Psr\Cache\CacheItemPoolInterface;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\StreamFactoryInterface;
use Psr\Http\Message\UriFactoryInterface;

use function call_user_func;
use function class_exists;
use function file_get_contents;
use function filter_var;
use function getenv;
use function is_callable;

use const FILTER_FLAG_IPV6;
use const FILTER_VALIDATE_IP;

class Options
{
    private const SERVICE_TOKENFILE = '/var/run/secrets/kubernetes.io/serviceaccount/token';
    private const SERVICE_CERTFILE = '/var/run/secrets/kubernetes.io/serviceaccount/ca.crt';
    private const SERVICE_DEFAULT_NS = '/var/run/secrets/kubernetes.io/serviceaccount/namespace';

    private CacheItemPoolInterface|null $cache = null;

    private ClientInterface|null $httpClient = null;

    private WebsocketClientInterface|null $websocketClient = null;

    private RequestFactoryInterface|null $httpRequestFactory = null;

    private StreamFactoryInterface|null $streamFactory = null;

    private UriFactoryInterface|null $uriFactory = null;

    private string|Closure|null $token = null;

    private string|null $username = null;

    private string|null $password = null;

    private AuthType $authType = AuthType::Token;

    private FullContext|null $configContext = null;

    private string|null $serverCertificateAuthority = null;

    private HttpClientFactoryInterface|null $httpClientFactory = null;
    private WebsocketClientFactoryInterface|null $websocketClientFactory = null;

    public function __construct(
        private string $endpoint,
        private string $namespace = 'default',
    ) {
    }

    public static function inCluster(): self
    {
        $uri = 'https://kubernetes.default.svc/';
        if (($host = getenv('KUBERNETES_SERVICE_HOST')) && ($port = (int) getenv('KUBERNETES_SERVICE_PORT'))) {
            if (filter_var($host, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6)) {
                $host = '[' . $host . ']';
            }

            $uri = $port === 443 ? 'https://' . $host : 'https://' . $host . ':' . $port;
        }

        $defaultNamespace = file_get_contents(self::SERVICE_DEFAULT_NS) ?: 'default';

        $opts = new self($uri, $defaultNamespace);
        $opts->setServerCertificateAuthority(self::SERVICE_CERTFILE ?? null);
        $opts->setToken(static fn () => (file_get_contents(self::SERVICE_TOKENFILE) ?: null));
        $opts->setAuthType(AuthType::Token);

        $opts->initFactories();

        return $opts;
    }

    public static function fromKubeconfigFile(string $filename): self
    {
        return self::fromKubeconfig(file_get_contents($filename));
    }

    public static function fromKubeconfig(string $kubeConfig): self
    {
        $kubeConfigParser = new KubeConfigParser();
        $context = $kubeConfigParser->parse($kubeConfig);

        $fullContext = $context->getFullContext();

        $opts = new self($fullContext->getServer(), $fullContext->getNamespace() ?? 'default');
        $opts->setAuthType($fullContext->getAuthType());
        $opts->setKubeConfigContext($fullContext);
        $opts->initFactories();

        return $opts;
    }

    public function getEndpoint(): string
    {
        return $this->endpoint;
    }

    public function setEndpoint(string $endpoint): self
    {
        $this->endpoint = $endpoint;

        return $this;
    }

    public function getNamespace(): string
    {
        return $this->namespace;
    }

    public function setNamespace(string $namespace): self
    {
        $this->namespace = $namespace;

        return $this;
    }

    public function setCache(CacheItemPoolInterface $cache): self
    {
        $this->cache = $cache;

        return $this;
    }

    public function getCache(): CacheItemPoolInterface|null
    {
        return $this->cache;
    }

    public function setHttpClient(ClientInterface $client): self
    {
        $this->httpClient = $client;

        return $this;
    }

    public function getHttpClient(): ClientInterface|null
    {
        return $this->httpClient;
    }

    public function setHttpUriFactory(UriFactoryInterface $uriFactory): self
    {
        $this->uriFactory = $uriFactory;

        return $this;
    }

    public function getHttpUriFactory(): UriFactoryInterface|null
    {
        return $this->uriFactory;
    }

    public function getHttpRequestFactory(): RequestFactoryInterface|null
    {
        return $this->httpRequestFactory;
    }

    public function setHttpRequestFactory(RequestFactoryInterface $httpRequestFactory): self
    {
        $this->httpRequestFactory = $httpRequestFactory;

        return $this;
    }

    public function getStreamFactory(): StreamFactoryInterface|null
    {
        return $this->streamFactory;
    }

    public function setStreamFactory(StreamFactoryInterface $streamFactory): self
    {
        $this->streamFactory = $streamFactory;

        return $this;
    }

    public function getToken(): string|null
    {
        if (is_callable($this->token)) {
            return call_user_func($this->token);
        }

        return $this->token;
    }

    public function setToken(string|callable $token): self
    {
        $this->token = is_callable($token) ? $token(...) : $token;

        return $this;
    }

    public function getAuthType(): AuthType
    {
        return $this->authType;
    }

    public function setAuthType(AuthType $authType): self
    {
        $this->authType = $authType;

        return $this;
    }

    public function getUsername(): string|null
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getPassword(): string|null
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getWebsocketClient(): WebsocketClientInterface|null
    {
        return $this->websocketClient;
    }

    public function setWebsocketClient(WebsocketClientInterface $websocketClient): self
    {
        $this->websocketClient = $websocketClient;

        return $this;
    }

    public function getKubeConfigContext(): FullContext|null
    {
        return $this->configContext;
    }

    public function setKubeConfigContext(FullContext $context): self
    {
        $this->configContext = $context;

        return $this;
    }

    public function getHttpClientFactory(): HttpClientFactoryInterface|null
    {
        return $this->httpClientFactory;
    }

    public function setHttpClientFactory(HttpClientFactoryInterface $httpClientFactory): self
    {
        $this->httpClientFactory = $httpClientFactory;

        return $this;
    }

    public function getWebsocketClientFactory(): WebsocketClientFactoryInterface|null
    {
        return $this->websocketClientFactory;
    }

    public function setWebsocketClientFactory(WebsocketClientFactoryInterface $websocketClientFactory): self
    {
        $this->websocketClientFactory = $websocketClientFactory;

        return $this;
    }

    public function getServerCertificateAuthority(): string|null
    {
        return $this->serverCertificateAuthority;
    }

    public function setServerCertificateAuthority(string|null $serverCertificateAuthority): self
    {
        $this->serverCertificateAuthority = $serverCertificateAuthority;

        return $this;
    }

    private function initFactories(): void
    {
        foreach (K8sFactory::HTTPCLIENT_FACTORIES as $clientFactory) {
            if (! $clientFactory::isAvailable()) {
                continue;
            }

            $this->setHttpClientFactory(new $clientFactory());
            break;
        }

        foreach (K8sFactory::WEBSOCKET_FACTORIES as $websocketFactory) {
            if (! class_exists($websocketFactory)) {
                continue;
            }

            $this->setWebsocketClientFactory(new $websocketFactory());
            break;
        }
    }
}
