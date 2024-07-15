<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\FlowControl\v1beta3;

use Kcs\K8s\Attribute as Kubernetes;

/**
 * PriorityLevelConfigurationReference contains information that points to the "request-priority" being
 * used.
 */
class PriorityLevelConfigurationReference
{
    #[Kubernetes\Attribute('name', required: true)]
    protected string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * `name` is the name of the priority level configuration being referenced Required.
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * `name` is the name of the priority level configuration being referenced Required.
     *
     * @return static
     */
    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }
}
