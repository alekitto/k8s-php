<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\AutoScaling\v2;

use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;
use Kcs\K8s\Collection;

/**
 * HPAScalingRules configures the scaling behavior for one direction. These Rules are applied after
 * calculating DesiredReplicas from metrics for the HPA. They can limit the scaling velocity by
 * specifying scaling policies. They can prevent flapping by specifying the stabilization window, so
 * that the number of replicas is not set instantly, instead, the safest value from the stabilization
 * window is chosen.
 */
class HPAScalingRules
{
    /** @var iterable|HPAScalingPolicy[]|null */
    #[Kubernetes\Attribute('policies', type: AttributeType::Collection, model: HPAScalingPolicy::class)]
    protected $policies = null;

    #[Kubernetes\Attribute('selectPolicy')]
    protected string|null $selectPolicy = null;

    #[Kubernetes\Attribute('stabilizationWindowSeconds')]
    protected int|null $stabilizationWindowSeconds = null;

    /** @param iterable|HPAScalingPolicy[] $policies */
    public function __construct(
        iterable $policies = [],
        string|null $selectPolicy = null,
        int|null $stabilizationWindowSeconds = null,
    ) {
        $this->policies = new Collection($policies);
        $this->selectPolicy = $selectPolicy;
        $this->stabilizationWindowSeconds = $stabilizationWindowSeconds;
    }

    /**
     * policies is a list of potential scaling polices which can be used during scaling. At least one
     * policy must be specified, otherwise the HPAScalingRules will be discarded as invalid
     *
     * @return iterable|HPAScalingPolicy[]
     */
    public function getPolicies(): iterable|null
    {
        return $this->policies;
    }

    /**
     * policies is a list of potential scaling polices which can be used during scaling. At least one
     * policy must be specified, otherwise the HPAScalingRules will be discarded as invalid
     *
     * @return static
     */
    public function setPolicies(iterable $policies): static
    {
        $this->policies = $policies;

        return $this;
    }

    /** @return static */
    public function addPolicies(HPAScalingPolicy $policie): static
    {
        if (! $this->policies) {
            $this->policies = new Collection();
        }

        $this->policies[] = $policie;

        return $this;
    }

    /**
     * selectPolicy is used to specify which policy should be used. If not set, the default value Max is
     * used.
     */
    public function getSelectPolicy(): string|null
    {
        return $this->selectPolicy;
    }

    /**
     * selectPolicy is used to specify which policy should be used. If not set, the default value Max is
     * used.
     *
     * @return static
     */
    public function setSelectPolicy(string $selectPolicy): static
    {
        $this->selectPolicy = $selectPolicy;

        return $this;
    }

    /**
     * stabilizationWindowSeconds is the number of seconds for which past recommendations should be
     * considered while scaling up or scaling down. StabilizationWindowSeconds must be greater than or
     * equal to zero and less than or equal to 3600 (one hour). If not set, use the default values: - For
     * scale up: 0 (i.e. no stabilization is done). - For scale down: 300 (i.e. the stabilization window is
     * 300 seconds long).
     */
    public function getStabilizationWindowSeconds(): int|null
    {
        return $this->stabilizationWindowSeconds;
    }

    /**
     * stabilizationWindowSeconds is the number of seconds for which past recommendations should be
     * considered while scaling up or scaling down. StabilizationWindowSeconds must be greater than or
     * equal to zero and less than or equal to 3600 (one hour). If not set, use the default values: - For
     * scale up: 0 (i.e. no stabilization is done). - For scale down: 300 (i.e. the stabilization window is
     * 300 seconds long).
     *
     * @return static
     */
    public function setStabilizationWindowSeconds(int $stabilizationWindowSeconds): static
    {
        $this->stabilizationWindowSeconds = $stabilizationWindowSeconds;

        return $this;
    }
}
