<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Resource\v1alpha2;

use Kcs\K8s\Attribute as Kubernetes;

/**
 * ResourceClaimConsumerReference contains enough information to let you locate the consumer of a
 * ResourceClaim. The user must be a resource in the same namespace as the ResourceClaim.
 */
class ResourceClaimConsumerReference
{
    #[Kubernetes\Attribute('apiGroup')]
    protected string|null $apiGroup = null;

    #[Kubernetes\Attribute('name', required: true)]
    protected string $name;

    #[Kubernetes\Attribute('resource', required: true)]
    protected string $resource;

    #[Kubernetes\Attribute('uid', required: true)]
    protected string $uid;

    public function __construct(string $name, string $resource, string $uid)
    {
        $this->name = $name;
        $this->resource = $resource;
        $this->uid = $uid;
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
     * Resource is the type of resource being referenced, for example "pods".
     */
    public function getResource(): string
    {
        return $this->resource;
    }

    /**
     * Resource is the type of resource being referenced, for example "pods".
     *
     * @return static
     */
    public function setResource(string $resource): static
    {
        $this->resource = $resource;

        return $this;
    }

    /**
     * UID identifies exactly one incarnation of the resource.
     */
    public function getUid(): string
    {
        return $this->uid;
    }

    /**
     * UID identifies exactly one incarnation of the resource.
     *
     * @return static
     */
    public function setUid(string $uid): static
    {
        $this->uid = $uid;

        return $this;
    }
}
