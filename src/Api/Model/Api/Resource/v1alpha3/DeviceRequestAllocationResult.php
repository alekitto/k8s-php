<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Resource\v1alpha3;

use Kcs\K8s\Attribute as Kubernetes;

/**
 * DeviceRequestAllocationResult contains the allocation result for one request.
 */
class DeviceRequestAllocationResult
{
    #[Kubernetes\Attribute('device', required: true)]
    protected string $device;

    #[Kubernetes\Attribute('driver', required: true)]
    protected string $driver;

    #[Kubernetes\Attribute('pool', required: true)]
    protected string $pool;

    #[Kubernetes\Attribute('request', required: true)]
    protected string $request;

    public function __construct(string $device, string $driver, string $pool, string $request)
    {
        $this->device = $device;
        $this->driver = $driver;
        $this->pool = $pool;
        $this->request = $request;
    }

    /**
     * Device references one device instance via its name in the driver's resource pool. It must be a DNS
     * label.
     */
    public function getDevice(): string
    {
        return $this->device;
    }

    /**
     * Device references one device instance via its name in the driver's resource pool. It must be a DNS
     * label.
     *
     * @return static
     */
    public function setDevice(string $device): static
    {
        $this->device = $device;

        return $this;
    }

    /**
     * Driver specifies the name of the DRA driver whose kubelet plugin should be invoked to process the
     * allocation once the claim is needed on a node.
     *
     * Must be a DNS subdomain and should end with a DNS domain owned by the vendor of the driver.
     */
    public function getDriver(): string
    {
        return $this->driver;
    }

    /**
     * Driver specifies the name of the DRA driver whose kubelet plugin should be invoked to process the
     * allocation once the claim is needed on a node.
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
     * This name together with the driver name and the device name field identify which device was
     * allocated (`<driver name>/<pool name>/<device name>`).
     *
     * Must not be longer than 253 characters and may contain one or more DNS sub-domains separated by
     * slashes.
     */
    public function getPool(): string
    {
        return $this->pool;
    }

    /**
     * This name together with the driver name and the device name field identify which device was
     * allocated (`<driver name>/<pool name>/<device name>`).
     *
     * Must not be longer than 253 characters and may contain one or more DNS sub-domains separated by
     * slashes.
     *
     * @return static
     */
    public function setPool(string $pool): static
    {
        $this->pool = $pool;

        return $this;
    }

    /**
     * Request is the name of the request in the claim which caused this device to be allocated. Multiple
     * devices may have been allocated per request.
     */
    public function getRequest(): string
    {
        return $this->request;
    }

    /**
     * Request is the name of the request in the claim which caused this device to be allocated. Multiple
     * devices may have been allocated per request.
     *
     * @return static
     */
    public function setRequest(string $request): static
    {
        $this->request = $request;

        return $this;
    }
}
