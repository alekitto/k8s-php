<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Core\v1;

use Kcs\K8s\Attribute as Kubernetes;

/**
 * Represents a vSphere volume resource.
 */
class VsphereVirtualDiskVolumeSource
{
    #[Kubernetes\Attribute('fsType')]
    protected string|null $fsType = null;

    #[Kubernetes\Attribute('storagePolicyID')]
    protected string|null $storagePolicyID = null;

    #[Kubernetes\Attribute('storagePolicyName')]
    protected string|null $storagePolicyName = null;

    #[Kubernetes\Attribute('volumePath', required: true)]
    protected string $volumePath;

    public function __construct(string $volumePath)
    {
        $this->volumePath = $volumePath;
    }

    /**
     * fsType is filesystem type to mount. Must be a filesystem type supported by the host operating
     * system. Ex. "ext4", "xfs", "ntfs". Implicitly inferred to be "ext4" if unspecified.
     */
    public function getFsType(): string|null
    {
        return $this->fsType;
    }

    /**
     * fsType is filesystem type to mount. Must be a filesystem type supported by the host operating
     * system. Ex. "ext4", "xfs", "ntfs". Implicitly inferred to be "ext4" if unspecified.
     *
     * @return static
     */
    public function setFsType(string $fsType): static
    {
        $this->fsType = $fsType;

        return $this;
    }

    /**
     * storagePolicyID is the storage Policy Based Management (SPBM) profile ID associated with the
     * StoragePolicyName.
     */
    public function getStoragePolicyID(): string|null
    {
        return $this->storagePolicyID;
    }

    /**
     * storagePolicyID is the storage Policy Based Management (SPBM) profile ID associated with the
     * StoragePolicyName.
     *
     * @return static
     */
    public function setStoragePolicyID(string $storagePolicyID): static
    {
        $this->storagePolicyID = $storagePolicyID;

        return $this;
    }

    /**
     * storagePolicyName is the storage Policy Based Management (SPBM) profile name.
     */
    public function getStoragePolicyName(): string|null
    {
        return $this->storagePolicyName;
    }

    /**
     * storagePolicyName is the storage Policy Based Management (SPBM) profile name.
     *
     * @return static
     */
    public function setStoragePolicyName(string $storagePolicyName): static
    {
        $this->storagePolicyName = $storagePolicyName;

        return $this;
    }

    /**
     * volumePath is the path that identifies vSphere volume vmdk
     */
    public function getVolumePath(): string
    {
        return $this->volumePath;
    }

    /**
     * volumePath is the path that identifies vSphere volume vmdk
     *
     * @return static
     */
    public function setVolumePath(string $volumePath): static
    {
        $this->volumePath = $volumePath;

        return $this;
    }
}
