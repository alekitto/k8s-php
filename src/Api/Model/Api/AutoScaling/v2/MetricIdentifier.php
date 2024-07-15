<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\AutoScaling\v2;

use Kcs\K8s\Api\Model\ApiMachinery\Apis\Meta\v1\LabelSelector;
use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;

/**
 * MetricIdentifier defines the name and optionally selector for a metric
 */
class MetricIdentifier
{
    #[Kubernetes\Attribute('name', required: true)]
    protected string $name;

    #[Kubernetes\Attribute('selector', type: AttributeType::Model, model: LabelSelector::class)]
    protected LabelSelector|null $selector = null;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * name is the name of the given metric
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * name is the name of the given metric
     *
     * @return static
     */
    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    /**
     * selector is the string-encoded form of a standard kubernetes label selector for the given metric
     * When set, it is passed as an additional parameter to the metrics server for more specific metrics
     * scoping. When unset, just the metricName will be used to gather metrics.
     */
    public function getSelector(): LabelSelector|null
    {
        return $this->selector;
    }

    /**
     * selector is the string-encoded form of a standard kubernetes label selector for the given metric
     * When set, it is passed as an additional parameter to the metrics server for more specific metrics
     * scoping. When unset, just the metricName will be used to gather metrics.
     *
     * @return static
     */
    public function setSelector(LabelSelector $selector): static
    {
        $this->selector = $selector;

        return $this;
    }
}
