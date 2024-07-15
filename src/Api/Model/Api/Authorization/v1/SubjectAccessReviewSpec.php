<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Authorization\v1;

use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;

/**
 * SubjectAccessReviewSpec is a description of the access request.  Exactly one of
 * ResourceAuthorizationAttributes and NonResourceAuthorizationAttributes must be set
 */
class SubjectAccessReviewSpec
{
    #[Kubernetes\Attribute('extra')]
    protected array|null $extra = null;

    /** @var string[]|null */
    #[Kubernetes\Attribute('groups')]
    protected array|null $groups = null;

    #[Kubernetes\Attribute('nonResourceAttributes', type: AttributeType::Model, model: NonResourceAttributes::class)]
    protected NonResourceAttributes|null $nonResourceAttributes = null;

    #[Kubernetes\Attribute('resourceAttributes', type: AttributeType::Model, model: ResourceAttributes::class)]
    protected ResourceAttributes|null $resourceAttributes = null;

    #[Kubernetes\Attribute('uid')]
    protected string|null $uid = null;

    #[Kubernetes\Attribute('user')]
    protected string|null $user = null;

    /**
     * Extra corresponds to the user.Info.GetExtra() method from the authenticator.  Since that is input to
     * the authorizer it needs a reflection here.
     */
    public function getExtra(): array|null
    {
        return $this->extra;
    }

    /**
     * Extra corresponds to the user.Info.GetExtra() method from the authenticator.  Since that is input to
     * the authorizer it needs a reflection here.
     *
     * @return static
     */
    public function setExtra(array $extra): static
    {
        $this->extra = $extra;

        return $this;
    }

    /**
     * Groups is the groups you're testing for.
     */
    public function getGroups(): array|null
    {
        return $this->groups;
    }

    /**
     * Groups is the groups you're testing for.
     *
     * @return static
     */
    public function setGroups(array $groups): static
    {
        $this->groups = $groups;

        return $this;
    }

    /**
     * NonResourceAttributes describes information for a non-resource access request
     */
    public function getNonResourceAttributes(): NonResourceAttributes|null
    {
        return $this->nonResourceAttributes;
    }

    /**
     * NonResourceAttributes describes information for a non-resource access request
     *
     * @return static
     */
    public function setNonResourceAttributes(NonResourceAttributes $nonResourceAttributes): static
    {
        $this->nonResourceAttributes = $nonResourceAttributes;

        return $this;
    }

    /**
     * ResourceAuthorizationAttributes describes information for a resource access request
     */
    public function getResourceAttributes(): ResourceAttributes|null
    {
        return $this->resourceAttributes;
    }

    /**
     * ResourceAuthorizationAttributes describes information for a resource access request
     *
     * @return static
     */
    public function setResourceAttributes(ResourceAttributes $resourceAttributes): static
    {
        $this->resourceAttributes = $resourceAttributes;

        return $this;
    }

    /**
     * UID information about the requesting user.
     */
    public function getUid(): string|null
    {
        return $this->uid;
    }

    /**
     * UID information about the requesting user.
     *
     * @return static
     */
    public function setUid(string $uid): static
    {
        $this->uid = $uid;

        return $this;
    }

    /**
     * User is the user you're testing for. If you specify "User" but not "Groups", then is it interpreted
     * as "What if User were not a member of any groups
     */
    public function getUser(): string|null
    {
        return $this->user;
    }

    /**
     * User is the user you're testing for. If you specify "User" but not "Groups", then is it interpreted
     * as "What if User were not a member of any groups
     *
     * @return static
     */
    public function setUser(string $user): static
    {
        $this->user = $user;

        return $this;
    }
}
