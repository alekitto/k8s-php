<?php

declare(strict_types=1);

namespace Kcs\K8s\Contract;

use Kcs\K8s\Websocket\Contract\WebsocketClientInterface;

interface WebsocketClientFactoryInterface
{
    /**
     * Make an instance of the Websocket Client based on a specific Kubernetes context configuration.
     */
    public function makeClient(ContextConfigInterface $fullContext): WebsocketClientInterface;
}
