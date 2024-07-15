<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Apps\v1;

use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;
use Kcs\K8s\Collection;

/**
 * StatefulSetStatus represents the current state of a StatefulSet.
 */
class StatefulSetStatus
{
    #[Kubernetes\Attribute('availableReplicas')]
    protected int|null $availableReplicas = null;

    #[Kubernetes\Attribute('collisionCount')]
    protected int|null $collisionCount = null;

    /** @var iterable|StatefulSetCondition[]|null */
    #[Kubernetes\Attribute('conditions', type: AttributeType::Collection, model: StatefulSetCondition::class)]
    protected $conditions = null;

    #[Kubernetes\Attribute('currentReplicas')]
    protected int|null $currentReplicas = null;

    #[Kubernetes\Attribute('currentRevision')]
    protected string|null $currentRevision = null;

    #[Kubernetes\Attribute('observedGeneration')]
    protected int|null $observedGeneration = null;

    #[Kubernetes\Attribute('readyReplicas')]
    protected int|null $readyReplicas = null;

    #[Kubernetes\Attribute('replicas', required: true)]
    protected int $replicas;

    #[Kubernetes\Attribute('updateRevision')]
    protected string|null $updateRevision = null;

    #[Kubernetes\Attribute('updatedReplicas')]
    protected int|null $updatedReplicas = null;

    public function __construct(int $replicas)
    {
        $this->replicas = $replicas;
    }

    /**
     * Total number of available pods (ready for at least minReadySeconds) targeted by this statefulset.
     */
    public function getAvailableReplicas(): int|null
    {
        return $this->availableReplicas;
    }

    /**
     * Total number of available pods (ready for at least minReadySeconds) targeted by this statefulset.
     *
     * @return static
     */
    public function setAvailableReplicas(int $availableReplicas): static
    {
        $this->availableReplicas = $availableReplicas;

        return $this;
    }

    /**
     * collisionCount is the count of hash collisions for the StatefulSet. The StatefulSet controller uses
     * this field as a collision avoidance mechanism when it needs to create the name for the newest
     * ControllerRevision.
     */
    public function getCollisionCount(): int|null
    {
        return $this->collisionCount;
    }

    /**
     * collisionCount is the count of hash collisions for the StatefulSet. The StatefulSet controller uses
     * this field as a collision avoidance mechanism when it needs to create the name for the newest
     * ControllerRevision.
     *
     * @return static
     */
    public function setCollisionCount(int $collisionCount): static
    {
        $this->collisionCount = $collisionCount;

        return $this;
    }

    /**
     * Represents the latest available observations of a statefulset's current state.
     *
     * @return iterable|StatefulSetCondition[]
     */
    public function getConditions(): iterable|null
    {
        return $this->conditions;
    }

    /**
     * Represents the latest available observations of a statefulset's current state.
     *
     * @return static
     */
    public function setConditions(iterable $conditions): static
    {
        $this->conditions = $conditions;

        return $this;
    }

    /** @return static */
    public function addConditions(StatefulSetCondition $condition): static
    {
        if (! $this->conditions) {
            $this->conditions = new Collection();
        }

        $this->conditions[] = $condition;

        return $this;
    }

    /**
     * currentReplicas is the number of Pods created by the StatefulSet controller from the StatefulSet
     * version indicated by currentRevision.
     */
    public function getCurrentReplicas(): int|null
    {
        return $this->currentReplicas;
    }

    /**
     * currentReplicas is the number of Pods created by the StatefulSet controller from the StatefulSet
     * version indicated by currentRevision.
     *
     * @return static
     */
    public function setCurrentReplicas(int $currentReplicas): static
    {
        $this->currentReplicas = $currentReplicas;

        return $this;
    }

    /**
     * currentRevision, if not empty, indicates the version of the StatefulSet used to generate Pods in the
     * sequence [0,currentReplicas).
     */
    public function getCurrentRevision(): string|null
    {
        return $this->currentRevision;
    }

    /**
     * currentRevision, if not empty, indicates the version of the StatefulSet used to generate Pods in the
     * sequence [0,currentReplicas).
     *
     * @return static
     */
    public function setCurrentRevision(string $currentRevision): static
    {
        $this->currentRevision = $currentRevision;

        return $this;
    }

    /**
     * observedGeneration is the most recent generation observed for this StatefulSet. It corresponds to
     * the StatefulSet's generation, which is updated on mutation by the API Server.
     */
    public function getObservedGeneration(): int|null
    {
        return $this->observedGeneration;
    }

    /**
     * observedGeneration is the most recent generation observed for this StatefulSet. It corresponds to
     * the StatefulSet's generation, which is updated on mutation by the API Server.
     *
     * @return static
     */
    public function setObservedGeneration(int $observedGeneration): static
    {
        $this->observedGeneration = $observedGeneration;

        return $this;
    }

    /**
     * readyReplicas is the number of pods created for this StatefulSet with a Ready Condition.
     */
    public function getReadyReplicas(): int|null
    {
        return $this->readyReplicas;
    }

    /**
     * readyReplicas is the number of pods created for this StatefulSet with a Ready Condition.
     *
     * @return static
     */
    public function setReadyReplicas(int $readyReplicas): static
    {
        $this->readyReplicas = $readyReplicas;

        return $this;
    }

    /**
     * replicas is the number of Pods created by the StatefulSet controller.
     */
    public function getReplicas(): int
    {
        return $this->replicas;
    }

    /**
     * replicas is the number of Pods created by the StatefulSet controller.
     *
     * @return static
     */
    public function setReplicas(int $replicas): static
    {
        $this->replicas = $replicas;

        return $this;
    }

    /**
     * updateRevision, if not empty, indicates the version of the StatefulSet used to generate Pods in the
     * sequence [replicas-updatedReplicas,replicas)
     */
    public function getUpdateRevision(): string|null
    {
        return $this->updateRevision;
    }

    /**
     * updateRevision, if not empty, indicates the version of the StatefulSet used to generate Pods in the
     * sequence [replicas-updatedReplicas,replicas)
     *
     * @return static
     */
    public function setUpdateRevision(string $updateRevision): static
    {
        $this->updateRevision = $updateRevision;

        return $this;
    }

    /**
     * updatedReplicas is the number of Pods created by the StatefulSet controller from the StatefulSet
     * version indicated by updateRevision.
     */
    public function getUpdatedReplicas(): int|null
    {
        return $this->updatedReplicas;
    }

    /**
     * updatedReplicas is the number of Pods created by the StatefulSet controller from the StatefulSet
     * version indicated by updateRevision.
     *
     * @return static
     */
    public function setUpdatedReplicas(int $updatedReplicas): static
    {
        $this->updatedReplicas = $updatedReplicas;

        return $this;
    }
}
