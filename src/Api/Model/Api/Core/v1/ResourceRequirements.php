<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Core\v1;

use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;
use Kcs\K8s\Collection;

/**
 * ResourceRequirements describes the compute resource requirements.
 */
class ResourceRequirements
{
    /** @var iterable|ResourceClaim[]|null */
    #[Kubernetes\Attribute('claims', type: AttributeType::Collection, model: ResourceClaim::class)]
    protected $claims = null;

    /** @var object[]|null */
    #[Kubernetes\Attribute('limits')]
    protected array|null $limits = null;

    /** @var object[]|null */
    #[Kubernetes\Attribute('requests')]
    protected array|null $requests = null;

    /**
     * @param iterable|ResourceClaim[] $claims
     * @param object[]|null $limits
     * @param object[]|null $requests
     */
    public function __construct(iterable $claims = [], array|null $limits = null, array|null $requests = null)
    {
        $this->claims = new Collection($claims);
        $this->limits = $limits;
        $this->requests = $requests;
    }

    /**
     * Claims lists the names of resources, defined in spec.resourceClaims, that are used by this
     * container.
     *
     * This is an alpha field and requires enabling the DynamicResourceAllocation feature gate.
     *
     * This field is immutable. It can only be set for containers.
     *
     * @return iterable|ResourceClaim[]
     */
    public function getClaims(): iterable|null
    {
        return $this->claims;
    }

    /**
     * Claims lists the names of resources, defined in spec.resourceClaims, that are used by this
     * container.
     *
     * This is an alpha field and requires enabling the DynamicResourceAllocation feature gate.
     *
     * This field is immutable. It can only be set for containers.
     *
     * @return static
     */
    public function setClaims(iterable $claims): static
    {
        $this->claims = $claims;

        return $this;
    }

    /** @return static */
    public function addClaims(ResourceClaim $claim): static
    {
        if (! $this->claims) {
            $this->claims = new Collection();
        }

        $this->claims[] = $claim;

        return $this;
    }

    /**
     * Limits describes the maximum amount of compute resources allowed. More info:
     * https://kubernetes.io/docs/concepts/configuration/manage-resources-containers/
     */
    public function getLimits(): array|null
    {
        return $this->limits;
    }

    /**
     * Limits describes the maximum amount of compute resources allowed. More info:
     * https://kubernetes.io/docs/concepts/configuration/manage-resources-containers/
     *
     * @return static
     */
    public function setLimits(array $limits): static
    {
        $this->limits = $limits;

        return $this;
    }

    /**
     * Requests describes the minimum amount of compute resources required. If Requests is omitted for a
     * container, it defaults to Limits if that is explicitly specified, otherwise to an
     * implementation-defined value. Requests cannot exceed Limits. More info:
     * https://kubernetes.io/docs/concepts/configuration/manage-resources-containers/
     */
    public function getRequests(): array|null
    {
        return $this->requests;
    }

    /**
     * Requests describes the minimum amount of compute resources required. If Requests is omitted for a
     * container, it defaults to Limits if that is explicitly specified, otherwise to an
     * implementation-defined value. Requests cannot exceed Limits. More info:
     * https://kubernetes.io/docs/concepts/configuration/manage-resources-containers/
     *
     * @return static
     */
    public function setRequests(array $requests): static
    {
        $this->requests = $requests;

        return $this;
    }
}
