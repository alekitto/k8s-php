<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Storage\v1;

use Kcs\K8s\Api\Model\Api\Core\v1\PersistentVolumeSpec;
use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;

/**
 * VolumeAttachmentSource represents a volume that should be attached. Right now only PersistenVolumes
 * can be attached via external attacher, in future we may allow also inline volumes in pods. Exactly
 * one member can be set.
 */
class VolumeAttachmentSource
{
    #[Kubernetes\Attribute('inlineVolumeSpec', type: AttributeType::Model, model: PersistentVolumeSpec::class)]
    protected PersistentVolumeSpec|null $inlineVolumeSpec = null;

    #[Kubernetes\Attribute('persistentVolumeName')]
    protected string|null $persistentVolumeName = null;

    public function __construct(PersistentVolumeSpec|null $inlineVolumeSpec = null, string|null $persistentVolumeName = null)
    {
        $this->inlineVolumeSpec = $inlineVolumeSpec;
        $this->persistentVolumeName = $persistentVolumeName;
    }

    /**
     * inlineVolumeSpec contains all the information necessary to attach a persistent volume defined by a
     * pod's inline VolumeSource. This field is populated only for the CSIMigration feature. It contains
     * translated fields from a pod's inline VolumeSource to a PersistentVolumeSpec. This field is
     * beta-level and is only honored by servers that enabled the CSIMigration feature.
     */
    public function getInlineVolumeSpec(): PersistentVolumeSpec|null
    {
        return $this->inlineVolumeSpec;
    }

    /**
     * inlineVolumeSpec contains all the information necessary to attach a persistent volume defined by a
     * pod's inline VolumeSource. This field is populated only for the CSIMigration feature. It contains
     * translated fields from a pod's inline VolumeSource to a PersistentVolumeSpec. This field is
     * beta-level and is only honored by servers that enabled the CSIMigration feature.
     *
     * @return static
     */
    public function setInlineVolumeSpec(PersistentVolumeSpec $inlineVolumeSpec): static
    {
        $this->inlineVolumeSpec = $inlineVolumeSpec;

        return $this;
    }

    /**
     * persistentVolumeName represents the name of the persistent volume to attach.
     */
    public function getPersistentVolumeName(): string|null
    {
        return $this->persistentVolumeName;
    }

    /**
     * persistentVolumeName represents the name of the persistent volume to attach.
     *
     * @return static
     */
    public function setPersistentVolumeName(string $persistentVolumeName): static
    {
        $this->persistentVolumeName = $persistentVolumeName;

        return $this;
    }
}
