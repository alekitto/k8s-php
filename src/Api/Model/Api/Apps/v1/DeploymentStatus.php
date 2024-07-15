<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Apps\v1;

use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;
use Kcs\K8s\Collection;

/**
 * DeploymentStatus is the most recently observed status of the Deployment.
 */
class DeploymentStatus
{
    #[Kubernetes\Attribute('availableReplicas')]
    protected int|null $availableReplicas = null;

    #[Kubernetes\Attribute('collisionCount')]
    protected int|null $collisionCount = null;

    /** @var iterable|DeploymentCondition[]|null */
    #[Kubernetes\Attribute('conditions', type: AttributeType::Collection, model: DeploymentCondition::class)]
    protected $conditions = null;

    #[Kubernetes\Attribute('observedGeneration')]
    protected int|null $observedGeneration = null;

    #[Kubernetes\Attribute('readyReplicas')]
    protected int|null $readyReplicas = null;

    #[Kubernetes\Attribute('replicas')]
    protected int|null $replicas = null;

    #[Kubernetes\Attribute('unavailableReplicas')]
    protected int|null $unavailableReplicas = null;

    #[Kubernetes\Attribute('updatedReplicas')]
    protected int|null $updatedReplicas = null;

    /**
     * Total number of available pods (ready for at least minReadySeconds) targeted by this deployment.
     */
    public function getAvailableReplicas(): int|null
    {
        return $this->availableReplicas;
    }

    /**
     * Total number of available pods (ready for at least minReadySeconds) targeted by this deployment.
     *
     * @return static
     */
    public function setAvailableReplicas(int $availableReplicas): static
    {
        $this->availableReplicas = $availableReplicas;

        return $this;
    }

    /**
     * Count of hash collisions for the Deployment. The Deployment controller uses this field as a
     * collision avoidance mechanism when it needs to create the name for the newest ReplicaSet.
     */
    public function getCollisionCount(): int|null
    {
        return $this->collisionCount;
    }

    /**
     * Count of hash collisions for the Deployment. The Deployment controller uses this field as a
     * collision avoidance mechanism when it needs to create the name for the newest ReplicaSet.
     *
     * @return static
     */
    public function setCollisionCount(int $collisionCount): static
    {
        $this->collisionCount = $collisionCount;

        return $this;
    }

    /**
     * Represents the latest available observations of a deployment's current state.
     *
     * @return iterable|DeploymentCondition[]
     */
    public function getConditions(): iterable|null
    {
        return $this->conditions;
    }

    /**
     * Represents the latest available observations of a deployment's current state.
     *
     * @return static
     */
    public function setConditions(iterable $conditions): static
    {
        $this->conditions = $conditions;

        return $this;
    }

    /** @return static */
    public function addConditions(DeploymentCondition $condition): static
    {
        if (! $this->conditions) {
            $this->conditions = new Collection();
        }

        $this->conditions[] = $condition;

        return $this;
    }

    /**
     * The generation observed by the deployment controller.
     */
    public function getObservedGeneration(): int|null
    {
        return $this->observedGeneration;
    }

    /**
     * The generation observed by the deployment controller.
     *
     * @return static
     */
    public function setObservedGeneration(int $observedGeneration): static
    {
        $this->observedGeneration = $observedGeneration;

        return $this;
    }

    /**
     * readyReplicas is the number of pods targeted by this Deployment with a Ready Condition.
     */
    public function getReadyReplicas(): int|null
    {
        return $this->readyReplicas;
    }

    /**
     * readyReplicas is the number of pods targeted by this Deployment with a Ready Condition.
     *
     * @return static
     */
    public function setReadyReplicas(int $readyReplicas): static
    {
        $this->readyReplicas = $readyReplicas;

        return $this;
    }

    /**
     * Total number of non-terminated pods targeted by this deployment (their labels match the selector).
     */
    public function getReplicas(): int|null
    {
        return $this->replicas;
    }

    /**
     * Total number of non-terminated pods targeted by this deployment (their labels match the selector).
     *
     * @return static
     */
    public function setReplicas(int $replicas): static
    {
        $this->replicas = $replicas;

        return $this;
    }

    /**
     * Total number of unavailable pods targeted by this deployment. This is the total number of pods that
     * are still required for the deployment to have 100% available capacity. They may either be pods that
     * are running but not yet available or pods that still have not been created.
     */
    public function getUnavailableReplicas(): int|null
    {
        return $this->unavailableReplicas;
    }

    /**
     * Total number of unavailable pods targeted by this deployment. This is the total number of pods that
     * are still required for the deployment to have 100% available capacity. They may either be pods that
     * are running but not yet available or pods that still have not been created.
     *
     * @return static
     */
    public function setUnavailableReplicas(int $unavailableReplicas): static
    {
        $this->unavailableReplicas = $unavailableReplicas;

        return $this;
    }

    /**
     * Total number of non-terminated pods targeted by this deployment that have the desired template spec.
     */
    public function getUpdatedReplicas(): int|null
    {
        return $this->updatedReplicas;
    }

    /**
     * Total number of non-terminated pods targeted by this deployment that have the desired template spec.
     *
     * @return static
     */
    public function setUpdatedReplicas(int $updatedReplicas): static
    {
        $this->updatedReplicas = $updatedReplicas;

        return $this;
    }
}
