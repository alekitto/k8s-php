<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\FlowControl\v1beta3;

use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;
use Kcs\K8s\Collection;

/**
 * FlowSchemaSpec describes how the FlowSchema's specification looks like.
 */
class FlowSchemaSpec
{
    #[Kubernetes\Attribute('distinguisherMethod', type: AttributeType::Model, model: FlowDistinguisherMethod::class)]
    protected FlowDistinguisherMethod|null $distinguisherMethod = null;

    #[Kubernetes\Attribute('matchingPrecedence')]
    protected int|null $matchingPrecedence = null;

    #[Kubernetes\Attribute(
        'priorityLevelConfiguration',
        type: AttributeType::Model,
        model: PriorityLevelConfigurationReference::class,
        required: true,
    )]
    protected PriorityLevelConfigurationReference $priorityLevelConfiguration;

    /** @var iterable|PolicyRulesWithSubjects[]|null */
    #[Kubernetes\Attribute('rules', type: AttributeType::Collection, model: PolicyRulesWithSubjects::class)]
    protected $rules = null;

    public function __construct(PriorityLevelConfigurationReference $priorityLevelConfiguration)
    {
        $this->priorityLevelConfiguration = $priorityLevelConfiguration;
    }

    /**
     * `distinguisherMethod` defines how to compute the flow distinguisher for requests that match this
     * schema. `nil` specifies that the distinguisher is disabled and thus will always be the empty string.
     */
    public function getDistinguisherMethod(): FlowDistinguisherMethod|null
    {
        return $this->distinguisherMethod;
    }

    /**
     * `distinguisherMethod` defines how to compute the flow distinguisher for requests that match this
     * schema. `nil` specifies that the distinguisher is disabled and thus will always be the empty string.
     *
     * @return static
     */
    public function setDistinguisherMethod(FlowDistinguisherMethod $distinguisherMethod): static
    {
        $this->distinguisherMethod = $distinguisherMethod;

        return $this;
    }

    /**
     * `matchingPrecedence` is used to choose among the FlowSchemas that match a given request. The chosen
     * FlowSchema is among those with the numerically lowest (which we take to be logically highest)
     * MatchingPrecedence.  Each MatchingPrecedence value must be ranged in [1,10000]. Note that if the
     * precedence is not specified, it will be set to 1000 as default.
     */
    public function getMatchingPrecedence(): int|null
    {
        return $this->matchingPrecedence;
    }

    /**
     * `matchingPrecedence` is used to choose among the FlowSchemas that match a given request. The chosen
     * FlowSchema is among those with the numerically lowest (which we take to be logically highest)
     * MatchingPrecedence.  Each MatchingPrecedence value must be ranged in [1,10000]. Note that if the
     * precedence is not specified, it will be set to 1000 as default.
     *
     * @return static
     */
    public function setMatchingPrecedence(int $matchingPrecedence): static
    {
        $this->matchingPrecedence = $matchingPrecedence;

        return $this;
    }

    /**
     * `priorityLevelConfiguration` should reference a PriorityLevelConfiguration in the cluster. If the
     * reference cannot be resolved, the FlowSchema will be ignored and marked as invalid in its status.
     * Required.
     */
    public function getPriorityLevelConfiguration(): PriorityLevelConfigurationReference
    {
        return $this->priorityLevelConfiguration;
    }

    /**
     * `priorityLevelConfiguration` should reference a PriorityLevelConfiguration in the cluster. If the
     * reference cannot be resolved, the FlowSchema will be ignored and marked as invalid in its status.
     * Required.
     *
     * @return static
     */
    public function setPriorityLevelConfiguration(PriorityLevelConfigurationReference $priorityLevelConfiguration): static
    {
        $this->priorityLevelConfiguration = $priorityLevelConfiguration;

        return $this;
    }

    /**
     * `rules` describes which requests will match this flow schema. This FlowSchema matches a request if
     * and only if at least one member of rules matches the request. if it is an empty slice, there will be
     * no requests matching the FlowSchema.
     *
     * @return iterable|PolicyRulesWithSubjects[]
     */
    public function getRules(): iterable|null
    {
        return $this->rules;
    }

    /**
     * `rules` describes which requests will match this flow schema. This FlowSchema matches a request if
     * and only if at least one member of rules matches the request. if it is an empty slice, there will be
     * no requests matching the FlowSchema.
     *
     * @return static
     */
    public function setRules(iterable $rules): static
    {
        $this->rules = $rules;

        return $this;
    }

    /** @return static */
    public function addRules(PolicyRulesWithSubjects $rule): static
    {
        if (! $this->rules) {
            $this->rules = new Collection();
        }

        $this->rules[] = $rule;

        return $this;
    }
}
