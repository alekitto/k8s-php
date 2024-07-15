<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Core\v1;

use Kcs\K8s\Attribute as Kubernetes;

/**
 * ContainerPort represents a network port in a single container.
 */
class ContainerPort
{
    #[Kubernetes\Attribute('containerPort', required: true)]
    protected int $containerPort;

    #[Kubernetes\Attribute('hostIP')]
    protected string|null $hostIP = null;

    #[Kubernetes\Attribute('hostPort')]
    protected int|null $hostPort = null;

    #[Kubernetes\Attribute('name')]
    protected string|null $name = null;

    #[Kubernetes\Attribute('protocol')]
    protected string|null $protocol = null;

    public function __construct(int $containerPort)
    {
        $this->containerPort = $containerPort;
    }

    /**
     * Number of port to expose on the pod's IP address. This must be a valid port number, 0 < x < 65536.
     */
    public function getContainerPort(): int
    {
        return $this->containerPort;
    }

    /**
     * Number of port to expose on the pod's IP address. This must be a valid port number, 0 < x < 65536.
     *
     * @return static
     */
    public function setContainerPort(int $containerPort): static
    {
        $this->containerPort = $containerPort;

        return $this;
    }

    /**
     * What host IP to bind the external port to.
     */
    public function getHostIP(): string|null
    {
        return $this->hostIP;
    }

    /**
     * What host IP to bind the external port to.
     *
     * @return static
     */
    public function setHostIP(string $hostIP): static
    {
        $this->hostIP = $hostIP;

        return $this;
    }

    /**
     * Number of port to expose on the host. If specified, this must be a valid port number, 0 < x < 65536.
     * If HostNetwork is specified, this must match ContainerPort. Most containers do not need this.
     */
    public function getHostPort(): int|null
    {
        return $this->hostPort;
    }

    /**
     * Number of port to expose on the host. If specified, this must be a valid port number, 0 < x < 65536.
     * If HostNetwork is specified, this must match ContainerPort. Most containers do not need this.
     *
     * @return static
     */
    public function setHostPort(int $hostPort): static
    {
        $this->hostPort = $hostPort;

        return $this;
    }

    /**
     * If specified, this must be an IANA_SVC_NAME and unique within the pod. Each named port in a pod must
     * have a unique name. Name for the port that can be referred to by services.
     */
    public function getName(): string|null
    {
        return $this->name;
    }

    /**
     * If specified, this must be an IANA_SVC_NAME and unique within the pod. Each named port in a pod must
     * have a unique name. Name for the port that can be referred to by services.
     *
     * @return static
     */
    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Protocol for port. Must be UDP, TCP, or SCTP. Defaults to "TCP".
     */
    public function getProtocol(): string|null
    {
        return $this->protocol;
    }

    /**
     * Protocol for port. Must be UDP, TCP, or SCTP. Defaults to "TCP".
     *
     * @return static
     */
    public function setProtocol(string $protocol): static
    {
        $this->protocol = $protocol;

        return $this;
    }
}
