<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Coordination\v1alpha1;

use DateTimeInterface;
use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;

/**
 * LeaseCandidateSpec is a specification of a Lease.
 */
class LeaseCandidateSpec
{
    #[Kubernetes\Attribute('binaryVersion')]
    protected string|null $binaryVersion = null;

    #[Kubernetes\Attribute('emulationVersion')]
    protected string|null $emulationVersion = null;

    #[Kubernetes\Attribute('leaseName', required: true)]
    protected string $leaseName;

    #[Kubernetes\Attribute('pingTime', type: AttributeType::DateTime)]
    protected DateTimeInterface|null $pingTime = null;

    /** @var string[] */
    #[Kubernetes\Attribute('preferredStrategies', required: true)]
    protected array $preferredStrategies;

    #[Kubernetes\Attribute('renewTime', type: AttributeType::DateTime)]
    protected DateTimeInterface|null $renewTime = null;

    /** @param string[] $preferredStrategies */
    public function __construct(string $leaseName, array $preferredStrategies)
    {
        $this->leaseName = $leaseName;
        $this->preferredStrategies = $preferredStrategies;
    }

    /**
     * BinaryVersion is the binary version. It must be in a semver format without leading `v`. This field
     * is required when strategy is "OldestEmulationVersion"
     */
    public function getBinaryVersion(): string|null
    {
        return $this->binaryVersion;
    }

    /**
     * BinaryVersion is the binary version. It must be in a semver format without leading `v`. This field
     * is required when strategy is "OldestEmulationVersion"
     *
     * @return static
     */
    public function setBinaryVersion(string $binaryVersion): static
    {
        $this->binaryVersion = $binaryVersion;

        return $this;
    }

    /**
     * EmulationVersion is the emulation version. It must be in a semver format without leading `v`.
     * EmulationVersion must be less than or equal to BinaryVersion. This field is required when strategy
     * is "OldestEmulationVersion"
     */
    public function getEmulationVersion(): string|null
    {
        return $this->emulationVersion;
    }

    /**
     * EmulationVersion is the emulation version. It must be in a semver format without leading `v`.
     * EmulationVersion must be less than or equal to BinaryVersion. This field is required when strategy
     * is "OldestEmulationVersion"
     *
     * @return static
     */
    public function setEmulationVersion(string $emulationVersion): static
    {
        $this->emulationVersion = $emulationVersion;

        return $this;
    }

    /**
     * LeaseName is the name of the lease for which this candidate is contending. This field is immutable.
     */
    public function getLeaseName(): string
    {
        return $this->leaseName;
    }

    /**
     * LeaseName is the name of the lease for which this candidate is contending. This field is immutable.
     *
     * @return static
     */
    public function setLeaseName(string $leaseName): static
    {
        $this->leaseName = $leaseName;

        return $this;
    }

    /**
     * PingTime is the last time that the server has requested the LeaseCandidate to renew. It is only done
     * during leader election to check if any LeaseCandidates have become ineligible. When PingTime is
     * updated, the LeaseCandidate will respond by updating RenewTime.
     */
    public function getPingTime(): DateTimeInterface|null
    {
        return $this->pingTime;
    }

    /**
     * PingTime is the last time that the server has requested the LeaseCandidate to renew. It is only done
     * during leader election to check if any LeaseCandidates have become ineligible. When PingTime is
     * updated, the LeaseCandidate will respond by updating RenewTime.
     *
     * @return static
     */
    public function setPingTime(DateTimeInterface $pingTime): static
    {
        $this->pingTime = $pingTime;

        return $this;
    }

    /**
     * PreferredStrategies indicates the list of strategies for picking the leader for coordinated leader
     * election. The list is ordered, and the first strategy supersedes all other strategies. The list is
     * used by coordinated leader election to make a decision about the final election strategy. This
     * follows as - If all clients have strategy X as the first element in this list, strategy X will be
     * used. - If a candidate has strategy [X] and another candidate has strategy [Y, X], Y supersedes X
     * and strategy Y
     *   will be used.
     * - If a candidate has strategy [X, Y] and another candidate has strategy [Y, X], this is a user error
     * and leader
     *   election will not operate the Lease until resolved.
     * (Alpha) Using this field requires the CoordinatedLeaderElection feature gate to be enabled.
     */
    public function getPreferredStrategies(): array
    {
        return $this->preferredStrategies;
    }

    /**
     * PreferredStrategies indicates the list of strategies for picking the leader for coordinated leader
     * election. The list is ordered, and the first strategy supersedes all other strategies. The list is
     * used by coordinated leader election to make a decision about the final election strategy. This
     * follows as - If all clients have strategy X as the first element in this list, strategy X will be
     * used. - If a candidate has strategy [X] and another candidate has strategy [Y, X], Y supersedes X
     * and strategy Y
     *   will be used.
     * - If a candidate has strategy [X, Y] and another candidate has strategy [Y, X], this is a user error
     * and leader
     *   election will not operate the Lease until resolved.
     * (Alpha) Using this field requires the CoordinatedLeaderElection feature gate to be enabled.
     *
     * @return static
     */
    public function setPreferredStrategies(array $preferredStrategies): static
    {
        $this->preferredStrategies = $preferredStrategies;

        return $this;
    }

    /**
     * RenewTime is the time that the LeaseCandidate was last updated. Any time a Lease needs to do leader
     * election, the PingTime field is updated to signal to the LeaseCandidate that they should update the
     * RenewTime. Old LeaseCandidate objects are also garbage collected if it has been hours since the last
     * renew. The PingTime field is updated regularly to prevent garbage collection for still active
     * LeaseCandidates.
     */
    public function getRenewTime(): DateTimeInterface|null
    {
        return $this->renewTime;
    }

    /**
     * RenewTime is the time that the LeaseCandidate was last updated. Any time a Lease needs to do leader
     * election, the PingTime field is updated to signal to the LeaseCandidate that they should update the
     * RenewTime. Old LeaseCandidate objects are also garbage collected if it has been hours since the last
     * renew. The PingTime field is updated regularly to prevent garbage collection for still active
     * LeaseCandidates.
     *
     * @return static
     */
    public function setRenewTime(DateTimeInterface $renewTime): static
    {
        $this->renewTime = $renewTime;

        return $this;
    }
}
