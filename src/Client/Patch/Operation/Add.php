<?php

declare(strict_types=1);

namespace Kcs\K8s\Client\Patch\Operation;

use function array_merge;

class Add extends AbstractOperation
{
    public function __construct(string $path, private mixed $value)
    {
        parent::__construct(
            'add',
            $path,
        );
    }

    /** @return $this */
    public function setValue(mixed $value): static
    {
        $this->value = $value;

        return $this;
    }

    public function getValue(): array|string
    {
        return $this->value;
    }

    public function toArray(): array
    {
        return array_merge(
            parent::toArray(),
            ['value' => $this->value],
        );
    }
}
