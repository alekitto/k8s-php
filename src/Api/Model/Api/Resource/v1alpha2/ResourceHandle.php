<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Resource\v1alpha2;

use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;

/**
 * ResourceHandle holds opaque resource data for processing by a specific kubelet plugin.
 */
class ResourceHandle
{
    #[Kubernetes\Attribute('data')]
    protected string|null $data = null;

    #[Kubernetes\Attribute('driverName')]
    protected string|null $driverName = null;

    #[Kubernetes\Attribute('structuredData', type: AttributeType::Model, model: StructuredResourceHandle::class)]
    protected StructuredResourceHandle|null $structuredData = null;

    public function __construct(
        string|null $data = null,
        string|null $driverName = null,
        StructuredResourceHandle|null $structuredData = null,
    ) {
        $this->data = $data;
        $this->driverName = $driverName;
        $this->structuredData = $structuredData;
    }

    /**
     * Data contains the opaque data associated with this ResourceHandle. It is set by the controller
     * component of the resource driver whose name matches the DriverName set in the ResourceClaimStatus
     * this ResourceHandle is embedded in. It is set at allocation time and is intended for processing by
     * the kubelet plugin whose name matches the DriverName set in this ResourceHandle.
     *
     * The maximum size of this field is 16KiB. This may get increased in the future, but not reduced.
     */
    public function getData(): string|null
    {
        return $this->data;
    }

    /**
     * Data contains the opaque data associated with this ResourceHandle. It is set by the controller
     * component of the resource driver whose name matches the DriverName set in the ResourceClaimStatus
     * this ResourceHandle is embedded in. It is set at allocation time and is intended for processing by
     * the kubelet plugin whose name matches the DriverName set in this ResourceHandle.
     *
     * The maximum size of this field is 16KiB. This may get increased in the future, but not reduced.
     *
     * @return static
     */
    public function setData(string $data): static
    {
        $this->data = $data;

        return $this;
    }

    /**
     * DriverName specifies the name of the resource driver whose kubelet plugin should be invoked to
     * process this ResourceHandle's data once it lands on a node. This may differ from the DriverName set
     * in ResourceClaimStatus this ResourceHandle is embedded in.
     */
    public function getDriverName(): string|null
    {
        return $this->driverName;
    }

    /**
     * DriverName specifies the name of the resource driver whose kubelet plugin should be invoked to
     * process this ResourceHandle's data once it lands on a node. This may differ from the DriverName set
     * in ResourceClaimStatus this ResourceHandle is embedded in.
     *
     * @return static
     */
    public function setDriverName(string $driverName): static
    {
        $this->driverName = $driverName;

        return $this;
    }

    /**
     * If StructuredData is set, then it needs to be used instead of Data.
     */
    public function getStructuredData(): StructuredResourceHandle|null
    {
        return $this->structuredData;
    }

    /**
     * If StructuredData is set, then it needs to be used instead of Data.
     *
     * @return static
     */
    public function setStructuredData(StructuredResourceHandle $structuredData): static
    {
        $this->structuredData = $structuredData;

        return $this;
    }
}
