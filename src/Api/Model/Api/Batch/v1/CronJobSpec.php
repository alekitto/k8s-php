<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Batch\v1;

use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;

/**
 * CronJobSpec describes how the job execution will look like and when it will actually run.
 */
class CronJobSpec
{
    #[Kubernetes\Attribute('concurrencyPolicy')]
    protected string|null $concurrencyPolicy = null;

    #[Kubernetes\Attribute('failedJobsHistoryLimit')]
    protected int|null $failedJobsHistoryLimit = null;

    #[Kubernetes\Attribute('jobTemplate', type: AttributeType::Model, model: JobTemplateSpec::class, required: true)]
    protected JobTemplateSpec $jobTemplate;

    #[Kubernetes\Attribute('schedule', required: true)]
    protected string $schedule;

    #[Kubernetes\Attribute('startingDeadlineSeconds')]
    protected int|null $startingDeadlineSeconds = null;

    #[Kubernetes\Attribute('successfulJobsHistoryLimit')]
    protected int|null $successfulJobsHistoryLimit = null;

    #[Kubernetes\Attribute('suspend')]
    protected bool|null $suspend = null;

    #[Kubernetes\Attribute('timeZone')]
    protected string|null $timeZone = null;

    public function __construct(JobTemplateSpec $jobTemplate, string $schedule)
    {
        $this->jobTemplate = $jobTemplate;
        $this->schedule = $schedule;
    }

    /**
     * Specifies how to treat concurrent executions of a Job. Valid values are:
     *
     * - "Allow" (default): allows CronJobs to run concurrently; - "Forbid": forbids concurrent runs,
     * skipping next run if previous run hasn't finished yet; - "Replace": cancels currently running job
     * and replaces it with a new one
     */
    public function getConcurrencyPolicy(): string|null
    {
        return $this->concurrencyPolicy;
    }

    /**
     * Specifies how to treat concurrent executions of a Job. Valid values are:
     *
     * - "Allow" (default): allows CronJobs to run concurrently; - "Forbid": forbids concurrent runs,
     * skipping next run if previous run hasn't finished yet; - "Replace": cancels currently running job
     * and replaces it with a new one
     *
     * @return static
     */
    public function setConcurrencyPolicy(string $concurrencyPolicy): static
    {
        $this->concurrencyPolicy = $concurrencyPolicy;

        return $this;
    }

    /**
     * The number of failed finished jobs to retain. Value must be non-negative integer. Defaults to 1.
     */
    public function getFailedJobsHistoryLimit(): int|null
    {
        return $this->failedJobsHistoryLimit;
    }

    /**
     * The number of failed finished jobs to retain. Value must be non-negative integer. Defaults to 1.
     *
     * @return static
     */
    public function setFailedJobsHistoryLimit(int $failedJobsHistoryLimit): static
    {
        $this->failedJobsHistoryLimit = $failedJobsHistoryLimit;

        return $this;
    }

    /**
     * Specifies the job that will be created when executing a CronJob.
     */
    public function getJobTemplate(): JobTemplateSpec
    {
        return $this->jobTemplate;
    }

    /**
     * Specifies the job that will be created when executing a CronJob.
     *
     * @return static
     */
    public function setJobTemplate(JobTemplateSpec $jobTemplate): static
    {
        $this->jobTemplate = $jobTemplate;

        return $this;
    }

    /**
     * The schedule in Cron format, see https://en.wikipedia.org/wiki/Cron.
     */
    public function getSchedule(): string
    {
        return $this->schedule;
    }

    /**
     * The schedule in Cron format, see https://en.wikipedia.org/wiki/Cron.
     *
     * @return static
     */
    public function setSchedule(string $schedule): static
    {
        $this->schedule = $schedule;

        return $this;
    }

    /**
     * Optional deadline in seconds for starting the job if it misses scheduled time for any reason.
     * Missed jobs executions will be counted as failed ones.
     */
    public function getStartingDeadlineSeconds(): int|null
    {
        return $this->startingDeadlineSeconds;
    }

    /**
     * Optional deadline in seconds for starting the job if it misses scheduled time for any reason.
     * Missed jobs executions will be counted as failed ones.
     *
     * @return static
     */
    public function setStartingDeadlineSeconds(int $startingDeadlineSeconds): static
    {
        $this->startingDeadlineSeconds = $startingDeadlineSeconds;

        return $this;
    }

    /**
     * The number of successful finished jobs to retain. Value must be non-negative integer. Defaults to 3.
     */
    public function getSuccessfulJobsHistoryLimit(): int|null
    {
        return $this->successfulJobsHistoryLimit;
    }

    /**
     * The number of successful finished jobs to retain. Value must be non-negative integer. Defaults to 3.
     *
     * @return static
     */
    public function setSuccessfulJobsHistoryLimit(int $successfulJobsHistoryLimit): static
    {
        $this->successfulJobsHistoryLimit = $successfulJobsHistoryLimit;

        return $this;
    }

    /**
     * This flag tells the controller to suspend subsequent executions, it does not apply to already
     * started executions.  Defaults to false.
     */
    public function isSuspend(): bool|null
    {
        return $this->suspend;
    }

    /**
     * This flag tells the controller to suspend subsequent executions, it does not apply to already
     * started executions.  Defaults to false.
     *
     * @return static
     */
    public function setIsSuspend(bool $suspend): static
    {
        $this->suspend = $suspend;

        return $this;
    }

    /**
     * The time zone name for the given schedule, see
     * https://en.wikipedia.org/wiki/List_of_tz_database_time_zones. If not specified, this will default to
     * the time zone of the kube-controller-manager process. The set of valid time zone names and the time
     * zone offset is loaded from the system-wide time zone database by the API server during CronJob
     * validation and the controller manager during execution. If no system-wide time zone database can be
     * found a bundled version of the database is used instead. If the time zone name becomes invalid
     * during the lifetime of a CronJob or due to a change in host configuration, the controller will stop
     * creating new new Jobs and will create a system event with the reason UnknownTimeZone. More
     * information can be found in
     * https://kubernetes.io/docs/concepts/workloads/controllers/cron-jobs/#time-zones
     */
    public function getTimeZone(): string|null
    {
        return $this->timeZone;
    }

    /**
     * The time zone name for the given schedule, see
     * https://en.wikipedia.org/wiki/List_of_tz_database_time_zones. If not specified, this will default to
     * the time zone of the kube-controller-manager process. The set of valid time zone names and the time
     * zone offset is loaded from the system-wide time zone database by the API server during CronJob
     * validation and the controller manager during execution. If no system-wide time zone database can be
     * found a bundled version of the database is used instead. If the time zone name becomes invalid
     * during the lifetime of a CronJob or due to a change in host configuration, the controller will stop
     * creating new new Jobs and will create a system event with the reason UnknownTimeZone. More
     * information can be found in
     * https://kubernetes.io/docs/concepts/workloads/controllers/cron-jobs/#time-zones
     *
     * @return static
     */
    public function setTimeZone(string $timeZone): static
    {
        $this->timeZone = $timeZone;

        return $this;
    }
}
