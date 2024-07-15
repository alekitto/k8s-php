<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Core\v1;

use Kcs\K8s\Attribute as Kubernetes;

/**
 * Sysctl defines a kernel parameter to be set
 */
class Sysctl
{
    #[Kubernetes\Attribute('name', required: true)]
    protected string $name;

    #[Kubernetes\Attribute('value', required: true)]
    protected string $value;

    public function __construct(string $name, string $value)
    {
        $this->name = $name;
        $this->value = $value;
    }

    /**
     * Name of a property to set
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Name of a property to set
     *
     * @return static
     */
    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Value of a property to set
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * Value of a property to set
     *
     * @return static
     */
    public function setValue(string $value): static
    {
        $this->value = $value;

        return $this;
    }
}
