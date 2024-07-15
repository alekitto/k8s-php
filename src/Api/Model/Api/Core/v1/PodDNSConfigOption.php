<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Core\v1;

use Kcs\K8s\Attribute as Kubernetes;

/**
 * PodDNSConfigOption defines DNS resolver options of a pod.
 */
class PodDNSConfigOption
{
    #[Kubernetes\Attribute('name')]
    protected string|null $name = null;

    #[Kubernetes\Attribute('value')]
    protected string|null $value = null;

    public function __construct(string|null $name = null, string|null $value = null)
    {
        $this->name = $name;
        $this->value = $value;
    }

    /**
     * Required.
     */
    public function getName(): string|null
    {
        return $this->name;
    }

    /**
     * Required.
     *
     * @return static
     */
    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getValue(): string|null
    {
        return $this->value;
    }

    /** @return static */
    public function setValue(string $value): static
    {
        $this->value = $value;

        return $this;
    }
}
