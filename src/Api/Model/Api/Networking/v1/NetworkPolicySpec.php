<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Networking\v1;

use Kcs\K8s\Api\Model\ApiMachinery\Apis\Meta\v1\LabelSelector;
use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;
use Kcs\K8s\Collection;

/**
 * NetworkPolicySpec provides the specification of a NetworkPolicy
 */
class NetworkPolicySpec
{
    /** @var iterable|NetworkPolicyEgressRule[]|null */
    #[Kubernetes\Attribute('egress', type: AttributeType::Collection, model: NetworkPolicyEgressRule::class)]
    protected $egress = null;

    /** @var iterable|NetworkPolicyIngressRule[]|null */
    #[Kubernetes\Attribute('ingress', type: AttributeType::Collection, model: NetworkPolicyIngressRule::class)]
    protected $ingress = null;

    #[Kubernetes\Attribute('podSelector', type: AttributeType::Model, model: LabelSelector::class, required: true)]
    protected LabelSelector $podSelector;

    /** @var string[]|null */
    #[Kubernetes\Attribute('policyTypes')]
    protected array|null $policyTypes = null;

    public function __construct(LabelSelector $podSelector)
    {
        $this->podSelector = $podSelector;
    }

    /**
     * egress is a list of egress rules to be applied to the selected pods. Outgoing traffic is allowed if
     * there are no NetworkPolicies selecting the pod (and cluster policy otherwise allows the traffic), OR
     * if the traffic matches at least one egress rule across all of the NetworkPolicy objects whose
     * podSelector matches the pod. If this field is empty then this NetworkPolicy limits all outgoing
     * traffic (and serves solely to ensure that the pods it selects are isolated by default). This field
     * is beta-level in 1.8
     *
     * @return iterable|NetworkPolicyEgressRule[]
     */
    public function getEgress(): iterable|null
    {
        return $this->egress;
    }

    /**
     * egress is a list of egress rules to be applied to the selected pods. Outgoing traffic is allowed if
     * there are no NetworkPolicies selecting the pod (and cluster policy otherwise allows the traffic), OR
     * if the traffic matches at least one egress rule across all of the NetworkPolicy objects whose
     * podSelector matches the pod. If this field is empty then this NetworkPolicy limits all outgoing
     * traffic (and serves solely to ensure that the pods it selects are isolated by default). This field
     * is beta-level in 1.8
     *
     * @return static
     */
    public function setEgress(iterable $egress): static
    {
        $this->egress = $egress;

        return $this;
    }

    /** @return static */
    public function addEgress(NetworkPolicyEgressRule $egre): static
    {
        if (! $this->egress) {
            $this->egress = new Collection();
        }

        $this->egress[] = $egre;

        return $this;
    }

    /**
     * ingress is a list of ingress rules to be applied to the selected pods. Traffic is allowed to a pod
     * if there are no NetworkPolicies selecting the pod (and cluster policy otherwise allows the traffic),
     * OR if the traffic source is the pod's local node, OR if the traffic matches at least one ingress
     * rule across all of the NetworkPolicy objects whose podSelector matches the pod. If this field is
     * empty then this NetworkPolicy does not allow any traffic (and serves solely to ensure that the pods
     * it selects are isolated by default)
     *
     * @return iterable|NetworkPolicyIngressRule[]
     */
    public function getIngress(): iterable|null
    {
        return $this->ingress;
    }

    /**
     * ingress is a list of ingress rules to be applied to the selected pods. Traffic is allowed to a pod
     * if there are no NetworkPolicies selecting the pod (and cluster policy otherwise allows the traffic),
     * OR if the traffic source is the pod's local node, OR if the traffic matches at least one ingress
     * rule across all of the NetworkPolicy objects whose podSelector matches the pod. If this field is
     * empty then this NetworkPolicy does not allow any traffic (and serves solely to ensure that the pods
     * it selects are isolated by default)
     *
     * @return static
     */
    public function setIngress(iterable $ingress): static
    {
        $this->ingress = $ingress;

        return $this;
    }

    /** @return static */
    public function addIngress(NetworkPolicyIngressRule $ingre): static
    {
        if (! $this->ingress) {
            $this->ingress = new Collection();
        }

        $this->ingress[] = $ingre;

        return $this;
    }

    /**
     * podSelector selects the pods to which this NetworkPolicy object applies. The array of ingress rules
     * is applied to any pods selected by this field. Multiple network policies can select the same set of
     * pods. In this case, the ingress rules for each are combined additively. This field is NOT optional
     * and follows standard label selector semantics. An empty podSelector matches all pods in this
     * namespace.
     */
    public function getPodSelector(): LabelSelector
    {
        return $this->podSelector;
    }

    /**
     * podSelector selects the pods to which this NetworkPolicy object applies. The array of ingress rules
     * is applied to any pods selected by this field. Multiple network policies can select the same set of
     * pods. In this case, the ingress rules for each are combined additively. This field is NOT optional
     * and follows standard label selector semantics. An empty podSelector matches all pods in this
     * namespace.
     *
     * @return static
     */
    public function setPodSelector(LabelSelector $podSelector): static
    {
        $this->podSelector = $podSelector;

        return $this;
    }

    /**
     * policyTypes is a list of rule types that the NetworkPolicy relates to. Valid options are
     * ["Ingress"], ["Egress"], or ["Ingress", "Egress"]. If this field is not specified, it will default
     * based on the existence of ingress or egress rules; policies that contain an egress section are
     * assumed to affect egress, and all policies (whether or not they contain an ingress section) are
     * assumed to affect ingress. If you want to write an egress-only policy, you must explicitly specify
     * policyTypes [ "Egress" ]. Likewise, if you want to write a policy that specifies that no egress is
     * allowed, you must specify a policyTypes value that include "Egress" (since such a policy would not
     * include an egress section and would otherwise default to just [ "Ingress" ]). This field is
     * beta-level in 1.8
     */
    public function getPolicyTypes(): array|null
    {
        return $this->policyTypes;
    }

    /**
     * policyTypes is a list of rule types that the NetworkPolicy relates to. Valid options are
     * ["Ingress"], ["Egress"], or ["Ingress", "Egress"]. If this field is not specified, it will default
     * based on the existence of ingress or egress rules; policies that contain an egress section are
     * assumed to affect egress, and all policies (whether or not they contain an ingress section) are
     * assumed to affect ingress. If you want to write an egress-only policy, you must explicitly specify
     * policyTypes [ "Egress" ]. Likewise, if you want to write a policy that specifies that no egress is
     * allowed, you must specify a policyTypes value that include "Egress" (since such a policy would not
     * include an egress section and would otherwise default to just [ "Ingress" ]). This field is
     * beta-level in 1.8
     *
     * @return static
     */
    public function setPolicyTypes(array $policyTypes): static
    {
        $this->policyTypes = $policyTypes;

        return $this;
    }
}
