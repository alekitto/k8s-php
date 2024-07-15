<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\AutoScaling\v2;

use Kcs\K8s\Attribute as Kubernetes;

/**
 * HPAScalingPolicy is a single policy which must hold true for a specified past interval.
 */
class HPAScalingPolicy
{
    #[Kubernetes\Attribute('periodSeconds', required: true)]
    protected int $periodSeconds;

    #[Kubernetes\Attribute('type', required: true)]
    protected string $type;

    #[Kubernetes\Attribute('value', required: true)]
    protected int $value;

    public function __construct(int $periodSeconds, string $type, int $value)
    {
        $this->periodSeconds = $periodSeconds;
        $this->type = $type;
        $this->value = $value;
    }

    /**
     * periodSeconds specifies the window of time for which the policy should hold true. PeriodSeconds must
     * be greater than zero and less than or equal to 1800 (30 min).
     */
    public function getPeriodSeconds(): int
    {
        return $this->periodSeconds;
    }

    /**
     * periodSeconds specifies the window of time for which the policy should hold true. PeriodSeconds must
     * be greater than zero and less than or equal to 1800 (30 min).
     *
     * @return static
     */
    public function setPeriodSeconds(int $periodSeconds): static
    {
        $this->periodSeconds = $periodSeconds;

        return $this;
    }

    /**
     * type is used to specify the scaling policy.
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * type is used to specify the scaling policy.
     *
     * @return static
     */
    public function setType(string $type): static
    {
        $this->type = $type;

        return $this;
    }

    /**
     * value contains the amount of change which is permitted by the policy. It must be greater than zero
     */
    public function getValue(): int
    {
        return $this->value;
    }

    /**
     * value contains the amount of change which is permitted by the policy. It must be greater than zero
     *
     * @return static
     */
    public function setValue(int $value): static
    {
        $this->value = $value;

        return $this;
    }
}
