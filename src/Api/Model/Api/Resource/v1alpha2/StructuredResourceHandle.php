<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Resource\v1alpha2;

use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;
use Kcs\K8s\Collection;

/**
 * StructuredResourceHandle is the in-tree representation of the allocation result.
 */
class StructuredResourceHandle
{
    #[Kubernetes\Attribute('nodeName')]
    protected string|null $nodeName = null;

    /** @var iterable|DriverAllocationResult[] */
    #[Kubernetes\Attribute('results', type: AttributeType::Collection, model: DriverAllocationResult::class, required: true)]
    protected iterable $results;

    #[Kubernetes\Attribute('vendorClaimParameters')]
    protected object|null $vendorClaimParameters = null;

    #[Kubernetes\Attribute('vendorClassParameters')]
    protected object|null $vendorClassParameters = null;

    /** @param iterable|DriverAllocationResult[] $results */
    public function __construct(iterable $results)
    {
        $this->results = new Collection($results);
    }

    /**
     * NodeName is the name of the node providing the necessary resources if the resources are local to a
     * node.
     */
    public function getNodeName(): string|null
    {
        return $this->nodeName;
    }

    /**
     * NodeName is the name of the node providing the necessary resources if the resources are local to a
     * node.
     *
     * @return static
     */
    public function setNodeName(string $nodeName): static
    {
        $this->nodeName = $nodeName;

        return $this;
    }

    /**
     * Results lists all allocated driver resources.
     *
     * @return iterable|DriverAllocationResult[]
     */
    public function getResults(): iterable
    {
        return $this->results;
    }

    /**
     * Results lists all allocated driver resources.
     *
     * @return static
     */
    public function setResults(iterable $results): static
    {
        $this->results = $results;

        return $this;
    }

    /** @return static */
    public function addResults(DriverAllocationResult $result): static
    {
        if (! $this->results) {
            $this->results = new Collection();
        }

        $this->results[] = $result;

        return $this;
    }

    /**
     * VendorClaimParameters are the per-claim configuration parameters from the resource claim parameters
     * at the time that the claim was allocated.
     */
    public function getVendorClaimParameters(): object
    {
        return $this->vendorClaimParameters;
    }

    /**
     * VendorClaimParameters are the per-claim configuration parameters from the resource claim parameters
     * at the time that the claim was allocated.
     *
     * @return static
     */
    public function setVendorClaimParameters(object $vendorClaimParameters): static
    {
        $this->vendorClaimParameters = $vendorClaimParameters;

        return $this;
    }

    /**
     * VendorClassParameters are the per-claim configuration parameters from the resource class at the time
     * that the claim was allocated.
     */
    public function getVendorClassParameters(): object
    {
        return $this->vendorClassParameters;
    }

    /**
     * VendorClassParameters are the per-claim configuration parameters from the resource class at the time
     * that the claim was allocated.
     *
     * @return static
     */
    public function setVendorClassParameters(object $vendorClassParameters): static
    {
        $this->vendorClassParameters = $vendorClassParameters;

        return $this;
    }
}
