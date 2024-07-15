<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Resource\v1alpha2;

use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;

/**
 * DriverAllocationResult contains vendor parameters and the allocation result for one request.
 */
class DriverAllocationResult
{
    #[Kubernetes\Attribute('namedResources', type: AttributeType::Model, model: NamedResourcesAllocationResult::class)]
    protected NamedResourcesAllocationResult|null $namedResources = null;

    #[Kubernetes\Attribute('vendorRequestParameters')]
    protected object|null $vendorRequestParameters = null;

    public function __construct(
        NamedResourcesAllocationResult|null $namedResources = null,
        object|null $vendorRequestParameters = null,
    ) {
        $this->namedResources = $namedResources;
        $this->vendorRequestParameters = $vendorRequestParameters;
    }

    /**
     * NamedResources describes the allocation result when using the named resources model.
     */
    public function getNamedResources(): NamedResourcesAllocationResult|null
    {
        return $this->namedResources;
    }

    /**
     * NamedResources describes the allocation result when using the named resources model.
     *
     * @return static
     */
    public function setNamedResources(NamedResourcesAllocationResult $namedResources): static
    {
        $this->namedResources = $namedResources;

        return $this;
    }

    /**
     * VendorRequestParameters are the per-request configuration parameters from the time that the claim
     * was allocated.
     */
    public function getVendorRequestParameters(): object
    {
        return $this->vendorRequestParameters;
    }

    /**
     * VendorRequestParameters are the per-request configuration parameters from the time that the claim
     * was allocated.
     *
     * @return static
     */
    public function setVendorRequestParameters(object $vendorRequestParameters): static
    {
        $this->vendorRequestParameters = $vendorRequestParameters;

        return $this;
    }
}
