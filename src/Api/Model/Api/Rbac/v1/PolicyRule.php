<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Rbac\v1;

use Kcs\K8s\Attribute as Kubernetes;

/**
 * PolicyRule holds information that describes a policy rule, but does not contain information about
 * who the rule applies to or which namespace the rule applies to.
 */
class PolicyRule
{
    /** @var string[]|null */
    #[Kubernetes\Attribute('apiGroups')]
    protected array|null $apiGroups = null;

    /** @var string[]|null */
    #[Kubernetes\Attribute('nonResourceURLs')]
    protected array|null $nonResourceURLs = null;

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
     * allowed. "" represents the core API group and "*" represents all API groups.
     */
    public function getApiGroups(): array|null
    {
        return $this->apiGroups;
    }

    /**
     * APIGroups is the name of the APIGroup that contains the resources.  If multiple API groups are
     * specified, any action requested against one of the enumerated resources in any API group will be
     * allowed. "" represents the core API group and "*" represents all API groups.
     *
     * @return static
     */
    public function setApiGroups(array $apiGroups): static
    {
        $this->apiGroups = $apiGroups;

        return $this;
    }

    /**
     * NonResourceURLs is a set of partial urls that a user should have access to.  *s are allowed, but
     * only as the full, final step in the path Since non-resource URLs are not namespaced, this field is
     * only applicable for ClusterRoles referenced from a ClusterRoleBinding. Rules can either apply to API
     * resources (such as "pods" or "secrets") or non-resource URL paths (such as "/api"),  but not both.
     */
    public function getNonResourceURLs(): array|null
    {
        return $this->nonResourceURLs;
    }

    /**
     * NonResourceURLs is a set of partial urls that a user should have access to.  *s are allowed, but
     * only as the full, final step in the path Since non-resource URLs are not namespaced, this field is
     * only applicable for ClusterRoles referenced from a ClusterRoleBinding. Rules can either apply to API
     * resources (such as "pods" or "secrets") or non-resource URL paths (such as "/api"),  but not both.
     *
     * @return static
     */
    public function setNonResourceURLs(array $nonResourceURLs): static
    {
        $this->nonResourceURLs = $nonResourceURLs;

        return $this;
    }

    /**
     * ResourceNames is an optional white list of names that the rule applies to.  An empty set means that
     * everything is allowed.
     */
    public function getResourceNames(): array|null
    {
        return $this->resourceNames;
    }

    /**
     * ResourceNames is an optional white list of names that the rule applies to.  An empty set means that
     * everything is allowed.
     *
     * @return static
     */
    public function setResourceNames(array $resourceNames): static
    {
        $this->resourceNames = $resourceNames;

        return $this;
    }

    /**
     * Resources is a list of resources this rule applies to. '*' represents all resources.
     */
    public function getResources(): array|null
    {
        return $this->resources;
    }

    /**
     * Resources is a list of resources this rule applies to. '*' represents all resources.
     *
     * @return static
     */
    public function setResources(array $resources): static
    {
        $this->resources = $resources;

        return $this;
    }

    /**
     * Verbs is a list of Verbs that apply to ALL the ResourceKinds contained in this rule. '*' represents
     * all verbs.
     */
    public function getVerbs(): array
    {
        return $this->verbs;
    }

    /**
     * Verbs is a list of Verbs that apply to ALL the ResourceKinds contained in this rule. '*' represents
     * all verbs.
     *
     * @return static
     */
    public function setVerbs(array $verbs): static
    {
        $this->verbs = $verbs;

        return $this;
    }
}
