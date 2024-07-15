<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Core\v1;

use Kcs\K8s\Attribute as Kubernetes;

/**
 * SecretKeySelector selects a key of a Secret.
 */
class SecretKeySelector
{
    #[Kubernetes\Attribute('key', required: true)]
    protected string $key;

    #[Kubernetes\Attribute('name')]
    protected string|null $name = null;

    #[Kubernetes\Attribute('optional')]
    protected bool|null $optional = null;

    public function __construct(string $key)
    {
        $this->key = $key;
    }

    /**
     * The key of the secret to select from.  Must be a valid secret key.
     */
    public function getKey(): string
    {
        return $this->key;
    }

    /**
     * The key of the secret to select from.  Must be a valid secret key.
     *
     * @return static
     */
    public function setKey(string $key): static
    {
        $this->key = $key;

        return $this;
    }

    /**
     * Name of the referent. This field is effectively required, but due to backwards compatibility is
     * allowed to be empty. Instances of this type with an empty value here are almost certainly wrong.
     * More info: https://kubernetes.io/docs/concepts/overview/working-with-objects/names/#names
     */
    public function getName(): string|null
    {
        return $this->name;
    }

    /**
     * Name of the referent. This field is effectively required, but due to backwards compatibility is
     * allowed to be empty. Instances of this type with an empty value here are almost certainly wrong.
     * More info: https://kubernetes.io/docs/concepts/overview/working-with-objects/names/#names
     *
     * @return static
     */
    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Specify whether the Secret or its key must be defined
     */
    public function isOptional(): bool|null
    {
        return $this->optional;
    }

    /**
     * Specify whether the Secret or its key must be defined
     *
     * @return static
     */
    public function setIsOptional(bool $optional): static
    {
        $this->optional = $optional;

        return $this;
    }
}
