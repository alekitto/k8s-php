<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Apps\v1;

use DateTimeInterface;
use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;

/**
 * DaemonSetCondition describes the state of a DaemonSet at a certain point.
 */
class DaemonSetCondition
{
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
     * Last time the condition transitioned from one status to another.
     */
    public function getLastTransitionTime(): DateTimeInterface|null
    {
        return $this->lastTransitionTime;
    }

    /**
     * Last time the condition transitioned from one status to another.
     *
     * @return static
     */
    public function setLastTransitionTime(DateTimeInterface $lastTransitionTime): static
    {
        $this->lastTransitionTime = $lastTransitionTime;

        return $this;
    }

    /**
     * A human readable message indicating details about the transition.
     */
    public function getMessage(): string|null
    {
        return $this->message;
    }

    /**
     * A human readable message indicating details about the transition.
     *
     * @return static
     */
    public function setMessage(string $message): static
    {
        $this->message = $message;

        return $this;
    }

    /**
     * The reason for the condition's last transition.
     */
    public function getReason(): string|null
    {
        return $this->reason;
    }

    /**
     * The reason for the condition's last transition.
     *
     * @return static
     */
    public function setReason(string $reason): static
    {
        $this->reason = $reason;

        return $this;
    }

    /**
     * Status of the condition, one of True, False, Unknown.
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * Status of the condition, one of True, False, Unknown.
     *
     * @return static
     */
    public function setStatus(string $status): static
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Type of DaemonSet condition.
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * Type of DaemonSet condition.
     *
     * @return static
     */
    public function setType(string $type): static
    {
        $this->type = $type;

        return $this;
    }
}
