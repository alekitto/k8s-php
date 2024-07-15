<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Networking\v1alpha1;

use Kcs\K8s\Attribute as Kubernetes;

/**
 * ParentReference describes a reference to a parent object.
 */
class ParentReference
{
    #[Kubernetes\Attribute('group')]
    protected string|null $group = null;

    #[Kubernetes\Attribute('name', required: true)]
    protected string $name;

    #[Kubernetes\Attribute('namespace')]
    protected string|null $namespace = null;

    #[Kubernetes\Attribute('resource', required: true)]
    protected string $resource;

    public function __construct(string $name, string $resource)
    {
        $this->name = $name;
        $this->resource = $resource;
    }

    /**
     * Group is the group of the object being referenced.
     */
    public function getGroup(): string|null
    {
        return $this->group;
    }

    /**
     * Group is the group of the object being referenced.
     *
     * @return static
     */
    public function setGroup(string $group): static
    {
        $this->group = $group;

        return $this;
    }

    /**
     * Name is the name of the object being referenced.
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Name is the name of the object being referenced.
     *
     * @return static
     */
    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Namespace is the namespace of the object being referenced.
     */
    public function getNamespace(): string|null
    {
        return $this->namespace;
    }

    /**
     * Namespace is the namespace of the object being referenced.
     *
     * @return static
     */
    public function setNamespace(string $namespace): static
    {
        $this->namespace = $namespace;

        return $this;
    }

    /**
     * Resource is the resource of the object being referenced.
     */
    public function getResource(): string
    {
        return $this->resource;
    }

    /**
     * Resource is the resource of the object being referenced.
     *
     * @return static
     */
    public function setResource(string $resource): static
    {
        $this->resource = $resource;

        return $this;
    }
}
