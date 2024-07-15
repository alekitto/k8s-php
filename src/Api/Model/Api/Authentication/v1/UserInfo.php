<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Authentication\v1;

use Kcs\K8s\Attribute as Kubernetes;

/**
 * UserInfo holds the information about the user needed to implement the user.Info interface.
 */
class UserInfo
{
    #[Kubernetes\Attribute('extra')]
    protected array|null $extra = null;

    /** @var string[]|null */
    #[Kubernetes\Attribute('groups')]
    protected array|null $groups = null;

    #[Kubernetes\Attribute('uid')]
    protected string|null $uid = null;

    #[Kubernetes\Attribute('username')]
    protected string|null $username = null;

    /** @param string[]|null $groups */
    public function __construct(
        array|null $extra = null,
        array|null $groups = null,
        string|null $uid = null,
        string|null $username = null,
    ) {
        $this->extra = $extra;
        $this->groups = $groups;
        $this->uid = $uid;
        $this->username = $username;
    }

    /**
     * Any additional information provided by the authenticator.
     */
    public function getExtra(): array|null
    {
        return $this->extra;
    }

    /**
     * Any additional information provided by the authenticator.
     *
     * @return static
     */
    public function setExtra(array $extra): static
    {
        $this->extra = $extra;

        return $this;
    }

    /**
     * The names of groups this user is a part of.
     */
    public function getGroups(): array|null
    {
        return $this->groups;
    }

    /**
     * The names of groups this user is a part of.
     *
     * @return static
     */
    public function setGroups(array $groups): static
    {
        $this->groups = $groups;

        return $this;
    }

    /**
     * A unique value that identifies this user across time. If this user is deleted and another user by
     * the same name is added, they will have different UIDs.
     */
    public function getUid(): string|null
    {
        return $this->uid;
    }

    /**
     * A unique value that identifies this user across time. If this user is deleted and another user by
     * the same name is added, they will have different UIDs.
     *
     * @return static
     */
    public function setUid(string $uid): static
    {
        $this->uid = $uid;

        return $this;
    }

    /**
     * The name that uniquely identifies this user among all active users.
     */
    public function getUsername(): string|null
    {
        return $this->username;
    }

    /**
     * The name that uniquely identifies this user among all active users.
     *
     * @return static
     */
    public function setUsername(string $username): static
    {
        $this->username = $username;

        return $this;
    }
}
