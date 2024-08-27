<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Core\v1;

use Kcs\K8s\Attribute as Kubernetes;

/**
 * ResourceHealth represents the health of a resource. It has the latest device health information.
 * This is a part of KEP https://kep.k8s.io/4680 and historical health changes are planned to be added
 * in future iterations of a KEP.
 */
class ResourceHealth
{
    #[Kubernetes\Attribute('health')]
    protected string|null $health = null;

    #[Kubernetes\Attribute('resourceID', required: true)]
    protected string $resourceID;

    public function __construct(string $resourceID)
    {
        $this->resourceID = $resourceID;
    }

    /**
     * Health of the resource. can be one of:
     *  - Healthy: operates as normal
     *  - Unhealthy: reported unhealthy. We consider this a temporary health issue
     *               since we do not have a mechanism today to distinguish
     *               temporary and permanent issues.
     *  - Unknown: The status cannot be determined.
     *             For example, Device Plugin got unregistered and hasn't been re-registered since.
     *
     * In future we may want to introduce the PermanentlyUnhealthy Status.
     */
    public function getHealth(): string|null
    {
        return $this->health;
    }

    /**
     * Health of the resource. can be one of:
     *  - Healthy: operates as normal
     *  - Unhealthy: reported unhealthy. We consider this a temporary health issue
     *               since we do not have a mechanism today to distinguish
     *               temporary and permanent issues.
     *  - Unknown: The status cannot be determined.
     *             For example, Device Plugin got unregistered and hasn't been re-registered since.
     *
     * In future we may want to introduce the PermanentlyUnhealthy Status.
     *
     * @return static
     */
    public function setHealth(string $health): static
    {
        $this->health = $health;

        return $this;
    }

    /**
     * ResourceID is the unique identifier of the resource. See the ResourceID type for more information.
     */
    public function getResourceID(): string
    {
        return $this->resourceID;
    }

    /**
     * ResourceID is the unique identifier of the resource. See the ResourceID type for more information.
     *
     * @return static
     */
    public function setResourceID(string $resourceID): static
    {
        $this->resourceID = $resourceID;

        return $this;
    }
}
