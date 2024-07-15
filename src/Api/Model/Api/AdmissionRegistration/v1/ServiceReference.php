<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\AdmissionRegistration\v1;

use Kcs\K8s\Attribute as Kubernetes;

/**
 * ServiceReference holds a reference to Service.legacy.k8s.io
 */
class ServiceReference
{
    #[Kubernetes\Attribute('name', required: true)]
    protected string $name;

    #[Kubernetes\Attribute('namespace', required: true)]
    protected string $namespace;

    #[Kubernetes\Attribute('path')]
    protected string|null $path = null;

    #[Kubernetes\Attribute('port')]
    protected int|null $port = null;

    public function __construct(string $name, string $namespace)
    {
        $this->name = $name;
        $this->namespace = $namespace;
    }

    /**
     * `name` is the name of the service. Required
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * `name` is the name of the service. Required
     *
     * @return static
     */
    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    /**
     * `namespace` is the namespace of the service. Required
     */
    public function getNamespace(): string
    {
        return $this->namespace;
    }

    /**
     * `namespace` is the namespace of the service. Required
     *
     * @return static
     */
    public function setNamespace(string $namespace): static
    {
        $this->namespace = $namespace;

        return $this;
    }

    /**
     * `path` is an optional URL path which will be sent in any request to this service.
     */
    public function getPath(): string|null
    {
        return $this->path;
    }

    /**
     * `path` is an optional URL path which will be sent in any request to this service.
     *
     * @return static
     */
    public function setPath(string $path): static
    {
        $this->path = $path;

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
