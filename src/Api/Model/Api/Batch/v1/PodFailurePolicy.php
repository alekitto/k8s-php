<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Batch\v1;

use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;
use Kcs\K8s\Collection;

/**
 * PodFailurePolicy describes how failed pods influence the backoffLimit.
 */
class PodFailurePolicy
{
    /** @var iterable|PodFailurePolicyRule[] */
    #[Kubernetes\Attribute('rules', type: AttributeType::Collection, model: PodFailurePolicyRule::class, required: true)]
    protected iterable $rules;

    /** @param iterable|PodFailurePolicyRule[] $rules */
    public function __construct(iterable $rules)
    {
        $this->rules = new Collection($rules);
    }

    /**
     * A list of pod failure policy rules. The rules are evaluated in order. Once a rule matches a Pod
     * failure, the remaining of the rules are ignored. When no rule matches the Pod failure, the default
     * handling applies - the counter of pod failures is incremented and it is checked against the
     * backoffLimit. At most 20 elements are allowed.
     *
     * @return iterable|PodFailurePolicyRule[]
     */
    public function getRules(): iterable
    {
        return $this->rules;
    }

    /**
     * A list of pod failure policy rules. The rules are evaluated in order. Once a rule matches a Pod
     * failure, the remaining of the rules are ignored. When no rule matches the Pod failure, the default
     * handling applies - the counter of pod failures is incremented and it is checked against the
     * backoffLimit. At most 20 elements are allowed.
     *
     * @return static
     */
    public function setRules(iterable $rules): static
    {
        $this->rules = $rules;

        return $this;
    }

    /** @return static */
    public function addRules(PodFailurePolicyRule $rule): static
    {
        if (! $this->rules) {
            $this->rules = new Collection();
        }

        $this->rules[] = $rule;

        return $this;
    }
}
