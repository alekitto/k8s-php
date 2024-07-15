<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Authorization\v1;

use Kcs\K8s\Attribute as Kubernetes;

/**
 * ResourceRule is the list of actions the subject is allowed to perform on resources. The list
 * ordering isn't significant, may contain duplicates, and possibly be incomplete.
 */
class ResourceRule
{
    /** @var string[]|null */
    #[Kubernetes\Attribute('apiGroups')]
    protected array|null $apiGroups = null;

    /** @var string[]|null */
    #[Kubernetes\Attribute('resourceNames')]
    protected array|null $resourceNames = null;

    /** @var string[]|null */
    #[Kubernetes\Attribute('resources')]
    protected array|null $resources = null;

    /** @var string[] */
    #[Kubernetes\Attribute('verbs', required: true)]
    protected array $verbs;

    /** @param string[] $verbs */
    public function __construct(array $verbs)
    {
        $this->verbs = $verbs;
    }

    /**
     * APIGroups is the name of the APIGroup that contains the resources.  If multiple API groups are
     * specified, any action requested against one of the enumerated resources in any API group will be
     * allowed.  "*" means all.
     */
    public function getApiGroups(): array|null
    {
        return $this->apiGroups;
    }

    /**
     * APIGroups is the name of the APIGroup that contains the resources.  If multiple API groups are
     * specified, any action requested against one of the enumerated resources in any API group will be
     * allowed.  "*" means all.
     *
     * @return static
     */
    public function setApiGroups(array $apiGroups): static
    {
        $this->apiGroups = $apiGroups;

        return $this;
    }

    /**
     * ResourceNames is an optional white list of names that the rule applies to.  An empty set means that
     * everything is allowed.  "*" means all.
     */
    public function getResourceNames(): array|null
    {
        return $this->resourceNames;
    }

    /**
     * ResourceNames is an optional white list of names that the rule applies to.  An empty set means that
     * everything is allowed.  "*" means all.
     *
     * @return static
     */
    public function setResourceNames(array $resourceNames): static
    {
        $this->resourceNames = $resourceNames;

        return $this;
    }

    /**
     * Resources is a list of resources this rule applies to.  "*" means all in the specified apiGroups.
     *  "* /foo" represents the subresource 'foo' for all resources in the specified apiGroups.
     */
    public function getResources(): array|null
    {
        return $this->resources;
    }

    /**
     * Resources is a list of resources this rule applies to.  "*" means all in the specified apiGroups.
     *  "* /foo" represents the subresource 'foo' for all resources in the specified apiGroups.
     *
     * @return static
     */
    public function setResources(array $resources): static
    {
        $this->resources = $resources;

        return $this;
    }

    /**
     * Verb is a list of kubernetes resource API verbs, like: get, list, watch, create, update, delete,
     * proxy.  "*" means all.
     */
    public function getVerbs(): array
    {
        return $this->verbs;
    }

    /**
     * Verb is a list of kubernetes resource API verbs, like: get, list, watch, create, update, delete,
     * proxy.  "*" means all.
     *
     * @return static
     */
    public function setVerbs(array $verbs): static
    {
        $this->verbs = $verbs;

        return $this;
    }
}
