<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Core\v1;

use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;
use Kcs\K8s\Collection;

/**
 * LoadBalancerIngress represents the status of a load-balancer ingress point: traffic intended for the
 * service should be sent to an ingress point.
 */
class LoadBalancerIngress
{
    #[Kubernetes\Attribute('hostname')]
    protected string|null $hostname = null;

    #[Kubernetes\Attribute('ip')]
    protected string|null $ip = null;

    #[Kubernetes\Attribute('ipMode')]
    protected string|null $ipMode = null;

    /** @var iterable|PortStatus[]|null */
    #[Kubernetes\Attribute('ports', type: AttributeType::Collection, model: PortStatus::class)]
    protected $ports = null;

    /** @param iterable|PortStatus[] $ports */
    public function __construct(
        string|null $hostname = null,
        string|null $ip = null,
        string|null $ipMode = null,
        iterable $ports = [],
    ) {
        $this->hostname = $hostname;
        $this->ip = $ip;
        $this->ipMode = $ipMode;
        $this->ports = new Collection($ports);
    }

    /**
     * Hostname is set for load-balancer ingress points that are DNS based (typically AWS load-balancers)
     */
    public function getHostname(): string|null
    {
        return $this->hostname;
    }

    /**
     * Hostname is set for load-balancer ingress points that are DNS based (typically AWS load-balancers)
     *
     * @return static
     */
    public function setHostname(string $hostname): static
    {
        $this->hostname = $hostname;

        return $this;
    }

    /**
     * IP is set for load-balancer ingress points that are IP based (typically GCE or OpenStack
     * load-balancers)
     */
    public function getIp(): string|null
    {
        return $this->ip;
    }

    /**
     * IP is set for load-balancer ingress points that are IP based (typically GCE or OpenStack
     * load-balancers)
     *
     * @return static
     */
    public function setIp(string $ip): static
    {
        $this->ip = $ip;

        return $this;
    }

    /**
     * IPMode specifies how the load-balancer IP behaves, and may only be specified when the ip field is
     * specified. Setting this to "VIP" indicates that traffic is delivered to the node with the
     * destination set to the load-balancer's IP and port. Setting this to "Proxy" indicates that traffic
     * is delivered to the node or pod with the destination set to the node's IP and node port or the pod's
     * IP and port. Service implementations may use this information to adjust traffic routing.
     */
    public function getIpMode(): string|null
    {
        return $this->ipMode;
    }

    /**
     * IPMode specifies how the load-balancer IP behaves, and may only be specified when the ip field is
     * specified. Setting this to "VIP" indicates that traffic is delivered to the node with the
     * destination set to the load-balancer's IP and port. Setting this to "Proxy" indicates that traffic
     * is delivered to the node or pod with the destination set to the node's IP and node port or the pod's
     * IP and port. Service implementations may use this information to adjust traffic routing.
     *
     * @return static
     */
    public function setIpMode(string $ipMode): static
    {
        $this->ipMode = $ipMode;

        return $this;
    }

    /**
     * Ports is a list of records of service ports If used, every port defined in the service should have
     * an entry in it
     *
     * @return iterable|PortStatus[]
     */
    public function getPorts(): iterable|null
    {
        return $this->ports;
    }

    /**
     * Ports is a list of records of service ports If used, every port defined in the service should have
     * an entry in it
     *
     * @return static
     */
    public function setPorts(iterable $ports): static
    {
        $this->ports = $ports;

        return $this;
    }

    /** @return static */
    public function addPorts(PortStatus $port): static
    {
        if (! $this->ports) {
            $this->ports = new Collection();
        }

        $this->ports[] = $port;

        return $this;
    }
}
