<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\FlowControl\v1beta3;

use Kcs\K8s\Attribute as Kubernetes;

/**
 * ServiceAccountSubject holds detailed information for service-account-kind subject.
 */
class ServiceAccountSubject
{
    #[Kubernetes\Attribute('name', required: true)]
    protected string $name;

    #[Kubernetes\Attribute('namespace', required: true)]
    protected string $namespace;

    public function __construct(string $name, string $namespace)
    {
        $this->name = $name;
        $this->namespace = $namespace;
    }

    /**
     * `name` is the name of matching ServiceAccount objects, or "*" to match regardless of name. Required.
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * `name` is the name of matching ServiceAccount objects, or "*" to match regardless of name. Required.
     *
     * @return static
     */
    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    /**
     * `namespace` is the namespace of matching ServiceAccount objects. Required.
     */
    public function getNamespace(): string
    {
        return $this->namespace;
    }

    /**
     * `namespace` is the namespace of matching ServiceAccount objects. Required.
     *
     * @return static
     */
    public function setNamespace(string $namespace): static
    {
        $this->namespace = $namespace;

        return $this;
    }
}
