<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Apps\v1;

use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;

/**
 * StatefulSetUpdateStrategy indicates the strategy that the StatefulSet controller will use to perform
 * updates. It includes any additional parameters necessary to perform the update for the indicated
 * strategy.
 */
class StatefulSetUpdateStrategy
{
    #[Kubernetes\Attribute('rollingUpdate', type: AttributeType::Model, model: RollingUpdateStatefulSetStrategy::class)]
    protected RollingUpdateStatefulSetStrategy|null $rollingUpdate = null;

    #[Kubernetes\Attribute('type')]
    protected string|null $type = null;

    public function __construct(RollingUpdateStatefulSetStrategy|null $rollingUpdate = null, string|null $type = null)
    {
        $this->rollingUpdate = $rollingUpdate;
        $this->type = $type;
    }

    /**
     * RollingUpdate is used to communicate parameters when Type is RollingUpdateStatefulSetStrategyType.
     */
    public function getRollingUpdate(): RollingUpdateStatefulSetStrategy|null
    {
        return $this->rollingUpdate;
    }

    /**
     * RollingUpdate is used to communicate parameters when Type is RollingUpdateStatefulSetStrategyType.
     *
     * @return static
     */
    public function setRollingUpdate(RollingUpdateStatefulSetStrategy $rollingUpdate): static
    {
        $this->rollingUpdate = $rollingUpdate;

        return $this;
    }

    /**
     * Type indicates the type of the StatefulSetUpdateStrategy. Default is RollingUpdate.
     */
    public function getType(): string|null
    {
        return $this->type;
    }

    /**
     * Type indicates the type of the StatefulSetUpdateStrategy. Default is RollingUpdate.
     *
     * @return static
     */
    public function setType(string $type): static
    {
        $this->type = $type;

        return $this;
    }
}
