<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\FlowControl\v1beta3;

use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;
use Kcs\K8s\Collection;

/**
 * PriorityLevelConfigurationStatus represents the current state of a "request-priority".
 */
class PriorityLevelConfigurationStatus
{
    /** @var iterable|PriorityLevelConfigurationCondition[]|null */
    #[Kubernetes\Attribute('conditions', type: AttributeType::Collection, model: PriorityLevelConfigurationCondition::class)]
    protected $conditions = null;

    /** @param iterable|PriorityLevelConfigurationCondition[] $conditions */
    public function __construct(iterable $conditions = [])
    {
        $this->conditions = new Collection($conditions);
    }

    /**
     * `conditions` is the current state of "request-priority".
     *
     * @return iterable|PriorityLevelConfigurationCondition[]
     */
    public function getConditions(): iterable|null
    {
        return $this->conditions;
    }

    /**
     * `conditions` is the current state of "request-priority".
     *
     * @return static
     */
    public function setConditions(iterable $conditions): static
    {
        $this->conditions = $conditions;

        return $this;
    }

    /** @return static */
    public function addConditions(PriorityLevelConfigurationCondition $condition): static
    {
        if (! $this->conditions) {
            $this->conditions = new Collection();
        }

        $this->conditions[] = $condition;

        return $this;
    }
}
