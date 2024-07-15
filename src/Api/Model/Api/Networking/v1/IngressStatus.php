<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Networking\v1;

use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;

/**
 * IngressStatus describe the current state of the Ingress.
 */
class IngressStatus
{
    #[Kubernetes\Attribute('loadBalancer', type: AttributeType::Model, model: IngressLoadBalancerStatus::class)]
    protected IngressLoadBalancerStatus|null $loadBalancer = null;

    public function __construct(IngressLoadBalancerStatus|null $loadBalancer = null)
    {
        $this->loadBalancer = $loadBalancer;
    }

    /**
     * loadBalancer contains the current status of the load-balancer.
     */
    public function getLoadBalancer(): IngressLoadBalancerStatus|null
    {
        return $this->loadBalancer;
    }

    /**
     * loadBalancer contains the current status of the load-balancer.
     *
     * @return static
     */
    public function setLoadBalancer(IngressLoadBalancerStatus $loadBalancer): static
    {
        $this->loadBalancer = $loadBalancer;

        return $this;
    }
}
