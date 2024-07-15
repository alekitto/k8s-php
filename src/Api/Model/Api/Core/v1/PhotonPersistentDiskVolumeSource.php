<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Core\v1;

use Kcs\K8s\Attribute as Kubernetes;

/**
 * Represents a Photon Controller persistent disk resource.
 */
class PhotonPersistentDiskVolumeSource
{
    #[Kubernetes\Attribute('fsType')]
    protected string|null $fsType = null;

    #[Kubernetes\Attribute('pdID', required: true)]
    protected string $pdID;

    public function __construct(string $pdID)
    {
        $this->pdID = $pdID;
    }

    /**
     * fsType is the filesystem type to mount. Must be a filesystem type supported by the host operating
     * system. Ex. "ext4", "xfs", "ntfs". Implicitly inferred to be "ext4" if unspecified.
     */
    public function getFsType(): string|null
    {
        return $this->fsType;
    }

    /**
     * fsType is the filesystem type to mount. Must be a filesystem type supported by the host operating
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
     * pdID is the ID that identifies Photon Controller persistent disk
     */
    public function getPdID(): string
    {
        return $this->pdID;
    }

    /**
     * pdID is the ID that identifies Photon Controller persistent disk
     *
     * @return static
     */
    public function setPdID(string $pdID): static
    {
        $this->pdID = $pdID;

        return $this;
    }
}
