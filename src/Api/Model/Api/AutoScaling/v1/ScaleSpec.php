<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\AutoScaling\v1;

use Kcs\K8s\Attribute as Kubernetes;

/**
 * ScaleSpec describes the attributes of a scale subresource.
 */
class ScaleSpec
{
    #[Kubernetes\Attribute('replicas')]
    protected int|null $replicas = null;

    public function __construct(int|null $replicas = null)
    {
        $this->replicas = $replicas;
    }

    /**
     * replicas is the desired number of instances for the scaled object.
     */
    public function getReplicas(): int|null
    {
        return $this->replicas;
    }

    /**
     * replicas is the desired number of instances for the scaled object.
     *
     * @return static
     */
    public function setReplicas(int $replicas): static
    {
        $this->replicas = $replicas;

        return $this;
    }
}
