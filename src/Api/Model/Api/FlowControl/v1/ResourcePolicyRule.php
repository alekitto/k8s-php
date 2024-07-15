<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\FlowControl\v1;

use Kcs\K8s\Attribute as Kubernetes;

/**
 * ResourcePolicyRule is a predicate that matches some resource requests, testing the request's verb
 * and the target resource. A ResourcePolicyRule matches a resource request if and only if: (a) at
 * least one member of verbs matches the request, (b) at least one member of apiGroups matches the
 * request, (c) at least one member of resources matches the request, and (d) either (d1) the request
 * does not specify a namespace (i.e., `Namespace==""`) and clusterScope is true or (d2) the request
 * specifies a namespace and least one member of namespaces matches the request's namespace.
 */
class ResourcePolicyRule
{
    /** @var string[] */
    #[Kubernetes\Attribute('apiGroups', required: true)]
    protected array $apiGroups;

    #[Kubernetes\Attribute('clusterScope')]
    protected bool|null $clusterScope = null;

    /** @var string[]|null */
    #[Kubernetes\Attribute('namespaces')]
    protected array|null $namespaces = null;

    /** @var string[] */
    #[Kubernetes\Attribute('resources', required: true)]
    protected array $resources;

    /** @var string[] */
    #[Kubernetes\Attribute('verbs', required: true)]
    protected array $verbs;

    /**
     * @param string[] $apiGroups
     * @param string[] $resources
     * @param string[] $verbs
     */
    public function __construct(array $apiGroups, array $resources, array $verbs)
    {
        $this->apiGroups = $apiGroups;
        $this->resources = $resources;
        $this->verbs = $verbs;
    }

    /**
     * `apiGroups` is a list of matching API groups and may not be empty. "*" matches all API groups and,
     * if present, must be the only entry. Required.
     */
    public function getApiGroups(): array
    {
        return $this->apiGroups;
    }

    /**
     * `apiGroups` is a list of matching API groups and may not be empty. "*" matches all API groups and,
     * if present, must be the only entry. Required.
     *
     * @return static
     */
    public function setApiGroups(array $apiGroups): static
    {
        $this->apiGroups = $apiGroups;

        return $this;
    }

    /**
     * `clusterScope` indicates whether to match requests that do not specify a namespace (which happens
     * either because the resource is not namespaced or the request targets all namespaces). If this field
     * is omitted or false then the `namespaces` field must contain a non-empty list.
     */
    public function isClusterScope(): bool|null
    {
        return $this->clusterScope;
    }

    /**
     * `clusterScope` indicates whether to match requests that do not specify a namespace (which happens
     * either because the resource is not namespaced or the request targets all namespaces). If this field
     * is omitted or false then the `namespaces` field must contain a non-empty list.
     *
     * @return static
     */
    public function setIsClusterScope(bool $clusterScope): static
    {
        $this->clusterScope = $clusterScope;

        return $this;
    }

    /**
     * `namespaces` is a list of target namespaces that restricts matches.  A request that specifies a
     * target namespace matches only if either (a) this list contains that target namespace or (b) this
     * list contains "*".  Note that "*" matches any specified namespace but does not match a request that
     * _does not specify_ a namespace (see the `clusterScope` field for that). This list may be empty, but
     * only if `clusterScope` is true.
     */
    public function getNamespaces(): array|null
    {
        return $this->namespaces;
    }

    /**
     * `namespaces` is a list of target namespaces that restricts matches.  A request that specifies a
     * target namespace matches only if either (a) this list contains that target namespace or (b) this
     * list contains "*".  Note that "*" matches any specified namespace but does not match a request that
     * _does not specify_ a namespace (see the `clusterScope` field for that). This list may be empty, but
     * only if `clusterScope` is true.
     *
     * @return static
     */
    public function setNamespaces(array $namespaces): static
    {
        $this->namespaces = $namespaces;

        return $this;
    }

    /**
     * `resources` is a list of matching resources (i.e., lowercase and plural) with, if desired,
     * subresource.  For example, [ "services", "nodes/status" ].  This list may not be empty. "*" matches
     * all resources and, if present, must be the only entry. Required.
     */
    public function getResources(): array
    {
        return $this->resources;
    }

    /**
     * `resources` is a list of matching resources (i.e., lowercase and plural) with, if desired,
     * subresource.  For example, [ "services", "nodes/status" ].  This list may not be empty. "*" matches
     * all resources and, if present, must be the only entry. Required.
     *
     * @return static
     */
    public function setResources(array $resources): static
    {
        $this->resources = $resources;

        return $this;
    }

    /**
     * `verbs` is a list of matching verbs and may not be empty. "*" matches all verbs and, if present,
     * must be the only entry. Required.
     */
    public function getVerbs(): array
    {
        return $this->verbs;
    }

    /**
     * `verbs` is a list of matching verbs and may not be empty. "*" matches all verbs and, if present,
     * must be the only entry. Required.
     *
     * @return static
     */
    public function setVerbs(array $verbs): static
    {
        $this->verbs = $verbs;

        return $this;
    }
}
