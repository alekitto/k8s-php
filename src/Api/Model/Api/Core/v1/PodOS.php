<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Core\v1;

use Kcs\K8s\Attribute as Kubernetes;

/**
 * PodOS defines the OS parameters of a pod.
 */
class PodOS
{
    #[Kubernetes\Attribute('name', required: true)]
    protected string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * Name is the name of the operating system. The currently supported values are linux and windows.
     * Additional value may be defined in future and can be one of:
     * https://github.com/opencontainers/runtime-spec/blob/master/config.md#platform-specific-configuration
     * Clients should expect to handle additional values and treat unrecognized values in this field as os:
     * null
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Name is the name of the operating system. The currently supported values are linux and windows.
     * Additional value may be defined in future and can be one of:
     * https://github.com/opencontainers/runtime-spec/blob/master/config.md#platform-specific-configuration
     * Clients should expect to handle additional values and treat unrecognized values in this field as os:
     * null
     *
     * @return static
     */
    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }
}
