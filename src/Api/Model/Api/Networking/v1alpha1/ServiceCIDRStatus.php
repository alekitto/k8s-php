<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Networking\v1alpha1;

use Kcs\K8s\Api\Model\ApiMachinery\Apis\Meta\v1\Condition;
use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;
use Kcs\K8s\Collection;

/**
 * ServiceCIDRStatus describes the current state of the ServiceCIDR.
 */
class ServiceCIDRStatus
{
    /** @var iterable|Condition[]|null */
    #[Kubernetes\Attribute('conditions', type: AttributeType::Collection, model: Condition::class)]
    protected $conditions = null;

    /** @param iterable|Condition[] $conditions */
    public function __construct(iterable $conditions = [])
    {
        $this->conditions = new Collection($conditions);
    }

    /**
     * conditions holds an array of metav1.Condition that describe the state of the ServiceCIDR. Current
     * service state
     *
     * @return iterable|Condition[]
     */
    public function getConditions(): iterable|null
    {
        return $this->conditions;
    }

    /**
     * conditions holds an array of metav1.Condition that describe the state of the ServiceCIDR. Current
     * service state
     *
     * @return static
     */
    public function setConditions(iterable $conditions): static
    {
        $this->conditions = $conditions;

        return $this;
    }

    /** @return static */
    public function addConditions(Condition $condition): static
    {
        if (! $this->conditions) {
            $this->conditions = new Collection();
        }

        $this->conditions[] = $condition;

        return $this;
    }
}
