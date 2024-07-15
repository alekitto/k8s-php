<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Batch\v1;

use Kcs\K8s\Api\Model\Api\Core\v1\PodTemplateSpec;
use Kcs\K8s\Api\Model\ApiMachinery\Apis\Meta\v1\LabelSelector;
use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;

/**
 * JobSpec describes how the job execution will look like.
 */
class JobSpec
{
    #[Kubernetes\Attribute('activeDeadlineSeconds')]
    protected int|null $activeDeadlineSeconds = null;

    #[Kubernetes\Attribute('backoffLimit')]
    protected int|null $backoffLimit = null;

    #[Kubernetes\Attribute('backoffLimitPerIndex')]
    protected int|null $backoffLimitPerIndex = null;

    #[Kubernetes\Attribute('completionMode')]
    protected string|null $completionMode = null;

    #[Kubernetes\Attribute('completions')]
    protected int|null $completions = null;

    #[Kubernetes\Attribute('managedBy')]
    protected string|null $managedBy = null;

    #[Kubernetes\Attribute('manualSelector')]
    protected bool|null $manualSelector = null;

    #[Kubernetes\Attribute('maxFailedIndexes')]
    protected int|null $maxFailedIndexes = null;

    #[Kubernetes\Attribute('parallelism')]
    protected int|null $parallelism = null;

    #[Kubernetes\Attribute('podFailurePolicy', type: AttributeType::Model, model: PodFailurePolicy::class)]
    protected PodFailurePolicy|null $podFailurePolicy = null;

    #[Kubernetes\Attribute('podReplacementPolicy')]
    protected string|null $podReplacementPolicy = null;

    #[Kubernetes\Attribute('selector', type: AttributeType::Model, model: LabelSelector::class)]
    protected LabelSelector|null $selector = null;

    #[Kubernetes\Attribute('successPolicy', type: AttributeType::Model, model: SuccessPolicy::class)]
    protected SuccessPolicy|null $successPolicy = null;

    #[Kubernetes\Attribute('suspend')]
    protected bool|null $suspend = null;

    #[Kubernetes\Attribute('template', type: AttributeType::Model, model: PodTemplateSpec::class, required: true)]
    protected PodTemplateSpec $template;

    #[Kubernetes\Attribute('ttlSecondsAfterFinished')]
    protected int|null $ttlSecondsAfterFinished = null;

    public function __construct(PodTemplateSpec $template)
    {
        $this->template = $template;
    }

    /**
     * Specifies the duration in seconds relative to the startTime that the job may be continuously active
     * before the system tries to terminate it; value must be positive integer. If a Job is suspended (at
     * creation or through an update), this timer will effectively be stopped and reset when the Job is
     * resumed again.
     */
    public function getActiveDeadlineSeconds(): int|null
    {
        return $this->activeDeadlineSeconds;
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
        $this->activeDeadlineSeconds = $activeDeadlineSeconds;

        return $this;
    }

    /**
     * Specifies the number of retries before marking this job failed. Defaults to 6
     */
    public function getBackoffLimit(): int|null
    {
        return $this->backoffLimit;
    }

    /**
     * Specifies the number of retries before marking this job failed. Defaults to 6
     *
     * @return static
     */
    public function setBackoffLimit(int $backoffLimit): static
    {
        $this->backoffLimit = $backoffLimit;

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
        return $this->backoffLimitPerIndex;
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
        $this->backoffLimitPerIndex = $backoffLimitPerIndex;

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
        return $this->completionMode;
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
        $this->completionMode = $completionMode;

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
        return $this->completions;
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
        $this->completions = $completions;

        return $this;
    }

    /**
     * ManagedBy field indicates the controller that manages a Job. The k8s Job controller reconciles jobs
     * which don't have this field at all or the field value is the reserved string
     * `kubernetes.io/job-controller`, but skips reconciling Jobs with a custom value for this field. The
     * value must be a valid domain-prefixed path (e.g. acme.io/foo) - all characters before the first "/"
     * must be a valid subdomain as defined by RFC 1123. All characters trailing the first "/" must be
     * valid HTTP Path characters as defined by RFC 3986. The value cannot exceed 63 characters. This field
     * is immutable.
     *
     * This field is alpha-level. The job controller accepts setting the field when the feature gate
     * JobManagedBy is enabled (disabled by default).
     */
    public function getManagedBy(): string|null
    {
        return $this->managedBy;
    }

    /**
     * ManagedBy field indicates the controller that manages a Job. The k8s Job controller reconciles jobs
     * which don't have this field at all or the field value is the reserved string
     * `kubernetes.io/job-controller`, but skips reconciling Jobs with a custom value for this field. The
     * value must be a valid domain-prefixed path (e.g. acme.io/foo) - all characters before the first "/"
     * must be a valid subdomain as defined by RFC 1123. All characters trailing the first "/" must be
     * valid HTTP Path characters as defined by RFC 3986. The value cannot exceed 63 characters. This field
     * is immutable.
     *
     * This field is alpha-level. The job controller accepts setting the field when the feature gate
     * JobManagedBy is enabled (disabled by default).
     *
     * @return static
     */
    public function setManagedBy(string $managedBy): static
    {
        $this->managedBy = $managedBy;

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
        return $this->manualSelector;
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
        $this->manualSelector = $manualSelector;

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
        return $this->maxFailedIndexes;
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
        $this->maxFailedIndexes = $maxFailedIndexes;

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
        return $this->parallelism;
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
        $this->parallelism = $parallelism;

        return $this;
    }

    /**
     * Specifies the policy of handling failed pods. In particular, it allows to specify the set of actions
     * and conditions which need to be satisfied to take the associated action. If empty, the default
     * behaviour applies - the counter of failed pods, represented by the jobs's .status.failed field, is
     * incremented and it is checked against the backoffLimit. This field cannot be used in combination
     * with restartPolicy=OnFailure.
     */
    public function getPodFailurePolicy(): PodFailurePolicy|null
    {
        return $this->podFailurePolicy;
    }

    /**
     * Specifies the policy of handling failed pods. In particular, it allows to specify the set of actions
     * and conditions which need to be satisfied to take the associated action. If empty, the default
     * behaviour applies - the counter of failed pods, represented by the jobs's .status.failed field, is
     * incremented and it is checked against the backoffLimit. This field cannot be used in combination
     * with restartPolicy=OnFailure.
     *
     * @return static
     */
    public function setPodFailurePolicy(PodFailurePolicy $podFailurePolicy): static
    {
        $this->podFailurePolicy = $podFailurePolicy;

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
        return $this->podReplacementPolicy;
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
        $this->podReplacementPolicy = $podReplacementPolicy;

        return $this;
    }

    /**
     * A label query over pods that should match the pod count. Normally, the system sets this field for
     * you. More info:
     * https://kubernetes.io/docs/concepts/overview/working-with-objects/labels/#label-selectors
     */
    public function getSelector(): LabelSelector|null
    {
        return $this->selector;
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
        $this->selector = $selector;

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
        return $this->successPolicy;
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
        $this->successPolicy = $successPolicy;

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
        return $this->suspend;
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
        $this->suspend = $suspend;

        return $this;
    }

    /**
     * Describes the pod that will be created when executing a job. The only allowed
     * template.spec.restartPolicy values are "Never" or "OnFailure". More info:
     * https://kubernetes.io/docs/concepts/workloads/controllers/jobs-run-to-completion/
     */
    public function getTemplate(): PodTemplateSpec
    {
        return $this->template;
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
        $this->template = $template;

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
        return $this->ttlSecondsAfterFinished;
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
        $this->ttlSecondsAfterFinished = $ttlSecondsAfterFinished;

        return $this;
    }
}
