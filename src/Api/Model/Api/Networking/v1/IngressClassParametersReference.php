<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Networking\v1;

use Kcs\K8s\Attribute as Kubernetes;

/**
 * IngressClassParametersReference identifies an API object. This can be used to specify a cluster or
 * namespace-scoped resource.
 */
class IngressClassParametersReference
{
    #[Kubernetes\Attribute('apiGroup')]
    protected string|null $apiGroup = null;

    #[Kubernetes\Attribute('kind', required: true)]
    protected string $kind;

    #[Kubernetes\Attribute('name', required: true)]
    protected string $name;

    #[Kubernetes\Attribute('namespace')]
    protected string|null $namespace = null;

    #[Kubernetes\Attribute('scope')]
    protected string|null $scope = null;

    public function __construct(string $kind, string $name)
    {
        $this->kind = $kind;
        $this->name = $name;
    }

    /**
     * apiGroup is the group for the resource being referenced. If APIGroup is not specified, the specified
     * Kind must be in the core API group. For any other third-party types, APIGroup is required.
     */
    public function getApiGroup(): string|null
    {
        return $this->apiGroup;
    }

    /**
     * apiGroup is the group for the resource being referenced. If APIGroup is not specified, the specified
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
     * kind is the type of resource being referenced.
     */
    public function getKind(): string
    {
        return $this->kind;
    }

    /**
     * kind is the type of resource being referenced.
     *
     * @return static
     */
    public function setKind(string $kind): static
    {
        $this->kind = $kind;

        return $this;
    }

    /**
     * name is the name of resource being referenced.
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * name is the name of resource being referenced.
     *
     * @return static
     */
    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    /**
     * namespace is the namespace of the resource being referenced. This field is required when scope is
     * set to "Namespace" and must be unset when scope is set to "Cluster".
     */
    public function getNamespace(): string|null
    {
        return $this->namespace;
    }

    /**
     * namespace is the namespace of the resource being referenced. This field is required when scope is
     * set to "Namespace" and must be unset when scope is set to "Cluster".
     *
     * @return static
     */
    public function setNamespace(string $namespace): static
    {
        $this->namespace = $namespace;

        return $this;
    }

    /**
     * scope represents if this refers to a cluster or namespace scoped resource. This may be set to
     * "Cluster" (default) or "Namespace".
     */
    public function getScope(): string|null
    {
        return $this->scope;
    }

    /**
     * scope represents if this refers to a cluster or namespace scoped resource. This may be set to
     * "Cluster" (default) or "Namespace".
     *
     * @return static
     */
    public function setScope(string $scope): static
    {
        $this->scope = $scope;

        return $this;
    }
}
