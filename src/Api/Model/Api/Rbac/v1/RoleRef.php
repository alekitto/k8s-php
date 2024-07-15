<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Rbac\v1;

use Kcs\K8s\Attribute as Kubernetes;

/**
 * RoleRef contains information that points to the role being used
 */
class RoleRef
{
    #[Kubernetes\Attribute('apiGroup', required: true)]
    protected string $apiGroup;

    #[Kubernetes\Attribute('kind', required: true)]
    protected string $kind;

    #[Kubernetes\Attribute('name', required: true)]
    protected string $name;

    public function __construct(string $apiGroup, string $kind, string $name)
    {
        $this->apiGroup = $apiGroup;
        $this->kind = $kind;
        $this->name = $name;
    }

    /**
     * APIGroup is the group for the resource being referenced
     */
    public function getApiGroup(): string
    {
        return $this->apiGroup;
    }

    /**
     * APIGroup is the group for the resource being referenced
     *
     * @return static
     */
    public function setApiGroup(string $apiGroup): static
    {
        $this->apiGroup = $apiGroup;

        return $this;
    }

    /**
     * Kind is the type of resource being referenced
     */
    public function getKind(): string
    {
        return $this->kind;
    }

    /**
     * Kind is the type of resource being referenced
     *
     * @return static
     */
    public function setKind(string $kind): static
    {
        $this->kind = $kind;

        return $this;
    }

    /**
     * Name is the name of resource being referenced
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Name is the name of resource being referenced
     *
     * @return static
     */
    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }
}
