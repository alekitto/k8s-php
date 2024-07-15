<?php

declare(strict_types=1);

namespace Kcs\K8s\Client\Websocket\Contract;

use Kcs\K8s\Client\Websocket\ExecConnection;

interface ContainerExecInterface
{
    /**
     * Triggered when the connection is initially opened.
     */
    public function onOpen(ExecConnection $connection): void;

    /**
     * Triggered once the connection is closed.
     */
    public function onClose(): void;

    /**
     * Triggered when data is received on a specific channel.
     */
    public function onReceive(Channel $channel, string $data, ExecConnection $connection): void;
}
