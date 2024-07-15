<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Apps\v1;

use Kcs\K8s\Attribute as Kubernetes;

/**
 * StatefulSetOrdinals describes the policy used for replica ordinal assignment in this StatefulSet.
 */
class StatefulSetOrdinals
{
    #[Kubernetes\Attribute('start')]
    protected int|null $start = null;

    public function __construct(int|null $start = null)
    {
        $this->start = $start;
    }

    /**
     * start is the number representing the first replica's index. It may be used to number replicas from
     * an alternate index (eg: 1-indexed) over the default 0-indexed names, or to orchestrate progressive
     * movement of replicas from one StatefulSet to another. If set, replica indices will be in the range:
     *   [.spec.ordinals.start, .spec.ordinals.start + .spec.replicas).
     * If unset, defaults to 0. Replica indices will be in the range:
     *   [0, .spec.replicas).
     */
    public function getStart(): int|null
    {
        return $this->start;
    }

    /**
     * start is the number representing the first replica's index. It may be used to number replicas from
     * an alternate index (eg: 1-indexed) over the default 0-indexed names, or to orchestrate progressive
     * movement of replicas from one StatefulSet to another. If set, replica indices will be in the range:
     *   [.spec.ordinals.start, .spec.ordinals.start + .spec.replicas).
     * If unset, defaults to 0. Replica indices will be in the range:
     *   [0, .spec.replicas).
     *
     * @return static
     */
    public function setStart(int $start): static
    {
        $this->start = $start;

        return $this;
    }
}
