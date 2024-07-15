<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Core\v1;

use Kcs\K8s\Attribute as Kubernetes;

/**
 * SecretReference represents a Secret Reference. It has enough information to retrieve secret in any
 * namespace
 */
class SecretReference
{
    #[Kubernetes\Attribute('name')]
    protected string|null $name = null;

    #[Kubernetes\Attribute('namespace')]
    protected string|null $namespace = null;

    public function __construct(string|null $name = null, string|null $namespace = null)
    {
        $this->name = $name;
        $this->namespace = $namespace;
    }

    /**
     * name is unique within a namespace to reference a secret resource.
     */
    public function getName(): string|null
    {
        return $this->name;
    }

    /**
     * name is unique within a namespace to reference a secret resource.
     *
     * @return static
     */
    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    /**
     * namespace defines the space within which the secret name must be unique.
     */
    public function getNamespace(): string|null
    {
        return $this->namespace;
    }

    /**
     * namespace defines the space within which the secret name must be unique.
     *
     * @return static
     */
    public function setNamespace(string $namespace): static
    {
        $this->namespace = $namespace;

        return $this;
    }
}
