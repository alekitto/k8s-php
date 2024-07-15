<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\FlowControl\v1;

use Kcs\K8s\Attribute as Kubernetes;

/**
 * GroupSubject holds detailed information for group-kind subject.
 */
class GroupSubject
{
    #[Kubernetes\Attribute('name', required: true)]
    protected string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * name is the user group that matches, or "*" to match all user groups. See
     * https://github.com/kubernetes/apiserver/blob/master/pkg/authentication/user/user.go for some
     * well-known group names. Required.
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * name is the user group that matches, or "*" to match all user groups. See
     * https://github.com/kubernetes/apiserver/blob/master/pkg/authentication/user/user.go for some
     * well-known group names. Required.
     *
     * @return static
     */
    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }
}
