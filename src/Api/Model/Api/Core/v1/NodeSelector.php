<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Core\v1;

use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;
use Kcs\K8s\Collection;

/**
 * A node selector represents the union of the results of one or more label queries over a set of
 * nodes; that is, it represents the OR of the selectors represented by the node selector terms.
 */
class NodeSelector
{
    /** @var iterable|NodeSelectorTerm[] */
    #[Kubernetes\Attribute('nodeSelectorTerms', type: AttributeType::Collection, model: NodeSelectorTerm::class, required: true)]
    protected iterable $nodeSelectorTerms;

    /** @param iterable|NodeSelectorTerm[] $nodeSelectorTerms */
    public function __construct(iterable $nodeSelectorTerms)
    {
        $this->nodeSelectorTerms = new Collection($nodeSelectorTerms);
    }

    /**
     * Required. A list of node selector terms. The terms are ORed.
     *
     * @return iterable|NodeSelectorTerm[]
     */
    public function getNodeSelectorTerms(): iterable
    {
        return $this->nodeSelectorTerms;
    }

    /**
     * Required. A list of node selector terms. The terms are ORed.
     *
     * @return static
     */
    public function setNodeSelectorTerms(iterable $nodeSelectorTerms): static
    {
        $this->nodeSelectorTerms = $nodeSelectorTerms;

        return $this;
    }

    /** @return static */
    public function addNodeSelectorTerms(NodeSelectorTerm $nodeSelectorTerm): static
    {
        if (! $this->nodeSelectorTerms) {
            $this->nodeSelectorTerms = new Collection();
        }

        $this->nodeSelectorTerms[] = $nodeSelectorTerm;

        return $this;
    }
}
