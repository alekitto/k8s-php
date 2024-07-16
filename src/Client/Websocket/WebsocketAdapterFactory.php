<?php

declare(strict_types=1);

namespace Kcs\K8s\Client\Websocket;

use Kcs\K8s\Client\Exception\RuntimeException;
use Kcs\K8s\Client\KubeConfig\ContextConfigFactory;
use Kcs\K8s\Client\Options;
use Kcs\K8s\Websocket\Contract\WebsocketClientInterface;

use function class_exists;

readonly class WebsocketAdapterFactory
{
    private const ADAPTERS = [
        'K8s\WsRatchet\RatchetWebsocketAdapter',
        'K8s\WsSwoole\CoroutineAdapter',
    ];

    public function __construct(
        private Options $options,
        private ContextConfigFactory $configFactory,
        private array $adapterClasses = self::ADAPTERS,
    ) {
    }

    public function factory(): WebsocketClientInterface
    {
        if ($this->options->getWebsocketClient()) {
            return $this->options->getWebsocketClient();
        }

        if ($this->options->getWebsocketClientFactory()) {
            return $this->options->getWebsocketClientFactory()
                ->factory($this->configFactory->contextConfig());
        }

        foreach ($this->adapterClasses as $adapter) {
            if (class_exists($adapter)) {
                return new $adapter();
            }
        }

        throw new RuntimeException(
            'To use Kubernetes API requests that require websockets, you must install a websocket library. See this libraries documentation for more information.',
        );
    }
}
