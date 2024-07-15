<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Core\v1;

use Kcs\K8s\Attribute as Kubernetes;

/**
 * Represents a Glusterfs mount that lasts the lifetime of a pod. Glusterfs volumes do not support
 * ownership management or SELinux relabeling.
 */
class GlusterfsVolumeSource
{
    #[Kubernetes\Attribute('endpoints', required: true)]
    protected string $endpoints;

    #[Kubernetes\Attribute('path', required: true)]
    protected string $path;

    #[Kubernetes\Attribute('readOnly')]
    protected bool|null $readOnly = null;

    public function __construct(string $endpoints, string $path)
    {
        $this->endpoints = $endpoints;
        $this->path = $path;
    }

    /**
     * endpoints is the endpoint name that details Glusterfs topology. More info:
     * https://examples.k8s.io/volumes/glusterfs/README.md#create-a-pod
     */
    public function getEndpoints(): string
    {
        return $this->endpoints;
    }

    /**
     * endpoints is the endpoint name that details Glusterfs topology. More info:
     * https://examples.k8s.io/volumes/glusterfs/README.md#create-a-pod
     *
     * @return static
     */
    public function setEndpoints(string $endpoints): static
    {
        $this->endpoints = $endpoints;

        return $this;
    }

    /**
     * path is the Glusterfs volume path. More info:
     * https://examples.k8s.io/volumes/glusterfs/README.md#create-a-pod
     */
    public function getPath(): string
    {
        return $this->path;
    }

    /**
     * path is the Glusterfs volume path. More info:
     * https://examples.k8s.io/volumes/glusterfs/README.md#create-a-pod
     *
     * @return static
     */
    public function setPath(string $path): static
    {
        $this->path = $path;

        return $this;
    }

    /**
     * readOnly here will force the Glusterfs volume to be mounted with read-only permissions. Defaults to
     * false. More info: https://examples.k8s.io/volumes/glusterfs/README.md#create-a-pod
     */
    public function isReadOnly(): bool|null
    {
        return $this->readOnly;
    }

    /**
     * readOnly here will force the Glusterfs volume to be mounted with read-only permissions. Defaults to
     * false. More info: https://examples.k8s.io/volumes/glusterfs/README.md#create-a-pod
     *
     * @return static
     */
    public function setIsReadOnly(bool $readOnly): static
    {
        $this->readOnly = $readOnly;

        return $this;
    }
}
