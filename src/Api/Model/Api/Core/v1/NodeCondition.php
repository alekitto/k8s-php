<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Core\v1;

use DateTimeInterface;
use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;

/**
 * NodeCondition contains condition information for a node.
 */
class NodeCondition
{
    #[Kubernetes\Attribute('lastHeartbeatTime', type: AttributeType::DateTime)]
    protected DateTimeInterface|null $lastHeartbeatTime = null;

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
     * Last time we got an update on a given condition.
     */
    public function getLastHeartbeatTime(): DateTimeInterface|null
    {
        return $this->lastHeartbeatTime;
    }

    /**
     * Last time we got an update on a given condition.
     *
     * @return static
     */
    public function setLastHeartbeatTime(DateTimeInterface $lastHeartbeatTime): static
    {
        $this->lastHeartbeatTime = $lastHeartbeatTime;

        return $this;
    }

    /**
     * Last time the condition transit from one status to another.
     */
    public function getLastTransitionTime(): DateTimeInterface|null
    {
        return $this->lastTransitionTime;
    }

    /**
     * Last time the condition transit from one status to another.
     *
     * @return static
     */
    public function setLastTransitionTime(DateTimeInterface $lastTransitionTime): static
    {
        $this->lastTransitionTime = $lastTransitionTime;

        return $this;
    }

    /**
     * Human readable message indicating details about last transition.
     */
    public function getMessage(): string|null
    {
        return $this->message;
    }

    /**
     * Human readable message indicating details about last transition.
     *
     * @return static
     */
    public function setMessage(string $message): static
    {
        $this->message = $message;

        return $this;
    }

    /**
     * (brief) reason for the condition's last transition.
     */
    public function getReason(): string|null
    {
        return $this->reason;
    }

    /**
     * (brief) reason for the condition's last transition.
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
     * Type of node condition.
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * Type of node condition.
     *
     * @return static
     */
    public function setType(string $type): static
    {
        $this->type = $type;

        return $this;
    }
}
