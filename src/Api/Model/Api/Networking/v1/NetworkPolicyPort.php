<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Networking\v1;

use Kcs\K8s\Attribute as Kubernetes;

/**
 * NetworkPolicyPort describes a port to allow traffic on
 */
class NetworkPolicyPort
{
    #[Kubernetes\Attribute('endPort')]
    protected int|null $endPort = null;

    #[Kubernetes\Attribute('port')]
    protected int|string|null $port = null;

    #[Kubernetes\Attribute('protocol')]
    protected string|null $protocol = null;

    public function __construct(int|null $endPort = null, int|string|null $port = null, string|null $protocol = null)
    {
        $this->endPort = $endPort;
        $this->port = $port;
        $this->protocol = $protocol;
    }

    /**
     * endPort indicates that the range of ports from port to endPort if set, inclusive, should be allowed
     * by the policy. This field cannot be defined if the port field is not defined or if the port field is
     * defined as a named (string) port. The endPort must be equal or greater than port.
     */
    public function getEndPort(): int|null
    {
        return $this->endPort;
    }

    /**
     * endPort indicates that the range of ports from port to endPort if set, inclusive, should be allowed
     * by the policy. This field cannot be defined if the port field is not defined or if the port field is
     * defined as a named (string) port. The endPort must be equal or greater than port.
     *
     * @return static
     */
    public function setEndPort(int $endPort): static
    {
        $this->endPort = $endPort;

        return $this;
    }

    /**
     * port represents the port on the given protocol. This can either be a numerical or named port on a
     * pod. If this field is not provided, this matches all port names and numbers. If present, only
     * traffic on the specified protocol AND port will be matched.
     */
    public function getPort(): int|string
    {
        return $this->port;
    }

    /**
     * port represents the port on the given protocol. This can either be a numerical or named port on a
     * pod. If this field is not provided, this matches all port names and numbers. If present, only
     * traffic on the specified protocol AND port will be matched.
     *
     * @return static
     */
    public function setPort(int|string $port): static
    {
        $this->port = $port;

        return $this;
    }

    /**
     * protocol represents the protocol (TCP, UDP, or SCTP) which traffic must match. If not specified,
     * this field defaults to TCP.
     */
    public function getProtocol(): string|null
    {
        return $this->protocol;
    }

    /**
     * protocol represents the protocol (TCP, UDP, or SCTP) which traffic must match. If not specified,
     * this field defaults to TCP.
     *
     * @return static
     */
    public function setProtocol(string $protocol): static
    {
        $this->protocol = $protocol;

        return $this;
    }
}
