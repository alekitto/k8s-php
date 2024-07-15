<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\AutoScaling\v2;

use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;

/**
 * ExternalMetricSource indicates how to scale on a metric not associated with any Kubernetes object
 * (for example length of queue in cloud messaging service, or QPS from loadbalancer running outside of
 * cluster).
 */
class ExternalMetricSource
{
    #[Kubernetes\Attribute('metric', type: AttributeType::Model, model: MetricIdentifier::class, required: true)]
    protected MetricIdentifier $metric;

    #[Kubernetes\Attribute('target', type: AttributeType::Model, model: MetricTarget::class, required: true)]
    protected MetricTarget $target;

    public function __construct(MetricIdentifier $metric, MetricTarget $target)
    {
        $this->metric = $metric;
        $this->target = $target;
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
