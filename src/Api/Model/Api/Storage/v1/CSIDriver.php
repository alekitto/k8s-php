<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Storage\v1;

use DateTimeInterface;
use Kcs\K8s\Api\Model\ApiMachinery\Apis\Meta\v1\ManagedFieldsEntry;
use Kcs\K8s\Api\Model\ApiMachinery\Apis\Meta\v1\ObjectMeta;
use Kcs\K8s\Api\Model\ApiMachinery\Apis\Meta\v1\OwnerReference;
use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;

/**
 * CSIDriver captures information about a Container Storage Interface (CSI) volume driver deployed on
 * the cluster. Kubernetes attach detach controller uses this object to determine whether attach is
 * required. Kubelet uses this object to determine whether pod information needs to be passed on mount.
 * CSIDriver objects are non-namespaced.
 */
#[Kubernetes\Kind('CSIDriver', group: 'storage.k8s.io', version: 'v1')]
#[Kubernetes\Operation('get', path: '/apis/storage.k8s.io/v1/csidrivers/{name}', response: 'self')]
#[Kubernetes\Operation('post', path: '/apis/storage.k8s.io/v1/csidrivers', body: 'model', response: 'self')]
#[Kubernetes\Operation('delete', path: '/apis/storage.k8s.io/v1/csidrivers/{name}', response: 'self')]
#[Kubernetes\Operation('put', path: '/apis/storage.k8s.io/v1/csidrivers/{name}', body: 'model', response: 'self')]
#[Kubernetes\Operation(
    'deletecollection-all',
    path: '/apis/storage.k8s.io/v1/csidrivers',
    response: 'Kcs\K8s\Api\Model\ApiMachinery\Apis\Meta\v1\Status',
)]
#[Kubernetes\Operation(
    'watch-all',
    path: '/apis/storage.k8s.io/v1/csidrivers',
    response: 'Kcs\K8s\Api\Model\ApiMachinery\Apis\Meta\v1\WatchEvent',
)]
#[Kubernetes\Operation('patch', path: '/apis/storage.k8s.io/v1/csidrivers/{name}', body: 'patch', response: 'self')]
#[Kubernetes\Operation('list-all', path: '/apis/storage.k8s.io/v1/csidrivers', response: 'Kcs\K8s\Api\Model\Api\Storage\v1\CSIDriverList')]
class CSIDriver
{
    #[Kubernetes\Attribute('apiVersion')]
    protected string $apiVersion = 'storage.k8s.io/v1';

    #[Kubernetes\Attribute('kind')]
    protected string $kind = 'CSIDriver';

    #[Kubernetes\Attribute('metadata', type: AttributeType::Model, model: ObjectMeta::class)]
    protected ObjectMeta $metadata;

    #[Kubernetes\Attribute('spec', type: AttributeType::Model, model: CSIDriverSpec::class, required: true)]
    protected CSIDriverSpec $spec;

    public function __construct(string|null $name, CSIDriverSpec $spec)
    {
        $this->metadata = new ObjectMeta($name);
        $this->spec = $spec;
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
     * attachRequired indicates this CSI volume driver requires an attach operation (because it implements
     * the CSI ControllerPublishVolume() method), and that the Kubernetes attach detach controller should
     * call the attach volume interface which checks the volumeattachment status and waits until the volume
     * is attached before proceeding to mounting. The CSI external-attacher coordinates with CSI volume
     * driver and updates the volumeattachment status when the attach operation is complete. If the
     * CSIDriverRegistry feature gate is enabled and the value is specified to false, the attach operation
     * will be skipped. Otherwise the attach operation will be called.
     *
     * This field is immutable.
     */
    public function isAttachRequired(): bool|null
    {
        return $this->spec->isAttachRequired();
    }

    /**
     * attachRequired indicates this CSI volume driver requires an attach operation (because it implements
     * the CSI ControllerPublishVolume() method), and that the Kubernetes attach detach controller should
     * call the attach volume interface which checks the volumeattachment status and waits until the volume
     * is attached before proceeding to mounting. The CSI external-attacher coordinates with CSI volume
     * driver and updates the volumeattachment status when the attach operation is complete. If the
     * CSIDriverRegistry feature gate is enabled and the value is specified to false, the attach operation
     * will be skipped. Otherwise the attach operation will be called.
     *
     * This field is immutable.
     *
     * @return static
     */
    public function setIsAttachRequired(bool $attachRequired): static
    {
        $this->spec->setIsAttachRequired($attachRequired);

        return $this;
    }

    /**
     * fsGroupPolicy defines if the underlying volume supports changing ownership and permission of the
     * volume before being mounted. Refer to the specific FSGroupPolicy values for additional details.
     *
     * This field was immutable in Kubernetes < 1.29 and now is mutable.
     *
     * Defaults to ReadWriteOnceWithFSType, which will examine each volume to determine if Kubernetes
     * should modify ownership and permissions of the volume. With the default policy the defined fsGroup
     * will only be applied if a fstype is defined and the volume's access mode contains ReadWriteOnce.
     */
    public function getFsGroupPolicy(): string|null
    {
        return $this->spec->getFsGroupPolicy();
    }

    /**
     * fsGroupPolicy defines if the underlying volume supports changing ownership and permission of the
     * volume before being mounted. Refer to the specific FSGroupPolicy values for additional details.
     *
     * This field was immutable in Kubernetes < 1.29 and now is mutable.
     *
     * Defaults to ReadWriteOnceWithFSType, which will examine each volume to determine if Kubernetes
     * should modify ownership and permissions of the volume. With the default policy the defined fsGroup
     * will only be applied if a fstype is defined and the volume's access mode contains ReadWriteOnce.
     *
     * @return static
     */
    public function setFsGroupPolicy(string $fsGroupPolicy): static
    {
        $this->spec->setFsGroupPolicy($fsGroupPolicy);

        return $this;
    }

    /**
     * podInfoOnMount indicates this CSI volume driver requires additional pod information (like podName,
     * podUID, etc.) during mount operations, if set to true. If set to false, pod information will not be
     * passed on mount. Default is false.
     *
     * The CSI driver specifies podInfoOnMount as part of driver deployment. If true, Kubelet will pass pod
     * information as VolumeContext in the CSI NodePublishVolume() calls. The CSI driver is responsible for
     * parsing and validating the information passed in as VolumeContext.
     *
     * The following VolumeContext will be passed if podInfoOnMount is set to true. This list might grow,
     * but the prefix will be used. "csi.storage.k8s.io/pod.name": pod.Name
     * "csi.storage.k8s.io/pod.namespace": pod.Namespace "csi.storage.k8s.io/pod.uid": string(pod.UID)
     * "csi.storage.k8s.io/ephemeral": "true" if the volume is an ephemeral inline volume
     *                                 defined by a CSIVolumeSource, otherwise "false"
     *
     * "csi.storage.k8s.io/ephemeral" is a new feature in Kubernetes 1.16. It is only required for drivers
     * which support both the "Persistent" and "Ephemeral" VolumeLifecycleMode. Other drivers can leave pod
     * info disabled and/or ignore this field. As Kubernetes 1.15 doesn't support this field, drivers can
     * only support one mode when deployed on such a cluster and the deployment determines which mode that
     * is, for example via a command line parameter of the driver.
     *
     * This field was immutable in Kubernetes < 1.29 and now is mutable.
     */
    public function isPodInfoOnMount(): bool|null
    {
        return $this->spec->isPodInfoOnMount();
    }

    /**
     * podInfoOnMount indicates this CSI volume driver requires additional pod information (like podName,
     * podUID, etc.) during mount operations, if set to true. If set to false, pod information will not be
     * passed on mount. Default is false.
     *
     * The CSI driver specifies podInfoOnMount as part of driver deployment. If true, Kubelet will pass pod
     * information as VolumeContext in the CSI NodePublishVolume() calls. The CSI driver is responsible for
     * parsing and validating the information passed in as VolumeContext.
     *
     * The following VolumeContext will be passed if podInfoOnMount is set to true. This list might grow,
     * but the prefix will be used. "csi.storage.k8s.io/pod.name": pod.Name
     * "csi.storage.k8s.io/pod.namespace": pod.Namespace "csi.storage.k8s.io/pod.uid": string(pod.UID)
     * "csi.storage.k8s.io/ephemeral": "true" if the volume is an ephemeral inline volume
     *                                 defined by a CSIVolumeSource, otherwise "false"
     *
     * "csi.storage.k8s.io/ephemeral" is a new feature in Kubernetes 1.16. It is only required for drivers
     * which support both the "Persistent" and "Ephemeral" VolumeLifecycleMode. Other drivers can leave pod
     * info disabled and/or ignore this field. As Kubernetes 1.15 doesn't support this field, drivers can
     * only support one mode when deployed on such a cluster and the deployment determines which mode that
     * is, for example via a command line parameter of the driver.
     *
     * This field was immutable in Kubernetes < 1.29 and now is mutable.
     *
     * @return static
     */
    public function setIsPodInfoOnMount(bool $podInfoOnMount): static
    {
        $this->spec->setIsPodInfoOnMount($podInfoOnMount);

        return $this;
    }

    /**
     * requiresRepublish indicates the CSI driver wants `NodePublishVolume` being periodically called to
     * reflect any possible change in the mounted volume. This field defaults to false.
     *
     * Note: After a successful initial NodePublishVolume call, subsequent calls to NodePublishVolume
     * should only update the contents of the volume. New mount points will not be seen by a running
     * container.
     */
    public function isRequiresRepublish(): bool|null
    {
        return $this->spec->isRequiresRepublish();
    }

    /**
     * requiresRepublish indicates the CSI driver wants `NodePublishVolume` being periodically called to
     * reflect any possible change in the mounted volume. This field defaults to false.
     *
     * Note: After a successful initial NodePublishVolume call, subsequent calls to NodePublishVolume
     * should only update the contents of the volume. New mount points will not be seen by a running
     * container.
     *
     * @return static
     */
    public function setIsRequiresRepublish(bool $requiresRepublish): static
    {
        $this->spec->setIsRequiresRepublish($requiresRepublish);

        return $this;
    }

    /**
     * seLinuxMount specifies if the CSI driver supports "-o context" mount option.
     *
     * When "true", the CSI driver must ensure that all volumes provided by this CSI driver can be mounted
     * separately with different `-o context` options. This is typical for storage backends that provide
     * volumes as filesystems on block devices or as independent shared volumes. Kubernetes will call
     * NodeStage / NodePublish with "-o context=xyz" mount option when mounting a ReadWriteOncePod volume
     * used in Pod that has explicitly set SELinux context. In the future, it may be expanded to other
     * volume AccessModes. In any case, Kubernetes will ensure that the volume is mounted only with a
     * single SELinux context.
     *
     * When "false", Kubernetes won't pass any special SELinux mount options to the driver. This is typical
     * for volumes that represent subdirectories of a bigger shared filesystem.
     *
     * Default is "false".
     */
    public function isSeLinuxMount(): bool|null
    {
        return $this->spec->isSeLinuxMount();
    }

    /**
     * seLinuxMount specifies if the CSI driver supports "-o context" mount option.
     *
     * When "true", the CSI driver must ensure that all volumes provided by this CSI driver can be mounted
     * separately with different `-o context` options. This is typical for storage backends that provide
     * volumes as filesystems on block devices or as independent shared volumes. Kubernetes will call
     * NodeStage / NodePublish with "-o context=xyz" mount option when mounting a ReadWriteOncePod volume
     * used in Pod that has explicitly set SELinux context. In the future, it may be expanded to other
     * volume AccessModes. In any case, Kubernetes will ensure that the volume is mounted only with a
     * single SELinux context.
     *
     * When "false", Kubernetes won't pass any special SELinux mount options to the driver. This is typical
     * for volumes that represent subdirectories of a bigger shared filesystem.
     *
     * Default is "false".
     *
     * @return static
     */
    public function setIsSeLinuxMount(bool $seLinuxMount): static
    {
        $this->spec->setIsSeLinuxMount($seLinuxMount);

        return $this;
    }

    /**
     * storageCapacity indicates that the CSI volume driver wants pod scheduling to consider the storage
     * capacity that the driver deployment will report by creating CSIStorageCapacity objects with capacity
     * information, if set to true.
     *
     * The check can be enabled immediately when deploying a driver. In that case, provisioning new volumes
     * with late binding will pause until the driver deployment has published some suitable
     * CSIStorageCapacity object.
     *
     * Alternatively, the driver can be deployed with the field unset or false and it can be flipped later
     * when storage capacity information has been published.
     *
     * This field was immutable in Kubernetes <= 1.22 and now is mutable.
     */
    public function isStorageCapacity(): bool|null
    {
        return $this->spec->isStorageCapacity();
    }

    /**
     * storageCapacity indicates that the CSI volume driver wants pod scheduling to consider the storage
     * capacity that the driver deployment will report by creating CSIStorageCapacity objects with capacity
     * information, if set to true.
     *
     * The check can be enabled immediately when deploying a driver. In that case, provisioning new volumes
     * with late binding will pause until the driver deployment has published some suitable
     * CSIStorageCapacity object.
     *
     * Alternatively, the driver can be deployed with the field unset or false and it can be flipped later
     * when storage capacity information has been published.
     *
     * This field was immutable in Kubernetes <= 1.22 and now is mutable.
     *
     * @return static
     */
    public function setIsStorageCapacity(bool $storageCapacity): static
    {
        $this->spec->setIsStorageCapacity($storageCapacity);

        return $this;
    }

    /**
     * tokenRequests indicates the CSI driver needs pods' service account tokens it is mounting volume for
     * to do necessary authentication. Kubelet will pass the tokens in VolumeContext in the CSI
     * NodePublishVolume calls. The CSI driver should parse and validate the following VolumeContext:
     * "csi.storage.k8s.io/serviceAccount.tokens": {
     *   "<audience>": {
     *     "token": <token>,
     *     "expirationTimestamp": <expiration timestamp in RFC3339>,
     *   },
     *   ...
     * }
     *
     * Note: Audience in each TokenRequest should be different and at most one token is empty string. To
     * receive a new token after expiry, RequiresRepublish can be used to trigger NodePublishVolume
     * periodically.
     *
     * @return iterable|TokenRequest[]
     */
    public function getTokenRequests(): iterable|null
    {
        return $this->spec->getTokenRequests();
    }

    /**
     * tokenRequests indicates the CSI driver needs pods' service account tokens it is mounting volume for
     * to do necessary authentication. Kubelet will pass the tokens in VolumeContext in the CSI
     * NodePublishVolume calls. The CSI driver should parse and validate the following VolumeContext:
     * "csi.storage.k8s.io/serviceAccount.tokens": {
     *   "<audience>": {
     *     "token": <token>,
     *     "expirationTimestamp": <expiration timestamp in RFC3339>,
     *   },
     *   ...
     * }
     *
     * Note: Audience in each TokenRequest should be different and at most one token is empty string. To
     * receive a new token after expiry, RequiresRepublish can be used to trigger NodePublishVolume
     * periodically.
     *
     * @return static
     */
    public function setTokenRequests(iterable $tokenRequests): static
    {
        $this->spec->setTokenRequests($tokenRequests);

        return $this;
    }

    /** @return static */
    public function addTokenRequests(TokenRequest $tokenRequest): static
    {
        $this->spec->addTokenRequests($tokenRequest);

        return $this;
    }

    /**
     * volumeLifecycleModes defines what kind of volumes this CSI volume driver supports. The default if
     * the list is empty is "Persistent", which is the usage defined by the CSI specification and
     * implemented in Kubernetes via the usual PV/PVC mechanism.
     *
     * The other mode is "Ephemeral". In this mode, volumes are defined inline inside the pod spec with
     * CSIVolumeSource and their lifecycle is tied to the lifecycle of that pod. A driver has to be aware
     * of this because it is only going to get a NodePublishVolume call for such a volume.
     *
     * For more information about implementing this mode, see
     * https://kubernetes-csi.github.io/docs/ephemeral-local-volumes.html A driver can support one or more
     * of these modes and more modes may be added in the future.
     *
     * This field is beta. This field is immutable.
     */
    public function getVolumeLifecycleModes(): array|null
    {
        return $this->spec->getVolumeLifecycleModes();
    }

    /**
     * volumeLifecycleModes defines what kind of volumes this CSI volume driver supports. The default if
     * the list is empty is "Persistent", which is the usage defined by the CSI specification and
     * implemented in Kubernetes via the usual PV/PVC mechanism.
     *
     * The other mode is "Ephemeral". In this mode, volumes are defined inline inside the pod spec with
     * CSIVolumeSource and their lifecycle is tied to the lifecycle of that pod. A driver has to be aware
     * of this because it is only going to get a NodePublishVolume call for such a volume.
     *
     * For more information about implementing this mode, see
     * https://kubernetes-csi.github.io/docs/ephemeral-local-volumes.html A driver can support one or more
     * of these modes and more modes may be added in the future.
     *
     * This field is beta. This field is immutable.
     *
     * @return static
     */
    public function setVolumeLifecycleModes(array $volumeLifecycleModes): static
    {
        $this->spec->setVolumeLifecycleModes($volumeLifecycleModes);

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
     * Standard object metadata. metadata.Name indicates the name of the CSI driver that this object refers
     * to; it MUST be the same name returned by the CSI GetPluginName() call for that driver. The driver
     * name must be 63 characters or less, beginning and ending with an alphanumeric character
     * ([a-z0-9A-Z]) with dashes (-), dots (.), and alphanumerics between. More info:
     * https://git.k8s.io/community/contributors/devel/sig-architecture/api-conventions.md#metadata
     */
    public function getMetadata(): ObjectMeta
    {
        return $this->metadata;
    }

    /**
     * Standard object metadata. metadata.Name indicates the name of the CSI driver that this object refers
     * to; it MUST be the same name returned by the CSI GetPluginName() call for that driver. The driver
     * name must be 63 characters or less, beginning and ending with an alphanumeric character
     * ([a-z0-9A-Z]) with dashes (-), dots (.), and alphanumerics between. More info:
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
     * spec represents the specification of the CSI Driver.
     */
    public function getSpec(): CSIDriverSpec
    {
        return $this->spec;
    }

    /**
     * spec represents the specification of the CSI Driver.
     *
     * @return static
     */
    public function setSpec(CSIDriverSpec $spec): static
    {
        $this->spec = $spec;

        return $this;
    }
}
