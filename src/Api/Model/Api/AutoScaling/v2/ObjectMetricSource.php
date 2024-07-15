<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\AutoScaling\v2;

use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;

/**
 * ObjectMetricSource indicates how to scale on a metric describing a kubernetes object (for example,
 * hits-per-second on an Ingress object).
 */
class ObjectMetricSource
{
    #[Kubernetes\Attribute(
        'describedObject',
        type: AttributeType::Model,
        model: CrossVersionObjectReference::class,
        required: true,
    )]
    protected CrossVersionObjectReference $describedObject;

    #[Kubernetes\Attribute('metric', type: AttributeType::Model, model: MetricIdentifier::class, required: true)]
    protected MetricIdentifier $metric;

    #[Kubernetes\Attribute('target', type: AttributeType::Model, model: MetricTarget::class, required: true)]
    protected MetricTarget $target;

    public function __construct(
        CrossVersionObjectReference $describedObject,
        MetricIdentifier $metric,
        MetricTarget $target,
    ) {
        $this->describedObject = $describedObject;
        $this->metric = $metric;
        $this->target = $target;
    }

    /**
     * describedObject specifies the descriptions of a object,such as kind,name apiVersion
     */
    public function getDescribedObject(): CrossVersionObjectReference
    {
        return $this->describedObject;
    }

    /**
     * describedObject specifies the descriptions of a object,such as kind,name apiVersion
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

    /**
     * target specifies the target value for the given metric
     */
    public function getTarget(): MetricTarget
    {
        return $this->target;
    }

    /**
     * target specifies the target value for the given metric
     *
     * @return static
     */
    public function setTarget(MetricTarget $target): static
    {
        $this->target = $target;

        return $this;
    }
}
