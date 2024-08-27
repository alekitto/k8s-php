<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Resource\v1alpha3;

use Kcs\K8s\Api\Model\Api\Core\v1\NodeSelector;
use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;
use Kcs\K8s\Collection;

/**
 * ResourceSliceSpec contains the information published by the driver in one ResourceSlice.
 */
class ResourceSliceSpec
{
    #[Kubernetes\Attribute('allNodes')]
    protected bool|null $allNodes = null;

    /** @var iterable|Device[]|null */
    #[Kubernetes\Attribute('devices', type: AttributeType::Collection, model: Device::class)]
    protected $devices = null;

    #[Kubernetes\Attribute('driver', required: true)]
    protected string $driver;

    #[Kubernetes\Attribute('nodeName')]
    protected string|null $nodeName = null;

    #[Kubernetes\Attribute('nodeSelector', type: AttributeType::Model, model: NodeSelector::class)]
    protected NodeSelector|null $nodeSelector = null;

    #[Kubernetes\Attribute('pool', type: AttributeType::Model, model: ResourcePool::class, required: true)]
    protected ResourcePool $pool;

    public function __construct(string $driver, ResourcePool $pool)
    {
        $this->driver = $driver;
        $this->pool = $pool;
    }

    /**
     * AllNodes indicates that all nodes have access to the resources in the pool.
     *
     * Exactly one of NodeName, NodeSelector and AllNodes must be set.
     */
    public function isAllNodes(): bool|null
    {
        return $this->allNodes;
    }

    /**
     * AllNodes indicates that all nodes have access to the resources in the pool.
     *
     * Exactly one of NodeName, NodeSelector and AllNodes must be set.
     *
     * @return static
     */
    public function setIsAllNodes(bool $allNodes): static
    {
        $this->allNodes = $allNodes;

        return $this;
    }

    /**
     * Devices lists some or all of the devices in this pool.
     *
     * Must not have more than 128 entries.
     *
     * @return iterable|Device[]
     */
    public function getDevices(): iterable|null
    {
        return $this->devices;
    }

    /**
     * Devices lists some or all of the devices in this pool.
     *
     * Must not have more than 128 entries.
     *
     * @return static
     */
    public function setDevices(iterable $devices): static
    {
        $this->devices = $devices;

        return $this;
    }

    /** @return static */
    public function addDevices(Device $device): static
    {
        if (! $this->devices) {
            $this->devices = new Collection();
        }

        $this->devices[] = $device;

        return $this;
    }

    /**
     * Driver identifies the DRA driver providing the capacity information. A field selector can be used to
     * list only ResourceSlice objects with a certain driver name.
     *
     * Must be a DNS subdomain and should end with a DNS domain owned by the vendor of the driver. This
     * field is immutable.
     */
    public function getDriver(): string
    {
        return $this->driver;
    }

    /**
     * Driver identifies the DRA driver providing the capacity information. A field selector can be used to
     * list only ResourceSlice objects with a certain driver name.
     *
     * Must be a DNS subdomain and should end with a DNS domain owned by the vendor of the driver. This
     * field is immutable.
     *
     * @return static
     */
    public function setDriver(string $driver): static
    {
        $this->driver = $driver;

        return $this;
    }

    /**
     * NodeName identifies the node which provides the resources in this pool. A field selector can be used
     * to list only ResourceSlice objects belonging to a certain node.
     *
     * This field can be used to limit access from nodes to ResourceSlices with the same node name. It also
     * indicates to autoscalers that adding new nodes of the same type as some old node might also make new
     * resources available.
     *
     * Exactly one of NodeName, NodeSelector and AllNodes must be set. This field is immutable.
     */
    public function getNodeName(): string|null
    {
        return $this->nodeName;
    }

    /**
     * NodeName identifies the node which provides the resources in this pool. A field selector can be used
     * to list only ResourceSlice objects belonging to a certain node.
     *
     * This field can be used to limit access from nodes to ResourceSlices with the same node name. It also
     * indicates to autoscalers that adding new nodes of the same type as some old node might also make new
     * resources available.
     *
     * Exactly one of NodeName, NodeSelector and AllNodes must be set. This field is immutable.
     *
     * @return static
     */
    public function setNodeName(string $nodeName): static
    {
        $this->nodeName = $nodeName;

        return $this;
    }

    /**
     * NodeSelector defines which nodes have access to the resources in the pool, when that pool is not
     * limited to a single node.
     *
     * Must use exactly one term.
     *
     * Exactly one of NodeName, NodeSelector and AllNodes must be set.
     */
    public function getNodeSelector(): NodeSelector|null
    {
        return $this->nodeSelector;
    }

    /**
     * NodeSelector defines which nodes have access to the resources in the pool, when that pool is not
     * limited to a single node.
     *
     * Must use exactly one term.
     *
     * Exactly one of NodeName, NodeSelector and AllNodes must be set.
     *
     * @return static
     */
    public function setNodeSelector(NodeSelector $nodeSelector): static
    {
        $this->nodeSelector = $nodeSelector;

        return $this;
    }

    /**
     * Pool describes the pool that this ResourceSlice belongs to.
     */
    public function getPool(): ResourcePool
    {
        return $this->pool;
    }

    /**
     * Pool describes the pool that this ResourceSlice belongs to.
     *
     * @return static
     */
    public function setPool(ResourcePool $pool): static
    {
        $this->pool = $pool;

        return $this;
    }
}
