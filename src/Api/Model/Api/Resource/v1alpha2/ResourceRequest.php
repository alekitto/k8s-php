<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Resource\v1alpha2;

use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;

/**
 * ResourceRequest is a request for resources from one particular driver.
 */
class ResourceRequest
{
    #[Kubernetes\Attribute('namedResources', type: AttributeType::Model, model: NamedResourcesRequest::class)]
    protected NamedResourcesRequest|null $namedResources = null;

    #[Kubernetes\Attribute('vendorParameters')]
    protected object|null $vendorParameters = null;

    public function __construct(NamedResourcesRequest|null $namedResources = null, object|null $vendorParameters = null)
    {
        $this->namedResources = $namedResources;
        $this->vendorParameters = $vendorParameters;
    }

    /**
     * NamedResources describes a request for resources with the named resources model.
     */
    public function getNamedResources(): NamedResourcesRequest|null
    {
        return $this->namedResources;
    }

    /**
     * NamedResources describes a request for resources with the named resources model.
     *
     * @return static
     */
    public function setNamedResources(NamedResourcesRequest $namedResources): static
    {
        $this->namedResources = $namedResources;

        return $this;
    }

    /**
     * VendorParameters are arbitrary setup parameters for the requested resource. They are ignored while
     * allocating a claim.
     */
    public function getVendorParameters(): object
    {
        return $this->vendorParameters;
    }

    /**
     * VendorParameters are arbitrary setup parameters for the requested resource. They are ignored while
     * allocating a claim.
     *
     * @return static
     */
    public function setVendorParameters(object $vendorParameters): static
    {
        $this->vendorParameters = $vendorParameters;

        return $this;
    }
}
