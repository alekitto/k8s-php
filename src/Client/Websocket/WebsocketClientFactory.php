<?php

declare(strict_types=1);

namespace Kcs\K8s\Client\Websocket;

use Kcs\K8s\Client\Exception\RuntimeException;
use Kcs\K8s\Client\Http\RequestFactory;

readonly class WebsocketClientFactory
{
    public function __construct(
        private WebsocketAdapterFactory $adapterFactory,
        private RequestFactory $requestFactory,
    ) {
    }

    /** @throws RuntimeException */
    public function makeClient(): WebsocketClient
    {
        return new WebsocketClient(
            $this->adapterFactory->makeAdapter(),
            $this->requestFactory,
        );
    }
}
