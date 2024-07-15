<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\AdmissionRegistration\v1beta1;

use Kcs\K8s\Attribute as Kubernetes;

/**
 * NamedRuleWithOperations is a tuple of Operations and Resources with ResourceNames.
 */
class NamedRuleWithOperations
{
    /** @var string[]|null */
    #[Kubernetes\Attribute('apiGroups')]
    protected array|null $apiGroups = null;

    /** @var string[]|null */
    #[Kubernetes\Attribute('apiVersions')]
    protected array|null $apiVersions = null;

    /** @var string[]|null */
    #[Kubernetes\Attribute('operations')]
    protected array|null $operations = null;

    /** @var string[]|null */
    #[Kubernetes\Attribute('resourceNames')]
    protected array|null $resourceNames = null;

    /** @var string[]|null */
    #[Kubernetes\Attribute('resources')]
    protected array|null $resources = null;

    #[Kubernetes\Attribute('scope')]
    protected string|null $scope = null;

    /**
     * APIGroups is the API groups the resources belong to. '*' is all groups. If '*' is present, the
     * length of the slice must be one. Required.
     */
    public function getApiGroups(): array|null
    {
        return $this->apiGroups;
    }

    /**
     * APIGroups is the API groups the resources belong to. '*' is all groups. If '*' is present, the
     * length of the slice must be one. Required.
     *
     * @return static
     */
    public function setApiGroups(array $apiGroups): static
    {
        $this->apiGroups = $apiGroups;

        return $this;
    }

    /**
     * APIVersions is the API versions the resources belong to. '*' is all versions. If '*' is present, the
     * length of the slice must be one. Required.
     */
    public function getApiVersions(): array|null
    {
        return $this->apiVersions;
    }

    /**
     * APIVersions is the API versions the resources belong to. '*' is all versions. If '*' is present, the
     * length of the slice must be one. Required.
     *
     * @return static
     */
    public function setApiVersions(array $apiVersions): static
    {
        $this->apiVersions = $apiVersions;

        return $this;
    }

    /**
     * Operations is the operations the admission hook cares about - CREATE, UPDATE, DELETE, CONNECT or *
     * for all of those operations and any future admission operations that are added. If '*' is present,
     * the length of the slice must be one. Required.
     */
    public function getOperations(): array|null
    {
        return $this->operations;
    }

    /**
     * Operations is the operations the admission hook cares about - CREATE, UPDATE, DELETE, CONNECT or *
     * for all of those operations and any future admission operations that are added. If '*' is present,
     * the length of the slice must be one. Required.
     *
     * @return static
     */
    public function setOperations(array $operations): static
    {
        $this->operations = $operations;

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
     * Resources is a list of resources this rule applies to.
     *
     * For example: 'pods' means pods. 'pods/log' means the log subresource of pods. '*' means all
     * resources, but not subresources. 'pods/*' means all subresources of pods. '* /scale' means all scale
     * subresources. '* /*' means all resources and their subresources.
     *
     * If wildcard is present, the validation rule will ensure resources do not overlap with each other.
     *
     * Depending on the enclosing object, subresources might not be allowed. Required.
     */
    public function getResources(): array|null
    {
        return $this->resources;
    }

    /**
     * Resources is a list of resources this rule applies to.
     *
     * For example: 'pods' means pods. 'pods/log' means the log subresource of pods. '*' means all
     * resources, but not subresources. 'pods/*' means all subresources of pods. '* /scale' means all scale
     * subresources. '* /*' means all resources and their subresources.
     *
     * If wildcard is present, the validation rule will ensure resources do not overlap with each other.
     *
     * Depending on the enclosing object, subresources might not be allowed. Required.
     *
     * @return static
     */
    public function setResources(array $resources): static
    {
        $this->resources = $resources;

        return $this;
    }

    /**
     * scope specifies the scope of this rule. Valid values are "Cluster", "Namespaced", and "*" "Cluster"
     * means that only cluster-scoped resources will match this rule. Namespace API objects are
     * cluster-scoped. "Namespaced" means that only namespaced resources will match this rule. "*" means
     * that there are no scope restrictions. Subresources match the scope of their parent resource. Default
     * is "*".
     */
    public function getScope(): string|null
    {
        return $this->scope;
    }

    /**
     * scope specifies the scope of this rule. Valid values are "Cluster", "Namespaced", and "*" "Cluster"
     * means that only cluster-scoped resources will match this rule. Namespace API objects are
     * cluster-scoped. "Namespaced" means that only namespaced resources will match this rule. "*" means
     * that there are no scope restrictions. Subresources match the scope of their parent resource. Default
     * is "*".
     *
     * @return static
     */
    public function setScope(string $scope): static
    {
        $this->scope = $scope;

        return $this;
    }
}
