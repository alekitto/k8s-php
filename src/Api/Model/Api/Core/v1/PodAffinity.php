<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Core\v1;

use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;
use Kcs\K8s\Collection;

/**
 * Pod affinity is a group of inter pod affinity scheduling rules.
 */
class PodAffinity
{
    /** @var iterable|WeightedPodAffinityTerm[]|null */
    #[Kubernetes\Attribute(
        'preferredDuringSchedulingIgnoredDuringExecution',
        type: AttributeType::Collection,
        model: WeightedPodAffinityTerm::class,
    )]
    protected $preferredDuringSchedulingIgnoredDuringExecution = null;

    /** @var iterable|PodAffinityTerm[]|null */
    #[Kubernetes\Attribute(
        'requiredDuringSchedulingIgnoredDuringExecution',
        type: AttributeType::Collection,
        model: PodAffinityTerm::class,
    )]
    protected $requiredDuringSchedulingIgnoredDuringExecution = null;

    /**
     * @param iterable|WeightedPodAffinityTerm[] $preferredDuringSchedulingIgnoredDuringExecution
     * @param iterable|PodAffinityTerm[] $requiredDuringSchedulingIgnoredDuringExecution
     */
    public function __construct(
        iterable $preferredDuringSchedulingIgnoredDuringExecution = [],
        iterable $requiredDuringSchedulingIgnoredDuringExecution = [],
    ) {
        $this->preferredDuringSchedulingIgnoredDuringExecution = new Collection($preferredDuringSchedulingIgnoredDuringExecution);
        $this->requiredDuringSchedulingIgnoredDuringExecution = new Collection($requiredDuringSchedulingIgnoredDuringExecution);
    }

    /**
     * The scheduler will prefer to schedule pods to nodes that satisfy the affinity expressions specified
     * by this field, but it may choose a node that violates one or more of the expressions. The node that
     * is most preferred is the one with the greatest sum of weights, i.e. for each node that meets all of
     * the scheduling requirements (resource request, requiredDuringScheduling affinity expressions, etc.),
     * compute a sum by iterating through the elements of this field and adding "weight" to the sum if the
     * node has pods which matches the corresponding podAffinityTerm; the node(s) with the highest sum are
     * the most preferred.
     *
     * @return iterable|WeightedPodAffinityTerm[]
     */
    public function getPreferredDuringSchedulingIgnoredDuringExecution(): iterable|null
    {
        return $this->preferredDuringSchedulingIgnoredDuringExecution;
    }

    /**
     * The scheduler will prefer to schedule pods to nodes that satisfy the affinity expressions specified
     * by this field, but it may choose a node that violates one or more of the expressions. The node that
     * is most preferred is the one with the greatest sum of weights, i.e. for each node that meets all of
     * the scheduling requirements (resource request, requiredDuringScheduling affinity expressions, etc.),
     * compute a sum by iterating through the elements of this field and adding "weight" to the sum if the
     * node has pods which matches the corresponding podAffinityTerm; the node(s) with the highest sum are
     * the most preferred.
     *
     * @return static
     */
    public function setPreferredDuringSchedulingIgnoredDuringExecution(
        iterable $preferredDuringSchedulingIgnoredDuringExecution,
    ): static {
        $this->preferredDuringSchedulingIgnoredDuringExecution = $preferredDuringSchedulingIgnoredDuringExecution;

        return $this;
    }

    /** @return static */
    public function addPreferredDuringSchedulingIgnoredDuringExecution(
        WeightedPodAffinityTerm $preferredDuringSchedulingIgnoredDuringExecution,
    ): static {
        if (! $this->preferredDuringSchedulingIgnoredDuringExecution) {
            $this->preferredDuringSchedulingIgnoredDuringExecution = new Collection();
        }

        $this->preferredDuringSchedulingIgnoredDuringExecution[] = $preferredDuringSchedulingIgnoredDuringExecution;

        return $this;
    }

    /**
     * If the affinity requirements specified by this field are not met at scheduling time, the pod will
     * not be scheduled onto the node. If the affinity requirements specified by this field cease to be met
     * at some point during pod execution (e.g. due to a pod label update), the system may or may not try
     * to eventually evict the pod from its node. When there are multiple elements, the lists of nodes
     * corresponding to each podAffinityTerm are intersected, i.e. all terms must be satisfied.
     *
     * @return iterable|PodAffinityTerm[]
     */
    public function getRequiredDuringSchedulingIgnoredDuringExecution(): iterable|null
    {
        return $this->requiredDuringSchedulingIgnoredDuringExecution;
    }

    /**
     * If the affinity requirements specified by this field are not met at scheduling time, the pod will
     * not be scheduled onto the node. If the affinity requirements specified by this field cease to be met
     * at some point during pod execution (e.g. due to a pod label update), the system may or may not try
     * to eventually evict the pod from its node. When there are multiple elements, the lists of nodes
     * corresponding to each podAffinityTerm are intersected, i.e. all terms must be satisfied.
     *
     * @return static
     */
    public function setRequiredDuringSchedulingIgnoredDuringExecution(
        iterable $requiredDuringSchedulingIgnoredDuringExecution,
    ): static {
        $this->requiredDuringSchedulingIgnoredDuringExecution = $requiredDuringSchedulingIgnoredDuringExecution;

        return $this;
    }

    /** @return static */
    public function addRequiredDuringSchedulingIgnoredDuringExecution(
        PodAffinityTerm $requiredDuringSchedulingIgnoredDuringExecution,
    ): static {
        if (! $this->requiredDuringSchedulingIgnoredDuringExecution) {
            $this->requiredDuringSchedulingIgnoredDuringExecution = new Collection();
        }

        $this->requiredDuringSchedulingIgnoredDuringExecution[] = $requiredDuringSchedulingIgnoredDuringExecution;

        return $this;
    }
}
