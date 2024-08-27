<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Resource\v1alpha3;

use Kcs\K8s\Attribute as Kubernetes;

/**
 * ResourceClaimSchedulingStatus contains information about one particular ResourceClaim with
 * "WaitForFirstConsumer" allocation mode.
 */
class ResourceClaimSchedulingStatus
{
    #[Kubernetes\Attribute('name', required: true)]
    protected string $name;

    /** @var string[]|null */
    #[Kubernetes\Attribute('unsuitableNodes')]
    protected array|null $unsuitableNodes = null;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * Name matches the pod.spec.resourceClaims[*].Name field.
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Name matches the pod.spec.resourceClaims[*].Name field.
     *
     * @return static
     */
    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    /**
     * UnsuitableNodes lists nodes that the ResourceClaim cannot be allocated for.
     *
     * The size of this field is limited to 128, the same as for PodSchedulingSpec.PotentialNodes. This may
     * get increased in the future, but not reduced.
     */
    public function getUnsuitableNodes(): array|null
    {
        return $this->unsuitableNodes;
    }

    /**
     * UnsuitableNodes lists nodes that the ResourceClaim cannot be allocated for.
     *
     * The size of this field is limited to 128, the same as for PodSchedulingSpec.PotentialNodes. This may
     * get increased in the future, but not reduced.
     *
     * @return static
     */
    public function setUnsuitableNodes(array $unsuitableNodes): static
    {
        $this->unsuitableNodes = $unsuitableNodes;

        return $this;
    }
}
