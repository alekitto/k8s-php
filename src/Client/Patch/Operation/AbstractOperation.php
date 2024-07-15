<?php

declare(strict_types=1);

namespace Kcs\K8s\Client\Patch\Operation;

use Kcs\K8s\Client\Patch\Contract\OperationInterface;

abstract class AbstractOperation implements OperationInterface
{
    public function __construct(protected string $opName, protected string $path)
    {
    }

    public function getOp(): string
    {
        return $this->opName;
    }

    public function getPath(): string
    {
        return $this->path;
    }

    /** @return $this */
    public function setPath(string $path): static
    {
        $this->path = $path;

        return $this;
    }

    public function toArray(): array
    {
        return [
            'op' => $this->opName,
            'path' => $this->path,
        ];
    }
}
