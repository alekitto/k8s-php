<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Core\v1;

use Kcs\K8s\Attribute as Kubernetes;

/**
 * AttachedVolume describes a volume attached to a node
 */
class AttachedVolume
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
     * DevicePath represents the device path where the volume should be available
     */
    public function getDevicePath(): string
    {
        return $this->devicePath;
    }

    /**
     * DevicePath represents the device path where the volume should be available
     *
     * @return static
     */
    public function setDevicePath(string $devicePath): static
    {
        $this->devicePath = $devicePath;

        return $this;
    }

    /**
     * Name of the attached volume
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Name of the attached volume
     *
     * @return static
     */
    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }
}
