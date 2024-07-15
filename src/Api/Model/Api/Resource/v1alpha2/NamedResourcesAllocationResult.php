<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Resource\v1alpha2;

use Kcs\K8s\Attribute as Kubernetes;

/**
 * NamedResourcesAllocationResult is used in AllocationResultModel.
 */
class NamedResourcesAllocationResult
{
    #[Kubernetes\Attribute('name', required: true)]
    protected string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * Name is the name of the selected resource instance.
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Name is the name of the selected resource instance.
     *
     * @return static
     */
    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }
}
