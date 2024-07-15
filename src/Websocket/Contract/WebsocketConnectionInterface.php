<?php

declare(strict_types=1);

namespace Kcs\K8s\Websocket\Contract;

interface WebsocketConnectionInterface
{
    public function close(): void;

    public function send(string $data): void;
}
