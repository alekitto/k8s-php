<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Core\v1;

use Kcs\K8s\Attribute as Kubernetes;

/**
 * ResourceClaim references one entry in PodSpec.ResourceClaims.
 */
class ResourceClaim
{
    #[Kubernetes\Attribute('name', required: true)]
    protected string $name;

    #[Kubernetes\Attribute('request')]
    protected string|null $request = null;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * Name must match the name of one entry in pod.spec.resourceClaims of the Pod where this field is
     * used. It makes that resource available inside a container.
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Name must match the name of one entry in pod.spec.resourceClaims of the Pod where this field is
     * used. It makes that resource available inside a container.
     *
     * @return static
     */
    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Request is the name chosen for a request in the referenced claim. If empty, everything from the
     * claim is made available, otherwise only the result of this request.
     */
    public function getRequest(): string|null
    {
        return $this->request;
    }

    /**
     * Request is the name chosen for a request in the referenced claim. If empty, everything from the
     * claim is made available, otherwise only the result of this request.
     *
     * @return static
     */
    public function setRequest(string $request): static
    {
        $this->request = $request;

        return $this;
    }
}
