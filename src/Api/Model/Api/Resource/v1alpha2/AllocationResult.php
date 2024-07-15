<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Resource\v1alpha2;

use Kcs\K8s\Api\Model\Api\Core\v1\NodeSelector;
use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;
use Kcs\K8s\Collection;

/**
 * AllocationResult contains attributes of an allocated resource.
 */
class AllocationResult
{
    #[Kubernetes\Attribute('availableOnNodes', type: AttributeType::Model, model: NodeSelector::class)]
    protected NodeSelector|null $availableOnNodes = null;

    /** @var iterable|ResourceHandle[]|null */
    #[Kubernetes\Attribute('resourceHandles', type: AttributeType::Collection, model: ResourceHandle::class)]
    protected $resourceHandles = null;

    #[Kubernetes\Attribute('shareable')]
    protected bool|null $shareable = null;

    /** @param iterable|ResourceHandle[] $resourceHandles */
    public function __construct(
        NodeSelector|null $availableOnNodes = null,
        iterable $resourceHandles = [],
        bool|null $shareable = null,
    ) {
        $this->availableOnNodes = $availableOnNodes;
        $this->resourceHandles = new Collection($resourceHandles);
        $this->shareable = $shareable;
    }

    /**
     * This field will get set by the resource driver after it has allocated the resource to inform the
     * scheduler where it can schedule Pods using the ResourceClaim.
     *
     * Setting this field is optional. If null, the resource is available everywhere.
     */
    public function getAvailableOnNodes(): NodeSelector|null
    {
        return $this->availableOnNodes;
    }

    /**
     * This field will get set by the resource driver after it has allocated the resource to inform the
     * scheduler where it can schedule Pods using the ResourceClaim.
     *
     * Setting this field is optional. If null, the resource is available everywhere.
     *
     * @return static
     */
    public function setAvailableOnNodes(NodeSelector $availableOnNodes): static
    {
        $this->availableOnNodes = $availableOnNodes;

        return $this;
    }

    /**
     * ResourceHandles contain the state associated with an allocation that should be maintained throughout
     * the lifetime of a claim. Each ResourceHandle contains data that should be passed to a specific
     * kubelet plugin once it lands on a node. This data is returned by the driver after a successful
     * allocation and is opaque to Kubernetes. Driver documentation may explain to users how to interpret
     * this data if needed.
     *
     * Setting this field is optional. It has a maximum size of 32 entries. If null (or empty), it is
     * assumed this allocation will be processed by a single kubelet plugin with no ResourceHandle data
     * attached. The name of the kubelet plugin invoked will match the DriverName set in the
     * ResourceClaimStatus this AllocationResult is embedded in.
     *
     * @return iterable|ResourceHandle[]
     */
    public function getResourceHandles(): iterable|null
    {
        return $this->resourceHandles;
    }

    /**
     * ResourceHandles contain the state associated with an allocation that should be maintained throughout
     * the lifetime of a claim. Each ResourceHandle contains data that should be passed to a specific
     * kubelet plugin once it lands on a node. This data is returned by the driver after a successful
     * allocation and is opaque to Kubernetes. Driver documentation may explain to users how to interpret
     * this data if needed.
     *
     * Setting this field is optional. It has a maximum size of 32 entries. If null (or empty), it is
     * assumed this allocation will be processed by a single kubelet plugin with no ResourceHandle data
     * attached. The name of the kubelet plugin invoked will match the DriverName set in the
     * ResourceClaimStatus this AllocationResult is embedded in.
     *
     * @return static
     */
    public function setResourceHandles(iterable $resourceHandles): static
    {
        $this->resourceHandles = $resourceHandles;

        return $this;
    }

    /** @return static */
    public function addResourceHandles(ResourceHandle $resourceHandle): static
    {
        if (! $this->resourceHandles) {
            $this->resourceHandles = new Collection();
        }

        $this->resourceHandles[] = $resourceHandle;

        return $this;
    }

    /**
     * Shareable determines whether the resource supports more than one consumer at a time.
     */
    public function isShareable(): bool|null
    {
        return $this->shareable;
    }

    /**
     * Shareable determines whether the resource supports more than one consumer at a time.
     *
     * @return static
     */
    public function setIsShareable(bool $shareable): static
    {
        $this->shareable = $shareable;

        return $this;
    }
}
