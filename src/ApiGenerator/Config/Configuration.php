<?php

declare(strict_types=1);

namespace Kcs\K8s\ApiGenerator\Config;

class Configuration
{
    public const KEY_API_VERSION = 'api-version';

    public const KEY_GENERATOR_VERSION = 'generator-version';

    /** @param array<string, mixed> $data */
    public function __construct(private array $data)
    {
    }

    public function getApiVersion(): string
    {
        return $this->data[self::KEY_API_VERSION] ?? '';
    }

    public function setApiVersion(string $version): self
    {
        $this->data[self::KEY_API_VERSION] = $version;

        return $this;
    }

    public function getGeneratorVersion(): string
    {
        return $this->data[self::KEY_GENERATOR_VERSION] ?? '';
    }

    public function setGeneratorVersion(string $version): self
    {
        $this->data[self::KEY_GENERATOR_VERSION] = $version;

        return $this;
    }
}
