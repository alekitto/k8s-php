<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\FlowControl\v1beta3;

use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;
use Kcs\K8s\Collection;

/**
 * FlowSchemaStatus represents the current state of a FlowSchema.
 */
class FlowSchemaStatus
{
    /** @var iterable|FlowSchemaCondition[]|null */
    #[Kubernetes\Attribute('conditions', type: AttributeType::Collection, model: FlowSchemaCondition::class)]
    protected $conditions = null;

    /** @param iterable|FlowSchemaCondition[] $conditions */
    public function __construct(iterable $conditions = [])
    {
        $this->conditions = new Collection($conditions);
    }

    /**
     * `conditions` is a list of the current states of FlowSchema.
     *
     * @return iterable|FlowSchemaCondition[]
     */
    public function getConditions(): iterable|null
    {
        return $this->conditions;
    }

    /**
     * `conditions` is a list of the current states of FlowSchema.
     *
     * @return static
     */
    public function setConditions(iterable $conditions): static
    {
        $this->conditions = $conditions;

        return $this;
    }

    /** @return static */
    public function addConditions(FlowSchemaCondition $condition): static
    {
        if (! $this->conditions) {
            $this->conditions = new Collection();
        }

        $this->conditions[] = $condition;

        return $this;
    }
}
