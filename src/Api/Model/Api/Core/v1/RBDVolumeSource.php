<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Core\v1;

use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;

/**
 * Represents a Rados Block Device mount that lasts the lifetime of a pod. RBD volumes support
 * ownership management and SELinux relabeling.
 */
class RBDVolumeSource
{
    #[Kubernetes\Attribute('fsType')]
    protected string|null $fsType = null;

    #[Kubernetes\Attribute('image', required: true)]
    protected string $image;

    #[Kubernetes\Attribute('keyring')]
    protected string|null $keyring = null;

    /** @var string[] */
    #[Kubernetes\Attribute('monitors', required: true)]
    protected array $monitors;

    #[Kubernetes\Attribute('pool')]
    protected string|null $pool = null;

    #[Kubernetes\Attribute('readOnly')]
    protected bool|null $readOnly = null;

    #[Kubernetes\Attribute('secretRef', type: AttributeType::Model, model: LocalObjectReference::class)]
    protected LocalObjectReference|null $secretRef = null;

    #[Kubernetes\Attribute('user')]
    protected string|null $user = null;

    /** @param string[] $monitors */
    public function __construct(string $image, array $monitors)
    {
        $this->image = $image;
        $this->monitors = $monitors;
    }

    /**
     * fsType is the filesystem type of the volume that you want to mount. Tip: Ensure that the filesystem
     * type is supported by the host operating system. Examples: "ext4", "xfs", "ntfs". Implicitly inferred
     * to be "ext4" if unspecified. More info: https://kubernetes.io/docs/concepts/storage/volumes#rbd
     */
    public function getFsType(): string|null
    {
        return $this->fsType;
    }

    /**
     * fsType is the filesystem type of the volume that you want to mount. Tip: Ensure that the filesystem
     * type is supported by the host operating system. Examples: "ext4", "xfs", "ntfs". Implicitly inferred
     * to be "ext4" if unspecified. More info: https://kubernetes.io/docs/concepts/storage/volumes#rbd
     *
     * @return static
     */
    public function setFsType(string $fsType): static
    {
        $this->fsType = $fsType;

        return $this;
    }

    /**
     * image is the rados image name. More info:
     * https://examples.k8s.io/volumes/rbd/README.md#how-to-use-it
     */
    public function getImage(): string
    {
        return $this->image;
    }

    /**
     * image is the rados image name. More info:
     * https://examples.k8s.io/volumes/rbd/README.md#how-to-use-it
     *
     * @return static
     */
    public function setImage(string $image): static
    {
        $this->image = $image;

        return $this;
    }

    /**
     * keyring is the path to key ring for RBDUser. Default is /etc/ceph/keyring. More info:
     * https://examples.k8s.io/volumes/rbd/README.md#how-to-use-it
     */
    public function getKeyring(): string|null
    {
        return $this->keyring;
    }

    /**
     * keyring is the path to key ring for RBDUser. Default is /etc/ceph/keyring. More info:
     * https://examples.k8s.io/volumes/rbd/README.md#how-to-use-it
     *
     * @return static
     */
    public function setKeyring(string $keyring): static
    {
        $this->keyring = $keyring;

        return $this;
    }

    /**
     * monitors is a collection of Ceph monitors. More info:
     * https://examples.k8s.io/volumes/rbd/README.md#how-to-use-it
     */
    public function getMonitors(): array
    {
        return $this->monitors;
    }

    /**
     * monitors is a collection of Ceph monitors. More info:
     * https://examples.k8s.io/volumes/rbd/README.md#how-to-use-it
     *
     * @return static
     */
    public function setMonitors(array $monitors): static
    {
        $this->monitors = $monitors;

        return $this;
    }

    /**
     * pool is the rados pool name. Default is rbd. More info:
     * https://examples.k8s.io/volumes/rbd/README.md#how-to-use-it
     */
    public function getPool(): string|null
    {
        return $this->pool;
    }

    /**
     * pool is the rados pool name. Default is rbd. More info:
     * https://examples.k8s.io/volumes/rbd/README.md#how-to-use-it
     *
     * @return static
     */
    public function setPool(string $pool): static
    {
        $this->pool = $pool;

        return $this;
    }

    /**
     * readOnly here will force the ReadOnly setting in VolumeMounts. Defaults to false. More info:
     * https://examples.k8s.io/volumes/rbd/README.md#how-to-use-it
     */
    public function isReadOnly(): bool|null
    {
        return $this->readOnly;
    }

    /**
     * readOnly here will force the ReadOnly setting in VolumeMounts. Defaults to false. More info:
     * https://examples.k8s.io/volumes/rbd/README.md#how-to-use-it
     *
     * @return static
     */
    public function setIsReadOnly(bool $readOnly): static
    {
        $this->readOnly = $readOnly;

        return $this;
    }

    /**
     * secretRef is name of the authentication secret for RBDUser. If provided overrides keyring. Default
     * is nil. More info: https://examples.k8s.io/volumes/rbd/README.md#how-to-use-it
     */
    public function getSecretRef(): LocalObjectReference|null
    {
        return $this->secretRef;
    }

    /**
     * secretRef is name of the authentication secret for RBDUser. If provided overrides keyring. Default
     * is nil. More info: https://examples.k8s.io/volumes/rbd/README.md#how-to-use-it
     *
     * @return static
     */
    public function setSecretRef(LocalObjectReference $secretRef): static
    {
        $this->secretRef = $secretRef;

        return $this;
    }

    /**
     * user is the rados user name. Default is admin. More info:
     * https://examples.k8s.io/volumes/rbd/README.md#how-to-use-it
     */
    public function getUser(): string|null
    {
        return $this->user;
    }

    /**
     * user is the rados user name. Default is admin. More info:
     * https://examples.k8s.io/volumes/rbd/README.md#how-to-use-it
     *
     * @return static
     */
    public function setUser(string $user): static
    {
        $this->user = $user;

        return $this;
    }
}
