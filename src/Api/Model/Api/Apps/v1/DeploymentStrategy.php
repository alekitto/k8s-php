<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Apps\v1;

use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;

/**
 * DeploymentStrategy describes how to replace existing pods with new ones.
 */
class DeploymentStrategy
{
    #[Kubernetes\Attribute('rollingUpdate', type: AttributeType::Model, model: RollingUpdateDeployment::class)]
    protected RollingUpdateDeployment|null $rollingUpdate = null;

    #[Kubernetes\Attribute('type')]
    protected string|null $type = null;

    public function __construct(RollingUpdateDeployment|null $rollingUpdate = null, string|null $type = null)
    {
        $this->rollingUpdate = $rollingUpdate;
        $this->type = $type;
    }

    /**
     * Rolling update config params. Present only if DeploymentStrategyType = RollingUpdate.
     */
    public function getRollingUpdate(): RollingUpdateDeployment|null
    {
        return $this->rollingUpdate;
    }

    /**
     * Rolling update config params. Present only if DeploymentStrategyType = RollingUpdate.
     *
     * @return static
     */
    public function setRollingUpdate(RollingUpdateDeployment $rollingUpdate): static
    {
        $this->rollingUpdate = $rollingUpdate;

        return $this;
    }

    /**
     * Type of deployment. Can be "Recreate" or "RollingUpdate". Default is RollingUpdate.
     */
    public function getType(): string|null
    {
        return $this->type;
    }

    /**
     * Type of deployment. Can be "Recreate" or "RollingUpdate". Default is RollingUpdate.
     *
     * @return static
     */
    public function setType(string $type): static
    {
        $this->type = $type;

        return $this;
    }
}
