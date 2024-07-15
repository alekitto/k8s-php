<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Core\v1;

use Kcs\K8s\Attribute as Kubernetes;

/**
 * NodeAddress contains information for the node's address.
 */
class NodeAddress
{
    #[Kubernetes\Attribute('address', required: true)]
    protected string $address;

    #[Kubernetes\Attribute('type', required: true)]
    protected string $type;

    public function __construct(string $address, string $type)
    {
        $this->address = $address;
        $this->type = $type;
    }

    /**
     * The node address.
     */
    public function getAddress(): string
    {
        return $this->address;
    }

    /**
     * The node address.
     *
     * @return static
     */
    public function setAddress(string $address): static
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Node address type, one of Hostname, ExternalIP or InternalIP.
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * Node address type, one of Hostname, ExternalIP or InternalIP.
     *
     * @return static
     */
    public function setType(string $type): static
    {
        $this->type = $type;

        return $this;
    }
}
