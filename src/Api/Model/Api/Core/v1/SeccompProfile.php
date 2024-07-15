<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Core\v1;

use Kcs\K8s\Attribute as Kubernetes;

/**
 * SeccompProfile defines a pod/container's seccomp profile settings. Only one profile source may be
 * set.
 */
class SeccompProfile
{
    #[Kubernetes\Attribute('localhostProfile')]
    protected string|null $localhostProfile = null;

    #[Kubernetes\Attribute('type', required: true)]
    protected string $type;

    public function __construct(string $type)
    {
        $this->type = $type;
    }

    /**
     * localhostProfile indicates a profile defined in a file on the node should be used. The profile must
     * be preconfigured on the node to work. Must be a descending path, relative to the kubelet's
     * configured seccomp profile location. Must be set if type is "Localhost". Must NOT be set for any
     * other type.
     */
    public function getLocalhostProfile(): string|null
    {
        return $this->localhostProfile;
    }

    /**
     * localhostProfile indicates a profile defined in a file on the node should be used. The profile must
     * be preconfigured on the node to work. Must be a descending path, relative to the kubelet's
     * configured seccomp profile location. Must be set if type is "Localhost". Must NOT be set for any
     * other type.
     *
     * @return static
     */
    public function setLocalhostProfile(string $localhostProfile): static
    {
        $this->localhostProfile = $localhostProfile;

        return $this;
    }

    /**
     * type indicates which kind of seccomp profile will be applied. Valid options are:
     *
     * Localhost - a profile defined in a file on the node should be used. RuntimeDefault - the container
     * runtime default profile should be used. Unconfined - no profile should be applied.
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * type indicates which kind of seccomp profile will be applied. Valid options are:
     *
     * Localhost - a profile defined in a file on the node should be used. RuntimeDefault - the container
     * runtime default profile should be used. Unconfined - no profile should be applied.
     *
     * @return static
     */
    public function setType(string $type): static
    {
        $this->type = $type;

        return $this;
    }
}
