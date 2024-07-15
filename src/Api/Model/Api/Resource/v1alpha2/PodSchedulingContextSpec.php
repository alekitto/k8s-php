<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Resource\v1alpha2;

use Kcs\K8s\Attribute as Kubernetes;

/**
 * PodSchedulingContextSpec describes where resources for the Pod are needed.
 */
class PodSchedulingContextSpec
{
    /** @var string[]|null */
    #[Kubernetes\Attribute('potentialNodes')]
    protected array|null $potentialNodes = null;

    #[Kubernetes\Attribute('selectedNode')]
    protected string|null $selectedNode = null;

    /** @param string[]|null $potentialNodes */
    public function __construct(array|null $potentialNodes = null, string|null $selectedNode = null)
    {
        $this->potentialNodes = $potentialNodes;
        $this->selectedNode = $selectedNode;
    }

    /**
     * PotentialNodes lists nodes where the Pod might be able to run.
     *
     * The size of this field is limited to 128. This is large enough for many clusters. Larger clusters
     * may need more attempts to find a node that suits all pending resources. This may get increased in
     * the future, but not reduced.
     */
    public function getPotentialNodes(): array|null
    {
        return $this->potentialNodes;
    }

    /**
     * PotentialNodes lists nodes where the Pod might be able to run.
     *
     * The size of this field is limited to 128. This is large enough for many clusters. Larger clusters
     * may need more attempts to find a node that suits all pending resources. This may get increased in
     * the future, but not reduced.
     *
     * @return static
     */
    public function setPotentialNodes(array $potentialNodes): static
    {
        $this->potentialNodes = $potentialNodes;

        return $this;
    }

    /**
     * SelectedNode is the node for which allocation of ResourceClaims that are referenced by the Pod and
     * that use "WaitForFirstConsumer" allocation is to be attempted.
     */
    public function getSelectedNode(): string|null
    {
        return $this->selectedNode;
    }

    /**
     * SelectedNode is the node for which allocation of ResourceClaims that are referenced by the Pod and
     * that use "WaitForFirstConsumer" allocation is to be attempted.
     *
     * @return static
     */
    public function setSelectedNode(string $selectedNode): static
    {
        $this->selectedNode = $selectedNode;

        return $this;
    }
}
