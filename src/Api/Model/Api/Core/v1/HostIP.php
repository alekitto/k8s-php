<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Core\v1;

use Kcs\K8s\Attribute as Kubernetes;

/**
 * HostIP represents a single IP address allocated to the host.
 */
class HostIP
{
    #[Kubernetes\Attribute('ip', required: true)]
    protected string $ip;

    public function __construct(string $ip)
    {
        $this->ip = $ip;
    }

    /**
     * IP is the IP address assigned to the host
     */
    public function getIp(): string
    {
        return $this->ip;
    }

    /**
     * IP is the IP address assigned to the host
     *
     * @return static
     */
    public function setIp(string $ip): static
    {
        $this->ip = $ip;

        return $this;
    }
}
