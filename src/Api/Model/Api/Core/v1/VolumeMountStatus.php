<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Core\v1;

use Kcs\K8s\Attribute as Kubernetes;

/**
 * VolumeMountStatus shows status of volume mounts.
 */
class VolumeMountStatus
{
    #[Kubernetes\Attribute('mountPath', required: true)]
    protected string $mountPath;

    #[Kubernetes\Attribute('name', required: true)]
    protected string $name;

    #[Kubernetes\Attribute('readOnly')]
    protected bool|null $readOnly = null;

    #[Kubernetes\Attribute('recursiveReadOnly')]
    protected string|null $recursiveReadOnly = null;

    public function __construct(string $mountPath, string $name)
    {
        $this->mountPath = $mountPath;
        $this->name = $name;
    }

    /**
     * MountPath corresponds to the original VolumeMount.
     */
    public function getMountPath(): string
    {
        return $this->mountPath;
    }

    /**
     * MountPath corresponds to the original VolumeMount.
     *
     * @return static
     */
    public function setMountPath(string $mountPath): static
    {
        $this->mountPath = $mountPath;

        return $this;
    }

    /**
     * Name corresponds to the name of the original VolumeMount.
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Name corresponds to the name of the original VolumeMount.
     *
     * @return static
     */
    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    /**
     * ReadOnly corresponds to the original VolumeMount.
     */
    public function isReadOnly(): bool|null
    {
        return $this->readOnly;
    }

    /**
     * ReadOnly corresponds to the original VolumeMount.
     *
     * @return static
     */
    public function setIsReadOnly(bool $readOnly): static
    {
        $this->readOnly = $readOnly;

        return $this;
    }

    /**
     * RecursiveReadOnly must be set to Disabled, Enabled, or unspecified (for non-readonly mounts). An
     * IfPossible value in the original VolumeMount must be translated to Disabled or Enabled, depending on
     * the mount result.
     */
    public function getRecursiveReadOnly(): string|null
    {
        return $this->recursiveReadOnly;
    }

    /**
     * RecursiveReadOnly must be set to Disabled, Enabled, or unspecified (for non-readonly mounts). An
     * IfPossible value in the original VolumeMount must be translated to Disabled or Enabled, depending on
     * the mount result.
     *
     * @return static
     */
    public function setRecursiveReadOnly(string $recursiveReadOnly): static
    {
        $this->recursiveReadOnly = $recursiveReadOnly;

        return $this;
    }
}
