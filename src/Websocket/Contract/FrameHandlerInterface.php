<?php

declare(strict_types=1);

namespace Kcs\K8s\Websocket\Contract;

use Kcs\K8s\Websocket\Frame;

interface FrameHandlerInterface
{
    /**
     * Triggered on the initial connection
     */
    public function onConnect(WebsocketConnectionInterface $connection): void;

    /**
     * Triggered when the connection is closed.
     */
    public function onClose(): void;

    /**
     * Triggered when data is received on the connection.
     */
    public function onReceive(Frame $frame, WebsocketConnectionInterface $connection): void;

    /**
     * The sub-protocol used by the handler.
     */
    public function subprotocol(): string;
}
