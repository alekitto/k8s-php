<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Core\v1;

use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;
use Kcs\K8s\Collection;

/**
 * A null or empty node selector term matches no objects. The requirements of them are ANDed. The
 * TopologySelectorTerm type implements a subset of the NodeSelectorTerm.
 */
class NodeSelectorTerm
{
    /** @var iterable|NodeSelectorRequirement[]|null */
    #[Kubernetes\Attribute('matchExpressions', type: AttributeType::Collection, model: NodeSelectorRequirement::class)]
    protected $matchExpressions = null;

    /** @var iterable|NodeSelectorRequirement[]|null */
    #[Kubernetes\Attribute('matchFields', type: AttributeType::Collection, model: NodeSelectorRequirement::class)]
    protected $matchFields = null;

    /**
     * @param iterable|NodeSelectorRequirement[] $matchExpressions
     * @param iterable|NodeSelectorRequirement[] $matchFields
     */
    public function __construct(iterable $matchExpressions = [], iterable $matchFields = [])
    {
        $this->matchExpressions = new Collection($matchExpressions);
        $this->matchFields = new Collection($matchFields);
    }

    /**
     * A list of node selector requirements by node's labels.
     *
     * @return iterable|NodeSelectorRequirement[]
     */
    public function getMatchExpressions(): iterable|null
    {
        return $this->matchExpressions;
    }

    /**
     * A list of node selector requirements by node's labels.
     *
     * @return static
     */
    public function setMatchExpressions(iterable $matchExpressions): static
    {
        $this->matchExpressions = $matchExpressions;

        return $this;
    }

    /** @return static */
    public function addMatchExpressions(NodeSelectorRequirement $matchExpression): static
    {
        if (! $this->matchExpressions) {
            $this->matchExpressions = new Collection();
        }

        $this->matchExpressions[] = $matchExpression;

        return $this;
    }

    /**
     * A list of node selector requirements by node's fields.
     *
     * @return iterable|NodeSelectorRequirement[]
     */
    public function getMatchFields(): iterable|null
    {
        return $this->matchFields;
    }

    /**
     * A list of node selector requirements by node's fields.
     *
     * @return static
     */
    public function setMatchFields(iterable $matchFields): static
    {
        $this->matchFields = $matchFields;

        return $this;
    }

    /** @return static */
    public function addMatchFields(NodeSelectorRequirement $matchField): static
    {
        if (! $this->matchFields) {
            $this->matchFields = new Collection();
        }

        $this->matchFields[] = $matchField;

        return $this;
    }
}
