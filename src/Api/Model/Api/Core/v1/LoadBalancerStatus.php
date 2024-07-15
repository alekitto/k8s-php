<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Core\v1;

use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;
use Kcs\K8s\Collection;

/**
 * LoadBalancerStatus represents the status of a load-balancer.
 */
class LoadBalancerStatus
{
    /** @var iterable|LoadBalancerIngress[]|null */
    #[Kubernetes\Attribute('ingress', type: AttributeType::Collection, model: LoadBalancerIngress::class)]
    protected $ingress = null;

    /** @param iterable|LoadBalancerIngress[] $ingress */
    public function __construct(iterable $ingress = [])
    {
        $this->ingress = new Collection($ingress);
    }

    /**
     * Ingress is a list containing ingress points for the load-balancer. Traffic intended for the service
     * should be sent to these ingress points.
     *
     * @return iterable|LoadBalancerIngress[]
     */
    public function getIngress(): iterable|null
    {
        return $this->ingress;
    }

    /**
     * Ingress is a list containing ingress points for the load-balancer. Traffic intended for the service
     * should be sent to these ingress points.
     *
     * @return static
     */
    public function setIngress(iterable $ingress): static
    {
        $this->ingress = $ingress;

        return $this;
    }

    /** @return static */
    public function addIngress(LoadBalancerIngress $ingre): static
    {
        if (! $this->ingress) {
            $this->ingress = new Collection();
        }

        $this->ingress[] = $ingre;

        return $this;
    }
}
