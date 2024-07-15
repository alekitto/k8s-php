<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Core\v1;

use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;
use Kcs\K8s\Collection;

/**
 * A scope selector represents the AND of the selectors represented by the scoped-resource selector
 * requirements.
 */
class ScopeSelector
{
    /** @var iterable|ScopedResourceSelectorRequirement[]|null */
    #[Kubernetes\Attribute('matchExpressions', type: AttributeType::Collection, model: ScopedResourceSelectorRequirement::class)]
    protected $matchExpressions = null;

    /** @param iterable|ScopedResourceSelectorRequirement[] $matchExpressions */
    public function __construct(iterable $matchExpressions = [])
    {
        $this->matchExpressions = new Collection($matchExpressions);
    }

    /**
     * A list of scope selector requirements by scope of the resources.
     *
     * @return iterable|ScopedResourceSelectorRequirement[]
     */
    public function getMatchExpressions(): iterable|null
    {
        return $this->matchExpressions;
    }

    /**
     * A list of scope selector requirements by scope of the resources.
     *
     * @return static
     */
    public function setMatchExpressions(iterable $matchExpressions): static
    {
        $this->matchExpressions = $matchExpressions;

        return $this;
    }

    /** @return static */
    public function addMatchExpressions(ScopedResourceSelectorRequirement $matchExpression): static
    {
        if (! $this->matchExpressions) {
            $this->matchExpressions = new Collection();
        }

        $this->matchExpressions[] = $matchExpression;

        return $this;
    }
}
