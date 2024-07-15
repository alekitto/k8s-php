<?php

declare(strict_types=1);

namespace Kcs\K8s\Client\Patch\Operation;

use function array_merge;

class Move extends AbstractOperation
{
    public function __construct(private string $from, string $to)
    {
        parent::__construct(
            'move',
            $to,
        );
    }

    public function toArray(): array
    {
        return array_merge(
            parent::toArray(),
            ['from' => $this->from],
        );
    }

    public function getFrom(): string
    {
        return $this->from;
    }

    public function setFrom(string $from): static
    {
        $this->from = $from;

        return $this;
    }
}
