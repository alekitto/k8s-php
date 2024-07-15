<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Core\v1;

use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;
use Kcs\K8s\Collection;

/**
 * EndpointSubset is a group of addresses with a common set of ports. The expanded set of endpoints is
 * the Cartesian product of Addresses x Ports. For example, given:
 *
 *  {
 *    Addresses: [{"ip": "10.10.1.1"}, {"ip": "10.10.2.2"}],
 *    Ports:     [{"name": "a", "port": 8675}, {"name": "b", "port": 309}]
 *  }
 *
 * The resulting set of endpoints can be viewed as:
 *
 *  a: [ 10.10.1.1:8675, 10.10.2.2:8675 ],
 *  b: [ 10.10.1.1:309, 10.10.2.2:309 ]
 */
class EndpointSubset
{
    /** @var iterable|EndpointAddress[]|null */
    #[Kubernetes\Attribute('addresses', type: AttributeType::Collection, model: EndpointAddress::class)]
    protected $addresses = null;

    /** @var iterable|EndpointAddress[]|null */
    #[Kubernetes\Attribute('notReadyAddresses', type: AttributeType::Collection, model: EndpointAddress::class)]
    protected $notReadyAddresses = null;

    /** @var iterable|EndpointPort[]|null */
    #[Kubernetes\Attribute('ports', type: AttributeType::Collection, model: EndpointPort::class)]
    protected $ports = null;

    /**
     * @param iterable|EndpointAddress[] $addresses
     * @param iterable|EndpointAddress[] $notReadyAddresses
     * @param iterable|EndpointPort[] $ports
     */
    public function __construct(iterable $addresses = [], iterable $notReadyAddresses = [], iterable $ports = [])
    {
        $this->addresses = new Collection($addresses);
        $this->notReadyAddresses = new Collection($notReadyAddresses);
        $this->ports = new Collection($ports);
    }

    /**
     * IP addresses which offer the related ports that are marked as ready. These endpoints should be
     * considered safe for load balancers and clients to utilize.
     *
     * @return iterable|EndpointAddress[]
     */
    public function getAddresses(): iterable|null
    {
        return $this->addresses;
    }

    /**
     * IP addresses which offer the related ports that are marked as ready. These endpoints should be
     * considered safe for load balancers and clients to utilize.
     *
     * @return static
     */
    public function setAddresses(iterable $addresses): static
    {
        $this->addresses = $addresses;

        return $this;
    }

    /** @return static */
    public function addAddresses(EndpointAddress $addresse): static
    {
        if (! $this->addresses) {
            $this->addresses = new Collection();
        }

        $this->addresses[] = $addresse;

        return $this;
    }

    /**
     * IP addresses which offer the related ports but are not currently marked as ready because they have
     * not yet finished starting, have recently failed a readiness check, or have recently failed a
     * liveness check.
     *
     * @return iterable|EndpointAddress[]
     */
    public function getNotReadyAddresses(): iterable|null
    {
        return $this->notReadyAddresses;
    }

    /**
     * IP addresses which offer the related ports but are not currently marked as ready because they have
     * not yet finished starting, have recently failed a readiness check, or have recently failed a
     * liveness check.
     *
     * @return static
     */
    public function setNotReadyAddresses(iterable $notReadyAddresses): static
    {
        $this->notReadyAddresses = $notReadyAddresses;

        return $this;
    }

    /** @return static */
    public function addNotReadyAddresses(EndpointAddress $notReadyAddresse): static
    {
        if (! $this->notReadyAddresses) {
            $this->notReadyAddresses = new Collection();
        }

        $this->notReadyAddresses[] = $notReadyAddresse;

        return $this;
    }

    /**
     * Port numbers available on the related IP addresses.
     *
     * @return iterable|EndpointPort[]
     */
    public function getPorts(): iterable|null
    {
        return $this->ports;
    }

    /**
     * Port numbers available on the related IP addresses.
     *
     * @return static
     */
    public function setPorts(iterable $ports): static
    {
        $this->ports = $ports;

        return $this;
    }

    /** @return static */
    public function addPorts(EndpointPort $port): static
    {
        if (! $this->ports) {
            $this->ports = new Collection();
        }

        $this->ports[] = $port;

        return $this;
    }
}
