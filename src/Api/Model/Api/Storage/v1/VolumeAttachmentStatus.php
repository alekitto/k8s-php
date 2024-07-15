<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Storage\v1;

use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;

/**
 * VolumeAttachmentStatus is the status of a VolumeAttachment request.
 */
class VolumeAttachmentStatus
{
    #[Kubernetes\Attribute('attachError', type: AttributeType::Model, model: VolumeError::class)]
    protected VolumeError|null $attachError = null;

    #[Kubernetes\Attribute('attached', required: true)]
    protected bool $attached;

    /** @var string[]|null */
    #[Kubernetes\Attribute('attachmentMetadata')]
    protected array|null $attachmentMetadata = null;

    #[Kubernetes\Attribute('detachError', type: AttributeType::Model, model: VolumeError::class)]
    protected VolumeError|null $detachError = null;

    public function __construct(bool $attached)
    {
        $this->attached = $attached;
    }

    /**
     * attachError represents the last error encountered during attach operation, if any. This field must
     * only be set by the entity completing the attach operation, i.e. the external-attacher.
     */
    public function getAttachError(): VolumeError|null
    {
        return $this->attachError;
    }

    /**
     * attachError represents the last error encountered during attach operation, if any. This field must
     * only be set by the entity completing the attach operation, i.e. the external-attacher.
     *
     * @return static
     */
    public function setAttachError(VolumeError $attachError): static
    {
        $this->attachError = $attachError;

        return $this;
    }

    /**
     * attached indicates the volume is successfully attached. This field must only be set by the entity
     * completing the attach operation, i.e. the external-attacher.
     */
    public function isAttached(): bool
    {
        return $this->attached;
    }

    /**
     * attached indicates the volume is successfully attached. This field must only be set by the entity
     * completing the attach operation, i.e. the external-attacher.
     *
     * @return static
     */
    public function setIsAttached(bool $attached): static
    {
        $this->attached = $attached;

        return $this;
    }

    /**
     * attachmentMetadata is populated with any information returned by the attach operation, upon
     * successful attach, that must be passed into subsequent WaitForAttach or Mount calls. This field must
     * only be set by the entity completing the attach operation, i.e. the external-attacher.
     */
    public function getAttachmentMetadata(): array|null
    {
        return $this->attachmentMetadata;
    }

    /**
     * attachmentMetadata is populated with any information returned by the attach operation, upon
     * successful attach, that must be passed into subsequent WaitForAttach or Mount calls. This field must
     * only be set by the entity completing the attach operation, i.e. the external-attacher.
     *
     * @return static
     */
    public function setAttachmentMetadata(array $attachmentMetadata): static
    {
        $this->attachmentMetadata = $attachmentMetadata;

        return $this;
    }

    /**
     * detachError represents the last error encountered during detach operation, if any. This field must
     * only be set by the entity completing the detach operation, i.e. the external-attacher.
     */
    public function getDetachError(): VolumeError|null
    {
        return $this->detachError;
    }

    /**
     * detachError represents the last error encountered during detach operation, if any. This field must
     * only be set by the entity completing the detach operation, i.e. the external-attacher.
     *
     * @return static
     */
    public function setDetachError(VolumeError $detachError): static
    {
        $this->detachError = $detachError;

        return $this;
    }
}
