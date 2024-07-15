<?php

declare(strict_types=1);

namespace Kcs\K8s\Client\Websocket\Contract;

interface PortChannelInterface
{
    /**
     * The type of channel. Either "data" or "error".
     */
    public function getType(): ChannelType;

    /**
     * The port number for this channel.
     */
    public function getPortNumber(): int;

    /**
     * The underlying channel number the port channel.
     */
    public function getChannelNumber(): int;

    /**
     * Close the websocket connection for the port-forward.
     */
    public function close(): void;

    /**
     * Write data to the channel. Only possible for channel type "data".
     */
    public function write(string $data): void;
}
