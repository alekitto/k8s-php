<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Apps\v1;

use Kcs\K8s\Attribute as Kubernetes;

/**
 * StatefulSetPersistentVolumeClaimRetentionPolicy describes the policy used for PVCs created from the
 * StatefulSet VolumeClaimTemplates.
 */
class StatefulSetPersistentVolumeClaimRetentionPolicy
{
    #[Kubernetes\Attribute('whenDeleted')]
    protected string|null $whenDeleted = null;

    #[Kubernetes\Attribute('whenScaled')]
    protected string|null $whenScaled = null;

    public function __construct(string|null $whenDeleted = null, string|null $whenScaled = null)
    {
        $this->whenDeleted = $whenDeleted;
        $this->whenScaled = $whenScaled;
    }

    /**
     * WhenDeleted specifies what happens to PVCs created from StatefulSet VolumeClaimTemplates when the
     * StatefulSet is deleted. The default policy of `Retain` causes PVCs to not be affected by StatefulSet
     * deletion. The `Delete` policy causes those PVCs to be deleted.
     */
    public function getWhenDeleted(): string|null
    {
        return $this->whenDeleted;
    }

    /**
     * WhenDeleted specifies what happens to PVCs created from StatefulSet VolumeClaimTemplates when the
     * StatefulSet is deleted. The default policy of `Retain` causes PVCs to not be affected by StatefulSet
     * deletion. The `Delete` policy causes those PVCs to be deleted.
     *
     * @return static
     */
    public function setWhenDeleted(string $whenDeleted): static
    {
        $this->whenDeleted = $whenDeleted;

        return $this;
    }

    /**
     * WhenScaled specifies what happens to PVCs created from StatefulSet VolumeClaimTemplates when the
     * StatefulSet is scaled down. The default policy of `Retain` causes PVCs to not be affected by a
     * scaledown. The `Delete` policy causes the associated PVCs for any excess pods above the replica
     * count to be deleted.
     */
    public function getWhenScaled(): string|null
    {
        return $this->whenScaled;
    }

    /**
     * WhenScaled specifies what happens to PVCs created from StatefulSet VolumeClaimTemplates when the
     * StatefulSet is scaled down. The default policy of `Retain` causes PVCs to not be affected by a
     * scaledown. The `Delete` policy causes the associated PVCs for any excess pods above the replica
     * count to be deleted.
     *
     * @return static
     */
    public function setWhenScaled(string $whenScaled): static
    {
        $this->whenScaled = $whenScaled;

        return $this;
    }
}
