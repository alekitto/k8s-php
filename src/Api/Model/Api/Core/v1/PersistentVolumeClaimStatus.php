<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Core\v1;

use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;
use Kcs\K8s\Collection;

/**
 * PersistentVolumeClaimStatus is the current status of a persistent volume claim.
 */
class PersistentVolumeClaimStatus
{
    /** @var string[]|null */
    #[Kubernetes\Attribute('accessModes')]
    protected array|null $accessModes = null;

    /** @var string[]|null */
    #[Kubernetes\Attribute('allocatedResourceStatuses')]
    protected array|null $allocatedResourceStatuses = null;

    /** @var object[]|null */
    #[Kubernetes\Attribute('allocatedResources')]
    protected array|null $allocatedResources = null;

    /** @var object[]|null */
    #[Kubernetes\Attribute('capacity')]
    protected array|null $capacity = null;

    /** @var iterable|PersistentVolumeClaimCondition[]|null */
    #[Kubernetes\Attribute('conditions', type: AttributeType::Collection, model: PersistentVolumeClaimCondition::class)]
    protected $conditions = null;

    #[Kubernetes\Attribute('currentVolumeAttributesClassName')]
    protected string|null $currentVolumeAttributesClassName = null;

    #[Kubernetes\Attribute('modifyVolumeStatus', type: AttributeType::Model, model: ModifyVolumeStatus::class)]
    protected ModifyVolumeStatus|null $modifyVolumeStatus = null;

    #[Kubernetes\Attribute('phase')]
    protected string|null $phase = null;

    /**
     * accessModes contains the actual access modes the volume backing the PVC has. More info:
     * https://kubernetes.io/docs/concepts/storage/persistent-volumes#access-modes-1
     */
    public function getAccessModes(): array|null
    {
        return $this->accessModes;
    }

    /**
     * accessModes contains the actual access modes the volume backing the PVC has. More info:
     * https://kubernetes.io/docs/concepts/storage/persistent-volumes#access-modes-1
     *
     * @return static
     */
    public function setAccessModes(array $accessModes): static
    {
        $this->accessModes = $accessModes;

        return $this;
    }

    /**
     * allocatedResourceStatuses stores status of resource being resized for the given PVC. Key names
     * follow standard Kubernetes label syntax. Valid values are either:
     *     * Un-prefixed keys:
     *         - storage - the capacity of the volume.
     *     * Custom resources must use implementation-defined prefixed names such as
     * "example.com/my-custom-resource"
     * Apart from above values - keys that are unprefixed or have kubernetes.io prefix are considered
     * reserved and hence may not be used.
     *
     * ClaimResourceStatus can be in any of following states:
     *     - ControllerResizeInProgress:
     *         State set when resize controller starts resizing the volume in control-plane.
     *     - ControllerResizeFailed:
     *         State set when resize has failed in resize controller with a terminal error.
     *     - NodeResizePending:
     *         State set when resize controller has finished resizing the volume but further resizing of
     *         volume is needed on the node.
     *     - NodeResizeInProgress:
     *         State set when kubelet starts resizing the volume.
     *     - NodeResizeFailed:
     *         State set when resizing has failed in kubelet with a terminal error. Transient errors don't set
     *         NodeResizeFailed.
     * For example: if expanding a PVC for more capacity - this field can be one of the following states:
     *     - pvc.status.allocatedResourceStatus['storage'] = "ControllerResizeInProgress"
     *      - pvc.status.allocatedResourceStatus['storage'] = "ControllerResizeFailed"
     *      - pvc.status.allocatedResourceStatus['storage'] = "NodeResizePending"
     *      - pvc.status.allocatedResourceStatus['storage'] = "NodeResizeInProgress"
     *      - pvc.status.allocatedResourceStatus['storage'] = "NodeResizeFailed"
     * When this field is not set, it means that no resize operation is in progress for the given PVC.
     *
     * A controller that receives PVC update with previously unknown resourceName or ClaimResourceStatus
     * should ignore the update for the purpose it was designed. For example - a controller that only is
     * responsible for resizing capacity of the volume, should ignore PVC updates that change other valid
     * resources associated with PVC.
     *
     * This is an alpha field and requires enabling RecoverVolumeExpansionFailure feature.
     */
    public function getAllocatedResourceStatuses(): array|null
    {
        return $this->allocatedResourceStatuses;
    }

    /**
     * allocatedResourceStatuses stores status of resource being resized for the given PVC. Key names
     * follow standard Kubernetes label syntax. Valid values are either:
     *     * Un-prefixed keys:
     *         - storage - the capacity of the volume.
     *     * Custom resources must use implementation-defined prefixed names such as
     * "example.com/my-custom-resource"
     * Apart from above values - keys that are unprefixed or have kubernetes.io prefix are considered
     * reserved and hence may not be used.
     *
     * ClaimResourceStatus can be in any of following states:
     *     - ControllerResizeInProgress:
     *         State set when resize controller starts resizing the volume in control-plane.
     *     - ControllerResizeFailed:
     *         State set when resize has failed in resize controller with a terminal error.
     *     - NodeResizePending:
     *         State set when resize controller has finished resizing the volume but further resizing of
     *         volume is needed on the node.
     *     - NodeResizeInProgress:
     *         State set when kubelet starts resizing the volume.
     *     - NodeResizeFailed:
     *         State set when resizing has failed in kubelet with a terminal error. Transient errors don't set
     *         NodeResizeFailed.
     * For example: if expanding a PVC for more capacity - this field can be one of the following states:
     *     - pvc.status.allocatedResourceStatus['storage'] = "ControllerResizeInProgress"
     *      - pvc.status.allocatedResourceStatus['storage'] = "ControllerResizeFailed"
     *      - pvc.status.allocatedResourceStatus['storage'] = "NodeResizePending"
     *      - pvc.status.allocatedResourceStatus['storage'] = "NodeResizeInProgress"
     *      - pvc.status.allocatedResourceStatus['storage'] = "NodeResizeFailed"
     * When this field is not set, it means that no resize operation is in progress for the given PVC.
     *
     * A controller that receives PVC update with previously unknown resourceName or ClaimResourceStatus
     * should ignore the update for the purpose it was designed. For example - a controller that only is
     * responsible for resizing capacity of the volume, should ignore PVC updates that change other valid
     * resources associated with PVC.
     *
     * This is an alpha field and requires enabling RecoverVolumeExpansionFailure feature.
     *
     * @return static
     */
    public function setAllocatedResourceStatuses(array $allocatedResourceStatuses): static
    {
        $this->allocatedResourceStatuses = $allocatedResourceStatuses;

        return $this;
    }

    /**
     * allocatedResources tracks the resources allocated to a PVC including its capacity. Key names follow
     * standard Kubernetes label syntax. Valid values are either:
     *     * Un-prefixed keys:
     *         - storage - the capacity of the volume.
     *     * Custom resources must use implementation-defined prefixed names such as
     * "example.com/my-custom-resource"
     * Apart from above values - keys that are unprefixed or have kubernetes.io prefix are considered
     * reserved and hence may not be used.
     *
     * Capacity reported here may be larger than the actual capacity when a volume expansion operation is
     * requested. For storage quota, the larger value from allocatedResources and PVC.spec.resources is
     * used. If allocatedResources is not set, PVC.spec.resources alone is used for quota calculation. If a
     * volume expansion capacity request is lowered, allocatedResources is only lowered if there are no
     * expansion operations in progress and if the actual volume capacity is equal or lower than the
     * requested capacity.
     *
     * A controller that receives PVC update with previously unknown resourceName should ignore the update
     * for the purpose it was designed. For example - a controller that only is responsible for resizing
     * capacity of the volume, should ignore PVC updates that change other valid resources associated with
     * PVC.
     *
     * This is an alpha field and requires enabling RecoverVolumeExpansionFailure feature.
     */
    public function getAllocatedResources(): array|null
    {
        return $this->allocatedResources;
    }

    /**
     * allocatedResources tracks the resources allocated to a PVC including its capacity. Key names follow
     * standard Kubernetes label syntax. Valid values are either:
     *     * Un-prefixed keys:
     *         - storage - the capacity of the volume.
     *     * Custom resources must use implementation-defined prefixed names such as
     * "example.com/my-custom-resource"
     * Apart from above values - keys that are unprefixed or have kubernetes.io prefix are considered
     * reserved and hence may not be used.
     *
     * Capacity reported here may be larger than the actual capacity when a volume expansion operation is
     * requested. For storage quota, the larger value from allocatedResources and PVC.spec.resources is
     * used. If allocatedResources is not set, PVC.spec.resources alone is used for quota calculation. If a
     * volume expansion capacity request is lowered, allocatedResources is only lowered if there are no
     * expansion operations in progress and if the actual volume capacity is equal or lower than the
     * requested capacity.
     *
     * A controller that receives PVC update with previously unknown resourceName should ignore the update
     * for the purpose it was designed. For example - a controller that only is responsible for resizing
     * capacity of the volume, should ignore PVC updates that change other valid resources associated with
     * PVC.
     *
     * This is an alpha field and requires enabling RecoverVolumeExpansionFailure feature.
     *
     * @return static
     */
    public function setAllocatedResources(array $allocatedResources): static
    {
        $this->allocatedResources = $allocatedResources;

        return $this;
    }

    /**
     * capacity represents the actual resources of the underlying volume.
     */
    public function getCapacity(): array|null
    {
        return $this->capacity;
    }

    /**
     * capacity represents the actual resources of the underlying volume.
     *
     * @return static
     */
    public function setCapacity(array $capacity): static
    {
        $this->capacity = $capacity;

        return $this;
    }

    /**
     * conditions is the current Condition of persistent volume claim. If underlying persistent volume is
     * being resized then the Condition will be set to 'Resizing'.
     *
     * @return iterable|PersistentVolumeClaimCondition[]
     */
    public function getConditions(): iterable|null
    {
        return $this->conditions;
    }

    /**
     * conditions is the current Condition of persistent volume claim. If underlying persistent volume is
     * being resized then the Condition will be set to 'Resizing'.
     *
     * @return static
     */
    public function setConditions(iterable $conditions): static
    {
        $this->conditions = $conditions;

        return $this;
    }

    /** @return static */
    public function addConditions(PersistentVolumeClaimCondition $condition): static
    {
        if (! $this->conditions) {
            $this->conditions = new Collection();
        }

        $this->conditions[] = $condition;

        return $this;
    }

    /**
     * currentVolumeAttributesClassName is the current name of the VolumeAttributesClass the PVC is using.
     * When unset, there is no VolumeAttributeClass applied to this PersistentVolumeClaim This is a beta
     * field and requires enabling VolumeAttributesClass feature (off by default).
     */
    public function getCurrentVolumeAttributesClassName(): string|null
    {
        return $this->currentVolumeAttributesClassName;
    }

    /**
     * currentVolumeAttributesClassName is the current name of the VolumeAttributesClass the PVC is using.
     * When unset, there is no VolumeAttributeClass applied to this PersistentVolumeClaim This is a beta
     * field and requires enabling VolumeAttributesClass feature (off by default).
     *
     * @return static
     */
    public function setCurrentVolumeAttributesClassName(string $currentVolumeAttributesClassName): static
    {
        $this->currentVolumeAttributesClassName = $currentVolumeAttributesClassName;

        return $this;
    }

    /**
     * ModifyVolumeStatus represents the status object of ControllerModifyVolume operation. When this is
     * unset, there is no ModifyVolume operation being attempted. This is a beta field and requires
     * enabling VolumeAttributesClass feature (off by default).
     */
    public function getModifyVolumeStatus(): ModifyVolumeStatus|null
    {
        return $this->modifyVolumeStatus;
    }

    /**
     * ModifyVolumeStatus represents the status object of ControllerModifyVolume operation. When this is
     * unset, there is no ModifyVolume operation being attempted. This is a beta field and requires
     * enabling VolumeAttributesClass feature (off by default).
     *
     * @return static
     */
    public function setModifyVolumeStatus(ModifyVolumeStatus $modifyVolumeStatus): static
    {
        $this->modifyVolumeStatus = $modifyVolumeStatus;

        return $this;
    }

    /**
     * phase represents the current phase of PersistentVolumeClaim.
     */
    public function getPhase(): string|null
    {
        return $this->phase;
    }

    /**
     * phase represents the current phase of PersistentVolumeClaim.
     *
     * @return static
     */
    public function setPhase(string $phase): static
    {
        $this->phase = $phase;

        return $this;
    }
}
