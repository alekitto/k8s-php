<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Core\v1;

use Kcs\K8s\Attribute as Kubernetes;

/**
 * PodSchedulingGate is associated to a Pod to guard its scheduling.
 */
class PodSchedulingGate
{
    #[Kubernetes\Attribute('name', required: true)]
    protected string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * Name of the scheduling gate. Each scheduling gate must have a unique name field.
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Name of the scheduling gate. Each scheduling gate must have a unique name field.
     *
     * @return static
     */
    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }
}
