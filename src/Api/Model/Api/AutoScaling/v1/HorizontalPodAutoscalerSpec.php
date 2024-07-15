<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\AutoScaling\v1;

use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;

/**
 * specification of a horizontal pod autoscaler.
 */
class HorizontalPodAutoscalerSpec
{
    #[Kubernetes\Attribute('maxReplicas', required: true)]
    protected int $maxReplicas;

    #[Kubernetes\Attribute('minReplicas')]
    protected int|null $minReplicas = null;

    #[Kubernetes\Attribute(
        'scaleTargetRef',
        type: AttributeType::Model,
        model: CrossVersionObjectReference::class,
        required: true,
    )]
    protected CrossVersionObjectReference $scaleTargetRef;

    #[Kubernetes\Attribute('targetCPUUtilizationPercentage')]
    protected int|null $targetCPUUtilizationPercentage = null;

    public function __construct(int $maxReplicas, CrossVersionObjectReference $scaleTargetRef)
    {
        $this->maxReplicas = $maxReplicas;
        $this->scaleTargetRef = $scaleTargetRef;
    }

    /**
     * maxReplicas is the upper limit for the number of pods that can be set by the autoscaler; cannot be
     * smaller than MinReplicas.
     */
    public function getMaxReplicas(): int
    {
        return $this->maxReplicas;
    }

    /**
     * maxReplicas is the upper limit for the number of pods that can be set by the autoscaler; cannot be
     * smaller than MinReplicas.
     *
     * @return static
     */
    public function setMaxReplicas(int $maxReplicas): static
    {
        $this->maxReplicas = $maxReplicas;

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
     * reference to scaled resource; horizontal pod autoscaler will learn the current resource consumption
     * and will set the desired number of pods by using its Scale subresource.
     */
    public function getScaleTargetRef(): CrossVersionObjectReference
    {
        return $this->scaleTargetRef;
    }

    /**
     * reference to scaled resource; horizontal pod autoscaler will learn the current resource consumption
     * and will set the desired number of pods by using its Scale subresource.
     *
     * @return static
     */
    public function setScaleTargetRef(CrossVersionObjectReference $scaleTargetRef): static
    {
        $this->scaleTargetRef = $scaleTargetRef;

        return $this;
    }

    /**
     * targetCPUUtilizationPercentage is the target average CPU utilization (represented as a percentage of
     * requested CPU) over all the pods; if not specified the default autoscaling policy will be used.
     */
    public function getTargetCPUUtilizationPercentage(): int|null
    {
        return $this->targetCPUUtilizationPercentage;
    }

    /**
     * targetCPUUtilizationPercentage is the target average CPU utilization (represented as a percentage of
     * requested CPU) over all the pods; if not specified the default autoscaling policy will be used.
     *
     * @return static
     */
    public function setTargetCPUUtilizationPercentage(int $targetCPUUtilizationPercentage): static
    {
        $this->targetCPUUtilizationPercentage = $targetCPUUtilizationPercentage;

        return $this;
    }
}
