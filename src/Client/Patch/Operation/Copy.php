<?php

declare(strict_types=1);

namespace Kcs\K8s\Client\Patch\Operation;

use function array_merge;

class Copy extends AbstractOperation
{
    public function __construct(private string $from, string $path)
    {
        parent::__construct(
            'copy',
            $path,
        );
    }

    public function getFrom(): string
    {
        return $this->from;
    }

    /** @return $this */
    public function setFrom(string $from): static
    {
        $this->from = $from;

        return $this;
    }

    public function toArray(): array
    {
        return array_merge(
            parent::toArray(),
            ['from' => $this->from],
        );
    }
}
