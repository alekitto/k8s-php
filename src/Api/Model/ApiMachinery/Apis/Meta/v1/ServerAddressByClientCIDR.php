<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\ApiMachinery\Apis\Meta\v1;

use Kcs\K8s\Attribute as Kubernetes;

/**
 * ServerAddressByClientCIDR helps the client to determine the server address that they should use,
 * depending on the clientCIDR that they match.
 */
class ServerAddressByClientCIDR
{
    #[Kubernetes\Attribute('clientCIDR', required: true)]
    protected string $clientCIDR;

    #[Kubernetes\Attribute('serverAddress', required: true)]
    protected string $serverAddress;

    public function __construct(string $clientCIDR, string $serverAddress)
    {
        $this->clientCIDR = $clientCIDR;
        $this->serverAddress = $serverAddress;
    }

    /**
     * The CIDR with which clients can match their IP to figure out the server address that they should
     * use.
     */
    public function getClientCIDR(): string
    {
        return $this->clientCIDR;
    }

    /**
     * The CIDR with which clients can match their IP to figure out the server address that they should
     * use.
     *
     * @return static
     */
    public function setClientCIDR(string $clientCIDR): static
    {
        $this->clientCIDR = $clientCIDR;

        return $this;
    }

    /**
     * Address of this server, suitable for a client that matches the above CIDR. This can be a hostname,
     * hostname:port, IP or IP:port.
     */
    public function getServerAddress(): string
    {
        return $this->serverAddress;
    }

    /**
     * Address of this server, suitable for a client that matches the above CIDR. This can be a hostname,
     * hostname:port, IP or IP:port.
     *
     * @return static
     */
    public function setServerAddress(string $serverAddress): static
    {
        $this->serverAddress = $serverAddress;

        return $this;
    }
}
