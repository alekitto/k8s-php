<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Resource\v1alpha3;

use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;
use Kcs\K8s\Collection;

/**
 * DeviceClaim defines how to request devices with a ResourceClaim.
 */
class DeviceClaim
{
    /** @var iterable|DeviceClaimConfiguration[]|null */
    #[Kubernetes\Attribute('config', type: AttributeType::Collection, model: DeviceClaimConfiguration::class)]
    protected $config = null;

    /** @var iterable|DeviceConstraint[]|null */
    #[Kubernetes\Attribute('constraints', type: AttributeType::Collection, model: DeviceConstraint::class)]
    protected $constraints = null;

    /** @var iterable|DeviceRequest[]|null */
    #[Kubernetes\Attribute('requests', type: AttributeType::Collection, model: DeviceRequest::class)]
    protected $requests = null;

    /**
     * @param iterable|DeviceClaimConfiguration[] $config
     * @param iterable|DeviceConstraint[] $constraints
     * @param iterable|DeviceRequest[] $requests
     */
    public function __construct(iterable $config = [], iterable $constraints = [], iterable $requests = [])
    {
        $this->config = new Collection($config);
        $this->constraints = new Collection($constraints);
        $this->requests = new Collection($requests);
    }

    /**
     * This field holds configuration for multiple potential drivers which could satisfy requests in this
     * claim. It is ignored while allocating the claim.
     *
     * @return iterable|DeviceClaimConfiguration[]
     */
    public function getConfig(): iterable|null
    {
        return $this->config;
    }

    /**
     * This field holds configuration for multiple potential drivers which could satisfy requests in this
     * claim. It is ignored while allocating the claim.
     *
     * @return static
     */
    public function setConfig(iterable $config): static
    {
        $this->config = $config;

        return $this;
    }

    /** @return static */
    public function addConfig(DeviceClaimConfiguration $config): static
    {
        if (! $this->config) {
            $this->config = new Collection();
        }

        $this->config[] = $config;

        return $this;
    }

    /**
     * These constraints must be satisfied by the set of devices that get allocated for the claim.
     *
     * @return iterable|DeviceConstraint[]
     */
    public function getConstraints(): iterable|null
    {
        return $this->constraints;
    }

    /**
     * These constraints must be satisfied by the set of devices that get allocated for the claim.
     *
     * @return static
     */
    public function setConstraints(iterable $constraints): static
    {
        $this->constraints = $constraints;

        return $this;
    }

    /** @return static */
    public function addConstraints(DeviceConstraint $constraint): static
    {
        if (! $this->constraints) {
            $this->constraints = new Collection();
        }

        $this->constraints[] = $constraint;

        return $this;
    }

    /**
     * Requests represent individual requests for distinct devices which must all be satisfied. If empty,
     * nothing needs to be allocated.
     *
     * @return iterable|DeviceRequest[]
     */
    public function getRequests(): iterable|null
    {
        return $this->requests;
    }

    /**
     * Requests represent individual requests for distinct devices which must all be satisfied. If empty,
     * nothing needs to be allocated.
     *
     * @return static
     */
    public function setRequests(iterable $requests): static
    {
        $this->requests = $requests;

        return $this;
    }

    /** @return static */
    public function addRequests(DeviceRequest $request): static
    {
        if (! $this->requests) {
            $this->requests = new Collection();
        }

        $this->requests[] = $request;

        return $this;
    }
}
