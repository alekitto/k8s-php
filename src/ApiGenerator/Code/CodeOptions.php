<?php

declare(strict_types=1);

namespace Kcs\K8s\ApiGenerator\Code;

class CodeOptions
{
    private string $annotationsBaseNamespace = 'Kcs\K8s\Attribute';

    public function __construct(
        private readonly string $apiVersion,
        private readonly string $generatorVersion,
        private readonly string $rootNamespace,
        private readonly string $srcDir,
    ) {
    }

    public function getAnnotationsNamespace(): string
    {
        return $this->annotationsBaseNamespace;
    }

    public function getRootNamespace(): string
    {
        return $this->rootNamespace;
    }

    public function getApiVersion(): string
    {
        return $this->apiVersion;
    }

    public function getSrcDir(): string
    {
        return $this->srcDir;
    }

    public function getGeneratorVersion(): string
    {
        return $this->generatorVersion;
    }
}
