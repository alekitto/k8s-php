<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Core\v1;

use Kcs\K8s\Attribute as Kubernetes;

/**
 * TypedLocalObjectReference contains enough information to let you locate the typed referenced object
 * inside the same namespace.
 */
class TypedLocalObjectReference
{
    #[Kubernetes\Attribute('apiGroup')]
    protected string|null $apiGroup = null;

    #[Kubernetes\Attribute('kind', required: true)]
    protected string $kind;

    #[Kubernetes\Attribute('name', required: true)]
    protected string $name;

    public function __construct(string $kind, string $name)
    {
        $this->kind = $kind;
        $this->name = $name;
    }

    /**
     * APIGroup is the group for the resource being referenced. If APIGroup is not specified, the specified
     * Kind must be in the core API group. For any other third-party types, APIGroup is required.
     */
    public function getApiGroup(): string|null
    {
        return $this->apiGroup;
    }

    /**
     * APIGroup is the group for the resource being referenced. If APIGroup is not specified, the specified
     * Kind must be in the core API group. For any other third-party types, APIGroup is required.
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
