<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Resource\v1alpha3;

use DateTimeInterface;
use Kcs\K8s\Api\Model\Api\Core\v1\NodeSelector;
use Kcs\K8s\Api\Model\ApiMachinery\Apis\Meta\v1\ManagedFieldsEntry;
use Kcs\K8s\Api\Model\ApiMachinery\Apis\Meta\v1\ObjectMeta;
use Kcs\K8s\Api\Model\ApiMachinery\Apis\Meta\v1\OwnerReference;
use Kcs\K8s\Api\Model\ApiMachinery\Apis\Meta\v1\Status;
use Kcs\K8s\Api\Model\ApiMachinery\Apis\Meta\v1\WatchEvent;
use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;

/**
 * ResourceSlice represents one or more resources in a pool of similar resources, managed by a common
 * driver. A pool may span more than one ResourceSlice, and exactly how many ResourceSlices comprise a
 * pool is determined by the driver.
 *
 * At the moment, the only supported resources are devices with attributes and capacities. Each device
 * in a given pool, regardless of how many ResourceSlices, must have a unique name. The ResourceSlice
 * in which a device gets published may change over time. The unique identifier for a device is the
 * tuple <driver name>, <pool name>, <device name>.
 *
 * Whenever a driver needs to update a pool, it increments the pool.Spec.Pool.Generation number and
 * updates all ResourceSlices with that new number and new resource definitions. A consumer must only
 * use ResourceSlices with the highest generation number and ignore all others.
 *
 * When allocating all resources in a pool matching certain criteria or when looking for the best
 * solution among several different alternatives, a consumer should check the number of ResourceSlices
 * in a pool (included in each ResourceSlice) to determine whether its view of a pool is complete and
 * if not, should wait until the driver has completed updating the pool.
 *
 * For resources that are not local to a node, the node name is not set. Instead, the driver may use a
 * node selector to specify where the devices are available.
 *
 * This is an alpha type and requires enabling the DynamicResourceAllocation feature gate.
 */
#[Kubernetes\Kind('ResourceSlice', group: 'resource.k8s.io', version: 'v1alpha3')]
#[Kubernetes\Operation('get', path: '/apis/resource.k8s.io/v1alpha3/resourceslices/{name}', response: 'self')]
#[Kubernetes\Operation('post', path: '/apis/resource.k8s.io/v1alpha3/resourceslices', body: 'model', response: 'self')]
#[Kubernetes\Operation('delete', path: '/apis/resource.k8s.io/v1alpha3/resourceslices/{name}')]
#[Kubernetes\Operation('put', path: '/apis/resource.k8s.io/v1alpha3/resourceslices/{name}', body: 'model', response: 'self')]
#[Kubernetes\Operation(
    'deletecollection-all',
    path: '/apis/resource.k8s.io/v1alpha3/resourceslices',
    response: Status::class,
)]
#[Kubernetes\Operation(
    'watch-all',
    path: '/apis/resource.k8s.io/v1alpha3/resourceslices',
    response: WatchEvent::class,
)]
#[Kubernetes\Operation('patch', path: '/apis/resource.k8s.io/v1alpha3/resourceslices/{name}', body: 'patch', response: 'self')]
#[Kubernetes\Operation('list-all', path: '/apis/resource.k8s.io/v1alpha3/resourceslices', response: ResourceSliceList::class)]
class ResourceSlice
{
    #[Kubernetes\Attribute('apiVersion')]
    protected string $apiVersion = 'resource.k8s.io/v1alpha3';

    #[Kubernetes\Attribute('kind')]
    protected string $kind = 'ResourceSlice';

    #[Kubernetes\Attribute('metadata', type: AttributeType::Model, model: ObjectMeta::class)]
    protected ObjectMeta $metadata;

    #[Kubernetes\Attribute('spec', type: AttributeType::Model, model: ResourceSliceSpec::class, required: true)]
    protected ResourceSliceSpec $spec;

    public function __construct(string|null $name, string $driver, ResourcePool $pool)
    {
        $this->metadata = new ObjectMeta($name);
        $this->spec = new ResourceSliceSpec($driver, $pool);
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
     * AllNodes indicates that all nodes have access to the resources in the pool.
     *
     * Exactly one of NodeName, NodeSelector and AllNodes must be set.
     */
    public function isAllNodes(): bool|null
    {
        return $this->spec->isAllNodes();
    }

    /**
     * AllNodes indicates that all nodes have access to the resources in the pool.
     *
     * Exactly one of NodeName, NodeSelector and AllNodes must be set.
     *
     * @return static
     */
    public function setIsAllNodes(bool $allNodes): static
    {
        $this->spec->setIsAllNodes($allNodes);

        return $this;
    }

    /**
     * Devices lists some or all of the devices in this pool.
     *
     * Must not have more than 128 entries.
     *
     * @return iterable|Device[]
     */
    public function getDevices(): iterable|null
    {
        return $this->spec->getDevices();
    }

    /**
     * Devices lists some or all of the devices in this pool.
     *
     * Must not have more than 128 entries.
     *
     * @return static
     */
    public function setDevices(iterable $devices): static
    {
        $this->spec->setDevices($devices);

        return $this;
    }

    /** @return static */
    public function addDevices(Device $device): static
    {
        $this->spec->addDevices($device);

        return $this;
    }

    /**
     * Driver identifies the DRA driver providing the capacity information. A field selector can be used to
     * list only ResourceSlice objects with a certain driver name.
     *
     * Must be a DNS subdomain and should end with a DNS domain owned by the vendor of the driver. This
     * field is immutable.
     */
    public function getDriver(): string
    {
        return $this->spec->getDriver();
    }

    /**
     * Driver identifies the DRA driver providing the capacity information. A field selector can be used to
     * list only ResourceSlice objects with a certain driver name.
     *
     * Must be a DNS subdomain and should end with a DNS domain owned by the vendor of the driver. This
     * field is immutable.
     *
     * @return static
     */
    public function setDriver(string $driver): static
    {
        $this->spec->setDriver($driver);

        return $this;
    }

    /**
     * NodeName identifies the node which provides the resources in this pool. A field selector can be used
     * to list only ResourceSlice objects belonging to a certain node.
     *
     * This field can be used to limit access from nodes to ResourceSlices with the same node name. It also
     * indicates to autoscalers that adding new nodes of the same type as some old node might also make new
     * resources available.
     *
     * Exactly one of NodeName, NodeSelector and AllNodes must be set. This field is immutable.
     */
    public function getNodeName(): string|null
    {
        return $this->spec->getNodeName();
    }

    /**
     * NodeName identifies the node which provides the resources in this pool. A field selector can be used
     * to list only ResourceSlice objects belonging to a certain node.
     *
     * This field can be used to limit access from nodes to ResourceSlices with the same node name. It also
     * indicates to autoscalers that adding new nodes of the same type as some old node might also make new
     * resources available.
     *
     * Exactly one of NodeName, NodeSelector and AllNodes must be set. This field is immutable.
     *
     * @return static
     */
    public function setNodeName(string $nodeName): static
    {
        $this->spec->setNodeName($nodeName);

        return $this;
    }

    /**
     * NodeSelector defines which nodes have access to the resources in the pool, when that pool is not
     * limited to a single node.
     *
     * Must use exactly one term.
     *
     * Exactly one of NodeName, NodeSelector and AllNodes must be set.
     */
    public function getNodeSelector(): NodeSelector|null
    {
        return $this->spec->getNodeSelector();
    }

    /**
     * NodeSelector defines which nodes have access to the resources in the pool, when that pool is not
     * limited to a single node.
     *
     * Must use exactly one term.
     *
     * Exactly one of NodeName, NodeSelector and AllNodes must be set.
     *
     * @return static
     */
    public function setNodeSelector(NodeSelector $nodeSelector): static
    {
        $this->spec->setNodeSelector($nodeSelector);

        return $this;
    }

    /**
     * Pool describes the pool that this ResourceSlice belongs to.
     */
    public function getPool(): ResourcePool
    {
        return $this->spec->getPool();
    }

    /**
     * Pool describes the pool that this ResourceSlice belongs to.
     *
     * @return static
     */
    public function setPool(ResourcePool $pool): static
    {
        $this->spec->setPool($pool);

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
     * Standard object metadata
     */
    public function getMetadata(): ObjectMeta
    {
        return $this->metadata;
    }

    /**
     * Standard object metadata
     *
     * @return static
     */
    public function setMetadata(ObjectMeta $metadata): static
    {
        $this->metadata = $metadata;

        return $this;
    }

    /**
     * Contains the information published by the driver.
     *
     * Changing the spec automatically increments the metadata.generation number.
     */
    public function getSpec(): ResourceSliceSpec
    {
        return $this->spec;
    }

    /**
     * Contains the information published by the driver.
     *
     * Changing the spec automatically increments the metadata.generation number.
     *
     * @return static
     */
    public function setSpec(ResourceSliceSpec $spec): static
    {
        $this->spec = $spec;

        return $this;
    }
}
