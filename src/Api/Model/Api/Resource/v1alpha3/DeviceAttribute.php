<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Resource\v1alpha3;

use Kcs\K8s\Attribute as Kubernetes;

/**
 * DeviceAttribute must have exactly one field set.
 */
class DeviceAttribute
{
    #[Kubernetes\Attribute('bool')]
    protected bool|null $bool = null;

    #[Kubernetes\Attribute('int')]
    protected int|null $int = null;

    #[Kubernetes\Attribute('string')]
    protected string|null $string = null;

    #[Kubernetes\Attribute('version')]
    protected string|null $version = null;

    public function __construct(bool|null $bool = null, int|null $int = null, string|null $string = null, string|null $version = null)
    {
        $this->bool = $bool;
        $this->int = $int;
        $this->string = $string;
        $this->version = $version;
    }

    /**
     * BoolValue is a true/false value.
     */
    public function isBool(): bool|null
    {
        return $this->bool;
    }

    /**
     * BoolValue is a true/false value.
     *
     * @return static
     */
    public function setIsBool(bool $bool): static
    {
        $this->bool = $bool;

        return $this;
    }

    /**
     * IntValue is a number.
     */
    public function getInt(): int|null
    {
        return $this->int;
    }

    /**
     * IntValue is a number.
     *
     * @return static
     */
    public function setInt(int $int): static
    {
        $this->int = $int;

        return $this;
    }

    /**
     * StringValue is a string. Must not be longer than 64 characters.
     */
    public function getString(): string|null
    {
        return $this->string;
    }

    /**
     * StringValue is a string. Must not be longer than 64 characters.
     *
     * @return static
     */
    public function setString(string $string): static
    {
        $this->string = $string;

        return $this;
    }

    /**
     * VersionValue is a semantic version according to semver.org spec 2.0.0. Must not be longer than 64
     * characters.
     */
    public function getVersion(): string|null
    {
        return $this->version;
    }

    /**
     * VersionValue is a semantic version according to semver.org spec 2.0.0. Must not be longer than 64
     * characters.
     *
     * @return static
     */
    public function setVersion(string $version): static
    {
        $this->version = $version;

        return $this;
    }
}
