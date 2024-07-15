<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Core\v1;

use Kcs\K8s\Attribute as Kubernetes;

/**
 * Local represents directly-attached storage with node affinity (Beta feature)
 */
class LocalVolumeSource
{
    #[Kubernetes\Attribute('fsType')]
    protected string|null $fsType = null;

    #[Kubernetes\Attribute('path', required: true)]
    protected string $path;

    public function __construct(string $path)
    {
        $this->path = $path;
    }

    /**
     * fsType is the filesystem type to mount. It applies only when the Path is a block device. Must be a
     * filesystem type supported by the host operating system. Ex. "ext4", "xfs", "ntfs". The default value
     * is to auto-select a filesystem if unspecified.
     */
    public function getFsType(): string|null
    {
        return $this->fsType;
    }

    /**
     * fsType is the filesystem type to mount. It applies only when the Path is a block device. Must be a
     * filesystem type supported by the host operating system. Ex. "ext4", "xfs", "ntfs". The default value
     * is to auto-select a filesystem if unspecified.
     *
     * @return static
     */
    public function setFsType(string $fsType): static
    {
        $this->fsType = $fsType;

        return $this;
    }

    /**
     * path of the full path to the volume on the node. It can be either a directory or block device (disk,
     * partition, ...).
     */
    public function getPath(): string
    {
        return $this->path;
    }

    /**
     * path of the full path to the volume on the node. It can be either a directory or block device (disk,
     * partition, ...).
     *
     * @return static
     */
    public function setPath(string $path): static
    {
        $this->path = $path;

        return $this;
    }
}
