<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\AutoScaling\v1;

use DateTimeInterface;
use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;

/**
 * current status of a horizontal pod autoscaler
 */
class HorizontalPodAutoscalerStatus
{
    #[Kubernetes\Attribute('currentCPUUtilizationPercentage')]
    protected int|null $currentCPUUtilizationPercentage = null;

    #[Kubernetes\Attribute('currentReplicas', required: true)]
    protected int $currentReplicas;

    #[Kubernetes\Attribute('desiredReplicas', required: true)]
    protected int $desiredReplicas;

    #[Kubernetes\Attribute('lastScaleTime', type: AttributeType::DateTime)]
    protected DateTimeInterface|null $lastScaleTime = null;

    #[Kubernetes\Attribute('observedGeneration')]
    protected int|null $observedGeneration = null;

    public function __construct(int $currentReplicas, int $desiredReplicas)
    {
        $this->currentReplicas = $currentReplicas;
        $this->desiredReplicas = $desiredReplicas;
    }

    /**
     * currentCPUUtilizationPercentage is the current average CPU utilization over all pods, represented as
     * a percentage of requested CPU, e.g. 70 means that an average pod is using now 70% of its requested
     * CPU.
     */
    public function getCurrentCPUUtilizationPercentage(): int|null
    {
        return $this->currentCPUUtilizationPercentage;
    }

    /**
     * currentCPUUtilizationPercentage is the current average CPU utilization over all pods, represented as
     * a percentage of requested CPU, e.g. 70 means that an average pod is using now 70% of its requested
     * CPU.
     *
     * @return static
     */
    public function setCurrentCPUUtilizationPercentage(int $currentCPUUtilizationPercentage): static
    {
        $this->currentCPUUtilizationPercentage = $currentCPUUtilizationPercentage;

        return $this;
    }

    /**
     * currentReplicas is the current number of replicas of pods managed by this autoscaler.
     */
    public function getCurrentReplicas(): int
    {
        return $this->currentReplicas;
    }

    /**
     * currentReplicas is the current number of replicas of pods managed by this autoscaler.
     *
     * @return static
     */
    public function setCurrentReplicas(int $currentReplicas): static
    {
        $this->currentReplicas = $currentReplicas;

        return $this;
    }

    /**
     * desiredReplicas is the  desired number of replicas of pods managed by this autoscaler.
     */
    public function getDesiredReplicas(): int
    {
        return $this->desiredReplicas;
    }

    /**
     * desiredReplicas is the  desired number of replicas of pods managed by this autoscaler.
     *
     * @return static
     */
    public function setDesiredReplicas(int $desiredReplicas): static
    {
        $this->desiredReplicas = $desiredReplicas;

        return $this;
    }

    /**
     * lastScaleTime is the last time the HorizontalPodAutoscaler scaled the number of pods; used by the
     * autoscaler to control how often the number of pods is changed.
     */
    public function getLastScaleTime(): DateTimeInterface|null
    {
        return $this->lastScaleTime;
    }

    /**
     * lastScaleTime is the last time the HorizontalPodAutoscaler scaled the number of pods; used by the
     * autoscaler to control how often the number of pods is changed.
     *
     * @return static
     */
    public function setLastScaleTime(DateTimeInterface $lastScaleTime): static
    {
        $this->lastScaleTime = $lastScaleTime;

        return $this;
    }

    /**
     * observedGeneration is the most recent generation observed by this autoscaler.
     */
    public function getObservedGeneration(): int|null
    {
        return $this->observedGeneration;
    }

    /**
     * observedGeneration is the most recent generation observed by this autoscaler.
     *
     * @return static
     */
    public function setObservedGeneration(int $observedGeneration): static
    {
        $this->observedGeneration = $observedGeneration;

        return $this;
    }
}
