<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Authentication\v1;

use Kcs\K8s\Attribute as Kubernetes;

/**
 * BoundObjectReference is a reference to an object that a token is bound to.
 */
class BoundObjectReference
{
    #[Kubernetes\Attribute('apiVersion')]
    protected string|null $apiVersion = '';

    #[Kubernetes\Attribute('kind')]
    protected string|null $kind = null;

    #[Kubernetes\Attribute('name')]
    protected string|null $name = null;

    #[Kubernetes\Attribute('uid')]
    protected string|null $uid = null;

    public function __construct(
        string|null $apiVersion = null,
        string|null $kind = null,
        string|null $name = null,
        string|null $uid = null,
    ) {
        $this->apiVersion = $apiVersion;
        $this->kind = $kind;
        $this->name = $name;
        $this->uid = $uid;
    }

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
     * Kind of the referent. Valid kinds are 'Pod' and 'Secret'.
     */
    public function getKind(): string|null
    {
        return $this->kind;
    }

    /**
     * Kind of the referent. Valid kinds are 'Pod' and 'Secret'.
     *
     * @return static
     */
    public function setKind(string $kind): static
    {
        $this->kind = $kind;

        return $this;
    }

    /**
     * Name of the referent.
     */
    public function getName(): string|null
    {
        return $this->name;
    }

    /**
     * Name of the referent.
     *
     * @return static
     */
    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    /**
     * UID of the referent.
     */
    public function getUid(): string|null
    {
        return $this->uid;
    }

    /**
     * UID of the referent.
     *
     * @return static
     */
    public function setUid(string $uid): static
    {
        $this->uid = $uid;

        return $this;
    }
}
