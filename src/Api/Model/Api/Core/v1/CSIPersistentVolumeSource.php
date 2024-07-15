<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Core\v1;

use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;

/**
 * Represents storage that is managed by an external CSI volume driver (Beta feature)
 */
class CSIPersistentVolumeSource
{
    #[Kubernetes\Attribute('controllerExpandSecretRef', type: AttributeType::Model, model: SecretReference::class)]
    protected SecretReference|null $controllerExpandSecretRef = null;

    #[Kubernetes\Attribute('controllerPublishSecretRef', type: AttributeType::Model, model: SecretReference::class)]
    protected SecretReference|null $controllerPublishSecretRef = null;

    #[Kubernetes\Attribute('driver', required: true)]
    protected string $driver;

    #[Kubernetes\Attribute('fsType')]
    protected string|null $fsType = null;

    #[Kubernetes\Attribute('nodeExpandSecretRef', type: AttributeType::Model, model: SecretReference::class)]
    protected SecretReference|null $nodeExpandSecretRef = null;

    #[Kubernetes\Attribute('nodePublishSecretRef', type: AttributeType::Model, model: SecretReference::class)]
    protected SecretReference|null $nodePublishSecretRef = null;

    #[Kubernetes\Attribute('nodeStageSecretRef', type: AttributeType::Model, model: SecretReference::class)]
    protected SecretReference|null $nodeStageSecretRef = null;

    #[Kubernetes\Attribute('readOnly')]
    protected bool|null $readOnly = null;

    /** @var string[]|null */
    #[Kubernetes\Attribute('volumeAttributes')]
    protected array|null $volumeAttributes = null;

    #[Kubernetes\Attribute('volumeHandle', required: true)]
    protected string $volumeHandle;

    public function __construct(string $driver, string $volumeHandle)
    {
        $this->driver = $driver;
        $this->volumeHandle = $volumeHandle;
    }

    /**
     * controllerExpandSecretRef is a reference to the secret object containing sensitive information to
     * pass to the CSI driver to complete the CSI ControllerExpandVolume call. This field is optional, and
     * may be empty if no secret is required. If the secret object contains more than one secret, all
     * secrets are passed.
     */
    public function getControllerExpandSecretRef(): SecretReference|null
    {
        return $this->controllerExpandSecretRef;
    }

    /**
     * controllerExpandSecretRef is a reference to the secret object containing sensitive information to
     * pass to the CSI driver to complete the CSI ControllerExpandVolume call. This field is optional, and
     * may be empty if no secret is required. If the secret object contains more than one secret, all
     * secrets are passed.
     *
     * @return static
     */
    public function setControllerExpandSecretRef(SecretReference $controllerExpandSecretRef): static
    {
        $this->controllerExpandSecretRef = $controllerExpandSecretRef;

        return $this;
    }

    /**
     * controllerPublishSecretRef is a reference to the secret object containing sensitive information to
     * pass to the CSI driver to complete the CSI ControllerPublishVolume and ControllerUnpublishVolume
     * calls. This field is optional, and may be empty if no secret is required. If the secret object
     * contains more than one secret, all secrets are passed.
     */
    public function getControllerPublishSecretRef(): SecretReference|null
    {
        return $this->controllerPublishSecretRef;
    }

    /**
     * controllerPublishSecretRef is a reference to the secret object containing sensitive information to
     * pass to the CSI driver to complete the CSI ControllerPublishVolume and ControllerUnpublishVolume
     * calls. This field is optional, and may be empty if no secret is required. If the secret object
     * contains more than one secret, all secrets are passed.
     *
     * @return static
     */
    public function setControllerPublishSecretRef(SecretReference $controllerPublishSecretRef): static
    {
        $this->controllerPublishSecretRef = $controllerPublishSecretRef;

        return $this;
    }

    /**
     * driver is the name of the driver to use for this volume. Required.
     */
    public function getDriver(): string
    {
        return $this->driver;
    }

    /**
     * driver is the name of the driver to use for this volume. Required.
     *
     * @return static
     */
    public function setDriver(string $driver): static
    {
        $this->driver = $driver;

        return $this;
    }

    /**
     * fsType to mount. Must be a filesystem type supported by the host operating system. Ex. "ext4",
     * "xfs", "ntfs".
     */
    public function getFsType(): string|null
    {
        return $this->fsType;
    }

    /**
     * fsType to mount. Must be a filesystem type supported by the host operating system. Ex. "ext4",
     * "xfs", "ntfs".
     *
     * @return static
     */
    public function setFsType(string $fsType): static
    {
        $this->fsType = $fsType;

        return $this;
    }

    /**
     * nodeExpandSecretRef is a reference to the secret object containing sensitive information to pass to
     * the CSI driver to complete the CSI NodeExpandVolume call. This field is optional, may be omitted if
     * no secret is required. If the secret object contains more than one secret, all secrets are passed.
     */
    public function getNodeExpandSecretRef(): SecretReference|null
    {
        return $this->nodeExpandSecretRef;
    }

    /**
     * nodeExpandSecretRef is a reference to the secret object containing sensitive information to pass to
     * the CSI driver to complete the CSI NodeExpandVolume call. This field is optional, may be omitted if
     * no secret is required. If the secret object contains more than one secret, all secrets are passed.
     *
     * @return static
     */
    public function setNodeExpandSecretRef(SecretReference $nodeExpandSecretRef): static
    {
        $this->nodeExpandSecretRef = $nodeExpandSecretRef;

        return $this;
    }

    /**
     * nodePublishSecretRef is a reference to the secret object containing sensitive information to pass to
     * the CSI driver to complete the CSI NodePublishVolume and NodeUnpublishVolume calls. This field is
     * optional, and may be empty if no secret is required. If the secret object contains more than one
     * secret, all secrets are passed.
     */
    public function getNodePublishSecretRef(): SecretReference|null
    {
        return $this->nodePublishSecretRef;
    }

    /**
     * nodePublishSecretRef is a reference to the secret object containing sensitive information to pass to
     * the CSI driver to complete the CSI NodePublishVolume and NodeUnpublishVolume calls. This field is
     * optional, and may be empty if no secret is required. If the secret object contains more than one
     * secret, all secrets are passed.
     *
     * @return static
     */
    public function setNodePublishSecretRef(SecretReference $nodePublishSecretRef): static
    {
        $this->nodePublishSecretRef = $nodePublishSecretRef;

        return $this;
    }

    /**
     * nodeStageSecretRef is a reference to the secret object containing sensitive information to pass to
     * the CSI driver to complete the CSI NodeStageVolume and NodeStageVolume and NodeUnstageVolume calls.
     * This field is optional, and may be empty if no secret is required. If the secret object contains
     * more than one secret, all secrets are passed.
     */
    public function getNodeStageSecretRef(): SecretReference|null
    {
        return $this->nodeStageSecretRef;
    }

    /**
     * nodeStageSecretRef is a reference to the secret object containing sensitive information to pass to
     * the CSI driver to complete the CSI NodeStageVolume and NodeStageVolume and NodeUnstageVolume calls.
     * This field is optional, and may be empty if no secret is required. If the secret object contains
     * more than one secret, all secrets are passed.
     *
     * @return static
     */
    public function setNodeStageSecretRef(SecretReference $nodeStageSecretRef): static
    {
        $this->nodeStageSecretRef = $nodeStageSecretRef;

        return $this;
    }

    /**
     * readOnly value to pass to ControllerPublishVolumeRequest. Defaults to false (read/write).
     */
    public function isReadOnly(): bool|null
    {
        return $this->readOnly;
    }

    /**
     * readOnly value to pass to ControllerPublishVolumeRequest. Defaults to false (read/write).
     *
     * @return static
     */
    public function setIsReadOnly(bool $readOnly): static
    {
        $this->readOnly = $readOnly;

        return $this;
    }

    /**
     * volumeAttributes of the volume to publish.
     */
    public function getVolumeAttributes(): array|null
    {
        return $this->volumeAttributes;
    }

    /**
     * volumeAttributes of the volume to publish.
     *
     * @return static
     */
    public function setVolumeAttributes(array $volumeAttributes): static
    {
        $this->volumeAttributes = $volumeAttributes;

        return $this;
    }

    /**
     * volumeHandle is the unique volume name returned by the CSI volume plugin’s CreateVolume to refer
     * to the volume on all subsequent calls. Required.
     */
    public function getVolumeHandle(): string
    {
        return $this->volumeHandle;
    }

    /**
     * volumeHandle is the unique volume name returned by the CSI volume plugin’s CreateVolume to refer
     * to the volume on all subsequent calls. Required.
     *
     * @return static
     */
    public function setVolumeHandle(string $volumeHandle): static
    {
        $this->volumeHandle = $volumeHandle;

        return $this;
    }
}
