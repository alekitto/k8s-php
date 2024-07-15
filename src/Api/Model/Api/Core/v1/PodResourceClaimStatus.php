<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Core\v1;

use Kcs\K8s\Attribute as Kubernetes;

/**
 * PodResourceClaimStatus is stored in the PodStatus for each PodResourceClaim which references a
 * ResourceClaimTemplate. It stores the generated name for the corresponding ResourceClaim.
 */
class PodResourceClaimStatus
{
    #[Kubernetes\Attribute('name', required: true)]
    protected string $name;

    #[Kubernetes\Attribute('resourceClaimName')]
    protected string|null $resourceClaimName = null;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * Name uniquely identifies this resource claim inside the pod. This must match the name of an entry in
     * pod.spec.resourceClaims, which implies that the string must be a DNS_LABEL.
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Name uniquely identifies this resource claim inside the pod. This must match the name of an entry in
     * pod.spec.resourceClaims, which implies that the string must be a DNS_LABEL.
     *
     * @return static
     */
    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    /**
     * ResourceClaimName is the name of the ResourceClaim that was generated for the Pod in the namespace
     * of the Pod. It this is unset, then generating a ResourceClaim was not necessary. The
     * pod.spec.resourceClaims entry can be ignored in this case.
     */
    public function getResourceClaimName(): string|null
    {
        return $this->resourceClaimName;
    }

    /**
     * ResourceClaimName is the name of the ResourceClaim that was generated for the Pod in the namespace
     * of the Pod. It this is unset, then generating a ResourceClaim was not necessary. The
     * pod.spec.resourceClaims entry can be ignored in this case.
     *
     * @return static
     */
    public function setResourceClaimName(string $resourceClaimName): static
    {
        $this->resourceClaimName = $resourceClaimName;

        return $this;
    }
}
