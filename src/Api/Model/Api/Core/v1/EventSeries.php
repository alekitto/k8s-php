<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Core\v1;

use DateTimeInterface;
use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;

/**
 * EventSeries contain information on series of events, i.e. thing that was/is happening continuously
 * for some time.
 */
class EventSeries
{
    #[Kubernetes\Attribute('count')]
    protected int|null $count = null;

    #[Kubernetes\Attribute('lastObservedTime', type: AttributeType::DateTime)]
    protected DateTimeInterface|null $lastObservedTime = null;

    public function __construct(int|null $count = null, DateTimeInterface|null $lastObservedTime = null)
    {
        $this->count = $count;
        $this->lastObservedTime = $lastObservedTime;
    }

    /**
     * Number of occurrences in this series up to the last heartbeat time
     */
    public function getCount(): int|null
    {
        return $this->count;
    }

    /**
     * Number of occurrences in this series up to the last heartbeat time
     *
     * @return static
     */
    public function setCount(int $count): static
    {
        $this->count = $count;

        return $this;
    }

    /**
     * Time of the last occurrence observed
     */
    public function getLastObservedTime(): DateTimeInterface|null
    {
        return $this->lastObservedTime;
    }

    /**
     * Time of the last occurrence observed
     *
     * @return static
     */
    public function setLastObservedTime(DateTimeInterface $lastObservedTime): static
    {
        $this->lastObservedTime = $lastObservedTime;

        return $this;
    }
}
