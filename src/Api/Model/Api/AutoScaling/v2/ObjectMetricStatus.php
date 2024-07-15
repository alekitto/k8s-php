<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\AutoScaling\v2;

use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;

/**
 * ObjectMetricStatus indicates the current value of a metric describing a kubernetes object (for
 * example, hits-per-second on an Ingress object).
 */
class ObjectMetricStatus
{
    #[Kubernetes\Attribute('current', type: AttributeType::Model, model: MetricValueStatus::class, required: true)]
    protected MetricValueStatus $current;

    #[Kubernetes\Attribute(
        'describedObject',
        type: AttributeType::Model,
        model: CrossVersionObjectReference::class,
        required: true,
    )]
    protected CrossVersionObjectReference $describedObject;

    #[Kubernetes\Attribute('metric', type: AttributeType::Model, model: MetricIdentifier::class, required: true)]
    protected MetricIdentifier $metric;

    public function __construct(
        MetricValueStatus $current,
        CrossVersionObjectReference $describedObject,
        MetricIdentifier $metric,
    ) {
        $this->current = $current;
        $this->describedObject = $describedObject;
        $this->metric = $metric;
    }

    /**
     * current contains the current value for the given metric
     */
    public function getCurrent(): MetricValueStatus
    {
        return $this->current;
    }

    /**
     * current contains the current value for the given metric
     *
     * @return static
     */
    public function setCurrent(MetricValueStatus $current): static
    {
        $this->current = $current;

        return $this;
    }

    /**
     * DescribedObject specifies the descriptions of a object,such as kind,name apiVersion
     */
    public function getDescribedObject(): CrossVersionObjectReference
    {
        return $this->describedObject;
    }

    /**
     * DescribedObject specifies the descriptions of a object,such as kind,name apiVersion
     *
     * @return static
     */
    public function setDescribedObject(CrossVersionObjectReference $describedObject): static
    {
        $this->describedObject = $describedObject;

        return $this;
    }

    /**
     * metric identifies the target metric by name and selector
     */
    public function getMetric(): MetricIdentifier
    {
        return $this->metric;
    }

    /**
     * metric identifies the target metric by name and selector
     *
     * @return static
     */
    public function setMetric(MetricIdentifier $metric): static
    {
        $this->metric = $metric;

        return $this;
    }
}
