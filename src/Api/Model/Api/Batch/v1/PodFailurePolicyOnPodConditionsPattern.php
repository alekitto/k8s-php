<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Batch\v1;

use Kcs\K8s\Attribute as Kubernetes;

/**
 * PodFailurePolicyOnPodConditionsPattern describes a pattern for matching an actual pod condition
 * type.
 */
class PodFailurePolicyOnPodConditionsPattern
{
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
     * Specifies the required Pod condition status. To match a pod condition it is required that the
     * specified status equals the pod condition status. Defaults to True.
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * Specifies the required Pod condition status. To match a pod condition it is required that the
     * specified status equals the pod condition status. Defaults to True.
     *
     * @return static
     */
    public function setStatus(string $status): static
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Specifies the required Pod condition type. To match a pod condition it is required that specified
     * type equals the pod condition type.
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * Specifies the required Pod condition type. To match a pod condition it is required that specified
     * type equals the pod condition type.
     *
     * @return static
     */
    public function setType(string $type): static
    {
        $this->type = $type;

        return $this;
    }
}
