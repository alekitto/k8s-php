<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\ApiMachinery\Apis\Meta\v1;

use Kcs\K8s\Attribute as Kubernetes;

/**
 * OwnerReference contains enough information to let you identify an owning object. An owning object
 * must be in the same namespace as the dependent, or be cluster-scoped, so there is no namespace
 * field.
 */
class OwnerReference
{
    #[Kubernetes\Attribute('apiVersion', required: true)]
    protected string $apiVersion = '';

    #[Kubernetes\Attribute('blockOwnerDeletion')]
    protected bool|null $blockOwnerDeletion = null;

    #[Kubernetes\Attribute('controller')]
    protected bool|null $controller = null;

    #[Kubernetes\Attribute('kind', required: true)]
    protected string $kind;

    #[Kubernetes\Attribute('name', required: true)]
    protected string $name;

    #[Kubernetes\Attribute('uid', required: true)]
    protected string $uid;

    public function __construct(string $apiVersion, string $kind, string $name, string $uid)
    {
        $this->apiVersion = $apiVersion;
        $this->kind = $kind;
        $this->name = $name;
        $this->uid = $uid;
    }

    /**
     * API version of the referent.
     */
    public function getApiVersion(): string
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
     * If true, AND if the owner has the "foregroundDeletion" finalizer, then the owner cannot be deleted
     * from the key-value store until this reference is removed. See
     * https://kubernetes.io/docs/concepts/architecture/garbage-collection/#foreground-deletion for how the
     * garbage collector interacts with this field and enforces the foreground deletion. Defaults to false.
     * To set this field, a user needs "delete" permission of the owner, otherwise 422 (Unprocessable
     * Entity) will be returned.
     */
    public function isBlockOwnerDeletion(): bool|null
    {
        return $this->blockOwnerDeletion;
    }

    /**
     * If true, AND if the owner has the "foregroundDeletion" finalizer, then the owner cannot be deleted
     * from the key-value store until this reference is removed. See
     * https://kubernetes.io/docs/concepts/architecture/garbage-collection/#foreground-deletion for how the
     * garbage collector interacts with this field and enforces the foreground deletion. Defaults to false.
     * To set this field, a user needs "delete" permission of the owner, otherwise 422 (Unprocessable
     * Entity) will be returned.
     *
     * @return static
     */
    public function setIsBlockOwnerDeletion(bool $blockOwnerDeletion): static
    {
        $this->blockOwnerDeletion = $blockOwnerDeletion;

        return $this;
    }

    /**
     * If true, this reference points to the managing controller.
     */
    public function isController(): bool|null
    {
        return $this->controller;
    }

    /**
     * If true, this reference points to the managing controller.
     *
     * @return static
     */
    public function setIsController(bool $controller): static
    {
        $this->controller = $controller;

        return $this;
    }

    /**
     * Kind of the referent. More info:
     * https://git.k8s.io/community/contributors/devel/sig-architecture/api-conventions.md#types-kinds
     */
    public function getKind(): string
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
     * https://kubernetes.io/docs/concepts/overview/working-with-objects/names#names
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Name of the referent. More info:
     * https://kubernetes.io/docs/concepts/overview/working-with-objects/names#names
     *
     * @return static
     */
    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    /**
     * UID of the referent. More info:
     * https://kubernetes.io/docs/concepts/overview/working-with-objects/names#uids
     */
    public function getUid(): string
    {
        return $this->uid;
    }

    /**
     * UID of the referent. More info:
     * https://kubernetes.io/docs/concepts/overview/working-with-objects/names#uids
     *
     * @return static
     */
    public function setUid(string $uid): static
    {
        $this->uid = $uid;

        return $this;
    }
}
