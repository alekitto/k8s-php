<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Batch\v1;

use DateTimeInterface;
use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;
use Kcs\K8s\Collection;

/**
 * JobStatus represents the current state of a Job.
 */
class JobStatus
{
    #[Kubernetes\Attribute('active')]
    protected int|null $active = null;

    #[Kubernetes\Attribute('completedIndexes')]
    protected string|null $completedIndexes = null;

    #[Kubernetes\Attribute('completionTime', type: AttributeType::DateTime)]
    protected DateTimeInterface|null $completionTime = null;

    /** @var iterable|JobCondition[]|null */
    #[Kubernetes\Attribute('conditions', type: AttributeType::Collection, model: JobCondition::class)]
    protected $conditions = null;

    #[Kubernetes\Attribute('failed')]
    protected int|null $failed = null;

    #[Kubernetes\Attribute('failedIndexes')]
    protected string|null $failedIndexes = null;

    #[Kubernetes\Attribute('ready')]
    protected int|null $ready = null;

    #[Kubernetes\Attribute('startTime', type: AttributeType::DateTime)]
    protected DateTimeInterface|null $startTime = null;

    #[Kubernetes\Attribute('succeeded')]
    protected int|null $succeeded = null;

    #[Kubernetes\Attribute('terminating')]
    protected int|null $terminating = null;

    #[Kubernetes\Attribute('uncountedTerminatedPods', type: AttributeType::Model, model: UncountedTerminatedPods::class)]
    protected UncountedTerminatedPods|null $uncountedTerminatedPods = null;

    /**
     * The number of pending and running pods which are not terminating (without a deletionTimestamp). The
     * value is zero for finished jobs.
     */
    public function getActive(): int|null
    {
        return $this->active;
    }

    /**
     * The number of pending and running pods which are not terminating (without a deletionTimestamp). The
     * value is zero for finished jobs.
     *
     * @return static
     */
    public function setActive(int $active): static
    {
        $this->active = $active;

        return $this;
    }

    /**
     * completedIndexes holds the completed indexes when .spec.completionMode = "Indexed" in a text format.
     * The indexes are represented as decimal integers separated by commas. The numbers are listed in
     * increasing order. Three or more consecutive numbers are compressed and represented by the first and
     * last element of the series, separated by a hyphen. For example, if the completed indexes are 1, 3,
     * 4, 5 and 7, they are represented as "1,3-5,7".
     */
    public function getCompletedIndexes(): string|null
    {
        return $this->completedIndexes;
    }

    /**
     * completedIndexes holds the completed indexes when .spec.completionMode = "Indexed" in a text format.
     * The indexes are represented as decimal integers separated by commas. The numbers are listed in
     * increasing order. Three or more consecutive numbers are compressed and represented by the first and
     * last element of the series, separated by a hyphen. For example, if the completed indexes are 1, 3,
     * 4, 5 and 7, they are represented as "1,3-5,7".
     *
     * @return static
     */
    public function setCompletedIndexes(string $completedIndexes): static
    {
        $this->completedIndexes = $completedIndexes;

        return $this;
    }

    /**
     * Represents time when the job was completed. It is not guaranteed to be set in happens-before order
     * across separate operations. It is represented in RFC3339 form and is in UTC. The completion time is
     * set when the job finishes successfully, and only then. The value cannot be updated or removed. The
     * value indicates the same or later point in time as the startTime field.
     */
    public function getCompletionTime(): DateTimeInterface|null
    {
        return $this->completionTime;
    }

    /**
     * Represents time when the job was completed. It is not guaranteed to be set in happens-before order
     * across separate operations. It is represented in RFC3339 form and is in UTC. The completion time is
     * set when the job finishes successfully, and only then. The value cannot be updated or removed. The
     * value indicates the same or later point in time as the startTime field.
     *
     * @return static
     */
    public function setCompletionTime(DateTimeInterface $completionTime): static
    {
        $this->completionTime = $completionTime;

        return $this;
    }

    /**
     * The latest available observations of an object's current state. When a Job fails, one of the
     * conditions will have type "Failed" and status true. When a Job is suspended, one of the conditions
     * will have type "Suspended" and status true; when the Job is resumed, the status of this condition
     * will become false. When a Job is completed, one of the conditions will have type "Complete" and
     * status true.
     *
     * A job is considered finished when it is in a terminal condition, either "Complete" or "Failed". A
     * Job cannot have both the "Complete" and "Failed" conditions. Additionally, it cannot be in the
     * "Complete" and "FailureTarget" conditions. The "Complete", "Failed" and "FailureTarget" conditions
     * cannot be disabled.
     *
     * More info: https://kubernetes.io/docs/concepts/workloads/controllers/jobs-run-to-completion/
     *
     * @return iterable|JobCondition[]
     */
    public function getConditions(): iterable|null
    {
        return $this->conditions;
    }

    /**
     * The latest available observations of an object's current state. When a Job fails, one of the
     * conditions will have type "Failed" and status true. When a Job is suspended, one of the conditions
     * will have type "Suspended" and status true; when the Job is resumed, the status of this condition
     * will become false. When a Job is completed, one of the conditions will have type "Complete" and
     * status true.
     *
     * A job is considered finished when it is in a terminal condition, either "Complete" or "Failed". A
     * Job cannot have both the "Complete" and "Failed" conditions. Additionally, it cannot be in the
     * "Complete" and "FailureTarget" conditions. The "Complete", "Failed" and "FailureTarget" conditions
     * cannot be disabled.
     *
     * More info: https://kubernetes.io/docs/concepts/workloads/controllers/jobs-run-to-completion/
     *
     * @return static
     */
    public function setConditions(iterable $conditions): static
    {
        $this->conditions = $conditions;

        return $this;
    }

    /** @return static */
    public function addConditions(JobCondition $condition): static
    {
        if (! $this->conditions) {
            $this->conditions = new Collection();
        }

        $this->conditions[] = $condition;

        return $this;
    }

    /**
     * The number of pods which reached phase Failed. The value increases monotonically.
     */
    public function getFailed(): int|null
    {
        return $this->failed;
    }

    /**
     * The number of pods which reached phase Failed. The value increases monotonically.
     *
     * @return static
     */
    public function setFailed(int $failed): static
    {
        $this->failed = $failed;

        return $this;
    }

    /**
     * FailedIndexes holds the failed indexes when spec.backoffLimitPerIndex is set. The indexes are
     * represented in the text format analogous as for the `completedIndexes` field, ie. they are kept as
     * decimal integers separated by commas. The numbers are listed in increasing order. Three or more
     * consecutive numbers are compressed and represented by the first and last element of the series,
     * separated by a hyphen. For example, if the failed indexes are 1, 3, 4, 5 and 7, they are represented
     * as "1,3-5,7". The set of failed indexes cannot overlap with the set of completed indexes.
     *
     * This field is beta-level. It can be used when the `JobBackoffLimitPerIndex` feature gate is enabled
     * (enabled by default).
     */
    public function getFailedIndexes(): string|null
    {
        return $this->failedIndexes;
    }

    /**
     * FailedIndexes holds the failed indexes when spec.backoffLimitPerIndex is set. The indexes are
     * represented in the text format analogous as for the `completedIndexes` field, ie. they are kept as
     * decimal integers separated by commas. The numbers are listed in increasing order. Three or more
     * consecutive numbers are compressed and represented by the first and last element of the series,
     * separated by a hyphen. For example, if the failed indexes are 1, 3, 4, 5 and 7, they are represented
     * as "1,3-5,7". The set of failed indexes cannot overlap with the set of completed indexes.
     *
     * This field is beta-level. It can be used when the `JobBackoffLimitPerIndex` feature gate is enabled
     * (enabled by default).
     *
     * @return static
     */
    public function setFailedIndexes(string $failedIndexes): static
    {
        $this->failedIndexes = $failedIndexes;

        return $this;
    }

    /**
     * The number of active pods which have a Ready condition and are not terminating (without a
     * deletionTimestamp).
     */
    public function getReady(): int|null
    {
        return $this->ready;
    }

    /**
     * The number of active pods which have a Ready condition and are not terminating (without a
     * deletionTimestamp).
     *
     * @return static
     */
    public function setReady(int $ready): static
    {
        $this->ready = $ready;

        return $this;
    }

    /**
     * Represents time when the job controller started processing a job. When a Job is created in the
     * suspended state, this field is not set until the first time it is resumed. This field is reset every
     * time a Job is resumed from suspension. It is represented in RFC3339 form and is in UTC.
     *
     * Once set, the field can only be removed when the job is suspended. The field cannot be modified
     * while the job is unsuspended or finished.
     */
    public function getStartTime(): DateTimeInterface|null
    {
        return $this->startTime;
    }

    /**
     * Represents time when the job controller started processing a job. When a Job is created in the
     * suspended state, this field is not set until the first time it is resumed. This field is reset every
     * time a Job is resumed from suspension. It is represented in RFC3339 form and is in UTC.
     *
     * Once set, the field can only be removed when the job is suspended. The field cannot be modified
     * while the job is unsuspended or finished.
     *
     * @return static
     */
    public function setStartTime(DateTimeInterface $startTime): static
    {
        $this->startTime = $startTime;

        return $this;
    }

    /**
     * The number of pods which reached phase Succeeded. The value increases monotonically for a given
     * spec. However, it may decrease in reaction to scale down of elastic indexed jobs.
     */
    public function getSucceeded(): int|null
    {
        return $this->succeeded;
    }

    /**
     * The number of pods which reached phase Succeeded. The value increases monotonically for a given
     * spec. However, it may decrease in reaction to scale down of elastic indexed jobs.
     *
     * @return static
     */
    public function setSucceeded(int $succeeded): static
    {
        $this->succeeded = $succeeded;

        return $this;
    }

    /**
     * The number of pods which are terminating (in phase Pending or Running and have a deletionTimestamp).
     *
     * This field is beta-level. The job controller populates the field when the feature gate
     * JobPodReplacementPolicy is enabled (enabled by default).
     */
    public function getTerminating(): int|null
    {
        return $this->terminating;
    }

    /**
     * The number of pods which are terminating (in phase Pending or Running and have a deletionTimestamp).
     *
     * This field is beta-level. The job controller populates the field when the feature gate
     * JobPodReplacementPolicy is enabled (enabled by default).
     *
     * @return static
     */
    public function setTerminating(int $terminating): static
    {
        $this->terminating = $terminating;

        return $this;
    }

    /**
     * uncountedTerminatedPods holds the UIDs of Pods that have terminated but the job controller hasn't
     * yet accounted for in the status counters.
     *
     * The job controller creates pods with a finalizer. When a pod terminates (succeeded or failed), the
     * controller does three steps to account for it in the job status:
     *
     * 1. Add the pod UID to the arrays in this field. 2. Remove the pod finalizer. 3. Remove the pod UID
     * from the arrays while increasing the corresponding
     *     counter.
     *
     * Old jobs might not be tracked using this field, in which case the field remains null. The structure
     * is empty for finished jobs.
     */
    public function getUncountedTerminatedPods(): UncountedTerminatedPods|null
    {
        return $this->uncountedTerminatedPods;
    }

    /**
     * uncountedTerminatedPods holds the UIDs of Pods that have terminated but the job controller hasn't
     * yet accounted for in the status counters.
     *
     * The job controller creates pods with a finalizer. When a pod terminates (succeeded or failed), the
     * controller does three steps to account for it in the job status:
     *
     * 1. Add the pod UID to the arrays in this field. 2. Remove the pod finalizer. 3. Remove the pod UID
     * from the arrays while increasing the corresponding
     *     counter.
     *
     * Old jobs might not be tracked using this field, in which case the field remains null. The structure
     * is empty for finished jobs.
     *
     * @return static
     */
    public function setUncountedTerminatedPods(UncountedTerminatedPods $uncountedTerminatedPods): static
    {
        $this->uncountedTerminatedPods = $uncountedTerminatedPods;

        return $this;
    }
}
