<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Core\v1;

use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;

/**
 * Represents a Ceph Filesystem mount that lasts the lifetime of a pod Cephfs volumes do not support
 * ownership management or SELinux relabeling.
 */
class CephFSVolumeSource
{
    /** @var string[] */
    #[Kubernetes\Attribute('monitors', required: true)]
    protected array $monitors;

    #[Kubernetes\Attribute('path')]
    protected string|null $path = null;

    #[Kubernetes\Attribute('readOnly')]
    protected bool|null $readOnly = null;

    #[Kubernetes\Attribute('secretFile')]
    protected string|null $secretFile = null;

    #[Kubernetes\Attribute('secretRef', type: AttributeType::Model, model: LocalObjectReference::class)]
    protected LocalObjectReference|null $secretRef = null;

    #[Kubernetes\Attribute('user')]
    protected string|null $user = null;

    /** @param string[] $monitors */
    public function __construct(array $monitors)
    {
        $this->monitors = $monitors;
    }

    /**
     * monitors is Required: Monitors is a collection of Ceph monitors More info:
     * https://examples.k8s.io/volumes/cephfs/README.md#how-to-use-it
     */
    public function getMonitors(): array
    {
        return $this->monitors;
    }

    /**
     * monitors is Required: Monitors is a collection of Ceph monitors More info:
     * https://examples.k8s.io/volumes/cephfs/README.md#how-to-use-it
     *
     * @return static
     */
    public function setMonitors(array $monitors): static
    {
        $this->monitors = $monitors;

        return $this;
    }

    /**
     * path is Optional: Used as the mounted root, rather than the full Ceph tree, default is /
     */
    public function getPath(): string|null
    {
        return $this->path;
    }

    /**
     * path is Optional: Used as the mounted root, rather than the full Ceph tree, default is /
     *
     * @return static
     */
    public function setPath(string $path): static
    {
        $this->path = $path;

        return $this;
    }

    /**
     * readOnly is Optional: Defaults to false (read/write). ReadOnly here will force the ReadOnly setting
     * in VolumeMounts. More info: https://examples.k8s.io/volumes/cephfs/README.md#how-to-use-it
     */
    public function isReadOnly(): bool|null
    {
        return $this->readOnly;
    }

    /**
     * readOnly is Optional: Defaults to false (read/write). ReadOnly here will force the ReadOnly setting
     * in VolumeMounts. More info: https://examples.k8s.io/volumes/cephfs/README.md#how-to-use-it
     *
     * @return static
     */
    public function setIsReadOnly(bool $readOnly): static
    {
        $this->readOnly = $readOnly;

        return $this;
    }

    /**
     * secretFile is Optional: SecretFile is the path to key ring for User, default is
     * /etc/ceph/user.secret More info: https://examples.k8s.io/volumes/cephfs/README.md#how-to-use-it
     */
    public function getSecretFile(): string|null
    {
        return $this->secretFile;
    }

    /**
     * secretFile is Optional: SecretFile is the path to key ring for User, default is
     * /etc/ceph/user.secret More info: https://examples.k8s.io/volumes/cephfs/README.md#how-to-use-it
     *
     * @return static
     */
    public function setSecretFile(string $secretFile): static
    {
        $this->secretFile = $secretFile;

        return $this;
    }

    /**
     * secretRef is Optional: SecretRef is reference to the authentication secret for User, default is
     * empty. More info: https://examples.k8s.io/volumes/cephfs/README.md#how-to-use-it
     */
    public function getSecretRef(): LocalObjectReference|null
    {
        return $this->secretRef;
    }

    /**
     * secretRef is Optional: SecretRef is reference to the authentication secret for User, default is
     * empty. More info: https://examples.k8s.io/volumes/cephfs/README.md#how-to-use-it
     *
     * @return static
     */
    public function setSecretRef(LocalObjectReference $secretRef): static
    {
        $this->secretRef = $secretRef;

        return $this;
    }

    /**
     * user is optional: User is the rados user name, default is admin More info:
     * https://examples.k8s.io/volumes/cephfs/README.md#how-to-use-it
     */
    public function getUser(): string|null
    {
        return $this->user;
    }

    /**
     * user is optional: User is the rados user name, default is admin More info:
     * https://examples.k8s.io/volumes/cephfs/README.md#how-to-use-it
     *
     * @return static
     */
    public function setUser(string $user): static
    {
        $this->user = $user;

        return $this;
    }
}
