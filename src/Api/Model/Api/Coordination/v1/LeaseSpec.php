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

    #[Kubernetes\Attribute('preferredHolder')]
    protected string|null $preferredHolder = null;

    #[Kubernetes\Attribute('renewTime', type: AttributeType::DateTime)]
    protected DateTimeInterface|null $renewTime = null;

    #[Kubernetes\Attribute('strategy')]
    protected string|null $strategy = null;

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
     * holderIdentity contains the identity of the holder of a current lease. If Coordinated Leader
     * Election is used, the holder identity must be equal to the elected LeaseCandidate.metadata.name
     * field.
     */
    public function getHolderIdentity(): string|null
    {
        return $this->holderIdentity;
    }

    /**
     * holderIdentity contains the identity of the holder of a current lease. If Coordinated Leader
     * Election is used, the holder identity must be equal to the elected LeaseCandidate.metadata.name
     * field.
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
     * This is measured against the time of last observed renewTime.
     */
    public function getLeaseDurationSeconds(): int|null
    {
        return $this->leaseDurationSeconds;
    }

    /**
     * leaseDurationSeconds is a duration that candidates for a lease need to wait to force acquire it.
     * This is measured against the time of last observed renewTime.
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
     * PreferredHolder signals to a lease holder that the lease has a more optimal holder and should be
     * given up. This field can only be set if Strategy is also set.
     */
    public function getPreferredHolder(): string|null
    {
        return $this->preferredHolder;
    }

    /**
     * PreferredHolder signals to a lease holder that the lease has a more optimal holder and should be
     * given up. This field can only be set if Strategy is also set.
     *
     * @return static
     */
    public function setPreferredHolder(string $preferredHolder): static
    {
        $this->preferredHolder = $preferredHolder;

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

    /**
     * Strategy indicates the strategy for picking the leader for coordinated leader election. If the field
     * is not specified, there is no active coordination for this lease. (Alpha) Using this field requires
     * the CoordinatedLeaderElection feature gate to be enabled.
     */
    public function getStrategy(): string|null
    {
        return $this->strategy;
    }

    /**
     * Strategy indicates the strategy for picking the leader for coordinated leader election. If the field
     * is not specified, there is no active coordination for this lease. (Alpha) Using this field requires
     * the CoordinatedLeaderElection feature gate to be enabled.
     *
     * @return static
     */
    public function setStrategy(string $strategy): static
    {
        $this->strategy = $strategy;

        return $this;
    }
}
