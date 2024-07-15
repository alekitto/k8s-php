<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\KubeAggregator\Apis\ApiRegistration\v1;

use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;
use Kcs\K8s\Collection;

/**
 * APIServiceStatus contains derived information about an API server
 */
class APIServiceStatus
{
    /** @var iterable|APIServiceCondition[]|null */
    #[Kubernetes\Attribute('conditions', type: AttributeType::Collection, model: APIServiceCondition::class)]
    protected $conditions = null;

    /** @param iterable|APIServiceCondition[] $conditions */
    public function __construct(iterable $conditions = [])
    {
        $this->conditions = new Collection($conditions);
    }

    /**
     * Current service state of apiService.
     *
     * @return iterable|APIServiceCondition[]
     */
    public function getConditions(): iterable|null
    {
        return $this->conditions;
    }

    /**
     * Current service state of apiService.
     *
     * @return static
     */
    public function setConditions(iterable $conditions): static
    {
        $this->conditions = $conditions;

        return $this;
    }

    /** @return static */
    public function addConditions(APIServiceCondition $condition): static
    {
        if (! $this->conditions) {
            $this->conditions = new Collection();
        }

        $this->conditions[] = $condition;

        return $this;
    }
}
