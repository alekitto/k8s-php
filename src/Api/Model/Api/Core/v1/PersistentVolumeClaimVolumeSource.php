<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Core\v1;

use Kcs\K8s\Attribute as Kubernetes;

/**
 * PersistentVolumeClaimVolumeSource references the user's PVC in the same namespace. This volume finds
 * the bound PV and mounts that volume for the pod. A PersistentVolumeClaimVolumeSource is,
 * essentially, a wrapper around another type of volume that is owned by someone else (the system).
 */
class PersistentVolumeClaimVolumeSource
{
    #[Kubernetes\Attribute('claimName', required: true)]
    protected string $claimName;

    #[Kubernetes\Attribute('readOnly')]
    protected bool|null $readOnly = null;

    public function __construct(string $claimName)
    {
        $this->claimName = $claimName;
    }

    /**
     * claimName is the name of a PersistentVolumeClaim in the same namespace as the pod using this volume.
     * More info: https://kubernetes.io/docs/concepts/storage/persistent-volumes#persistentvolumeclaims
     */
    public function getClaimName(): string
    {
        return $this->claimName;
    }

    /**
     * claimName is the name of a PersistentVolumeClaim in the same namespace as the pod using this volume.
     * More info: https://kubernetes.io/docs/concepts/storage/persistent-volumes#persistentvolumeclaims
     *
     * @return static
     */
    public function setClaimName(string $claimName): static
    {
        $this->claimName = $claimName;

        return $this;
    }

    /**
     * readOnly Will force the ReadOnly setting in VolumeMounts. Default false.
     */
    public function isReadOnly(): bool|null
    {
        return $this->readOnly;
    }

    /**
     * readOnly Will force the ReadOnly setting in VolumeMounts. Default false.
     *
     * @return static
     */
    public function setIsReadOnly(bool $readOnly): static
    {
        $this->readOnly = $readOnly;

        return $this;
    }
}
