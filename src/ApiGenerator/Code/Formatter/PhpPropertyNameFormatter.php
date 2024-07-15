<?php

declare(strict_types=1);

namespace Kcs\K8s\ApiGenerator\Code\Formatter;

use function lcfirst;
use function str_contains;
use function str_replace;
use function ucwords;

readonly class PhpPropertyNameFormatter
{
    public function format(string $propertyName): string
    {
        $propertyName = str_replace('$', '', $propertyName);

        if (str_contains($propertyName, '-')) {
            $propertyName = ucwords($propertyName, '-');
            $propertyName = lcfirst($propertyName);
            $propertyName = str_replace('-', '', $propertyName);
        }

        return $propertyName;
    }
}
