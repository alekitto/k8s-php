<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\AutoScaling\v2;

use DateTimeInterface;
use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;
use Kcs\K8s\Collection;

/**
 * HorizontalPodAutoscalerStatus describes the current status of a horizontal pod autoscaler.
 */
class HorizontalPodAutoscalerStatus
{
    /** @var iterable|HorizontalPodAutoscalerCondition[]|null */
    #[Kubernetes\Attribute('conditions', type: AttributeType::Collection, model: HorizontalPodAutoscalerCondition::class)]
    protected $conditions = null;

    /** @var iterable|MetricStatus[]|null */
    #[Kubernetes\Attribute('currentMetrics', type: AttributeType::Collection, model: MetricStatus::class)]
    protected $currentMetrics = null;

    #[Kubernetes\Attribute('currentReplicas')]
    protected int|null $currentReplicas = null;

    #[Kubernetes\Attribute('desiredReplicas', required: true)]
    protected int $desiredReplicas;

    #[Kubernetes\Attribute('lastScaleTime', type: AttributeType::DateTime)]
    protected DateTimeInterface|null $lastScaleTime = null;

    #[Kubernetes\Attribute('observedGeneration')]
    protected int|null $observedGeneration = null;

    public function __construct(int $desiredReplicas)
    {
        $this->desiredReplicas = $desiredReplicas;
    }

    /**
     * conditions is the set of conditions required for this autoscaler to scale its target, and indicates
     * whether or not those conditions are met.
     *
     * @return iterable|HorizontalPodAutoscalerCondition[]
     */
    public function getConditions(): iterable|null
    {
        return $this->conditions;
    }

    /**
     * conditions is the set of conditions required for this autoscaler to scale its target, and indicates
     * whether or not those conditions are met.
     *
     * @return static
     */
    public function setConditions(iterable $conditions): static
    {
        $this->conditions = $conditions;

        return $this;
    }

    /** @return static */
    public function addConditions(HorizontalPodAutoscalerCondition $condition): static
    {
        if (! $this->conditions) {
            $this->conditions = new Collection();
        }

        $this->conditions[] = $condition;

        return $this;
    }

    /**
     * currentMetrics is the last read state of the metrics used by this autoscaler.
     *
     * @return iterable|MetricStatus[]
     */
    public function getCurrentMetrics(): iterable|null
    {
        return $this->currentMetrics;
    }

    /**
     * currentMetrics is the last read state of the metrics used by this autoscaler.
     *
     * @return static
     */
    public function setCurrentMetrics(iterable $currentMetrics): static
    {
        $this->currentMetrics = $currentMetrics;

        return $this;
    }

    /** @return static */
    public function addCurrentMetrics(MetricStatus $currentMetric): static
    {
        if (! $this->currentMetrics) {
            $this->currentMetrics = new Collection();
        }

        $this->currentMetrics[] = $currentMetric;

        return $this;
    }

    /**
     * currentReplicas is current number of replicas of pods managed by this autoscaler, as last seen by
     * the autoscaler.
     */
    public function getCurrentReplicas(): int|null
    {
        return $this->currentReplicas;
    }

    /**
     * currentReplicas is current number of replicas of pods managed by this autoscaler, as last seen by
     * the autoscaler.
     *
     * @return static
     */
    public function setCurrentReplicas(int $currentReplicas): static
    {
        $this->currentReplicas = $currentReplicas;

        return $this;
    }

    /**
     * desiredReplicas is the desired number of replicas of pods managed by this autoscaler, as last
     * calculated by the autoscaler.
     */
    public function getDesiredReplicas(): int
    {
        return $this->desiredReplicas;
    }

    /**
     * desiredReplicas is the desired number of replicas of pods managed by this autoscaler, as last
     * calculated by the autoscaler.
     *
     * @return static
     */
    public function setDesiredReplicas(int $desiredReplicas): static
    {
        $this->desiredReplicas = $desiredReplicas;

        return $this;
    }

    /**
     * lastScaleTime is the last time the HorizontalPodAutoscaler scaled the number of pods, used by the
     * autoscaler to control how often the number of pods is changed.
     */
    public function getLastScaleTime(): DateTimeInterface|null
    {
        return $this->lastScaleTime;
    }

    /**
     * lastScaleTime is the last time the HorizontalPodAutoscaler scaled the number of pods, used by the
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
