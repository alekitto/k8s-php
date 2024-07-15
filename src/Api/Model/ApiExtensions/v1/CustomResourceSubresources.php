<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\ApiExtensions\v1;

use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;

/**
 * CustomResourceSubresources defines the status and scale subresources for CustomResources.
 */
class CustomResourceSubresources
{
    #[Kubernetes\Attribute('scale', type: AttributeType::Model, model: CustomResourceSubresourceScale::class)]
    protected CustomResourceSubresourceScale|null $scale = null;

    #[Kubernetes\Attribute('status')]
    protected object|null $status = null;

    public function __construct(CustomResourceSubresourceScale|null $scale = null, object|null $status = null)
    {
        $this->scale = $scale;
        $this->status = $status;
    }

    /**
     * scale indicates the custom resource should serve a `/scale` subresource that returns an
     * `autoscaling/v1` Scale object.
     */
    public function getScale(): CustomResourceSubresourceScale|null
    {
        return $this->scale;
    }

    /**
     * scale indicates the custom resource should serve a `/scale` subresource that returns an
     * `autoscaling/v1` Scale object.
     *
     * @return static
     */
    public function setScale(CustomResourceSubresourceScale $scale): static
    {
        $this->scale = $scale;

        return $this;
    }

    /**
     * status indicates the custom resource should serve a `/status` subresource. When enabled: 1. requests
     * to the custom resource primary endpoint ignore changes to the `status` stanza of the object. 2.
     * requests to the custom resource `/status` subresource ignore changes to anything other than the
     * `status` stanza of the object.
     */
    public function getStatus(): object
    {
        return $this->status;
    }

    /**
     * status indicates the custom resource should serve a `/status` subresource. When enabled: 1. requests
     * to the custom resource primary endpoint ignore changes to the `status` stanza of the object. 2.
     * requests to the custom resource `/status` subresource ignore changes to anything other than the
     * `status` stanza of the object.
     *
     * @return static
     */
    public function setStatus(object $status): static
    {
        $this->status = $status;

        return $this;
    }
}
