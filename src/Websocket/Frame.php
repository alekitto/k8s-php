<?php

declare(strict_types=1);

namespace Kcs\K8s\Websocket;

readonly class Frame
{
    public function __construct(
        public int $opcode,
        public int $payloadLength,
        public string $payload,
    ) {
    }
}
