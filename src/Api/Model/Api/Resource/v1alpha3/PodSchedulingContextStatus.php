<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Resource\v1alpha3;

use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;
use Kcs\K8s\Collection;

/**
 * PodSchedulingContextStatus describes where resources for the Pod can be allocated.
 */
class PodSchedulingContextStatus
{
    /** @var iterable|ResourceClaimSchedulingStatus[]|null */
    #[Kubernetes\Attribute('resourceClaims', type: AttributeType::Collection, model: ResourceClaimSchedulingStatus::class)]
    protected $resourceClaims = null;

    /** @param iterable|ResourceClaimSchedulingStatus[] $resourceClaims */
    public function __construct(iterable $resourceClaims = [])
    {
        $this->resourceClaims = new Collection($resourceClaims);
    }

    /**
     * ResourceClaims describes resource availability for each pod.spec.resourceClaim entry where the
     * corresponding ResourceClaim uses "WaitForFirstConsumer" allocation mode.
     *
     * @return iterable|ResourceClaimSchedulingStatus[]
     */
    public function getResourceClaims(): iterable|null
    {
        return $this->resourceClaims;
    }

    /**
     * ResourceClaims describes resource availability for each pod.spec.resourceClaim entry where the
     * corresponding ResourceClaim uses "WaitForFirstConsumer" allocation mode.
     *
     * @return static
     */
    public function setResourceClaims(iterable $resourceClaims): static
    {
        $this->resourceClaims = $resourceClaims;

        return $this;
    }

    /** @return static */
    public function addResourceClaims(ResourceClaimSchedulingStatus $resourceClaim): static
    {
        if (! $this->resourceClaims) {
            $this->resourceClaims = new Collection();
        }

        $this->resourceClaims[] = $resourceClaim;

        return $this;
    }
}
