<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Core\v1;

use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;

/**
 * Represents a StorageOS persistent volume resource.
 */
class StorageOSPersistentVolumeSource
{
    #[Kubernetes\Attribute('fsType')]
    protected string|null $fsType = null;

    #[Kubernetes\Attribute('readOnly')]
    protected bool|null $readOnly = null;

    #[Kubernetes\Attribute('secretRef', type: AttributeType::Model, model: ObjectReference::class)]
    protected ObjectReference|null $secretRef = null;

    #[Kubernetes\Attribute('volumeName')]
    protected string|null $volumeName = null;

    #[Kubernetes\Attribute('volumeNamespace')]
    protected string|null $volumeNamespace = null;

    public function __construct(
        string|null $fsType = null,
        bool|null $readOnly = null,
        ObjectReference|null $secretRef = null,
        string|null $volumeName = null,
        string|null $volumeNamespace = null,
    ) {
        $this->fsType = $fsType;
        $this->readOnly = $readOnly;
        $this->secretRef = $secretRef;
        $this->volumeName = $volumeName;
        $this->volumeNamespace = $volumeNamespace;
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
     * secretRef specifies the secret to use for obtaining the StorageOS API credentials.  If not
     * specified, default values will be attempted.
     */
    public function getSecretRef(): ObjectReference|null
    {
        return $this->secretRef;
    }

    /**
     * secretRef specifies the secret to use for obtaining the StorageOS API credentials.  If not
     * specified, default values will be attempted.
     *
     * @return static
     */
    public function setSecretRef(ObjectReference $secretRef): static
    {
        $this->secretRef = $secretRef;

        return $this;
    }

    /**
     * volumeName is the human-readable name of the StorageOS volume.  Volume names are only unique within
     * a namespace.
     */
    public function getVolumeName(): string|null
    {
        return $this->volumeName;
    }

    /**
     * volumeName is the human-readable name of the StorageOS volume.  Volume names are only unique within
     * a namespace.
     *
     * @return static
     */
    public function setVolumeName(string $volumeName): static
    {
        $this->volumeName = $volumeName;

        return $this;
    }

    /**
     * volumeNamespace specifies the scope of the volume within StorageOS.  If no namespace is specified
     * then the Pod's namespace will be used.  This allows the Kubernetes name scoping to be mirrored
     * within StorageOS for tighter integration. Set VolumeName to any name to override the default
     * behaviour. Set to "default" if you are not using namespaces within StorageOS. Namespaces that do not
     * pre-exist within StorageOS will be created.
     */
    public function getVolumeNamespace(): string|null
    {
        return $this->volumeNamespace;
    }

    /**
     * volumeNamespace specifies the scope of the volume within StorageOS.  If no namespace is specified
     * then the Pod's namespace will be used.  This allows the Kubernetes name scoping to be mirrored
     * within StorageOS for tighter integration. Set VolumeName to any name to override the default
     * behaviour. Set to "default" if you are not using namespaces within StorageOS. Namespaces that do not
     * pre-exist within StorageOS will be created.
     *
     * @return static
     */
    public function setVolumeNamespace(string $volumeNamespace): static
    {
        $this->volumeNamespace = $volumeNamespace;

        return $this;
    }
}
