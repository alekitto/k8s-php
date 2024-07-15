<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Core\v1;

use Kcs\K8s\Attribute as Kubernetes;

/**
 * Represents a Quobyte mount that lasts the lifetime of a pod. Quobyte volumes do not support
 * ownership management or SELinux relabeling.
 */
class QuobyteVolumeSource
{
    #[Kubernetes\Attribute('group')]
    protected string|null $group = null;

    #[Kubernetes\Attribute('readOnly')]
    protected bool|null $readOnly = null;

    #[Kubernetes\Attribute('registry', required: true)]
    protected string $registry;

    #[Kubernetes\Attribute('tenant')]
    protected string|null $tenant = null;

    #[Kubernetes\Attribute('user')]
    protected string|null $user = null;

    #[Kubernetes\Attribute('volume', required: true)]
    protected string $volume;

    public function __construct(string $registry, string $volume)
    {
        $this->registry = $registry;
        $this->volume = $volume;
    }

    /**
     * group to map volume access to Default is no group
     */
    public function getGroup(): string|null
    {
        return $this->group;
    }

    /**
     * group to map volume access to Default is no group
     *
     * @return static
     */
    public function setGroup(string $group): static
    {
        $this->group = $group;

        return $this;
    }

    /**
     * readOnly here will force the Quobyte volume to be mounted with read-only permissions. Defaults to
     * false.
     */
    public function isReadOnly(): bool|null
    {
        return $this->readOnly;
    }

    /**
     * readOnly here will force the Quobyte volume to be mounted with read-only permissions. Defaults to
     * false.
     *
     * @return static
     */
    public function setIsReadOnly(bool $readOnly): static
    {
        $this->readOnly = $readOnly;

        return $this;
    }

    /**
     * registry represents a single or multiple Quobyte Registry services specified as a string as
     * host:port pair (multiple entries are separated with commas) which acts as the central registry for
     * volumes
     */
    public function getRegistry(): string
    {
        return $this->registry;
    }

    /**
     * registry represents a single or multiple Quobyte Registry services specified as a string as
     * host:port pair (multiple entries are separated with commas) which acts as the central registry for
     * volumes
     *
     * @return static
     */
    public function setRegistry(string $registry): static
    {
        $this->registry = $registry;

        return $this;
    }

    /**
     * tenant owning the given Quobyte volume in the Backend Used with dynamically provisioned Quobyte
     * volumes, value is set by the plugin
     */
    public function getTenant(): string|null
    {
        return $this->tenant;
    }

    /**
     * tenant owning the given Quobyte volume in the Backend Used with dynamically provisioned Quobyte
     * volumes, value is set by the plugin
     *
     * @return static
     */
    public function setTenant(string $tenant): static
    {
        $this->tenant = $tenant;

        return $this;
    }

    /**
     * user to map volume access to Defaults to serivceaccount user
     */
    public function getUser(): string|null
    {
        return $this->user;
    }

    /**
     * user to map volume access to Defaults to serivceaccount user
     *
     * @return static
     */
    public function setUser(string $user): static
    {
        $this->user = $user;

        return $this;
    }

    /**
     * volume is a string that references an already created Quobyte volume by name.
     */
    public function getVolume(): string
    {
        return $this->volume;
    }

    /**
     * volume is a string that references an already created Quobyte volume by name.
     *
     * @return static
     */
    public function setVolume(string $volume): static
    {
        $this->volume = $volume;

        return $this;
    }
}
