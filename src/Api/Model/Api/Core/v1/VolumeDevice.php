<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Core\v1;

use Kcs\K8s\Attribute as Kubernetes;

/**
 * volumeDevice describes a mapping of a raw block device within a container.
 */
class VolumeDevice
{
    #[Kubernetes\Attribute('devicePath', required: true)]
    protected string $devicePath;

    #[Kubernetes\Attribute('name', required: true)]
    protected string $name;

    public function __construct(string $devicePath, string $name)
    {
        $this->devicePath = $devicePath;
        $this->name = $name;
    }

    /**
     * devicePath is the path inside of the container that the device will be mapped to.
     */
    public function getDevicePath(): string
    {
        return $this->devicePath;
    }

    /**
     * devicePath is the path inside of the container that the device will be mapped to.
     *
     * @return static
     */
    public function setDevicePath(string $devicePath): static
    {
        $this->devicePath = $devicePath;

        return $this;
    }

    /**
     * name must match the name of a persistentVolumeClaim in the pod
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * name must match the name of a persistentVolumeClaim in the pod
     *
     * @return static
     */
    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }
}
