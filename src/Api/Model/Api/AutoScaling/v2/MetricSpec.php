<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\AutoScaling\v2;

use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;

/**
 * MetricSpec specifies how to scale based on a single metric (only `type` and one other matching field
 * should be set at once).
 */
class MetricSpec
{
    #[Kubernetes\Attribute('containerResource', type: AttributeType::Model, model: ContainerResourceMetricSource::class)]
    protected ContainerResourceMetricSource|null $containerResource = null;

    #[Kubernetes\Attribute('external', type: AttributeType::Model, model: ExternalMetricSource::class)]
    protected ExternalMetricSource|null $external = null;

    #[Kubernetes\Attribute('object', type: AttributeType::Model, model: ObjectMetricSource::class)]
    protected ObjectMetricSource|null $object = null;

    #[Kubernetes\Attribute('pods', type: AttributeType::Model, model: PodsMetricSource::class)]
    protected PodsMetricSource|null $pods = null;

    #[Kubernetes\Attribute('resource', type: AttributeType::Model, model: ResourceMetricSource::class)]
    protected ResourceMetricSource|null $resource = null;

    #[Kubernetes\Attribute('type', required: true)]
    protected string $type;

    public function __construct(string $type)
    {
        $this->type = $type;
    }

    /**
     * containerResource refers to a resource metric (such as those specified in requests and limits) known
     * to Kubernetes describing a single container in each pod of the current scale target (e.g. CPU or
     * memory). Such metrics are built in to Kubernetes, and have special scaling options on top of those
     * available to normal per-pod metrics using the "pods" source. This is an alpha feature and can be
     * enabled by the HPAContainerMetrics feature flag.
     */
    public function getContainerResource(): ContainerResourceMetricSource|null
    {
        return $this->containerResource;
    }

    /**
     * containerResource refers to a resource metric (such as those specified in requests and limits) known
     * to Kubernetes describing a single container in each pod of the current scale target (e.g. CPU or
     * memory). Such metrics are built in to Kubernetes, and have special scaling options on top of those
     * available to normal per-pod metrics using the "pods" source. This is an alpha feature and can be
     * enabled by the HPAContainerMetrics feature flag.
     *
     * @return static
     */
    public function setContainerResource(ContainerResourceMetricSource $containerResource): static
    {
        $this->containerResource = $containerResource;

        return $this;
    }

    /**
     * external refers to a global metric that is not associated with any Kubernetes object. It allows
     * autoscaling based on information coming from components running outside of cluster (for example
     * length of queue in cloud messaging service, or QPS from loadbalancer running outside of cluster).
     */
    public function getExternal(): ExternalMetricSource|null
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
    public function setExternal(ExternalMetricSource $external): static
    {
        $this->external = $external;

        return $this;
    }

    /**
     * object refers to a metric describing a single kubernetes object (for example, hits-per-second on an
     * Ingress object).
     */
    public function getObject(): ObjectMetricSource|null
    {
        return $this->object;
    }

    /**
     * object refers to a metric describing a single kubernetes object (for example, hits-per-second on an
     * Ingress object).
     *
     * @return static
     */
    public function setObject(ObjectMetricSource $object): static
    {
        $this->object = $object;

        return $this;
    }

    /**
     * pods refers to a metric describing each pod in the current scale target (for example,
     * transactions-processed-per-second).  The values will be averaged together before being compared to
     * the target value.
     */
    public function getPods(): PodsMetricSource|null
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
    public function setPods(PodsMetricSource $pods): static
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
    public function getResource(): ResourceMetricSource|null
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
    public function setResource(ResourceMetricSource $resource): static
    {
        $this->resource = $resource;

        return $this;
    }

    /**
     * type is the type of metric source.  It should be one of "ContainerResource", "External", "Object",
     * "Pods" or "Resource", each mapping to a matching field in the object. Note: "ContainerResource" type
     * is available on when the feature-gate HPAContainerMetrics is enabled
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * type is the type of metric source.  It should be one of "ContainerResource", "External", "Object",
     * "Pods" or "Resource", each mapping to a matching field in the object. Note: "ContainerResource" type
     * is available on when the feature-gate HPAContainerMetrics is enabled
     *
     * @return static
     */
    public function setType(string $type): static
    {
        $this->type = $type;

        return $this;
    }
}
