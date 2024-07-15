<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Core\v1;

use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;

/**
 * EnvVar represents an environment variable present in a Container.
 */
class EnvVar
{
    #[Kubernetes\Attribute('name', required: true)]
    protected string $name;

    #[Kubernetes\Attribute('value')]
    protected string|null $value = null;

    #[Kubernetes\Attribute('valueFrom', type: AttributeType::Model, model: EnvVarSource::class)]
    protected EnvVarSource|null $valueFrom = null;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * Name of the environment variable. Must be a C_IDENTIFIER.
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Name of the environment variable. Must be a C_IDENTIFIER.
     *
     * @return static
     */
    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Variable references $(VAR_NAME) are expanded using the previously defined environment variables in
     * the container and any service environment variables. If a variable cannot be resolved, the reference
     * in the input string will be unchanged. Double $$ are reduced to a single $, which allows for
     * escaping the $(VAR_NAME) syntax: i.e. "$$(VAR_NAME)" will produce the string literal "$(VAR_NAME)".
     * Escaped references will never be expanded, regardless of whether the variable exists or not.
     * Defaults to "".
     */
    public function getValue(): string|null
    {
        return $this->value;
    }

    /**
     * Variable references $(VAR_NAME) are expanded using the previously defined environment variables in
     * the container and any service environment variables. If a variable cannot be resolved, the reference
     * in the input string will be unchanged. Double $$ are reduced to a single $, which allows for
     * escaping the $(VAR_NAME) syntax: i.e. "$$(VAR_NAME)" will produce the string literal "$(VAR_NAME)".
     * Escaped references will never be expanded, regardless of whether the variable exists or not.
     * Defaults to "".
     *
     * @return static
     */
    public function setValue(string $value): static
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Source for the environment variable's value. Cannot be used if value is not empty.
     */
    public function getValueFrom(): EnvVarSource|null
    {
        return $this->valueFrom;
    }

    /**
     * Source for the environment variable's value. Cannot be used if value is not empty.
     *
     * @return static
     */
    public function setValueFrom(EnvVarSource $valueFrom): static
    {
        $this->valueFrom = $valueFrom;

        return $this;
    }
}
