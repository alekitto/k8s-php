<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Core\v1;

use Kcs\K8s\Attribute as Kubernetes;

/**
 * Represents a Fibre Channel volume. Fibre Channel volumes can only be mounted as read/write once.
 * Fibre Channel volumes support ownership management and SELinux relabeling.
 */
class FCVolumeSource
{
    #[Kubernetes\Attribute('fsType')]
    protected string|null $fsType = null;

    #[Kubernetes\Attribute('lun')]
    protected int|null $lun = null;

    #[Kubernetes\Attribute('readOnly')]
    protected bool|null $readOnly = null;

    /** @var string[]|null */
    #[Kubernetes\Attribute('targetWWNs')]
    protected array|null $targetWWNs = null;

    /** @var string[]|null */
    #[Kubernetes\Attribute('wwids')]
    protected array|null $wwids = null;

    /**
     * @param string[]|null $targetWWNs
     * @param string[]|null $wwids
     */
    public function __construct(
        string|null $fsType = null,
        int|null $lun = null,
        bool|null $readOnly = null,
        array|null $targetWWNs = null,
        array|null $wwids = null,
    ) {
        $this->fsType = $fsType;
        $this->lun = $lun;
        $this->readOnly = $readOnly;
        $this->targetWWNs = $targetWWNs;
        $this->wwids = $wwids;
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
     * lun is Optional: FC target lun number
     */
    public function getLun(): int|null
    {
        return $this->lun;
    }

    /**
     * lun is Optional: FC target lun number
     *
     * @return static
     */
    public function setLun(int $lun): static
    {
        $this->lun = $lun;

        return $this;
    }

    /**
     * readOnly is Optional: Defaults to false (read/write). ReadOnly here will force the ReadOnly setting
     * in VolumeMounts.
     */
    public function isReadOnly(): bool|null
    {
        return $this->readOnly;
    }

    /**
     * readOnly is Optional: Defaults to false (read/write). ReadOnly here will force the ReadOnly setting
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
     * targetWWNs is Optional: FC target worldwide names (WWNs)
     */
    public function getTargetWWNs(): array|null
    {
        return $this->targetWWNs;
    }

    /**
     * targetWWNs is Optional: FC target worldwide names (WWNs)
     *
     * @return static
     */
    public function setTargetWWNs(array $targetWWNs): static
    {
        $this->targetWWNs = $targetWWNs;

        return $this;
    }

    /**
     * wwids Optional: FC volume world wide identifiers (wwids) Either wwids or combination of targetWWNs
     * and lun must be set, but not both simultaneously.
     */
    public function getWwids(): array|null
    {
        return $this->wwids;
    }

    /**
     * wwids Optional: FC volume world wide identifiers (wwids) Either wwids or combination of targetWWNs
     * and lun must be set, but not both simultaneously.
     *
     * @return static
     */
    public function setWwids(array $wwids): static
    {
        $this->wwids = $wwids;

        return $this;
    }
}
