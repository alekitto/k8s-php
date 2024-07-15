<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Core\v1;

use Kcs\K8s\Attribute as Kubernetes;

/**
 * AppArmorProfile defines a pod or container's AppArmor settings.
 */
class AppArmorProfile
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
     * localhostProfile indicates a profile loaded on the node that should be used. The profile must be
     * preconfigured on the node to work. Must match the loaded name of the profile. Must be set if and
     * only if type is "Localhost".
     */
    public function getLocalhostProfile(): string|null
    {
        return $this->localhostProfile;
    }

    /**
     * localhostProfile indicates a profile loaded on the node that should be used. The profile must be
     * preconfigured on the node to work. Must match the loaded name of the profile. Must be set if and
     * only if type is "Localhost".
     *
     * @return static
     */
    public function setLocalhostProfile(string $localhostProfile): static
    {
        $this->localhostProfile = $localhostProfile;

        return $this;
    }

    /**
     * type indicates which kind of AppArmor profile will be applied. Valid options are:
     *   Localhost - a profile pre-loaded on the node.
     *   RuntimeDefault - the container runtime's default profile.
     *   Unconfined - no AppArmor enforcement.
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * type indicates which kind of AppArmor profile will be applied. Valid options are:
     *   Localhost - a profile pre-loaded on the node.
     *   RuntimeDefault - the container runtime's default profile.
     *   Unconfined - no AppArmor enforcement.
     *
     * @return static
     */
    public function setType(string $type): static
    {
        $this->type = $type;

        return $this;
    }
}
