<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Core\v1;

use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;

/**
 * The weights of all of the matched WeightedPodAffinityTerm fields are added per-node to find the most
 * preferred node(s)
 */
class WeightedPodAffinityTerm
{
    #[Kubernetes\Attribute('podAffinityTerm', type: AttributeType::Model, model: PodAffinityTerm::class, required: true)]
    protected PodAffinityTerm $podAffinityTerm;

    #[Kubernetes\Attribute('weight', required: true)]
    protected int $weight;

    public function __construct(PodAffinityTerm $podAffinityTerm, int $weight)
    {
        $this->podAffinityTerm = $podAffinityTerm;
        $this->weight = $weight;
    }

    /**
     * Required. A pod affinity term, associated with the corresponding weight.
     */
    public function getPodAffinityTerm(): PodAffinityTerm
    {
        return $this->podAffinityTerm;
    }

    /**
     * Required. A pod affinity term, associated with the corresponding weight.
     *
     * @return static
     */
    public function setPodAffinityTerm(PodAffinityTerm $podAffinityTerm): static
    {
        $this->podAffinityTerm = $podAffinityTerm;

        return $this;
    }

    /**
     * weight associated with matching the corresponding podAffinityTerm, in the range 1-100.
     */
    public function getWeight(): int
    {
        return $this->weight;
    }

    /**
     * weight associated with matching the corresponding podAffinityTerm, in the range 1-100.
     *
     * @return static
     */
    public function setWeight(int $weight): static
    {
        $this->weight = $weight;

        return $this;
    }
}
