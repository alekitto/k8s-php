<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\ApiServerInternal\v1alpha1;

use DateTimeInterface;
use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;

/**
 * Describes the state of the storageVersion at a certain point.
 */
class StorageVersionCondition
{
    #[Kubernetes\Attribute('lastTransitionTime', type: AttributeType::DateTime)]
    protected DateTimeInterface|null $lastTransitionTime = null;

    #[Kubernetes\Attribute('message', required: true)]
    protected string $message;

    #[Kubernetes\Attribute('observedGeneration')]
    protected int|null $observedGeneration = null;

    #[Kubernetes\Attribute('reason', required: true)]
    protected string $reason;

    #[Kubernetes\Attribute('status', required: true)]
    protected string $status;

    #[Kubernetes\Attribute('type', required: true)]
    protected string $type;

    public function __construct(string $message, string $reason, string $status, string $type)
    {
        $this->message = $message;
        $this->reason = $reason;
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
    public function getMessage(): string
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
     * If set, this represents the .metadata.generation that the condition was set based upon.
     */
    public function getObservedGeneration(): int|null
    {
        return $this->observedGeneration;
    }

    /**
     * If set, this represents the .metadata.generation that the condition was set based upon.
     *
     * @return static
     */
    public function setObservedGeneration(int $observedGeneration): static
    {
        $this->observedGeneration = $observedGeneration;

        return $this;
    }

    /**
     * The reason for the condition's last transition.
     */
    public function getReason(): string
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
     * Type of the condition.
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * Type of the condition.
     *
     * @return static
     */
    public function setType(string $type): static
    {
        $this->type = $type;

        return $this;
    }
}
