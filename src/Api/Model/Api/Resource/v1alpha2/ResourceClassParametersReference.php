<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Resource\v1alpha2;

use Kcs\K8s\Attribute as Kubernetes;

/**
 * ResourceClassParametersReference contains enough information to let you locate the parameters for a
 * ResourceClass.
 */
class ResourceClassParametersReference
{
    #[Kubernetes\Attribute('apiGroup')]
    protected string|null $apiGroup = null;

    #[Kubernetes\Attribute('kind', required: true)]
    protected string $kind;

    #[Kubernetes\Attribute('name', required: true)]
    protected string $name;

    #[Kubernetes\Attribute('namespace')]
    protected string|null $namespace = null;

    public function __construct(string $kind, string $name)
    {
        $this->kind = $kind;
        $this->name = $name;
    }

    /**
     * APIGroup is the group for the resource being referenced. It is empty for the core API. This matches
     * the group in the APIVersion that is used when creating the resources.
     */
    public function getApiGroup(): string|null
    {
        return $this->apiGroup;
    }

    /**
     * APIGroup is the group for the resource being referenced. It is empty for the core API. This matches
     * the group in the APIVersion that is used when creating the resources.
     *
     * @return static
     */
    public function setApiGroup(string $apiGroup): static
    {
        $this->apiGroup = $apiGroup;

        return $this;
    }

    /**
     * Kind is the type of resource being referenced. This is the same value as in the parameter object's
     * metadata.
     */
    public function getKind(): string
    {
        return $this->kind;
    }

    /**
     * Kind is the type of resource being referenced. This is the same value as in the parameter object's
     * metadata.
     *
     * @return static
     */
    public function setKind(string $kind): static
    {
        $this->kind = $kind;

        return $this;
    }

    /**
     * Name is the name of resource being referenced.
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Name is the name of resource being referenced.
     *
     * @return static
     */
    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Namespace that contains the referenced resource. Must be empty for cluster-scoped resources and
     * non-empty for namespaced resources.
     */
    public function getNamespace(): string|null
    {
        return $this->namespace;
    }

    /**
     * Namespace that contains the referenced resource. Must be empty for cluster-scoped resources and
     * non-empty for namespaced resources.
     *
     * @return static
     */
    public function setNamespace(string $namespace): static
    {
        $this->namespace = $namespace;

        return $this;
    }
}
