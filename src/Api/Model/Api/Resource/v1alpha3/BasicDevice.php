<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Resource\v1alpha3;

use Kcs\K8s\Attribute as Kubernetes;

/**
 * BasicDevice defines one device instance.
 */
class BasicDevice
{
    /** @var object[]|null */
    #[Kubernetes\Attribute('attributes')]
    protected array|null $attributes = null;

    /** @var object[]|null */
    #[Kubernetes\Attribute('capacity')]
    protected array|null $capacity = null;

    /**
     * @param object[]|null $attributes
     * @param object[]|null $capacity
     */
    public function __construct(array|null $attributes = null, array|null $capacity = null)
    {
        $this->attributes = $attributes;
        $this->capacity = $capacity;
    }

    /**
     * Attributes defines the set of attributes for this device. The name of each attribute must be unique
     * in that set.
     *
     * The maximum number of attributes and capacities combined is 32.
     */
    public function getAttributes(): array|null
    {
        return $this->attributes;
    }

    /**
     * Attributes defines the set of attributes for this device. The name of each attribute must be unique
     * in that set.
     *
     * The maximum number of attributes and capacities combined is 32.
     *
     * @return static
     */
    public function setAttributes(array $attributes): static
    {
        $this->attributes = $attributes;

        return $this;
    }

    /**
     * Capacity defines the set of capacities for this device. The name of each capacity must be unique in
     * that set.
     *
     * The maximum number of attributes and capacities combined is 32.
     */
    public function getCapacity(): array|null
    {
        return $this->capacity;
    }

    /**
     * Capacity defines the set of capacities for this device. The name of each capacity must be unique in
     * that set.
     *
     * The maximum number of attributes and capacities combined is 32.
     *
     * @return static
     */
    public function setCapacity(array $capacity): static
    {
        $this->capacity = $capacity;

        return $this;
    }
}
