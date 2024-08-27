<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Resource\v1alpha3;

use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;

/**
 * DeviceSelector must have exactly one field set.
 */
class DeviceSelector
{
    #[Kubernetes\Attribute('cel', type: AttributeType::Model, model: CELDeviceSelector::class)]
    protected CELDeviceSelector|null $cel = null;

    public function __construct(CELDeviceSelector|null $cel = null)
    {
        $this->cel = $cel;
    }

    /**
     * CEL contains a CEL expression for selecting a device.
     */
    public function getCel(): CELDeviceSelector|null
    {
        return $this->cel;
    }

    /**
     * CEL contains a CEL expression for selecting a device.
     *
     * @return static
     */
    public function setCel(CELDeviceSelector $cel): static
    {
        $this->cel = $cel;

        return $this;
    }
}
