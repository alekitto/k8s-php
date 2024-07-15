<?php

declare(strict_types=1);

namespace Kcs\K8s\Client\Websocket;

use Kcs\K8s\Client\Websocket\Contract\ChannelType;
use Kcs\K8s\Client\Websocket\Contract\PortChannelInterface;
use Kcs\K8s\Websocket\Contract\WebsocketConnectionInterface;

use function chr;

readonly class PortChannel implements PortChannelInterface
{
    private ChannelType $type;

    public function __construct(private WebsocketConnectionInterface $connection, private int $channel, private int $port)
    {
        $this->type = $channel % 2 ? ChannelType::Error : ChannelType::Data;
    }

    public function getPortNumber(): int
    {
        return $this->port;
    }

    public function close(): void
    {
        $this->connection->close();
    }

    public function write(string $data): void
    {
        $this->connection->send(chr($this->channel) . $data);
    }

    public function getType(): ChannelType
    {
        return $this->type;
    }

    public function getChannelNumber(): int
    {
        return $this->channel;
    }
}
