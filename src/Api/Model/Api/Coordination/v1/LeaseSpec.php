<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Coordination\v1;

use DateTimeInterface;
use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;

/**
 * LeaseSpec is a specification of a Lease.
 */
class LeaseSpec
{
    #[Kubernetes\Attribute('acquireTime', type: AttributeType::DateTime)]
    protected DateTimeInterface|null $acquireTime = null;

    #[Kubernetes\Attribute('holderIdentity')]
    protected string|null $holderIdentity = null;

    #[Kubernetes\Attribute('leaseDurationSeconds')]
    protected int|null $leaseDurationSeconds = null;

    #[Kubernetes\Attribute('leaseTransitions')]
    protected int|null $leaseTransitions = null;

    #[Kubernetes\Attribute('renewTime', type: AttributeType::DateTime)]
    protected DateTimeInterface|null $renewTime = null;

    public function __construct(
        DateTimeInterface|null $acquireTime = null,
        string|null $holderIdentity = null,
        int|null $leaseDurationSeconds = null,
        int|null $leaseTransitions = null,
        DateTimeInterface|null $renewTime = null,
    ) {
        $this->acquireTime = $acquireTime;
        $this->holderIdentity = $holderIdentity;
        $this->leaseDurationSeconds = $leaseDurationSeconds;
        $this->leaseTransitions = $leaseTransitions;
        $this->renewTime = $renewTime;
    }

    /**
     * acquireTime is a time when the current lease was acquired.
     */
    public function getAcquireTime(): DateTimeInterface|null
    {
        return $this->acquireTime;
    }

    /**
     * acquireTime is a time when the current lease was acquired.
     *
     * @return static
     */
    public function setAcquireTime(DateTimeInterface $acquireTime): static
    {
        $this->acquireTime = $acquireTime;

        return $this;
    }

    /**
     * holderIdentity contains the identity of the holder of a current lease.
     */
    public function getHolderIdentity(): string|null
    {
        return $this->holderIdentity;
    }

    /**
     * holderIdentity contains the identity of the holder of a current lease.
     *
     * @return static
     */
    public function setHolderIdentity(string $holderIdentity): static
    {
        $this->holderIdentity = $holderIdentity;

        return $this;
    }

    /**
     * leaseDurationSeconds is a duration that candidates for a lease need to wait to force acquire it.
     * This is measure against time of last observed renewTime.
     */
    public function getLeaseDurationSeconds(): int|null
    {
        return $this->leaseDurationSeconds;
    }

    /**
     * leaseDurationSeconds is a duration that candidates for a lease need to wait to force acquire it.
     * This is measure against time of last observed renewTime.
     *
     * @return static
     */
    public function setLeaseDurationSeconds(int $leaseDurationSeconds): static
    {
        $this->leaseDurationSeconds = $leaseDurationSeconds;

        return $this;
    }

    /**
     * leaseTransitions is the number of transitions of a lease between holders.
     */
    public function getLeaseTransitions(): int|null
    {
        return $this->leaseTransitions;
    }

    /**
     * leaseTransitions is the number of transitions of a lease between holders.
     *
     * @return static
     */
    public function setLeaseTransitions(int $leaseTransitions): static
    {
        $this->leaseTransitions = $leaseTransitions;

        return $this;
    }

    /**
     * renewTime is a time when the current holder of a lease has last updated the lease.
     */
    public function getRenewTime(): DateTimeInterface|null
    {
        return $this->renewTime;
    }

    /**
     * renewTime is a time when the current holder of a lease has last updated the lease.
     *
     * @return static
     */
    public function setRenewTime(DateTimeInterface $renewTime): static
    {
        $this->renewTime = $renewTime;

        return $this;
    }
}
