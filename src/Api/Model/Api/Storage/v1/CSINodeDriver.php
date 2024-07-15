<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Storage\v1;

use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;

/**
 * CSINodeDriver holds information about the specification of one CSI driver installed on a node
 */
class CSINodeDriver
{
    #[Kubernetes\Attribute('allocatable', type: AttributeType::Model, model: VolumeNodeResources::class)]
    protected VolumeNodeResources|null $allocatable = null;

    #[Kubernetes\Attribute('name', required: true)]
    protected string $name;

    #[Kubernetes\Attribute('nodeID', required: true)]
    protected string $nodeID;

    /** @var string[]|null */
    #[Kubernetes\Attribute('topologyKeys')]
    protected array|null $topologyKeys = null;

    public function __construct(string $name, string $nodeID)
    {
        $this->name = $name;
        $this->nodeID = $nodeID;
    }

    /**
     * allocatable represents the volume resources of a node that are available for scheduling. This field
     * is beta.
     */
    public function getAllocatable(): VolumeNodeResources|null
    {
        return $this->allocatable;
    }

    /**
     * allocatable represents the volume resources of a node that are available for scheduling. This field
     * is beta.
     *
     * @return static
     */
    public function setAllocatable(VolumeNodeResources $allocatable): static
    {
        $this->allocatable = $allocatable;

        return $this;
    }

    /**
     * name represents the name of the CSI driver that this object refers to. This MUST be the same name
     * returned by the CSI GetPluginName() call for that driver.
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * name represents the name of the CSI driver that this object refers to. This MUST be the same name
     * returned by the CSI GetPluginName() call for that driver.
     *
     * @return static
     */
    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    /**
     * nodeID of the node from the driver point of view. This field enables Kubernetes to communicate with
     * storage systems that do not share the same nomenclature for nodes. For example, Kubernetes may refer
     * to a given node as "node1", but the storage system may refer to the same node as "nodeA". When
     * Kubernetes issues a command to the storage system to attach a volume to a specific node, it can use
     * this field to refer to the node name using the ID that the storage system will understand, e.g.
     * "nodeA" instead of "node1". This field is required.
     */
    public function getNodeID(): string
    {
        return $this->nodeID;
    }

    /**
     * nodeID of the node from the driver point of view. This field enables Kubernetes to communicate with
     * storage systems that do not share the same nomenclature for nodes. For example, Kubernetes may refer
     * to a given node as "node1", but the storage system may refer to the same node as "nodeA". When
     * Kubernetes issues a command to the storage system to attach a volume to a specific node, it can use
     * this field to refer to the node name using the ID that the storage system will understand, e.g.
     * "nodeA" instead of "node1". This field is required.
     *
     * @return static
     */
    public function setNodeID(string $nodeID): static
    {
        $this->nodeID = $nodeID;

        return $this;
    }

    /**
     * topologyKeys is the list of keys supported by the driver. When a driver is initialized on a cluster,
     * it provides a set of topology keys that it understands (e.g. "company.com/zone",
     * "company.com/region"). When a driver is initialized on a node, it provides the same topology keys
     * along with values. Kubelet will expose these topology keys as labels on its own node object. When
     * Kubernetes does topology aware provisioning, it can use this list to determine which labels it
     * should retrieve from the node object and pass back to the driver. It is possible for different nodes
     * to use different topology keys. This can be empty if driver does not support topology.
     */
    public function getTopologyKeys(): array|null
    {
        return $this->topologyKeys;
    }

    /**
     * topologyKeys is the list of keys supported by the driver. When a driver is initialized on a cluster,
     * it provides a set of topology keys that it understands (e.g. "company.com/zone",
     * "company.com/region"). When a driver is initialized on a node, it provides the same topology keys
     * along with values. Kubelet will expose these topology keys as labels on its own node object. When
     * Kubernetes does topology aware provisioning, it can use this list to determine which labels it
     * should retrieve from the node object and pass back to the driver. It is possible for different nodes
     * to use different topology keys. This can be empty if driver does not support topology.
     *
     * @return static
     */
    public function setTopologyKeys(array $topologyKeys): static
    {
        $this->topologyKeys = $topologyKeys;

        return $this;
    }
}
