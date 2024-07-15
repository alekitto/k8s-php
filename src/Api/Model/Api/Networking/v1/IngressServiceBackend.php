<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Networking\v1;

use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;

/**
 * IngressServiceBackend references a Kubernetes Service as a Backend.
 */
class IngressServiceBackend
{
    #[Kubernetes\Attribute('name', required: true)]
    protected string $name;

    #[Kubernetes\Attribute('port', type: AttributeType::Model, model: ServiceBackendPort::class)]
    protected ServiceBackendPort|null $port = null;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * name is the referenced service. The service must exist in the same namespace as the Ingress object.
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * name is the referenced service. The service must exist in the same namespace as the Ingress object.
     *
     * @return static
     */
    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    /**
     * port of the referenced service. A port name or port number is required for a IngressServiceBackend.
     */
    public function getPort(): ServiceBackendPort|null
    {
        return $this->port;
    }

    /**
     * port of the referenced service. A port name or port number is required for a IngressServiceBackend.
     *
     * @return static
     */
    public function setPort(ServiceBackendPort $port): static
    {
        $this->port = $port;

        return $this;
    }
}
