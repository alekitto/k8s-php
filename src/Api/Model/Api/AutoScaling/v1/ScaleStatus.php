<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\AutoScaling\v1;

use Kcs\K8s\Attribute as Kubernetes;

/**
 * ScaleStatus represents the current status of a scale subresource.
 */
class ScaleStatus
{
    #[Kubernetes\Attribute('replicas', required: true)]
    protected int $replicas;

    #[Kubernetes\Attribute('selector')]
    protected string|null $selector = null;

    public function __construct(int $replicas)
    {
        $this->replicas = $replicas;
    }

    /**
     * replicas is the actual number of observed instances of the scaled object.
     */
    public function getReplicas(): int
    {
        return $this->replicas;
    }

    /**
     * replicas is the actual number of observed instances of the scaled object.
     *
     * @return static
     */
    public function setReplicas(int $replicas): static
    {
        $this->replicas = $replicas;

        return $this;
    }

    /**
     * selector is the label query over pods that should match the replicas count. This is same as the
     * label selector but in the string format to avoid introspection by clients. The string will be in the
     * same format as the query-param syntax. More info about label selectors:
     * https://kubernetes.io/docs/concepts/overview/working-with-objects/labels/
     */
    public function getSelector(): string|null
    {
        return $this->selector;
    }

    /**
     * selector is the label query over pods that should match the replicas count. This is same as the
     * label selector but in the string format to avoid introspection by clients. The string will be in the
     * same format as the query-param syntax. More info about label selectors:
     * https://kubernetes.io/docs/concepts/overview/working-with-objects/labels/
     *
     * @return static
     */
    public function setSelector(string $selector): static
    {
        $this->selector = $selector;

        return $this;
    }
}
