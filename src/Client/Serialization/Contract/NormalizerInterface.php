<?php

declare(strict_types=1);

namespace Kcs\K8s\Client\Serialization\Contract;

interface NormalizerInterface
{
    public function normalize(object $model): array;
}
