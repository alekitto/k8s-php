<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Authorization\v1;

use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;

/**
 * SelfSubjectAccessReviewSpec is a description of the access request.  Exactly one of
 * ResourceAuthorizationAttributes and NonResourceAuthorizationAttributes must be set
 */
class SelfSubjectAccessReviewSpec
{
    #[Kubernetes\Attribute('nonResourceAttributes', type: AttributeType::Model, model: NonResourceAttributes::class)]
    protected NonResourceAttributes|null $nonResourceAttributes = null;

    #[Kubernetes\Attribute('resourceAttributes', type: AttributeType::Model, model: ResourceAttributes::class)]
    protected ResourceAttributes|null $resourceAttributes = null;

    public function __construct(
        NonResourceAttributes|null $nonResourceAttributes = null,
        ResourceAttributes|null $resourceAttributes = null,
    ) {
        $this->nonResourceAttributes = $nonResourceAttributes;
        $this->resourceAttributes = $resourceAttributes;
    }

    /**
     * NonResourceAttributes describes information for a non-resource access request
     */
    public function getNonResourceAttributes(): NonResourceAttributes|null
    {
        return $this->nonResourceAttributes;
    }

    /**
     * NonResourceAttributes describes information for a non-resource access request
     *
     * @return static
     */
    public function setNonResourceAttributes(NonResourceAttributes $nonResourceAttributes): static
    {
        $this->nonResourceAttributes = $nonResourceAttributes;

        return $this;
    }

    /**
     * ResourceAuthorizationAttributes describes information for a resource access request
     */
    public function getResourceAttributes(): ResourceAttributes|null
    {
        return $this->resourceAttributes;
    }

    /**
     * ResourceAuthorizationAttributes describes information for a resource access request
     *
     * @return static
     */
    public function setResourceAttributes(ResourceAttributes $resourceAttributes): static
    {
        $this->resourceAttributes = $resourceAttributes;

        return $this;
    }
}
