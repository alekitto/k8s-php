<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Resource\v1alpha2;

use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;

/**
 * NamedResourcesAttribute is a combination of an attribute name and its value.
 */
class NamedResourcesAttribute
{
    #[Kubernetes\Attribute('bool')]
    protected bool|null $bool = null;

    #[Kubernetes\Attribute('int')]
    protected int|null $int = null;

    #[Kubernetes\Attribute('intSlice', type: AttributeType::Model, model: NamedResourcesIntSlice::class)]
    protected NamedResourcesIntSlice|null $intSlice = null;

    #[Kubernetes\Attribute('name', required: true)]
    protected string $name;

    #[Kubernetes\Attribute('quantity')]
    protected string|null $quantity = null;

    #[Kubernetes\Attribute('string')]
    protected string|null $string = null;

    #[Kubernetes\Attribute('stringSlice', type: AttributeType::Model, model: NamedResourcesStringSlice::class)]
    protected NamedResourcesStringSlice|null $stringSlice = null;

    #[Kubernetes\Attribute('version')]
    protected string|null $version = null;

    public function __construct(string $name)
    {
        $this->name = $name;
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
     * IntValue is a 64-bit integer.
     */
    public function getInt(): int|null
    {
        return $this->int;
    }

    /**
     * IntValue is a 64-bit integer.
     *
     * @return static
     */
    public function setInt(int $int): static
    {
        $this->int = $int;

        return $this;
    }

    /**
     * IntSliceValue is an array of 64-bit integers.
     */
    public function getIntSlice(): NamedResourcesIntSlice|null
    {
        return $this->intSlice;
    }

    /**
     * IntSliceValue is an array of 64-bit integers.
     *
     * @return static
     */
    public function setIntSlice(NamedResourcesIntSlice $intSlice): static
    {
        $this->intSlice = $intSlice;

        return $this;
    }

    /**
     * Name is unique identifier among all resource instances managed by the driver on the node. It must be
     * a DNS subdomain.
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Name is unique identifier among all resource instances managed by the driver on the node. It must be
     * a DNS subdomain.
     *
     * @return static
     */
    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    /**
     * QuantityValue is a quantity.
     */
    public function getQuantity(): string
    {
        return $this->quantity;
    }

    /**
     * QuantityValue is a quantity.
     *
     * @return static
     */
    public function setQuantity(string $quantity): static
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * StringValue is a string.
     */
    public function getString(): string|null
    {
        return $this->string;
    }

    /**
     * StringValue is a string.
     *
     * @return static
     */
    public function setString(string $string): static
    {
        $this->string = $string;

        return $this;
    }

    /**
     * StringSliceValue is an array of strings.
     */
    public function getStringSlice(): NamedResourcesStringSlice|null
    {
        return $this->stringSlice;
    }

    /**
     * StringSliceValue is an array of strings.
     *
     * @return static
     */
    public function setStringSlice(NamedResourcesStringSlice $stringSlice): static
    {
        $this->stringSlice = $stringSlice;

        return $this;
    }

    /**
     * VersionValue is a semantic version according to semver.org spec 2.0.0.
     */
    public function getVersion(): string|null
    {
        return $this->version;
    }

    /**
     * VersionValue is a semantic version according to semver.org spec 2.0.0.
     *
     * @return static
     */
    public function setVersion(string $version): static
    {
        $this->version = $version;

        return $this;
    }
}
