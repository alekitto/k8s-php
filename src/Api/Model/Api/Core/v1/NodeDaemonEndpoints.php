<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Core\v1;

use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;

/**
 * NodeDaemonEndpoints lists ports opened by daemons running on the Node.
 */
class NodeDaemonEndpoints
{
    #[Kubernetes\Attribute('kubeletEndpoint', type: AttributeType::Model, model: DaemonEndpoint::class)]
    protected DaemonEndpoint|null $kubeletEndpoint = null;

    public function __construct(DaemonEndpoint|null $kubeletEndpoint = null)
    {
        $this->kubeletEndpoint = $kubeletEndpoint;
    }

    /**
     * Endpoint on which Kubelet is listening.
     */
    public function getKubeletEndpoint(): DaemonEndpoint|null
    {
        return $this->kubeletEndpoint;
    }

    /**
     * Endpoint on which Kubelet is listening.
     *
     * @return static
     */
    public function setKubeletEndpoint(DaemonEndpoint $kubeletEndpoint): static
    {
        $this->kubeletEndpoint = $kubeletEndpoint;

        return $this;
    }
}
