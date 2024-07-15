<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\AdmissionRegistration\v1beta1;

use Kcs\K8s\Attribute as Kubernetes;

/**
 * ParamKind is a tuple of Group Kind and Version.
 */
class ParamKind
{
    #[Kubernetes\Attribute('apiVersion')]
    protected string|null $apiVersion = '';

    #[Kubernetes\Attribute('kind')]
    protected string|null $kind = null;

    public function __construct(string|null $apiVersion = null, string|null $kind = null)
    {
        $this->apiVersion = $apiVersion;
        $this->kind = $kind;
    }

    /**
     * APIVersion is the API group version the resources belong to. In format of "group/version". Required.
     */
    public function getApiVersion(): string|null
    {
        return $this->apiVersion;
    }

    /**
     * APIVersion is the API group version the resources belong to. In format of "group/version". Required.
     *
     * @return static
     */
    public function setApiVersion(string $apiVersion): static
    {
        $this->apiVersion = $apiVersion;

        return $this;
    }

    /**
     * Kind is the API kind the resources belong to. Required.
     */
    public function getKind(): string|null
    {
        return $this->kind;
    }

    /**
     * Kind is the API kind the resources belong to. Required.
     *
     * @return static
     */
    public function setKind(string $kind): static
    {
        $this->kind = $kind;

        return $this;
    }
}
