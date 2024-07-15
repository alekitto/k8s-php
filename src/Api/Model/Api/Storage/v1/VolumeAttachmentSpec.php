<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Storage\v1;

use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;

/**
 * VolumeAttachmentSpec is the specification of a VolumeAttachment request.
 */
class VolumeAttachmentSpec
{
    #[Kubernetes\Attribute('attacher', required: true)]
    protected string $attacher;

    #[Kubernetes\Attribute('nodeName', required: true)]
    protected string $nodeName;

    #[Kubernetes\Attribute('source', type: AttributeType::Model, model: VolumeAttachmentSource::class, required: true)]
    protected VolumeAttachmentSource $source;

    public function __construct(string $attacher, string $nodeName, VolumeAttachmentSource $source)
    {
        $this->attacher = $attacher;
        $this->nodeName = $nodeName;
        $this->source = $source;
    }

    /**
     * attacher indicates the name of the volume driver that MUST handle this request. This is the name
     * returned by GetPluginName().
     */
    public function getAttacher(): string
    {
        return $this->attacher;
    }

    /**
     * attacher indicates the name of the volume driver that MUST handle this request. This is the name
     * returned by GetPluginName().
     *
     * @return static
     */
    public function setAttacher(string $attacher): static
    {
        $this->attacher = $attacher;

        return $this;
    }

    /**
     * nodeName represents the node that the volume should be attached to.
     */
    public function getNodeName(): string
    {
        return $this->nodeName;
    }

    /**
     * nodeName represents the node that the volume should be attached to.
     *
     * @return static
     */
    public function setNodeName(string $nodeName): static
    {
        $this->nodeName = $nodeName;

        return $this;
    }

    /**
     * source represents the volume that should be attached.
     */
    public function getSource(): VolumeAttachmentSource
    {
        return $this->source;
    }

    /**
     * source represents the volume that should be attached.
     *
     * @return static
     */
    public function setSource(VolumeAttachmentSource $source): static
    {
        $this->source = $source;

        return $this;
    }
}
