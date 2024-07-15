<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Core\v1;

use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;

/**
 * PodResourceClaim references exactly one ResourceClaim through a ClaimSource. It adds a name to it
 * that uniquely identifies the ResourceClaim inside the Pod. Containers that need access to the
 * ResourceClaim reference it with this name.
 */
class PodResourceClaim
{
    #[Kubernetes\Attribute('name', required: true)]
    protected string $name;

    #[Kubernetes\Attribute('source', type: AttributeType::Model, model: ClaimSource::class)]
    protected ClaimSource|null $source = null;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * Name uniquely identifies this resource claim inside the pod. This must be a DNS_LABEL.
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Name uniquely identifies this resource claim inside the pod. This must be a DNS_LABEL.
     *
     * @return static
     */
    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Source describes where to find the ResourceClaim.
     */
    public function getSource(): ClaimSource|null
    {
        return $this->source;
    }

    /**
     * Source describes where to find the ResourceClaim.
     *
     * @return static
     */
    public function setSource(ClaimSource $source): static
    {
        $this->source = $source;

        return $this;
    }
}
