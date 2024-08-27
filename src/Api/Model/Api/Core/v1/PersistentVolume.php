<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Core\v1;

use DateTimeInterface;
use Kcs\K8s\Api\Model\ApiMachinery\Apis\Meta\v1\ManagedFieldsEntry;
use Kcs\K8s\Api\Model\ApiMachinery\Apis\Meta\v1\ObjectMeta;
use Kcs\K8s\Api\Model\ApiMachinery\Apis\Meta\v1\OwnerReference;
use Kcs\K8s\Api\Model\ApiMachinery\Apis\Meta\v1\Status;
use Kcs\K8s\Api\Model\ApiMachinery\Apis\Meta\v1\WatchEvent;
use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;

/**
 * PersistentVolume (PV) is a storage resource provisioned by an administrator. It is analogous to a
 * node. More info: https://kubernetes.io/docs/concepts/storage/persistent-volumes
 */
#[Kubernetes\Kind('PersistentVolume', version: 'v1')]
#[Kubernetes\Operation('get', path: '/api/v1/persistentvolumes/{name}', response: 'self')]
#[Kubernetes\Operation('get-status', path: '/api/v1/persistentvolumes/{name}/status', response: 'self')]
#[Kubernetes\Operation('post', path: '/api/v1/persistentvolumes', body: 'model', response: 'self')]
#[Kubernetes\Operation('delete', path: '/api/v1/persistentvolumes/{name}')]
#[Kubernetes\Operation('put', path: '/api/v1/persistentvolumes/{name}', body: 'model', response: 'self')]
#[Kubernetes\Operation('put-status', path: '/api/v1/persistentvolumes/{name}/status', body: 'model', response: 'self')]
#[Kubernetes\Operation(
    'deletecollection-all',
    path: '/api/v1/persistentvolumes',
    response: Status::class,
)]
#[Kubernetes\Operation('watch-all', path: '/api/v1/persistentvolumes', response: WatchEvent::class)]
#[Kubernetes\Operation('patch', path: '/api/v1/persistentvolumes/{name}', body: 'patch', response: 'self')]
#[Kubernetes\Operation('patch-status', path: '/api/v1/persistentvolumes/{name}/status', body: 'patch', response: 'self')]
#[Kubernetes\Operation('list-all', path: '/api/v1/persistentvolumes', response: PersistentVolumeList::class)]
class PersistentVolume
{
    #[Kubernetes\Attribute('apiVersion')]
    protected string $apiVersion = 'v1';

    #[Kubernetes\Attribute('kind')]
    protected string $kind = 'PersistentVolume';

    #[Kubernetes\Attribute('metadata', type: AttributeType::Model, model: ObjectMeta::class)]
    protected ObjectMeta $metadata;

    #[Kubernetes\Attribute('spec', type: AttributeType::Model, model: PersistentVolumeSpec::class)]
    protected PersistentVolumeSpec $spec;

    #[Kubernetes\Attribute('status', type: AttributeType::Model, model: PersistentVolumeStatus::class)]
    protected PersistentVolumeStatus|null $status = null;

    public function __construct(string|null $name)
    {
        $this->metadata = new ObjectMeta($name);
    }

    /**
     * Annotations is an unstructured key value map stored with a resource that may be set by external
     * tools to store and retrieve arbitrary metadata. They are not queryable and should be preserved when
     * modifying objects. More info:
     * https://kubernetes.io/docs/concepts/overview/working-with-objects/annotations
     */
    public function getAnnotations(): array|null
    {
        return $this->metadata->getAnnotations();
    }

    /**
     * Annotations is an unstructured key value map stored with a resource that may be set by external
     * tools to store and retrieve arbitrary metadata. They are not queryable and should be preserved when
     * modifying objects. More info:
     * https://kubernetes.io/docs/concepts/overview/working-with-objects/annotations
     *
     * @return static
     */
    public function setAnnotations(array $annotations): static
    {
        $this->metadata->setAnnotations($annotations);

        return $this;
    }

    /**
     * CreationTimestamp is a timestamp representing the server time when this object was created. It is
     * not guaranteed to be set in happens-before order across separate operations. Clients may not set
     * this value. It is represented in RFC3339 form and is in UTC.
     *
     * Populated by the system. Read-only. Null for lists. More info:
     * https://git.k8s.io/community/contributors/devel/sig-architecture/api-conventions.md#metadata
     */
    public function getCreationTimestamp(): DateTimeInterface|null
    {
        return $this->metadata->getCreationTimestamp();
    }

    /**
     * Number of seconds allowed for this object to gracefully terminate before it will be removed from the
     * system. Only set when deletionTimestamp is also set. May only be shortened. Read-only.
     */
    public function getDeletionGracePeriodSeconds(): int|null
    {
        return $this->metadata->getDeletionGracePeriodSeconds();
    }

    /**
     * DeletionTimestamp is RFC 3339 date and time at which this resource will be deleted. This field is
     * set by the server when a graceful deletion is requested by the user, and is not directly settable by
     * a client. The resource is expected to be deleted (no longer visible from resource lists, and not
     * reachable by name) after the time in this field, once the finalizers list is empty. As long as the
     * finalizers list contains items, deletion is blocked. Once the deletionTimestamp is set, this value
     * may not be unset or be set further into the future, although it may be shortened or the resource may
     * be deleted prior to this time. For example, a user may request that a pod is deleted in 30 seconds.
     * The Kubelet will react by sending a graceful termination signal to the containers in the pod. After
     * that 30 seconds, the Kubelet will send a hard termination signal (SIGKILL) to the container and
     * after cleanup, remove the pod from the API. In the presence of network partitions, this object may
     * still exist after this timestamp, until an administrator or automated process can determine the
     * resource is fully terminated. If not set, graceful deletion of the object has not been requested.
     *
     * Populated by the system when a graceful deletion is requested. Read-only. More info:
     * https://git.k8s.io/community/contributors/devel/sig-architecture/api-conventions.md#metadata
     */
    public function getDeletionTimestamp(): DateTimeInterface|null
    {
        return $this->metadata->getDeletionTimestamp();
    }

    /**
     * Must be empty before the object is deleted from the registry. Each entry is an identifier for the
     * responsible component that will remove the entry from the list. If the deletionTimestamp of the
     * object is non-nil, entries in this list can only be removed. Finalizers may be processed and removed
     * in any order.  Order is NOT enforced because it introduces significant risk of stuck finalizers.
     * finalizers is a shared field, any actor with permission can reorder it. If the finalizer list is
     * processed in order, then this can lead to a situation in which the component responsible for the
     * first finalizer in the list is waiting for a signal (field value, external system, or other)
     * produced by a component responsible for a finalizer later in the list, resulting in a deadlock.
     * Without enforced ordering finalizers are free to order amongst themselves and are not vulnerable to
     * ordering changes in the list.
     */
    public function getFinalizers(): array|null
    {
        return $this->metadata->getFinalizers();
    }

    /**
     * Must be empty before the object is deleted from the registry. Each entry is an identifier for the
     * responsible component that will remove the entry from the list. If the deletionTimestamp of the
     * object is non-nil, entries in this list can only be removed. Finalizers may be processed and removed
     * in any order.  Order is NOT enforced because it introduces significant risk of stuck finalizers.
     * finalizers is a shared field, any actor with permission can reorder it. If the finalizer list is
     * processed in order, then this can lead to a situation in which the component responsible for the
     * first finalizer in the list is waiting for a signal (field value, external system, or other)
     * produced by a component responsible for a finalizer later in the list, resulting in a deadlock.
     * Without enforced ordering finalizers are free to order amongst themselves and are not vulnerable to
     * ordering changes in the list.
     *
     * @return static
     */
    public function setFinalizers(array $finalizers): static
    {
        $this->metadata->setFinalizers($finalizers);

        return $this;
    }

    /**
     * GenerateName is an optional prefix, used by the server, to generate a unique name ONLY IF the Name
     * field has not been provided. If this field is used, the name returned to the client will be
     * different than the name passed. This value will also be combined with a unique suffix. The provided
     * value has the same validation rules as the Name field, and may be truncated by the length of the
     * suffix required to make the value unique on the server.
     *
     * If this field is specified and the generated name exists, the server will return a 409.
     *
     * Applied only if Name is not specified. More info:
     * https://git.k8s.io/community/contributors/devel/sig-architecture/api-conventions.md#idempotency
     */
    public function getGenerateName(): string|null
    {
        return $this->metadata->getGenerateName();
    }

    /**
     * GenerateName is an optional prefix, used by the server, to generate a unique name ONLY IF the Name
     * field has not been provided. If this field is used, the name returned to the client will be
     * different than the name passed. This value will also be combined with a unique suffix. The provided
     * value has the same validation rules as the Name field, and may be truncated by the length of the
     * suffix required to make the value unique on the server.
     *
     * If this field is specified and the generated name exists, the server will return a 409.
     *
     * Applied only if Name is not specified. More info:
     * https://git.k8s.io/community/contributors/devel/sig-architecture/api-conventions.md#idempotency
     *
     * @return static
     */
    public function setGenerateName(string $generateName): static
    {
        $this->metadata->setGenerateName($generateName);

        return $this;
    }

    /**
     * A sequence number representing a specific generation of the desired state. Populated by the system.
     * Read-only.
     */
    public function getGeneration(): int|null
    {
        return $this->metadata->getGeneration();
    }

    /**
     * Map of string keys and values that can be used to organize and categorize (scope and select)
     * objects. May match selectors of replication controllers and services. More info:
     * https://kubernetes.io/docs/concepts/overview/working-with-objects/labels
     */
    public function getLabels(): array|null
    {
        return $this->metadata->getLabels();
    }

    /**
     * Map of string keys and values that can be used to organize and categorize (scope and select)
     * objects. May match selectors of replication controllers and services. More info:
     * https://kubernetes.io/docs/concepts/overview/working-with-objects/labels
     *
     * @return static
     */
    public function setLabels(array $labels): static
    {
        $this->metadata->setLabels($labels);

        return $this;
    }

    /**
     * ManagedFields maps workflow-id and version to the set of fields that are managed by that workflow.
     * This is mostly for internal housekeeping, and users typically shouldn't need to set or understand
     * this field. A workflow can be the user's name, a controller's name, or the name of a specific apply
     * path like "ci-cd". The set of fields is always in the version that the workflow used when modifying
     * the object.
     *
     * @return iterable|ManagedFieldsEntry[]
     */
    public function getManagedFields(): iterable|null
    {
        return $this->metadata->getManagedFields();
    }

    /**
     * ManagedFields maps workflow-id and version to the set of fields that are managed by that workflow.
     * This is mostly for internal housekeeping, and users typically shouldn't need to set or understand
     * this field. A workflow can be the user's name, a controller's name, or the name of a specific apply
     * path like "ci-cd". The set of fields is always in the version that the workflow used when modifying
     * the object.
     *
     * @return static
     */
    public function setManagedFields(iterable $managedFields): static
    {
        $this->metadata->setManagedFields($managedFields);

        return $this;
    }

    /** @return static */
    public function addManagedFields(ManagedFieldsEntry $managedField): static
    {
        $this->metadata->addManagedFields($managedField);

        return $this;
    }

    /**
     * Name must be unique within a namespace. Is required when creating resources, although some resources
     * may allow a client to request the generation of an appropriate name automatically. Name is primarily
     * intended for creation idempotence and configuration definition. Cannot be updated. More info:
     * https://kubernetes.io/docs/concepts/overview/working-with-objects/names#names
     */
    public function getName(): string|null
    {
        return $this->metadata->getName();
    }

    /**
     * Name must be unique within a namespace. Is required when creating resources, although some resources
     * may allow a client to request the generation of an appropriate name automatically. Name is primarily
     * intended for creation idempotence and configuration definition. Cannot be updated. More info:
     * https://kubernetes.io/docs/concepts/overview/working-with-objects/names#names
     *
     * @return static
     */
    public function setName(string $name): static
    {
        $this->metadata->setName($name);

        return $this;
    }

    /**
     * Namespace defines the space within which each name must be unique. An empty namespace is equivalent
     * to the "default" namespace, but "default" is the canonical representation. Not all objects are
     * required to be scoped to a namespace - the value of this field for those objects will be empty.
     *
     * Must be a DNS_LABEL. Cannot be updated. More info:
     * https://kubernetes.io/docs/concepts/overview/working-with-objects/namespaces
     */
    public function getNamespace(): string|null
    {
        return $this->metadata->getNamespace();
    }

    /**
     * Namespace defines the space within which each name must be unique. An empty namespace is equivalent
     * to the "default" namespace, but "default" is the canonical representation. Not all objects are
     * required to be scoped to a namespace - the value of this field for those objects will be empty.
     *
     * Must be a DNS_LABEL. Cannot be updated. More info:
     * https://kubernetes.io/docs/concepts/overview/working-with-objects/namespaces
     *
     * @return static
     */
    public function setNamespace(string $namespace): static
    {
        $this->metadata->setNamespace($namespace);

        return $this;
    }

    /**
     * List of objects depended by this object. If ALL objects in the list have been deleted, this object
     * will be garbage collected. If this object is managed by a controller, then an entry in this list
     * will point to this controller, with the controller field set to true. There cannot be more than one
     * managing controller.
     *
     * @return iterable|OwnerReference[]
     */
    public function getOwnerReferences(): iterable|null
    {
        return $this->metadata->getOwnerReferences();
    }

    /**
     * List of objects depended by this object. If ALL objects in the list have been deleted, this object
     * will be garbage collected. If this object is managed by a controller, then an entry in this list
     * will point to this controller, with the controller field set to true. There cannot be more than one
     * managing controller.
     *
     * @return static
     */
    public function setOwnerReferences(iterable $ownerReferences): static
    {
        $this->metadata->setOwnerReferences($ownerReferences);

        return $this;
    }

    /** @return static */
    public function addOwnerReferences(OwnerReference $ownerReference): static
    {
        $this->metadata->addOwnerReferences($ownerReference);

        return $this;
    }

    /**
     * An opaque value that represents the internal version of this object that can be used by clients to
     * determine when objects have changed. May be used for optimistic concurrency, change detection, and
     * the watch operation on a resource or set of resources. Clients must treat these values as opaque and
     * passed unmodified back to the server. They may only be valid for a particular resource or set of
     * resources.
     *
     * Populated by the system. Read-only. Value must be treated as opaque by clients and . More info:
     * https://git.k8s.io/community/contributors/devel/sig-architecture/api-conventions.md#concurrency-control-and-consistency
     */
    public function getResourceVersion(): string|null
    {
        return $this->metadata->getResourceVersion();
    }

    /**
     * Deprecated: selfLink is a legacy read-only field that is no longer populated by the system.
     */
    public function getSelfLink(): string|null
    {
        return $this->metadata->getSelfLink();
    }

    /**
     * Deprecated: selfLink is a legacy read-only field that is no longer populated by the system.
     *
     * @return static
     */
    public function setSelfLink(string $selfLink): static
    {
        $this->metadata->setSelfLink($selfLink);

        return $this;
    }

    /**
     * UID is the unique in time and space value for this object. It is typically generated by the server
     * on successful creation of a resource and is not allowed to change on PUT operations.
     *
     * Populated by the system. Read-only. More info:
     * https://kubernetes.io/docs/concepts/overview/working-with-objects/names#uids
     */
    public function getUid(): string|null
    {
        return $this->metadata->getUid();
    }

    /**
     * accessModes contains all ways the volume can be mounted. More info:
     * https://kubernetes.io/docs/concepts/storage/persistent-volumes#access-modes
     */
    public function getAccessModes(): array|null
    {
        return $this->spec->getAccessModes();
    }

    /**
     * accessModes contains all ways the volume can be mounted. More info:
     * https://kubernetes.io/docs/concepts/storage/persistent-volumes#access-modes
     *
     * @return static
     */
    public function setAccessModes(array $accessModes): static
    {
        $this->spec->setAccessModes($accessModes);

        return $this;
    }

    /**
     * awsElasticBlockStore represents an AWS Disk resource that is attached to a kubelet's host machine
     * and then exposed to the pod. More info:
     * https://kubernetes.io/docs/concepts/storage/volumes#awselasticblockstore
     */
    public function getAwsElasticBlockStore(): AWSElasticBlockStoreVolumeSource|null
    {
        return $this->spec->getAwsElasticBlockStore();
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
        $this->spec->setAwsElasticBlockStore($awsElasticBlockStore);

        return $this;
    }

    /**
     * azureDisk represents an Azure Data Disk mount on the host and bind mount to the pod.
     */
    public function getAzureDisk(): AzureDiskVolumeSource|null
    {
        return $this->spec->getAzureDisk();
    }

    /**
     * azureDisk represents an Azure Data Disk mount on the host and bind mount to the pod.
     *
     * @return static
     */
    public function setAzureDisk(AzureDiskVolumeSource $azureDisk): static
    {
        $this->spec->setAzureDisk($azureDisk);

        return $this;
    }

    /**
     * azureFile represents an Azure File Service mount on the host and bind mount to the pod.
     */
    public function getAzureFile(): AzureFilePersistentVolumeSource|null
    {
        return $this->spec->getAzureFile();
    }

    /**
     * azureFile represents an Azure File Service mount on the host and bind mount to the pod.
     *
     * @return static
     */
    public function setAzureFile(AzureFilePersistentVolumeSource $azureFile): static
    {
        $this->spec->setAzureFile($azureFile);

        return $this;
    }

    /**
     * capacity is the description of the persistent volume's resources and capacity. More info:
     * https://kubernetes.io/docs/concepts/storage/persistent-volumes#capacity
     */
    public function getCapacity(): array|null
    {
        return $this->spec->getCapacity();
    }

    /**
     * capacity is the description of the persistent volume's resources and capacity. More info:
     * https://kubernetes.io/docs/concepts/storage/persistent-volumes#capacity
     *
     * @return static
     */
    public function setCapacity(array $capacity): static
    {
        $this->spec->setCapacity($capacity);

        return $this;
    }

    /**
     * cephFS represents a Ceph FS mount on the host that shares a pod's lifetime
     */
    public function getCephfs(): CephFSPersistentVolumeSource|null
    {
        return $this->spec->getCephfs();
    }

    /**
     * cephFS represents a Ceph FS mount on the host that shares a pod's lifetime
     *
     * @return static
     */
    public function setCephfs(CephFSPersistentVolumeSource $cephfs): static
    {
        $this->spec->setCephfs($cephfs);

        return $this;
    }

    /**
     * cinder represents a cinder volume attached and mounted on kubelets host machine. More info:
     * https://examples.k8s.io/mysql-cinder-pd/README.md
     */
    public function getCinder(): CinderPersistentVolumeSource|null
    {
        return $this->spec->getCinder();
    }

    /**
     * cinder represents a cinder volume attached and mounted on kubelets host machine. More info:
     * https://examples.k8s.io/mysql-cinder-pd/README.md
     *
     * @return static
     */
    public function setCinder(CinderPersistentVolumeSource $cinder): static
    {
        $this->spec->setCinder($cinder);

        return $this;
    }

    /**
     * claimRef is part of a bi-directional binding between PersistentVolume and PersistentVolumeClaim.
     * Expected to be non-nil when bound. claim.VolumeName is the authoritative bind between PV and PVC.
     * More info: https://kubernetes.io/docs/concepts/storage/persistent-volumes#binding
     */
    public function getClaimRef(): ObjectReference|null
    {
        return $this->spec->getClaimRef();
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
        $this->spec->setClaimRef($claimRef);

        return $this;
    }

    /**
     * csi represents storage that is handled by an external CSI driver (Beta feature).
     */
    public function getCsi(): CSIPersistentVolumeSource|null
    {
        return $this->spec->getCsi();
    }

    /**
     * csi represents storage that is handled by an external CSI driver (Beta feature).
     *
     * @return static
     */
    public function setCsi(CSIPersistentVolumeSource $csi): static
    {
        $this->spec->setCsi($csi);

        return $this;
    }

    /**
     * fc represents a Fibre Channel resource that is attached to a kubelet's host machine and then exposed
     * to the pod.
     */
    public function getFc(): FCVolumeSource|null
    {
        return $this->spec->getFc();
    }

    /**
     * fc represents a Fibre Channel resource that is attached to a kubelet's host machine and then exposed
     * to the pod.
     *
     * @return static
     */
    public function setFc(FCVolumeSource $fc): static
    {
        $this->spec->setFc($fc);

        return $this;
    }

    /**
     * flexVolume represents a generic volume resource that is provisioned/attached using an exec based
     * plugin.
     */
    public function getFlexVolume(): FlexPersistentVolumeSource|null
    {
        return $this->spec->getFlexVolume();
    }

    /**
     * flexVolume represents a generic volume resource that is provisioned/attached using an exec based
     * plugin.
     *
     * @return static
     */
    public function setFlexVolume(FlexPersistentVolumeSource $flexVolume): static
    {
        $this->spec->setFlexVolume($flexVolume);

        return $this;
    }

    /**
     * flocker represents a Flocker volume attached to a kubelet's host machine and exposed to the pod for
     * its usage. This depends on the Flocker control service being running
     */
    public function getFlocker(): FlockerVolumeSource|null
    {
        return $this->spec->getFlocker();
    }

    /**
     * flocker represents a Flocker volume attached to a kubelet's host machine and exposed to the pod for
     * its usage. This depends on the Flocker control service being running
     *
     * @return static
     */
    public function setFlocker(FlockerVolumeSource $flocker): static
    {
        $this->spec->setFlocker($flocker);

        return $this;
    }

    /**
     * gcePersistentDisk represents a GCE Disk resource that is attached to a kubelet's host machine and
     * then exposed to the pod. Provisioned by an admin. More info:
     * https://kubernetes.io/docs/concepts/storage/volumes#gcepersistentdisk
     */
    public function getGcePersistentDisk(): GCEPersistentDiskVolumeSource|null
    {
        return $this->spec->getGcePersistentDisk();
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
        $this->spec->setGcePersistentDisk($gcePersistentDisk);

        return $this;
    }

    /**
     * glusterfs represents a Glusterfs volume that is attached to a host and exposed to the pod.
     * Provisioned by an admin. More info: https://examples.k8s.io/volumes/glusterfs/README.md
     */
    public function getGlusterfs(): GlusterfsPersistentVolumeSource|null
    {
        return $this->spec->getGlusterfs();
    }

    /**
     * glusterfs represents a Glusterfs volume that is attached to a host and exposed to the pod.
     * Provisioned by an admin. More info: https://examples.k8s.io/volumes/glusterfs/README.md
     *
     * @return static
     */
    public function setGlusterfs(GlusterfsPersistentVolumeSource $glusterfs): static
    {
        $this->spec->setGlusterfs($glusterfs);

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
        return $this->spec->getHostPath();
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
        $this->spec->setHostPath($hostPath);

        return $this;
    }

    /**
     * iscsi represents an ISCSI Disk resource that is attached to a kubelet's host machine and then
     * exposed to the pod. Provisioned by an admin.
     */
    public function getIscsi(): ISCSIPersistentVolumeSource|null
    {
        return $this->spec->getIscsi();
    }

    /**
     * iscsi represents an ISCSI Disk resource that is attached to a kubelet's host machine and then
     * exposed to the pod. Provisioned by an admin.
     *
     * @return static
     */
    public function setIscsi(ISCSIPersistentVolumeSource $iscsi): static
    {
        $this->spec->setIscsi($iscsi);

        return $this;
    }

    /**
     * local represents directly-attached storage with node affinity
     */
    public function getLocal(): LocalVolumeSource|null
    {
        return $this->spec->getLocal();
    }

    /**
     * local represents directly-attached storage with node affinity
     *
     * @return static
     */
    public function setLocal(LocalVolumeSource $local): static
    {
        $this->spec->setLocal($local);

        return $this;
    }

    /**
     * mountOptions is the list of mount options, e.g. ["ro", "soft"]. Not validated - mount will simply
     * fail if one is invalid. More info:
     * https://kubernetes.io/docs/concepts/storage/persistent-volumes/#mount-options
     */
    public function getMountOptions(): array|null
    {
        return $this->spec->getMountOptions();
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
        $this->spec->setMountOptions($mountOptions);

        return $this;
    }

    /**
     * nfs represents an NFS mount on the host. Provisioned by an admin. More info:
     * https://kubernetes.io/docs/concepts/storage/volumes#nfs
     */
    public function getNfs(): NFSVolumeSource|null
    {
        return $this->spec->getNfs();
    }

    /**
     * nfs represents an NFS mount on the host. Provisioned by an admin. More info:
     * https://kubernetes.io/docs/concepts/storage/volumes#nfs
     *
     * @return static
     */
    public function setNfs(NFSVolumeSource $nfs): static
    {
        $this->spec->setNfs($nfs);

        return $this;
    }

    /**
     * nodeAffinity defines constraints that limit what nodes this volume can be accessed from. This field
     * influences the scheduling of pods that use this volume.
     */
    public function getNodeAffinity(): VolumeNodeAffinity|null
    {
        return $this->spec->getNodeAffinity();
    }

    /**
     * nodeAffinity defines constraints that limit what nodes this volume can be accessed from. This field
     * influences the scheduling of pods that use this volume.
     *
     * @return static
     */
    public function setNodeAffinity(VolumeNodeAffinity $nodeAffinity): static
    {
        $this->spec->setNodeAffinity($nodeAffinity);

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
        return $this->spec->getPersistentVolumeReclaimPolicy();
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
        $this->spec->setPersistentVolumeReclaimPolicy($persistentVolumeReclaimPolicy);

        return $this;
    }

    /**
     * photonPersistentDisk represents a PhotonController persistent disk attached and mounted on kubelets
     * host machine
     */
    public function getPhotonPersistentDisk(): PhotonPersistentDiskVolumeSource|null
    {
        return $this->spec->getPhotonPersistentDisk();
    }

    /**
     * photonPersistentDisk represents a PhotonController persistent disk attached and mounted on kubelets
     * host machine
     *
     * @return static
     */
    public function setPhotonPersistentDisk(PhotonPersistentDiskVolumeSource $photonPersistentDisk): static
    {
        $this->spec->setPhotonPersistentDisk($photonPersistentDisk);

        return $this;
    }

    /**
     * portworxVolume represents a portworx volume attached and mounted on kubelets host machine
     */
    public function getPortworxVolume(): PortworxVolumeSource|null
    {
        return $this->spec->getPortworxVolume();
    }

    /**
     * portworxVolume represents a portworx volume attached and mounted on kubelets host machine
     *
     * @return static
     */
    public function setPortworxVolume(PortworxVolumeSource $portworxVolume): static
    {
        $this->spec->setPortworxVolume($portworxVolume);

        return $this;
    }

    /**
     * quobyte represents a Quobyte mount on the host that shares a pod's lifetime
     */
    public function getQuobyte(): QuobyteVolumeSource|null
    {
        return $this->spec->getQuobyte();
    }

    /**
     * quobyte represents a Quobyte mount on the host that shares a pod's lifetime
     *
     * @return static
     */
    public function setQuobyte(QuobyteVolumeSource $quobyte): static
    {
        $this->spec->setQuobyte($quobyte);

        return $this;
    }

    /**
     * rbd represents a Rados Block Device mount on the host that shares a pod's lifetime. More info:
     * https://examples.k8s.io/volumes/rbd/README.md
     */
    public function getRbd(): RBDPersistentVolumeSource|null
    {
        return $this->spec->getRbd();
    }

    /**
     * rbd represents a Rados Block Device mount on the host that shares a pod's lifetime. More info:
     * https://examples.k8s.io/volumes/rbd/README.md
     *
     * @return static
     */
    public function setRbd(RBDPersistentVolumeSource $rbd): static
    {
        $this->spec->setRbd($rbd);

        return $this;
    }

    /**
     * scaleIO represents a ScaleIO persistent volume attached and mounted on Kubernetes nodes.
     */
    public function getScaleIO(): ScaleIOPersistentVolumeSource|null
    {
        return $this->spec->getScaleIO();
    }

    /**
     * scaleIO represents a ScaleIO persistent volume attached and mounted on Kubernetes nodes.
     *
     * @return static
     */
    public function setScaleIO(ScaleIOPersistentVolumeSource $scaleIO): static
    {
        $this->spec->setScaleIO($scaleIO);

        return $this;
    }

    /**
     * storageClassName is the name of StorageClass to which this persistent volume belongs. Empty value
     * means that this volume does not belong to any StorageClass.
     */
    public function getStorageClassName(): string|null
    {
        return $this->spec->getStorageClassName();
    }

    /**
     * storageClassName is the name of StorageClass to which this persistent volume belongs. Empty value
     * means that this volume does not belong to any StorageClass.
     *
     * @return static
     */
    public function setStorageClassName(string $storageClassName): static
    {
        $this->spec->setStorageClassName($storageClassName);

        return $this;
    }

    /**
     * storageOS represents a StorageOS volume that is attached to the kubelet's host machine and mounted
     * into the pod More info: https://examples.k8s.io/volumes/storageos/README.md
     */
    public function getStorageos(): StorageOSPersistentVolumeSource|null
    {
        return $this->spec->getStorageos();
    }

    /**
     * storageOS represents a StorageOS volume that is attached to the kubelet's host machine and mounted
     * into the pod More info: https://examples.k8s.io/volumes/storageos/README.md
     *
     * @return static
     */
    public function setStorageos(StorageOSPersistentVolumeSource $storageos): static
    {
        $this->spec->setStorageos($storageos);

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
        return $this->spec->getVolumeAttributesClassName();
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
        $this->spec->setVolumeAttributesClassName($volumeAttributesClassName);

        return $this;
    }

    /**
     * volumeMode defines if a volume is intended to be used with a formatted filesystem or to remain in
     * raw block state. Value of Filesystem is implied when not included in spec.
     */
    public function getVolumeMode(): string|null
    {
        return $this->spec->getVolumeMode();
    }

    /**
     * volumeMode defines if a volume is intended to be used with a formatted filesystem or to remain in
     * raw block state. Value of Filesystem is implied when not included in spec.
     *
     * @return static
     */
    public function setVolumeMode(string $volumeMode): static
    {
        $this->spec->setVolumeMode($volumeMode);

        return $this;
    }

    /**
     * vsphereVolume represents a vSphere volume attached and mounted on kubelets host machine
     */
    public function getVsphereVolume(): VsphereVirtualDiskVolumeSource|null
    {
        return $this->spec->getVsphereVolume();
    }

    /**
     * vsphereVolume represents a vSphere volume attached and mounted on kubelets host machine
     *
     * @return static
     */
    public function setVsphereVolume(VsphereVirtualDiskVolumeSource $vsphereVolume): static
    {
        $this->spec->setVsphereVolume($vsphereVolume);

        return $this;
    }

    /**
     * APIVersion defines the versioned schema of this representation of an object. Servers should convert
     * recognized schemas to the latest internal value, and may reject unrecognized values. More info:
     * https://git.k8s.io/community/contributors/devel/sig-architecture/api-conventions.md#resources
     */
    public function getApiVersion(): string
    {
        return $this->apiVersion;
    }

    /**
     * APIVersion defines the versioned schema of this representation of an object. Servers should convert
     * recognized schemas to the latest internal value, and may reject unrecognized values. More info:
     * https://git.k8s.io/community/contributors/devel/sig-architecture/api-conventions.md#resources
     *
     * @return static
     */
    public function setApiVersion(string $apiVersion): static
    {
        $this->apiVersion = $apiVersion;

        return $this;
    }

    /**
     * Kind is a string value representing the REST resource this object represents. Servers may infer this
     * from the endpoint the client submits requests to. Cannot be updated. In CamelCase. More info:
     * https://git.k8s.io/community/contributors/devel/sig-architecture/api-conventions.md#types-kinds
     */
    public function getKind(): string
    {
        return $this->kind;
    }

    /**
     * Kind is a string value representing the REST resource this object represents. Servers may infer this
     * from the endpoint the client submits requests to. Cannot be updated. In CamelCase. More info:
     * https://git.k8s.io/community/contributors/devel/sig-architecture/api-conventions.md#types-kinds
     *
     * @return static
     */
    public function setKind(string $kind): static
    {
        $this->kind = $kind;

        return $this;
    }

    /**
     * Standard object's metadata. More info:
     * https://git.k8s.io/community/contributors/devel/sig-architecture/api-conventions.md#metadata
     */
    public function getMetadata(): ObjectMeta
    {
        return $this->metadata;
    }

    /**
     * Standard object's metadata. More info:
     * https://git.k8s.io/community/contributors/devel/sig-architecture/api-conventions.md#metadata
     *
     * @return static
     */
    public function setMetadata(ObjectMeta $metadata): static
    {
        $this->metadata = $metadata;

        return $this;
    }

    /**
     * spec defines a specification of a persistent volume owned by the cluster. Provisioned by an
     * administrator. More info:
     * https://kubernetes.io/docs/concepts/storage/persistent-volumes#persistent-volumes
     */
    public function getSpec(): PersistentVolumeSpec
    {
        return $this->spec;
    }

    /**
     * spec defines a specification of a persistent volume owned by the cluster. Provisioned by an
     * administrator. More info:
     * https://kubernetes.io/docs/concepts/storage/persistent-volumes#persistent-volumes
     *
     * @return static
     */
    public function setSpec(PersistentVolumeSpec $spec): static
    {
        $this->spec = $spec;

        return $this;
    }

    /**
     * status represents the current information/status for the persistent volume. Populated by the system.
     * Read-only. More info:
     * https://kubernetes.io/docs/concepts/storage/persistent-volumes#persistent-volumes
     */
    public function getStatus(): PersistentVolumeStatus|null
    {
        return $this->status;
    }
}
