<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\AutoScaling\v2;

use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;

/**
 * MetricStatus describes the last-read state of a single metric.
 */
class MetricStatus
{
    #[Kubernetes\Attribute('containerResource', type: AttributeType::Model, model: ContainerResourceMetricStatus::class)]
    protected ContainerResourceMetricStatus|null $containerResource = null;

    #[Kubernetes\Attribute('external', type: AttributeType::Model, model: ExternalMetricStatus::class)]
    protected ExternalMetricStatus|null $external = null;

    #[Kubernetes\Attribute('object', type: AttributeType::Model, model: ObjectMetricStatus::class)]
    protected ObjectMetricStatus|null $object = null;

    #[Kubernetes\Attribute('pods', type: AttributeType::Model, model: PodsMetricStatus::class)]
    protected PodsMetricStatus|null $pods = null;

    #[Kubernetes\Attribute('resource', type: AttributeType::Model, model: ResourceMetricStatus::class)]
    protected ResourceMetricStatus|null $resource = null;

    #[Kubernetes\Attribute('type', required: true)]
    protected string $type;

    public function __construct(string $type)
    {
        $this->type = $type;
    }

    /**
     * container resource refers to a resource metric (such as those specified in requests and limits)
     * known to Kubernetes describing a single container in each pod in the current scale target (e.g. CPU
     * or memory). Such metrics are built in to Kubernetes, and have special scaling options on top of
     * those available to normal per-pod metrics using the "pods" source.
     */
    public function getContainerResource(): ContainerResourceMetricStatus|null
    {
        return $this->containerResource;
    }

    /**
     * container resource refers to a resource metric (such as those specified in requests and limits)
     * known to Kubernetes describing a single container in each pod in the current scale target (e.g. CPU
     * or memory). Such metrics are built in to Kubernetes, and have special scaling options on top of
     * those available to normal per-pod metrics using the "pods" source.
     *
     * @return static
     */
    public function setContainerResource(ContainerResourceMetricStatus $containerResource): static
    {
        $this->containerResource = $containerResource;

        return $this;
    }

    /**
     * external refers to a global metric that is not associated with any Kubernetes object. It allows
     * autoscaling based on information coming from components running outside of cluster (for example
     * length of queue in cloud messaging service, or QPS from loadbalancer running outside of cluster).
     */
    public function getExternal(): ExternalMetricStatus|null
    {
        return $this->external;
    }

    /**
     * external refers to a global metric that is not associated with any Kubernetes object. It allows
     * autoscaling based on information coming from components running outside of cluster (for example
     * length of queue in cloud messaging service, or QPS from loadbalancer running outside of cluster).
     *
     * @return static
     */
    public function setExternal(ExternalMetricStatus $external): static
    {
        $this->external = $external;

        return $this;
    }

    /**
     * object refers to a metric describing a single kubernetes object (for example, hits-per-second on an
     * Ingress object).
     */
    public function getObject(): ObjectMetricStatus|null
    {
        return $this->object;
    }

    /**
     * object refers to a metric describing a single kubernetes object (for example, hits-per-second on an
     * Ingress object).
     *
     * @return static
     */
    public function setObject(ObjectMetricStatus $object): static
    {
        $this->object = $object;

        return $this;
    }

    /**
     * pods refers to a metric describing each pod in the current scale target (for example,
     * transactions-processed-per-second).  The values will be averaged together before being compared to
     * the target value.
     */
    public function getPods(): PodsMetricStatus|null
    {
        return $this->pods;
    }

    /**
     * pods refers to a metric describing each pod in the current scale target (for example,
     * transactions-processed-per-second).  The values will be averaged together before being compared to
     * the target value.
     *
     * @return static
     */
    public function setPods(PodsMetricStatus $pods): static
    {
        $this->pods = $pods;

        return $this;
    }

    /**
     * resource refers to a resource metric (such as those specified in requests and limits) known to
     * Kubernetes describing each pod in the current scale target (e.g. CPU or memory). Such metrics are
     * built in to Kubernetes, and have special scaling options on top of those available to normal per-pod
     * metrics using the "pods" source.
     */
    public function getResource(): ResourceMetricStatus|null
    {
        return $this->resource;
    }

    /**
     * resource refers to a resource metric (such as those specified in requests and limits) known to
     * Kubernetes describing each pod in the current scale target (e.g. CPU or memory). Such metrics are
     * built in to Kubernetes, and have special scaling options on top of those available to normal per-pod
     * metrics using the "pods" source.
     *
     * @return static
     */
    public function setResource(ResourceMetricStatus $resource): static
    {
        $this->resource = $resource;

        return $this;
    }

    /**
     * type is the type of metric source.  It will be one of "ContainerResource", "External", "Object",
     * "Pods" or "Resource", each corresponds to a matching field in the object. Note: "ContainerResource"
     * type is available on when the feature-gate HPAContainerMetrics is enabled
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * type is the type of metric source.  It will be one of "ContainerResource", "External", "Object",
     * "Pods" or "Resource", each corresponds to a matching field in the object. Note: "ContainerResource"
     * type is available on when the feature-gate HPAContainerMetrics is enabled
     *
     * @return static
     */
    public function setType(string $type): static
    {
        $this->type = $type;

        return $this;
    }
}
