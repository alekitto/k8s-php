<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Core\v1;

use Kcs\K8s\Attribute as Kubernetes;

/**
 * Represents an NFS mount that lasts the lifetime of a pod. NFS volumes do not support ownership
 * management or SELinux relabeling.
 */
class NFSVolumeSource
{
    #[Kubernetes\Attribute('path', required: true)]
    protected string $path;

    #[Kubernetes\Attribute('readOnly')]
    protected bool|null $readOnly = null;

    #[Kubernetes\Attribute('server', required: true)]
    protected string $server;

    public function __construct(string $path, string $server)
    {
        $this->path = $path;
        $this->server = $server;
    }

    /**
     * path that is exported by the NFS server. More info:
     * https://kubernetes.io/docs/concepts/storage/volumes#nfs
     */
    public function getPath(): string
    {
        return $this->path;
    }

    /**
     * path that is exported by the NFS server. More info:
     * https://kubernetes.io/docs/concepts/storage/volumes#nfs
     *
     * @return static
     */
    public function setPath(string $path): static
    {
        $this->path = $path;

        return $this;
    }

    /**
     * readOnly here will force the NFS export to be mounted with read-only permissions. Defaults to false.
     * More info: https://kubernetes.io/docs/concepts/storage/volumes#nfs
     */
    public function isReadOnly(): bool|null
    {
        return $this->readOnly;
    }

    /**
     * readOnly here will force the NFS export to be mounted with read-only permissions. Defaults to false.
     * More info: https://kubernetes.io/docs/concepts/storage/volumes#nfs
     *
     * @return static
     */
    public function setIsReadOnly(bool $readOnly): static
    {
        $this->readOnly = $readOnly;

        return $this;
    }

    /**
     * server is the hostname or IP address of the NFS server. More info:
     * https://kubernetes.io/docs/concepts/storage/volumes#nfs
     */
    public function getServer(): string
    {
        return $this->server;
    }

    /**
     * server is the hostname or IP address of the NFS server. More info:
     * https://kubernetes.io/docs/concepts/storage/volumes#nfs
     *
     * @return static
     */
    public function setServer(string $server): static
    {
        $this->server = $server;

        return $this;
    }
}
