<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\FlowControl\v1beta3;

use DateTimeInterface;
use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;

/**
 * PriorityLevelConfigurationCondition defines the condition of priority level.
 */
class PriorityLevelConfigurationCondition
{
    #[Kubernetes\Attribute('lastTransitionTime', type: AttributeType::DateTime)]
    protected DateTimeInterface|null $lastTransitionTime = null;

    #[Kubernetes\Attribute('message')]
    protected string|null $message = null;

    #[Kubernetes\Attribute('reason')]
    protected string|null $reason = null;

    #[Kubernetes\Attribute('status')]
    protected string|null $status = null;

    #[Kubernetes\Attribute('type')]
    protected string|null $type = null;

    public function __construct(
        DateTimeInterface|null $lastTransitionTime = null,
        string|null $message = null,
        string|null $reason = null,
        string|null $status = null,
        string|null $type = null,
    ) {
        $this->lastTransitionTime = $lastTransitionTime;
        $this->message = $message;
        $this->reason = $reason;
        $this->status = $status;
        $this->type = $type;
    }

    /**
     * `lastTransitionTime` is the last time the condition transitioned from one status to another.
     */
    public function getLastTransitionTime(): DateTimeInterface|null
    {
        return $this->lastTransitionTime;
    }

    /**
     * `lastTransitionTime` is the last time the condition transitioned from one status to another.
     *
     * @return static
     */
    public function setLastTransitionTime(DateTimeInterface $lastTransitionTime): static
    {
        $this->lastTransitionTime = $lastTransitionTime;

        return $this;
    }

    /**
     * `message` is a human-readable message indicating details about last transition.
     */
    public function getMessage(): string|null
    {
        return $this->message;
    }

    /**
     * `message` is a human-readable message indicating details about last transition.
     *
     * @return static
     */
    public function setMessage(string $message): static
    {
        $this->message = $message;

        return $this;
    }

    /**
     * `reason` is a unique, one-word, CamelCase reason for the condition's last transition.
     */
    public function getReason(): string|null
    {
        return $this->reason;
    }

    /**
     * `reason` is a unique, one-word, CamelCase reason for the condition's last transition.
     *
     * @return static
     */
    public function setReason(string $reason): static
    {
        $this->reason = $reason;

        return $this;
    }

    /**
     * `status` is the status of the condition. Can be True, False, Unknown. Required.
     */
    public function getStatus(): string|null
    {
        return $this->status;
    }

    /**
     * `status` is the status of the condition. Can be True, False, Unknown. Required.
     *
     * @return static
     */
    public function setStatus(string $status): static
    {
        $this->status = $status;

        return $this;
    }

    /**
     * `type` is the type of the condition. Required.
     */
    public function getType(): string|null
    {
        return $this->type;
    }

    /**
     * `type` is the type of the condition. Required.
     *
     * @return static
     */
    public function setType(string $type): static
    {
        $this->type = $type;

        return $this;
    }
}
