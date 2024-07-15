<?php

declare(strict_types=1);

namespace Kcs\K8s\Client\Patch\Contract;

interface OperationInterface
{
    public function toArray(): array;
}
