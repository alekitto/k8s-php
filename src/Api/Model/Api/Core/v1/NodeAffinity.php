<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Core\v1;

use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;
use Kcs\K8s\Collection;

/**
 * Node affinity is a group of node affinity scheduling rules.
 */
class NodeAffinity
{
    /** @var iterable|PreferredSchedulingTerm[]|null */
    #[Kubernetes\Attribute(
        'preferredDuringSchedulingIgnoredDuringExecution',
        type: AttributeType::Collection,
        model: PreferredSchedulingTerm::class,
    )]
    protected $preferredDuringSchedulingIgnoredDuringExecution = null;

    #[Kubernetes\Attribute(
        'requiredDuringSchedulingIgnoredDuringExecution',
        type: AttributeType::Model,
        model: NodeSelector::class,
    )]
    protected NodeSelector|null $requiredDuringSchedulingIgnoredDuringExecution = null;

    /** @param iterable|PreferredSchedulingTerm[] $preferredDuringSchedulingIgnoredDuringExecution */
    public function __construct(
        iterable $preferredDuringSchedulingIgnoredDuringExecution = [],
        NodeSelector|null $requiredDuringSchedulingIgnoredDuringExecution = null,
    ) {
        $this->preferredDuringSchedulingIgnoredDuringExecution = new Collection($preferredDuringSchedulingIgnoredDuringExecution);
        $this->requiredDuringSchedulingIgnoredDuringExecution = $requiredDuringSchedulingIgnoredDuringExecution;
    }

    /**
     * The scheduler will prefer to schedule pods to nodes that satisfy the affinity expressions specified
     * by this field, but it may choose a node that violates one or more of the expressions. The node that
     * is most preferred is the one with the greatest sum of weights, i.e. for each node that meets all of
     * the scheduling requirements (resource request, requiredDuringScheduling affinity expressions, etc.),
     * compute a sum by iterating through the elements of this field and adding "weight" to the sum if the
     * node matches the corresponding matchExpressions; the node(s) with the highest sum are the most
     * preferred.
     *
     * @return iterable|PreferredSchedulingTerm[]
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
     * node matches the corresponding matchExpressions; the node(s) with the highest sum are the most
     * preferred.
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
        PreferredSchedulingTerm $preferredDuringSchedulingIgnoredDuringExecution,
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
     * at some point during pod execution (e.g. due to an update), the system may or may not try to
     * eventually evict the pod from its node.
     */
    public function getRequiredDuringSchedulingIgnoredDuringExecution(): NodeSelector|null
    {
        return $this->requiredDuringSchedulingIgnoredDuringExecution;
    }

    /**
     * If the affinity requirements specified by this field are not met at scheduling time, the pod will
     * not be scheduled onto the node. If the affinity requirements specified by this field cease to be met
     * at some point during pod execution (e.g. due to an update), the system may or may not try to
     * eventually evict the pod from its node.
     *
     * @return static
     */
    public function setRequiredDuringSchedulingIgnoredDuringExecution(
        NodeSelector $requiredDuringSchedulingIgnoredDuringExecution,
    ): static {
        $this->requiredDuringSchedulingIgnoredDuringExecution = $requiredDuringSchedulingIgnoredDuringExecution;

        return $this;
    }
}
