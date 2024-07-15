<?php

declare(strict_types=1);

namespace Kcs\K8s\Client\Websocket\FrameHandler;

use Closure;
use Kcs\K8s\Client\Exception\RuntimeException;
use Kcs\K8s\Client\Websocket\Contract\ChannelType;
use Kcs\K8s\Client\Websocket\Contract\PortChannelInterface;
use Kcs\K8s\Client\Websocket\Contract\PortForwardInterface;
use Kcs\K8s\Client\Websocket\PortChannel;
use Kcs\K8s\Client\Websocket\PortChannels;
use Kcs\K8s\Websocket\Contract\FrameHandlerInterface;
use Kcs\K8s\Websocket\Contract\WebsocketConnectionInterface;
use Kcs\K8s\Websocket\Frame;

use function count;
use function ord;
use function sprintf;
use function strlen;
use function substr;
use function unpack;

class PortForwardHandler implements FrameHandlerInterface
{
    /** @var array<int, PortChannelInterface> */
    private array $initialized = [];

    private PortChannels|null $channels = null;

    /** @param int[] $ports */
    public function __construct(private readonly Closure|PortForwardInterface $handler, private readonly array $ports)
    {
    }

    public function onConnect(WebsocketConnectionInterface $connection): void
    {
    }

    public function onClose(): void
    {
        if (! ($this->handler instanceof PortForwardInterface)) {
            return;
        }

        $this->handler->onClose();
    }

    public function onReceive(Frame $frame, WebsocketConnectionInterface $connection): void
    {
        $data = $frame->payload;
        $channel = ord($data[0]);
        $data = substr($data, 1);

        if ($this->channels === null) {
            $this->initialize($channel, $data, $connection);

            return;
        }

        $portChannel = $this->channels->getByChannel($channel);
        if ($portChannel->getType() === ChannelType::Data) {
            $this->dispatchData($portChannel, $data);
        } else {
            $this->dispatchError($portChannel, $data);
        }
    }

    public function subprotocol(): string
    {
        return 'v4.channel.k8s.io';
    }

    private function initialize(int $channel, string $data, WebsocketConnectionInterface $connection): void
    {
        if (strlen($data) !== 2) {
            throw new RuntimeException(sprintf(
                'Expected 2 bytes for the port number. Received %s.',
                strlen($data),
            ));
        }

        if (isset($this->initialized[$channel])) {
            throw new RuntimeException(sprintf(
                'Port channel %s was already initialized.',
                $channel,
            ));
        }

        $result = unpack('v1port', $data);
        if ($result === false || ! isset($result['port'])) {
            throw new RuntimeException(
                'Unable to determine the channel port number from the received data.',
            );
        }

        $this->initialized[$channel] = new PortChannel(
            $connection,
            $channel,
            $result['port'],
        );

        // We will always have 2 channels per port (data and error) once initialized
        if (count($this->initialized) !== count($this->ports) * 2) {
            return;
        }

        $this->channels = new PortChannels(...$this->initialized);
        if (! ($this->handler instanceof PortForwardInterface)) {
            return;
        }

        $this->handler->onInitialize($this->channels);
    }

    public function dispatchData(PortChannelInterface $portChannel, string $data): void
    {
        if ($this->handler instanceof PortForwardInterface) {
            $this->handler->onDataReceived($data, $portChannel);
        } else {
            ($this->handler)($data, $portChannel);
        }
    }

    public function dispatchError(PortChannelInterface $portChannel, string $data): void
    {
        if ($this->handler instanceof PortForwardInterface) {
            $this->handler->onErrorReceived($data, $portChannel);
        } else {
            ($this->handler)($data, $portChannel);
        }
    }
}
