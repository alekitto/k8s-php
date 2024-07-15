<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\AutoScaling\v2;

use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;

/**
 * ResourceMetricSource indicates how to scale on a resource metric known to Kubernetes, as specified
 * in requests and limits, describing each pod in the current scale target (e.g. CPU or memory).  The
 * values will be averaged together before being compared to the target.  Such metrics are built in to
 * Kubernetes, and have special scaling options on top of those available to normal per-pod metrics
 * using the "pods" source.  Only one "target" type should be set.
 */
class ResourceMetricSource
{
    #[Kubernetes\Attribute('name', required: true)]
    protected string $name;

    #[Kubernetes\Attribute('target', type: AttributeType::Model, model: MetricTarget::class, required: true)]
    protected MetricTarget $target;

    public function __construct(string $name, MetricTarget $target)
    {
        $this->name = $name;
        $this->target = $target;
    }

    /**
     * name is the name of the resource in question.
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * name is the name of the resource in question.
     *
     * @return static
     */
    public function setName(string $name): static
    {
        $this->name = $name;

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
