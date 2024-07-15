<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Core\v1;

use Kcs\K8s\Attribute as Kubernetes;

/**
 * ContainerStateWaiting is a waiting state of a container.
 */
class ContainerStateWaiting
{
    #[Kubernetes\Attribute('message')]
    protected string|null $message = null;

    #[Kubernetes\Attribute('reason')]
    protected string|null $reason = null;

    public function __construct(string|null $message = null, string|null $reason = null)
    {
        $this->message = $message;
        $this->reason = $reason;
    }

    /**
     * Message regarding why the container is not yet running.
     */
    public function getMessage(): string|null
    {
        return $this->message;
    }

    /**
     * Message regarding why the container is not yet running.
     *
     * @return static
     */
    public function setMessage(string $message): static
    {
        $this->message = $message;

        return $this;
    }

    /**
     * (brief) reason the container is not yet running.
     */
    public function getReason(): string|null
    {
        return $this->reason;
    }

    /**
     * (brief) reason the container is not yet running.
     *
     * @return static
     */
    public function setReason(string $reason): static
    {
        $this->reason = $reason;

        return $this;
    }
}
