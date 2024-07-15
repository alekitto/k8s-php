<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\AdmissionRegistration\v1;

use Kcs\K8s\Api\Model\ApiMachinery\Apis\Meta\v1\LabelSelector;
use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;
use Kcs\K8s\Collection;

/**
 * MatchResources decides whether to run the admission control policy on an object based on whether it
 * meets the match criteria. The exclude rules take precedence over include rules (if a resource
 * matches both, it is excluded)
 */
class MatchResources
{
    /** @var iterable|NamedRuleWithOperations[]|null */
    #[Kubernetes\Attribute('excludeResourceRules', type: AttributeType::Collection, model: NamedRuleWithOperations::class)]
    protected $excludeResourceRules = null;

    #[Kubernetes\Attribute('matchPolicy')]
    protected string|null $matchPolicy = null;

    #[Kubernetes\Attribute('namespaceSelector', type: AttributeType::Model, model: LabelSelector::class)]
    protected LabelSelector|null $namespaceSelector = null;

    #[Kubernetes\Attribute('objectSelector', type: AttributeType::Model, model: LabelSelector::class)]
    protected LabelSelector|null $objectSelector = null;

    /** @var iterable|NamedRuleWithOperations[]|null */
    #[Kubernetes\Attribute('resourceRules', type: AttributeType::Collection, model: NamedRuleWithOperations::class)]
    protected $resourceRules = null;

    /**
     * @param iterable|NamedRuleWithOperations[] $excludeResourceRules
     * @param iterable|NamedRuleWithOperations[] $resourceRules
     */
    public function __construct(
        iterable $excludeResourceRules = [],
        string|null $matchPolicy = null,
        LabelSelector|null $namespaceSelector = null,
        LabelSelector|null $objectSelector = null,
        iterable $resourceRules = [],
    ) {
        $this->excludeResourceRules = new Collection($excludeResourceRules);
        $this->matchPolicy = $matchPolicy;
        $this->namespaceSelector = $namespaceSelector;
        $this->objectSelector = $objectSelector;
        $this->resourceRules = new Collection($resourceRules);
    }

    /**
     * ExcludeResourceRules describes what operations on what resources/subresources the
     * ValidatingAdmissionPolicy should not care about. The exclude rules take precedence over include
     * rules (if a resource matches both, it is excluded)
     *
     * @return iterable|NamedRuleWithOperations[]
     */
    public function getExcludeResourceRules(): iterable|null
    {
        return $this->excludeResourceRules;
    }

    /**
     * ExcludeResourceRules describes what operations on what resources/subresources the
     * ValidatingAdmissionPolicy should not care about. The exclude rules take precedence over include
     * rules (if a resource matches both, it is excluded)
     *
     * @return static
     */
    public function setExcludeResourceRules(iterable $excludeResourceRules): static
    {
        $this->excludeResourceRules = $excludeResourceRules;

        return $this;
    }

    /** @return static */
    public function addExcludeResourceRules(NamedRuleWithOperations $excludeResourceRule): static
    {
        if (! $this->excludeResourceRules) {
            $this->excludeResourceRules = new Collection();
        }

        $this->excludeResourceRules[] = $excludeResourceRule;

        return $this;
    }

    /**
     * matchPolicy defines how the "MatchResources" list is used to match incoming requests. Allowed values
     * are "Exact" or "Equivalent".
     *
     * - Exact: match a request only if it exactly matches a specified rule. For example, if deployments
     * can be modified via apps/v1, apps/v1beta1, and extensions/v1beta1, but "rules" only included
     * `apiGroups:["apps"], apiVersions:["v1"], resources: ["deployments"]`, a request to apps/v1beta1 or
     * extensions/v1beta1 would not be sent to the ValidatingAdmissionPolicy.
     *
     * - Equivalent: match a request if modifies a resource listed in rules, even via another API group or
     * version. For example, if deployments can be modified via apps/v1, apps/v1beta1, and
     * extensions/v1beta1, and "rules" only included `apiGroups:["apps"], apiVersions:["v1"], resources:
     * ["deployments"]`, a request to apps/v1beta1 or extensions/v1beta1 would be converted to apps/v1 and
     * sent to the ValidatingAdmissionPolicy.
     *
     * Defaults to "Equivalent"
     */
    public function getMatchPolicy(): string|null
    {
        return $this->matchPolicy;
    }

    /**
     * matchPolicy defines how the "MatchResources" list is used to match incoming requests. Allowed values
     * are "Exact" or "Equivalent".
     *
     * - Exact: match a request only if it exactly matches a specified rule. For example, if deployments
     * can be modified via apps/v1, apps/v1beta1, and extensions/v1beta1, but "rules" only included
     * `apiGroups:["apps"], apiVersions:["v1"], resources: ["deployments"]`, a request to apps/v1beta1 or
     * extensions/v1beta1 would not be sent to the ValidatingAdmissionPolicy.
     *
     * - Equivalent: match a request if modifies a resource listed in rules, even via another API group or
     * version. For example, if deployments can be modified via apps/v1, apps/v1beta1, and
     * extensions/v1beta1, and "rules" only included `apiGroups:["apps"], apiVersions:["v1"], resources:
     * ["deployments"]`, a request to apps/v1beta1 or extensions/v1beta1 would be converted to apps/v1 and
     * sent to the ValidatingAdmissionPolicy.
     *
     * Defaults to "Equivalent"
     *
     * @return static
     */
    public function setMatchPolicy(string $matchPolicy): static
    {
        $this->matchPolicy = $matchPolicy;

        return $this;
    }

    /**
     * NamespaceSelector decides whether to run the admission control policy on an object based on whether
     * the namespace for that object matches the selector. If the object itself is a namespace, the
     * matching is performed on object.metadata.labels. If the object is another cluster scoped resource,
     * it never skips the policy.
     *
     * For example, to run the webhook on any objects whose namespace is not associated with "runlevel" of
     * "0" or "1";  you will set the selector as follows: "namespaceSelector": {
     *   "matchExpressions": [
     *     {
     *       "key": "runlevel",
     *       "operator": "NotIn",
     *       "values": [
     *         "0",
     *         "1"
     *       ]
     *     }
     *   ]
     * }
     *
     * If instead you want to only run the policy on any objects whose namespace is associated with the
     * "environment" of "prod" or "staging"; you will set the selector as follows: "namespaceSelector": {
     *   "matchExpressions": [
     *     {
     *       "key": "environment",
     *       "operator": "In",
     *       "values": [
     *         "prod",
     *         "staging"
     *       ]
     *     }
     *   ]
     * }
     *
     * See https://kubernetes.io/docs/concepts/overview/working-with-objects/labels/ for more examples of
     * label selectors.
     *
     * Default to the empty LabelSelector, which matches everything.
     */
    public function getNamespaceSelector(): LabelSelector|null
    {
        return $this->namespaceSelector;
    }

    /**
     * NamespaceSelector decides whether to run the admission control policy on an object based on whether
     * the namespace for that object matches the selector. If the object itself is a namespace, the
     * matching is performed on object.metadata.labels. If the object is another cluster scoped resource,
     * it never skips the policy.
     *
     * For example, to run the webhook on any objects whose namespace is not associated with "runlevel" of
     * "0" or "1";  you will set the selector as follows: "namespaceSelector": {
     *   "matchExpressions": [
     *     {
     *       "key": "runlevel",
     *       "operator": "NotIn",
     *       "values": [
     *         "0",
     *         "1"
     *       ]
     *     }
     *   ]
     * }
     *
     * If instead you want to only run the policy on any objects whose namespace is associated with the
     * "environment" of "prod" or "staging"; you will set the selector as follows: "namespaceSelector": {
     *   "matchExpressions": [
     *     {
     *       "key": "environment",
     *       "operator": "In",
     *       "values": [
     *         "prod",
     *         "staging"
     *       ]
     *     }
     *   ]
     * }
     *
     * See https://kubernetes.io/docs/concepts/overview/working-with-objects/labels/ for more examples of
     * label selectors.
     *
     * Default to the empty LabelSelector, which matches everything.
     *
     * @return static
     */
    public function setNamespaceSelector(LabelSelector $namespaceSelector): static
    {
        $this->namespaceSelector = $namespaceSelector;

        return $this;
    }

    /**
     * ObjectSelector decides whether to run the validation based on if the object has matching labels.
     * objectSelector is evaluated against both the oldObject and newObject that would be sent to the cel
     * validation, and is considered to match if either object matches the selector. A null object
     * (oldObject in the case of create, or newObject in the case of delete) or an object that cannot have
     * labels (like a DeploymentRollback or a PodProxyOptions object) is not considered to match. Use the
     * object selector only if the webhook is opt-in, because end users may skip the admission webhook by
     * setting the labels. Default to the empty LabelSelector, which matches everything.
     */
    public function getObjectSelector(): LabelSelector|null
    {
        return $this->objectSelector;
    }

    /**
     * ObjectSelector decides whether to run the validation based on if the object has matching labels.
     * objectSelector is evaluated against both the oldObject and newObject that would be sent to the cel
     * validation, and is considered to match if either object matches the selector. A null object
     * (oldObject in the case of create, or newObject in the case of delete) or an object that cannot have
     * labels (like a DeploymentRollback or a PodProxyOptions object) is not considered to match. Use the
     * object selector only if the webhook is opt-in, because end users may skip the admission webhook by
     * setting the labels. Default to the empty LabelSelector, which matches everything.
     *
     * @return static
     */
    public function setObjectSelector(LabelSelector $objectSelector): static
    {
        $this->objectSelector = $objectSelector;

        return $this;
    }

    /**
     * ResourceRules describes what operations on what resources/subresources the ValidatingAdmissionPolicy
     * matches. The policy cares about an operation if it matches _any_ Rule.
     *
     * @return iterable|NamedRuleWithOperations[]
     */
    public function getResourceRules(): iterable|null
    {
        return $this->resourceRules;
    }

    /**
     * ResourceRules describes what operations on what resources/subresources the ValidatingAdmissionPolicy
     * matches. The policy cares about an operation if it matches _any_ Rule.
     *
     * @return static
     */
    public function setResourceRules(iterable $resourceRules): static
    {
        $this->resourceRules = $resourceRules;

        return $this;
    }

    /** @return static */
    public function addResourceRules(NamedRuleWithOperations $resourceRule): static
    {
        if (! $this->resourceRules) {
            $this->resourceRules = new Collection();
        }

        $this->resourceRules[] = $resourceRule;

        return $this;
    }
}
