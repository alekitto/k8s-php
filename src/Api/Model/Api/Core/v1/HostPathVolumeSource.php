<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Core\v1;

use Kcs\K8s\Attribute as Kubernetes;

/**
 * Represents a host path mapped into a pod. Host path volumes do not support ownership management or
 * SELinux relabeling.
 */
class HostPathVolumeSource
{
    #[Kubernetes\Attribute('path', required: true)]
    protected string $path;

    #[Kubernetes\Attribute('type')]
    protected string|null $type = null;

    public function __construct(string $path)
    {
        $this->path = $path;
    }

    /**
     * path of the directory on the host. If the path is a symlink, it will follow the link to the real
     * path. More info: https://kubernetes.io/docs/concepts/storage/volumes#hostpath
     */
    public function getPath(): string
    {
        return $this->path;
    }

    /**
     * path of the directory on the host. If the path is a symlink, it will follow the link to the real
     * path. More info: https://kubernetes.io/docs/concepts/storage/volumes#hostpath
     *
     * @return static
     */
    public function setPath(string $path): static
    {
        $this->path = $path;

        return $this;
    }

    /**
     * type for HostPath Volume Defaults to "" More info:
     * https://kubernetes.io/docs/concepts/storage/volumes#hostpath
     */
    public function getType(): string|null
    {
        return $this->type;
    }

    /**
     * type for HostPath Volume Defaults to "" More info:
     * https://kubernetes.io/docs/concepts/storage/volumes#hostpath
     *
     * @return static
     */
    public function setType(string $type): static
    {
        $this->type = $type;

        return $this;
    }
}
