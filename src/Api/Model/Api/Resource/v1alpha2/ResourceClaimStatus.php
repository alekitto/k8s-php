<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Resource\v1alpha2;

use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;
use Kcs\K8s\Collection;

/**
 * ResourceClaimStatus tracks whether the resource has been allocated and what the resulting attributes
 * are.
 */
class ResourceClaimStatus
{
    #[Kubernetes\Attribute('allocation', type: AttributeType::Model, model: AllocationResult::class)]
    protected AllocationResult|null $allocation = null;

    #[Kubernetes\Attribute('deallocationRequested')]
    protected bool|null $deallocationRequested = null;

    #[Kubernetes\Attribute('driverName')]
    protected string|null $driverName = null;

    /** @var iterable|ResourceClaimConsumerReference[]|null */
    #[Kubernetes\Attribute('reservedFor', type: AttributeType::Collection, model: ResourceClaimConsumerReference::class)]
    protected $reservedFor = null;

    /** @param iterable|ResourceClaimConsumerReference[] $reservedFor */
    public function __construct(
        AllocationResult|null $allocation = null,
        bool|null $deallocationRequested = null,
        string|null $driverName = null,
        iterable $reservedFor = [],
    ) {
        $this->allocation = $allocation;
        $this->deallocationRequested = $deallocationRequested;
        $this->driverName = $driverName;
        $this->reservedFor = new Collection($reservedFor);
    }

    /**
     * Allocation is set by the resource driver once a resource or set of resources has been allocated
     * successfully. If this is not specified, the resources have not been allocated yet.
     */
    public function getAllocation(): AllocationResult|null
    {
        return $this->allocation;
    }

    /**
     * Allocation is set by the resource driver once a resource or set of resources has been allocated
     * successfully. If this is not specified, the resources have not been allocated yet.
     *
     * @return static
     */
    public function setAllocation(AllocationResult $allocation): static
    {
        $this->allocation = $allocation;

        return $this;
    }

    /**
     * DeallocationRequested indicates that a ResourceClaim is to be deallocated.
     *
     * The driver then must deallocate this claim and reset the field together with clearing the Allocation
     * field.
     *
     * While DeallocationRequested is set, no new consumers may be added to ReservedFor.
     */
    public function isDeallocationRequested(): bool|null
    {
        return $this->deallocationRequested;
    }

    /**
     * DeallocationRequested indicates that a ResourceClaim is to be deallocated.
     *
     * The driver then must deallocate this claim and reset the field together with clearing the Allocation
     * field.
     *
     * While DeallocationRequested is set, no new consumers may be added to ReservedFor.
     *
     * @return static
     */
    public function setIsDeallocationRequested(bool $deallocationRequested): static
    {
        $this->deallocationRequested = $deallocationRequested;

        return $this;
    }

    /**
     * DriverName is a copy of the driver name from the ResourceClass at the time when allocation started.
     */
    public function getDriverName(): string|null
    {
        return $this->driverName;
    }

    /**
     * DriverName is a copy of the driver name from the ResourceClass at the time when allocation started.
     *
     * @return static
     */
    public function setDriverName(string $driverName): static
    {
        $this->driverName = $driverName;

        return $this;
    }

    /**
     * ReservedFor indicates which entities are currently allowed to use the claim. A Pod which references
     * a ResourceClaim which is not reserved for that Pod will not be started.
     *
     * There can be at most 32 such reservations. This may get increased in the future, but not reduced.
     *
     * @return iterable|ResourceClaimConsumerReference[]
     */
    public function getReservedFor(): iterable|null
    {
        return $this->reservedFor;
    }

    /**
     * ReservedFor indicates which entities are currently allowed to use the claim. A Pod which references
     * a ResourceClaim which is not reserved for that Pod will not be started.
     *
     * There can be at most 32 such reservations. This may get increased in the future, but not reduced.
     *
     * @return static
     */
    public function setReservedFor(iterable $reservedFor): static
    {
        $this->reservedFor = $reservedFor;

        return $this;
    }

    /** @return static */
    public function addReservedFor(ResourceClaimConsumerReference $reservedFor): static
    {
        if (! $this->reservedFor) {
            $this->reservedFor = new Collection();
        }

        $this->reservedFor[] = $reservedFor;

        return $this;
    }
}
