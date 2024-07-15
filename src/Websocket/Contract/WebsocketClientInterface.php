<?php

declare(strict_types=1);

namespace Kcs\K8s\Websocket\Contract;

use Kcs\K8s\Exception\WebsocketException;
use Psr\Http\Message\RequestInterface;

interface WebsocketClientInterface
{
    /** @throws WebsocketException */
    public function connect(RequestInterface $request, FrameHandlerInterface $payloadHandler): void;
}
