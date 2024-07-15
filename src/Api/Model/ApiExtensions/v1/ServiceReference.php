<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\ApiExtensions\v1;

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
     * name is the name of the service. Required
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * name is the name of the service. Required
     *
     * @return static
     */
    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    /**
     * namespace is the namespace of the service. Required
     */
    public function getNamespace(): string
    {
        return $this->namespace;
    }

    /**
     * namespace is the namespace of the service. Required
     *
     * @return static
     */
    public function setNamespace(string $namespace): static
    {
        $this->namespace = $namespace;

        return $this;
    }

    /**
     * path is an optional URL path at which the webhook will be contacted.
     */
    public function getPath(): string|null
    {
        return $this->path;
    }

    /**
     * path is an optional URL path at which the webhook will be contacted.
     *
     * @return static
     */
    public function setPath(string $path): static
    {
        $this->path = $path;

        return $this;
    }

    /**
     * port is an optional service port at which the webhook will be contacted. `port` should be a valid
     * port number (1-65535, inclusive). Defaults to 443 for backward compatibility.
     */
    public function getPort(): int|null
    {
        return $this->port;
    }

    /**
     * port is an optional service port at which the webhook will be contacted. `port` should be a valid
     * port number (1-65535, inclusive). Defaults to 443 for backward compatibility.
     *
     * @return static
     */
    public function setPort(int $port): static
    {
        $this->port = $port;

        return $this;
    }
}
