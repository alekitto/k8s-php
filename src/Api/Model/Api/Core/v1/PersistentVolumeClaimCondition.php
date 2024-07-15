<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Core\v1;

use DateTimeInterface;
use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;

/**
 * PersistentVolumeClaimCondition contains details about state of pvc
 */
class PersistentVolumeClaimCondition
{
    #[Kubernetes\Attribute('lastProbeTime', type: AttributeType::DateTime)]
    protected DateTimeInterface|null $lastProbeTime = null;

    #[Kubernetes\Attribute('lastTransitionTime', type: AttributeType::DateTime)]
    protected DateTimeInterface|null $lastTransitionTime = null;

    #[Kubernetes\Attribute('message')]
    protected string|null $message = null;

    #[Kubernetes\Attribute('reason')]
    protected string|null $reason = null;

    #[Kubernetes\Attribute('status', required: true)]
    protected string $status;

    #[Kubernetes\Attribute('type', required: true)]
    protected string $type;

    public function __construct(string $status, string $type)
    {
        $this->status = $status;
        $this->type = $type;
    }

    /**
     * lastProbeTime is the time we probed the condition.
     */
    public function getLastProbeTime(): DateTimeInterface|null
    {
        return $this->lastProbeTime;
    }

    /**
     * lastProbeTime is the time we probed the condition.
     *
     * @return static
     */
    public function setLastProbeTime(DateTimeInterface $lastProbeTime): static
    {
        $this->lastProbeTime = $lastProbeTime;

        return $this;
    }

    /**
     * lastTransitionTime is the time the condition transitioned from one status to another.
     */
    public function getLastTransitionTime(): DateTimeInterface|null
    {
        return $this->lastTransitionTime;
    }

    /**
     * lastTransitionTime is the time the condition transitioned from one status to another.
     *
     * @return static
     */
    public function setLastTransitionTime(DateTimeInterface $lastTransitionTime): static
    {
        $this->lastTransitionTime = $lastTransitionTime;

        return $this;
    }

    /**
     * message is the human-readable message indicating details about last transition.
     */
    public function getMessage(): string|null
    {
        return $this->message;
    }

    /**
     * message is the human-readable message indicating details about last transition.
     *
     * @return static
     */
    public function setMessage(string $message): static
    {
        $this->message = $message;

        return $this;
    }

    /**
     * reason is a unique, this should be a short, machine understandable string that gives the reason for
     * condition's last transition. If it reports "Resizing" that means the underlying persistent volume is
     * being resized.
     */
    public function getReason(): string|null
    {
        return $this->reason;
    }

    /**
     * reason is a unique, this should be a short, machine understandable string that gives the reason for
     * condition's last transition. If it reports "Resizing" that means the underlying persistent volume is
     * being resized.
     *
     * @return static
     */
    public function setReason(string $reason): static
    {
        $this->reason = $reason;

        return $this;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    /** @return static */
    public function setStatus(string $status): static
    {
        $this->status = $status;

        return $this;
    }

    public function getType(): string
    {
        return $this->type;
    }

    /** @return static */
    public function setType(string $type): static
    {
        $this->type = $type;

        return $this;
    }
}
