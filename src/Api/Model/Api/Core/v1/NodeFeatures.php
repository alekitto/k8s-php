<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Core\v1;

use Kcs\K8s\Attribute as Kubernetes;

/**
 * NodeFeatures describes the set of features implemented by the CRI implementation. The features
 * contained in the NodeFeatures should depend only on the cri implementation independent of runtime
 * handlers.
 */
class NodeFeatures
{
    #[Kubernetes\Attribute('supplementalGroupsPolicy')]
    protected bool|null $supplementalGroupsPolicy = null;

    public function __construct(bool|null $supplementalGroupsPolicy = null)
    {
        $this->supplementalGroupsPolicy = $supplementalGroupsPolicy;
    }

    /**
     * SupplementalGroupsPolicy is set to true if the runtime supports SupplementalGroupsPolicy and
     * ContainerUser.
     */
    public function isSupplementalGroupsPolicy(): bool|null
    {
        return $this->supplementalGroupsPolicy;
    }

    /**
     * SupplementalGroupsPolicy is set to true if the runtime supports SupplementalGroupsPolicy and
     * ContainerUser.
     *
     * @return static
     */
    public function setIsSupplementalGroupsPolicy(bool $supplementalGroupsPolicy): static
    {
        $this->supplementalGroupsPolicy = $supplementalGroupsPolicy;

        return $this;
    }
}
