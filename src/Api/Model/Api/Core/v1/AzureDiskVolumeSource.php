<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Core\v1;

use Kcs\K8s\Attribute as Kubernetes;

/**
 * AzureDisk represents an Azure Data Disk mount on the host and bind mount to the pod.
 */
class AzureDiskVolumeSource
{
    #[Kubernetes\Attribute('cachingMode')]
    protected string|null $cachingMode = null;

    #[Kubernetes\Attribute('diskName', required: true)]
    protected string $diskName;

    #[Kubernetes\Attribute('diskURI', required: true)]
    protected string $diskURI;

    #[Kubernetes\Attribute('fsType')]
    protected string|null $fsType = null;

    #[Kubernetes\Attribute('kind')]
    protected string|null $kind = null;

    #[Kubernetes\Attribute('readOnly')]
    protected bool|null $readOnly = null;

    public function __construct(string $diskName, string $diskURI)
    {
        $this->diskName = $diskName;
        $this->diskURI = $diskURI;
    }

    /**
     * cachingMode is the Host Caching mode: None, Read Only, Read Write.
     */
    public function getCachingMode(): string|null
    {
        return $this->cachingMode;
    }

    /**
     * cachingMode is the Host Caching mode: None, Read Only, Read Write.
     *
     * @return static
     */
    public function setCachingMode(string $cachingMode): static
    {
        $this->cachingMode = $cachingMode;

        return $this;
    }

    /**
     * diskName is the Name of the data disk in the blob storage
     */
    public function getDiskName(): string
    {
        return $this->diskName;
    }

    /**
     * diskName is the Name of the data disk in the blob storage
     *
     * @return static
     */
    public function setDiskName(string $diskName): static
    {
        $this->diskName = $diskName;

        return $this;
    }

    /**
     * diskURI is the URI of data disk in the blob storage
     */
    public function getDiskURI(): string
    {
        return $this->diskURI;
    }

    /**
     * diskURI is the URI of data disk in the blob storage
     *
     * @return static
     */
    public function setDiskURI(string $diskURI): static
    {
        $this->diskURI = $diskURI;

        return $this;
    }

    /**
     * fsType is Filesystem type to mount. Must be a filesystem type supported by the host operating
     * system. Ex. "ext4", "xfs", "ntfs". Implicitly inferred to be "ext4" if unspecified.
     */
    public function getFsType(): string|null
    {
        return $this->fsType;
    }

    /**
     * fsType is Filesystem type to mount. Must be a filesystem type supported by the host operating
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
     * kind expected values are Shared: multiple blob disks per storage account  Dedicated: single blob
     * disk per storage account  Managed: azure managed data disk (only in managed availability set).
     * defaults to shared
     */
    public function getKind(): string|null
    {
        return $this->kind;
    }

    /**
     * kind expected values are Shared: multiple blob disks per storage account  Dedicated: single blob
     * disk per storage account  Managed: azure managed data disk (only in managed availability set).
     * defaults to shared
     *
     * @return static
     */
    public function setKind(string $kind): static
    {
        $this->kind = $kind;

        return $this;
    }

    /**
     * readOnly Defaults to false (read/write). ReadOnly here will force the ReadOnly setting in
     * VolumeMounts.
     */
    public function isReadOnly(): bool|null
    {
        return $this->readOnly;
    }

    /**
     * readOnly Defaults to false (read/write). ReadOnly here will force the ReadOnly setting in
     * VolumeMounts.
     *
     * @return static
     */
    public function setIsReadOnly(bool $readOnly): static
    {
        $this->readOnly = $readOnly;

        return $this;
    }
}
