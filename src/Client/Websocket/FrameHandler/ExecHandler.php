<?php

declare(strict_types=1);

namespace Kcs\K8s\Client\Websocket\FrameHandler;

use Closure;
use Kcs\K8s\Client\Websocket\Contract\Channel;
use Kcs\K8s\Client\Websocket\Contract\ContainerExecInterface;
use Kcs\K8s\Client\Websocket\ExecConnection;
use Kcs\K8s\Exception\WebsocketException;
use Kcs\K8s\Websocket\Contract\FrameHandlerInterface;
use Kcs\K8s\Websocket\Contract\WebsocketConnectionInterface;
use Kcs\K8s\Websocket\Frame;

use function ord;
use function sprintf;
use function substr;

readonly class ExecHandler implements FrameHandlerInterface
{
    public function __construct(private Closure|ContainerExecInterface $receiver)
    {
    }

    public function onReceive(Frame $frame, WebsocketConnectionInterface $connection): void
    {
        $data = $frame->payload;
        $channelNum = $data[0] ?? null;
        if ($channelNum === null) {
            throw new WebsocketException('Unable to determine the protocol channel from the data.');
        }

        $channel = Channel::tryFrom(ord($channelNum));
        if ($channel === null) {
            throw new WebsocketException(sprintf(
                'The channel number %s is not recognized.',
                $channelNum,
            ));
        }

        $execConn = new ExecConnection($connection);
        $data = substr($data, 1);

        if ($this->receiver instanceof Closure) {
            ($this->receiver)($channel, $data, $execConn);
        } else {
            $this->receiver->onReceive(
                $channel,
                $data,
                $execConn,
            );
        }
    }

    public function onConnect(WebsocketConnectionInterface $connection): void
    {
        if (! ($this->receiver instanceof ContainerExecInterface)) {
            return;
        }

        $this->receiver->onOpen(new ExecConnection($connection));
    }

    public function onClose(): void
    {
        if (! ($this->receiver instanceof ContainerExecInterface)) {
            return;
        }

        $this->receiver->onClose();
    }

    public function subprotocol(): string
    {
        return 'channel.k8s.io';
    }
}
