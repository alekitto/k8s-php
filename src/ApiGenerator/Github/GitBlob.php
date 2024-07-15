<?php

declare(strict_types=1);

namespace Kcs\K8s\ApiGenerator\Github;

use function base64_decode;

readonly class GitBlob
{
    /** @param array<string, mixed> $blob */
    public function __construct(private array $blob)
    {
    }

    public function getContent(): string
    {
        return base64_decode($this->blob['content']);
    }
}
