<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Networking\v1;

use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;
use Kcs\K8s\Collection;

/**
 * NetworkPolicyIngressRule describes a particular set of traffic that is allowed to the pods matched
 * by a NetworkPolicySpec's podSelector. The traffic must match both ports and from.
 */
class NetworkPolicyIngressRule
{
    /** @var iterable|NetworkPolicyPeer[]|null */
    #[Kubernetes\Attribute('from', type: AttributeType::Collection, model: NetworkPolicyPeer::class)]
    protected $from = null;

    /** @var iterable|NetworkPolicyPort[]|null */
    #[Kubernetes\Attribute('ports', type: AttributeType::Collection, model: NetworkPolicyPort::class)]
    protected $ports = null;

    /**
     * @param iterable|NetworkPolicyPeer[] $from
     * @param iterable|NetworkPolicyPort[] $ports
     */
    public function __construct(iterable $from = [], iterable $ports = [])
    {
        $this->from = new Collection($from);
        $this->ports = new Collection($ports);
    }

    /**
     * from is a list of sources which should be able to access the pods selected for this rule. Items in
     * this list are combined using a logical OR operation. If this field is empty or missing, this rule
     * matches all sources (traffic not restricted by source). If this field is present and contains at
     * least one item, this rule allows traffic only if the traffic matches at least one item in the from
     * list.
     *
     * @return iterable|NetworkPolicyPeer[]
     */
    public function getFrom(): iterable|null
    {
        return $this->from;
    }

    /**
     * from is a list of sources which should be able to access the pods selected for this rule. Items in
     * this list are combined using a logical OR operation. If this field is empty or missing, this rule
     * matches all sources (traffic not restricted by source). If this field is present and contains at
     * least one item, this rule allows traffic only if the traffic matches at least one item in the from
     * list.
     *
     * @return static
     */
    public function setFrom(iterable $from): static
    {
        $this->from = $from;

        return $this;
    }

    /** @return static */
    public function addFrom(NetworkPolicyPeer $from): static
    {
        if (! $this->from) {
            $this->from = new Collection();
        }

        $this->from[] = $from;

        return $this;
    }

    /**
     * ports is a list of ports which should be made accessible on the pods selected for this rule. Each
     * item in this list is combined using a logical OR. If this field is empty or missing, this rule
     * matches all ports (traffic not restricted by port). If this field is present and contains at least
     * one item, then this rule allows traffic only if the traffic matches at least one port in the list.
     *
     * @return iterable|NetworkPolicyPort[]
     */
    public function getPorts(): iterable|null
    {
        return $this->ports;
    }

    /**
     * ports is a list of ports which should be made accessible on the pods selected for this rule. Each
     * item in this list is combined using a logical OR. If this field is empty or missing, this rule
     * matches all ports (traffic not restricted by port). If this field is present and contains at least
     * one item, then this rule allows traffic only if the traffic matches at least one port in the list.
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
}
