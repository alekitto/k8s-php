<?php

declare(strict_types=1);

namespace Kcs\K8s\Client\Patch;

use Kcs\K8s\Client\Patch\Contract\OperationInterface;
use Kcs\K8s\Client\Patch\Operation\Add;
use Kcs\K8s\Client\Patch\Operation\Copy;
use Kcs\K8s\Client\Patch\Operation\Move;
use Kcs\K8s\Client\Patch\Operation\Remove;
use Kcs\K8s\Client\Patch\Operation\Replace;
use Kcs\K8s\Client\Patch\Operation\Test;
use Kcs\K8s\PatchInterface;

use function array_map;

class JsonPatch implements PatchInterface
{
    /** @param OperationInterface[] $operations */
    public function __construct(private array $operations = [])
    {
    }

    /** @inheritDoc */
    public function toArray(): array
    {
        return array_map(static function (OperationInterface $operation) {
            return $operation->toArray();
        }, $this->operations);
    }

    public function getContentType(): string
    {
        return 'application/json-patch+json';
    }

    /** @return OperationInterface[] */
    public function getOperations(): array
    {
        return $this->operations;
    }

    public function add(string $path, mixed $value): self
    {
        $this->operations[] = new Add($path, $value);

        return $this;
    }

    public function remove(string $path): self
    {
        $this->operations[] = new Remove($path);

        return $this;
    }

    public function replace(string $path, mixed $value): self
    {
        $this->operations[] = new Replace($path, $value);

        return $this;
    }

    public function copy(string $from, string $to): self
    {
        $this->operations[] = new Copy($from, $to);

        return $this;
    }

    public function move(string $from, string $to): self
    {
        $this->operations[] = new Move($from, $to);

        return $this;
    }

    public function test(string $path, mixed $value): self
    {
        $this->operations[] = new Test($path, $value);

        return $this;
    }
}
