<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Core\v1;

use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;

/**
 * PersistentVolumeSpec is the specification of a persistent volume.
 */
class PersistentVolumeSpec
{
    /** @var string[]|null */
    #[Kubernetes\Attribute('accessModes')]
    protected array|null $accessModes = null;

    #[Kubernetes\Attribute('awsElasticBlockStore', type: AttributeType::Model, model: AWSElasticBlockStoreVolumeSource::class)]
    protected AWSElasticBlockStoreVolumeSource|null $awsElasticBlockStore = null;

    #[Kubernetes\Attribute('azureDisk', type: AttributeType::Model, model: AzureDiskVolumeSource::class)]
    protected AzureDiskVolumeSource|null $azureDisk = null;

    #[Kubernetes\Attribute('azureFile', type: AttributeType::Model, model: AzureFilePersistentVolumeSource::class)]
    protected AzureFilePersistentVolumeSource|null $azureFile = null;

    /** @var object[]|null */
    #[Kubernetes\Attribute('capacity')]
    protected array|null $capacity = null;

    #[Kubernetes\Attribute('cephfs', type: AttributeType::Model, model: CephFSPersistentVolumeSource::class)]
    protected CephFSPersistentVolumeSource|null $cephfs = null;

    #[Kubernetes\Attribute('cinder', type: AttributeType::Model, model: CinderPersistentVolumeSource::class)]
    protected CinderPersistentVolumeSource|null $cinder = null;

    #[Kubernetes\Attribute('claimRef', type: AttributeType::Model, model: ObjectReference::class)]
    protected ObjectReference|null $claimRef = null;

    #[Kubernetes\Attribute('csi', type: AttributeType::Model, model: CSIPersistentVolumeSource::class)]
    protected CSIPersistentVolumeSource|null $csi = null;

    #[Kubernetes\Attribute('fc', type: AttributeType::Model, model: FCVolumeSource::class)]
    protected FCVolumeSource|null $fc = null;

    #[Kubernetes\Attribute('flexVolume', type: AttributeType::Model, model: FlexPersistentVolumeSource::class)]
    protected FlexPersistentVolumeSource|null $flexVolume = null;

    #[Kubernetes\Attribute('flocker', type: AttributeType::Model, model: FlockerVolumeSource::class)]
    protected FlockerVolumeSource|null $flocker = null;

    #[Kubernetes\Attribute('gcePersistentDisk', type: AttributeType::Model, model: GCEPersistentDiskVolumeSource::class)]
    protected GCEPersistentDiskVolumeSource|null $gcePersistentDisk = null;

    #[Kubernetes\Attribute('glusterfs', type: AttributeType::Model, model: GlusterfsPersistentVolumeSource::class)]
    protected GlusterfsPersistentVolumeSource|null $glusterfs = null;

    #[Kubernetes\Attribute('hostPath', type: AttributeType::Model, model: HostPathVolumeSource::class)]
    protected HostPathVolumeSource|null $hostPath = null;

    #[Kubernetes\Attribute('iscsi', type: AttributeType::Model, model: ISCSIPersistentVolumeSource::class)]
    protected ISCSIPersistentVolumeSource|null $iscsi = null;

    #[Kubernetes\Attribute('local', type: AttributeType::Model, model: LocalVolumeSource::class)]
    protected LocalVolumeSource|null $local = null;

    /** @var string[]|null */
    #[Kubernetes\Attribute('mountOptions')]
    protected array|null $mountOptions = null;

    #[Kubernetes\Attribute('nfs', type: AttributeType::Model, model: NFSVolumeSource::class)]
    protected NFSVolumeSource|null $nfs = null;

    #[Kubernetes\Attribute('nodeAffinity', type: AttributeType::Model, model: VolumeNodeAffinity::class)]
    protected VolumeNodeAffinity|null $nodeAffinity = null;

    #[Kubernetes\Attribute('persistentVolumeReclaimPolicy')]
    protected string|null $persistentVolumeReclaimPolicy = null;

    #[Kubernetes\Attribute('photonPersistentDisk', type: AttributeType::Model, model: PhotonPersistentDiskVolumeSource::class)]
    protected PhotonPersistentDiskVolumeSource|null $photonPersistentDisk = null;

    #[Kubernetes\Attribute('portworxVolume', type: AttributeType::Model, model: PortworxVolumeSource::class)]
    protected PortworxVolumeSource|null $portworxVolume = null;

    #[Kubernetes\Attribute('quobyte', type: AttributeType::Model, model: QuobyteVolumeSource::class)]
    protected QuobyteVolumeSource|null $quobyte = null;

    #[Kubernetes\Attribute('rbd', type: AttributeType::Model, model: RBDPersistentVolumeSource::class)]
    protected RBDPersistentVolumeSource|null $rbd = null;

    #[Kubernetes\Attribute('scaleIO', type: AttributeType::Model, model: ScaleIOPersistentVolumeSource::class)]
    protected ScaleIOPersistentVolumeSource|null $scaleIO = null;

    #[Kubernetes\Attribute('storageClassName')]
    protected string|null $storageClassName = null;

    #[Kubernetes\Attribute('storageos', type: AttributeType::Model, model: StorageOSPersistentVolumeSource::class)]
    protected StorageOSPersistentVolumeSource|null $storageos = null;

    #[Kubernetes\Attribute('volumeAttributesClassName')]
    protected string|null $volumeAttributesClassName = null;

    #[Kubernetes\Attribute('volumeMode')]
    protected string|null $volumeMode = null;

    #[Kubernetes\Attribute('vsphereVolume', type: AttributeType::Model, model: VsphereVirtualDiskVolumeSource::class)]
    protected VsphereVirtualDiskVolumeSource|null $vsphereVolume = null;

    /**
     * accessModes contains all ways the volume can be mounted. More info:
     * https://kubernetes.io/docs/concepts/storage/persistent-volumes#access-modes
     */
    public function getAccessModes(): array|null
    {
        return $this->accessModes;
    }

    /**
     * accessModes contains all ways the volume can be mounted. More info:
     * https://kubernetes.io/docs/concepts/storage/persistent-volumes#access-modes
     *
     * @return static
     */
    public function setAccessModes(array $accessModes): static
    {
        $this->accessModes = $accessModes;

        return $this;
    }

    /**
     * awsElasticBlockStore represents an AWS Disk resource that is attached to a kubelet's host machine
     * and then exposed to the pod. More info:
     * https://kubernetes.io/docs/concepts/storage/volumes#awselasticblockstore
     */
    public function getAwsElasticBlockStore(): AWSElasticBlockStoreVolumeSource|null
    {
        return $this->awsElasticBlockStore;
    }

    /**
     * awsElasticBlockStore represents an AWS Disk resource that is attached to a kubelet's host machine
     * and then exposed to the pod. More info:
     * https://kubernetes.io/docs/concepts/storage/volumes#awselasticblockstore
     *
     * @return static
     */
    public function setAwsElasticBlockStore(AWSElasticBlockStoreVolumeSource $awsElasticBlockStore): static
    {
        $this->awsElasticBlockStore = $awsElasticBlockStore;

        return $this;
    }

    /**
     * azureDisk represents an Azure Data Disk mount on the host and bind mount to the pod.
     */
    public function getAzureDisk(): AzureDiskVolumeSource|null
    {
        return $this->azureDisk;
    }

    /**
     * azureDisk represents an Azure Data Disk mount on the host and bind mount to the pod.
     *
     * @return static
     */
    public function setAzureDisk(AzureDiskVolumeSource $azureDisk): static
    {
        $this->azureDisk = $azureDisk;

        return $this;
    }

    /**
     * azureFile represents an Azure File Service mount on the host and bind mount to the pod.
     */
    public function getAzureFile(): AzureFilePersistentVolumeSource|null
    {
        return $this->azureFile;
    }

    /**
     * azureFile represents an Azure File Service mount on the host and bind mount to the pod.
     *
     * @return static
     */
    public function setAzureFile(AzureFilePersistentVolumeSource $azureFile): static
    {
        $this->azureFile = $azureFile;

        return $this;
    }

    /**
     * capacity is the description of the persistent volume's resources and capacity. More info:
     * https://kubernetes.io/docs/concepts/storage/persistent-volumes#capacity
     */
    public function getCapacity(): array|null
    {
        return $this->capacity;
    }

    /**
     * capacity is the description of the persistent volume's resources and capacity. More info:
     * https://kubernetes.io/docs/concepts/storage/persistent-volumes#capacity
     *
     * @return static
     */
    public function setCapacity(array $capacity): static
    {
        $this->capacity = $capacity;

        return $this;
    }

    /**
     * cephFS represents a Ceph FS mount on the host that shares a pod's lifetime
     */
    public function getCephfs(): CephFSPersistentVolumeSource|null
    {
        return $this->cephfs;
    }

    /**
     * cephFS represents a Ceph FS mount on the host that shares a pod's lifetime
     *
     * @return static
     */
    public function setCephfs(CephFSPersistentVolumeSource $cephfs): static
    {
        $this->cephfs = $cephfs;

        return $this;
    }

    /**
     * cinder represents a cinder volume attached and mounted on kubelets host machine. More info:
     * https://examples.k8s.io/mysql-cinder-pd/README.md
     */
    public function getCinder(): CinderPersistentVolumeSource|null
    {
        return $this->cinder;
    }

    /**
     * cinder represents a cinder volume attached and mounted on kubelets host machine. More info:
     * https://examples.k8s.io/mysql-cinder-pd/README.md
     *
     * @return static
     */
    public function setCinder(CinderPersistentVolumeSource $cinder): static
    {
        $this->cinder = $cinder;

        return $this;
    }

    /**
     * claimRef is part of a bi-directional binding between PersistentVolume and PersistentVolumeClaim.
     * Expected to be non-nil when bound. claim.VolumeName is the authoritative bind between PV and PVC.
     * More info: https://kubernetes.io/docs/concepts/storage/persistent-volumes#binding
     */
    public function getClaimRef(): ObjectReference|null
    {
        return $this->claimRef;
    }

    /**
     * claimRef is part of a bi-directional binding between PersistentVolume and PersistentVolumeClaim.
     * Expected to be non-nil when bound. claim.VolumeName is the authoritative bind between PV and PVC.
     * More info: https://kubernetes.io/docs/concepts/storage/persistent-volumes#binding
     *
     * @return static
     */
    public function setClaimRef(ObjectReference $claimRef): static
    {
        $this->claimRef = $claimRef;

        return $this;
    }

    /**
     * csi represents storage that is handled by an external CSI driver (Beta feature).
     */
    public function getCsi(): CSIPersistentVolumeSource|null
    {
        return $this->csi;
    }

    /**
     * csi represents storage that is handled by an external CSI driver (Beta feature).
     *
     * @return static
     */
    public function setCsi(CSIPersistentVolumeSource $csi): static
    {
        $this->csi = $csi;

        return $this;
    }

    /**
     * fc represents a Fibre Channel resource that is attached to a kubelet's host machine and then exposed
     * to the pod.
     */
    public function getFc(): FCVolumeSource|null
    {
        return $this->fc;
    }

    /**
     * fc represents a Fibre Channel resource that is attached to a kubelet's host machine and then exposed
     * to the pod.
     *
     * @return static
     */
    public function setFc(FCVolumeSource $fc): static
    {
        $this->fc = $fc;

        return $this;
    }

    /**
     * flexVolume represents a generic volume resource that is provisioned/attached using an exec based
     * plugin.
     */
    public function getFlexVolume(): FlexPersistentVolumeSource|null
    {
        return $this->flexVolume;
    }

    /**
     * flexVolume represents a generic volume resource that is provisioned/attached using an exec based
     * plugin.
     *
     * @return static
     */
    public function setFlexVolume(FlexPersistentVolumeSource $flexVolume): static
    {
        $this->flexVolume = $flexVolume;

        return $this;
    }

    /**
     * flocker represents a Flocker volume attached to a kubelet's host machine and exposed to the pod for
     * its usage. This depends on the Flocker control service being running
     */
    public function getFlocker(): FlockerVolumeSource|null
    {
        return $this->flocker;
    }

    /**
     * flocker represents a Flocker volume attached to a kubelet's host machine and exposed to the pod for
     * its usage. This depends on the Flocker control service being running
     *
     * @return static
     */
    public function setFlocker(FlockerVolumeSource $flocker): static
    {
        $this->flocker = $flocker;

        return $this;
    }

    /**
     * gcePersistentDisk represents a GCE Disk resource that is attached to a kubelet's host machine and
     * then exposed to the pod. Provisioned by an admin. More info:
     * https://kubernetes.io/docs/concepts/storage/volumes#gcepersistentdisk
     */
    public function getGcePersistentDisk(): GCEPersistentDiskVolumeSource|null
    {
        return $this->gcePersistentDisk;
    }

    /**
     * gcePersistentDisk represents a GCE Disk resource that is attached to a kubelet's host machine and
     * then exposed to the pod. Provisioned by an admin. More info:
     * https://kubernetes.io/docs/concepts/storage/volumes#gcepersistentdisk
     *
     * @return static
     */
    public function setGcePersistentDisk(GCEPersistentDiskVolumeSource $gcePersistentDisk): static
    {
        $this->gcePersistentDisk = $gcePersistentDisk;

        return $this;
    }

    /**
     * glusterfs represents a Glusterfs volume that is attached to a host and exposed to the pod.
     * Provisioned by an admin. More info: https://examples.k8s.io/volumes/glusterfs/README.md
     */
    public function getGlusterfs(): GlusterfsPersistentVolumeSource|null
    {
        return $this->glusterfs;
    }

    /**
     * glusterfs represents a Glusterfs volume that is attached to a host and exposed to the pod.
     * Provisioned by an admin. More info: https://examples.k8s.io/volumes/glusterfs/README.md
     *
     * @return static
     */
    public function setGlusterfs(GlusterfsPersistentVolumeSource $glusterfs): static
    {
        $this->glusterfs = $glusterfs;

        return $this;
    }

    /**
     * hostPath represents a directory on the host. Provisioned by a developer or tester. This is useful
     * for single-node development and testing only! On-host storage is not supported in any way and WILL
     * NOT WORK in a multi-node cluster. More info:
     * https://kubernetes.io/docs/concepts/storage/volumes#hostpath
     */
    public function getHostPath(): HostPathVolumeSource|null
    {
        return $this->hostPath;
    }

    /**
     * hostPath represents a directory on the host. Provisioned by a developer or tester. This is useful
     * for single-node development and testing only! On-host storage is not supported in any way and WILL
     * NOT WORK in a multi-node cluster. More info:
     * https://kubernetes.io/docs/concepts/storage/volumes#hostpath
     *
     * @return static
     */
    public function setHostPath(HostPathVolumeSource $hostPath): static
    {
        $this->hostPath = $hostPath;

        return $this;
    }

    /**
     * iscsi represents an ISCSI Disk resource that is attached to a kubelet's host machine and then
     * exposed to the pod. Provisioned by an admin.
     */
    public function getIscsi(): ISCSIPersistentVolumeSource|null
    {
        return $this->iscsi;
    }

    /**
     * iscsi represents an ISCSI Disk resource that is attached to a kubelet's host machine and then
     * exposed to the pod. Provisioned by an admin.
     *
     * @return static
     */
    public function setIscsi(ISCSIPersistentVolumeSource $iscsi): static
    {
        $this->iscsi = $iscsi;

        return $this;
    }

    /**
     * local represents directly-attached storage with node affinity
     */
    public function getLocal(): LocalVolumeSource|null
    {
        return $this->local;
    }

    /**
     * local represents directly-attached storage with node affinity
     *
     * @return static
     */
    public function setLocal(LocalVolumeSource $local): static
    {
        $this->local = $local;

        return $this;
    }

    /**
     * mountOptions is the list of mount options, e.g. ["ro", "soft"]. Not validated - mount will simply
     * fail if one is invalid. More info:
     * https://kubernetes.io/docs/concepts/storage/persistent-volumes/#mount-options
     */
    public function getMountOptions(): array|null
    {
        return $this->mountOptions;
    }

    /**
     * mountOptions is the list of mount options, e.g. ["ro", "soft"]. Not validated - mount will simply
     * fail if one is invalid. More info:
     * https://kubernetes.io/docs/concepts/storage/persistent-volumes/#mount-options
     *
     * @return static
     */
    public function setMountOptions(array $mountOptions): static
    {
        $this->mountOptions = $mountOptions;

        return $this;
    }

    /**
     * nfs represents an NFS mount on the host. Provisioned by an admin. More info:
     * https://kubernetes.io/docs/concepts/storage/volumes#nfs
     */
    public function getNfs(): NFSVolumeSource|null
    {
        return $this->nfs;
    }

    /**
     * nfs represents an NFS mount on the host. Provisioned by an admin. More info:
     * https://kubernetes.io/docs/concepts/storage/volumes#nfs
     *
     * @return static
     */
    public function setNfs(NFSVolumeSource $nfs): static
    {
        $this->nfs = $nfs;

        return $this;
    }

    /**
     * nodeAffinity defines constraints that limit what nodes this volume can be accessed from. This field
     * influences the scheduling of pods that use this volume.
     */
    public function getNodeAffinity(): VolumeNodeAffinity|null
    {
        return $this->nodeAffinity;
    }

    /**
     * nodeAffinity defines constraints that limit what nodes this volume can be accessed from. This field
     * influences the scheduling of pods that use this volume.
     *
     * @return static
     */
    public function setNodeAffinity(VolumeNodeAffinity $nodeAffinity): static
    {
        $this->nodeAffinity = $nodeAffinity;

        return $this;
    }

    /**
     * persistentVolumeReclaimPolicy defines what happens to a persistent volume when released from its
     * claim. Valid options are Retain (default for manually created PersistentVolumes), Delete (default
     * for dynamically provisioned PersistentVolumes), and Recycle (deprecated). Recycle must be supported
     * by the volume plugin underlying this PersistentVolume. More info:
     * https://kubernetes.io/docs/concepts/storage/persistent-volumes#reclaiming
     */
    public function getPersistentVolumeReclaimPolicy(): string|null
    {
        return $this->persistentVolumeReclaimPolicy;
    }

    /**
     * persistentVolumeReclaimPolicy defines what happens to a persistent volume when released from its
     * claim. Valid options are Retain (default for manually created PersistentVolumes), Delete (default
     * for dynamically provisioned PersistentVolumes), and Recycle (deprecated). Recycle must be supported
     * by the volume plugin underlying this PersistentVolume. More info:
     * https://kubernetes.io/docs/concepts/storage/persistent-volumes#reclaiming
     *
     * @return static
     */
    public function setPersistentVolumeReclaimPolicy(string $persistentVolumeReclaimPolicy): static
    {
        $this->persistentVolumeReclaimPolicy = $persistentVolumeReclaimPolicy;

        return $this;
    }

    /**
     * photonPersistentDisk represents a PhotonController persistent disk attached and mounted on kubelets
     * host machine
     */
    public function getPhotonPersistentDisk(): PhotonPersistentDiskVolumeSource|null
    {
        return $this->photonPersistentDisk;
    }

    /**
     * photonPersistentDisk represents a PhotonController persistent disk attached and mounted on kubelets
     * host machine
     *
     * @return static
     */
    public function setPhotonPersistentDisk(PhotonPersistentDiskVolumeSource $photonPersistentDisk): static
    {
        $this->photonPersistentDisk = $photonPersistentDisk;

        return $this;
    }

    /**
     * portworxVolume represents a portworx volume attached and mounted on kubelets host machine
     */
    public function getPortworxVolume(): PortworxVolumeSource|null
    {
        return $this->portworxVolume;
    }

    /**
     * portworxVolume represents a portworx volume attached and mounted on kubelets host machine
     *
     * @return static
     */
    public function setPortworxVolume(PortworxVolumeSource $portworxVolume): static
    {
        $this->portworxVolume = $portworxVolume;

        return $this;
    }

    /**
     * quobyte represents a Quobyte mount on the host that shares a pod's lifetime
     */
    public function getQuobyte(): QuobyteVolumeSource|null
    {
        return $this->quobyte;
    }

    /**
     * quobyte represents a Quobyte mount on the host that shares a pod's lifetime
     *
     * @return static
     */
    public function setQuobyte(QuobyteVolumeSource $quobyte): static
    {
        $this->quobyte = $quobyte;

        return $this;
    }

    /**
     * rbd represents a Rados Block Device mount on the host that shares a pod's lifetime. More info:
     * https://examples.k8s.io/volumes/rbd/README.md
     */
    public function getRbd(): RBDPersistentVolumeSource|null
    {
        return $this->rbd;
    }

    /**
     * rbd represents a Rados Block Device mount on the host that shares a pod's lifetime. More info:
     * https://examples.k8s.io/volumes/rbd/README.md
     *
     * @return static
     */
    public function setRbd(RBDPersistentVolumeSource $rbd): static
    {
        $this->rbd = $rbd;

        return $this;
    }

    /**
     * scaleIO represents a ScaleIO persistent volume attached and mounted on Kubernetes nodes.
     */
    public function getScaleIO(): ScaleIOPersistentVolumeSource|null
    {
        return $this->scaleIO;
    }

    /**
     * scaleIO represents a ScaleIO persistent volume attached and mounted on Kubernetes nodes.
     *
     * @return static
     */
    public function setScaleIO(ScaleIOPersistentVolumeSource $scaleIO): static
    {
        $this->scaleIO = $scaleIO;

        return $this;
    }

    /**
     * storageClassName is the name of StorageClass to which this persistent volume belongs. Empty value
     * means that this volume does not belong to any StorageClass.
     */
    public function getStorageClassName(): string|null
    {
        return $this->storageClassName;
    }

    /**
     * storageClassName is the name of StorageClass to which this persistent volume belongs. Empty value
     * means that this volume does not belong to any StorageClass.
     *
     * @return static
     */
    public function setStorageClassName(string $storageClassName): static
    {
        $this->storageClassName = $storageClassName;

        return $this;
    }

    /**
     * storageOS represents a StorageOS volume that is attached to the kubelet's host machine and mounted
     * into the pod More info: https://examples.k8s.io/volumes/storageos/README.md
     */
    public function getStorageos(): StorageOSPersistentVolumeSource|null
    {
        return $this->storageos;
    }

    /**
     * storageOS represents a StorageOS volume that is attached to the kubelet's host machine and mounted
     * into the pod More info: https://examples.k8s.io/volumes/storageos/README.md
     *
     * @return static
     */
    public function setStorageos(StorageOSPersistentVolumeSource $storageos): static
    {
        $this->storageos = $storageos;

        return $this;
    }

    /**
     * Name of VolumeAttributesClass to which this persistent volume belongs. Empty value is not allowed.
     * When this field is not set, it indicates that this volume does not belong to any
     * VolumeAttributesClass. This field is mutable and can be changed by the CSI driver after a volume has
     * been updated successfully to a new class. For an unbound PersistentVolume, the
     * volumeAttributesClassName will be matched with unbound PersistentVolumeClaims during the binding
     * process. This is a beta field and requires enabling VolumeAttributesClass feature (off by default).
     */
    public function getVolumeAttributesClassName(): string|null
    {
        return $this->volumeAttributesClassName;
    }

    /**
     * Name of VolumeAttributesClass to which this persistent volume belongs. Empty value is not allowed.
     * When this field is not set, it indicates that this volume does not belong to any
     * VolumeAttributesClass. This field is mutable and can be changed by the CSI driver after a volume has
     * been updated successfully to a new class. For an unbound PersistentVolume, the
     * volumeAttributesClassName will be matched with unbound PersistentVolumeClaims during the binding
     * process. This is a beta field and requires enabling VolumeAttributesClass feature (off by default).
     *
     * @return static
     */
    public function setVolumeAttributesClassName(string $volumeAttributesClassName): static
    {
        $this->volumeAttributesClassName = $volumeAttributesClassName;

        return $this;
    }

    /**
     * volumeMode defines if a volume is intended to be used with a formatted filesystem or to remain in
     * raw block state. Value of Filesystem is implied when not included in spec.
     */
    public function getVolumeMode(): string|null
    {
        return $this->volumeMode;
    }

    /**
     * volumeMode defines if a volume is intended to be used with a formatted filesystem or to remain in
     * raw block state. Value of Filesystem is implied when not included in spec.
     *
     * @return static
     */
    public function setVolumeMode(string $volumeMode): static
    {
        $this->volumeMode = $volumeMode;

        return $this;
    }

    /**
     * vsphereVolume represents a vSphere volume attached and mounted on kubelets host machine
     */
    public function getVsphereVolume(): VsphereVirtualDiskVolumeSource|null
    {
        return $this->vsphereVolume;
    }

    /**
     * vsphereVolume represents a vSphere volume attached and mounted on kubelets host machine
     *
     * @return static
     */
    public function setVsphereVolume(VsphereVirtualDiskVolumeSource $vsphereVolume): static
    {
        $this->vsphereVolume = $vsphereVolume;

        return $this;
    }
}
