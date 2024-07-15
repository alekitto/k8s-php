<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Apps\v1;

use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;
use Kcs\K8s\Collection;

/**
 * DaemonSetStatus represents the current status of a daemon set.
 */
class DaemonSetStatus
{
    #[Kubernetes\Attribute('collisionCount')]
    protected int|null $collisionCount = null;

    /** @var iterable|DaemonSetCondition[]|null */
    #[Kubernetes\Attribute('conditions', type: AttributeType::Collection, model: DaemonSetCondition::class)]
    protected $conditions = null;

    #[Kubernetes\Attribute('currentNumberScheduled', required: true)]
    protected int $currentNumberScheduled;

    #[Kubernetes\Attribute('desiredNumberScheduled', required: true)]
    protected int $desiredNumberScheduled;

    #[Kubernetes\Attribute('numberAvailable')]
    protected int|null $numberAvailable = null;

    #[Kubernetes\Attribute('numberMisscheduled', required: true)]
    protected int $numberMisscheduled;

    #[Kubernetes\Attribute('numberReady', required: true)]
    protected int $numberReady;

    #[Kubernetes\Attribute('numberUnavailable')]
    protected int|null $numberUnavailable = null;

    #[Kubernetes\Attribute('observedGeneration')]
    protected int|null $observedGeneration = null;

    #[Kubernetes\Attribute('updatedNumberScheduled')]
    protected int|null $updatedNumberScheduled = null;

    public function __construct(
        int $currentNumberScheduled,
        int $desiredNumberScheduled,
        int $numberMisscheduled,
        int $numberReady,
    ) {
        $this->currentNumberScheduled = $currentNumberScheduled;
        $this->desiredNumberScheduled = $desiredNumberScheduled;
        $this->numberMisscheduled = $numberMisscheduled;
        $this->numberReady = $numberReady;
    }

    /**
     * Count of hash collisions for the DaemonSet. The DaemonSet controller uses this field as a collision
     * avoidance mechanism when it needs to create the name for the newest ControllerRevision.
     */
    public function getCollisionCount(): int|null
    {
        return $this->collisionCount;
    }

    /**
     * Count of hash collisions for the DaemonSet. The DaemonSet controller uses this field as a collision
     * avoidance mechanism when it needs to create the name for the newest ControllerRevision.
     *
     * @return static
     */
    public function setCollisionCount(int $collisionCount): static
    {
        $this->collisionCount = $collisionCount;

        return $this;
    }

    /**
     * Represents the latest available observations of a DaemonSet's current state.
     *
     * @return iterable|DaemonSetCondition[]
     */
    public function getConditions(): iterable|null
    {
        return $this->conditions;
    }

    /**
     * Represents the latest available observations of a DaemonSet's current state.
     *
     * @return static
     */
    public function setConditions(iterable $conditions): static
    {
        $this->conditions = $conditions;

        return $this;
    }

    /** @return static */
    public function addConditions(DaemonSetCondition $condition): static
    {
        if (! $this->conditions) {
            $this->conditions = new Collection();
        }

        $this->conditions[] = $condition;

        return $this;
    }

    /**
     * The number of nodes that are running at least 1 daemon pod and are supposed to run the daemon pod.
     * More info: https://kubernetes.io/docs/concepts/workloads/controllers/daemonset/
     */
    public function getCurrentNumberScheduled(): int
    {
        return $this->currentNumberScheduled;
    }

    /**
     * The number of nodes that are running at least 1 daemon pod and are supposed to run the daemon pod.
     * More info: https://kubernetes.io/docs/concepts/workloads/controllers/daemonset/
     *
     * @return static
     */
    public function setCurrentNumberScheduled(int $currentNumberScheduled): static
    {
        $this->currentNumberScheduled = $currentNumberScheduled;

        return $this;
    }

    /**
     * The total number of nodes that should be running the daemon pod (including nodes correctly running
     * the daemon pod). More info: https://kubernetes.io/docs/concepts/workloads/controllers/daemonset/
     */
    public function getDesiredNumberScheduled(): int
    {
        return $this->desiredNumberScheduled;
    }

    /**
     * The total number of nodes that should be running the daemon pod (including nodes correctly running
     * the daemon pod). More info: https://kubernetes.io/docs/concepts/workloads/controllers/daemonset/
     *
     * @return static
     */
    public function setDesiredNumberScheduled(int $desiredNumberScheduled): static
    {
        $this->desiredNumberScheduled = $desiredNumberScheduled;

        return $this;
    }

    /**
     * The number of nodes that should be running the daemon pod and have one or more of the daemon pod
     * running and available (ready for at least spec.minReadySeconds)
     */
    public function getNumberAvailable(): int|null
    {
        return $this->numberAvailable;
    }

    /**
     * The number of nodes that should be running the daemon pod and have one or more of the daemon pod
     * running and available (ready for at least spec.minReadySeconds)
     *
     * @return static
     */
    public function setNumberAvailable(int $numberAvailable): static
    {
        $this->numberAvailable = $numberAvailable;

        return $this;
    }

    /**
     * The number of nodes that are running the daemon pod, but are not supposed to run the daemon pod.
     * More info: https://kubernetes.io/docs/concepts/workloads/controllers/daemonset/
     */
    public function getNumberMisscheduled(): int
    {
        return $this->numberMisscheduled;
    }

    /**
     * The number of nodes that are running the daemon pod, but are not supposed to run the daemon pod.
     * More info: https://kubernetes.io/docs/concepts/workloads/controllers/daemonset/
     *
     * @return static
     */
    public function setNumberMisscheduled(int $numberMisscheduled): static
    {
        $this->numberMisscheduled = $numberMisscheduled;

        return $this;
    }

    /**
     * numberReady is the number of nodes that should be running the daemon pod and have one or more of the
     * daemon pod running with a Ready Condition.
     */
    public function getNumberReady(): int
    {
        return $this->numberReady;
    }

    /**
     * numberReady is the number of nodes that should be running the daemon pod and have one or more of the
     * daemon pod running with a Ready Condition.
     *
     * @return static
     */
    public function setNumberReady(int $numberReady): static
    {
        $this->numberReady = $numberReady;

        return $this;
    }

    /**
     * The number of nodes that should be running the daemon pod and have none of the daemon pod running
     * and available (ready for at least spec.minReadySeconds)
     */
    public function getNumberUnavailable(): int|null
    {
        return $this->numberUnavailable;
    }

    /**
     * The number of nodes that should be running the daemon pod and have none of the daemon pod running
     * and available (ready for at least spec.minReadySeconds)
     *
     * @return static
     */
    public function setNumberUnavailable(int $numberUnavailable): static
    {
        $this->numberUnavailable = $numberUnavailable;

        return $this;
    }

    /**
     * The most recent generation observed by the daemon set controller.
     */
    public function getObservedGeneration(): int|null
    {
        return $this->observedGeneration;
    }

    /**
     * The most recent generation observed by the daemon set controller.
     *
     * @return static
     */
    public function setObservedGeneration(int $observedGeneration): static
    {
        $this->observedGeneration = $observedGeneration;

        return $this;
    }

    /**
     * The total number of nodes that are running updated daemon pod
     */
    public function getUpdatedNumberScheduled(): int|null
    {
        return $this->updatedNumberScheduled;
    }

    /**
     * The total number of nodes that are running updated daemon pod
     *
     * @return static
     */
    public function setUpdatedNumberScheduled(int $updatedNumberScheduled): static
    {
        $this->updatedNumberScheduled = $updatedNumberScheduled;

        return $this;
    }
}
