<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Core\v1;

use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;

/**
 * EndpointAddress is a tuple that describes single IP address.
 */
class EndpointAddress
{
    #[Kubernetes\Attribute('hostname')]
    protected string|null $hostname = null;

    #[Kubernetes\Attribute('ip', required: true)]
    protected string $ip;

    #[Kubernetes\Attribute('nodeName')]
    protected string|null $nodeName = null;

    #[Kubernetes\Attribute('targetRef', type: AttributeType::Model, model: ObjectReference::class)]
    protected ObjectReference|null $targetRef = null;

    public function __construct(string $ip)
    {
        $this->ip = $ip;
    }

    /**
     * The Hostname of this endpoint
     */
    public function getHostname(): string|null
    {
        return $this->hostname;
    }

    /**
     * The Hostname of this endpoint
     *
     * @return static
     */
    public function setHostname(string $hostname): static
    {
        $this->hostname = $hostname;

        return $this;
    }

    /**
     * The IP of this endpoint. May not be loopback (127.0.0.0/8 or ::1), link-local (169.254.0.0/16 or
     * fe80::/10), or link-local multicast (224.0.0.0/24 or ff02::/16).
     */
    public function getIp(): string
    {
        return $this->ip;
    }

    /**
     * The IP of this endpoint. May not be loopback (127.0.0.0/8 or ::1), link-local (169.254.0.0/16 or
     * fe80::/10), or link-local multicast (224.0.0.0/24 or ff02::/16).
     *
     * @return static
     */
    public function setIp(string $ip): static
    {
        $this->ip = $ip;

        return $this;
    }

    /**
     * Optional: Node hosting this endpoint. This can be used to determine endpoints local to a node.
     */
    public function getNodeName(): string|null
    {
        return $this->nodeName;
    }

    /**
     * Optional: Node hosting this endpoint. This can be used to determine endpoints local to a node.
     *
     * @return static
     */
    public function setNodeName(string $nodeName): static
    {
        $this->nodeName = $nodeName;

        return $this;
    }

    /**
     * Reference to object providing the endpoint.
     */
    public function getTargetRef(): ObjectReference|null
    {
        return $this->targetRef;
    }

    /**
     * Reference to object providing the endpoint.
     *
     * @return static
     */
    public function setTargetRef(ObjectReference $targetRef): static
    {
        $this->targetRef = $targetRef;

        return $this;
    }
}
