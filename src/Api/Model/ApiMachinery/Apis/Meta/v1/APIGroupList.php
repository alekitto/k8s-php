<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\ApiMachinery\Apis\Meta\v1;

use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;
use Kcs\K8s\Collection;

/**
 * APIGroupList is a list of APIGroup, to allow clients to discover the API at /apis.
 */
#[Kubernetes\Kind('APIGroupList', version: 'v1')]
class APIGroupList
{
    #[Kubernetes\Attribute('apiVersion')]
    protected string|null $apiVersion = 'v1';

    /** @var iterable|APIGroup[] */
    #[Kubernetes\Attribute('groups', type: AttributeType::Collection, model: APIGroup::class, required: true)]
    protected iterable $groups;

    #[Kubernetes\Attribute('kind')]
    protected string|null $kind = 'APIGroupList';

    /** @param iterable|APIGroup[] $groups */
    public function __construct(iterable $groups)
    {
        $this->groups = new Collection($groups);
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
     * groups is a list of APIGroup.
     *
     * @return iterable|APIGroup[]
     */
    public function getGroups(): iterable
    {
        return $this->groups;
    }

    /**
     * groups is a list of APIGroup.
     *
     * @return static
     */
    public function setGroups(iterable $groups): static
    {
        $this->groups = $groups;

        return $this;
    }

    /** @return static */
    public function addGroups(APIGroup $group): static
    {
        if (! $this->groups) {
            $this->groups = new Collection();
        }

        $this->groups[] = $group;

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
}
