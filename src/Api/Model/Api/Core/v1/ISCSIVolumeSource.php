<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Core\v1;

use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;

/**
 * Represents an ISCSI disk. ISCSI volumes can only be mounted as read/write once. ISCSI volumes
 * support ownership management and SELinux relabeling.
 */
class ISCSIVolumeSource
{
    #[Kubernetes\Attribute('chapAuthDiscovery')]
    protected bool|null $chapAuthDiscovery = null;

    #[Kubernetes\Attribute('chapAuthSession')]
    protected bool|null $chapAuthSession = null;

    #[Kubernetes\Attribute('fsType')]
    protected string|null $fsType = null;

    #[Kubernetes\Attribute('initiatorName')]
    protected string|null $initiatorName = null;

    #[Kubernetes\Attribute('iqn', required: true)]
    protected string $iqn;

    #[Kubernetes\Attribute('iscsiInterface')]
    protected string|null $iscsiInterface = null;

    #[Kubernetes\Attribute('lun', required: true)]
    protected int $lun;

    /** @var string[]|null */
    #[Kubernetes\Attribute('portals')]
    protected array|null $portals = null;

    #[Kubernetes\Attribute('readOnly')]
    protected bool|null $readOnly = null;

    #[Kubernetes\Attribute('secretRef', type: AttributeType::Model, model: LocalObjectReference::class)]
    protected LocalObjectReference|null $secretRef = null;

    #[Kubernetes\Attribute('targetPortal', required: true)]
    protected string $targetPortal;

    public function __construct(string $iqn, int $lun, string $targetPortal)
    {
        $this->iqn = $iqn;
        $this->lun = $lun;
        $this->targetPortal = $targetPortal;
    }

    /**
     * chapAuthDiscovery defines whether support iSCSI Discovery CHAP authentication
     */
    public function isChapAuthDiscovery(): bool|null
    {
        return $this->chapAuthDiscovery;
    }

    /**
     * chapAuthDiscovery defines whether support iSCSI Discovery CHAP authentication
     *
     * @return static
     */
    public function setIsChapAuthDiscovery(bool $chapAuthDiscovery): static
    {
        $this->chapAuthDiscovery = $chapAuthDiscovery;

        return $this;
    }

    /**
     * chapAuthSession defines whether support iSCSI Session CHAP authentication
     */
    public function isChapAuthSession(): bool|null
    {
        return $this->chapAuthSession;
    }

    /**
     * chapAuthSession defines whether support iSCSI Session CHAP authentication
     *
     * @return static
     */
    public function setIsChapAuthSession(bool $chapAuthSession): static
    {
        $this->chapAuthSession = $chapAuthSession;

        return $this;
    }

    /**
     * fsType is the filesystem type of the volume that you want to mount. Tip: Ensure that the filesystem
     * type is supported by the host operating system. Examples: "ext4", "xfs", "ntfs". Implicitly inferred
     * to be "ext4" if unspecified. More info: https://kubernetes.io/docs/concepts/storage/volumes#iscsi
     */
    public function getFsType(): string|null
    {
        return $this->fsType;
    }

    /**
     * fsType is the filesystem type of the volume that you want to mount. Tip: Ensure that the filesystem
     * type is supported by the host operating system. Examples: "ext4", "xfs", "ntfs". Implicitly inferred
     * to be "ext4" if unspecified. More info: https://kubernetes.io/docs/concepts/storage/volumes#iscsi
     *
     * @return static
     */
    public function setFsType(string $fsType): static
    {
        $this->fsType = $fsType;

        return $this;
    }

    /**
     * initiatorName is the custom iSCSI Initiator Name. If initiatorName is specified with iscsiInterface
     * simultaneously, new iSCSI interface <target portal>:<volume name> will be created for the
     * connection.
     */
    public function getInitiatorName(): string|null
    {
        return $this->initiatorName;
    }

    /**
     * initiatorName is the custom iSCSI Initiator Name. If initiatorName is specified with iscsiInterface
     * simultaneously, new iSCSI interface <target portal>:<volume name> will be created for the
     * connection.
     *
     * @return static
     */
    public function setInitiatorName(string $initiatorName): static
    {
        $this->initiatorName = $initiatorName;

        return $this;
    }

    /**
     * iqn is the target iSCSI Qualified Name.
     */
    public function getIqn(): string
    {
        return $this->iqn;
    }

    /**
     * iqn is the target iSCSI Qualified Name.
     *
     * @return static
     */
    public function setIqn(string $iqn): static
    {
        $this->iqn = $iqn;

        return $this;
    }

    /**
     * iscsiInterface is the interface Name that uses an iSCSI transport. Defaults to 'default' (tcp).
     */
    public function getIscsiInterface(): string|null
    {
        return $this->iscsiInterface;
    }

    /**
     * iscsiInterface is the interface Name that uses an iSCSI transport. Defaults to 'default' (tcp).
     *
     * @return static
     */
    public function setIscsiInterface(string $iscsiInterface): static
    {
        $this->iscsiInterface = $iscsiInterface;

        return $this;
    }

    /**
     * lun represents iSCSI Target Lun number.
     */
    public function getLun(): int
    {
        return $this->lun;
    }

    /**
     * lun represents iSCSI Target Lun number.
     *
     * @return static
     */
    public function setLun(int $lun): static
    {
        $this->lun = $lun;

        return $this;
    }

    /**
     * portals is the iSCSI Target Portal List. The portal is either an IP or ip_addr:port if the port is
     * other than default (typically TCP ports 860 and 3260).
     */
    public function getPortals(): array|null
    {
        return $this->portals;
    }

    /**
     * portals is the iSCSI Target Portal List. The portal is either an IP or ip_addr:port if the port is
     * other than default (typically TCP ports 860 and 3260).
     *
     * @return static
     */
    public function setPortals(array $portals): static
    {
        $this->portals = $portals;

        return $this;
    }

    /**
     * readOnly here will force the ReadOnly setting in VolumeMounts. Defaults to false.
     */
    public function isReadOnly(): bool|null
    {
        return $this->readOnly;
    }

    /**
     * readOnly here will force the ReadOnly setting in VolumeMounts. Defaults to false.
     *
     * @return static
     */
    public function setIsReadOnly(bool $readOnly): static
    {
        $this->readOnly = $readOnly;

        return $this;
    }

    /**
     * secretRef is the CHAP Secret for iSCSI target and initiator authentication
     */
    public function getSecretRef(): LocalObjectReference|null
    {
        return $this->secretRef;
    }

    /**
     * secretRef is the CHAP Secret for iSCSI target and initiator authentication
     *
     * @return static
     */
    public function setSecretRef(LocalObjectReference $secretRef): static
    {
        $this->secretRef = $secretRef;

        return $this;
    }

    /**
     * targetPortal is iSCSI Target Portal. The Portal is either an IP or ip_addr:port if the port is other
     * than default (typically TCP ports 860 and 3260).
     */
    public function getTargetPortal(): string
    {
        return $this->targetPortal;
    }

    /**
     * targetPortal is iSCSI Target Portal. The Portal is either an IP or ip_addr:port if the port is other
     * than default (typically TCP ports 860 and 3260).
     *
     * @return static
     */
    public function setTargetPortal(string $targetPortal): static
    {
        $this->targetPortal = $targetPortal;

        return $this;
    }
}
