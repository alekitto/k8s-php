<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Core\v1;

use Kcs\K8s\Attribute as Kubernetes;

/**
 * TCPSocketAction describes an action based on opening a socket
 */
class TCPSocketAction
{
    #[Kubernetes\Attribute('host')]
    protected string|null $host = null;

    #[Kubernetes\Attribute('port', required: true)]
    protected int|string $port;

    public function __construct(int|string $port)
    {
        $this->port = $port;
    }

    /**
     * Optional: Host name to connect to, defaults to the pod IP.
     */
    public function getHost(): string|null
    {
        return $this->host;
    }

    /**
     * Optional: Host name to connect to, defaults to the pod IP.
     *
     * @return static
     */
    public function setHost(string $host): static
    {
        $this->host = $host;

        return $this;
    }

    /**
     * Number or name of the port to access on the container. Number must be in the range 1 to 65535. Name
     * must be an IANA_SVC_NAME.
     */
    public function getPort(): int|string
    {
        return $this->port;
    }

    /**
     * Number or name of the port to access on the container. Number must be in the range 1 to 65535. Name
     * must be an IANA_SVC_NAME.
     *
     * @return static
     */
    public function setPort(int|string $port): static
    {
        $this->port = $port;

        return $this;
    }
}
