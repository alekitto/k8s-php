<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Resource\v1alpha3;

use Kcs\K8s\Api\Model\Api\Core\v1\NodeSelector;
use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;

/**
 * AllocationResult contains attributes of an allocated resource.
 */
class AllocationResult
{
    #[Kubernetes\Attribute('controller')]
    protected string|null $controller = null;

    #[Kubernetes\Attribute('devices', type: AttributeType::Model, model: DeviceAllocationResult::class)]
    protected DeviceAllocationResult|null $devices = null;

    #[Kubernetes\Attribute('nodeSelector', type: AttributeType::Model, model: NodeSelector::class)]
    protected NodeSelector|null $nodeSelector = null;

    public function __construct(
        string|null $controller = null,
        DeviceAllocationResult|null $devices = null,
        NodeSelector|null $nodeSelector = null,
    ) {
        $this->controller = $controller;
        $this->devices = $devices;
        $this->nodeSelector = $nodeSelector;
    }

    /**
     * Controller is the name of the DRA driver which handled the allocation. That driver is also
     * responsible for deallocating the claim. It is empty when the claim can be deallocated without
     * involving a driver.
     *
     * A driver may allocate devices provided by other drivers, so this driver name here can be different
     * from the driver names listed for the results.
     *
     * This is an alpha field and requires enabling the DRAControlPlaneController feature gate.
     */
    public function getController(): string|null
    {
        return $this->controller;
    }

    /**
     * Controller is the name of the DRA driver which handled the allocation. That driver is also
     * responsible for deallocating the claim. It is empty when the claim can be deallocated without
     * involving a driver.
     *
     * A driver may allocate devices provided by other drivers, so this driver name here can be different
     * from the driver names listed for the results.
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
     * Devices is the result of allocating devices.
     */
    public function getDevices(): DeviceAllocationResult|null
    {
        return $this->devices;
    }

    /**
     * Devices is the result of allocating devices.
     *
     * @return static
     */
    public function setDevices(DeviceAllocationResult $devices): static
    {
        $this->devices = $devices;

        return $this;
    }

    /**
     * NodeSelector defines where the allocated resources are available. If unset, they are available
     * everywhere.
     */
    public function getNodeSelector(): NodeSelector|null
    {
        return $this->nodeSelector;
    }

    /**
     * NodeSelector defines where the allocated resources are available. If unset, they are available
     * everywhere.
     *
     * @return static
     */
    public function setNodeSelector(NodeSelector $nodeSelector): static
    {
        $this->nodeSelector = $nodeSelector;

        return $this;
    }
}
