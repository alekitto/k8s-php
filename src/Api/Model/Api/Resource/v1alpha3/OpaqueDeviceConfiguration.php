<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Resource\v1alpha3;

use Kcs\K8s\Attribute as Kubernetes;

/**
 * OpaqueDeviceConfiguration contains configuration parameters for a driver in a format defined by the
 * driver vendor.
 */
class OpaqueDeviceConfiguration
{
    #[Kubernetes\Attribute('driver', required: true)]
    protected string $driver;

    #[Kubernetes\Attribute('parameters', required: true)]
    protected object $parameters;

    public function __construct(string $driver, object $parameters)
    {
        $this->driver = $driver;
        $this->parameters = $parameters;
    }

    /**
     * Driver is used to determine which kubelet plugin needs to be passed these configuration parameters.
     *
     * An admission policy provided by the driver developer could use this to decide whether it needs to
     * validate them.
     *
     * Must be a DNS subdomain and should end with a DNS domain owned by the vendor of the driver.
     */
    public function getDriver(): string
    {
        return $this->driver;
    }

    /**
     * Driver is used to determine which kubelet plugin needs to be passed these configuration parameters.
     *
     * An admission policy provided by the driver developer could use this to decide whether it needs to
     * validate them.
     *
     * Must be a DNS subdomain and should end with a DNS domain owned by the vendor of the driver.
     *
     * @return static
     */
    public function setDriver(string $driver): static
    {
        $this->driver = $driver;

        return $this;
    }

    /**
     * Parameters can contain arbitrary data. It is the responsibility of the driver developer to handle
     * validation and versioning. Typically this includes self-identification and a version ("kind" +
     * "apiVersion" for Kubernetes types), with conversion between different versions.
     */
    public function getParameters(): object
    {
        return $this->parameters;
    }

    /**
     * Parameters can contain arbitrary data. It is the responsibility of the driver developer to handle
     * validation and versioning. Typically this includes self-identification and a version ("kind" +
     * "apiVersion" for Kubernetes types), with conversion between different versions.
     *
     * @return static
     */
    public function setParameters(object $parameters): static
    {
        $this->parameters = $parameters;

        return $this;
    }
}
