<?php

declare(strict_types=1);

namespace Kcs\K8s\Client\Websocket;

use Kcs\K8s\Client\Http\RequestFactory;
use Kcs\K8s\Client\Websocket\Contract\PortForwardInterface;
use Kcs\K8s\Client\Websocket\FrameHandler\ExecHandler;
use Kcs\K8s\Client\Websocket\FrameHandler\PortForwardHandler;
use Kcs\K8s\Exception\WebsocketException;
use Kcs\K8s\Websocket\Contract\WebsocketClientInterface;
use Psr\Http\Message\RequestInterface;

use function explode;
use function sprintf;

readonly class WebsocketClient
{
    public function __construct(
        private WebsocketClientInterface $adapter,
        private RequestFactory $requestFactory,
    ) {
    }

    public function connect(string $uri, string $type, mixed $handler): void
    {
        $request = $this->requestFactory->build($uri, 'connect');
        $request = $request->withUri(
            $request->getUri()->withScheme('wss'),
        );

        switch ($type) {
            case 'exec':
                $frameHandler = new ExecHandler($handler);
                break;
            case 'portforward':
                $frameHandler = $this->createPortForwardHandler(
                    $request,
                    $handler,
                );
                break;
            default:
                throw new WebsocketException(sprintf(
                    'The websocket action type "%s" is not currently supported.',
                    $type,
                ));
        }

        $this->adapter->connect(
            $request,
            $frameHandler,
        );
    }

    private function createPortForwardHandler(RequestInterface $request, callable|PortForwardInterface $handler): PortForwardHandler
    {
        $query = $request->getUri()->getQuery();
        $ports = $this->parsePortsFromQueryString($query);

        return new PortForwardHandler(
            $handler,
            $ports,
        );
    }

    private function parsePortsFromQueryString(string $query): array
    {
        $ports = [];

        $pairs = explode('&', $query);
        foreach ($pairs as $pair) {
            [$name, $value] = explode('=', $pair, 2);
            if ($name !== 'ports') {
                continue;
            }

            if (isset($ports[$value])) {
                continue;
            }

            $ports[] = (int) $value;
        }

        return $ports;
    }
}
