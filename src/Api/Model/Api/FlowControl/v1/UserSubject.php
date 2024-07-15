<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\FlowControl\v1;

use Kcs\K8s\Attribute as Kubernetes;

/**
 * UserSubject holds detailed information for user-kind subject.
 */
class UserSubject
{
    #[Kubernetes\Attribute('name', required: true)]
    protected string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * `name` is the username that matches, or "*" to match all usernames. Required.
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * `name` is the username that matches, or "*" to match all usernames. Required.
     *
     * @return static
     */
    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }
}
