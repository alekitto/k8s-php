<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Core\v1;

use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;
use Kcs\K8s\Collection;

class ResourceStatus
{
    #[Kubernetes\Attribute('name', required: true)]
    protected string $name;

    /** @var iterable|ResourceHealth[]|null */
    #[Kubernetes\Attribute('resources', type: AttributeType::Collection, model: ResourceHealth::class)]
    protected $resources = null;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * Name of the resource. Must be unique within the pod and match one of the resources from the pod
     * spec.
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Name of the resource. Must be unique within the pod and match one of the resources from the pod
     * spec.
     *
     * @return static
     */
    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    /**
     * List of unique Resources health. Each element in the list contains an unique resource ID and
     * resource health. At a minimum, ResourceID must uniquely identify the Resource allocated to the Pod
     * on the Node for the lifetime of a Pod. See ResourceID type for it's definition.
     *
     * @return iterable|ResourceHealth[]
     */
    public function getResources(): iterable|null
    {
        return $this->resources;
    }

    /**
     * List of unique Resources health. Each element in the list contains an unique resource ID and
     * resource health. At a minimum, ResourceID must uniquely identify the Resource allocated to the Pod
     * on the Node for the lifetime of a Pod. See ResourceID type for it's definition.
     *
     * @return static
     */
    public function setResources(iterable $resources): static
    {
        $this->resources = $resources;

        return $this;
    }

    /** @return static */
    public function addResources(ResourceHealth $resource): static
    {
        if (! $this->resources) {
            $this->resources = new Collection();
        }

        $this->resources[] = $resource;

        return $this;
    }
}
