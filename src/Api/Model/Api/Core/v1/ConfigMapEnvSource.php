<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Core\v1;

use Kcs\K8s\Attribute as Kubernetes;

/**
 * ConfigMapEnvSource selects a ConfigMap to populate the environment variables with.
 *
 * The contents of the target ConfigMap's Data field will represent the key-value pairs as environment
 * variables.
 */
class ConfigMapEnvSource
{
    #[Kubernetes\Attribute('name')]
    protected string|null $name = null;

    #[Kubernetes\Attribute('optional')]
    protected bool|null $optional = null;

    public function __construct(string|null $name = null, bool|null $optional = null)
    {
        $this->name = $name;
        $this->optional = $optional;
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
     * Specify whether the ConfigMap must be defined
     */
    public function isOptional(): bool|null
    {
        return $this->optional;
    }

    /**
     * Specify whether the ConfigMap must be defined
     *
     * @return static
     */
    public function setIsOptional(bool $optional): static
    {
        $this->optional = $optional;

        return $this;
    }
}
