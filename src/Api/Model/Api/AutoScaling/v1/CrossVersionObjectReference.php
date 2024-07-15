<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\AutoScaling\v1;

use Kcs\K8s\Attribute as Kubernetes;

/**
 * CrossVersionObjectReference contains enough information to let you identify the referred resource.
 */
class CrossVersionObjectReference
{
    #[Kubernetes\Attribute('apiVersion')]
    protected string|null $apiVersion = '';

    #[Kubernetes\Attribute('kind', required: true)]
    protected string $kind;

    #[Kubernetes\Attribute('name', required: true)]
    protected string $name;

    public function __construct(string $kind, string $name)
    {
        $this->kind = $kind;
        $this->name = $name;
    }

    /**
     * apiVersion is the API version of the referent
     */
    public function getApiVersion(): string|null
    {
        return $this->apiVersion;
    }

    /**
     * apiVersion is the API version of the referent
     *
     * @return static
     */
    public function setApiVersion(string $apiVersion): static
    {
        $this->apiVersion = $apiVersion;

        return $this;
    }

    /**
     * kind is the kind of the referent; More info:
     * https://git.k8s.io/community/contributors/devel/sig-architecture/api-conventions.md#types-kinds
     */
    public function getKind(): string
    {
        return $this->kind;
    }

    /**
     * kind is the kind of the referent; More info:
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
     * name is the name of the referent; More info:
     * https://kubernetes.io/docs/concepts/overview/working-with-objects/names/#names
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * name is the name of the referent; More info:
     * https://kubernetes.io/docs/concepts/overview/working-with-objects/names/#names
     *
     * @return static
     */
    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }
}
