<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Core\v1;

use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;

/**
 * ContainerState holds a possible state of container. Only one of its members may be specified. If
 * none of them is specified, the default one is ContainerStateWaiting.
 */
class ContainerState
{
    #[Kubernetes\Attribute('running', type: AttributeType::Model, model: ContainerStateRunning::class)]
    protected ContainerStateRunning|null $running = null;

    #[Kubernetes\Attribute('terminated', type: AttributeType::Model, model: ContainerStateTerminated::class)]
    protected ContainerStateTerminated|null $terminated = null;

    #[Kubernetes\Attribute('waiting', type: AttributeType::Model, model: ContainerStateWaiting::class)]
    protected ContainerStateWaiting|null $waiting = null;

    public function __construct(
        ContainerStateRunning|null $running = null,
        ContainerStateTerminated|null $terminated = null,
        ContainerStateWaiting|null $waiting = null,
    ) {
        $this->running = $running;
        $this->terminated = $terminated;
        $this->waiting = $waiting;
    }

    /**
     * Details about a running container
     */
    public function getRunning(): ContainerStateRunning|null
    {
        return $this->running;
    }

    /**
     * Details about a running container
     *
     * @return static
     */
    public function setRunning(ContainerStateRunning $running): static
    {
        $this->running = $running;

        return $this;
    }

    /**
     * Details about a terminated container
     */
    public function getTerminated(): ContainerStateTerminated|null
    {
        return $this->terminated;
    }

    /**
     * Details about a terminated container
     *
     * @return static
     */
    public function setTerminated(ContainerStateTerminated $terminated): static
    {
        $this->terminated = $terminated;

        return $this;
    }

    /**
     * Details about a waiting container
     */
    public function getWaiting(): ContainerStateWaiting|null
    {
        return $this->waiting;
    }

    /**
     * Details about a waiting container
     *
     * @return static
     */
    public function setWaiting(ContainerStateWaiting $waiting): static
    {
        $this->waiting = $waiting;

        return $this;
    }
}
