<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Core\v1;

use Kcs\K8s\Attribute as Kubernetes;

/**
 * Selects a key from a ConfigMap.
 */
class ConfigMapKeySelector
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
     * The key to select.
     */
    public function getKey(): string
    {
        return $this->key;
    }

    /**
     * The key to select.
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
     * Specify whether the ConfigMap or its key must be defined
     */
    public function isOptional(): bool|null
    {
        return $this->optional;
    }

    /**
     * Specify whether the ConfigMap or its key must be defined
     *
     * @return static
     */
    public function setIsOptional(bool $optional): static
    {
        $this->optional = $optional;

        return $this;
    }
}
