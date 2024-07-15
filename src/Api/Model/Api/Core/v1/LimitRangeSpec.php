<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Core\v1;

use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;
use Kcs\K8s\Collection;

/**
 * LimitRangeSpec defines a min/max usage limit for resources that match on kind.
 */
class LimitRangeSpec
{
    /** @var iterable|LimitRangeItem[] */
    #[Kubernetes\Attribute('limits', type: AttributeType::Collection, model: LimitRangeItem::class, required: true)]
    protected iterable $limits;

    /** @param iterable|LimitRangeItem[] $limits */
    public function __construct(iterable $limits)
    {
        $this->limits = new Collection($limits);
    }

    /**
     * Limits is the list of LimitRangeItem objects that are enforced.
     *
     * @return iterable|LimitRangeItem[]
     */
    public function getLimits(): iterable
    {
        return $this->limits;
    }

    /**
     * Limits is the list of LimitRangeItem objects that are enforced.
     *
     * @return static
     */
    public function setLimits(iterable $limits): static
    {
        $this->limits = $limits;

        return $this;
    }

    /** @return static */
    public function addLimits(LimitRangeItem $limit): static
    {
        if (! $this->limits) {
            $this->limits = new Collection();
        }

        $this->limits[] = $limit;

        return $this;
    }
}
