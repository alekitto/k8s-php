<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Core\v1;

use Kcs\K8s\Api\Model\ApiMachinery\Apis\Meta\v1\Condition;
use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;
use Kcs\K8s\Collection;

/**
 * ServiceStatus represents the current status of a service.
 */
class ServiceStatus
{
    /** @var iterable|Condition[]|null */
    #[Kubernetes\Attribute('conditions', type: AttributeType::Collection, model: Condition::class)]
    protected $conditions = null;

    #[Kubernetes\Attribute('loadBalancer', type: AttributeType::Model, model: LoadBalancerStatus::class)]
    protected LoadBalancerStatus|null $loadBalancer = null;

    /** @param iterable|Condition[] $conditions */
    public function __construct(iterable $conditions = [], LoadBalancerStatus|null $loadBalancer = null)
    {
        $this->conditions = new Collection($conditions);
        $this->loadBalancer = $loadBalancer;
    }

    /**
     * Current service state
     *
     * @return iterable|Condition[]
     */
    public function getConditions(): iterable|null
    {
        return $this->conditions;
    }

    /**
     * Current service state
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

    /**
     * LoadBalancer contains the current status of the load-balancer, if one is present.
     */
    public function getLoadBalancer(): LoadBalancerStatus|null
    {
        return $this->loadBalancer;
    }

    /**
     * LoadBalancer contains the current status of the load-balancer, if one is present.
     *
     * @return static
     */
    public function setLoadBalancer(LoadBalancerStatus $loadBalancer): static
    {
        $this->loadBalancer = $loadBalancer;

        return $this;
    }
}
