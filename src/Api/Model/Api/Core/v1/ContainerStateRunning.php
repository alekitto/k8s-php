<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Core\v1;

use DateTimeInterface;
use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;

/**
 * ContainerStateRunning is a running state of a container.
 */
class ContainerStateRunning
{
    #[Kubernetes\Attribute('startedAt', type: AttributeType::DateTime)]
    protected DateTimeInterface|null $startedAt = null;

    public function __construct(DateTimeInterface|null $startedAt = null)
    {
        $this->startedAt = $startedAt;
    }

    /**
     * Time at which the container was last (re-)started
     */
    public function getStartedAt(): DateTimeInterface|null
    {
        return $this->startedAt;
    }

    /**
     * Time at which the container was last (re-)started
     *
     * @return static
     */
    public function setStartedAt(DateTimeInterface $startedAt): static
    {
        $this->startedAt = $startedAt;

        return $this;
    }
}
