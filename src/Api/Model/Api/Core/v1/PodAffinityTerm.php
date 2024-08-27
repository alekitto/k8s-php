<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Core\v1;

use Kcs\K8s\Api\Model\ApiMachinery\Apis\Meta\v1\LabelSelector;
use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;

/**
 * Defines a set of pods (namely those matching the labelSelector relative to the given namespace(s))
 * that this pod should be co-located (affinity) or not co-located (anti-affinity) with, where
 * co-located is defined as running on a node whose value of the label with key <topologyKey> matches
 * that of any node on which a pod of the set of pods is running
 */
class PodAffinityTerm
{
    #[Kubernetes\Attribute('labelSelector', type: AttributeType::Model, model: LabelSelector::class)]
    protected LabelSelector|null $labelSelector = null;

    /** @var string[]|null */
    #[Kubernetes\Attribute('matchLabelKeys')]
    protected array|null $matchLabelKeys = null;

    /** @var string[]|null */
    #[Kubernetes\Attribute('mismatchLabelKeys')]
    protected array|null $mismatchLabelKeys = null;

    #[Kubernetes\Attribute('namespaceSelector', type: AttributeType::Model, model: LabelSelector::class)]
    protected LabelSelector|null $namespaceSelector = null;

    /** @var string[]|null */
    #[Kubernetes\Attribute('namespaces')]
    protected array|null $namespaces = null;

    #[Kubernetes\Attribute('topologyKey', required: true)]
    protected string $topologyKey;

    public function __construct(string $topologyKey)
    {
        $this->topologyKey = $topologyKey;
    }

    /**
     * A label query over a set of resources, in this case pods. If it's null, this PodAffinityTerm matches
     * with no Pods.
     */
    public function getLabelSelector(): LabelSelector|null
    {
        return $this->labelSelector;
    }

    /**
     * A label query over a set of resources, in this case pods. If it's null, this PodAffinityTerm matches
     * with no Pods.
     *
     * @return static
     */
    public function setLabelSelector(LabelSelector $labelSelector): static
    {
        $this->labelSelector = $labelSelector;

        return $this;
    }

    /**
     * MatchLabelKeys is a set of pod label keys to select which pods will be taken into consideration. The
     * keys are used to lookup values from the incoming pod labels, those key-value labels are merged with
     * `labelSelector` as `key in (value)` to select the group of existing pods which pods will be taken
     * into consideration for the incoming pod's pod (anti) affinity. Keys that don't exist in the incoming
     * pod labels will be ignored. The default value is empty. The same key is forbidden to exist in both
     * matchLabelKeys and labelSelector. Also, matchLabelKeys cannot be set when labelSelector isn't set.
     * This is a beta field and requires enabling MatchLabelKeysInPodAffinity feature gate (enabled by
     * default).
     */
    public function getMatchLabelKeys(): array|null
    {
        return $this->matchLabelKeys;
    }

    /**
     * MatchLabelKeys is a set of pod label keys to select which pods will be taken into consideration. The
     * keys are used to lookup values from the incoming pod labels, those key-value labels are merged with
     * `labelSelector` as `key in (value)` to select the group of existing pods which pods will be taken
     * into consideration for the incoming pod's pod (anti) affinity. Keys that don't exist in the incoming
     * pod labels will be ignored. The default value is empty. The same key is forbidden to exist in both
     * matchLabelKeys and labelSelector. Also, matchLabelKeys cannot be set when labelSelector isn't set.
     * This is a beta field and requires enabling MatchLabelKeysInPodAffinity feature gate (enabled by
     * default).
     *
     * @return static
     */
    public function setMatchLabelKeys(array $matchLabelKeys): static
    {
        $this->matchLabelKeys = $matchLabelKeys;

        return $this;
    }

    /**
     * MismatchLabelKeys is a set of pod label keys to select which pods will be taken into consideration.
     * The keys are used to lookup values from the incoming pod labels, those key-value labels are merged
     * with `labelSelector` as `key notin (value)` to select the group of existing pods which pods will be
     * taken into consideration for the incoming pod's pod (anti) affinity. Keys that don't exist in the
     * incoming pod labels will be ignored. The default value is empty. The same key is forbidden to exist
     * in both mismatchLabelKeys and labelSelector. Also, mismatchLabelKeys cannot be set when
     * labelSelector isn't set. This is a beta field and requires enabling MatchLabelKeysInPodAffinity
     * feature gate (enabled by default).
     */
    public function getMismatchLabelKeys(): array|null
    {
        return $this->mismatchLabelKeys;
    }

    /**
     * MismatchLabelKeys is a set of pod label keys to select which pods will be taken into consideration.
     * The keys are used to lookup values from the incoming pod labels, those key-value labels are merged
     * with `labelSelector` as `key notin (value)` to select the group of existing pods which pods will be
     * taken into consideration for the incoming pod's pod (anti) affinity. Keys that don't exist in the
     * incoming pod labels will be ignored. The default value is empty. The same key is forbidden to exist
     * in both mismatchLabelKeys and labelSelector. Also, mismatchLabelKeys cannot be set when
     * labelSelector isn't set. This is a beta field and requires enabling MatchLabelKeysInPodAffinity
     * feature gate (enabled by default).
     *
     * @return static
     */
    public function setMismatchLabelKeys(array $mismatchLabelKeys): static
    {
        $this->mismatchLabelKeys = $mismatchLabelKeys;

        return $this;
    }

    /**
     * A label query over the set of namespaces that the term applies to. The term is applied to the union
     * of the namespaces selected by this field and the ones listed in the namespaces field. null selector
     * and null or empty namespaces list means "this pod's namespace". An empty selector ({}) matches all
     * namespaces.
     */
    public function getNamespaceSelector(): LabelSelector|null
    {
        return $this->namespaceSelector;
    }

    /**
     * A label query over the set of namespaces that the term applies to. The term is applied to the union
     * of the namespaces selected by this field and the ones listed in the namespaces field. null selector
     * and null or empty namespaces list means "this pod's namespace". An empty selector ({}) matches all
     * namespaces.
     *
     * @return static
     */
    public function setNamespaceSelector(LabelSelector $namespaceSelector): static
    {
        $this->namespaceSelector = $namespaceSelector;

        return $this;
    }

    /**
     * namespaces specifies a static list of namespace names that the term applies to. The term is applied
     * to the union of the namespaces listed in this field and the ones selected by namespaceSelector. null
     * or empty namespaces list and null namespaceSelector means "this pod's namespace".
     */
    public function getNamespaces(): array|null
    {
        return $this->namespaces;
    }

    /**
     * namespaces specifies a static list of namespace names that the term applies to. The term is applied
     * to the union of the namespaces listed in this field and the ones selected by namespaceSelector. null
     * or empty namespaces list and null namespaceSelector means "this pod's namespace".
     *
     * @return static
     */
    public function setNamespaces(array $namespaces): static
    {
        $this->namespaces = $namespaces;

        return $this;
    }

    /**
     * This pod should be co-located (affinity) or not co-located (anti-affinity) with the pods matching
     * the labelSelector in the specified namespaces, where co-located is defined as running on a node
     * whose value of the label with key topologyKey matches that of any node on which any of the selected
     * pods is running. Empty topologyKey is not allowed.
     */
    public function getTopologyKey(): string
    {
        return $this->topologyKey;
    }

    /**
     * This pod should be co-located (affinity) or not co-located (anti-affinity) with the pods matching
     * the labelSelector in the specified namespaces, where co-located is defined as running on a node
     * whose value of the label with key topologyKey matches that of any node on which any of the selected
     * pods is running. Empty topologyKey is not allowed.
     *
     * @return static
     */
    public function setTopologyKey(string $topologyKey): static
    {
        $this->topologyKey = $topologyKey;

        return $this;
    }
}
