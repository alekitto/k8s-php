<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Core\v1;

use Kcs\K8s\Attribute as Kubernetes;

/**
 * DaemonEndpoint contains information about a single Daemon endpoint.
 */
class DaemonEndpoint
{
    #[Kubernetes\Attribute('Port', required: true)]
    protected int $Port;

    public function __construct(int $Port)
    {
        $this->Port = $Port;
    }

    /**
     * Port number of the given endpoint.
     */
    public function getPort(): int
    {
        return $this->Port;
    }

    /**
     * Port number of the given endpoint.
     *
     * @return static
     */
    public function setPort(int $Port): static
    {
        $this->Port = $Port;

        return $this;
    }
}
