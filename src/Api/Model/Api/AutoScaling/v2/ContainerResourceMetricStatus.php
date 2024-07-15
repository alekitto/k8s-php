<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\AutoScaling\v2;

use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;

/**
 * ContainerResourceMetricStatus indicates the current value of a resource metric known to Kubernetes,
 * as specified in requests and limits, describing a single container in each pod in the current scale
 * target (e.g. CPU or memory).  Such metrics are built in to Kubernetes, and have special scaling
 * options on top of those available to normal per-pod metrics using the "pods" source.
 */
class ContainerResourceMetricStatus
{
    #[Kubernetes\Attribute('container', required: true)]
    protected string $container;

    #[Kubernetes\Attribute('current', type: AttributeType::Model, model: MetricValueStatus::class, required: true)]
    protected MetricValueStatus $current;

    #[Kubernetes\Attribute('name', required: true)]
    protected string $name;

    public function __construct(string $container, MetricValueStatus $current, string $name)
    {
        $this->container = $container;
        $this->current = $current;
        $this->name = $name;
    }

    /**
     * container is the name of the container in the pods of the scaling target
     */
    public function getContainer(): string
    {
        return $this->container;
    }

    /**
     * container is the name of the container in the pods of the scaling target
     *
     * @return static
     */
    public function setContainer(string $container): static
    {
        $this->container = $container;

        return $this;
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
}
