<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Networking\v1;

use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;
use Kcs\K8s\Collection;

/**
 * NetworkPolicyEgressRule describes a particular set of traffic that is allowed out of pods matched by
 * a NetworkPolicySpec's podSelector. The traffic must match both ports and to. This type is beta-level
 * in 1.8
 */
class NetworkPolicyEgressRule
{
    /** @var iterable|NetworkPolicyPort[]|null */
    #[Kubernetes\Attribute('ports', type: AttributeType::Collection, model: NetworkPolicyPort::class)]
    protected $ports = null;

    /** @var iterable|NetworkPolicyPeer[]|null */
    #[Kubernetes\Attribute('to', type: AttributeType::Collection, model: NetworkPolicyPeer::class)]
    protected $to = null;

    /**
     * @param iterable|NetworkPolicyPort[] $ports
     * @param iterable|NetworkPolicyPeer[] $to
     */
    public function __construct(iterable $ports = [], iterable $to = [])
    {
        $this->ports = new Collection($ports);
        $this->to = new Collection($to);
    }

    /**
     * ports is a list of destination ports for outgoing traffic. Each item in this list is combined using
     * a logical OR. If this field is empty or missing, this rule matches all ports (traffic not restricted
     * by port). If this field is present and contains at least one item, then this rule allows traffic
     * only if the traffic matches at least one port in the list.
     *
     * @return iterable|NetworkPolicyPort[]
     */
    public function getPorts(): iterable|null
    {
        return $this->ports;
    }

    /**
     * ports is a list of destination ports for outgoing traffic. Each item in this list is combined using
     * a logical OR. If this field is empty or missing, this rule matches all ports (traffic not restricted
     * by port). If this field is present and contains at least one item, then this rule allows traffic
     * only if the traffic matches at least one port in the list.
     *
     * @return static
     */
    public function setPorts(iterable $ports): static
    {
        $this->ports = $ports;

        return $this;
    }

    /** @return static */
    public function addPorts(NetworkPolicyPort $port): static
    {
        if (! $this->ports) {
            $this->ports = new Collection();
        }

        $this->ports[] = $port;

        return $this;
    }

    /**
     * to is a list of destinations for outgoing traffic of pods selected for this rule. Items in this list
     * are combined using a logical OR operation. If this field is empty or missing, this rule matches all
     * destinations (traffic not restricted by destination). If this field is present and contains at least
     * one item, this rule allows traffic only if the traffic matches at least one item in the to list.
     *
     * @return iterable|NetworkPolicyPeer[]
     */
    public function getTo(): iterable|null
    {
        return $this->to;
    }

    /**
     * to is a list of destinations for outgoing traffic of pods selected for this rule. Items in this list
     * are combined using a logical OR operation. If this field is empty or missing, this rule matches all
     * destinations (traffic not restricted by destination). If this field is present and contains at least
     * one item, this rule allows traffic only if the traffic matches at least one item in the to list.
     *
     * @return static
     */
    public function setTo(iterable $to): static
    {
        $this->to = $to;

        return $this;
    }

    /** @return static */
    public function addTo(NetworkPolicyPeer $to): static
    {
        if (! $this->to) {
            $this->to = new Collection();
        }

        $this->to[] = $to;

        return $this;
    }
}
