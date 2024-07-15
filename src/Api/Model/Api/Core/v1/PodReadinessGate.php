<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Core\v1;

use Kcs\K8s\Attribute as Kubernetes;

/**
 * PodReadinessGate contains the reference to a pod condition
 */
class PodReadinessGate
{
    #[Kubernetes\Attribute('conditionType', required: true)]
    protected string $conditionType;

    public function __construct(string $conditionType)
    {
        $this->conditionType = $conditionType;
    }

    /**
     * ConditionType refers to a condition in the pod's condition list with matching type.
     */
    public function getConditionType(): string
    {
        return $this->conditionType;
    }

    /**
     * ConditionType refers to a condition in the pod's condition list with matching type.
     *
     * @return static
     */
    public function setConditionType(string $conditionType): static
    {
        $this->conditionType = $conditionType;

        return $this;
    }
}
