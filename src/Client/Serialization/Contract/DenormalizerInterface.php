<?php

declare(strict_types=1);

namespace Kcs\K8s\Client\Serialization\Contract;

interface DenormalizerInterface
{
    /** @param class-string|null $modelFqcn */
    public function denormalize(array $data, string|null $modelFqcn = null): object;
}
