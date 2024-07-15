<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Core\v1;

use DateTimeInterface;
use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;

/**
 * PersistentVolumeStatus is the current status of a persistent volume.
 */
class PersistentVolumeStatus
{
    #[Kubernetes\Attribute('lastPhaseTransitionTime', type: AttributeType::DateTime)]
    protected DateTimeInterface|null $lastPhaseTransitionTime = null;

    #[Kubernetes\Attribute('message')]
    protected string|null $message = null;

    #[Kubernetes\Attribute('phase')]
    protected string|null $phase = null;

    #[Kubernetes\Attribute('reason')]
    protected string|null $reason = null;

    public function __construct(
        DateTimeInterface|null $lastPhaseTransitionTime = null,
        string|null $message = null,
        string|null $phase = null,
        string|null $reason = null,
    ) {
        $this->lastPhaseTransitionTime = $lastPhaseTransitionTime;
        $this->message = $message;
        $this->phase = $phase;
        $this->reason = $reason;
    }

    /**
     * lastPhaseTransitionTime is the time the phase transitioned from one to another and automatically
     * resets to current time everytime a volume phase transitions. This is a beta field and requires the
     * PersistentVolumeLastPhaseTransitionTime feature to be enabled (enabled by default).
     */
    public function getLastPhaseTransitionTime(): DateTimeInterface|null
    {
        return $this->lastPhaseTransitionTime;
    }

    /**
     * lastPhaseTransitionTime is the time the phase transitioned from one to another and automatically
     * resets to current time everytime a volume phase transitions. This is a beta field and requires the
     * PersistentVolumeLastPhaseTransitionTime feature to be enabled (enabled by default).
     *
     * @return static
     */
    public function setLastPhaseTransitionTime(DateTimeInterface $lastPhaseTransitionTime): static
    {
        $this->lastPhaseTransitionTime = $lastPhaseTransitionTime;

        return $this;
    }

    /**
     * message is a human-readable message indicating details about why the volume is in this state.
     */
    public function getMessage(): string|null
    {
        return $this->message;
    }

    /**
     * message is a human-readable message indicating details about why the volume is in this state.
     *
     * @return static
     */
    public function setMessage(string $message): static
    {
        $this->message = $message;

        return $this;
    }

    /**
     * phase indicates if a volume is available, bound to a claim, or released by a claim. More info:
     * https://kubernetes.io/docs/concepts/storage/persistent-volumes#phase
     */
    public function getPhase(): string|null
    {
        return $this->phase;
    }

    /**
     * phase indicates if a volume is available, bound to a claim, or released by a claim. More info:
     * https://kubernetes.io/docs/concepts/storage/persistent-volumes#phase
     *
     * @return static
     */
    public function setPhase(string $phase): static
    {
        $this->phase = $phase;

        return $this;
    }

    /**
     * reason is a brief CamelCase string that describes any failure and is meant for machine parsing and
     * tidy display in the CLI.
     */
    public function getReason(): string|null
    {
        return $this->reason;
    }

    /**
     * reason is a brief CamelCase string that describes any failure and is meant for machine parsing and
     * tidy display in the CLI.
     *
     * @return static
     */
    public function setReason(string $reason): static
    {
        $this->reason = $reason;

        return $this;
    }
}
