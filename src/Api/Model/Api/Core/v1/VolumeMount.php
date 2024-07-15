<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Core\v1;

use Kcs\K8s\Attribute as Kubernetes;

/**
 * VolumeMount describes a mounting of a Volume within a container.
 */
class VolumeMount
{
    #[Kubernetes\Attribute('mountPath', required: true)]
    protected string $mountPath;

    #[Kubernetes\Attribute('mountPropagation')]
    protected string|null $mountPropagation = null;

    #[Kubernetes\Attribute('name', required: true)]
    protected string $name;

    #[Kubernetes\Attribute('readOnly')]
    protected bool|null $readOnly = null;

    #[Kubernetes\Attribute('recursiveReadOnly')]
    protected string|null $recursiveReadOnly = null;

    #[Kubernetes\Attribute('subPath')]
    protected string|null $subPath = null;

    #[Kubernetes\Attribute('subPathExpr')]
    protected string|null $subPathExpr = null;

    public function __construct(string $mountPath, string $name)
    {
        $this->mountPath = $mountPath;
        $this->name = $name;
    }

    /**
     * Path within the container at which the volume should be mounted.  Must not contain ':'.
     */
    public function getMountPath(): string
    {
        return $this->mountPath;
    }

    /**
     * Path within the container at which the volume should be mounted.  Must not contain ':'.
     *
     * @return static
     */
    public function setMountPath(string $mountPath): static
    {
        $this->mountPath = $mountPath;

        return $this;
    }

    /**
     * mountPropagation determines how mounts are propagated from the host to container and the other way
     * around. When not set, MountPropagationNone is used. This field is beta in 1.10. When
     * RecursiveReadOnly is set to IfPossible or to Enabled, MountPropagation must be None or unspecified
     * (which defaults to None).
     */
    public function getMountPropagation(): string|null
    {
        return $this->mountPropagation;
    }

    /**
     * mountPropagation determines how mounts are propagated from the host to container and the other way
     * around. When not set, MountPropagationNone is used. This field is beta in 1.10. When
     * RecursiveReadOnly is set to IfPossible or to Enabled, MountPropagation must be None or unspecified
     * (which defaults to None).
     *
     * @return static
     */
    public function setMountPropagation(string $mountPropagation): static
    {
        $this->mountPropagation = $mountPropagation;

        return $this;
    }

    /**
     * This must match the Name of a Volume.
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * This must match the Name of a Volume.
     *
     * @return static
     */
    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Mounted read-only if true, read-write otherwise (false or unspecified). Defaults to false.
     */
    public function isReadOnly(): bool|null
    {
        return $this->readOnly;
    }

    /**
     * Mounted read-only if true, read-write otherwise (false or unspecified). Defaults to false.
     *
     * @return static
     */
    public function setIsReadOnly(bool $readOnly): static
    {
        $this->readOnly = $readOnly;

        return $this;
    }

    /**
     * RecursiveReadOnly specifies whether read-only mounts should be handled recursively.
     *
     * If ReadOnly is false, this field has no meaning and must be unspecified.
     *
     * If ReadOnly is true, and this field is set to Disabled, the mount is not made recursively read-only.
     *  If this field is set to IfPossible, the mount is made recursively read-only, if it is supported by
     * the container runtime.  If this field is set to Enabled, the mount is made recursively read-only if
     * it is supported by the container runtime, otherwise the pod will not be started and an error will be
     * generated to indicate the reason.
     *
     * If this field is set to IfPossible or Enabled, MountPropagation must be set to None (or be
     * unspecified, which defaults to None).
     *
     * If this field is not specified, it is treated as an equivalent of Disabled.
     */
    public function getRecursiveReadOnly(): string|null
    {
        return $this->recursiveReadOnly;
    }

    /**
     * RecursiveReadOnly specifies whether read-only mounts should be handled recursively.
     *
     * If ReadOnly is false, this field has no meaning and must be unspecified.
     *
     * If ReadOnly is true, and this field is set to Disabled, the mount is not made recursively read-only.
     *  If this field is set to IfPossible, the mount is made recursively read-only, if it is supported by
     * the container runtime.  If this field is set to Enabled, the mount is made recursively read-only if
     * it is supported by the container runtime, otherwise the pod will not be started and an error will be
     * generated to indicate the reason.
     *
     * If this field is set to IfPossible or Enabled, MountPropagation must be set to None (or be
     * unspecified, which defaults to None).
     *
     * If this field is not specified, it is treated as an equivalent of Disabled.
     *
     * @return static
     */
    public function setRecursiveReadOnly(string $recursiveReadOnly): static
    {
        $this->recursiveReadOnly = $recursiveReadOnly;

        return $this;
    }

    /**
     * Path within the volume from which the container's volume should be mounted. Defaults to "" (volume's
     * root).
     */
    public function getSubPath(): string|null
    {
        return $this->subPath;
    }

    /**
     * Path within the volume from which the container's volume should be mounted. Defaults to "" (volume's
     * root).
     *
     * @return static
     */
    public function setSubPath(string $subPath): static
    {
        $this->subPath = $subPath;

        return $this;
    }

    /**
     * Expanded path within the volume from which the container's volume should be mounted. Behaves
     * similarly to SubPath but environment variable references $(VAR_NAME) are expanded using the
     * container's environment. Defaults to "" (volume's root). SubPathExpr and SubPath are mutually
     * exclusive.
     */
    public function getSubPathExpr(): string|null
    {
        return $this->subPathExpr;
    }

    /**
     * Expanded path within the volume from which the container's volume should be mounted. Behaves
     * similarly to SubPath but environment variable references $(VAR_NAME) are expanded using the
     * container's environment. Defaults to "" (volume's root). SubPathExpr and SubPath are mutually
     * exclusive.
     *
     * @return static
     */
    public function setSubPathExpr(string $subPathExpr): static
    {
        $this->subPathExpr = $subPathExpr;

        return $this;
    }
}
