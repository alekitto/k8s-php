<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Policy\v1;

use Kcs\K8s\Api\Model\ApiMachinery\Apis\Meta\v1\Condition;
use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;
use Kcs\K8s\Collection;

/**
 * PodDisruptionBudgetStatus represents information about the status of a PodDisruptionBudget. Status
 * may trail the actual state of a system.
 */
class PodDisruptionBudgetStatus
{
    /** @var iterable|Condition[]|null */
    #[Kubernetes\Attribute('conditions', type: AttributeType::Collection, model: Condition::class)]
    protected $conditions = null;

    #[Kubernetes\Attribute('currentHealthy', required: true)]
    protected int $currentHealthy;

    #[Kubernetes\Attribute('desiredHealthy', required: true)]
    protected int $desiredHealthy;

    /** @var object[]|null */
    #[Kubernetes\Attribute('disruptedPods')]
    protected array|null $disruptedPods = null;

    #[Kubernetes\Attribute('disruptionsAllowed', required: true)]
    protected int $disruptionsAllowed;

    #[Kubernetes\Attribute('expectedPods', required: true)]
    protected int $expectedPods;

    #[Kubernetes\Attribute('observedGeneration')]
    protected int|null $observedGeneration = null;

    public function __construct(int $currentHealthy, int $desiredHealthy, int $disruptionsAllowed, int $expectedPods)
    {
        $this->currentHealthy = $currentHealthy;
        $this->desiredHealthy = $desiredHealthy;
        $this->disruptionsAllowed = $disruptionsAllowed;
        $this->expectedPods = $expectedPods;
    }

    /**
     * Conditions contain conditions for PDB. The disruption controller sets the DisruptionAllowed
     * condition. The following are known values for the reason field (additional reasons could be added in
     * the future): - SyncFailed: The controller encountered an error and wasn't able to compute
     *               the number of allowed disruptions. Therefore no disruptions are
     *               allowed and the status of the condition will be False.
     * - InsufficientPods: The number of pods are either at or below the number
     *                     required by the PodDisruptionBudget. No disruptions are
     *                     allowed and the status of the condition will be False.
     * - SufficientPods: There are more pods than required by the PodDisruptionBudget.
     *                   The condition will be True, and the number of allowed
     *                   disruptions are provided by the disruptionsAllowed property.
     *
     * @return iterable|Condition[]
     */
    public function getConditions(): iterable|null
    {
        return $this->conditions;
    }

    /**
     * Conditions contain conditions for PDB. The disruption controller sets the DisruptionAllowed
     * condition. The following are known values for the reason field (additional reasons could be added in
     * the future): - SyncFailed: The controller encountered an error and wasn't able to compute
     *               the number of allowed disruptions. Therefore no disruptions are
     *               allowed and the status of the condition will be False.
     * - InsufficientPods: The number of pods are either at or below the number
     *                     required by the PodDisruptionBudget. No disruptions are
     *                     allowed and the status of the condition will be False.
     * - SufficientPods: There are more pods than required by the PodDisruptionBudget.
     *                   The condition will be True, and the number of allowed
     *                   disruptions are provided by the disruptionsAllowed property.
     *
     * @return static
     */
    public function setConditions(iterable $conditions): static
    {
        $this->conditions = $conditions;

        return $this;
    }

    /** @return static */
    public function addConditions(Condition $condition): static
    {
        if (! $this->conditions) {
            $this->conditions = new Collection();
        }

        $this->conditions[] = $condition;

        return $this;
    }

    /**
     * current number of healthy pods
     */
    public function getCurrentHealthy(): int
    {
        return $this->currentHealthy;
    }

    /**
     * current number of healthy pods
     *
     * @return static
     */
    public function setCurrentHealthy(int $currentHealthy): static
    {
        $this->currentHealthy = $currentHealthy;

        return $this;
    }

    /**
     * minimum desired number of healthy pods
     */
    public function getDesiredHealthy(): int
    {
        return $this->desiredHealthy;
    }

    /**
     * minimum desired number of healthy pods
     *
     * @return static
     */
    public function setDesiredHealthy(int $desiredHealthy): static
    {
        $this->desiredHealthy = $desiredHealthy;

        return $this;
    }

    /**
     * DisruptedPods contains information about pods whose eviction was processed by the API server
     * eviction subresource handler but has not yet been observed by the PodDisruptionBudget controller. A
     * pod will be in this map from the time when the API server processed the eviction request to the time
     * when the pod is seen by PDB controller as having been marked for deletion (or after a timeout). The
     * key in the map is the name of the pod and the value is the time when the API server processed the
     * eviction request. If the deletion didn't occur and a pod is still there it will be removed from the
     * list automatically by PodDisruptionBudget controller after some time. If everything goes smooth this
     * map should be empty for the most of the time. Large number of entries in the map may indicate
     * problems with pod deletions.
     */
    public function getDisruptedPods(): array|null
    {
        return $this->disruptedPods;
    }

    /**
     * DisruptedPods contains information about pods whose eviction was processed by the API server
     * eviction subresource handler but has not yet been observed by the PodDisruptionBudget controller. A
     * pod will be in this map from the time when the API server processed the eviction request to the time
     * when the pod is seen by PDB controller as having been marked for deletion (or after a timeout). The
     * key in the map is the name of the pod and the value is the time when the API server processed the
     * eviction request. If the deletion didn't occur and a pod is still there it will be removed from the
     * list automatically by PodDisruptionBudget controller after some time. If everything goes smooth this
     * map should be empty for the most of the time. Large number of entries in the map may indicate
     * problems with pod deletions.
     *
     * @return static
     */
    public function setDisruptedPods(array $disruptedPods): static
    {
        $this->disruptedPods = $disruptedPods;

        return $this;
    }

    /**
     * Number of pod disruptions that are currently allowed.
     */
    public function getDisruptionsAllowed(): int
    {
        return $this->disruptionsAllowed;
    }

    /**
     * Number of pod disruptions that are currently allowed.
     *
     * @return static
     */
    public function setDisruptionsAllowed(int $disruptionsAllowed): static
    {
        $this->disruptionsAllowed = $disruptionsAllowed;

        return $this;
    }

    /**
     * total number of pods counted by this disruption budget
     */
    public function getExpectedPods(): int
    {
        return $this->expectedPods;
    }

    /**
     * total number of pods counted by this disruption budget
     *
     * @return static
     */
    public function setExpectedPods(int $expectedPods): static
    {
        $this->expectedPods = $expectedPods;

        return $this;
    }

    /**
     * Most recent generation observed when updating this PDB status. DisruptionsAllowed and other status
     * information is valid only if observedGeneration equals to PDB's object generation.
     */
    public function getObservedGeneration(): int|null
    {
        return $this->observedGeneration;
    }

    /**
     * Most recent generation observed when updating this PDB status. DisruptionsAllowed and other status
     * information is valid only if observedGeneration equals to PDB's object generation.
     *
     * @return static
     */
    public function setObservedGeneration(int $observedGeneration): static
    {
        $this->observedGeneration = $observedGeneration;

        return $this;
    }
}
