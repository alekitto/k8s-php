<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Networking\v1;

use Kcs\K8s\Api\Model\ApiMachinery\Apis\Meta\v1\LabelSelector;
use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;

/**
 * NetworkPolicyPeer describes a peer to allow traffic to/from. Only certain combinations of fields are
 * allowed
 */
class NetworkPolicyPeer
{
    #[Kubernetes\Attribute('ipBlock', type: AttributeType::Model, model: IPBlock::class)]
    protected IPBlock|null $ipBlock = null;

    #[Kubernetes\Attribute('namespaceSelector', type: AttributeType::Model, model: LabelSelector::class)]
    protected LabelSelector|null $namespaceSelector = null;

    #[Kubernetes\Attribute('podSelector', type: AttributeType::Model, model: LabelSelector::class)]
    protected LabelSelector|null $podSelector = null;

    public function __construct(
        IPBlock|null $ipBlock = null,
        LabelSelector|null $namespaceSelector = null,
        LabelSelector|null $podSelector = null,
    ) {
        $this->ipBlock = $ipBlock;
        $this->namespaceSelector = $namespaceSelector;
        $this->podSelector = $podSelector;
    }

    /**
     * ipBlock defines policy on a particular IPBlock. If this field is set then neither of the other
     * fields can be.
     */
    public function getIpBlock(): IPBlock|null
    {
        return $this->ipBlock;
    }

    /**
     * ipBlock defines policy on a particular IPBlock. If this field is set then neither of the other
     * fields can be.
     *
     * @return static
     */
    public function setIpBlock(IPBlock $ipBlock): static
    {
        $this->ipBlock = $ipBlock;

        return $this;
    }

    /**
     * namespaceSelector selects namespaces using cluster-scoped labels. This field follows standard label
     * selector semantics; if present but empty, it selects all namespaces.
     *
     * If podSelector is also set, then the NetworkPolicyPeer as a whole selects the pods matching
     * podSelector in the namespaces selected by namespaceSelector. Otherwise it selects all pods in the
     * namespaces selected by namespaceSelector.
     */
    public function getNamespaceSelector(): LabelSelector|null
    {
        return $this->namespaceSelector;
    }

    /**
     * namespaceSelector selects namespaces using cluster-scoped labels. This field follows standard label
     * selector semantics; if present but empty, it selects all namespaces.
     *
     * If podSelector is also set, then the NetworkPolicyPeer as a whole selects the pods matching
     * podSelector in the namespaces selected by namespaceSelector. Otherwise it selects all pods in the
     * namespaces selected by namespaceSelector.
     *
     * @return static
     */
    public function setNamespaceSelector(LabelSelector $namespaceSelector): static
    {
        $this->namespaceSelector = $namespaceSelector;

        return $this;
    }

    /**
     * podSelector is a label selector which selects pods. This field follows standard label selector
     * semantics; if present but empty, it selects all pods.
     *
     * If namespaceSelector is also set, then the NetworkPolicyPeer as a whole selects the pods matching
     * podSelector in the Namespaces selected by NamespaceSelector. Otherwise it selects the pods matching
     * podSelector in the policy's own namespace.
     */
    public function getPodSelector(): LabelSelector|null
    {
        return $this->podSelector;
    }

    /**
     * podSelector is a label selector which selects pods. This field follows standard label selector
     * semantics; if present but empty, it selects all pods.
     *
     * If namespaceSelector is also set, then the NetworkPolicyPeer as a whole selects the pods matching
     * podSelector in the Namespaces selected by NamespaceSelector. Otherwise it selects the pods matching
     * podSelector in the policy's own namespace.
     *
     * @return static
     */
    public function setPodSelector(LabelSelector $podSelector): static
    {
        $this->podSelector = $podSelector;

        return $this;
    }
}
