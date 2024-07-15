<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Networking\v1;

use Kcs\K8s\Api\Model\Api\Core\v1\TypedLocalObjectReference;
use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;

/**
 * IngressBackend describes all endpoints for a given service and port.
 */
class IngressBackend
{
    #[Kubernetes\Attribute('resource', type: AttributeType::Model, model: TypedLocalObjectReference::class)]
    protected TypedLocalObjectReference|null $resource = null;

    #[Kubernetes\Attribute('service', type: AttributeType::Model, model: IngressServiceBackend::class)]
    protected IngressServiceBackend|null $service = null;

    public function __construct(TypedLocalObjectReference|null $resource = null, IngressServiceBackend|null $service = null)
    {
        $this->resource = $resource;
        $this->service = $service;
    }

    /**
     * resource is an ObjectRef to another Kubernetes resource in the namespace of the Ingress object. If
     * resource is specified, a service.Name and service.Port must not be specified. This is a mutually
     * exclusive setting with "Service".
     */
    public function getResource(): TypedLocalObjectReference|null
    {
        return $this->resource;
    }

    /**
     * resource is an ObjectRef to another Kubernetes resource in the namespace of the Ingress object. If
     * resource is specified, a service.Name and service.Port must not be specified. This is a mutually
     * exclusive setting with "Service".
     *
     * @return static
     */
    public function setResource(TypedLocalObjectReference $resource): static
    {
        $this->resource = $resource;

        return $this;
    }

    /**
     * service references a service as a backend. This is a mutually exclusive setting with "Resource".
     */
    public function getService(): IngressServiceBackend|null
    {
        return $this->service;
    }

    /**
     * service references a service as a backend. This is a mutually exclusive setting with "Resource".
     *
     * @return static
     */
    public function setService(IngressServiceBackend $service): static
    {
        $this->service = $service;

        return $this;
    }
}
