<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\AutoScaling\v2;

use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;
use Kcs\K8s\Collection;

/**
 * HorizontalPodAutoscalerSpec describes the desired functionality of the HorizontalPodAutoscaler.
 */
class HorizontalPodAutoscalerSpec
{
    #[Kubernetes\Attribute('behavior', type: AttributeType::Model, model: HorizontalPodAutoscalerBehavior::class)]
    protected HorizontalPodAutoscalerBehavior|null $behavior = null;

    #[Kubernetes\Attribute('maxReplicas', required: true)]
    protected int $maxReplicas;

    /** @var iterable|MetricSpec[]|null */
    #[Kubernetes\Attribute('metrics', type: AttributeType::Collection, model: MetricSpec::class)]
    protected $metrics = null;

    #[Kubernetes\Attribute('minReplicas')]
    protected int|null $minReplicas = null;

    #[Kubernetes\Attribute(
        'scaleTargetRef',
        type: AttributeType::Model,
        model: CrossVersionObjectReference::class,
        required: true,
    )]
    protected CrossVersionObjectReference $scaleTargetRef;

    public function __construct(int $maxReplicas, CrossVersionObjectReference $scaleTargetRef)
    {
        $this->maxReplicas = $maxReplicas;
        $this->scaleTargetRef = $scaleTargetRef;
    }

    /**
     * behavior configures the scaling behavior of the target in both Up and Down directions (scaleUp and
     * scaleDown fields respectively). If not set, the default HPAScalingRules for scale up and scale down
     * are used.
     */
    public function getBehavior(): HorizontalPodAutoscalerBehavior|null
    {
        return $this->behavior;
    }

    /**
     * behavior configures the scaling behavior of the target in both Up and Down directions (scaleUp and
     * scaleDown fields respectively). If not set, the default HPAScalingRules for scale up and scale down
     * are used.
     *
     * @return static
     */
    public function setBehavior(HorizontalPodAutoscalerBehavior $behavior): static
    {
        $this->behavior = $behavior;

        return $this;
    }

    /**
     * maxReplicas is the upper limit for the number of replicas to which the autoscaler can scale up. It
     * cannot be less that minReplicas.
     */
    public function getMaxReplicas(): int
    {
        return $this->maxReplicas;
    }

    /**
     * maxReplicas is the upper limit for the number of replicas to which the autoscaler can scale up. It
     * cannot be less that minReplicas.
     *
     * @return static
     */
    public function setMaxReplicas(int $maxReplicas): static
    {
        $this->maxReplicas = $maxReplicas;

        return $this;
    }

    /**
     * metrics contains the specifications for which to use to calculate the desired replica count (the
     * maximum replica count across all metrics will be used).  The desired replica count is calculated
     * multiplying the ratio between the target value and the current value by the current number of pods.
     * Ergo, metrics used must decrease as the pod count is increased, and vice-versa.  See the individual
     * metric source types for more information about how each type of metric must respond. If not set, the
     * default metric will be set to 80% average CPU utilization.
     *
     * @return iterable|MetricSpec[]
     */
    public function getMetrics(): iterable|null
    {
        return $this->metrics;
    }

    /**
     * metrics contains the specifications for which to use to calculate the desired replica count (the
     * maximum replica count across all metrics will be used).  The desired replica count is calculated
     * multiplying the ratio between the target value and the current value by the current number of pods.
     * Ergo, metrics used must decrease as the pod count is increased, and vice-versa.  See the individual
     * metric source types for more information about how each type of metric must respond. If not set, the
     * default metric will be set to 80% average CPU utilization.
     *
     * @return static
     */
    public function setMetrics(iterable $metrics): static
    {
        $this->metrics = $metrics;

        return $this;
    }

    /** @return static */
    public function addMetrics(MetricSpec $metric): static
    {
        if (! $this->metrics) {
            $this->metrics = new Collection();
        }

        $this->metrics[] = $metric;

        return $this;
    }

    /**
     * minReplicas is the lower limit for the number of replicas to which the autoscaler can scale down.
     * It defaults to 1 pod.  minReplicas is allowed to be 0 if the alpha feature gate HPAScaleToZero is
     * enabled and at least one Object or External metric is configured.  Scaling is active as long as at
     * least one metric value is available.
     */
    public function getMinReplicas(): int|null
    {
        return $this->minReplicas;
    }

    /**
     * minReplicas is the lower limit for the number of replicas to which the autoscaler can scale down.
     * It defaults to 1 pod.  minReplicas is allowed to be 0 if the alpha feature gate HPAScaleToZero is
     * enabled and at least one Object or External metric is configured.  Scaling is active as long as at
     * least one metric value is available.
     *
     * @return static
     */
    public function setMinReplicas(int $minReplicas): static
    {
        $this->minReplicas = $minReplicas;

        return $this;
    }

    /**
     * scaleTargetRef points to the target resource to scale, and is used to the pods for which metrics
     * should be collected, as well as to actually change the replica count.
     */
    public function getScaleTargetRef(): CrossVersionObjectReference
    {
        return $this->scaleTargetRef;
    }

    /**
     * scaleTargetRef points to the target resource to scale, and is used to the pods for which metrics
     * should be collected, as well as to actually change the replica count.
     *
     * @return static
     */
    public function setScaleTargetRef(CrossVersionObjectReference $scaleTargetRef): static
    {
        $this->scaleTargetRef = $scaleTargetRef;

        return $this;
    }
}
