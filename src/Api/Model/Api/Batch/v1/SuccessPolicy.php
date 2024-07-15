<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Batch\v1;

use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;
use Kcs\K8s\Collection;

/**
 * SuccessPolicy describes when a Job can be declared as succeeded based on the success of some
 * indexes.
 */
class SuccessPolicy
{
    /** @var iterable|SuccessPolicyRule[] */
    #[Kubernetes\Attribute('rules', type: AttributeType::Collection, model: SuccessPolicyRule::class, required: true)]
    protected iterable $rules;

    /** @param iterable|SuccessPolicyRule[] $rules */
    public function __construct(iterable $rules)
    {
        $this->rules = new Collection($rules);
    }

    /**
     * rules represents the list of alternative rules for the declaring the Jobs as successful before
     * `.status.succeeded >= .spec.completions`. Once any of the rules are met, the "SucceededCriteriaMet"
     * condition is added, and the lingering pods are removed. The terminal state for such a Job has the
     * "Complete" condition. Additionally, these rules are evaluated in order; Once the Job meets one of
     * the rules, other rules are ignored. At most 20 elements are allowed.
     *
     * @return iterable|SuccessPolicyRule[]
     */
    public function getRules(): iterable
    {
        return $this->rules;
    }

    /**
     * rules represents the list of alternative rules for the declaring the Jobs as successful before
     * `.status.succeeded >= .spec.completions`. Once any of the rules are met, the "SucceededCriteriaMet"
     * condition is added, and the lingering pods are removed. The terminal state for such a Job has the
     * "Complete" condition. Additionally, these rules are evaluated in order; Once the Job meets one of
     * the rules, other rules are ignored. At most 20 elements are allowed.
     *
     * @return static
     */
    public function setRules(iterable $rules): static
    {
        $this->rules = $rules;

        return $this;
    }

    /** @return static */
    public function addRules(SuccessPolicyRule $rule): static
    {
        if (! $this->rules) {
            $this->rules = new Collection();
        }

        $this->rules[] = $rule;

        return $this;
    }
}
