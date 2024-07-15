<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Authorization\v1;

use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;
use Kcs\K8s\Collection;

/**
 * SubjectRulesReviewStatus contains the result of a rules check. This check can be incomplete
 * depending on the set of authorizers the server is configured with and any errors experienced during
 * evaluation. Because authorization rules are additive, if a rule appears in a list it's safe to
 * assume the subject has that permission, even if that list is incomplete.
 */
class SubjectRulesReviewStatus
{
    #[Kubernetes\Attribute('evaluationError')]
    protected string|null $evaluationError = null;

    #[Kubernetes\Attribute('incomplete', required: true)]
    protected bool $incomplete;

    /** @var iterable|NonResourceRule[] */
    #[Kubernetes\Attribute('nonResourceRules', type: AttributeType::Collection, model: NonResourceRule::class, required: true)]
    protected iterable $nonResourceRules;

    /** @var iterable|ResourceRule[] */
    #[Kubernetes\Attribute('resourceRules', type: AttributeType::Collection, model: ResourceRule::class, required: true)]
    protected iterable $resourceRules;

    /**
     * @param iterable|NonResourceRule[] $nonResourceRules
     * @param iterable|ResourceRule[] $resourceRules
     */
    public function __construct(bool $incomplete, iterable $nonResourceRules, iterable $resourceRules)
    {
        $this->incomplete = $incomplete;
        $this->nonResourceRules = new Collection($nonResourceRules);
        $this->resourceRules = new Collection($resourceRules);
    }

    /**
     * EvaluationError can appear in combination with Rules. It indicates an error occurred during rule
     * evaluation, such as an authorizer that doesn't support rule evaluation, and that ResourceRules
     * and/or NonResourceRules may be incomplete.
     */
    public function getEvaluationError(): string|null
    {
        return $this->evaluationError;
    }

    /**
     * EvaluationError can appear in combination with Rules. It indicates an error occurred during rule
     * evaluation, such as an authorizer that doesn't support rule evaluation, and that ResourceRules
     * and/or NonResourceRules may be incomplete.
     *
     * @return static
     */
    public function setEvaluationError(string $evaluationError): static
    {
        $this->evaluationError = $evaluationError;

        return $this;
    }

    /**
     * Incomplete is true when the rules returned by this call are incomplete. This is most commonly
     * encountered when an authorizer, such as an external authorizer, doesn't support rules evaluation.
     */
    public function isIncomplete(): bool
    {
        return $this->incomplete;
    }

    /**
     * Incomplete is true when the rules returned by this call are incomplete. This is most commonly
     * encountered when an authorizer, such as an external authorizer, doesn't support rules evaluation.
     *
     * @return static
     */
    public function setIsIncomplete(bool $incomplete): static
    {
        $this->incomplete = $incomplete;

        return $this;
    }

    /**
     * NonResourceRules is the list of actions the subject is allowed to perform on non-resources. The list
     * ordering isn't significant, may contain duplicates, and possibly be incomplete.
     *
     * @return iterable|NonResourceRule[]
     */
    public function getNonResourceRules(): iterable
    {
        return $this->nonResourceRules;
    }

    /**
     * NonResourceRules is the list of actions the subject is allowed to perform on non-resources. The list
     * ordering isn't significant, may contain duplicates, and possibly be incomplete.
     *
     * @return static
     */
    public function setNonResourceRules(iterable $nonResourceRules): static
    {
        $this->nonResourceRules = $nonResourceRules;

        return $this;
    }

    /** @return static */
    public function addNonResourceRules(NonResourceRule $nonResourceRule): static
    {
        if (! $this->nonResourceRules) {
            $this->nonResourceRules = new Collection();
        }

        $this->nonResourceRules[] = $nonResourceRule;

        return $this;
    }

    /**
     * ResourceRules is the list of actions the subject is allowed to perform on resources. The list
     * ordering isn't significant, may contain duplicates, and possibly be incomplete.
     *
     * @return iterable|ResourceRule[]
     */
    public function getResourceRules(): iterable
    {
        return $this->resourceRules;
    }

    /**
     * ResourceRules is the list of actions the subject is allowed to perform on resources. The list
     * ordering isn't significant, may contain duplicates, and possibly be incomplete.
     *
     * @return static
     */
    public function setResourceRules(iterable $resourceRules): static
    {
        $this->resourceRules = $resourceRules;

        return $this;
    }

    /** @return static */
    public function addResourceRules(ResourceRule $resourceRule): static
    {
        if (! $this->resourceRules) {
            $this->resourceRules = new Collection();
        }

        $this->resourceRules[] = $resourceRule;

        return $this;
    }
}
