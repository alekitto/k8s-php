<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\AutoScaling\v2;

use Kcs\K8s\Attribute as Kubernetes;

/**
 * MetricTarget defines the target value, average value, or average utilization of a specific metric
 */
class MetricTarget
{
    #[Kubernetes\Attribute('averageUtilization')]
    protected int|null $averageUtilization = null;

    #[Kubernetes\Attribute('averageValue')]
    protected string|null $averageValue = null;

    #[Kubernetes\Attribute('type', required: true)]
    protected string $type;

    #[Kubernetes\Attribute('value')]
    protected string|null $value = null;

    public function __construct(string $type)
    {
        $this->type = $type;
    }

    /**
     * averageUtilization is the target value of the average of the resource metric across all relevant
     * pods, represented as a percentage of the requested value of the resource for the pods. Currently
     * only valid for Resource metric source type
     */
    public function getAverageUtilization(): int|null
    {
        return $this->averageUtilization;
    }

    /**
     * averageUtilization is the target value of the average of the resource metric across all relevant
     * pods, represented as a percentage of the requested value of the resource for the pods. Currently
     * only valid for Resource metric source type
     *
     * @return static
     */
    public function setAverageUtilization(int $averageUtilization): static
    {
        $this->averageUtilization = $averageUtilization;

        return $this;
    }

    /**
     * averageValue is the target value of the average of the metric across all relevant pods (as a
     * quantity)
     */
    public function getAverageValue(): string
    {
        return $this->averageValue;
    }

    /**
     * averageValue is the target value of the average of the metric across all relevant pods (as a
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
     * type represents whether the metric type is Utilization, Value, or AverageValue
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * type represents whether the metric type is Utilization, Value, or AverageValue
     *
     * @return static
     */
    public function setType(string $type): static
    {
        $this->type = $type;

        return $this;
    }

    /**
     * value is the target value of the metric (as a quantity).
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * value is the target value of the metric (as a quantity).
     *
     * @return static
     */
    public function setValue(string $value): static
    {
        $this->value = $value;

        return $this;
    }
}
