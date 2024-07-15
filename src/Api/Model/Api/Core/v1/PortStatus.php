<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Core\v1;

use Kcs\K8s\Attribute as Kubernetes;

class PortStatus
{
    #[Kubernetes\Attribute('error')]
    protected string|null $error = null;

    #[Kubernetes\Attribute('port', required: true)]
    protected int $port;

    #[Kubernetes\Attribute('protocol', required: true)]
    protected string $protocol;

    public function __construct(int $port, string $protocol)
    {
        $this->port = $port;
        $this->protocol = $protocol;
    }

    /**
     * Error is to record the problem with the service port The format of the error shall comply with the
     * following rules: - built-in error values shall be specified in this file and those shall use
     *   CamelCase names
     * - cloud provider specific error values must have names that comply with the
     *   format foo.example.com/CamelCase.
     */
    public function getError(): string|null
    {
        return $this->error;
    }

    /**
     * Error is to record the problem with the service port The format of the error shall comply with the
     * following rules: - built-in error values shall be specified in this file and those shall use
     *   CamelCase names
     * - cloud provider specific error values must have names that comply with the
     *   format foo.example.com/CamelCase.
     *
     * @return static
     */
    public function setError(string $error): static
    {
        $this->error = $error;

        return $this;
    }

    /**
     * Port is the port number of the service port of which status is recorded here
     */
    public function getPort(): int
    {
        return $this->port;
    }

    /**
     * Port is the port number of the service port of which status is recorded here
     *
     * @return static
     */
    public function setPort(int $port): static
    {
        $this->port = $port;

        return $this;
    }

    /**
     * Protocol is the protocol of the service port of which status is recorded here The supported values
     * are: "TCP", "UDP", "SCTP"
     */
    public function getProtocol(): string
    {
        return $this->protocol;
    }

    /**
     * Protocol is the protocol of the service port of which status is recorded here The supported values
     * are: "TCP", "UDP", "SCTP"
     *
     * @return static
     */
    public function setProtocol(string $protocol): static
    {
        $this->protocol = $protocol;

        return $this;
    }
}
