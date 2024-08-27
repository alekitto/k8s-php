<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Resource\v1alpha3;

use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;

/**
 * DeviceClaimConfiguration is used for configuration parameters in DeviceClaim.
 */
class DeviceClaimConfiguration
{
    #[Kubernetes\Attribute('opaque', type: AttributeType::Model, model: OpaqueDeviceConfiguration::class)]
    protected OpaqueDeviceConfiguration|null $opaque = null;

    /** @var string[]|null */
    #[Kubernetes\Attribute('requests')]
    protected array|null $requests = null;

    /** @param string[]|null $requests */
    public function __construct(OpaqueDeviceConfiguration|null $opaque = null, array|null $requests = null)
    {
        $this->opaque = $opaque;
        $this->requests = $requests;
    }

    /**
     * Opaque provides driver-specific configuration parameters.
     */
    public function getOpaque(): OpaqueDeviceConfiguration|null
    {
        return $this->opaque;
    }

    /**
     * Opaque provides driver-specific configuration parameters.
     *
     * @return static
     */
    public function setOpaque(OpaqueDeviceConfiguration $opaque): static
    {
        $this->opaque = $opaque;

        return $this;
    }

    /**
     * Requests lists the names of requests where the configuration applies. If empty, it applies to all
     * requests.
     */
    public function getRequests(): array|null
    {
        return $this->requests;
    }

    /**
     * Requests lists the names of requests where the configuration applies. If empty, it applies to all
     * requests.
     *
     * @return static
     */
    public function setRequests(array $requests): static
    {
        $this->requests = $requests;

        return $this;
    }
}
