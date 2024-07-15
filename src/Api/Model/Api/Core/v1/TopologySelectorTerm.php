<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Core\v1;

use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;
use Kcs\K8s\Collection;

/**
 * A topology selector term represents the result of label queries. A null or empty topology selector
 * term matches no objects. The requirements of them are ANDed. It provides a subset of functionality
 * as NodeSelectorTerm. This is an alpha feature and may change in the future.
 */
class TopologySelectorTerm
{
    /** @var iterable|TopologySelectorLabelRequirement[]|null */
    #[Kubernetes\Attribute(
        'matchLabelExpressions',
        type: AttributeType::Collection,
        model: TopologySelectorLabelRequirement::class,
    )]
    protected $matchLabelExpressions = null;

    /** @param iterable|TopologySelectorLabelRequirement[] $matchLabelExpressions */
    public function __construct(iterable $matchLabelExpressions = [])
    {
        $this->matchLabelExpressions = new Collection($matchLabelExpressions);
    }

    /**
     * A list of topology selector requirements by labels.
     *
     * @return iterable|TopologySelectorLabelRequirement[]
     */
    public function getMatchLabelExpressions(): iterable|null
    {
        return $this->matchLabelExpressions;
    }

    /**
     * A list of topology selector requirements by labels.
     *
     * @return static
     */
    public function setMatchLabelExpressions(iterable $matchLabelExpressions): static
    {
        $this->matchLabelExpressions = $matchLabelExpressions;

        return $this;
    }

    /** @return static */
    public function addMatchLabelExpressions(TopologySelectorLabelRequirement $matchLabelExpression): static
    {
        if (! $this->matchLabelExpressions) {
            $this->matchLabelExpressions = new Collection();
        }

        $this->matchLabelExpressions[] = $matchLabelExpression;

        return $this;
    }
}
