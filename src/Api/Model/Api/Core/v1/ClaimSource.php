<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Core\v1;

use Kcs\K8s\Attribute as Kubernetes;

/**
 * ClaimSource describes a reference to a ResourceClaim.
 *
 * Exactly one of these fields should be set.  Consumers of this type must treat an empty object as if
 * it has an unknown value.
 */
class ClaimSource
{
    #[Kubernetes\Attribute('resourceClaimName')]
    protected string|null $resourceClaimName = null;

    #[Kubernetes\Attribute('resourceClaimTemplateName')]
    protected string|null $resourceClaimTemplateName = null;

    public function __construct(string|null $resourceClaimName = null, string|null $resourceClaimTemplateName = null)
    {
        $this->resourceClaimName = $resourceClaimName;
        $this->resourceClaimTemplateName = $resourceClaimTemplateName;
    }

    /**
     * ResourceClaimName is the name of a ResourceClaim object in the same namespace as this pod.
     */
    public function getResourceClaimName(): string|null
    {
        return $this->resourceClaimName;
    }

    /**
     * ResourceClaimName is the name of a ResourceClaim object in the same namespace as this pod.
     *
     * @return static
     */
    public function setResourceClaimName(string $resourceClaimName): static
    {
        $this->resourceClaimName = $resourceClaimName;

        return $this;
    }

    /**
     * ResourceClaimTemplateName is the name of a ResourceClaimTemplate object in the same namespace as
     * this pod.
     *
     * The template will be used to create a new ResourceClaim, which will be bound to this pod. When this
     * pod is deleted, the ResourceClaim will also be deleted. The pod name and resource name, along with a
     * generated component, will be used to form a unique name for the ResourceClaim, which will be
     * recorded in pod.status.resourceClaimStatuses.
     *
     * This field is immutable and no changes will be made to the corresponding ResourceClaim by the
     * control plane after creating the ResourceClaim.
     */
    public function getResourceClaimTemplateName(): string|null
    {
        return $this->resourceClaimTemplateName;
    }

    /**
     * ResourceClaimTemplateName is the name of a ResourceClaimTemplate object in the same namespace as
     * this pod.
     *
     * The template will be used to create a new ResourceClaim, which will be bound to this pod. When this
     * pod is deleted, the ResourceClaim will also be deleted. The pod name and resource name, along with a
     * generated component, will be used to form a unique name for the ResourceClaim, which will be
     * recorded in pod.status.resourceClaimStatuses.
     *
     * This field is immutable and no changes will be made to the corresponding ResourceClaim by the
     * control plane after creating the ResourceClaim.
     *
     * @return static
     */
    public function setResourceClaimTemplateName(string $resourceClaimTemplateName): static
    {
        $this->resourceClaimTemplateName = $resourceClaimTemplateName;

        return $this;
    }
}
