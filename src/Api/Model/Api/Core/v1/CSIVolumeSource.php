<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Core\v1;

use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;

/**
 * Represents a source location of a volume to mount, managed by an external CSI driver
 */
class CSIVolumeSource
{
    #[Kubernetes\Attribute('driver', required: true)]
    protected string $driver;

    #[Kubernetes\Attribute('fsType')]
    protected string|null $fsType = null;

    #[Kubernetes\Attribute('nodePublishSecretRef', type: AttributeType::Model, model: LocalObjectReference::class)]
    protected LocalObjectReference|null $nodePublishSecretRef = null;

    #[Kubernetes\Attribute('readOnly')]
    protected bool|null $readOnly = null;

    /** @var string[]|null */
    #[Kubernetes\Attribute('volumeAttributes')]
    protected array|null $volumeAttributes = null;

    public function __construct(string $driver)
    {
        $this->driver = $driver;
    }

    /**
     * driver is the name of the CSI driver that handles this volume. Consult with your admin for the
     * correct name as registered in the cluster.
     */
    public function getDriver(): string
    {
        return $this->driver;
    }

    /**
     * driver is the name of the CSI driver that handles this volume. Consult with your admin for the
     * correct name as registered in the cluster.
     *
     * @return static
     */
    public function setDriver(string $driver): static
    {
        $this->driver = $driver;

        return $this;
    }

    /**
     * fsType to mount. Ex. "ext4", "xfs", "ntfs". If not provided, the empty value is passed to the
     * associated CSI driver which will determine the default filesystem to apply.
     */
    public function getFsType(): string|null
    {
        return $this->fsType;
    }

    /**
     * fsType to mount. Ex. "ext4", "xfs", "ntfs". If not provided, the empty value is passed to the
     * associated CSI driver which will determine the default filesystem to apply.
     *
     * @return static
     */
    public function setFsType(string $fsType): static
    {
        $this->fsType = $fsType;

        return $this;
    }

    /**
     * nodePublishSecretRef is a reference to the secret object containing sensitive information to pass to
     * the CSI driver to complete the CSI NodePublishVolume and NodeUnpublishVolume calls. This field is
     * optional, and  may be empty if no secret is required. If the secret object contains more than one
     * secret, all secret references are passed.
     */
    public function getNodePublishSecretRef(): LocalObjectReference|null
    {
        return $this->nodePublishSecretRef;
    }

    /**
     * nodePublishSecretRef is a reference to the secret object containing sensitive information to pass to
     * the CSI driver to complete the CSI NodePublishVolume and NodeUnpublishVolume calls. This field is
     * optional, and  may be empty if no secret is required. If the secret object contains more than one
     * secret, all secret references are passed.
     *
     * @return static
     */
    public function setNodePublishSecretRef(LocalObjectReference $nodePublishSecretRef): static
    {
        $this->nodePublishSecretRef = $nodePublishSecretRef;

        return $this;
    }

    /**
     * readOnly specifies a read-only configuration for the volume. Defaults to false (read/write).
     */
    public function isReadOnly(): bool|null
    {
        return $this->readOnly;
    }

    /**
     * readOnly specifies a read-only configuration for the volume. Defaults to false (read/write).
     *
     * @return static
     */
    public function setIsReadOnly(bool $readOnly): static
    {
        $this->readOnly = $readOnly;

        return $this;
    }

    /**
     * volumeAttributes stores driver-specific properties that are passed to the CSI driver. Consult your
     * driver's documentation for supported values.
     */
    public function getVolumeAttributes(): array|null
    {
        return $this->volumeAttributes;
    }

    /**
     * volumeAttributes stores driver-specific properties that are passed to the CSI driver. Consult your
     * driver's documentation for supported values.
     *
     * @return static
     */
    public function setVolumeAttributes(array $volumeAttributes): static
    {
        $this->volumeAttributes = $volumeAttributes;

        return $this;
    }
}
