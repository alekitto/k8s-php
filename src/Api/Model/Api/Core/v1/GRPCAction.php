<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Core\v1;

use Kcs\K8s\Attribute as Kubernetes;

class GRPCAction
{
    #[Kubernetes\Attribute('port', required: true)]
    protected int $port;

    #[Kubernetes\Attribute('service')]
    protected string|null $service = null;

    public function __construct(int $port)
    {
        $this->port = $port;
    }

    /**
     * Port number of the gRPC service. Number must be in the range 1 to 65535.
     */
    public function getPort(): int
    {
        return $this->port;
    }

    /**
     * Port number of the gRPC service. Number must be in the range 1 to 65535.
     *
     * @return static
     */
    public function setPort(int $port): static
    {
        $this->port = $port;

        return $this;
    }

    /**
     * Service is the name of the service to place in the gRPC HealthCheckRequest (see
     * https://github.com/grpc/grpc/blob/master/doc/health-checking.md).
     *
     * If this is not specified, the default behavior is defined by gRPC.
     */
    public function getService(): string|null
    {
        return $this->service;
    }

    /**
     * Service is the name of the service to place in the gRPC HealthCheckRequest (see
     * https://github.com/grpc/grpc/blob/master/doc/health-checking.md).
     *
     * If this is not specified, the default behavior is defined by gRPC.
     *
     * @return static
     */
    public function setService(string $service): static
    {
        $this->service = $service;

        return $this;
    }
}
