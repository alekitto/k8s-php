<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Resource\v1alpha2;

use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;
use Kcs\K8s\Collection;

/**
 * DriverRequests describes all resources that are needed from one particular driver.
 */
class DriverRequests
{
    #[Kubernetes\Attribute('driverName')]
    protected string|null $driverName = null;

    /** @var iterable|ResourceRequest[]|null */
    #[Kubernetes\Attribute('requests', type: AttributeType::Collection, model: ResourceRequest::class)]
    protected $requests = null;

    #[Kubernetes\Attribute('vendorParameters')]
    protected object|null $vendorParameters = null;

    /** @param iterable|ResourceRequest[] $requests */
    public function __construct(string|null $driverName = null, iterable $requests = [], object|null $vendorParameters = null)
    {
        $this->driverName = $driverName;
        $this->requests = new Collection($requests);
        $this->vendorParameters = $vendorParameters;
    }

    /**
     * DriverName is the name used by the DRA driver kubelet plugin.
     */
    public function getDriverName(): string|null
    {
        return $this->driverName;
    }

    /**
     * DriverName is the name used by the DRA driver kubelet plugin.
     *
     * @return static
     */
    public function setDriverName(string $driverName): static
    {
        $this->driverName = $driverName;

        return $this;
    }

    /**
     * Requests describes all resources that are needed from the driver.
     *
     * @return iterable|ResourceRequest[]
     */
    public function getRequests(): iterable|null
    {
        return $this->requests;
    }

    /**
     * Requests describes all resources that are needed from the driver.
     *
     * @return static
     */
    public function setRequests(iterable $requests): static
    {
        $this->requests = $requests;

        return $this;
    }

    /** @return static */
    public function addRequests(ResourceRequest $request): static
    {
        if (! $this->requests) {
            $this->requests = new Collection();
        }

        $this->requests[] = $request;

        return $this;
    }

    /**
     * VendorParameters are arbitrary setup parameters for all requests of the claim. They are ignored
     * while allocating the claim.
     */
    public function getVendorParameters(): object
    {
        return $this->vendorParameters;
    }

    /**
     * VendorParameters are arbitrary setup parameters for all requests of the claim. They are ignored
     * while allocating the claim.
     *
     * @return static
     */
    public function setVendorParameters(object $vendorParameters): static
    {
        $this->vendorParameters = $vendorParameters;

        return $this;
    }
}
