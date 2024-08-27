<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Resource\v1alpha3;

use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;

/**
 * ResourceClaimSpec defines what is being requested in a ResourceClaim and how to configure it.
 */
class ResourceClaimSpec
{
    #[Kubernetes\Attribute('controller')]
    protected string|null $controller = null;

    #[Kubernetes\Attribute('devices', type: AttributeType::Model, model: DeviceClaim::class)]
    protected DeviceClaim|null $devices = null;

    public function __construct(string|null $controller = null, DeviceClaim|null $devices = null)
    {
        $this->controller = $controller;
        $this->devices = $devices;
    }

    /**
     * Controller is the name of the DRA driver that is meant to handle allocation of this claim. If empty,
     * allocation is handled by the scheduler while scheduling a pod.
     *
     * Must be a DNS subdomain and should end with a DNS domain owned by the vendor of the driver.
     *
     * This is an alpha field and requires enabling the DRAControlPlaneController feature gate.
     */
    public function getController(): string|null
    {
        return $this->controller;
    }

    /**
     * Controller is the name of the DRA driver that is meant to handle allocation of this claim. If empty,
     * allocation is handled by the scheduler while scheduling a pod.
     *
     * Must be a DNS subdomain and should end with a DNS domain owned by the vendor of the driver.
     *
     * This is an alpha field and requires enabling the DRAControlPlaneController feature gate.
     *
     * @return static
     */
    public function setController(string $controller): static
    {
        $this->controller = $controller;

        return $this;
    }

    /**
     * Devices defines how to request devices.
     */
    public function getDevices(): DeviceClaim|null
    {
        return $this->devices;
    }

    /**
     * Devices defines how to request devices.
     *
     * @return static
     */
    public function setDevices(DeviceClaim $devices): static
    {
        $this->devices = $devices;

        return $this;
    }
}
