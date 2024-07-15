<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Networking\v1alpha1;

use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;

/**
 * IPAddressSpec describe the attributes in an IP Address.
 */
class IPAddressSpec
{
    #[Kubernetes\Attribute('parentRef', type: AttributeType::Model, model: ParentReference::class, required: true)]
    protected ParentReference $parentRef;

    public function __construct(ParentReference $parentRef)
    {
        $this->parentRef = $parentRef;
    }

    /**
     * ParentRef references the resource that an IPAddress is attached to. An IPAddress must reference a
     * parent object.
     */
    public function getParentRef(): ParentReference
    {
        return $this->parentRef;
    }

    /**
     * ParentRef references the resource that an IPAddress is attached to. An IPAddress must reference a
     * parent object.
     *
     * @return static
     */
    public function setParentRef(ParentReference $parentRef): static
    {
        $this->parentRef = $parentRef;

        return $this;
    }
}
