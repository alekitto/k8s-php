<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Storagemigration\v1alpha1;

use Kcs\K8s\Attribute as Kubernetes;

/**
 * The names of the group, the version, and the resource.
 */
class GroupVersionResource
{
    #[Kubernetes\Attribute('group')]
    protected string|null $group = null;

    #[Kubernetes\Attribute('resource')]
    protected string|null $resource = null;

    #[Kubernetes\Attribute('version')]
    protected string|null $version = null;

    public function __construct(string|null $group = null, string|null $resource = null, string|null $version = null)
    {
        $this->group = $group;
        $this->resource = $resource;
        $this->version = $version;
    }

    /**
     * The name of the group.
     */
    public function getGroup(): string|null
    {
        return $this->group;
    }

    /**
     * The name of the group.
     *
     * @return static
     */
    public function setGroup(string $group): static
    {
        $this->group = $group;

        return $this;
    }

    /**
     * The name of the resource.
     */
    public function getResource(): string|null
    {
        return $this->resource;
    }

    /**
     * The name of the resource.
     *
     * @return static
     */
    public function setResource(string $resource): static
    {
        $this->resource = $resource;

        return $this;
    }

    /**
     * The name of the version.
     */
    public function getVersion(): string|null
    {
        return $this->version;
    }

    /**
     * The name of the version.
     *
     * @return static
     */
    public function setVersion(string $version): static
    {
        $this->version = $version;

        return $this;
    }
}
