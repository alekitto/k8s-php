<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Core\v1;

use DateTimeInterface;
use Kcs\K8s\Api\Model\ApiMachinery\Apis\Meta\v1\LabelSelector;
use Kcs\K8s\Api\Model\ApiMachinery\Apis\Meta\v1\ManagedFieldsEntry;
use Kcs\K8s\Api\Model\ApiMachinery\Apis\Meta\v1\ObjectMeta;
use Kcs\K8s\Api\Model\ApiMachinery\Apis\Meta\v1\OwnerReference;
use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;

/**
 * PersistentVolumeClaim is a user's request for and claim to a persistent volume
 */
#[Kubernetes\Kind('PersistentVolumeClaim', version: 'v1')]
#[Kubernetes\Operation('get', path: '/api/v1/namespaces/{namespace}/persistentvolumeclaims/{name}', response: 'self')]
#[Kubernetes\Operation('get-status', path: '/api/v1/namespaces/{namespace}/persistentvolumeclaims/{name}/status', response: 'self')]
#[Kubernetes\Operation('post', path: '/api/v1/namespaces/{namespace}/persistentvolumeclaims', body: 'model', response: 'self')]
#[Kubernetes\Operation('delete', path: '/api/v1/namespaces/{namespace}/persistentvolumeclaims/{name}', response: 'self')]
#[Kubernetes\Operation(
    'watch',
    path: '/api/v1/namespaces/{namespace}/persistentvolumeclaims',
    response: 'Kcs\K8s\Api\Model\ApiMachinery\Apis\Meta\v1\WatchEvent',
)]
#[Kubernetes\Operation('put', path: '/api/v1/namespaces/{namespace}/persistentvolumeclaims/{name}', body: 'model', response: 'self')]
#[Kubernetes\Operation(
    'put-status',
    path: '/api/v1/namespaces/{namespace}/persistentvolumeclaims/{name}/status',
    body: 'model',
    response: 'self',
)]
#[Kubernetes\Operation(
    'deletecollection-all',
    path: '/api/v1/namespaces/{namespace}/persistentvolumeclaims',
    response: 'Kcs\K8s\Api\Model\ApiMachinery\Apis\Meta\v1\Status',
)]
#[Kubernetes\Operation('watch-all', path: '/api/v1/persistentvolumeclaims', response: 'Kcs\K8s\Api\Model\ApiMachinery\Apis\Meta\v1\WatchEvent')]
#[Kubernetes\Operation('patch', path: '/api/v1/namespaces/{namespace}/persistentvolumeclaims/{name}', body: 'patch', response: 'self')]
#[Kubernetes\Operation(
    'patch-status',
    path: '/api/v1/namespaces/{namespace}/persistentvolumeclaims/{name}/status',
    body: 'patch',
    response: 'self',
)]
#[Kubernetes\Operation(
    'list',
    path: '/api/v1/namespaces/{namespace}/persistentvolumeclaims',
    response: 'Kcs\K8s\Api\Model\Api\Core\v1\PersistentVolumeClaimList',
)]
#[Kubernetes\Operation('list-all', path: '/api/v1/persistentvolumeclaims', response: 'Kcs\K8s\Api\Model\Api\Core\v1\PersistentVolumeClaimList')]
class PersistentVolumeClaim
{
    #[Kubernetes\Attribute('apiVersion')]
    protected string $apiVersion = 'v1';

    #[Kubernetes\Attribute('kind')]
    protected string $kind = 'PersistentVolumeClaim';

    #[Kubernetes\Attribute('metadata', type: AttributeType::Model, model: ObjectMeta::class)]
    protected ObjectMeta $metadata;

    #[Kubernetes\Attribute('spec', type: AttributeType::Model, model: PersistentVolumeClaimSpec::class)]
    protected PersistentVolumeClaimSpec $spec;

    #[Kubernetes\Attribute('status', type: AttributeType::Model, model: PersistentVolumeClaimStatus::class)]
    protected PersistentVolumeClaimStatus|null $status = null;

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
     * accessModes contains the desired access modes the volume should have. More info:
     * https://kubernetes.io/docs/concepts/storage/persistent-volumes#access-modes-1
     */
    public function getAccessModes(): array|null
    {
        return $this->spec->getAccessModes();
    }

    /**
     * accessModes contains the desired access modes the volume should have. More info:
     * https://kubernetes.io/docs/concepts/storage/persistent-volumes#access-modes-1
     *
     * @return static
     */
    public function setAccessModes(array $accessModes): static
    {
        $this->spec->setAccessModes($accessModes);

        return $this;
    }

    /**
     * dataSource field can be used to specify either: * An existing VolumeSnapshot object
     * (snapshot.storage.k8s.io/VolumeSnapshot) * An existing PVC (PersistentVolumeClaim) If the
     * provisioner or an external controller can support the specified data source, it will create a new
     * volume based on the contents of the specified data source. When the AnyVolumeDataSource feature gate
     * is enabled, dataSource contents will be copied to dataSourceRef, and dataSourceRef contents will be
     * copied to dataSource when dataSourceRef.namespace is not specified. If the namespace is specified,
     * then dataSourceRef will not be copied to dataSource.
     */
    public function getDataSource(): TypedLocalObjectReference|null
    {
        return $this->spec->getDataSource();
    }

    /**
     * dataSource field can be used to specify either: * An existing VolumeSnapshot object
     * (snapshot.storage.k8s.io/VolumeSnapshot) * An existing PVC (PersistentVolumeClaim) If the
     * provisioner or an external controller can support the specified data source, it will create a new
     * volume based on the contents of the specified data source. When the AnyVolumeDataSource feature gate
     * is enabled, dataSource contents will be copied to dataSourceRef, and dataSourceRef contents will be
     * copied to dataSource when dataSourceRef.namespace is not specified. If the namespace is specified,
     * then dataSourceRef will not be copied to dataSource.
     *
     * @return static
     */
    public function setDataSource(TypedLocalObjectReference $dataSource): static
    {
        $this->spec->setDataSource($dataSource);

        return $this;
    }

    /**
     * dataSourceRef specifies the object from which to populate the volume with data, if a non-empty
     * volume is desired. This may be any object from a non-empty API group (non core object) or a
     * PersistentVolumeClaim object. When this field is specified, volume binding will only succeed if the
     * type of the specified object matches some installed volume populator or dynamic provisioner. This
     * field will replace the functionality of the dataSource field and as such if both fields are
     * non-empty, they must have the same value. For backwards compatibility, when namespace isn't
     * specified in dataSourceRef, both fields (dataSource and dataSourceRef) will be set to the same value
     * automatically if one of them is empty and the other is non-empty. When namespace is specified in
     * dataSourceRef, dataSource isn't set to the same value and must be empty. There are three important
     * differences between dataSource and dataSourceRef: * While dataSource only allows two specific types
     * of objects, dataSourceRef
     *   allows any non-core object, as well as PersistentVolumeClaim objects.
     * * While dataSource ignores disallowed values (dropping them), dataSourceRef
     *   preserves all values, and generates an error if a disallowed value is
     *   specified.
     * * While dataSource only allows local objects, dataSourceRef allows objects
     *   in any namespaces.
     * (Beta) Using this field requires the AnyVolumeDataSource feature gate to be enabled. (Alpha) Using
     * the namespace field of dataSourceRef requires the CrossNamespaceVolumeDataSource feature gate to be
     * enabled.
     */
    public function getDataSourceRef(): TypedObjectReference|null
    {
        return $this->spec->getDataSourceRef();
    }

    /**
     * dataSourceRef specifies the object from which to populate the volume with data, if a non-empty
     * volume is desired. This may be any object from a non-empty API group (non core object) or a
     * PersistentVolumeClaim object. When this field is specified, volume binding will only succeed if the
     * type of the specified object matches some installed volume populator or dynamic provisioner. This
     * field will replace the functionality of the dataSource field and as such if both fields are
     * non-empty, they must have the same value. For backwards compatibility, when namespace isn't
     * specified in dataSourceRef, both fields (dataSource and dataSourceRef) will be set to the same value
     * automatically if one of them is empty and the other is non-empty. When namespace is specified in
     * dataSourceRef, dataSource isn't set to the same value and must be empty. There are three important
     * differences between dataSource and dataSourceRef: * While dataSource only allows two specific types
     * of objects, dataSourceRef
     *   allows any non-core object, as well as PersistentVolumeClaim objects.
     * * While dataSource ignores disallowed values (dropping them), dataSourceRef
     *   preserves all values, and generates an error if a disallowed value is
     *   specified.
     * * While dataSource only allows local objects, dataSourceRef allows objects
     *   in any namespaces.
     * (Beta) Using this field requires the AnyVolumeDataSource feature gate to be enabled. (Alpha) Using
     * the namespace field of dataSourceRef requires the CrossNamespaceVolumeDataSource feature gate to be
     * enabled.
     *
     * @return static
     */
    public function setDataSourceRef(TypedObjectReference $dataSourceRef): static
    {
        $this->spec->setDataSourceRef($dataSourceRef);

        return $this;
    }

    /**
     * resources represents the minimum resources the volume should have. If RecoverVolumeExpansionFailure
     * feature is enabled users are allowed to specify resource requirements that are lower than previous
     * value but must still be higher than capacity recorded in the status field of the claim. More info:
     * https://kubernetes.io/docs/concepts/storage/persistent-volumes#resources
     */
    public function getResources(): VolumeResourceRequirements|null
    {
        return $this->spec->getResources();
    }

    /**
     * resources represents the minimum resources the volume should have. If RecoverVolumeExpansionFailure
     * feature is enabled users are allowed to specify resource requirements that are lower than previous
     * value but must still be higher than capacity recorded in the status field of the claim. More info:
     * https://kubernetes.io/docs/concepts/storage/persistent-volumes#resources
     *
     * @return static
     */
    public function setResources(VolumeResourceRequirements $resources): static
    {
        $this->spec->setResources($resources);

        return $this;
    }

    /**
     * selector is a label query over volumes to consider for binding.
     */
    public function getSelector(): LabelSelector|null
    {
        return $this->spec->getSelector();
    }

    /**
     * selector is a label query over volumes to consider for binding.
     *
     * @return static
     */
    public function setSelector(LabelSelector $selector): static
    {
        $this->spec->setSelector($selector);

        return $this;
    }

    /**
     * storageClassName is the name of the StorageClass required by the claim. More info:
     * https://kubernetes.io/docs/concepts/storage/persistent-volumes#class-1
     */
    public function getStorageClassName(): string|null
    {
        return $this->spec->getStorageClassName();
    }

    /**
     * storageClassName is the name of the StorageClass required by the claim. More info:
     * https://kubernetes.io/docs/concepts/storage/persistent-volumes#class-1
     *
     * @return static
     */
    public function setStorageClassName(string $storageClassName): static
    {
        $this->spec->setStorageClassName($storageClassName);

        return $this;
    }

    /**
     * volumeAttributesClassName may be used to set the VolumeAttributesClass used by this claim. If
     * specified, the CSI driver will create or update the volume with the attributes defined in the
     * corresponding VolumeAttributesClass. This has a different purpose than storageClassName, it can be
     * changed after the claim is created. An empty string value means that no VolumeAttributesClass will
     * be applied to the claim but it's not allowed to reset this field to empty string once it is set. If
     * unspecified and the PersistentVolumeClaim is unbound, the default VolumeAttributesClass will be set
     * by the persistentvolume controller if it exists. If the resource referred to by
     * volumeAttributesClass does not exist, this PersistentVolumeClaim will be set to a Pending state, as
     * reflected by the modifyVolumeStatus field, until such as a resource exists. More info:
     * https://kubernetes.io/docs/concepts/storage/volume-attributes-classes/ (Alpha) Using this field
     * requires the VolumeAttributesClass feature gate to be enabled.
     */
    public function getVolumeAttributesClassName(): string|null
    {
        return $this->spec->getVolumeAttributesClassName();
    }

    /**
     * volumeAttributesClassName may be used to set the VolumeAttributesClass used by this claim. If
     * specified, the CSI driver will create or update the volume with the attributes defined in the
     * corresponding VolumeAttributesClass. This has a different purpose than storageClassName, it can be
     * changed after the claim is created. An empty string value means that no VolumeAttributesClass will
     * be applied to the claim but it's not allowed to reset this field to empty string once it is set. If
     * unspecified and the PersistentVolumeClaim is unbound, the default VolumeAttributesClass will be set
     * by the persistentvolume controller if it exists. If the resource referred to by
     * volumeAttributesClass does not exist, this PersistentVolumeClaim will be set to a Pending state, as
     * reflected by the modifyVolumeStatus field, until such as a resource exists. More info:
     * https://kubernetes.io/docs/concepts/storage/volume-attributes-classes/ (Alpha) Using this field
     * requires the VolumeAttributesClass feature gate to be enabled.
     *
     * @return static
     */
    public function setVolumeAttributesClassName(string $volumeAttributesClassName): static
    {
        $this->spec->setVolumeAttributesClassName($volumeAttributesClassName);

        return $this;
    }

    /**
     * volumeMode defines what type of volume is required by the claim. Value of Filesystem is implied when
     * not included in claim spec.
     */
    public function getVolumeMode(): string|null
    {
        return $this->spec->getVolumeMode();
    }

    /**
     * volumeMode defines what type of volume is required by the claim. Value of Filesystem is implied when
     * not included in claim spec.
     *
     * @return static
     */
    public function setVolumeMode(string $volumeMode): static
    {
        $this->spec->setVolumeMode($volumeMode);

        return $this;
    }

    /**
     * volumeName is the binding reference to the PersistentVolume backing this claim.
     */
    public function getVolumeName(): string|null
    {
        return $this->spec->getVolumeName();
    }

    /**
     * volumeName is the binding reference to the PersistentVolume backing this claim.
     *
     * @return static
     */
    public function setVolumeName(string $volumeName): static
    {
        $this->spec->setVolumeName($volumeName);

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
     * spec defines the desired characteristics of a volume requested by a pod author. More info:
     * https://kubernetes.io/docs/concepts/storage/persistent-volumes#persistentvolumeclaims
     */
    public function getSpec(): PersistentVolumeClaimSpec
    {
        return $this->spec;
    }

    /**
     * spec defines the desired characteristics of a volume requested by a pod author. More info:
     * https://kubernetes.io/docs/concepts/storage/persistent-volumes#persistentvolumeclaims
     *
     * @return static
     */
    public function setSpec(PersistentVolumeClaimSpec $spec): static
    {
        $this->spec = $spec;

        return $this;
    }

    /**
     * status represents the current information/status of a persistent volume claim. Read-only. More info:
     * https://kubernetes.io/docs/concepts/storage/persistent-volumes#persistentvolumeclaims
     */
    public function getStatus(): PersistentVolumeClaimStatus|null
    {
        return $this->status;
    }
}
