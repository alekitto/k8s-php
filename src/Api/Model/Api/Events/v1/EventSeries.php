<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Events\v1;

use DateTimeInterface;
use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;

/**
 * EventSeries contain information on series of events, i.e. thing that was/is happening continuously
 * for some time. How often to update the EventSeries is up to the event reporters. The default event
 * reporter in "k8s.io/client-go/tools/events/event_broadcaster.go" shows how this struct is updated on
 * heartbeats and can guide customized reporter implementations.
 */
class EventSeries
{
    #[Kubernetes\Attribute('count', required: true)]
    protected int $count;

    #[Kubernetes\Attribute('lastObservedTime', type: AttributeType::DateTime, required: true)]
    protected DateTimeInterface $lastObservedTime;

    public function __construct(int $count, DateTimeInterface $lastObservedTime)
    {
        $this->count = $count;
        $this->lastObservedTime = $lastObservedTime;
    }

    /**
     * count is the number of occurrences in this series up to the last heartbeat time.
     */
    public function getCount(): int
    {
        return $this->count;
    }

    /**
     * count is the number of occurrences in this series up to the last heartbeat time.
     *
     * @return static
     */
    public function setCount(int $count): static
    {
        $this->count = $count;

        return $this;
    }

    /**
     * lastObservedTime is the time when last Event from the series was seen before last heartbeat.
     */
    public function getLastObservedTime(): DateTimeInterface
    {
        return $this->lastObservedTime;
    }

    /**
     * lastObservedTime is the time when last Event from the series was seen before last heartbeat.
     *
     * @return static
     */
    public function setLastObservedTime(DateTimeInterface $lastObservedTime): static
    {
        $this->lastObservedTime = $lastObservedTime;

        return $this;
    }
}
