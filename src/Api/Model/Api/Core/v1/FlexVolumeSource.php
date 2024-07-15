<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Core\v1;

use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;

/**
 * FlexVolume represents a generic volume resource that is provisioned/attached using an exec based
 * plugin.
 */
class FlexVolumeSource
{
    #[Kubernetes\Attribute('driver', required: true)]
    protected string $driver;

    #[Kubernetes\Attribute('fsType')]
    protected string|null $fsType = null;

    /** @var string[]|null */
    #[Kubernetes\Attribute('options')]
    protected array|null $options = null;

    #[Kubernetes\Attribute('readOnly')]
    protected bool|null $readOnly = null;

    #[Kubernetes\Attribute('secretRef', type: AttributeType::Model, model: LocalObjectReference::class)]
    protected LocalObjectReference|null $secretRef = null;

    public function __construct(string $driver)
    {
        $this->driver = $driver;
    }

    /**
     * driver is the name of the driver to use for this volume.
     */
    public function getDriver(): string
    {
        return $this->driver;
    }

    /**
     * driver is the name of the driver to use for this volume.
     *
     * @return static
     */
    public function setDriver(string $driver): static
    {
        $this->driver = $driver;

        return $this;
    }

    /**
     * fsType is the filesystem type to mount. Must be a filesystem type supported by the host operating
     * system. Ex. "ext4", "xfs", "ntfs". The default filesystem depends on FlexVolume script.
     */
    public function getFsType(): string|null
    {
        return $this->fsType;
    }

    /**
     * fsType is the filesystem type to mount. Must be a filesystem type supported by the host operating
     * system. Ex. "ext4", "xfs", "ntfs". The default filesystem depends on FlexVolume script.
     *
     * @return static
     */
    public function setFsType(string $fsType): static
    {
        $this->fsType = $fsType;

        return $this;
    }

    /**
     * options is Optional: this field holds extra command options if any.
     */
    public function getOptions(): array|null
    {
        return $this->options;
    }

    /**
     * options is Optional: this field holds extra command options if any.
     *
     * @return static
     */
    public function setOptions(array $options): static
    {
        $this->options = $options;

        return $this;
    }

    /**
     * readOnly is Optional: defaults to false (read/write). ReadOnly here will force the ReadOnly setting
     * in VolumeMounts.
     */
    public function isReadOnly(): bool|null
    {
        return $this->readOnly;
    }

    /**
     * readOnly is Optional: defaults to false (read/write). ReadOnly here will force the ReadOnly setting
     * in VolumeMounts.
     *
     * @return static
     */
    public function setIsReadOnly(bool $readOnly): static
    {
        $this->readOnly = $readOnly;

        return $this;
    }

    /**
     * secretRef is Optional: secretRef is reference to the secret object containing sensitive information
     * to pass to the plugin scripts. This may be empty if no secret object is specified. If the secret
     * object contains more than one secret, all secrets are passed to the plugin scripts.
     */
    public function getSecretRef(): LocalObjectReference|null
    {
        return $this->secretRef;
    }

    /**
     * secretRef is Optional: secretRef is reference to the secret object containing sensitive information
     * to pass to the plugin scripts. This may be empty if no secret object is specified. If the secret
     * object contains more than one secret, all secrets are passed to the plugin scripts.
     *
     * @return static
     */
    public function setSecretRef(LocalObjectReference $secretRef): static
    {
        $this->secretRef = $secretRef;

        return $this;
    }
}
