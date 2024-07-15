<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\FlowControl\v1beta3;

use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;

/**
 * Subject matches the originator of a request, as identified by the request authentication system.
 * There are three ways of matching an originator; by user, group, or service account.
 */
class Subject
{
    #[Kubernetes\Attribute('group', type: AttributeType::Model, model: GroupSubject::class)]
    protected GroupSubject|null $group = null;

    #[Kubernetes\Attribute('kind', required: true)]
    protected string $kind;

    #[Kubernetes\Attribute('serviceAccount', type: AttributeType::Model, model: ServiceAccountSubject::class)]
    protected ServiceAccountSubject|null $serviceAccount = null;

    #[Kubernetes\Attribute('user', type: AttributeType::Model, model: UserSubject::class)]
    protected UserSubject|null $user = null;

    public function __construct(string $kind)
    {
        $this->kind = $kind;
    }

    /**
     * `group` matches based on user group name.
     */
    public function getGroup(): GroupSubject|null
    {
        return $this->group;
    }

    /**
     * `group` matches based on user group name.
     *
     * @return static
     */
    public function setGroup(GroupSubject $group): static
    {
        $this->group = $group;

        return $this;
    }

    /**
     * `kind` indicates which one of the other fields is non-empty. Required
     */
    public function getKind(): string
    {
        return $this->kind;
    }

    /**
     * `kind` indicates which one of the other fields is non-empty. Required
     *
     * @return static
     */
    public function setKind(string $kind): static
    {
        $this->kind = $kind;

        return $this;
    }

    /**
     * `serviceAccount` matches ServiceAccounts.
     */
    public function getServiceAccount(): ServiceAccountSubject|null
    {
        return $this->serviceAccount;
    }

    /**
     * `serviceAccount` matches ServiceAccounts.
     *
     * @return static
     */
    public function setServiceAccount(ServiceAccountSubject $serviceAccount): static
    {
        $this->serviceAccount = $serviceAccount;

        return $this;
    }

    /**
     * `user` matches based on username.
     */
    public function getUser(): UserSubject|null
    {
        return $this->user;
    }

    /**
     * `user` matches based on username.
     *
     * @return static
     */
    public function setUser(UserSubject $user): static
    {
        $this->user = $user;

        return $this;
    }
}
