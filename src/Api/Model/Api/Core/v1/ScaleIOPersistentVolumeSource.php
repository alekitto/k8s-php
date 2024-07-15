<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Core\v1;

use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;

/**
 * ScaleIOPersistentVolumeSource represents a persistent ScaleIO volume
 */
class ScaleIOPersistentVolumeSource
{
    #[Kubernetes\Attribute('fsType')]
    protected string|null $fsType = null;

    #[Kubernetes\Attribute('gateway', required: true)]
    protected string $gateway;

    #[Kubernetes\Attribute('protectionDomain')]
    protected string|null $protectionDomain = null;

    #[Kubernetes\Attribute('readOnly')]
    protected bool|null $readOnly = null;

    #[Kubernetes\Attribute('secretRef', type: AttributeType::Model, model: SecretReference::class, required: true)]
    protected SecretReference $secretRef;

    #[Kubernetes\Attribute('sslEnabled')]
    protected bool|null $sslEnabled = null;

    #[Kubernetes\Attribute('storageMode')]
    protected string|null $storageMode = null;

    #[Kubernetes\Attribute('storagePool')]
    protected string|null $storagePool = null;

    #[Kubernetes\Attribute('system', required: true)]
    protected string $system;

    #[Kubernetes\Attribute('volumeName')]
    protected string|null $volumeName = null;

    public function __construct(string $gateway, SecretReference $secretRef, string $system)
    {
        $this->gateway = $gateway;
        $this->secretRef = $secretRef;
        $this->system = $system;
    }

    /**
     * fsType is the filesystem type to mount. Must be a filesystem type supported by the host operating
     * system. Ex. "ext4", "xfs", "ntfs". Default is "xfs"
     */
    public function getFsType(): string|null
    {
        return $this->fsType;
    }

    /**
     * fsType is the filesystem type to mount. Must be a filesystem type supported by the host operating
     * system. Ex. "ext4", "xfs", "ntfs". Default is "xfs"
     *
     * @return static
     */
    public function setFsType(string $fsType): static
    {
        $this->fsType = $fsType;

        return $this;
    }

    /**
     * gateway is the host address of the ScaleIO API Gateway.
     */
    public function getGateway(): string
    {
        return $this->gateway;
    }

    /**
     * gateway is the host address of the ScaleIO API Gateway.
     *
     * @return static
     */
    public function setGateway(string $gateway): static
    {
        $this->gateway = $gateway;

        return $this;
    }

    /**
     * protectionDomain is the name of the ScaleIO Protection Domain for the configured storage.
     */
    public function getProtectionDomain(): string|null
    {
        return $this->protectionDomain;
    }

    /**
     * protectionDomain is the name of the ScaleIO Protection Domain for the configured storage.
     *
     * @return static
     */
    public function setProtectionDomain(string $protectionDomain): static
    {
        $this->protectionDomain = $protectionDomain;

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
     * secretRef references to the secret for ScaleIO user and other sensitive information. If this is not
     * provided, Login operation will fail.
     */
    public function getSecretRef(): SecretReference
    {
        return $this->secretRef;
    }

    /**
     * secretRef references to the secret for ScaleIO user and other sensitive information. If this is not
     * provided, Login operation will fail.
     *
     * @return static
     */
    public function setSecretRef(SecretReference $secretRef): static
    {
        $this->secretRef = $secretRef;

        return $this;
    }

    /**
     * sslEnabled is the flag to enable/disable SSL communication with Gateway, default false
     */
    public function isSslEnabled(): bool|null
    {
        return $this->sslEnabled;
    }

    /**
     * sslEnabled is the flag to enable/disable SSL communication with Gateway, default false
     *
     * @return static
     */
    public function setIsSslEnabled(bool $sslEnabled): static
    {
        $this->sslEnabled = $sslEnabled;

        return $this;
    }

    /**
     * storageMode indicates whether the storage for a volume should be ThickProvisioned or
     * ThinProvisioned. Default is ThinProvisioned.
     */
    public function getStorageMode(): string|null
    {
        return $this->storageMode;
    }

    /**
     * storageMode indicates whether the storage for a volume should be ThickProvisioned or
     * ThinProvisioned. Default is ThinProvisioned.
     *
     * @return static
     */
    public function setStorageMode(string $storageMode): static
    {
        $this->storageMode = $storageMode;

        return $this;
    }

    /**
     * storagePool is the ScaleIO Storage Pool associated with the protection domain.
     */
    public function getStoragePool(): string|null
    {
        return $this->storagePool;
    }

    /**
     * storagePool is the ScaleIO Storage Pool associated with the protection domain.
     *
     * @return static
     */
    public function setStoragePool(string $storagePool): static
    {
        $this->storagePool = $storagePool;

        return $this;
    }

    /**
     * system is the name of the storage system as configured in ScaleIO.
     */
    public function getSystem(): string
    {
        return $this->system;
    }

    /**
     * system is the name of the storage system as configured in ScaleIO.
     *
     * @return static
     */
    public function setSystem(string $system): static
    {
        $this->system = $system;

        return $this;
    }

    /**
     * volumeName is the name of a volume already created in the ScaleIO system that is associated with
     * this volume source.
     */
    public function getVolumeName(): string|null
    {
        return $this->volumeName;
    }

    /**
     * volumeName is the name of a volume already created in the ScaleIO system that is associated with
     * this volume source.
     *
     * @return static
     */
    public function setVolumeName(string $volumeName): static
    {
        $this->volumeName = $volumeName;

        return $this;
    }
}
