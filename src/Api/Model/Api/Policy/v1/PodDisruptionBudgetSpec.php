<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Policy\v1;

use Kcs\K8s\Api\Model\ApiMachinery\Apis\Meta\v1\LabelSelector;
use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;

/**
 * PodDisruptionBudgetSpec is a description of a PodDisruptionBudget.
 */
class PodDisruptionBudgetSpec
{
    #[Kubernetes\Attribute('maxUnavailable')]
    protected int|string|null $maxUnavailable = null;

    #[Kubernetes\Attribute('minAvailable')]
    protected int|string|null $minAvailable = null;

    #[Kubernetes\Attribute('selector', type: AttributeType::Model, model: LabelSelector::class)]
    protected LabelSelector|null $selector = null;

    #[Kubernetes\Attribute('unhealthyPodEvictionPolicy')]
    protected string|null $unhealthyPodEvictionPolicy = null;

    public function __construct(
        int|string|null $maxUnavailable = null,
        int|string|null $minAvailable = null,
        LabelSelector|null $selector = null,
        string|null $unhealthyPodEvictionPolicy = null,
    ) {
        $this->maxUnavailable = $maxUnavailable;
        $this->minAvailable = $minAvailable;
        $this->selector = $selector;
        $this->unhealthyPodEvictionPolicy = $unhealthyPodEvictionPolicy;
    }

    /**
     * An eviction is allowed if at most "maxUnavailable" pods selected by "selector" are unavailable after
     * the eviction, i.e. even in absence of the evicted pod. For example, one can prevent all voluntary
     * evictions by specifying 0. This is a mutually exclusive setting with "minAvailable".
     */
    public function getMaxUnavailable(): int|string
    {
        return $this->maxUnavailable;
    }

    /**
     * An eviction is allowed if at most "maxUnavailable" pods selected by "selector" are unavailable after
     * the eviction, i.e. even in absence of the evicted pod. For example, one can prevent all voluntary
     * evictions by specifying 0. This is a mutually exclusive setting with "minAvailable".
     *
     * @return static
     */
    public function setMaxUnavailable(int|string $maxUnavailable): static
    {
        $this->maxUnavailable = $maxUnavailable;

        return $this;
    }

    /**
     * An eviction is allowed if at least "minAvailable" pods selected by "selector" will still be
     * available after the eviction, i.e. even in the absence of the evicted pod.  So for example you can
     * prevent all voluntary evictions by specifying "100%".
     */
    public function getMinAvailable(): int|string
    {
        return $this->minAvailable;
    }

    /**
     * An eviction is allowed if at least "minAvailable" pods selected by "selector" will still be
     * available after the eviction, i.e. even in the absence of the evicted pod.  So for example you can
     * prevent all voluntary evictions by specifying "100%".
     *
     * @return static
     */
    public function setMinAvailable(int|string $minAvailable): static
    {
        $this->minAvailable = $minAvailable;

        return $this;
    }

    /**
     * Label query over pods whose evictions are managed by the disruption budget. A null selector will
     * match no pods, while an empty ({}) selector will select all pods within the namespace.
     */
    public function getSelector(): LabelSelector|null
    {
        return $this->selector;
    }

    /**
     * Label query over pods whose evictions are managed by the disruption budget. A null selector will
     * match no pods, while an empty ({}) selector will select all pods within the namespace.
     *
     * @return static
     */
    public function setSelector(LabelSelector $selector): static
    {
        $this->selector = $selector;

        return $this;
    }

    /**
     * UnhealthyPodEvictionPolicy defines the criteria for when unhealthy pods should be considered for
     * eviction. Current implementation considers healthy pods, as pods that have status.conditions item
     * with type="Ready",status="True".
     *
     * Valid policies are IfHealthyBudget and AlwaysAllow. If no policy is specified, the default behavior
     * will be used, which corresponds to the IfHealthyBudget policy.
     *
     * IfHealthyBudget policy means that running pods (status.phase="Running"), but not yet healthy can be
     * evicted only if the guarded application is not disrupted (status.currentHealthy is at least equal to
     * status.desiredHealthy). Healthy pods will be subject to the PDB for eviction.
     *
     * AlwaysAllow policy means that all running pods (status.phase="Running"), but not yet healthy are
     * considered disrupted and can be evicted regardless of whether the criteria in a PDB is met. This
     * means perspective running pods of a disrupted application might not get a chance to become healthy.
     * Healthy pods will be subject to the PDB for eviction.
     *
     * Additional policies may be added in the future. Clients making eviction decisions should disallow
     * eviction of unhealthy pods if they encounter an unrecognized policy in this field.
     *
     * This field is beta-level. The eviction API uses this field when the feature gate
     * PDBUnhealthyPodEvictionPolicy is enabled (enabled by default).
     */
    public function getUnhealthyPodEvictionPolicy(): string|null
    {
        return $this->unhealthyPodEvictionPolicy;
    }

    /**
     * UnhealthyPodEvictionPolicy defines the criteria for when unhealthy pods should be considered for
     * eviction. Current implementation considers healthy pods, as pods that have status.conditions item
     * with type="Ready",status="True".
     *
     * Valid policies are IfHealthyBudget and AlwaysAllow. If no policy is specified, the default behavior
     * will be used, which corresponds to the IfHealthyBudget policy.
     *
     * IfHealthyBudget policy means that running pods (status.phase="Running"), but not yet healthy can be
     * evicted only if the guarded application is not disrupted (status.currentHealthy is at least equal to
     * status.desiredHealthy). Healthy pods will be subject to the PDB for eviction.
     *
     * AlwaysAllow policy means that all running pods (status.phase="Running"), but not yet healthy are
     * considered disrupted and can be evicted regardless of whether the criteria in a PDB is met. This
     * means perspective running pods of a disrupted application might not get a chance to become healthy.
     * Healthy pods will be subject to the PDB for eviction.
     *
     * Additional policies may be added in the future. Clients making eviction decisions should disallow
     * eviction of unhealthy pods if they encounter an unrecognized policy in this field.
     *
     * This field is beta-level. The eviction API uses this field when the feature gate
     * PDBUnhealthyPodEvictionPolicy is enabled (enabled by default).
     *
     * @return static
     */
    public function setUnhealthyPodEvictionPolicy(string $unhealthyPodEvictionPolicy): static
    {
        $this->unhealthyPodEvictionPolicy = $unhealthyPodEvictionPolicy;

        return $this;
    }
}
