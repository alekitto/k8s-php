<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Apps\v1;

use DateTimeInterface;
use Kcs\K8s\Api\Model\Api\Core\v1\PersistentVolumeClaim;
use Kcs\K8s\Api\Model\Api\Core\v1\PodTemplateSpec;
use Kcs\K8s\Api\Model\ApiMachinery\Apis\Meta\v1\LabelSelector;
use Kcs\K8s\Api\Model\ApiMachinery\Apis\Meta\v1\ManagedFieldsEntry;
use Kcs\K8s\Api\Model\ApiMachinery\Apis\Meta\v1\ObjectMeta;
use Kcs\K8s\Api\Model\ApiMachinery\Apis\Meta\v1\OwnerReference;
use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;

/**
 * StatefulSet represents a set of pods with consistent identities. Identities are defined as:
 *   - Network: A single stable DNS and hostname.
 *   - Storage: As many VolumeClaims as requested.
 *
 * The StatefulSet guarantees that a given network identity will always map to the same storage
 * identity.
 */
#[Kubernetes\Kind('StatefulSet', group: 'apps', version: 'v1')]
#[Kubernetes\Operation('get', path: '/apis/apps/v1/namespaces/{namespace}/statefulsets/{name}', response: 'self')]
#[Kubernetes\Operation('get-status', path: '/apis/apps/v1/namespaces/{namespace}/statefulsets/{name}/status', response: 'self')]
#[Kubernetes\Operation('post', path: '/apis/apps/v1/namespaces/{namespace}/statefulsets', body: 'model', response: 'self')]
#[Kubernetes\Operation(
    'delete',
    path: '/apis/apps/v1/namespaces/{namespace}/statefulsets/{name}',
    response: 'Kcs\K8s\Api\Model\ApiMachinery\Apis\Meta\v1\Status',
)]
#[Kubernetes\Operation(
    'watch',
    path: '/apis/apps/v1/namespaces/{namespace}/statefulsets',
    response: 'Kcs\K8s\Api\Model\ApiMachinery\Apis\Meta\v1\WatchEvent',
)]
#[Kubernetes\Operation('put', path: '/apis/apps/v1/namespaces/{namespace}/statefulsets/{name}', body: 'model', response: 'self')]
#[Kubernetes\Operation('put-status', path: '/apis/apps/v1/namespaces/{namespace}/statefulsets/{name}/status', body: 'model', response: 'self')]
#[Kubernetes\Operation(
    'deletecollection-all',
    path: '/apis/apps/v1/namespaces/{namespace}/statefulsets',
    response: 'Kcs\K8s\Api\Model\ApiMachinery\Apis\Meta\v1\Status',
)]
#[Kubernetes\Operation('watch-all', path: '/apis/apps/v1/statefulsets', response: 'Kcs\K8s\Api\Model\ApiMachinery\Apis\Meta\v1\WatchEvent')]
#[Kubernetes\Operation('patch', path: '/apis/apps/v1/namespaces/{namespace}/statefulsets/{name}', body: 'patch', response: 'self')]
#[Kubernetes\Operation('patch-status', path: '/apis/apps/v1/namespaces/{namespace}/statefulsets/{name}/status', body: 'patch', response: 'self')]
#[Kubernetes\Operation(
    'list',
    path: '/apis/apps/v1/namespaces/{namespace}/statefulsets',
    response: 'Kcs\K8s\Api\Model\Api\Apps\v1\StatefulSetList',
)]
#[Kubernetes\Operation('list-all', path: '/apis/apps/v1/statefulsets', response: 'Kcs\K8s\Api\Model\Api\Apps\v1\StatefulSetList')]
class StatefulSet
{
    #[Kubernetes\Attribute('apiVersion')]
    protected string $apiVersion = 'apps/v1';

    #[Kubernetes\Attribute('kind')]
    protected string $kind = 'StatefulSet';

    #[Kubernetes\Attribute('metadata', type: AttributeType::Model, model: ObjectMeta::class)]
    protected ObjectMeta $metadata;

    #[Kubernetes\Attribute('spec', type: AttributeType::Model, model: StatefulSetSpec::class)]
    protected StatefulSetSpec $spec;

    #[Kubernetes\Attribute('status', type: AttributeType::Model, model: StatefulSetStatus::class)]
    protected StatefulSetStatus|null $status = null;

    public function __construct(
        string|null $name,
        LabelSelector $selector,
        string $serviceName,
        PodTemplateSpec $template,
    ) {
        $this->metadata = new ObjectMeta($name);
        $this->spec = new StatefulSetSpec($selector, $serviceName, $template);
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
     * Minimum number of seconds for which a newly created pod should be ready without any of its container
     * crashing for it to be considered available. Defaults to 0 (pod will be considered available as soon
     * as it is ready)
     */
    public function getMinReadySeconds(): int|null
    {
        return $this->spec->getMinReadySeconds();
    }

    /**
     * Minimum number of seconds for which a newly created pod should be ready without any of its container
     * crashing for it to be considered available. Defaults to 0 (pod will be considered available as soon
     * as it is ready)
     *
     * @return static
     */
    public function setMinReadySeconds(int $minReadySeconds): static
    {
        $this->spec->setMinReadySeconds($minReadySeconds);

        return $this;
    }

    /**
     * ordinals controls the numbering of replica indices in a StatefulSet. The default ordinals behavior
     * assigns a "0" index to the first replica and increments the index by one for each additional replica
     * requested. Using the ordinals field requires the StatefulSetStartOrdinal feature gate to be enabled,
     * which is beta.
     */
    public function getOrdinals(): StatefulSetOrdinals|null
    {
        return $this->spec->getOrdinals();
    }

    /**
     * ordinals controls the numbering of replica indices in a StatefulSet. The default ordinals behavior
     * assigns a "0" index to the first replica and increments the index by one for each additional replica
     * requested. Using the ordinals field requires the StatefulSetStartOrdinal feature gate to be enabled,
     * which is beta.
     *
     * @return static
     */
    public function setOrdinals(StatefulSetOrdinals $ordinals): static
    {
        $this->spec->setOrdinals($ordinals);

        return $this;
    }

    /**
     * persistentVolumeClaimRetentionPolicy describes the lifecycle of persistent volume claims created
     * from volumeClaimTemplates. By default, all persistent volume claims are created as needed and
     * retained until manually deleted. This policy allows the lifecycle to be altered, for example by
     * deleting persistent volume claims when their stateful set is deleted, or when their pod is scaled
     * down. This requires the StatefulSetAutoDeletePVC feature gate to be enabled, which is beta.
     */
    public function getPersistentVolumeClaimRetentionPolicy(): StatefulSetPersistentVolumeClaimRetentionPolicy|null
    {
        return $this->spec->getPersistentVolumeClaimRetentionPolicy();
    }

    /**
     * persistentVolumeClaimRetentionPolicy describes the lifecycle of persistent volume claims created
     * from volumeClaimTemplates. By default, all persistent volume claims are created as needed and
     * retained until manually deleted. This policy allows the lifecycle to be altered, for example by
     * deleting persistent volume claims when their stateful set is deleted, or when their pod is scaled
     * down. This requires the StatefulSetAutoDeletePVC feature gate to be enabled, which is beta.
     *
     * @return static
     */
    public function setPersistentVolumeClaimRetentionPolicy(
        StatefulSetPersistentVolumeClaimRetentionPolicy $persistentVolumeClaimRetentionPolicy,
    ): static {
        $this->spec->setPersistentVolumeClaimRetentionPolicy($persistentVolumeClaimRetentionPolicy);

        return $this;
    }

    /**
     * podManagementPolicy controls how pods are created during initial scale up, when replacing pods on
     * nodes, or when scaling down. The default policy is `OrderedReady`, where pods are created in
     * increasing order (pod-0, then pod-1, etc) and the controller will wait until each pod is ready
     * before continuing. When scaling down, the pods are removed in the opposite order. The alternative
     * policy is `Parallel` which will create pods in parallel to match the desired scale without waiting,
     * and on scale down will delete all pods at once.
     */
    public function getPodManagementPolicy(): string|null
    {
        return $this->spec->getPodManagementPolicy();
    }

    /**
     * podManagementPolicy controls how pods are created during initial scale up, when replacing pods on
     * nodes, or when scaling down. The default policy is `OrderedReady`, where pods are created in
     * increasing order (pod-0, then pod-1, etc) and the controller will wait until each pod is ready
     * before continuing. When scaling down, the pods are removed in the opposite order. The alternative
     * policy is `Parallel` which will create pods in parallel to match the desired scale without waiting,
     * and on scale down will delete all pods at once.
     *
     * @return static
     */
    public function setPodManagementPolicy(string $podManagementPolicy): static
    {
        $this->spec->setPodManagementPolicy($podManagementPolicy);

        return $this;
    }

    /**
     * replicas is the desired number of replicas of the given Template. These are replicas in the sense
     * that they are instantiations of the same Template, but individual replicas also have a consistent
     * identity. If unspecified, defaults to 1.
     */
    public function getReplicas(): int|null
    {
        return $this->spec->getReplicas();
    }

    /**
     * replicas is the desired number of replicas of the given Template. These are replicas in the sense
     * that they are instantiations of the same Template, but individual replicas also have a consistent
     * identity. If unspecified, defaults to 1.
     *
     * @return static
     */
    public function setReplicas(int $replicas): static
    {
        $this->spec->setReplicas($replicas);

        return $this;
    }

    /**
     * revisionHistoryLimit is the maximum number of revisions that will be maintained in the StatefulSet's
     * revision history. The revision history consists of all revisions not represented by a currently
     * applied StatefulSetSpec version. The default value is 10.
     */
    public function getRevisionHistoryLimit(): int|null
    {
        return $this->spec->getRevisionHistoryLimit();
    }

    /**
     * revisionHistoryLimit is the maximum number of revisions that will be maintained in the StatefulSet's
     * revision history. The revision history consists of all revisions not represented by a currently
     * applied StatefulSetSpec version. The default value is 10.
     *
     * @return static
     */
    public function setRevisionHistoryLimit(int $revisionHistoryLimit): static
    {
        $this->spec->setRevisionHistoryLimit($revisionHistoryLimit);

        return $this;
    }

    /**
     * selector is a label query over pods that should match the replica count. It must match the pod
     * template's labels. More info:
     * https://kubernetes.io/docs/concepts/overview/working-with-objects/labels/#label-selectors
     */
    public function getSelector(): LabelSelector
    {
        return $this->spec->getSelector();
    }

    /**
     * selector is a label query over pods that should match the replica count. It must match the pod
     * template's labels. More info:
     * https://kubernetes.io/docs/concepts/overview/working-with-objects/labels/#label-selectors
     *
     * @return static
     */
    public function setSelector(LabelSelector $selector): static
    {
        $this->spec->setSelector($selector);

        return $this;
    }

    /**
     * serviceName is the name of the service that governs this StatefulSet. This service must exist before
     * the StatefulSet, and is responsible for the network identity of the set. Pods get DNS/hostnames that
     * follow the pattern: pod-specific-string.serviceName.default.svc.cluster.local where
     * "pod-specific-string" is managed by the StatefulSet controller.
     */
    public function getServiceName(): string
    {
        return $this->spec->getServiceName();
    }

    /**
     * serviceName is the name of the service that governs this StatefulSet. This service must exist before
     * the StatefulSet, and is responsible for the network identity of the set. Pods get DNS/hostnames that
     * follow the pattern: pod-specific-string.serviceName.default.svc.cluster.local where
     * "pod-specific-string" is managed by the StatefulSet controller.
     *
     * @return static
     */
    public function setServiceName(string $serviceName): static
    {
        $this->spec->setServiceName($serviceName);

        return $this;
    }

    /**
     * template is the object that describes the pod that will be created if insufficient replicas are
     * detected. Each pod stamped out by the StatefulSet will fulfill this Template, but have a unique
     * identity from the rest of the StatefulSet. Each pod will be named with the format
     * <statefulsetname>-<podindex>. For example, a pod in a StatefulSet named "web" with index number "3"
     * would be named "web-3". The only allowed template.spec.restartPolicy value is "Always".
     */
    public function getTemplate(): PodTemplateSpec
    {
        return $this->spec->getTemplate();
    }

    /**
     * template is the object that describes the pod that will be created if insufficient replicas are
     * detected. Each pod stamped out by the StatefulSet will fulfill this Template, but have a unique
     * identity from the rest of the StatefulSet. Each pod will be named with the format
     * <statefulsetname>-<podindex>. For example, a pod in a StatefulSet named "web" with index number "3"
     * would be named "web-3". The only allowed template.spec.restartPolicy value is "Always".
     *
     * @return static
     */
    public function setTemplate(PodTemplateSpec $template): static
    {
        $this->spec->setTemplate($template);

        return $this;
    }

    /**
     * updateStrategy indicates the StatefulSetUpdateStrategy that will be employed to update Pods in the
     * StatefulSet when a revision is made to Template.
     */
    public function getUpdateStrategy(): StatefulSetUpdateStrategy|null
    {
        return $this->spec->getUpdateStrategy();
    }

    /**
     * updateStrategy indicates the StatefulSetUpdateStrategy that will be employed to update Pods in the
     * StatefulSet when a revision is made to Template.
     *
     * @return static
     */
    public function setUpdateStrategy(StatefulSetUpdateStrategy $updateStrategy): static
    {
        $this->spec->setUpdateStrategy($updateStrategy);

        return $this;
    }

    /**
     * volumeClaimTemplates is a list of claims that pods are allowed to reference. The StatefulSet
     * controller is responsible for mapping network identities to claims in a way that maintains the
     * identity of a pod. Every claim in this list must have at least one matching (by name) volumeMount in
     * one container in the template. A claim in this list takes precedence over any volumes in the
     * template, with the same name.
     *
     * @return iterable|PersistentVolumeClaim[]
     */
    public function getVolumeClaimTemplates(): iterable|null
    {
        return $this->spec->getVolumeClaimTemplates();
    }

    /**
     * volumeClaimTemplates is a list of claims that pods are allowed to reference. The StatefulSet
     * controller is responsible for mapping network identities to claims in a way that maintains the
     * identity of a pod. Every claim in this list must have at least one matching (by name) volumeMount in
     * one container in the template. A claim in this list takes precedence over any volumes in the
     * template, with the same name.
     *
     * @return static
     */
    public function setVolumeClaimTemplates(iterable $volumeClaimTemplates): static
    {
        $this->spec->setVolumeClaimTemplates($volumeClaimTemplates);

        return $this;
    }

    /** @return static */
    public function addVolumeClaimTemplates(PersistentVolumeClaim $volumeClaimTemplate): static
    {
        $this->spec->addVolumeClaimTemplates($volumeClaimTemplate);

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
     * Spec defines the desired identities of pods in this set.
     */
    public function getSpec(): StatefulSetSpec
    {
        return $this->spec;
    }

    /**
     * Spec defines the desired identities of pods in this set.
     *
     * @return static
     */
    public function setSpec(StatefulSetSpec $spec): static
    {
        $this->spec = $spec;

        return $this;
    }

    /**
     * Status is the current status of Pods in this StatefulSet. This data may be out of date by some
     * window of time.
     */
    public function getStatus(): StatefulSetStatus|null
    {
        return $this->status;
    }

    /**
     * Status is the current status of Pods in this StatefulSet. This data may be out of date by some
     * window of time.
     *
     * @return static
     */
    public function setStatus(StatefulSetStatus $status): static
    {
        $this->status = $status;

        return $this;
    }
}