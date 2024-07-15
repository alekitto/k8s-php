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
 * Pod is a collection of containers that can run on a host. This resource is created by clients and
 * scheduled onto hosts.
 */
#[Kubernetes\Kind('Pod', version: 'v1')]
#[Kubernetes\Operation('get', path: '/api/v1/namespaces/{namespace}/pods/{name}', response: 'self')]
#[Kubernetes\Operation('get-status', path: '/api/v1/namespaces/{namespace}/pods/{name}/status', response: 'self')]
#[Kubernetes\Operation('post', path: '/api/v1/namespaces/{namespace}/pods', body: 'model', response: 'self')]
#[Kubernetes\Operation('delete', path: '/api/v1/namespaces/{namespace}/pods/{name}', response: 'self')]
#[Kubernetes\Operation(
    'watch',
    path: '/api/v1/namespaces/{namespace}/pods',
    response: WatchEvent::class,
)]
#[Kubernetes\Operation('put', path: '/api/v1/namespaces/{namespace}/pods/{name}', body: 'model', response: 'self')]
#[Kubernetes\Operation('put-status', path: '/api/v1/namespaces/{namespace}/pods/{name}/status', body: 'model', response: 'self')]
#[Kubernetes\Operation(
    'deletecollection-all',
    path: '/api/v1/namespaces/{namespace}/pods',
    response: Status::class,
)]
#[Kubernetes\Operation('watch-all', path: '/api/v1/pods', response: WatchEvent::class)]
#[Kubernetes\Operation('patch', path: '/api/v1/namespaces/{namespace}/pods/{name}', body: 'patch', response: 'self')]
#[Kubernetes\Operation('patch-status', path: '/api/v1/namespaces/{namespace}/pods/{name}/status', body: 'patch', response: 'self')]
#[Kubernetes\Operation('list', path: '/api/v1/namespaces/{namespace}/pods', response: PodList::class)]
#[Kubernetes\Operation('list-all', path: '/api/v1/pods', response: PodList::class)]
#[Kubernetes\Operation('proxy', path: '/api/v1/namespaces/{namespace}/pods/{name}/proxy/{path}')]
class Pod
{
    #[Kubernetes\Attribute('apiVersion')]
    protected string $apiVersion = 'v1';

    #[Kubernetes\Attribute('kind')]
    protected string $kind = 'Pod';

    #[Kubernetes\Attribute('metadata', type: AttributeType::Model, model: ObjectMeta::class)]
    protected ObjectMeta $metadata;

    #[Kubernetes\Attribute('spec', type: AttributeType::Model, model: PodSpec::class)]
    protected PodSpec $spec;

    #[Kubernetes\Attribute('status', type: AttributeType::Model, model: PodStatus::class)]
    protected PodStatus|null $status = null;

    /** @param iterable|Container[] $containers */
    public function __construct(string|null $name, iterable $containers)
    {
        $this->metadata = new ObjectMeta($name);
        $this->spec = new PodSpec($containers);
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
     * Optional duration in seconds the pod may be active on the node relative to StartTime before the
     * system will actively try to mark it failed and kill associated containers. Value must be a positive
     * integer.
     */
    public function getActiveDeadlineSeconds(): int|null
    {
        return $this->spec->getActiveDeadlineSeconds();
    }

    /**
     * Optional duration in seconds the pod may be active on the node relative to StartTime before the
     * system will actively try to mark it failed and kill associated containers. Value must be a positive
     * integer.
     *
     * @return static
     */
    public function setActiveDeadlineSeconds(int $activeDeadlineSeconds): static
    {
        $this->spec->setActiveDeadlineSeconds($activeDeadlineSeconds);

        return $this;
    }

    /**
     * If specified, the pod's scheduling constraints
     */
    public function getAffinity(): Affinity|null
    {
        return $this->spec->getAffinity();
    }

    /**
     * If specified, the pod's scheduling constraints
     *
     * @return static
     */
    public function setAffinity(Affinity $affinity): static
    {
        $this->spec->setAffinity($affinity);

        return $this;
    }

    /**
     * AutomountServiceAccountToken indicates whether a service account token should be automatically
     * mounted.
     */
    public function isAutomountServiceAccountToken(): bool|null
    {
        return $this->spec->isAutomountServiceAccountToken();
    }

    /**
     * AutomountServiceAccountToken indicates whether a service account token should be automatically
     * mounted.
     *
     * @return static
     */
    public function setIsAutomountServiceAccountToken(bool $automountServiceAccountToken): static
    {
        $this->spec->setIsAutomountServiceAccountToken($automountServiceAccountToken);

        return $this;
    }

    /**
     * List of containers belonging to the pod. Containers cannot currently be added or removed. There must
     * be at least one container in a Pod. Cannot be updated.
     *
     * @return iterable|Container[]
     */
    public function getContainers(): iterable
    {
        return $this->spec->getContainers();
    }

    /**
     * List of containers belonging to the pod. Containers cannot currently be added or removed. There must
     * be at least one container in a Pod. Cannot be updated.
     *
     * @return static
     */
    public function setContainers(iterable $containers): static
    {
        $this->spec->setContainers($containers);

        return $this;
    }

    /** @return static */
    public function addContainers(Container $container): static
    {
        $this->spec->addContainers($container);

        return $this;
    }

    /**
     * Specifies the DNS parameters of a pod. Parameters specified here will be merged to the generated DNS
     * configuration based on DNSPolicy.
     */
    public function getDnsConfig(): PodDNSConfig|null
    {
        return $this->spec->getDnsConfig();
    }

    /**
     * Specifies the DNS parameters of a pod. Parameters specified here will be merged to the generated DNS
     * configuration based on DNSPolicy.
     *
     * @return static
     */
    public function setDnsConfig(PodDNSConfig $dnsConfig): static
    {
        $this->spec->setDnsConfig($dnsConfig);

        return $this;
    }

    /**
     * Set DNS policy for the pod. Defaults to "ClusterFirst". Valid values are 'ClusterFirstWithHostNet',
     * 'ClusterFirst', 'Default' or 'None'. DNS parameters given in DNSConfig will be merged with the
     * policy selected with DNSPolicy. To have DNS options set along with hostNetwork, you have to specify
     * DNS policy explicitly to 'ClusterFirstWithHostNet'.
     */
    public function getDnsPolicy(): string|null
    {
        return $this->spec->getDnsPolicy();
    }

    /**
     * Set DNS policy for the pod. Defaults to "ClusterFirst". Valid values are 'ClusterFirstWithHostNet',
     * 'ClusterFirst', 'Default' or 'None'. DNS parameters given in DNSConfig will be merged with the
     * policy selected with DNSPolicy. To have DNS options set along with hostNetwork, you have to specify
     * DNS policy explicitly to 'ClusterFirstWithHostNet'.
     *
     * @return static
     */
    public function setDnsPolicy(string $dnsPolicy): static
    {
        $this->spec->setDnsPolicy($dnsPolicy);

        return $this;
    }

    /**
     * EnableServiceLinks indicates whether information about services should be injected into pod's
     * environment variables, matching the syntax of Docker links. Optional: Defaults to true.
     */
    public function isEnableServiceLinks(): bool|null
    {
        return $this->spec->isEnableServiceLinks();
    }

    /**
     * EnableServiceLinks indicates whether information about services should be injected into pod's
     * environment variables, matching the syntax of Docker links. Optional: Defaults to true.
     *
     * @return static
     */
    public function setIsEnableServiceLinks(bool $enableServiceLinks): static
    {
        $this->spec->setIsEnableServiceLinks($enableServiceLinks);

        return $this;
    }

    /**
     * List of ephemeral containers run in this pod. Ephemeral containers may be run in an existing pod to
     * perform user-initiated actions such as debugging. This list cannot be specified when creating a pod,
     * and it cannot be modified by updating the pod spec. In order to add an ephemeral container to an
     * existing pod, use the pod's ephemeralcontainers subresource.
     *
     * @return iterable|EphemeralContainer[]
     */
    public function getEphemeralContainers(): iterable|null
    {
        return $this->spec->getEphemeralContainers();
    }

    /**
     * List of ephemeral containers run in this pod. Ephemeral containers may be run in an existing pod to
     * perform user-initiated actions such as debugging. This list cannot be specified when creating a pod,
     * and it cannot be modified by updating the pod spec. In order to add an ephemeral container to an
     * existing pod, use the pod's ephemeralcontainers subresource.
     *
     * @return static
     */
    public function setEphemeralContainers(iterable $ephemeralContainers): static
    {
        $this->spec->setEphemeralContainers($ephemeralContainers);

        return $this;
    }

    /** @return static */
    public function addEphemeralContainers(EphemeralContainer $ephemeralContainer): static
    {
        $this->spec->addEphemeralContainers($ephemeralContainer);

        return $this;
    }

    /**
     * HostAliases is an optional list of hosts and IPs that will be injected into the pod's hosts file if
     * specified.
     *
     * @return iterable|HostAlias[]
     */
    public function getHostAliases(): iterable|null
    {
        return $this->spec->getHostAliases();
    }

    /**
     * HostAliases is an optional list of hosts and IPs that will be injected into the pod's hosts file if
     * specified.
     *
     * @return static
     */
    public function setHostAliases(iterable $hostAliases): static
    {
        $this->spec->setHostAliases($hostAliases);

        return $this;
    }

    /** @return static */
    public function addHostAliases(HostAlias $hostAliase): static
    {
        $this->spec->addHostAliases($hostAliase);

        return $this;
    }

    /**
     * Use the host's ipc namespace. Optional: Default to false.
     */
    public function isHostIPC(): bool|null
    {
        return $this->spec->isHostIPC();
    }

    /**
     * Use the host's ipc namespace. Optional: Default to false.
     *
     * @return static
     */
    public function setIsHostIPC(bool $hostIPC): static
    {
        $this->spec->setIsHostIPC($hostIPC);

        return $this;
    }

    /**
     * Host networking requested for this pod. Use the host's network namespace. If this option is set, the
     * ports that will be used must be specified. Default to false.
     */
    public function isHostNetwork(): bool|null
    {
        return $this->spec->isHostNetwork();
    }

    /**
     * Host networking requested for this pod. Use the host's network namespace. If this option is set, the
     * ports that will be used must be specified. Default to false.
     *
     * @return static
     */
    public function setIsHostNetwork(bool $hostNetwork): static
    {
        $this->spec->setIsHostNetwork($hostNetwork);

        return $this;
    }

    /**
     * Use the host's pid namespace. Optional: Default to false.
     */
    public function isHostPID(): bool|null
    {
        return $this->spec->isHostPID();
    }

    /**
     * Use the host's pid namespace. Optional: Default to false.
     *
     * @return static
     */
    public function setIsHostPID(bool $hostPID): static
    {
        $this->spec->setIsHostPID($hostPID);

        return $this;
    }

    /**
     * Use the host's user namespace. Optional: Default to true. If set to true or not present, the pod
     * will be run in the host user namespace, useful for when the pod needs a feature only available to
     * the host user namespace, such as loading a kernel module with CAP_SYS_MODULE. When set to false, a
     * new userns is created for the pod. Setting false is useful for mitigating container breakout
     * vulnerabilities even allowing users to run their containers as root without actually having root
     * privileges on the host. This field is alpha-level and is only honored by servers that enable the
     * UserNamespacesSupport feature.
     */
    public function isHostUsers(): bool|null
    {
        return $this->spec->isHostUsers();
    }

    /**
     * Use the host's user namespace. Optional: Default to true. If set to true or not present, the pod
     * will be run in the host user namespace, useful for when the pod needs a feature only available to
     * the host user namespace, such as loading a kernel module with CAP_SYS_MODULE. When set to false, a
     * new userns is created for the pod. Setting false is useful for mitigating container breakout
     * vulnerabilities even allowing users to run their containers as root without actually having root
     * privileges on the host. This field is alpha-level and is only honored by servers that enable the
     * UserNamespacesSupport feature.
     *
     * @return static
     */
    public function setIsHostUsers(bool $hostUsers): static
    {
        $this->spec->setIsHostUsers($hostUsers);

        return $this;
    }

    /**
     * Specifies the hostname of the Pod If not specified, the pod's hostname will be set to a
     * system-defined value.
     */
    public function getHostname(): string|null
    {
        return $this->spec->getHostname();
    }

    /**
     * Specifies the hostname of the Pod If not specified, the pod's hostname will be set to a
     * system-defined value.
     *
     * @return static
     */
    public function setHostname(string $hostname): static
    {
        $this->spec->setHostname($hostname);

        return $this;
    }

    /**
     * ImagePullSecrets is an optional list of references to secrets in the same namespace to use for
     * pulling any of the images used by this PodSpec. If specified, these secrets will be passed to
     * individual puller implementations for them to use. More info:
     * https://kubernetes.io/docs/concepts/containers/images#specifying-imagepullsecrets-on-a-pod
     *
     * @return iterable|LocalObjectReference[]
     */
    public function getImagePullSecrets(): iterable|null
    {
        return $this->spec->getImagePullSecrets();
    }

    /**
     * ImagePullSecrets is an optional list of references to secrets in the same namespace to use for
     * pulling any of the images used by this PodSpec. If specified, these secrets will be passed to
     * individual puller implementations for them to use. More info:
     * https://kubernetes.io/docs/concepts/containers/images#specifying-imagepullsecrets-on-a-pod
     *
     * @return static
     */
    public function setImagePullSecrets(iterable $imagePullSecrets): static
    {
        $this->spec->setImagePullSecrets($imagePullSecrets);

        return $this;
    }

    /** @return static */
    public function addImagePullSecrets(LocalObjectReference $imagePullSecret): static
    {
        $this->spec->addImagePullSecrets($imagePullSecret);

        return $this;
    }

    /**
     * List of initialization containers belonging to the pod. Init containers are executed in order prior
     * to containers being started. If any init container fails, the pod is considered to have failed and
     * is handled according to its restartPolicy. The name for an init container or normal container must
     * be unique among all containers. Init containers may not have Lifecycle actions, Readiness probes,
     * Liveness probes, or Startup probes. The resourceRequirements of an init container are taken into
     * account during scheduling by finding the highest request/limit for each resource type, and then
     * using the max of of that value or the sum of the normal containers. Limits are applied to init
     * containers in a similar fashion. Init containers cannot currently be added or removed. Cannot be
     * updated. More info: https://kubernetes.io/docs/concepts/workloads/pods/init-containers/
     *
     * @return iterable|Container[]
     */
    public function getInitContainers(): iterable|null
    {
        return $this->spec->getInitContainers();
    }

    /**
     * List of initialization containers belonging to the pod. Init containers are executed in order prior
     * to containers being started. If any init container fails, the pod is considered to have failed and
     * is handled according to its restartPolicy. The name for an init container or normal container must
     * be unique among all containers. Init containers may not have Lifecycle actions, Readiness probes,
     * Liveness probes, or Startup probes. The resourceRequirements of an init container are taken into
     * account during scheduling by finding the highest request/limit for each resource type, and then
     * using the max of of that value or the sum of the normal containers. Limits are applied to init
     * containers in a similar fashion. Init containers cannot currently be added or removed. Cannot be
     * updated. More info: https://kubernetes.io/docs/concepts/workloads/pods/init-containers/
     *
     * @return static
     */
    public function setInitContainers(iterable $initContainers): static
    {
        $this->spec->setInitContainers($initContainers);

        return $this;
    }

    /** @return static */
    public function addInitContainers(Container $initContainer): static
    {
        $this->spec->addInitContainers($initContainer);

        return $this;
    }

    /**
     * NodeName is a request to schedule this pod onto a specific node. If it is non-empty, the scheduler
     * simply schedules this pod onto that node, assuming that it fits resource requirements.
     */
    public function getNodeName(): string|null
    {
        return $this->spec->getNodeName();
    }

    /**
     * NodeName is a request to schedule this pod onto a specific node. If it is non-empty, the scheduler
     * simply schedules this pod onto that node, assuming that it fits resource requirements.
     *
     * @return static
     */
    public function setNodeName(string $nodeName): static
    {
        $this->spec->setNodeName($nodeName);

        return $this;
    }

    /**
     * NodeSelector is a selector which must be true for the pod to fit on a node. Selector which must
     * match a node's labels for the pod to be scheduled on that node. More info:
     * https://kubernetes.io/docs/concepts/configuration/assign-pod-node/
     */
    public function getNodeSelector(): array|null
    {
        return $this->spec->getNodeSelector();
    }

    /**
     * NodeSelector is a selector which must be true for the pod to fit on a node. Selector which must
     * match a node's labels for the pod to be scheduled on that node. More info:
     * https://kubernetes.io/docs/concepts/configuration/assign-pod-node/
     *
     * @return static
     */
    public function setNodeSelector(array $nodeSelector): static
    {
        $this->spec->setNodeSelector($nodeSelector);

        return $this;
    }

    /**
     * Specifies the OS of the containers in the pod. Some pod and container fields are restricted if this
     * is set.
     *
     * If the OS field is set to linux, the following fields must be unset: -securityContext.windowsOptions
     *
     * If the OS field is set to windows, following fields must be unset: - spec.hostPID - spec.hostIPC -
     * spec.hostUsers - spec.securityContext.appArmorProfile - spec.securityContext.seLinuxOptions -
     * spec.securityContext.seccompProfile - spec.securityContext.fsGroup -
     * spec.securityContext.fsGroupChangePolicy - spec.securityContext.sysctls - spec.shareProcessNamespace
     * - spec.securityContext.runAsUser - spec.securityContext.runAsGroup -
     * spec.securityContext.supplementalGroups - spec.containers[*].securityContext.appArmorProfile -
     * spec.containers[*].securityContext.seLinuxOptions -
     * spec.containers[*].securityContext.seccompProfile - spec.containers[*].securityContext.capabilities
     * - spec.containers[*].securityContext.readOnlyRootFilesystem -
     * spec.containers[*].securityContext.privileged -
     * spec.containers[*].securityContext.allowPrivilegeEscalation -
     * spec.containers[*].securityContext.procMount - spec.containers[*].securityContext.runAsUser -
     * spec.containers[*].securityContext.runAsGroup
     */
    public function getOs(): PodOS|null
    {
        return $this->spec->getOs();
    }

    /**
     * Specifies the OS of the containers in the pod. Some pod and container fields are restricted if this
     * is set.
     *
     * If the OS field is set to linux, the following fields must be unset: -securityContext.windowsOptions
     *
     * If the OS field is set to windows, following fields must be unset: - spec.hostPID - spec.hostIPC -
     * spec.hostUsers - spec.securityContext.appArmorProfile - spec.securityContext.seLinuxOptions -
     * spec.securityContext.seccompProfile - spec.securityContext.fsGroup -
     * spec.securityContext.fsGroupChangePolicy - spec.securityContext.sysctls - spec.shareProcessNamespace
     * - spec.securityContext.runAsUser - spec.securityContext.runAsGroup -
     * spec.securityContext.supplementalGroups - spec.containers[*].securityContext.appArmorProfile -
     * spec.containers[*].securityContext.seLinuxOptions -
     * spec.containers[*].securityContext.seccompProfile - spec.containers[*].securityContext.capabilities
     * - spec.containers[*].securityContext.readOnlyRootFilesystem -
     * spec.containers[*].securityContext.privileged -
     * spec.containers[*].securityContext.allowPrivilegeEscalation -
     * spec.containers[*].securityContext.procMount - spec.containers[*].securityContext.runAsUser -
     * spec.containers[*].securityContext.runAsGroup
     *
     * @return static
     */
    public function setOs(PodOS $os): static
    {
        $this->spec->setOs($os);

        return $this;
    }

    /**
     * Overhead represents the resource overhead associated with running a pod for a given RuntimeClass.
     * This field will be autopopulated at admission time by the RuntimeClass admission controller. If the
     * RuntimeClass admission controller is enabled, overhead must not be set in Pod create requests. The
     * RuntimeClass admission controller will reject Pod create requests which have the overhead already
     * set. If RuntimeClass is configured and selected in the PodSpec, Overhead will be set to the value
     * defined in the corresponding RuntimeClass, otherwise it will remain unset and treated as zero. More
     * info: https://git.k8s.io/enhancements/keps/sig-node/688-pod-overhead/README.md
     */
    public function getOverhead(): array|null
    {
        return $this->spec->getOverhead();
    }

    /**
     * Overhead represents the resource overhead associated with running a pod for a given RuntimeClass.
     * This field will be autopopulated at admission time by the RuntimeClass admission controller. If the
     * RuntimeClass admission controller is enabled, overhead must not be set in Pod create requests. The
     * RuntimeClass admission controller will reject Pod create requests which have the overhead already
     * set. If RuntimeClass is configured and selected in the PodSpec, Overhead will be set to the value
     * defined in the corresponding RuntimeClass, otherwise it will remain unset and treated as zero. More
     * info: https://git.k8s.io/enhancements/keps/sig-node/688-pod-overhead/README.md
     *
     * @return static
     */
    public function setOverhead(array $overhead): static
    {
        $this->spec->setOverhead($overhead);

        return $this;
    }

    /**
     * PreemptionPolicy is the Policy for preempting pods with lower priority. One of Never,
     * PreemptLowerPriority. Defaults to PreemptLowerPriority if unset.
     */
    public function getPreemptionPolicy(): string|null
    {
        return $this->spec->getPreemptionPolicy();
    }

    /**
     * PreemptionPolicy is the Policy for preempting pods with lower priority. One of Never,
     * PreemptLowerPriority. Defaults to PreemptLowerPriority if unset.
     *
     * @return static
     */
    public function setPreemptionPolicy(string $preemptionPolicy): static
    {
        $this->spec->setPreemptionPolicy($preemptionPolicy);

        return $this;
    }

    /**
     * The priority value. Various system components use this field to find the priority of the pod. When
     * Priority Admission Controller is enabled, it prevents users from setting this field. The admission
     * controller populates this field from PriorityClassName. The higher the value, the higher the
     * priority.
     */
    public function getPriority(): int|null
    {
        return $this->spec->getPriority();
    }

    /**
     * The priority value. Various system components use this field to find the priority of the pod. When
     * Priority Admission Controller is enabled, it prevents users from setting this field. The admission
     * controller populates this field from PriorityClassName. The higher the value, the higher the
     * priority.
     *
     * @return static
     */
    public function setPriority(int $priority): static
    {
        $this->spec->setPriority($priority);

        return $this;
    }

    /**
     * If specified, indicates the pod's priority. "system-node-critical" and "system-cluster-critical" are
     * two special keywords which indicate the highest priorities with the former being the highest
     * priority. Any other name must be defined by creating a PriorityClass object with that name. If not
     * specified, the pod priority will be default or zero if there is no default.
     */
    public function getPriorityClassName(): string|null
    {
        return $this->spec->getPriorityClassName();
    }

    /**
     * If specified, indicates the pod's priority. "system-node-critical" and "system-cluster-critical" are
     * two special keywords which indicate the highest priorities with the former being the highest
     * priority. Any other name must be defined by creating a PriorityClass object with that name. If not
     * specified, the pod priority will be default or zero if there is no default.
     *
     * @return static
     */
    public function setPriorityClassName(string $priorityClassName): static
    {
        $this->spec->setPriorityClassName($priorityClassName);

        return $this;
    }

    /**
     * If specified, all readiness gates will be evaluated for pod readiness. A pod is ready when all its
     * containers are ready AND all conditions specified in the readiness gates have status equal to "True"
     * More info: https://git.k8s.io/enhancements/keps/sig-network/580-pod-readiness-gates
     *
     * @return iterable|PodReadinessGate[]
     */
    public function getReadinessGates(): iterable|null
    {
        return $this->spec->getReadinessGates();
    }

    /**
     * If specified, all readiness gates will be evaluated for pod readiness. A pod is ready when all its
     * containers are ready AND all conditions specified in the readiness gates have status equal to "True"
     * More info: https://git.k8s.io/enhancements/keps/sig-network/580-pod-readiness-gates
     *
     * @return static
     */
    public function setReadinessGates(iterable $readinessGates): static
    {
        $this->spec->setReadinessGates($readinessGates);

        return $this;
    }

    /** @return static */
    public function addReadinessGates(PodReadinessGate $readinessGate): static
    {
        $this->spec->addReadinessGates($readinessGate);

        return $this;
    }

    /**
     * ResourceClaims defines which ResourceClaims must be allocated and reserved before the Pod is allowed
     * to start. The resources will be made available to those containers which consume them by name.
     *
     * This is an alpha field and requires enabling the DynamicResourceAllocation feature gate.
     *
     * This field is immutable.
     *
     * @return iterable|PodResourceClaim[]
     */
    public function getResourceClaims(): iterable|null
    {
        return $this->spec->getResourceClaims();
    }

    /**
     * ResourceClaims defines which ResourceClaims must be allocated and reserved before the Pod is allowed
     * to start. The resources will be made available to those containers which consume them by name.
     *
     * This is an alpha field and requires enabling the DynamicResourceAllocation feature gate.
     *
     * This field is immutable.
     *
     * @return static
     */
    public function setResourceClaims(iterable $resourceClaims): static
    {
        $this->spec->setResourceClaims($resourceClaims);

        return $this;
    }

    /** @return static */
    public function addResourceClaims(PodResourceClaim $resourceClaim): static
    {
        $this->spec->addResourceClaims($resourceClaim);

        return $this;
    }

    /**
     * Restart policy for all containers within the pod. One of Always, OnFailure, Never. In some contexts,
     * only a subset of those values may be permitted. Default to Always. More info:
     * https://kubernetes.io/docs/concepts/workloads/pods/pod-lifecycle/#restart-policy
     */
    public function getRestartPolicy(): string|null
    {
        return $this->spec->getRestartPolicy();
    }

    /**
     * Restart policy for all containers within the pod. One of Always, OnFailure, Never. In some contexts,
     * only a subset of those values may be permitted. Default to Always. More info:
     * https://kubernetes.io/docs/concepts/workloads/pods/pod-lifecycle/#restart-policy
     *
     * @return static
     */
    public function setRestartPolicy(string $restartPolicy): static
    {
        $this->spec->setRestartPolicy($restartPolicy);

        return $this;
    }

    /**
     * RuntimeClassName refers to a RuntimeClass object in the node.k8s.io group, which should be used to
     * run this pod.  If no RuntimeClass resource matches the named class, the pod will not be run. If
     * unset or empty, the "legacy" RuntimeClass will be used, which is an implicit class with an empty
     * definition that uses the default runtime handler. More info:
     * https://git.k8s.io/enhancements/keps/sig-node/585-runtime-class
     */
    public function getRuntimeClassName(): string|null
    {
        return $this->spec->getRuntimeClassName();
    }

    /**
     * RuntimeClassName refers to a RuntimeClass object in the node.k8s.io group, which should be used to
     * run this pod.  If no RuntimeClass resource matches the named class, the pod will not be run. If
     * unset or empty, the "legacy" RuntimeClass will be used, which is an implicit class with an empty
     * definition that uses the default runtime handler. More info:
     * https://git.k8s.io/enhancements/keps/sig-node/585-runtime-class
     *
     * @return static
     */
    public function setRuntimeClassName(string $runtimeClassName): static
    {
        $this->spec->setRuntimeClassName($runtimeClassName);

        return $this;
    }

    /**
     * If specified, the pod will be dispatched by specified scheduler. If not specified, the pod will be
     * dispatched by default scheduler.
     */
    public function getSchedulerName(): string|null
    {
        return $this->spec->getSchedulerName();
    }

    /**
     * If specified, the pod will be dispatched by specified scheduler. If not specified, the pod will be
     * dispatched by default scheduler.
     *
     * @return static
     */
    public function setSchedulerName(string $schedulerName): static
    {
        $this->spec->setSchedulerName($schedulerName);

        return $this;
    }

    /**
     * SchedulingGates is an opaque list of values that if specified will block scheduling the pod. If
     * schedulingGates is not empty, the pod will stay in the SchedulingGated state and the scheduler will
     * not attempt to schedule the pod.
     *
     * SchedulingGates can only be set at pod creation time, and be removed only afterwards.
     *
     * @return iterable|PodSchedulingGate[]
     */
    public function getSchedulingGates(): iterable|null
    {
        return $this->spec->getSchedulingGates();
    }

    /**
     * SchedulingGates is an opaque list of values that if specified will block scheduling the pod. If
     * schedulingGates is not empty, the pod will stay in the SchedulingGated state and the scheduler will
     * not attempt to schedule the pod.
     *
     * SchedulingGates can only be set at pod creation time, and be removed only afterwards.
     *
     * @return static
     */
    public function setSchedulingGates(iterable $schedulingGates): static
    {
        $this->spec->setSchedulingGates($schedulingGates);

        return $this;
    }

    /** @return static */
    public function addSchedulingGates(PodSchedulingGate $schedulingGate): static
    {
        $this->spec->addSchedulingGates($schedulingGate);

        return $this;
    }

    /**
     * SecurityContext holds pod-level security attributes and common container settings. Optional:
     * Defaults to empty.  See type description for default values of each field.
     */
    public function getSecurityContext(): PodSecurityContext|null
    {
        return $this->spec->getSecurityContext();
    }

    /**
     * SecurityContext holds pod-level security attributes and common container settings. Optional:
     * Defaults to empty.  See type description for default values of each field.
     *
     * @return static
     */
    public function setSecurityContext(PodSecurityContext $securityContext): static
    {
        $this->spec->setSecurityContext($securityContext);

        return $this;
    }

    /**
     * DeprecatedServiceAccount is a deprecated alias for ServiceAccountName. Deprecated: Use
     * serviceAccountName instead.
     */
    public function getServiceAccount(): string|null
    {
        return $this->spec->getServiceAccount();
    }

    /**
     * DeprecatedServiceAccount is a deprecated alias for ServiceAccountName. Deprecated: Use
     * serviceAccountName instead.
     *
     * @return static
     */
    public function setServiceAccount(string $serviceAccount): static
    {
        $this->spec->setServiceAccount($serviceAccount);

        return $this;
    }

    /**
     * ServiceAccountName is the name of the ServiceAccount to use to run this pod. More info:
     * https://kubernetes.io/docs/tasks/configure-pod-container/configure-service-account/
     */
    public function getServiceAccountName(): string|null
    {
        return $this->spec->getServiceAccountName();
    }

    /**
     * ServiceAccountName is the name of the ServiceAccount to use to run this pod. More info:
     * https://kubernetes.io/docs/tasks/configure-pod-container/configure-service-account/
     *
     * @return static
     */
    public function setServiceAccountName(string $serviceAccountName): static
    {
        $this->spec->setServiceAccountName($serviceAccountName);

        return $this;
    }

    /**
     * If true the pod's hostname will be configured as the pod's FQDN, rather than the leaf name (the
     * default). In Linux containers, this means setting the FQDN in the hostname field of the kernel (the
     * nodename field of struct utsname). In Windows containers, this means setting the registry value of
     * hostname for the registry key HKEY_LOCAL_MACHINE\SYSTEM\CurrentControlSet\Services\Tcpip\Parameters
     * to FQDN. If a pod does not have FQDN, this has no effect. Default to false.
     */
    public function isSetHostnameAsFQDN(): bool|null
    {
        return $this->spec->isSetHostnameAsFQDN();
    }

    /**
     * If true the pod's hostname will be configured as the pod's FQDN, rather than the leaf name (the
     * default). In Linux containers, this means setting the FQDN in the hostname field of the kernel (the
     * nodename field of struct utsname). In Windows containers, this means setting the registry value of
     * hostname for the registry key HKEY_LOCAL_MACHINE\SYSTEM\CurrentControlSet\Services\Tcpip\Parameters
     * to FQDN. If a pod does not have FQDN, this has no effect. Default to false.
     *
     * @return static
     */
    public function setIsSetHostnameAsFQDN(bool $setHostnameAsFQDN): static
    {
        $this->spec->setIsSetHostnameAsFQDN($setHostnameAsFQDN);

        return $this;
    }

    /**
     * Share a single process namespace between all of the containers in a pod. When this is set containers
     * will be able to view and signal processes from other containers in the same pod, and the first
     * process in each container will not be assigned PID 1. HostPID and ShareProcessNamespace cannot both
     * be set. Optional: Default to false.
     */
    public function isShareProcessNamespace(): bool|null
    {
        return $this->spec->isShareProcessNamespace();
    }

    /**
     * Share a single process namespace between all of the containers in a pod. When this is set containers
     * will be able to view and signal processes from other containers in the same pod, and the first
     * process in each container will not be assigned PID 1. HostPID and ShareProcessNamespace cannot both
     * be set. Optional: Default to false.
     *
     * @return static
     */
    public function setIsShareProcessNamespace(bool $shareProcessNamespace): static
    {
        $this->spec->setIsShareProcessNamespace($shareProcessNamespace);

        return $this;
    }

    /**
     * If specified, the fully qualified Pod hostname will be "<hostname>.<subdomain>.<pod
     * namespace>.svc.<cluster domain>". If not specified, the pod will not have a domainname at all.
     */
    public function getSubdomain(): string|null
    {
        return $this->spec->getSubdomain();
    }

    /**
     * If specified, the fully qualified Pod hostname will be "<hostname>.<subdomain>.<pod
     * namespace>.svc.<cluster domain>". If not specified, the pod will not have a domainname at all.
     *
     * @return static
     */
    public function setSubdomain(string $subdomain): static
    {
        $this->spec->setSubdomain($subdomain);

        return $this;
    }

    /**
     * Optional duration in seconds the pod needs to terminate gracefully. May be decreased in delete
     * request. Value must be non-negative integer. The value zero indicates stop immediately via the kill
     * signal (no opportunity to shut down). If this value is nil, the default grace period will be used
     * instead. The grace period is the duration in seconds after the processes running in the pod are sent
     * a termination signal and the time when the processes are forcibly halted with a kill signal. Set
     * this value longer than the expected cleanup time for your process. Defaults to 30 seconds.
     */
    public function getTerminationGracePeriodSeconds(): int|null
    {
        return $this->spec->getTerminationGracePeriodSeconds();
    }

    /**
     * Optional duration in seconds the pod needs to terminate gracefully. May be decreased in delete
     * request. Value must be non-negative integer. The value zero indicates stop immediately via the kill
     * signal (no opportunity to shut down). If this value is nil, the default grace period will be used
     * instead. The grace period is the duration in seconds after the processes running in the pod are sent
     * a termination signal and the time when the processes are forcibly halted with a kill signal. Set
     * this value longer than the expected cleanup time for your process. Defaults to 30 seconds.
     *
     * @return static
     */
    public function setTerminationGracePeriodSeconds(int $terminationGracePeriodSeconds): static
    {
        $this->spec->setTerminationGracePeriodSeconds($terminationGracePeriodSeconds);

        return $this;
    }

    /**
     * If specified, the pod's tolerations.
     *
     * @return iterable|Toleration[]
     */
    public function getTolerations(): iterable|null
    {
        return $this->spec->getTolerations();
    }

    /**
     * If specified, the pod's tolerations.
     *
     * @return static
     */
    public function setTolerations(iterable $tolerations): static
    {
        $this->spec->setTolerations($tolerations);

        return $this;
    }

    /** @return static */
    public function addTolerations(Toleration $toleration): static
    {
        $this->spec->addTolerations($toleration);

        return $this;
    }

    /**
     * TopologySpreadConstraints describes how a group of pods ought to spread across topology domains.
     * Scheduler will schedule pods in a way which abides by the constraints. All topologySpreadConstraints
     * are ANDed.
     *
     * @return iterable|TopologySpreadConstraint[]
     */
    public function getTopologySpreadConstraints(): iterable|null
    {
        return $this->spec->getTopologySpreadConstraints();
    }

    /**
     * TopologySpreadConstraints describes how a group of pods ought to spread across topology domains.
     * Scheduler will schedule pods in a way which abides by the constraints. All topologySpreadConstraints
     * are ANDed.
     *
     * @return static
     */
    public function setTopologySpreadConstraints(iterable $topologySpreadConstraints): static
    {
        $this->spec->setTopologySpreadConstraints($topologySpreadConstraints);

        return $this;
    }

    /** @return static */
    public function addTopologySpreadConstraints(TopologySpreadConstraint $topologySpreadConstraint): static
    {
        $this->spec->addTopologySpreadConstraints($topologySpreadConstraint);

        return $this;
    }

    /**
     * List of volumes that can be mounted by containers belonging to the pod. More info:
     * https://kubernetes.io/docs/concepts/storage/volumes
     *
     * @return iterable|Volume[]
     */
    public function getVolumes(): iterable|null
    {
        return $this->spec->getVolumes();
    }

    /**
     * List of volumes that can be mounted by containers belonging to the pod. More info:
     * https://kubernetes.io/docs/concepts/storage/volumes
     *
     * @return static
     */
    public function setVolumes(iterable $volumes): static
    {
        $this->spec->setVolumes($volumes);

        return $this;
    }

    /** @return static */
    public function addVolumes(Volume $volume): static
    {
        $this->spec->addVolumes($volume);

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
     * Specification of the desired behavior of the pod. More info:
     * https://git.k8s.io/community/contributors/devel/sig-architecture/api-conventions.md#spec-and-status
     */
    public function getSpec(): PodSpec
    {
        return $this->spec;
    }

    /**
     * Specification of the desired behavior of the pod. More info:
     * https://git.k8s.io/community/contributors/devel/sig-architecture/api-conventions.md#spec-and-status
     *
     * @return static
     */
    public function setSpec(PodSpec $spec): static
    {
        $this->spec = $spec;

        return $this;
    }

    /**
     * Most recently observed status of the pod. This data may not be up to date. Populated by the system.
     * Read-only. More info:
     * https://git.k8s.io/community/contributors/devel/sig-architecture/api-conventions.md#spec-and-status
     */
    public function getStatus(): PodStatus|null
    {
        return $this->status;
    }
}
