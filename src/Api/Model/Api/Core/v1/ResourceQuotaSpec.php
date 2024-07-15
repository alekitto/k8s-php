<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Core\v1;

use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;

/**
 * ResourceQuotaSpec defines the desired hard limits to enforce for Quota.
 */
class ResourceQuotaSpec
{
    /** @var object[]|null */
    #[Kubernetes\Attribute('hard')]
    protected array|null $hard = null;

    #[Kubernetes\Attribute('scopeSelector', type: AttributeType::Model, model: ScopeSelector::class)]
    protected ScopeSelector|null $scopeSelector = null;

    /** @var string[]|null */
    #[Kubernetes\Attribute('scopes')]
    protected array|null $scopes = null;

    /**
     * @param object[]|null $hard
     * @param string[]|null $scopes
     */
    public function __construct(array|null $hard = null, ScopeSelector|null $scopeSelector = null, array|null $scopes = null)
    {
        $this->hard = $hard;
        $this->scopeSelector = $scopeSelector;
        $this->scopes = $scopes;
    }

    /**
     * hard is the set of desired hard limits for each named resource. More info:
     * https://kubernetes.io/docs/concepts/policy/resource-quotas/
     */
    public function getHard(): array|null
    {
        return $this->hard;
    }

    /**
     * hard is the set of desired hard limits for each named resource. More info:
     * https://kubernetes.io/docs/concepts/policy/resource-quotas/
     *
     * @return static
     */
    public function setHard(array $hard): static
    {
        $this->hard = $hard;

        return $this;
    }

    /**
     * scopeSelector is also a collection of filters like scopes that must match each object tracked by a
     * quota but expressed using ScopeSelectorOperator in combination with possible values. For a resource
     * to match, both scopes AND scopeSelector (if specified in spec), must be matched.
     */
    public function getScopeSelector(): ScopeSelector|null
    {
        return $this->scopeSelector;
    }

    /**
     * scopeSelector is also a collection of filters like scopes that must match each object tracked by a
     * quota but expressed using ScopeSelectorOperator in combination with possible values. For a resource
     * to match, both scopes AND scopeSelector (if specified in spec), must be matched.
     *
     * @return static
     */
    public function setScopeSelector(ScopeSelector $scopeSelector): static
    {
        $this->scopeSelector = $scopeSelector;

        return $this;
    }

    /**
     * A collection of filters that must match each object tracked by a quota. If not specified, the quota
     * matches all objects.
     */
    public function getScopes(): array|null
    {
        return $this->scopes;
    }

    /**
     * A collection of filters that must match each object tracked by a quota. If not specified, the quota
     * matches all objects.
     *
     * @return static
     */
    public function setScopes(array $scopes): static
    {
        $this->scopes = $scopes;

        return $this;
    }
}
