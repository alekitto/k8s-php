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
use Kcs\K8s\Collection;

/**
 * ServiceAccount binds together: * a name, understood by users, and perhaps by peripheral systems, for
 * an identity * a principal that can be authenticated and authorized * a set of secrets
 */
#[Kubernetes\Kind('ServiceAccount', version: 'v1')]
#[Kubernetes\Operation('get', path: '/api/v1/namespaces/{namespace}/serviceaccounts/{name}', response: 'self')]
#[Kubernetes\Operation('post', path: '/api/v1/namespaces/{namespace}/serviceaccounts', body: 'model', response: 'self')]
#[Kubernetes\Operation('delete', path: '/api/v1/namespaces/{namespace}/serviceaccounts/{name}')]
#[Kubernetes\Operation(
    'watch',
    path: '/api/v1/namespaces/{namespace}/serviceaccounts',
    response: WatchEvent::class,
)]
#[Kubernetes\Operation('put', path: '/api/v1/namespaces/{namespace}/serviceaccounts/{name}', body: 'model', response: 'self')]
#[Kubernetes\Operation(
    'deletecollection',
    path: '/api/v1/namespaces/{namespace}/serviceaccounts',
    response: Status::class,
)]
#[Kubernetes\Operation('watch-all', path: '/api/v1/serviceaccounts', response: WatchEvent::class)]
#[Kubernetes\Operation('patch', path: '/api/v1/namespaces/{namespace}/serviceaccounts/{name}', body: 'patch', response: 'self')]
#[Kubernetes\Operation('list', path: '/api/v1/namespaces/{namespace}/serviceaccounts', response: ServiceAccountList::class)]
#[Kubernetes\Operation('list-all', path: '/api/v1/serviceaccounts', response: ServiceAccountList::class)]
class ServiceAccount
{
    #[Kubernetes\Attribute('apiVersion')]
    protected string|null $apiVersion = 'v1';

    #[Kubernetes\Attribute('automountServiceAccountToken')]
    protected bool|null $automountServiceAccountToken = null;

    /** @var iterable|LocalObjectReference[]|null */
    #[Kubernetes\Attribute('imagePullSecrets', type: AttributeType::Collection, model: LocalObjectReference::class)]
    protected $imagePullSecrets = null;

    #[Kubernetes\Attribute('kind')]
    protected string|null $kind = 'ServiceAccount';

    #[Kubernetes\Attribute('metadata', type: AttributeType::Model, model: ObjectMeta::class)]
    protected ObjectMeta|null $metadata = null;

    /** @var iterable|ObjectReference[]|null */
    #[Kubernetes\Attribute('secrets', type: AttributeType::Collection, model: ObjectReference::class)]
    protected $secrets = null;

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
     * APIVersion defines the versioned schema of this representation of an object. Servers should convert
     * recognized schemas to the latest internal value, and may reject unrecognized values. More info:
     * https://git.k8s.io/community/contributors/devel/sig-architecture/api-conventions.md#resources
     */
    public function getApiVersion(): string|null
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
     * AutomountServiceAccountToken indicates whether pods running as this service account should have an
     * API token automatically mounted. Can be overridden at the pod level.
     */
    public function isAutomountServiceAccountToken(): bool|null
    {
        return $this->automountServiceAccountToken;
    }

    /**
     * AutomountServiceAccountToken indicates whether pods running as this service account should have an
     * API token automatically mounted. Can be overridden at the pod level.
     *
     * @return static
     */
    public function setIsAutomountServiceAccountToken(bool $automountServiceAccountToken): static
    {
        $this->automountServiceAccountToken = $automountServiceAccountToken;

        return $this;
    }

    /**
     * ImagePullSecrets is a list of references to secrets in the same namespace to use for pulling any
     * images in pods that reference this ServiceAccount. ImagePullSecrets are distinct from Secrets
     * because Secrets can be mounted in the pod, but ImagePullSecrets are only accessed by the kubelet.
     * More info:
     * https://kubernetes.io/docs/concepts/containers/images/#specifying-imagepullsecrets-on-a-pod
     *
     * @return iterable|LocalObjectReference[]
     */
    public function getImagePullSecrets(): iterable|null
    {
        return $this->imagePullSecrets;
    }

    /**
     * ImagePullSecrets is a list of references to secrets in the same namespace to use for pulling any
     * images in pods that reference this ServiceAccount. ImagePullSecrets are distinct from Secrets
     * because Secrets can be mounted in the pod, but ImagePullSecrets are only accessed by the kubelet.
     * More info:
     * https://kubernetes.io/docs/concepts/containers/images/#specifying-imagepullsecrets-on-a-pod
     *
     * @return static
     */
    public function setImagePullSecrets(iterable $imagePullSecrets): static
    {
        $this->imagePullSecrets = $imagePullSecrets;

        return $this;
    }

    /** @return static */
    public function addImagePullSecrets(LocalObjectReference $imagePullSecret): static
    {
        if (! $this->imagePullSecrets) {
            $this->imagePullSecrets = new Collection();
        }

        $this->imagePullSecrets[] = $imagePullSecret;

        return $this;
    }

    /**
     * Kind is a string value representing the REST resource this object represents. Servers may infer this
     * from the endpoint the client submits requests to. Cannot be updated. In CamelCase. More info:
     * https://git.k8s.io/community/contributors/devel/sig-architecture/api-conventions.md#types-kinds
     */
    public function getKind(): string|null
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
    public function getMetadata(): ObjectMeta|null
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
     * Secrets is a list of the secrets in the same namespace that pods running using this ServiceAccount
     * are allowed to use. Pods are only limited to this list if this service account has a
     * "kubernetes.io/enforce-mountable-secrets" annotation set to "true". This field should not be used to
     * find auto-generated service account token secrets for use outside of pods. Instead, tokens can be
     * requested directly using the TokenRequest API, or service account token secrets can be manually
     * created. More info: https://kubernetes.io/docs/concepts/configuration/secret
     *
     * @return iterable|ObjectReference[]
     */
    public function getSecrets(): iterable|null
    {
        return $this->secrets;
    }

    /**
     * Secrets is a list of the secrets in the same namespace that pods running using this ServiceAccount
     * are allowed to use. Pods are only limited to this list if this service account has a
     * "kubernetes.io/enforce-mountable-secrets" annotation set to "true". This field should not be used to
     * find auto-generated service account token secrets for use outside of pods. Instead, tokens can be
     * requested directly using the TokenRequest API, or service account token secrets can be manually
     * created. More info: https://kubernetes.io/docs/concepts/configuration/secret
     *
     * @return static
     */
    public function setSecrets(iterable $secrets): static
    {
        $this->secrets = $secrets;

        return $this;
    }

    /** @return static */
    public function addSecrets(ObjectReference $secret): static
    {
        if (! $this->secrets) {
            $this->secrets = new Collection();
        }

        $this->secrets[] = $secret;

        return $this;
    }
}
