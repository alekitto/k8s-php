<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Rbac\v1;

use Kcs\K8s\Attribute as Kubernetes;

/**
 * Subject contains a reference to the object or user identities a role binding applies to.  This can
 * either hold a direct API object reference, or a value for non-objects such as user and group names.
 */
class Subject
{
    #[Kubernetes\Attribute('apiGroup')]
    protected string|null $apiGroup = null;

    #[Kubernetes\Attribute('kind', required: true)]
    protected string $kind;

    #[Kubernetes\Attribute('name', required: true)]
    protected string $name;

    #[Kubernetes\Attribute('namespace')]
    protected string|null $namespace = null;

    public function __construct(string $kind, string $name)
    {
        $this->kind = $kind;
        $this->name = $name;
    }

    /**
     * APIGroup holds the API group of the referenced subject. Defaults to "" for ServiceAccount subjects.
     * Defaults to "rbac.authorization.k8s.io" for User and Group subjects.
     */
    public function getApiGroup(): string|null
    {
        return $this->apiGroup;
    }

    /**
     * APIGroup holds the API group of the referenced subject. Defaults to "" for ServiceAccount subjects.
     * Defaults to "rbac.authorization.k8s.io" for User and Group subjects.
     *
     * @return static
     */
    public function setApiGroup(string $apiGroup): static
    {
        $this->apiGroup = $apiGroup;

        return $this;
    }

    /**
     * Kind of object being referenced. Values defined by this API group are "User", "Group", and
     * "ServiceAccount". If the Authorizer does not recognized the kind value, the Authorizer should report
     * an error.
     */
    public function getKind(): string
    {
        return $this->kind;
    }

    /**
     * Kind of object being referenced. Values defined by this API group are "User", "Group", and
     * "ServiceAccount". If the Authorizer does not recognized the kind value, the Authorizer should report
     * an error.
     *
     * @return static
     */
    public function setKind(string $kind): static
    {
        $this->kind = $kind;

        return $this;
    }

    /**
     * Name of the object being referenced.
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Name of the object being referenced.
     *
     * @return static
     */
    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Namespace of the referenced object.  If the object kind is non-namespace, such as "User" or "Group",
     * and this value is not empty the Authorizer should report an error.
     */
    public function getNamespace(): string|null
    {
        return $this->namespace;
    }

    /**
     * Namespace of the referenced object.  If the object kind is non-namespace, such as "User" or "Group",
     * and this value is not empty the Authorizer should report an error.
     *
     * @return static
     */
    public function setNamespace(string $namespace): static
    {
        $this->namespace = $namespace;

        return $this;
    }
}
