<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Core\v1;

use Kcs\K8s\Attribute as Kubernetes;

/**
 * ContainerResizePolicy represents resource resize policy for the container.
 */
class ContainerResizePolicy
{
    #[Kubernetes\Attribute('resourceName', required: true)]
    protected string $resourceName;

    #[Kubernetes\Attribute('restartPolicy', required: true)]
    protected string $restartPolicy;

    public function __construct(string $resourceName, string $restartPolicy)
    {
        $this->resourceName = $resourceName;
        $this->restartPolicy = $restartPolicy;
    }

    /**
     * Name of the resource to which this resource resize policy applies. Supported values: cpu, memory.
     */
    public function getResourceName(): string
    {
        return $this->resourceName;
    }

    /**
     * Name of the resource to which this resource resize policy applies. Supported values: cpu, memory.
     *
     * @return static
     */
    public function setResourceName(string $resourceName): static
    {
        $this->resourceName = $resourceName;

        return $this;
    }

    /**
     * Restart policy to apply when specified resource is resized. If not specified, it defaults to
     * NotRequired.
     */
    public function getRestartPolicy(): string
    {
        return $this->restartPolicy;
    }

    /**
     * Restart policy to apply when specified resource is resized. If not specified, it defaults to
     * NotRequired.
     *
     * @return static
     */
    public function setRestartPolicy(string $restartPolicy): static
    {
        $this->restartPolicy = $restartPolicy;

        return $this;
    }
}
