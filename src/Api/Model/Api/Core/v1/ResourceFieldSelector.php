<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Core\v1;

use Kcs\K8s\Attribute as Kubernetes;

/**
 * ResourceFieldSelector represents container resources (cpu, memory) and their output format
 */
class ResourceFieldSelector
{
    #[Kubernetes\Attribute('containerName')]
    protected string|null $containerName = null;

    #[Kubernetes\Attribute('divisor')]
    protected string|null $divisor = null;

    #[Kubernetes\Attribute('resource', required: true)]
    protected string $resource;

    public function __construct(string $resource)
    {
        $this->resource = $resource;
    }

    /**
     * Container name: required for volumes, optional for env vars
     */
    public function getContainerName(): string|null
    {
        return $this->containerName;
    }

    /**
     * Container name: required for volumes, optional for env vars
     *
     * @return static
     */
    public function setContainerName(string $containerName): static
    {
        $this->containerName = $containerName;

        return $this;
    }

    /**
     * Specifies the output format of the exposed resources, defaults to "1"
     */
    public function getDivisor(): string
    {
        return $this->divisor;
    }

    /**
     * Specifies the output format of the exposed resources, defaults to "1"
     *
     * @return static
     */
    public function setDivisor(string $divisor): static
    {
        $this->divisor = $divisor;

        return $this;
    }

    /**
     * Required: resource to select
     */
    public function getResource(): string
    {
        return $this->resource;
    }

    /**
     * Required: resource to select
     *
     * @return static
     */
    public function setResource(string $resource): static
    {
        $this->resource = $resource;

        return $this;
    }
}
