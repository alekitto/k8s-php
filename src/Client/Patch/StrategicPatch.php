<?php

declare(strict_types=1);

namespace Kcs\K8s\Client\Patch;

use Kcs\K8s\PatchInterface;

readonly class StrategicPatch implements PatchInterface
{
    public function __construct(private array $data)
    {
    }

    /** @inheritDoc */
    public function toArray(): array
    {
        return $this->data;
    }

    public function getContentType(): string
    {
        return 'application/strategic-merge-patch+json';
    }
}
