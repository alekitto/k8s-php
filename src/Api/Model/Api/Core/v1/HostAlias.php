<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Core\v1;

use Kcs\K8s\Attribute as Kubernetes;

/**
 * HostAlias holds the mapping between IP and hostnames that will be injected as an entry in the pod's
 * hosts file.
 */
class HostAlias
{
    /** @var string[]|null */
    #[Kubernetes\Attribute('hostnames')]
    protected array|null $hostnames = null;

    #[Kubernetes\Attribute('ip', required: true)]
    protected string $ip;

    public function __construct(string $ip)
    {
        $this->ip = $ip;
    }

    /**
     * Hostnames for the above IP address.
     */
    public function getHostnames(): array|null
    {
        return $this->hostnames;
    }

    /**
     * Hostnames for the above IP address.
     *
     * @return static
     */
    public function setHostnames(array $hostnames): static
    {
        $this->hostnames = $hostnames;

        return $this;
    }

    /**
     * IP address of the host file entry.
     */
    public function getIp(): string
    {
        return $this->ip;
    }

    /**
     * IP address of the host file entry.
     *
     * @return static
     */
    public function setIp(string $ip): static
    {
        $this->ip = $ip;

        return $this;
    }
}
