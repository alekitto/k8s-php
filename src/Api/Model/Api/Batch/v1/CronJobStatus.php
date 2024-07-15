<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Batch\v1;

use DateTimeInterface;
use Kcs\K8s\Api\Model\Api\Core\v1\ObjectReference;
use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;
use Kcs\K8s\Collection;

/**
 * CronJobStatus represents the current state of a cron job.
 */
class CronJobStatus
{
    /** @var iterable|ObjectReference[]|null */
    #[Kubernetes\Attribute('active', type: AttributeType::Collection, model: ObjectReference::class)]
    protected $active = null;

    #[Kubernetes\Attribute('lastScheduleTime', type: AttributeType::DateTime)]
    protected DateTimeInterface|null $lastScheduleTime = null;

    #[Kubernetes\Attribute('lastSuccessfulTime', type: AttributeType::DateTime)]
    protected DateTimeInterface|null $lastSuccessfulTime = null;

    /** @param iterable|ObjectReference[] $active */
    public function __construct(
        iterable $active = [],
        DateTimeInterface|null $lastScheduleTime = null,
        DateTimeInterface|null $lastSuccessfulTime = null,
    ) {
        $this->active = new Collection($active);
        $this->lastScheduleTime = $lastScheduleTime;
        $this->lastSuccessfulTime = $lastSuccessfulTime;
    }

    /**
     * A list of pointers to currently running jobs.
     *
     * @return iterable|ObjectReference[]
     */
    public function getActive(): iterable|null
    {
        return $this->active;
    }

    /**
     * A list of pointers to currently running jobs.
     *
     * @return static
     */
    public function setActive(iterable $active): static
    {
        $this->active = $active;

        return $this;
    }

    /** @return static */
    public function addActive(ObjectReference $active): static
    {
        if (! $this->active) {
            $this->active = new Collection();
        }

        $this->active[] = $active;

        return $this;
    }

    /**
     * Information when was the last time the job was successfully scheduled.
     */
    public function getLastScheduleTime(): DateTimeInterface|null
    {
        return $this->lastScheduleTime;
    }

    /**
     * Information when was the last time the job was successfully scheduled.
     *
     * @return static
     */
    public function setLastScheduleTime(DateTimeInterface $lastScheduleTime): static
    {
        $this->lastScheduleTime = $lastScheduleTime;

        return $this;
    }

    /**
     * Information when was the last time the job successfully completed.
     */
    public function getLastSuccessfulTime(): DateTimeInterface|null
    {
        return $this->lastSuccessfulTime;
    }

    /**
     * Information when was the last time the job successfully completed.
     *
     * @return static
     */
    public function setLastSuccessfulTime(DateTimeInterface $lastSuccessfulTime): static
    {
        $this->lastSuccessfulTime = $lastSuccessfulTime;

        return $this;
    }
}
