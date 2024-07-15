<?php

declare(strict_types=1);

namespace Kcs\K8s\ApiGenerator\Parser\Formatter;

use function sprintf;

readonly class ServiceGroupName
{
    public function __construct(
        private string $groupName,
        private string $groupBaseNamespace,
        private string $groupBaseName,
        private string $version,
        private string $kind,
    ) {
    }

    public function getKind(): string
    {
        return $this->kind;
    }

    public function getVersion(): string
    {
        return $this->version;
    }

    public function getGroupName(): string
    {
        return $this->groupName;
    }

    public function getGroupBaseNamespace(): string
    {
        return $this->groupBaseNamespace;
    }

    public function getGroupBaseName(): string
    {
        return $this->groupBaseName;
    }

    public function getFullNamespace(): string
    {
        $baseNamespace = $this->groupBaseNamespace;
        $baseNamespace = $baseNamespace ? ($baseNamespace . '\\' . $this->groupBaseName) : $this->groupBaseName;

        return sprintf(
            '%s\\%s',
            $baseNamespace,
            $this->getVersion(),
        );
    }

    public function getClassName(): string
    {
        return $this->kind . 'Service';
    }

    public function getFqcn(): string
    {
        return sprintf(
            '%s\\%s',
            $this->getFullNamespace(),
            $this->getClassName(),
        );
    }
}
