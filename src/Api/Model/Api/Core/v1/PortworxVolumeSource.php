<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Core\v1;

use Kcs\K8s\Attribute as Kubernetes;

/**
 * PortworxVolumeSource represents a Portworx volume resource.
 */
class PortworxVolumeSource
{
    #[Kubernetes\Attribute('fsType')]
    protected string|null $fsType = null;

    #[Kubernetes\Attribute('readOnly')]
    protected bool|null $readOnly = null;

    #[Kubernetes\Attribute('volumeID', required: true)]
    protected string $volumeID;

    public function __construct(string $volumeID)
    {
        $this->volumeID = $volumeID;
    }

    /**
     * fSType represents the filesystem type to mount Must be a filesystem type supported by the host
     * operating system. Ex. "ext4", "xfs". Implicitly inferred to be "ext4" if unspecified.
     */
    public function getFsType(): string|null
    {
        return $this->fsType;
    }

    /**
     * fSType represents the filesystem type to mount Must be a filesystem type supported by the host
     * operating system. Ex. "ext4", "xfs". Implicitly inferred to be "ext4" if unspecified.
     *
     * @return static
     */
    public function setFsType(string $fsType): static
    {
        $this->fsType = $fsType;

        return $this;
    }

    /**
     * readOnly defaults to false (read/write). ReadOnly here will force the ReadOnly setting in
     * VolumeMounts.
     */
    public function isReadOnly(): bool|null
    {
        return $this->readOnly;
    }

    /**
     * readOnly defaults to false (read/write). ReadOnly here will force the ReadOnly setting in
     * VolumeMounts.
     *
     * @return static
     */
    public function setIsReadOnly(bool $readOnly): static
    {
        $this->readOnly = $readOnly;

        return $this;
    }

    /**
     * volumeID uniquely identifies a Portworx volume
     */
    public function getVolumeID(): string
    {
        return $this->volumeID;
    }

    /**
     * volumeID uniquely identifies a Portworx volume
     *
     * @return static
     */
    public function setVolumeID(string $volumeID): static
    {
        $this->volumeID = $volumeID;

        return $this;
    }
}
