<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Core\v1;

use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;

/**
 * Represents a cinder volume resource in Openstack. A Cinder volume must exist before mounting to a
 * container. The volume must also be in the same region as the kubelet. Cinder volumes support
 * ownership management and SELinux relabeling.
 */
class CinderPersistentVolumeSource
{
    #[Kubernetes\Attribute('fsType')]
    protected string|null $fsType = null;

    #[Kubernetes\Attribute('readOnly')]
    protected bool|null $readOnly = null;

    #[Kubernetes\Attribute('secretRef', type: AttributeType::Model, model: SecretReference::class)]
    protected SecretReference|null $secretRef = null;

    #[Kubernetes\Attribute('volumeID', required: true)]
    protected string $volumeID;

    public function __construct(string $volumeID)
    {
        $this->volumeID = $volumeID;
    }

    /**
     * fsType Filesystem type to mount. Must be a filesystem type supported by the host operating system.
     * Examples: "ext4", "xfs", "ntfs". Implicitly inferred to be "ext4" if unspecified. More info:
     * https://examples.k8s.io/mysql-cinder-pd/README.md
     */
    public function getFsType(): string|null
    {
        return $this->fsType;
    }

    /**
     * fsType Filesystem type to mount. Must be a filesystem type supported by the host operating system.
     * Examples: "ext4", "xfs", "ntfs". Implicitly inferred to be "ext4" if unspecified. More info:
     * https://examples.k8s.io/mysql-cinder-pd/README.md
     *
     * @return static
     */
    public function setFsType(string $fsType): static
    {
        $this->fsType = $fsType;

        return $this;
    }

    /**
     * readOnly is Optional: Defaults to false (read/write). ReadOnly here will force the ReadOnly setting
     * in VolumeMounts. More info: https://examples.k8s.io/mysql-cinder-pd/README.md
     */
    public function isReadOnly(): bool|null
    {
        return $this->readOnly;
    }

    /**
     * readOnly is Optional: Defaults to false (read/write). ReadOnly here will force the ReadOnly setting
     * in VolumeMounts. More info: https://examples.k8s.io/mysql-cinder-pd/README.md
     *
     * @return static
     */
    public function setIsReadOnly(bool $readOnly): static
    {
        $this->readOnly = $readOnly;

        return $this;
    }

    /**
     * secretRef is Optional: points to a secret object containing parameters used to connect to OpenStack.
     */
    public function getSecretRef(): SecretReference|null
    {
        return $this->secretRef;
    }

    /**
     * secretRef is Optional: points to a secret object containing parameters used to connect to OpenStack.
     *
     * @return static
     */
    public function setSecretRef(SecretReference $secretRef): static
    {
        $this->secretRef = $secretRef;

        return $this;
    }

    /**
     * volumeID used to identify the volume in cinder. More info:
     * https://examples.k8s.io/mysql-cinder-pd/README.md
     */
    public function getVolumeID(): string
    {
        return $this->volumeID;
    }

    /**
     * volumeID used to identify the volume in cinder. More info:
     * https://examples.k8s.io/mysql-cinder-pd/README.md
     *
     * @return static
     */
    public function setVolumeID(string $volumeID): static
    {
        $this->volumeID = $volumeID;

        return $this;
    }
}
