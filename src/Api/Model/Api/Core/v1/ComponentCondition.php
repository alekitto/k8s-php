<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Core\v1;

use Kcs\K8s\Attribute as Kubernetes;

/**
 * Information about the condition of a component.
 */
class ComponentCondition
{
    #[Kubernetes\Attribute('error')]
    protected string|null $error = null;

    #[Kubernetes\Attribute('message')]
    protected string|null $message = null;

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
     * Condition error code for a component. For example, a health check error code.
     */
    public function getError(): string|null
    {
        return $this->error;
    }

    /**
     * Condition error code for a component. For example, a health check error code.
     *
     * @return static
     */
    public function setError(string $error): static
    {
        $this->error = $error;

        return $this;
    }

    /**
     * Message about the condition for a component. For example, information about a health check.
     */
    public function getMessage(): string|null
    {
        return $this->message;
    }

    /**
     * Message about the condition for a component. For example, information about a health check.
     *
     * @return static
     */
    public function setMessage(string $message): static
    {
        $this->message = $message;

        return $this;
    }

    /**
     * Status of the condition for a component. Valid values for "Healthy": "True", "False", or "Unknown".
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * Status of the condition for a component. Valid values for "Healthy": "True", "False", or "Unknown".
     *
     * @return static
     */
    public function setStatus(string $status): static
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Type of condition for a component. Valid value: "Healthy"
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * Type of condition for a component. Valid value: "Healthy"
     *
     * @return static
     */
    public function setType(string $type): static
    {
        $this->type = $type;

        return $this;
    }
}
