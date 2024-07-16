<?php

declare(strict_types=1);

namespace Kcs\K8s\Client\Http;

use Kcs\K8s\Client\Websocket\WebsocketClientFactory;
use Kcs\K8s\Contract\ApiInterface;

readonly class Api implements ApiInterface
{
    public function __construct(
        private HttpClient $httpClient,
        private WebsocketClientFactory $websocketClientFactory,
        private UriBuilder $uriBuilder,
    ) {
    }

    /** @inheritDoc */
    public function executeHttp(string $uri, string $action, array $options): mixed
    {
        return $this->httpClient->send($uri, $action, $options);
    }

    /** @inheritDoc */
    public function executeWebsocket(string $uri, string $type, $handler): void
    {
        $wsClient = $this->websocketClientFactory->factory();

        $wsClient->connect($uri, $type, $handler);
    }

    /** @inheritDoc */
    public function buildUri(string $uri, array $parameters, array $query = [], string|null $namespace = null): string
    {
        return $this->uriBuilder->buildUri(
            $uri,
            $parameters,
            $query,
            $namespace,
        );
    }
}
