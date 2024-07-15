<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\ApiMachinery\Apis\Meta\v1;

use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;
use Kcs\K8s\Collection;

/**
 * APIResourceList is a list of APIResource, it is used to expose the name of the resources supported
 * in a specific group and version, and if the resource is namespaced.
 */
#[Kubernetes\Kind('APIResourceList', version: 'v1')]
class APIResourceList
{
    #[Kubernetes\Attribute('apiVersion')]
    protected string|null $apiVersion = 'v1';

    #[Kubernetes\Attribute('groupVersion', required: true)]
    protected string $groupVersion;

    #[Kubernetes\Attribute('kind')]
    protected string|null $kind = 'APIResourceList';

    /** @var iterable|APIResource[] */
    #[Kubernetes\Attribute('resources', type: AttributeType::Collection, model: APIResource::class, required: true)]
    protected iterable $resources;

    /** @param iterable|APIResource[] $resources */
    public function __construct(string $groupVersion, iterable $resources)
    {
        $this->groupVersion = $groupVersion;
        $this->resources = new Collection($resources);
    }

    /**
     * APIVersion defines the versioned schema of this representation of an object. Servers should convert
     * recognized schemas to the latest internal value, and may reject unrecognized values. More info:
     * https://git.k8s.io/community/contributors/devel/sig-architecture/api-conventions.md#resources
     */
    public function getApiVersion(): string|null
    {
        return $this->apiVersion;
    }

    /**
     * APIVersion defines the versioned schema of this representation of an object. Servers should convert
     * recognized schemas to the latest internal value, and may reject unrecognized values. More info:
     * https://git.k8s.io/community/contributors/devel/sig-architecture/api-conventions.md#resources
     *
     * @return static
     */
    public function setApiVersion(string $apiVersion): static
    {
        $this->apiVersion = $apiVersion;

        return $this;
    }

    /**
     * groupVersion is the group and version this APIResourceList is for.
     */
    public function getGroupVersion(): string
    {
        return $this->groupVersion;
    }

    /**
     * groupVersion is the group and version this APIResourceList is for.
     *
     * @return static
     */
    public function setGroupVersion(string $groupVersion): static
    {
        $this->groupVersion = $groupVersion;

        return $this;
    }

    /**
     * Kind is a string value representing the REST resource this object represents. Servers may infer this
     * from the endpoint the client submits requests to. Cannot be updated. In CamelCase. More info:
     * https://git.k8s.io/community/contributors/devel/sig-architecture/api-conventions.md#types-kinds
     */
    public function getKind(): string|null
    {
        return $this->kind;
    }

    /**
     * Kind is a string value representing the REST resource this object represents. Servers may infer this
     * from the endpoint the client submits requests to. Cannot be updated. In CamelCase. More info:
     * https://git.k8s.io/community/contributors/devel/sig-architecture/api-conventions.md#types-kinds
     *
     * @return static
     */
    public function setKind(string $kind): static
    {
        $this->kind = $kind;

        return $this;
    }

    /**
     * resources contains the name of the resources and if they are namespaced.
     *
     * @return iterable|APIResource[]
     */
    public function getResources(): iterable
    {
        return $this->resources;
    }

    /**
     * resources contains the name of the resources and if they are namespaced.
     *
     * @return static
     */
    public function setResources(iterable $resources): static
    {
        $this->resources = $resources;

        return $this;
    }

    /** @return static */
    public function addResources(APIResource $resource): static
    {
        if (! $this->resources) {
            $this->resources = new Collection();
        }

        $this->resources[] = $resource;

        return $this;
    }
}
