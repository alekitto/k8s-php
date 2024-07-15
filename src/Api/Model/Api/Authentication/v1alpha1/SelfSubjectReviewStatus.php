<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Authentication\v1alpha1;

use Kcs\K8s\Api\Model\Api\Authentication\v1\UserInfo;
use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;

/**
 * SelfSubjectReviewStatus is filled by the kube-apiserver and sent back to a user.
 */
class SelfSubjectReviewStatus
{
    #[Kubernetes\Attribute('userInfo', type: AttributeType::Model, model: UserInfo::class)]
    protected UserInfo|null $userInfo = null;

    public function __construct(UserInfo|null $userInfo = null)
    {
        $this->userInfo = $userInfo;
    }

    /**
     * User attributes of the user making this request.
     */
    public function getUserInfo(): UserInfo|null
    {
        return $this->userInfo;
    }

    /**
     * User attributes of the user making this request.
     *
     * @return static
     */
    public function setUserInfo(UserInfo $userInfo): static
    {
        $this->userInfo = $userInfo;

        return $this;
    }
}
