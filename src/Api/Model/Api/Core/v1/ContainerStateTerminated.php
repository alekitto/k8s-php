<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Core\v1;

use DateTimeInterface;
use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;

/**
 * ContainerStateTerminated is a terminated state of a container.
 */
class ContainerStateTerminated
{
    #[Kubernetes\Attribute('containerID')]
    protected string|null $containerID = null;

    #[Kubernetes\Attribute('exitCode', required: true)]
    protected int $exitCode;

    #[Kubernetes\Attribute('finishedAt', type: AttributeType::DateTime)]
    protected DateTimeInterface|null $finishedAt = null;

    #[Kubernetes\Attribute('message')]
    protected string|null $message = null;

    #[Kubernetes\Attribute('reason')]
    protected string|null $reason = null;

    #[Kubernetes\Attribute('signal')]
    protected int|null $signal = null;

    #[Kubernetes\Attribute('startedAt', type: AttributeType::DateTime)]
    protected DateTimeInterface|null $startedAt = null;

    public function __construct(int $exitCode)
    {
        $this->exitCode = $exitCode;
    }

    /**
     * Container's ID in the format '<type>://<container_id>'
     */
    public function getContainerID(): string|null
    {
        return $this->containerID;
    }

    /**
     * Container's ID in the format '<type>://<container_id>'
     *
     * @return static
     */
    public function setContainerID(string $containerID): static
    {
        $this->containerID = $containerID;

        return $this;
    }

    /**
     * Exit status from the last termination of the container
     */
    public function getExitCode(): int
    {
        return $this->exitCode;
    }

    /**
     * Exit status from the last termination of the container
     *
     * @return static
     */
    public function setExitCode(int $exitCode): static
    {
        $this->exitCode = $exitCode;

        return $this;
    }

    /**
     * Time at which the container last terminated
     */
    public function getFinishedAt(): DateTimeInterface|null
    {
        return $this->finishedAt;
    }

    /**
     * Time at which the container last terminated
     *
     * @return static
     */
    public function setFinishedAt(DateTimeInterface $finishedAt): static
    {
        $this->finishedAt = $finishedAt;

        return $this;
    }

    /**
     * Message regarding the last termination of the container
     */
    public function getMessage(): string|null
    {
        return $this->message;
    }

    /**
     * Message regarding the last termination of the container
     *
     * @return static
     */
    public function setMessage(string $message): static
    {
        $this->message = $message;

        return $this;
    }

    /**
     * (brief) reason from the last termination of the container
     */
    public function getReason(): string|null
    {
        return $this->reason;
    }

    /**
     * (brief) reason from the last termination of the container
     *
     * @return static
     */
    public function setReason(string $reason): static
    {
        $this->reason = $reason;

        return $this;
    }

    /**
     * Signal from the last termination of the container
     */
    public function getSignal(): int|null
    {
        return $this->signal;
    }

    /**
     * Signal from the last termination of the container
     *
     * @return static
     */
    public function setSignal(int $signal): static
    {
        $this->signal = $signal;

        return $this;
    }

    /**
     * Time at which previous execution of the container started
     */
    public function getStartedAt(): DateTimeInterface|null
    {
        return $this->startedAt;
    }

    /**
     * Time at which previous execution of the container started
     *
     * @return static
     */
    public function setStartedAt(DateTimeInterface $startedAt): static
    {
        $this->startedAt = $startedAt;

        return $this;
    }
}
