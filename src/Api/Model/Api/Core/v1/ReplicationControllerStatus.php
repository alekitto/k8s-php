<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Core\v1;

use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;
use Kcs\K8s\Collection;

/**
 * ReplicationControllerStatus represents the current status of a replication controller.
 */
class ReplicationControllerStatus
{
    #[Kubernetes\Attribute('availableReplicas')]
    protected int|null $availableReplicas = null;

    /** @var iterable|ReplicationControllerCondition[]|null */
    #[Kubernetes\Attribute('conditions', type: AttributeType::Collection, model: ReplicationControllerCondition::class)]
    protected $conditions = null;

    #[Kubernetes\Attribute('fullyLabeledReplicas')]
    protected int|null $fullyLabeledReplicas = null;

    #[Kubernetes\Attribute('observedGeneration')]
    protected int|null $observedGeneration = null;

    #[Kubernetes\Attribute('readyReplicas')]
    protected int|null $readyReplicas = null;

    #[Kubernetes\Attribute('replicas', required: true)]
    protected int $replicas;

    public function __construct(int $replicas)
    {
        $this->replicas = $replicas;
    }

    /**
     * The number of available replicas (ready for at least minReadySeconds) for this replication
     * controller.
     */
    public function getAvailableReplicas(): int|null
    {
        return $this->availableReplicas;
    }

    /**
     * The number of available replicas (ready for at least minReadySeconds) for this replication
     * controller.
     *
     * @return static
     */
    public function setAvailableReplicas(int $availableReplicas): static
    {
        $this->availableReplicas = $availableReplicas;

        return $this;
    }

    /**
     * Represents the latest available observations of a replication controller's current state.
     *
     * @return iterable|ReplicationControllerCondition[]
     */
    public function getConditions(): iterable|null
    {
        return $this->conditions;
    }

    /**
     * Represents the latest available observations of a replication controller's current state.
     *
     * @return static
     */
    public function setConditions(iterable $conditions): static
    {
        $this->conditions = $conditions;

        return $this;
    }

    /** @return static */
    public function addConditions(ReplicationControllerCondition $condition): static
    {
        if (! $this->conditions) {
            $this->conditions = new Collection();
        }

        $this->conditions[] = $condition;

        return $this;
    }

    /**
     * The number of pods that have labels matching the labels of the pod template of the replication
     * controller.
     */
    public function getFullyLabeledReplicas(): int|null
    {
        return $this->fullyLabeledReplicas;
    }

    /**
     * The number of pods that have labels matching the labels of the pod template of the replication
     * controller.
     *
     * @return static
     */
    public function setFullyLabeledReplicas(int $fullyLabeledReplicas): static
    {
        $this->fullyLabeledReplicas = $fullyLabeledReplicas;

        return $this;
    }

    /**
     * ObservedGeneration reflects the generation of the most recently observed replication controller.
     */
    public function getObservedGeneration(): int|null
    {
        return $this->observedGeneration;
    }

    /**
     * ObservedGeneration reflects the generation of the most recently observed replication controller.
     *
     * @return static
     */
    public function setObservedGeneration(int $observedGeneration): static
    {
        $this->observedGeneration = $observedGeneration;

        return $this;
    }

    /**
     * The number of ready replicas for this replication controller.
     */
    public function getReadyReplicas(): int|null
    {
        return $this->readyReplicas;
    }

    /**
     * The number of ready replicas for this replication controller.
     *
     * @return static
     */
    public function setReadyReplicas(int $readyReplicas): static
    {
        $this->readyReplicas = $readyReplicas;

        return $this;
    }

    /**
     * Replicas is the most recently observed number of replicas. More info:
     * https://kubernetes.io/docs/concepts/workloads/controllers/replicationcontroller#what-is-a-replicationcontroller
     */
    public function getReplicas(): int
    {
        return $this->replicas;
    }

    /**
     * Replicas is the most recently observed number of replicas. More info:
     * https://kubernetes.io/docs/concepts/workloads/controllers/replicationcontroller#what-is-a-replicationcontroller
     *
     * @return static
     */
    public function setReplicas(int $replicas): static
    {
        $this->replicas = $replicas;

        return $this;
    }
}
