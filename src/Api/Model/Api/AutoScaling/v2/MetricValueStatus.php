<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\AutoScaling\v2;

use Kcs\K8s\Attribute as Kubernetes;

/**
 * MetricValueStatus holds the current value for a metric
 */
class MetricValueStatus
{
    #[Kubernetes\Attribute('averageUtilization')]
    protected int|null $averageUtilization = null;

    #[Kubernetes\Attribute('averageValue')]
    protected string|null $averageValue = null;

    #[Kubernetes\Attribute('value')]
    protected string|null $value = null;

    public function __construct(int|null $averageUtilization = null, string|null $averageValue = null, string|null $value = null)
    {
        $this->averageUtilization = $averageUtilization;
        $this->averageValue = $averageValue;
        $this->value = $value;
    }

    /**
     * currentAverageUtilization is the current value of the average of the resource metric across all
     * relevant pods, represented as a percentage of the requested value of the resource for the pods.
     */
    public function getAverageUtilization(): int|null
    {
        return $this->averageUtilization;
    }

    /**
     * currentAverageUtilization is the current value of the average of the resource metric across all
     * relevant pods, represented as a percentage of the requested value of the resource for the pods.
     *
     * @return static
     */
    public function setAverageUtilization(int $averageUtilization): static
    {
        $this->averageUtilization = $averageUtilization;

        return $this;
    }

    /**
     * averageValue is the current value of the average of the metric across all relevant pods (as a
     * quantity)
     */
    public function getAverageValue(): string
    {
        return $this->averageValue;
    }

    /**
     * averageValue is the current value of the average of the metric across all relevant pods (as a
     * quantity)
     *
     * @return static
     */
    public function setAverageValue(string $averageValue): static
    {
        $this->averageValue = $averageValue;

        return $this;
    }

    /**
     * value is the current value of the metric (as a quantity).
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * value is the current value of the metric (as a quantity).
     *
     * @return static
     */
    public function setValue(string $value): static
    {
        $this->value = $value;

        return $this;
    }
}
