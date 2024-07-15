<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\KubeAggregator\Apis\ApiRegistration\v1;

use Kcs\K8s\Attribute as Kubernetes;

/**
 * ServiceReference holds a reference to Service.legacy.k8s.io
 */
class ServiceReference
{
    #[Kubernetes\Attribute('name')]
    protected string|null $name = null;

    #[Kubernetes\Attribute('namespace')]
    protected string|null $namespace = null;

    #[Kubernetes\Attribute('port')]
    protected int|null $port = null;

    public function __construct(string|null $name = null, string|null $namespace = null, int|null $port = null)
    {
        $this->name = $name;
        $this->namespace = $namespace;
        $this->port = $port;
    }

    /**
     * Name is the name of the service
     */
    public function getName(): string|null
    {
        return $this->name;
    }

    /**
     * Name is the name of the service
     *
     * @return static
     */
    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Namespace is the namespace of the service
     */
    public function getNamespace(): string|null
    {
        return $this->namespace;
    }

    /**
     * Namespace is the namespace of the service
     *
     * @return static
     */
    public function setNamespace(string $namespace): static
    {
        $this->namespace = $namespace;

        return $this;
    }

    /**
     * If specified, the port on the service that hosting webhook. Default to 443 for backward
     * compatibility. `port` should be a valid port number (1-65535, inclusive).
     */
    public function getPort(): int|null
    {
        return $this->port;
    }

    /**
     * If specified, the port on the service that hosting webhook. Default to 443 for backward
     * compatibility. `port` should be a valid port number (1-65535, inclusive).
     *
     * @return static
     */
    public function setPort(int $port): static
    {
        $this->port = $port;

        return $this;
    }
}
