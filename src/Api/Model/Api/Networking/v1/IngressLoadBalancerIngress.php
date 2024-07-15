<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Networking\v1;

use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;
use Kcs\K8s\Collection;

/**
 * IngressLoadBalancerIngress represents the status of a load-balancer ingress point.
 */
class IngressLoadBalancerIngress
{
    #[Kubernetes\Attribute('hostname')]
    protected string|null $hostname = null;

    #[Kubernetes\Attribute('ip')]
    protected string|null $ip = null;

    /** @var iterable|IngressPortStatus[]|null */
    #[Kubernetes\Attribute('ports', type: AttributeType::Collection, model: IngressPortStatus::class)]
    protected $ports = null;

    /** @param iterable|IngressPortStatus[] $ports */
    public function __construct(string|null $hostname = null, string|null $ip = null, iterable $ports = [])
    {
        $this->hostname = $hostname;
        $this->ip = $ip;
        $this->ports = new Collection($ports);
    }

    /**
     * hostname is set for load-balancer ingress points that are DNS based.
     */
    public function getHostname(): string|null
    {
        return $this->hostname;
    }

    /**
     * hostname is set for load-balancer ingress points that are DNS based.
     *
     * @return static
     */
    public function setHostname(string $hostname): static
    {
        $this->hostname = $hostname;

        return $this;
    }

    /**
     * ip is set for load-balancer ingress points that are IP based.
     */
    public function getIp(): string|null
    {
        return $this->ip;
    }

    /**
     * ip is set for load-balancer ingress points that are IP based.
     *
     * @return static
     */
    public function setIp(string $ip): static
    {
        $this->ip = $ip;

        return $this;
    }

    /**
     * ports provides information about the ports exposed by this LoadBalancer.
     *
     * @return iterable|IngressPortStatus[]
     */
    public function getPorts(): iterable|null
    {
        return $this->ports;
    }

    /**
     * ports provides information about the ports exposed by this LoadBalancer.
     *
     * @return static
     */
    public function setPorts(iterable $ports): static
    {
        $this->ports = $ports;

        return $this;
    }

    /** @return static */
    public function addPorts(IngressPortStatus $port): static
    {
        if (! $this->ports) {
            $this->ports = new Collection();
        }

        $this->ports[] = $port;

        return $this;
    }
}
