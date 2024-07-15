<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\AutoScaling\v2;

use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;

/**
 * HorizontalPodAutoscalerBehavior configures the scaling behavior of the target in both Up and Down
 * directions (scaleUp and scaleDown fields respectively).
 */
class HorizontalPodAutoscalerBehavior
{
    #[Kubernetes\Attribute('scaleDown', type: AttributeType::Model, model: HPAScalingRules::class)]
    protected HPAScalingRules|null $scaleDown = null;

    #[Kubernetes\Attribute('scaleUp', type: AttributeType::Model, model: HPAScalingRules::class)]
    protected HPAScalingRules|null $scaleUp = null;

    public function __construct(HPAScalingRules|null $scaleDown = null, HPAScalingRules|null $scaleUp = null)
    {
        $this->scaleDown = $scaleDown;
        $this->scaleUp = $scaleUp;
    }

    /**
     * scaleDown is scaling policy for scaling Down. If not set, the default value is to allow to scale
     * down to minReplicas pods, with a 300 second stabilization window (i.e., the highest recommendation
     * for the last 300sec is used).
     */
    public function getScaleDown(): HPAScalingRules|null
    {
        return $this->scaleDown;
    }

    /**
     * scaleDown is scaling policy for scaling Down. If not set, the default value is to allow to scale
     * down to minReplicas pods, with a 300 second stabilization window (i.e., the highest recommendation
     * for the last 300sec is used).
     *
     * @return static
     */
    public function setScaleDown(HPAScalingRules $scaleDown): static
    {
        $this->scaleDown = $scaleDown;

        return $this;
    }

    /**
     * scaleUp is scaling policy for scaling Up. If not set, the default value is the higher of:
     *   * increase no more than 4 pods per 60 seconds
     *   * double the number of pods per 60 seconds
     * No stabilization is used.
     */
    public function getScaleUp(): HPAScalingRules|null
    {
        return $this->scaleUp;
    }

    /**
     * scaleUp is scaling policy for scaling Up. If not set, the default value is the higher of:
     *   * increase no more than 4 pods per 60 seconds
     *   * double the number of pods per 60 seconds
     * No stabilization is used.
     *
     * @return static
     */
    public function setScaleUp(HPAScalingRules $scaleUp): static
    {
        $this->scaleUp = $scaleUp;

        return $this;
    }
}
