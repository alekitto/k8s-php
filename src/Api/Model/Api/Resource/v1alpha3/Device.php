<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Resource\v1alpha3;

use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;

/**
 * Device represents one individual hardware instance that can be selected based on its attributes.
 * Besides the name, exactly one field must be set.
 */
class Device
{
    #[Kubernetes\Attribute('basic', type: AttributeType::Model, model: BasicDevice::class)]
    protected BasicDevice|null $basic = null;

    #[Kubernetes\Attribute('name', required: true)]
    protected string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * Basic defines one device instance.
     */
    public function getBasic(): BasicDevice|null
    {
        return $this->basic;
    }

    /**
     * Basic defines one device instance.
     *
     * @return static
     */
    public function setBasic(BasicDevice $basic): static
    {
        $this->basic = $basic;

        return $this;
    }

    /**
     * Name is unique identifier among all devices managed by the driver in the pool. It must be a DNS
     * label.
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Name is unique identifier among all devices managed by the driver in the pool. It must be a DNS
     * label.
     *
     * @return static
     */
    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }
}
