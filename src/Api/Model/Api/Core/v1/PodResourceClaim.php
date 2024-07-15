<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Core\v1;

use Kcs\K8s\Attribute as Kubernetes;

/**
 * PodResourceClaim references exactly one ResourceClaim, either directly or by naming a
 * ResourceClaimTemplate which is then turned into a ResourceClaim for the pod.
 *
 * It adds a name to it that uniquely identifies the ResourceClaim inside the Pod. Containers that need
 * access to the ResourceClaim reference it with this name.
 */
class PodResourceClaim
{
    #[Kubernetes\Attribute('name', required: true)]
    protected string $name;

    #[Kubernetes\Attribute('resourceClaimName')]
    protected string|null $resourceClaimName = null;

    #[Kubernetes\Attribute('resourceClaimTemplateName')]
    protected string|null $resourceClaimTemplateName = null;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * Name uniquely identifies this resource claim inside the pod. This must be a DNS_LABEL.
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Name uniquely identifies this resource claim inside the pod. This must be a DNS_LABEL.
     *
     * @return static
     */
    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    /**
     * ResourceClaimName is the name of a ResourceClaim object in the same namespace as this pod.
     *
     * Exactly one of ResourceClaimName and ResourceClaimTemplateName must be set.
     */
    public function getResourceClaimName(): string|null
    {
        return $this->resourceClaimName;
    }

    /**
     * ResourceClaimName is the name of a ResourceClaim object in the same namespace as this pod.
     *
     * Exactly one of ResourceClaimName and ResourceClaimTemplateName must be set.
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
     *
     * Exactly one of ResourceClaimName and ResourceClaimTemplateName must be set.
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
     * Exactly one of ResourceClaimName and ResourceClaimTemplateName must be set.
     *
     * @return static
     */
    public function setResourceClaimTemplateName(string $resourceClaimTemplateName): static
    {
        $this->resourceClaimTemplateName = $resourceClaimTemplateName;

        return $this;
    }
}
