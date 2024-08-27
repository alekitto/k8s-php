<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Resource\v1alpha3;

use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;

/**
 * DeviceClassConfiguration is used in DeviceClass.
 */
class DeviceClassConfiguration
{
    #[Kubernetes\Attribute('opaque', type: AttributeType::Model, model: OpaqueDeviceConfiguration::class)]
    protected OpaqueDeviceConfiguration|null $opaque = null;

    public function __construct(OpaqueDeviceConfiguration|null $opaque = null)
    {
        $this->opaque = $opaque;
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
}
