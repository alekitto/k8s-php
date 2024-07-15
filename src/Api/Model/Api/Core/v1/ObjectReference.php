<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Core\v1;

use Kcs\K8s\Attribute as Kubernetes;

/**
 * ObjectReference contains enough information to let you inspect or modify the referred object.
 */
class ObjectReference
{
    #[Kubernetes\Attribute('apiVersion')]
    protected string|null $apiVersion = '';

    #[Kubernetes\Attribute('fieldPath')]
    protected string|null $fieldPath = null;

    #[Kubernetes\Attribute('kind')]
    protected string|null $kind = null;

    #[Kubernetes\Attribute('name')]
    protected string|null $name = null;

    #[Kubernetes\Attribute('namespace')]
    protected string|null $namespace = null;

    #[Kubernetes\Attribute('resourceVersion')]
    protected string|null $resourceVersion = null;

    #[Kubernetes\Attribute('uid')]
    protected string|null $uid = null;

    /**
     * API version of the referent.
     */
    public function getApiVersion(): string|null
    {
        return $this->apiVersion;
    }

    /**
     * API version of the referent.
     *
     * @return static
     */
    public function setApiVersion(string $apiVersion): static
    {
        $this->apiVersion = $apiVersion;

        return $this;
    }

    /**
     * If referring to a piece of an object instead of an entire object, this string should contain a valid
     * JSON/Go field access statement, such as desiredState.manifest.containers[2]. For example, if the
     * object reference is to a container within a pod, this would take on a value like:
     * "spec.containers{name}" (where "name" refers to the name of the container that triggered the event)
     * or if no container name is specified "spec.containers[2]" (container with index 2 in this pod). This
     * syntax is chosen only to have some well-defined way of referencing a part of an object.
     */
    public function getFieldPath(): string|null
    {
        return $this->fieldPath;
    }

    /**
     * If referring to a piece of an object instead of an entire object, this string should contain a valid
     * JSON/Go field access statement, such as desiredState.manifest.containers[2]. For example, if the
     * object reference is to a container within a pod, this would take on a value like:
     * "spec.containers{name}" (where "name" refers to the name of the container that triggered the event)
     * or if no container name is specified "spec.containers[2]" (container with index 2 in this pod). This
     * syntax is chosen only to have some well-defined way of referencing a part of an object.
     *
     * @return static
     */
    public function setFieldPath(string $fieldPath): static
    {
        $this->fieldPath = $fieldPath;

        return $this;
    }

    /**
     * Kind of the referent. More info:
     * https://git.k8s.io/community/contributors/devel/sig-architecture/api-conventions.md#types-kinds
     */
    public function getKind(): string|null
    {
        return $this->kind;
    }

    /**
     * Kind of the referent. More info:
     * https://git.k8s.io/community/contributors/devel/sig-architecture/api-conventions.md#types-kinds
     *
     * @return static
     */
    public function setKind(string $kind): static
    {
        $this->kind = $kind;

        return $this;
    }

    /**
     * Name of the referent. More info:
     * https://kubernetes.io/docs/concepts/overview/working-with-objects/names/#names
     */
    public function getName(): string|null
    {
        return $this->name;
    }

    /**
     * Name of the referent. More info:
     * https://kubernetes.io/docs/concepts/overview/working-with-objects/names/#names
     *
     * @return static
     */
    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Namespace of the referent. More info:
     * https://kubernetes.io/docs/concepts/overview/working-with-objects/namespaces/
     */
    public function getNamespace(): string|null
    {
        return $this->namespace;
    }

    /**
     * Namespace of the referent. More info:
     * https://kubernetes.io/docs/concepts/overview/working-with-objects/namespaces/
     *
     * @return static
     */
    public function setNamespace(string $namespace): static
    {
        $this->namespace = $namespace;

        return $this;
    }

    /**
     * Specific resourceVersion to which this reference is made, if any. More info:
     * https://git.k8s.io/community/contributors/devel/sig-architecture/api-conventions.md#concurrency-control-and-consistency
     */
    public function getResourceVersion(): string|null
    {
        return $this->resourceVersion;
    }

    /**
     * Specific resourceVersion to which this reference is made, if any. More info:
     * https://git.k8s.io/community/contributors/devel/sig-architecture/api-conventions.md#concurrency-control-and-consistency
     *
     * @return static
     */
    public function setResourceVersion(string $resourceVersion): static
    {
        $this->resourceVersion = $resourceVersion;

        return $this;
    }

    /**
     * UID of the referent. More info:
     * https://kubernetes.io/docs/concepts/overview/working-with-objects/names/#uids
     */
    public function getUid(): string|null
    {
        return $this->uid;
    }

    /**
     * UID of the referent. More info:
     * https://kubernetes.io/docs/concepts/overview/working-with-objects/names/#uids
     *
     * @return static
     */
    public function setUid(string $uid): static
    {
        $this->uid = $uid;

        return $this;
    }
}
