<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Core\v1;

use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;
use Kcs\K8s\Collection;

/**
 * NodeStatus is information about the current status of a node.
 */
class NodeStatus
{
    /** @var iterable|NodeAddress[]|null */
    #[Kubernetes\Attribute('addresses', type: AttributeType::Collection, model: NodeAddress::class)]
    protected $addresses = null;

    /** @var object[]|null */
    #[Kubernetes\Attribute('allocatable')]
    protected array|null $allocatable = null;

    /** @var object[]|null */
    #[Kubernetes\Attribute('capacity')]
    protected array|null $capacity = null;

    /** @var iterable|NodeCondition[]|null */
    #[Kubernetes\Attribute('conditions', type: AttributeType::Collection, model: NodeCondition::class)]
    protected $conditions = null;

    #[Kubernetes\Attribute('config', type: AttributeType::Model, model: NodeConfigStatus::class)]
    protected NodeConfigStatus|null $config = null;

    #[Kubernetes\Attribute('daemonEndpoints', type: AttributeType::Model, model: NodeDaemonEndpoints::class)]
    protected NodeDaemonEndpoints|null $daemonEndpoints = null;

    #[Kubernetes\Attribute('features', type: AttributeType::Model, model: NodeFeatures::class)]
    protected NodeFeatures|null $features = null;

    /** @var iterable|ContainerImage[]|null */
    #[Kubernetes\Attribute('images', type: AttributeType::Collection, model: ContainerImage::class)]
    protected $images = null;

    #[Kubernetes\Attribute('nodeInfo', type: AttributeType::Model, model: NodeSystemInfo::class)]
    protected NodeSystemInfo|null $nodeInfo = null;

    #[Kubernetes\Attribute('phase')]
    protected string|null $phase = null;

    /** @var iterable|NodeRuntimeHandler[]|null */
    #[Kubernetes\Attribute('runtimeHandlers', type: AttributeType::Collection, model: NodeRuntimeHandler::class)]
    protected $runtimeHandlers = null;

    /** @var iterable|AttachedVolume[]|null */
    #[Kubernetes\Attribute('volumesAttached', type: AttributeType::Collection, model: AttachedVolume::class)]
    protected $volumesAttached = null;

    /** @var string[]|null */
    #[Kubernetes\Attribute('volumesInUse')]
    protected array|null $volumesInUse = null;

    /**
     * List of addresses reachable to the node. Queried from cloud provider, if available. More info:
     * https://kubernetes.io/docs/concepts/nodes/node/#addresses Note: This field is declared as mergeable,
     * but the merge key is not sufficiently unique, which can cause data corruption when it is merged.
     * Callers should instead use a full-replacement patch. See https://pr.k8s.io/79391 for an example.
     * Consumers should assume that addresses can change during the lifetime of a Node. However, there are
     * some exceptions where this may not be possible, such as Pods that inherit a Node's address in its
     * own status or consumers of the downward API (status.hostIP).
     *
     * @return iterable|NodeAddress[]
     */
    public function getAddresses(): iterable|null
    {
        return $this->addresses;
    }

    /**
     * List of addresses reachable to the node. Queried from cloud provider, if available. More info:
     * https://kubernetes.io/docs/concepts/nodes/node/#addresses Note: This field is declared as mergeable,
     * but the merge key is not sufficiently unique, which can cause data corruption when it is merged.
     * Callers should instead use a full-replacement patch. See https://pr.k8s.io/79391 for an example.
     * Consumers should assume that addresses can change during the lifetime of a Node. However, there are
     * some exceptions where this may not be possible, such as Pods that inherit a Node's address in its
     * own status or consumers of the downward API (status.hostIP).
     *
     * @return static
     */
    public function setAddresses(iterable $addresses): static
    {
        $this->addresses = $addresses;

        return $this;
    }

    /** @return static */
    public function addAddresses(NodeAddress $addresse): static
    {
        if (! $this->addresses) {
            $this->addresses = new Collection();
        }

        $this->addresses[] = $addresse;

        return $this;
    }

    /**
     * Allocatable represents the resources of a node that are available for scheduling. Defaults to
     * Capacity.
     */
    public function getAllocatable(): array|null
    {
        return $this->allocatable;
    }

    /**
     * Allocatable represents the resources of a node that are available for scheduling. Defaults to
     * Capacity.
     *
     * @return static
     */
    public function setAllocatable(array $allocatable): static
    {
        $this->allocatable = $allocatable;

        return $this;
    }

    /**
     * Capacity represents the total resources of a node. More info:
     * https://kubernetes.io/docs/reference/node/node-status/#capacity
     */
    public function getCapacity(): array|null
    {
        return $this->capacity;
    }

    /**
     * Capacity represents the total resources of a node. More info:
     * https://kubernetes.io/docs/reference/node/node-status/#capacity
     *
     * @return static
     */
    public function setCapacity(array $capacity): static
    {
        $this->capacity = $capacity;

        return $this;
    }

    /**
     * Conditions is an array of current observed node conditions. More info:
     * https://kubernetes.io/docs/concepts/nodes/node/#condition
     *
     * @return iterable|NodeCondition[]
     */
    public function getConditions(): iterable|null
    {
        return $this->conditions;
    }

    /**
     * Conditions is an array of current observed node conditions. More info:
     * https://kubernetes.io/docs/concepts/nodes/node/#condition
     *
     * @return static
     */
    public function setConditions(iterable $conditions): static
    {
        $this->conditions = $conditions;

        return $this;
    }

    /** @return static */
    public function addConditions(NodeCondition $condition): static
    {
        if (! $this->conditions) {
            $this->conditions = new Collection();
        }

        $this->conditions[] = $condition;

        return $this;
    }

    /**
     * Status of the config assigned to the node via the dynamic Kubelet config feature.
     */
    public function getConfig(): NodeConfigStatus|null
    {
        return $this->config;
    }

    /**
     * Status of the config assigned to the node via the dynamic Kubelet config feature.
     *
     * @return static
     */
    public function setConfig(NodeConfigStatus $config): static
    {
        $this->config = $config;

        return $this;
    }

    /**
     * Endpoints of daemons running on the Node.
     */
    public function getDaemonEndpoints(): NodeDaemonEndpoints|null
    {
        return $this->daemonEndpoints;
    }

    /**
     * Endpoints of daemons running on the Node.
     *
     * @return static
     */
    public function setDaemonEndpoints(NodeDaemonEndpoints $daemonEndpoints): static
    {
        $this->daemonEndpoints = $daemonEndpoints;

        return $this;
    }

    /**
     * Features describes the set of features implemented by the CRI implementation.
     */
    public function getFeatures(): NodeFeatures|null
    {
        return $this->features;
    }

    /**
     * Features describes the set of features implemented by the CRI implementation.
     *
     * @return static
     */
    public function setFeatures(NodeFeatures $features): static
    {
        $this->features = $features;

        return $this;
    }

    /**
     * List of container images on this node
     *
     * @return iterable|ContainerImage[]
     */
    public function getImages(): iterable|null
    {
        return $this->images;
    }

    /**
     * List of container images on this node
     *
     * @return static
     */
    public function setImages(iterable $images): static
    {
        $this->images = $images;

        return $this;
    }

    /** @return static */
    public function addImages(ContainerImage $image): static
    {
        if (! $this->images) {
            $this->images = new Collection();
        }

        $this->images[] = $image;

        return $this;
    }

    /**
     * Set of ids/uuids to uniquely identify the node. More info:
     * https://kubernetes.io/docs/concepts/nodes/node/#info
     */
    public function getNodeInfo(): NodeSystemInfo|null
    {
        return $this->nodeInfo;
    }

    /**
     * Set of ids/uuids to uniquely identify the node. More info:
     * https://kubernetes.io/docs/concepts/nodes/node/#info
     *
     * @return static
     */
    public function setNodeInfo(NodeSystemInfo $nodeInfo): static
    {
        $this->nodeInfo = $nodeInfo;

        return $this;
    }

    /**
     * NodePhase is the recently observed lifecycle phase of the node. More info:
     * https://kubernetes.io/docs/concepts/nodes/node/#phase The field is never populated, and now is
     * deprecated.
     */
    public function getPhase(): string|null
    {
        return $this->phase;
    }

    /**
     * NodePhase is the recently observed lifecycle phase of the node. More info:
     * https://kubernetes.io/docs/concepts/nodes/node/#phase The field is never populated, and now is
     * deprecated.
     *
     * @return static
     */
    public function setPhase(string $phase): static
    {
        $this->phase = $phase;

        return $this;
    }

    /**
     * The available runtime handlers.
     *
     * @return iterable|NodeRuntimeHandler[]
     */
    public function getRuntimeHandlers(): iterable|null
    {
        return $this->runtimeHandlers;
    }

    /**
     * The available runtime handlers.
     *
     * @return static
     */
    public function setRuntimeHandlers(iterable $runtimeHandlers): static
    {
        $this->runtimeHandlers = $runtimeHandlers;

        return $this;
    }

    /** @return static */
    public function addRuntimeHandlers(NodeRuntimeHandler $runtimeHandler): static
    {
        if (! $this->runtimeHandlers) {
            $this->runtimeHandlers = new Collection();
        }

        $this->runtimeHandlers[] = $runtimeHandler;

        return $this;
    }

    /**
     * List of volumes that are attached to the node.
     *
     * @return iterable|AttachedVolume[]
     */
    public function getVolumesAttached(): iterable|null
    {
        return $this->volumesAttached;
    }

    /**
     * List of volumes that are attached to the node.
     *
     * @return static
     */
    public function setVolumesAttached(iterable $volumesAttached): static
    {
        $this->volumesAttached = $volumesAttached;

        return $this;
    }

    /** @return static */
    public function addVolumesAttached(AttachedVolume $volumesAttached): static
    {
        if (! $this->volumesAttached) {
            $this->volumesAttached = new Collection();
        }

        $this->volumesAttached[] = $volumesAttached;

        return $this;
    }

    /**
     * List of attachable volumes in use (mounted) by the node.
     */
    public function getVolumesInUse(): array|null
    {
        return $this->volumesInUse;
    }

    /**
     * List of attachable volumes in use (mounted) by the node.
     *
     * @return static
     */
    public function setVolumesInUse(array $volumesInUse): static
    {
        $this->volumesInUse = $volumesInUse;

        return $this;
    }
}
