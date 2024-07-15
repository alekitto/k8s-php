<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Apps\v1;

use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;

/**
 * DaemonSetUpdateStrategy is a struct used to control the update strategy for a DaemonSet.
 */
class DaemonSetUpdateStrategy
{
    #[Kubernetes\Attribute('rollingUpdate', type: AttributeType::Model, model: RollingUpdateDaemonSet::class)]
    protected RollingUpdateDaemonSet|null $rollingUpdate = null;

    #[Kubernetes\Attribute('type')]
    protected string|null $type = null;

    public function __construct(RollingUpdateDaemonSet|null $rollingUpdate = null, string|null $type = null)
    {
        $this->rollingUpdate = $rollingUpdate;
        $this->type = $type;
    }

    /**
     * Rolling update config params. Present only if type = "RollingUpdate".
     */
    public function getRollingUpdate(): RollingUpdateDaemonSet|null
    {
        return $this->rollingUpdate;
    }

    /**
     * Rolling update config params. Present only if type = "RollingUpdate".
     *
     * @return static
     */
    public function setRollingUpdate(RollingUpdateDaemonSet $rollingUpdate): static
    {
        $this->rollingUpdate = $rollingUpdate;

        return $this;
    }

    /**
     * Type of daemon set update. Can be "RollingUpdate" or "OnDelete". Default is RollingUpdate.
     */
    public function getType(): string|null
    {
        return $this->type;
    }

    /**
     * Type of daemon set update. Can be "RollingUpdate" or "OnDelete". Default is RollingUpdate.
     *
     * @return static
     */
    public function setType(string $type): static
    {
        $this->type = $type;

        return $this;
    }
}
