<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Resource\v1alpha2;

use Kcs\K8s\Attribute as Kubernetes;

/**
 * VendorParameters are opaque parameters for one particular driver.
 */
class VendorParameters
{
    #[Kubernetes\Attribute('driverName')]
    protected string|null $driverName = null;

    #[Kubernetes\Attribute('parameters')]
    protected object|null $parameters = null;

    public function __construct(string|null $driverName = null, object|null $parameters = null)
    {
        $this->driverName = $driverName;
        $this->parameters = $parameters;
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
     * Parameters can be arbitrary setup parameters. They are ignored while allocating a claim.
     */
    public function getParameters(): object
    {
        return $this->parameters;
    }

    /**
     * Parameters can be arbitrary setup parameters. They are ignored while allocating a claim.
     *
     * @return static
     */
    public function setParameters(object $parameters): static
    {
        $this->parameters = $parameters;

        return $this;
    }
}
