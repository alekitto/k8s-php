<?php

declare(strict_types=1);

namespace Kcs\K8s\ApiGenerator\Parser\Formatter;

use function sprintf;

readonly class GoPackageName
{
    public function __construct(private string $goPackageName, private string $phpNamespace, private string $phpName)
    {
    }

    public function getGoPackageName(): string
    {
        return $this->goPackageName;
    }

    public function getPhpNamespace(): string
    {
        return $this->phpNamespace;
    }

    public function getPhpName(): string
    {
        return $this->phpName;
    }

    public function getPhpFqcn(): string
    {
        return sprintf(
            '%s\\%s',
            $this->phpNamespace,
            $this->phpName,
        );
    }

    public function __toString(): string
    {
        return $this->getPhpFqcn();
    }
}
