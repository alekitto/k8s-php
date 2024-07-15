<?php

declare(strict_types=1);

namespace Kcs\K8s\ApiGenerator\Code\Formatter;

use Kcs\K8s\ApiGenerator\Code\ModelProperty;
use Kcs\K8s\ApiGenerator\Parser\Metadata\ParameterMetadata;

use function sprintf;
use function ucfirst;

readonly class PhpMethodNameFormatter
{
    public function formatModelProperty(ModelProperty $property, string $mode): string
    {
        $prefix = $this->getPrefix($property->isBool(), $mode);

        return $this->makeFinalName($prefix, $property->getPhpPropertyName());
    }

    public function formatQueryParameter(ParameterMetadata $parameter, string $mode = 'get'): string
    {
        $prefix = $this->getPrefix($parameter->isBool(), $mode);

        return $this->makeFinalName($prefix, $parameter->getName());
    }

    private function makeFinalName(string $prefix, string $propertyName): string
    {
        return sprintf(
            '%s%s',
            $prefix,
            ucfirst($propertyName),
        );
    }

    private function getPrefix(bool $isBool, string $mode): string
    {
        $prefix = $mode;

        if ($isBool && $mode === 'get') {
            $prefix = 'is';
        } elseif ($isBool && $mode === 'set') {
            $prefix .= 'Is';
        }

        return $prefix;
    }
}
