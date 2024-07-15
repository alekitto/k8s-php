<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Core\v1;

use Kcs\K8s\Attribute as Kubernetes;

/**
 * Describe a container image
 */
class ContainerImage
{
    /** @var string[]|null */
    #[Kubernetes\Attribute('names')]
    protected array|null $names = null;

    #[Kubernetes\Attribute('sizeBytes')]
    protected int|null $sizeBytes = null;

    /** @param string[]|null $names */
    public function __construct(array|null $names = null, int|null $sizeBytes = null)
    {
        $this->names = $names;
        $this->sizeBytes = $sizeBytes;
    }

    /**
     * Names by which this image is known. e.g. ["kubernetes.example/hyperkube:v1.0.7",
     * "cloud-vendor.registry.example/cloud-vendor/hyperkube:v1.0.7"]
     */
    public function getNames(): array|null
    {
        return $this->names;
    }

    /**
     * Names by which this image is known. e.g. ["kubernetes.example/hyperkube:v1.0.7",
     * "cloud-vendor.registry.example/cloud-vendor/hyperkube:v1.0.7"]
     *
     * @return static
     */
    public function setNames(array $names): static
    {
        $this->names = $names;

        return $this;
    }

    /**
     * The size of the image in bytes.
     */
    public function getSizeBytes(): int|null
    {
        return $this->sizeBytes;
    }

    /**
     * The size of the image in bytes.
     *
     * @return static
     */
    public function setSizeBytes(int $sizeBytes): static
    {
        $this->sizeBytes = $sizeBytes;

        return $this;
    }
}
