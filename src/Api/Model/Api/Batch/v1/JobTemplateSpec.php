<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Batch\v1;

use DateTimeInterface;
use Kcs\K8s\Api\Model\Api\Core\v1\PodTemplateSpec;
use Kcs\K8s\Api\Model\ApiMachinery\Apis\Meta\v1\LabelSelector;
use Kcs\K8s\Api\Model\ApiMachinery\Apis\Meta\v1\ManagedFieldsEntry;
use Kcs\K8s\Api\Model\ApiMachinery\Apis\Meta\v1\ObjectMeta;
use Kcs\K8s\Api\Model\ApiMachinery\Apis\Meta\v1\OwnerReference;
use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;

/**
 * JobTemplateSpec describes the data a Job should have when created from a template
 */
class JobTemplateSpec
{
    #[Kubernetes\Attribute('metadata', type: AttributeType::Model, model: ObjectMeta::class)]
    protected ObjectMeta|null $metadata = null;

    #[Kubernetes\Attribute('spec', type: AttributeType::Model, model: JobSpec::class)]
    protected JobSpec|null $spec = null;

    public function __construct(string|null $name, PodTemplateSpec $template)
    {
        $this->metadata = new ObjectMeta($name);
        $this->spec = new JobSpec($template);
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
     * Specifies the duration in seconds relative to the startTime that the job may be continuously active
     * before the system tries to terminate it; value must be positive integer. If a Job is suspended (at
     * creation or through an update), this timer will effectively be stopped and reset when the Job is
     * resumed again.
     */
    public function getActiveDeadlineSeconds(): int|null
    {
        return $this->spec->getActiveDeadlineSeconds();
    }

    /**
     * Specifies the duration in seconds relative to the startTime that the job may be continuously active
     * before the system tries to terminate it; value must be positive integer. If a Job is suspended (at
     * creation or through an update), this timer will effectively be stopped and reset when the Job is
     * resumed again.
     *
     * @return static
     */
    public function setActiveDeadlineSeconds(int $activeDeadlineSeconds): static
    {
        $this->spec->setActiveDeadlineSeconds($activeDeadlineSeconds);

        return $this;
    }

    /**
     * Specifies the number of retries before marking this job failed. Defaults to 6
     */
    public function getBackoffLimit(): int|null
    {
        return $this->spec->getBackoffLimit();
    }

    /**
     * Specifies the number of retries before marking this job failed. Defaults to 6
     *
     * @return static
     */
    public function setBackoffLimit(int $backoffLimit): static
    {
        $this->spec->setBackoffLimit($backoffLimit);

        return $this;
    }

    /**
     * Specifies the limit for the number of retries within an index before marking this index as failed.
     * When enabled the number of failures per index is kept in the pod's
     * batch.kubernetes.io/job-index-failure-count annotation. It can only be set when Job's
     * completionMode=Indexed, and the Pod's restart policy is Never. The field is immutable. This field is
     * beta-level. It can be used when the `JobBackoffLimitPerIndex` feature gate is enabled (enabled by
     * default).
     */
    public function getBackoffLimitPerIndex(): int|null
    {
        return $this->spec->getBackoffLimitPerIndex();
    }

    /**
     * Specifies the limit for the number of retries within an index before marking this index as failed.
     * When enabled the number of failures per index is kept in the pod's
     * batch.kubernetes.io/job-index-failure-count annotation. It can only be set when Job's
     * completionMode=Indexed, and the Pod's restart policy is Never. The field is immutable. This field is
     * beta-level. It can be used when the `JobBackoffLimitPerIndex` feature gate is enabled (enabled by
     * default).
     *
     * @return static
     */
    public function setBackoffLimitPerIndex(int $backoffLimitPerIndex): static
    {
        $this->spec->setBackoffLimitPerIndex($backoffLimitPerIndex);

        return $this;
    }

    /**
     * completionMode specifies how Pod completions are tracked. It can be `NonIndexed` (default) or
     * `Indexed`.
     *
     * `NonIndexed` means that the Job is considered complete when there have been .spec.completions
     * successfully completed Pods. Each Pod completion is homologous to each other.
     *
     * `Indexed` means that the Pods of a Job get an associated completion index from 0 to
     * (.spec.completions - 1), available in the annotation batch.kubernetes.io/job-completion-index. The
     * Job is considered complete when there is one successfully completed Pod for each index. When value
     * is `Indexed`, .spec.completions must be specified and `.spec.parallelism` must be less than or equal
     * to 10^5. In addition, The Pod name takes the form `$(job-name)-$(index)-$(random-string)`, the Pod
     * hostname takes the form `$(job-name)-$(index)`.
     *
     * More completion modes can be added in the future. If the Job controller observes a mode that it
     * doesn't recognize, which is possible during upgrades due to version skew, the controller skips
     * updates for the Job.
     */
    public function getCompletionMode(): string|null
    {
        return $this->spec->getCompletionMode();
    }

    /**
     * completionMode specifies how Pod completions are tracked. It can be `NonIndexed` (default) or
     * `Indexed`.
     *
     * `NonIndexed` means that the Job is considered complete when there have been .spec.completions
     * successfully completed Pods. Each Pod completion is homologous to each other.
     *
     * `Indexed` means that the Pods of a Job get an associated completion index from 0 to
     * (.spec.completions - 1), available in the annotation batch.kubernetes.io/job-completion-index. The
     * Job is considered complete when there is one successfully completed Pod for each index. When value
     * is `Indexed`, .spec.completions must be specified and `.spec.parallelism` must be less than or equal
     * to 10^5. In addition, The Pod name takes the form `$(job-name)-$(index)-$(random-string)`, the Pod
     * hostname takes the form `$(job-name)-$(index)`.
     *
     * More completion modes can be added in the future. If the Job controller observes a mode that it
     * doesn't recognize, which is possible during upgrades due to version skew, the controller skips
     * updates for the Job.
     *
     * @return static
     */
    public function setCompletionMode(string $completionMode): static
    {
        $this->spec->setCompletionMode($completionMode);

        return $this;
    }

    /**
     * Specifies the desired number of successfully finished pods the job should be run with.  Setting to
     * null means that the success of any pod signals the success of all pods, and allows parallelism to
     * have any positive value.  Setting to 1 means that parallelism is limited to 1 and the success of
     * that pod signals the success of the job. More info:
     * https://kubernetes.io/docs/concepts/workloads/controllers/jobs-run-to-completion/
     */
    public function getCompletions(): int|null
    {
        return $this->spec->getCompletions();
    }

    /**
     * Specifies the desired number of successfully finished pods the job should be run with.  Setting to
     * null means that the success of any pod signals the success of all pods, and allows parallelism to
     * have any positive value.  Setting to 1 means that parallelism is limited to 1 and the success of
     * that pod signals the success of the job. More info:
     * https://kubernetes.io/docs/concepts/workloads/controllers/jobs-run-to-completion/
     *
     * @return static
     */
    public function setCompletions(int $completions): static
    {
        $this->spec->setCompletions($completions);

        return $this;
    }

    /**
     * ManagedBy field indicates the controller that manages a Job. The k8s Job controller reconciles jobs
     * which don't have this field at all or the field value is the reserved string
     * `kubernetes.io/job-controller`, but skips reconciling Jobs with a custom value for this field. The
     * value must be a valid domain-prefixed path (e.g. acme.io/foo) - all characters before the first "/"
     * must be a valid subdomain as defined by RFC 1123. All characters trailing the first "/" must be
     * valid HTTP Path characters as defined by RFC 3986. The value cannot exceed 64 characters.
     *
     * This field is alpha-level. The job controller accepts setting the field when the feature gate
     * JobManagedBy is enabled (disabled by default).
     */
    public function getManagedBy(): string|null
    {
        return $this->spec->getManagedBy();
    }

    /**
     * ManagedBy field indicates the controller that manages a Job. The k8s Job controller reconciles jobs
     * which don't have this field at all or the field value is the reserved string
     * `kubernetes.io/job-controller`, but skips reconciling Jobs with a custom value for this field. The
     * value must be a valid domain-prefixed path (e.g. acme.io/foo) - all characters before the first "/"
     * must be a valid subdomain as defined by RFC 1123. All characters trailing the first "/" must be
     * valid HTTP Path characters as defined by RFC 3986. The value cannot exceed 64 characters.
     *
     * This field is alpha-level. The job controller accepts setting the field when the feature gate
     * JobManagedBy is enabled (disabled by default).
     *
     * @return static
     */
    public function setManagedBy(string $managedBy): static
    {
        $this->spec->setManagedBy($managedBy);

        return $this;
    }

    /**
     * manualSelector controls generation of pod labels and pod selectors. Leave `manualSelector` unset
     * unless you are certain what you are doing. When false or unset, the system pick labels unique to
     * this job and appends those labels to the pod template.  When true, the user is responsible for
     * picking unique labels and specifying the selector.  Failure to pick a unique label may cause this
     * and other jobs to not function correctly.  However, You may see `manualSelector=true` in jobs that
     * were created with the old `extensions/v1beta1` API. More info:
     * https://kubernetes.io/docs/concepts/workloads/controllers/jobs-run-to-completion/#specifying-your-own-pod-selector
     */
    public function isManualSelector(): bool|null
    {
        return $this->spec->isManualSelector();
    }

    /**
     * manualSelector controls generation of pod labels and pod selectors. Leave `manualSelector` unset
     * unless you are certain what you are doing. When false or unset, the system pick labels unique to
     * this job and appends those labels to the pod template.  When true, the user is responsible for
     * picking unique labels and specifying the selector.  Failure to pick a unique label may cause this
     * and other jobs to not function correctly.  However, You may see `manualSelector=true` in jobs that
     * were created with the old `extensions/v1beta1` API. More info:
     * https://kubernetes.io/docs/concepts/workloads/controllers/jobs-run-to-completion/#specifying-your-own-pod-selector
     *
     * @return static
     */
    public function setIsManualSelector(bool $manualSelector): static
    {
        $this->spec->setIsManualSelector($manualSelector);

        return $this;
    }

    /**
     * Specifies the maximal number of failed indexes before marking the Job as failed, when
     * backoffLimitPerIndex is set. Once the number of failed indexes exceeds this number the entire Job is
     * marked as Failed and its execution is terminated. When left as null the job continues execution of
     * all of its indexes and is marked with the `Complete` Job condition. It can only be specified when
     * backoffLimitPerIndex is set. It can be null or up to completions. It is required and must be less
     * than or equal to 10^4 when is completions greater than 10^5. This field is beta-level. It can be
     * used when the `JobBackoffLimitPerIndex` feature gate is enabled (enabled by default).
     */
    public function getMaxFailedIndexes(): int|null
    {
        return $this->spec->getMaxFailedIndexes();
    }

    /**
     * Specifies the maximal number of failed indexes before marking the Job as failed, when
     * backoffLimitPerIndex is set. Once the number of failed indexes exceeds this number the entire Job is
     * marked as Failed and its execution is terminated. When left as null the job continues execution of
     * all of its indexes and is marked with the `Complete` Job condition. It can only be specified when
     * backoffLimitPerIndex is set. It can be null or up to completions. It is required and must be less
     * than or equal to 10^4 when is completions greater than 10^5. This field is beta-level. It can be
     * used when the `JobBackoffLimitPerIndex` feature gate is enabled (enabled by default).
     *
     * @return static
     */
    public function setMaxFailedIndexes(int $maxFailedIndexes): static
    {
        $this->spec->setMaxFailedIndexes($maxFailedIndexes);

        return $this;
    }

    /**
     * Specifies the maximum desired number of pods the job should run at any given time. The actual number
     * of pods running in steady state will be less than this number when ((.spec.completions -
     * .status.successful) < .spec.parallelism), i.e. when the work left to do is less than max
     * parallelism. More info:
     * https://kubernetes.io/docs/concepts/workloads/controllers/jobs-run-to-completion/
     */
    public function getParallelism(): int|null
    {
        return $this->spec->getParallelism();
    }

    /**
     * Specifies the maximum desired number of pods the job should run at any given time. The actual number
     * of pods running in steady state will be less than this number when ((.spec.completions -
     * .status.successful) < .spec.parallelism), i.e. when the work left to do is less than max
     * parallelism. More info:
     * https://kubernetes.io/docs/concepts/workloads/controllers/jobs-run-to-completion/
     *
     * @return static
     */
    public function setParallelism(int $parallelism): static
    {
        $this->spec->setParallelism($parallelism);

        return $this;
    }

    /**
     * Specifies the policy of handling failed pods. In particular, it allows to specify the set of actions
     * and conditions which need to be satisfied to take the associated action. If empty, the default
     * behaviour applies - the counter of failed pods, represented by the jobs's .status.failed field, is
     * incremented and it is checked against the backoffLimit. This field cannot be used in combination
     * with restartPolicy=OnFailure.
     *
     * This field is beta-level. It can be used when the `JobPodFailurePolicy` feature gate is enabled
     * (enabled by default).
     */
    public function getPodFailurePolicy(): PodFailurePolicy|null
    {
        return $this->spec->getPodFailurePolicy();
    }

    /**
     * Specifies the policy of handling failed pods. In particular, it allows to specify the set of actions
     * and conditions which need to be satisfied to take the associated action. If empty, the default
     * behaviour applies - the counter of failed pods, represented by the jobs's .status.failed field, is
     * incremented and it is checked against the backoffLimit. This field cannot be used in combination
     * with restartPolicy=OnFailure.
     *
     * This field is beta-level. It can be used when the `JobPodFailurePolicy` feature gate is enabled
     * (enabled by default).
     *
     * @return static
     */
    public function setPodFailurePolicy(PodFailurePolicy $podFailurePolicy): static
    {
        $this->spec->setPodFailurePolicy($podFailurePolicy);

        return $this;
    }

    /**
     * podReplacementPolicy specifies when to create replacement Pods. Possible values are: -
     * TerminatingOrFailed means that we recreate pods
     *   when they are terminating (has a metadata.deletionTimestamp) or failed.
     * - Failed means to wait until a previously created Pod is fully terminated (has phase
     *   Failed or Succeeded) before creating a replacement Pod.
     *
     * When using podFailurePolicy, Failed is the the only allowed value. TerminatingOrFailed and Failed
     * are allowed values when podFailurePolicy is not in use. This is an beta field. To use this, enable
     * the JobPodReplacementPolicy feature toggle. This is on by default.
     */
    public function getPodReplacementPolicy(): string|null
    {
        return $this->spec->getPodReplacementPolicy();
    }

    /**
     * podReplacementPolicy specifies when to create replacement Pods. Possible values are: -
     * TerminatingOrFailed means that we recreate pods
     *   when they are terminating (has a metadata.deletionTimestamp) or failed.
     * - Failed means to wait until a previously created Pod is fully terminated (has phase
     *   Failed or Succeeded) before creating a replacement Pod.
     *
     * When using podFailurePolicy, Failed is the the only allowed value. TerminatingOrFailed and Failed
     * are allowed values when podFailurePolicy is not in use. This is an beta field. To use this, enable
     * the JobPodReplacementPolicy feature toggle. This is on by default.
     *
     * @return static
     */
    public function setPodReplacementPolicy(string $podReplacementPolicy): static
    {
        $this->spec->setPodReplacementPolicy($podReplacementPolicy);

        return $this;
    }

    /**
     * A label query over pods that should match the pod count. Normally, the system sets this field for
     * you. More info:
     * https://kubernetes.io/docs/concepts/overview/working-with-objects/labels/#label-selectors
     */
    public function getSelector(): LabelSelector|null
    {
        return $this->spec->getSelector();
    }

    /**
     * A label query over pods that should match the pod count. Normally, the system sets this field for
     * you. More info:
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
     * successPolicy specifies the policy when the Job can be declared as succeeded. If empty, the default
     * behavior applies - the Job is declared as succeeded only when the number of succeeded pods equals to
     * the completions. When the field is specified, it must be immutable and works only for the Indexed
     * Jobs. Once the Job meets the SuccessPolicy, the lingering pods are terminated.
     *
     * This field  is alpha-level. To use this field, you must enable the `JobSuccessPolicy` feature gate
     * (disabled by default).
     */
    public function getSuccessPolicy(): SuccessPolicy|null
    {
        return $this->spec->getSuccessPolicy();
    }

    /**
     * successPolicy specifies the policy when the Job can be declared as succeeded. If empty, the default
     * behavior applies - the Job is declared as succeeded only when the number of succeeded pods equals to
     * the completions. When the field is specified, it must be immutable and works only for the Indexed
     * Jobs. Once the Job meets the SuccessPolicy, the lingering pods are terminated.
     *
     * This field  is alpha-level. To use this field, you must enable the `JobSuccessPolicy` feature gate
     * (disabled by default).
     *
     * @return static
     */
    public function setSuccessPolicy(SuccessPolicy $successPolicy): static
    {
        $this->spec->setSuccessPolicy($successPolicy);

        return $this;
    }

    /**
     * suspend specifies whether the Job controller should create Pods or not. If a Job is created with
     * suspend set to true, no Pods are created by the Job controller. If a Job is suspended after creation
     * (i.e. the flag goes from false to true), the Job controller will delete all active Pods associated
     * with this Job. Users must design their workload to gracefully handle this. Suspending a Job will
     * reset the StartTime field of the Job, effectively resetting the ActiveDeadlineSeconds timer too.
     * Defaults to false.
     */
    public function isSuspend(): bool|null
    {
        return $this->spec->isSuspend();
    }

    /**
     * suspend specifies whether the Job controller should create Pods or not. If a Job is created with
     * suspend set to true, no Pods are created by the Job controller. If a Job is suspended after creation
     * (i.e. the flag goes from false to true), the Job controller will delete all active Pods associated
     * with this Job. Users must design their workload to gracefully handle this. Suspending a Job will
     * reset the StartTime field of the Job, effectively resetting the ActiveDeadlineSeconds timer too.
     * Defaults to false.
     *
     * @return static
     */
    public function setIsSuspend(bool $suspend): static
    {
        $this->spec->setIsSuspend($suspend);

        return $this;
    }

    /**
     * Describes the pod that will be created when executing a job. The only allowed
     * template.spec.restartPolicy values are "Never" or "OnFailure". More info:
     * https://kubernetes.io/docs/concepts/workloads/controllers/jobs-run-to-completion/
     */
    public function getTemplate(): PodTemplateSpec
    {
        return $this->spec->getTemplate();
    }

    /**
     * Describes the pod that will be created when executing a job. The only allowed
     * template.spec.restartPolicy values are "Never" or "OnFailure". More info:
     * https://kubernetes.io/docs/concepts/workloads/controllers/jobs-run-to-completion/
     *
     * @return static
     */
    public function setTemplate(PodTemplateSpec $template): static
    {
        $this->spec->setTemplate($template);

        return $this;
    }

    /**
     * ttlSecondsAfterFinished limits the lifetime of a Job that has finished execution (either Complete or
     * Failed). If this field is set, ttlSecondsAfterFinished after the Job finishes, it is eligible to be
     * automatically deleted. When the Job is being deleted, its lifecycle guarantees (e.g. finalizers)
     * will be honored. If this field is unset, the Job won't be automatically deleted. If this field is
     * set to zero, the Job becomes eligible to be deleted immediately after it finishes.
     */
    public function getTtlSecondsAfterFinished(): int|null
    {
        return $this->spec->getTtlSecondsAfterFinished();
    }

    /**
     * ttlSecondsAfterFinished limits the lifetime of a Job that has finished execution (either Complete or
     * Failed). If this field is set, ttlSecondsAfterFinished after the Job finishes, it is eligible to be
     * automatically deleted. When the Job is being deleted, its lifecycle guarantees (e.g. finalizers)
     * will be honored. If this field is unset, the Job won't be automatically deleted. If this field is
     * set to zero, the Job becomes eligible to be deleted immediately after it finishes.
     *
     * @return static
     */
    public function setTtlSecondsAfterFinished(int $ttlSecondsAfterFinished): static
    {
        $this->spec->setTtlSecondsAfterFinished($ttlSecondsAfterFinished);

        return $this;
    }

    /**
     * Standard object's metadata of the jobs created from this template. More info:
     * https://git.k8s.io/community/contributors/devel/sig-architecture/api-conventions.md#metadata
     */
    public function getMetadata(): ObjectMeta|null
    {
        return $this->metadata;
    }

    /**
     * Standard object's metadata of the jobs created from this template. More info:
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
     * Specification of the desired behavior of the job. More info:
     * https://git.k8s.io/community/contributors/devel/sig-architecture/api-conventions.md#spec-and-status
     */
    public function getSpec(): JobSpec|null
    {
        return $this->spec;
    }

    /**
     * Specification of the desired behavior of the job. More info:
     * https://git.k8s.io/community/contributors/devel/sig-architecture/api-conventions.md#spec-and-status
     *
     * @return static
     */
    public function setSpec(JobSpec $spec): static
    {
        $this->spec = $spec;

        return $this;
    }
}
