<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Resource\v1alpha3;

use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;
use Kcs\K8s\Collection;

/**
 * ResourceClaimStatus tracks whether the resource has been allocated and what the result of that was.
 */
class ResourceClaimStatus
{
    #[Kubernetes\Attribute('allocation', type: AttributeType::Model, model: AllocationResult::class)]
    protected AllocationResult|null $allocation = null;

    #[Kubernetes\Attribute('deallocationRequested')]
    protected bool|null $deallocationRequested = null;

    /** @var iterable|ResourceClaimConsumerReference[]|null */
    #[Kubernetes\Attribute('reservedFor', type: AttributeType::Collection, model: ResourceClaimConsumerReference::class)]
    protected $reservedFor = null;

    /** @param iterable|ResourceClaimConsumerReference[] $reservedFor */
    public function __construct(
        AllocationResult|null $allocation = null,
        bool|null $deallocationRequested = null,
        iterable $reservedFor = [],
    ) {
        $this->allocation = $allocation;
        $this->deallocationRequested = $deallocationRequested;
        $this->reservedFor = new Collection($reservedFor);
    }

    /**
     * Allocation is set once the claim has been allocated successfully.
     */
    public function getAllocation(): AllocationResult|null
    {
        return $this->allocation;
    }

    /**
     * Allocation is set once the claim has been allocated successfully.
     *
     * @return static
     */
    public function setAllocation(AllocationResult $allocation): static
    {
        $this->allocation = $allocation;

        return $this;
    }

    /**
     * Indicates that a claim is to be deallocated. While this is set, no new consumers may be added to
     * ReservedFor.
     *
     * This is only used if the claim needs to be deallocated by a DRA driver. That driver then must
     * deallocate this claim and reset the field together with clearing the Allocation field.
     *
     * This is an alpha field and requires enabling the DRAControlPlaneController feature gate.
     */
    public function isDeallocationRequested(): bool|null
    {
        return $this->deallocationRequested;
    }

    /**
     * Indicates that a claim is to be deallocated. While this is set, no new consumers may be added to
     * ReservedFor.
     *
     * This is only used if the claim needs to be deallocated by a DRA driver. That driver then must
     * deallocate this claim and reset the field together with clearing the Allocation field.
     *
     * This is an alpha field and requires enabling the DRAControlPlaneController feature gate.
     *
     * @return static
     */
    public function setIsDeallocationRequested(bool $deallocationRequested): static
    {
        $this->deallocationRequested = $deallocationRequested;

        return $this;
    }

    /**
     * ReservedFor indicates which entities are currently allowed to use the claim. A Pod which references
     * a ResourceClaim which is not reserved for that Pod will not be started. A claim that is in use or
     * might be in use because it has been reserved must not get deallocated.
     *
     * In a cluster with multiple scheduler instances, two pods might get scheduled concurrently by
     * different schedulers. When they reference the same ResourceClaim which already has reached its
     * maximum number of consumers, only one pod can be scheduled.
     *
     * Both schedulers try to add their pod to the claim.status.reservedFor field, but only the update that
     * reaches the API server first gets stored. The other one fails with an error and the scheduler which
     * issued it knows that it must put the pod back into the queue, waiting for the ResourceClaim to
     * become usable again.
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
     * a ResourceClaim which is not reserved for that Pod will not be started. A claim that is in use or
     * might be in use because it has been reserved must not get deallocated.
     *
     * In a cluster with multiple scheduler instances, two pods might get scheduled concurrently by
     * different schedulers. When they reference the same ResourceClaim which already has reached its
     * maximum number of consumers, only one pod can be scheduled.
     *
     * Both schedulers try to add their pod to the claim.status.reservedFor field, but only the update that
     * reaches the API server first gets stored. The other one fails with an error and the scheduler which
     * issued it knows that it must put the pod back into the queue, waiting for the ResourceClaim to
     * become usable again.
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
