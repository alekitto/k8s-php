<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Core\v1;

use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;

/**
 * Volume represents a named volume in a pod that may be accessed by any container in the pod.
 */
class Volume
{
    #[Kubernetes\Attribute('awsElasticBlockStore', type: AttributeType::Model, model: AWSElasticBlockStoreVolumeSource::class)]
    protected AWSElasticBlockStoreVolumeSource|null $awsElasticBlockStore = null;

    #[Kubernetes\Attribute('azureDisk', type: AttributeType::Model, model: AzureDiskVolumeSource::class)]
    protected AzureDiskVolumeSource|null $azureDisk = null;

    #[Kubernetes\Attribute('azureFile', type: AttributeType::Model, model: AzureFileVolumeSource::class)]
    protected AzureFileVolumeSource|null $azureFile = null;

    #[Kubernetes\Attribute('cephfs', type: AttributeType::Model, model: CephFSVolumeSource::class)]
    protected CephFSVolumeSource|null $cephfs = null;

    #[Kubernetes\Attribute('cinder', type: AttributeType::Model, model: CinderVolumeSource::class)]
    protected CinderVolumeSource|null $cinder = null;

    #[Kubernetes\Attribute('configMap', type: AttributeType::Model, model: ConfigMapVolumeSource::class)]
    protected ConfigMapVolumeSource|null $configMap = null;

    #[Kubernetes\Attribute('csi', type: AttributeType::Model, model: CSIVolumeSource::class)]
    protected CSIVolumeSource|null $csi = null;

    #[Kubernetes\Attribute('downwardAPI', type: AttributeType::Model, model: DownwardAPIVolumeSource::class)]
    protected DownwardAPIVolumeSource|null $downwardAPI = null;

    #[Kubernetes\Attribute('emptyDir', type: AttributeType::Model, model: EmptyDirVolumeSource::class)]
    protected EmptyDirVolumeSource|null $emptyDir = null;

    #[Kubernetes\Attribute('ephemeral', type: AttributeType::Model, model: EphemeralVolumeSource::class)]
    protected EphemeralVolumeSource|null $ephemeral = null;

    #[Kubernetes\Attribute('fc', type: AttributeType::Model, model: FCVolumeSource::class)]
    protected FCVolumeSource|null $fc = null;

    #[Kubernetes\Attribute('flexVolume', type: AttributeType::Model, model: FlexVolumeSource::class)]
    protected FlexVolumeSource|null $flexVolume = null;

    #[Kubernetes\Attribute('flocker', type: AttributeType::Model, model: FlockerVolumeSource::class)]
    protected FlockerVolumeSource|null $flocker = null;

    #[Kubernetes\Attribute('gcePersistentDisk', type: AttributeType::Model, model: GCEPersistentDiskVolumeSource::class)]
    protected GCEPersistentDiskVolumeSource|null $gcePersistentDisk = null;

    #[Kubernetes\Attribute('gitRepo', type: AttributeType::Model, model: GitRepoVolumeSource::class)]
    protected GitRepoVolumeSource|null $gitRepo = null;

    #[Kubernetes\Attribute('glusterfs', type: AttributeType::Model, model: GlusterfsVolumeSource::class)]
    protected GlusterfsVolumeSource|null $glusterfs = null;

    #[Kubernetes\Attribute('hostPath', type: AttributeType::Model, model: HostPathVolumeSource::class)]
    protected HostPathVolumeSource|null $hostPath = null;

    #[Kubernetes\Attribute('iscsi', type: AttributeType::Model, model: ISCSIVolumeSource::class)]
    protected ISCSIVolumeSource|null $iscsi = null;

    #[Kubernetes\Attribute('name', required: true)]
    protected string $name;

    #[Kubernetes\Attribute('nfs', type: AttributeType::Model, model: NFSVolumeSource::class)]
    protected NFSVolumeSource|null $nfs = null;

    #[Kubernetes\Attribute('persistentVolumeClaim', type: AttributeType::Model, model: PersistentVolumeClaimVolumeSource::class)]
    protected PersistentVolumeClaimVolumeSource|null $persistentVolumeClaim = null;

    #[Kubernetes\Attribute('photonPersistentDisk', type: AttributeType::Model, model: PhotonPersistentDiskVolumeSource::class)]
    protected PhotonPersistentDiskVolumeSource|null $photonPersistentDisk = null;

    #[Kubernetes\Attribute('portworxVolume', type: AttributeType::Model, model: PortworxVolumeSource::class)]
    protected PortworxVolumeSource|null $portworxVolume = null;

    #[Kubernetes\Attribute('projected', type: AttributeType::Model, model: ProjectedVolumeSource::class)]
    protected ProjectedVolumeSource|null $projected = null;

    #[Kubernetes\Attribute('quobyte', type: AttributeType::Model, model: QuobyteVolumeSource::class)]
    protected QuobyteVolumeSource|null $quobyte = null;

    #[Kubernetes\Attribute('rbd', type: AttributeType::Model, model: RBDVolumeSource::class)]
    protected RBDVolumeSource|null $rbd = null;

    #[Kubernetes\Attribute('scaleIO', type: AttributeType::Model, model: ScaleIOVolumeSource::class)]
    protected ScaleIOVolumeSource|null $scaleIO = null;

    #[Kubernetes\Attribute('secret', type: AttributeType::Model, model: SecretVolumeSource::class)]
    protected SecretVolumeSource|null $secret = null;

    #[Kubernetes\Attribute('storageos', type: AttributeType::Model, model: StorageOSVolumeSource::class)]
    protected StorageOSVolumeSource|null $storageos = null;

    #[Kubernetes\Attribute('vsphereVolume', type: AttributeType::Model, model: VsphereVirtualDiskVolumeSource::class)]
    protected VsphereVirtualDiskVolumeSource|null $vsphereVolume = null;

    public function __construct(string $name)
    {
        $this->name = $name;
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
    public function getAzureFile(): AzureFileVolumeSource|null
    {
        return $this->azureFile;
    }

    /**
     * azureFile represents an Azure File Service mount on the host and bind mount to the pod.
     *
     * @return static
     */
    public function setAzureFile(AzureFileVolumeSource $azureFile): static
    {
        $this->azureFile = $azureFile;

        return $this;
    }

    /**
     * cephFS represents a Ceph FS mount on the host that shares a pod's lifetime
     */
    public function getCephfs(): CephFSVolumeSource|null
    {
        return $this->cephfs;
    }

    /**
     * cephFS represents a Ceph FS mount on the host that shares a pod's lifetime
     *
     * @return static
     */
    public function setCephfs(CephFSVolumeSource $cephfs): static
    {
        $this->cephfs = $cephfs;

        return $this;
    }

    /**
     * cinder represents a cinder volume attached and mounted on kubelets host machine. More info:
     * https://examples.k8s.io/mysql-cinder-pd/README.md
     */
    public function getCinder(): CinderVolumeSource|null
    {
        return $this->cinder;
    }

    /**
     * cinder represents a cinder volume attached and mounted on kubelets host machine. More info:
     * https://examples.k8s.io/mysql-cinder-pd/README.md
     *
     * @return static
     */
    public function setCinder(CinderVolumeSource $cinder): static
    {
        $this->cinder = $cinder;

        return $this;
    }

    /**
     * configMap represents a configMap that should populate this volume
     */
    public function getConfigMap(): ConfigMapVolumeSource|null
    {
        return $this->configMap;
    }

    /**
     * configMap represents a configMap that should populate this volume
     *
     * @return static
     */
    public function setConfigMap(ConfigMapVolumeSource $configMap): static
    {
        $this->configMap = $configMap;

        return $this;
    }

    /**
     * csi (Container Storage Interface) represents ephemeral storage that is handled by certain external
     * CSI drivers (Beta feature).
     */
    public function getCsi(): CSIVolumeSource|null
    {
        return $this->csi;
    }

    /**
     * csi (Container Storage Interface) represents ephemeral storage that is handled by certain external
     * CSI drivers (Beta feature).
     *
     * @return static
     */
    public function setCsi(CSIVolumeSource $csi): static
    {
        $this->csi = $csi;

        return $this;
    }

    /**
     * downwardAPI represents downward API about the pod that should populate this volume
     */
    public function getDownwardAPI(): DownwardAPIVolumeSource|null
    {
        return $this->downwardAPI;
    }

    /**
     * downwardAPI represents downward API about the pod that should populate this volume
     *
     * @return static
     */
    public function setDownwardAPI(DownwardAPIVolumeSource $downwardAPI): static
    {
        $this->downwardAPI = $downwardAPI;

        return $this;
    }

    /**
     * emptyDir represents a temporary directory that shares a pod's lifetime. More info:
     * https://kubernetes.io/docs/concepts/storage/volumes#emptydir
     */
    public function getEmptyDir(): EmptyDirVolumeSource|null
    {
        return $this->emptyDir;
    }

    /**
     * emptyDir represents a temporary directory that shares a pod's lifetime. More info:
     * https://kubernetes.io/docs/concepts/storage/volumes#emptydir
     *
     * @return static
     */
    public function setEmptyDir(EmptyDirVolumeSource $emptyDir): static
    {
        $this->emptyDir = $emptyDir;

        return $this;
    }

    /**
     * ephemeral represents a volume that is handled by a cluster storage driver. The volume's lifecycle is
     * tied to the pod that defines it - it will be created before the pod starts, and deleted when the pod
     * is removed.
     *
     * Use this if: a) the volume is only needed while the pod runs, b) features of normal volumes like
     * restoring from snapshot or capacity
     *    tracking are needed,
     * c) the storage driver is specified through a storage class, and d) the storage driver supports
     * dynamic volume provisioning through
     *    a PersistentVolumeClaim (see EphemeralVolumeSource for more
     *    information on the connection between this volume type
     *    and PersistentVolumeClaim).
     *
     * Use PersistentVolumeClaim or one of the vendor-specific APIs for volumes that persist for longer
     * than the lifecycle of an individual pod.
     *
     * Use CSI for light-weight local ephemeral volumes if the CSI driver is meant to be used that way -
     * see the documentation of the driver for more information.
     *
     * A pod can use both types of ephemeral volumes and persistent volumes at the same time.
     */
    public function getEphemeral(): EphemeralVolumeSource|null
    {
        return $this->ephemeral;
    }

    /**
     * ephemeral represents a volume that is handled by a cluster storage driver. The volume's lifecycle is
     * tied to the pod that defines it - it will be created before the pod starts, and deleted when the pod
     * is removed.
     *
     * Use this if: a) the volume is only needed while the pod runs, b) features of normal volumes like
     * restoring from snapshot or capacity
     *    tracking are needed,
     * c) the storage driver is specified through a storage class, and d) the storage driver supports
     * dynamic volume provisioning through
     *    a PersistentVolumeClaim (see EphemeralVolumeSource for more
     *    information on the connection between this volume type
     *    and PersistentVolumeClaim).
     *
     * Use PersistentVolumeClaim or one of the vendor-specific APIs for volumes that persist for longer
     * than the lifecycle of an individual pod.
     *
     * Use CSI for light-weight local ephemeral volumes if the CSI driver is meant to be used that way -
     * see the documentation of the driver for more information.
     *
     * A pod can use both types of ephemeral volumes and persistent volumes at the same time.
     *
     * @return static
     */
    public function setEphemeral(EphemeralVolumeSource $ephemeral): static
    {
        $this->ephemeral = $ephemeral;

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
    public function getFlexVolume(): FlexVolumeSource|null
    {
        return $this->flexVolume;
    }

    /**
     * flexVolume represents a generic volume resource that is provisioned/attached using an exec based
     * plugin.
     *
     * @return static
     */
    public function setFlexVolume(FlexVolumeSource $flexVolume): static
    {
        $this->flexVolume = $flexVolume;

        return $this;
    }

    /**
     * flocker represents a Flocker volume attached to a kubelet's host machine. This depends on the
     * Flocker control service being running
     */
    public function getFlocker(): FlockerVolumeSource|null
    {
        return $this->flocker;
    }

    /**
     * flocker represents a Flocker volume attached to a kubelet's host machine. This depends on the
     * Flocker control service being running
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
     * then exposed to the pod. More info:
     * https://kubernetes.io/docs/concepts/storage/volumes#gcepersistentdisk
     */
    public function getGcePersistentDisk(): GCEPersistentDiskVolumeSource|null
    {
        return $this->gcePersistentDisk;
    }

    /**
     * gcePersistentDisk represents a GCE Disk resource that is attached to a kubelet's host machine and
     * then exposed to the pod. More info:
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
     * gitRepo represents a git repository at a particular revision. DEPRECATED: GitRepo is deprecated. To
     * provision a container with a git repo, mount an EmptyDir into an InitContainer that clones the repo
     * using git, then mount the EmptyDir into the Pod's container.
     */
    public function getGitRepo(): GitRepoVolumeSource|null
    {
        return $this->gitRepo;
    }

    /**
     * gitRepo represents a git repository at a particular revision. DEPRECATED: GitRepo is deprecated. To
     * provision a container with a git repo, mount an EmptyDir into an InitContainer that clones the repo
     * using git, then mount the EmptyDir into the Pod's container.
     *
     * @return static
     */
    public function setGitRepo(GitRepoVolumeSource $gitRepo): static
    {
        $this->gitRepo = $gitRepo;

        return $this;
    }

    /**
     * glusterfs represents a Glusterfs mount on the host that shares a pod's lifetime. More info:
     * https://examples.k8s.io/volumes/glusterfs/README.md
     */
    public function getGlusterfs(): GlusterfsVolumeSource|null
    {
        return $this->glusterfs;
    }

    /**
     * glusterfs represents a Glusterfs mount on the host that shares a pod's lifetime. More info:
     * https://examples.k8s.io/volumes/glusterfs/README.md
     *
     * @return static
     */
    public function setGlusterfs(GlusterfsVolumeSource $glusterfs): static
    {
        $this->glusterfs = $glusterfs;

        return $this;
    }

    /**
     * hostPath represents a pre-existing file or directory on the host machine that is directly exposed to
     * the container. This is generally used for system agents or other privileged things that are allowed
     * to see the host machine. Most containers will NOT need this. More info:
     * https://kubernetes.io/docs/concepts/storage/volumes#hostpath
     */
    public function getHostPath(): HostPathVolumeSource|null
    {
        return $this->hostPath;
    }

    /**
     * hostPath represents a pre-existing file or directory on the host machine that is directly exposed to
     * the container. This is generally used for system agents or other privileged things that are allowed
     * to see the host machine. Most containers will NOT need this. More info:
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
     * exposed to the pod. More info: https://examples.k8s.io/volumes/iscsi/README.md
     */
    public function getIscsi(): ISCSIVolumeSource|null
    {
        return $this->iscsi;
    }

    /**
     * iscsi represents an ISCSI Disk resource that is attached to a kubelet's host machine and then
     * exposed to the pod. More info: https://examples.k8s.io/volumes/iscsi/README.md
     *
     * @return static
     */
    public function setIscsi(ISCSIVolumeSource $iscsi): static
    {
        $this->iscsi = $iscsi;

        return $this;
    }

    /**
     * name of the volume. Must be a DNS_LABEL and unique within the pod. More info:
     * https://kubernetes.io/docs/concepts/overview/working-with-objects/names/#names
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * name of the volume. Must be a DNS_LABEL and unique within the pod. More info:
     * https://kubernetes.io/docs/concepts/overview/working-with-objects/names/#names
     *
     * @return static
     */
    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    /**
     * nfs represents an NFS mount on the host that shares a pod's lifetime More info:
     * https://kubernetes.io/docs/concepts/storage/volumes#nfs
     */
    public function getNfs(): NFSVolumeSource|null
    {
        return $this->nfs;
    }

    /**
     * nfs represents an NFS mount on the host that shares a pod's lifetime More info:
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
     * persistentVolumeClaimVolumeSource represents a reference to a PersistentVolumeClaim in the same
     * namespace. More info:
     * https://kubernetes.io/docs/concepts/storage/persistent-volumes#persistentvolumeclaims
     */
    public function getPersistentVolumeClaim(): PersistentVolumeClaimVolumeSource|null
    {
        return $this->persistentVolumeClaim;
    }

    /**
     * persistentVolumeClaimVolumeSource represents a reference to a PersistentVolumeClaim in the same
     * namespace. More info:
     * https://kubernetes.io/docs/concepts/storage/persistent-volumes#persistentvolumeclaims
     *
     * @return static
     */
    public function setPersistentVolumeClaim(PersistentVolumeClaimVolumeSource $persistentVolumeClaim): static
    {
        $this->persistentVolumeClaim = $persistentVolumeClaim;

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
     * projected items for all in one resources secrets, configmaps, and downward API
     */
    public function getProjected(): ProjectedVolumeSource|null
    {
        return $this->projected;
    }

    /**
     * projected items for all in one resources secrets, configmaps, and downward API
     *
     * @return static
     */
    public function setProjected(ProjectedVolumeSource $projected): static
    {
        $this->projected = $projected;

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
    public function getRbd(): RBDVolumeSource|null
    {
        return $this->rbd;
    }

    /**
     * rbd represents a Rados Block Device mount on the host that shares a pod's lifetime. More info:
     * https://examples.k8s.io/volumes/rbd/README.md
     *
     * @return static
     */
    public function setRbd(RBDVolumeSource $rbd): static
    {
        $this->rbd = $rbd;

        return $this;
    }

    /**
     * scaleIO represents a ScaleIO persistent volume attached and mounted on Kubernetes nodes.
     */
    public function getScaleIO(): ScaleIOVolumeSource|null
    {
        return $this->scaleIO;
    }

    /**
     * scaleIO represents a ScaleIO persistent volume attached and mounted on Kubernetes nodes.
     *
     * @return static
     */
    public function setScaleIO(ScaleIOVolumeSource $scaleIO): static
    {
        $this->scaleIO = $scaleIO;

        return $this;
    }

    /**
     * secret represents a secret that should populate this volume. More info:
     * https://kubernetes.io/docs/concepts/storage/volumes#secret
     */
    public function getSecret(): SecretVolumeSource|null
    {
        return $this->secret;
    }

    /**
     * secret represents a secret that should populate this volume. More info:
     * https://kubernetes.io/docs/concepts/storage/volumes#secret
     *
     * @return static
     */
    public function setSecret(SecretVolumeSource $secret): static
    {
        $this->secret = $secret;

        return $this;
    }

    /**
     * storageOS represents a StorageOS volume attached and mounted on Kubernetes nodes.
     */
    public function getStorageos(): StorageOSVolumeSource|null
    {
        return $this->storageos;
    }

    /**
     * storageOS represents a StorageOS volume attached and mounted on Kubernetes nodes.
     *
     * @return static
     */
    public function setStorageos(StorageOSVolumeSource $storageos): static
    {
        $this->storageos = $storageos;

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
