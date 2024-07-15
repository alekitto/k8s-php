<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Networking\v1;

use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;
use Kcs\K8s\Collection;

/**
 * IngressLoadBalancerStatus represents the status of a load-balancer.
 */
class IngressLoadBalancerStatus
{
    /** @var iterable|IngressLoadBalancerIngress[]|null */
    #[Kubernetes\Attribute('ingress', type: AttributeType::Collection, model: IngressLoadBalancerIngress::class)]
    protected $ingress = null;

    /** @param iterable|IngressLoadBalancerIngress[] $ingress */
    public function __construct(iterable $ingress = [])
    {
        $this->ingress = new Collection($ingress);
    }

    /**
     * ingress is a list containing ingress points for the load-balancer.
     *
     * @return iterable|IngressLoadBalancerIngress[]
     */
    public function getIngress(): iterable|null
    {
        return $this->ingress;
    }

    /**
     * ingress is a list containing ingress points for the load-balancer.
     *
     * @return static
     */
    public function setIngress(iterable $ingress): static
    {
        $this->ingress = $ingress;

        return $this;
    }

    /** @return static */
    public function addIngress(IngressLoadBalancerIngress $ingre): static
    {
        if (! $this->ingress) {
            $this->ingress = new Collection();
        }

        $this->ingress[] = $ingre;

        return $this;
    }
}
