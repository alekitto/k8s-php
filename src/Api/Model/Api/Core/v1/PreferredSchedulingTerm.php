<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Core\v1;

use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;

/**
 * An empty preferred scheduling term matches all objects with implicit weight 0 (i.e. it's a no-op). A
 * null preferred scheduling term matches no objects (i.e. is also a no-op).
 */
class PreferredSchedulingTerm
{
    #[Kubernetes\Attribute('preference', type: AttributeType::Model, model: NodeSelectorTerm::class, required: true)]
    protected NodeSelectorTerm $preference;

    #[Kubernetes\Attribute('weight', required: true)]
    protected int $weight;

    public function __construct(NodeSelectorTerm $preference, int $weight)
    {
        $this->preference = $preference;
        $this->weight = $weight;
    }

    /**
     * A node selector term, associated with the corresponding weight.
     */
    public function getPreference(): NodeSelectorTerm
    {
        return $this->preference;
    }

    /**
     * A node selector term, associated with the corresponding weight.
     *
     * @return static
     */
    public function setPreference(NodeSelectorTerm $preference): static
    {
        $this->preference = $preference;

        return $this;
    }

    /**
     * Weight associated with matching the corresponding nodeSelectorTerm, in the range 1-100.
     */
    public function getWeight(): int
    {
        return $this->weight;
    }

    /**
     * Weight associated with matching the corresponding nodeSelectorTerm, in the range 1-100.
     *
     * @return static
     */
    public function setWeight(int $weight): static
    {
        $this->weight = $weight;

        return $this;
    }
}
