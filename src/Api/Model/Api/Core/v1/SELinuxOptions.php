<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Core\v1;

use Kcs\K8s\Attribute as Kubernetes;

/**
 * SELinuxOptions are the labels to be applied to the container
 */
class SELinuxOptions
{
    #[Kubernetes\Attribute('level')]
    protected string|null $level = null;

    #[Kubernetes\Attribute('role')]
    protected string|null $role = null;

    #[Kubernetes\Attribute('type')]
    protected string|null $type = null;

    #[Kubernetes\Attribute('user')]
    protected string|null $user = null;

    public function __construct(
        string|null $level = null,
        string|null $role = null,
        string|null $type = null,
        string|null $user = null,
    ) {
        $this->level = $level;
        $this->role = $role;
        $this->type = $type;
        $this->user = $user;
    }

    /**
     * Level is SELinux level label that applies to the container.
     */
    public function getLevel(): string|null
    {
        return $this->level;
    }

    /**
     * Level is SELinux level label that applies to the container.
     *
     * @return static
     */
    public function setLevel(string $level): static
    {
        $this->level = $level;

        return $this;
    }

    /**
     * Role is a SELinux role label that applies to the container.
     */
    public function getRole(): string|null
    {
        return $this->role;
    }

    /**
     * Role is a SELinux role label that applies to the container.
     *
     * @return static
     */
    public function setRole(string $role): static
    {
        $this->role = $role;

        return $this;
    }

    /**
     * Type is a SELinux type label that applies to the container.
     */
    public function getType(): string|null
    {
        return $this->type;
    }

    /**
     * Type is a SELinux type label that applies to the container.
     *
     * @return static
     */
    public function setType(string $type): static
    {
        $this->type = $type;

        return $this;
    }

    /**
     * User is a SELinux user label that applies to the container.
     */
    public function getUser(): string|null
    {
        return $this->user;
    }

    /**
     * User is a SELinux user label that applies to the container.
     *
     * @return static
     */
    public function setUser(string $user): static
    {
        $this->user = $user;

        return $this;
    }
}
