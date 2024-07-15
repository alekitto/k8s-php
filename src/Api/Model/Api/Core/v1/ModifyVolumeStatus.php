<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Core\v1;

use Kcs\K8s\Attribute as Kubernetes;

/**
 * ModifyVolumeStatus represents the status object of ControllerModifyVolume operation
 */
class ModifyVolumeStatus
{
    #[Kubernetes\Attribute('status', required: true)]
    protected string $status;

    #[Kubernetes\Attribute('targetVolumeAttributesClassName')]
    protected string|null $targetVolumeAttributesClassName = null;

    public function __construct(string $status)
    {
        $this->status = $status;
    }

    /**
     * status is the status of the ControllerModifyVolume operation. It can be in any of following states:
     *  - Pending
     *    Pending indicates that the PersistentVolumeClaim cannot be modified due to unmet requirements,
     * such as
     *    the specified VolumeAttributesClass not existing.
     *  - InProgress
     *    InProgress indicates that the volume is being modified.
     *  - Infeasible
     *   Infeasible indicates that the request has been rejected as invalid by the CSI driver. To
     *       resolve the error, a valid VolumeAttributesClass needs to be specified.
     * Note: New statuses can be added in the future. Consumers should check for unknown statuses and fail
     * appropriately.
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * status is the status of the ControllerModifyVolume operation. It can be in any of following states:
     *  - Pending
     *    Pending indicates that the PersistentVolumeClaim cannot be modified due to unmet requirements,
     * such as
     *    the specified VolumeAttributesClass not existing.
     *  - InProgress
     *    InProgress indicates that the volume is being modified.
     *  - Infeasible
     *   Infeasible indicates that the request has been rejected as invalid by the CSI driver. To
     *       resolve the error, a valid VolumeAttributesClass needs to be specified.
     * Note: New statuses can be added in the future. Consumers should check for unknown statuses and fail
     * appropriately.
     *
     * @return static
     */
    public function setStatus(string $status): static
    {
        $this->status = $status;

        return $this;
    }

    /**
     * targetVolumeAttributesClassName is the name of the VolumeAttributesClass the PVC currently being
     * reconciled
     */
    public function getTargetVolumeAttributesClassName(): string|null
    {
        return $this->targetVolumeAttributesClassName;
    }

    /**
     * targetVolumeAttributesClassName is the name of the VolumeAttributesClass the PVC currently being
     * reconciled
     *
     * @return static
     */
    public function setTargetVolumeAttributesClassName(string $targetVolumeAttributesClassName): static
    {
        $this->targetVolumeAttributesClassName = $targetVolumeAttributesClassName;

        return $this;
    }
}
