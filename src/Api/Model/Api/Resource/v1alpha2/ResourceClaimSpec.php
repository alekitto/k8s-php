<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Resource\v1alpha2;

use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;

/**
 * ResourceClaimSpec defines how a resource is to be allocated.
 */
class ResourceClaimSpec
{
    #[Kubernetes\Attribute('allocationMode')]
    protected string|null $allocationMode = null;

    #[Kubernetes\Attribute('parametersRef', type: AttributeType::Model, model: ResourceClaimParametersReference::class)]
    protected ResourceClaimParametersReference|null $parametersRef = null;

    #[Kubernetes\Attribute('resourceClassName', required: true)]
    protected string $resourceClassName;

    public function __construct(string $resourceClassName)
    {
        $this->resourceClassName = $resourceClassName;
    }

    /**
     * Allocation can start immediately or when a Pod wants to use the resource. "WaitForFirstConsumer" is
     * the default.
     */
    public function getAllocationMode(): string|null
    {
        return $this->allocationMode;
    }

    /**
     * Allocation can start immediately or when a Pod wants to use the resource. "WaitForFirstConsumer" is
     * the default.
     *
     * @return static
     */
    public function setAllocationMode(string $allocationMode): static
    {
        $this->allocationMode = $allocationMode;

        return $this;
    }

    /**
     * ParametersRef references a separate object with arbitrary parameters that will be used by the driver
     * when allocating a resource for the claim.
     *
     * The object must be in the same namespace as the ResourceClaim.
     */
    public function getParametersRef(): ResourceClaimParametersReference|null
    {
        return $this->parametersRef;
    }

    /**
     * ParametersRef references a separate object with arbitrary parameters that will be used by the driver
     * when allocating a resource for the claim.
     *
     * The object must be in the same namespace as the ResourceClaim.
     *
     * @return static
     */
    public function setParametersRef(ResourceClaimParametersReference $parametersRef): static
    {
        $this->parametersRef = $parametersRef;

        return $this;
    }

    /**
     * ResourceClassName references the driver and additional parameters via the name of a ResourceClass
     * that was created as part of the driver deployment.
     */
    public function getResourceClassName(): string
    {
        return $this->resourceClassName;
    }

    /**
     * ResourceClassName references the driver and additional parameters via the name of a ResourceClass
     * that was created as part of the driver deployment.
     *
     * @return static
     */
    public function setResourceClassName(string $resourceClassName): static
    {
        $this->resourceClassName = $resourceClassName;

        return $this;
    }
}
