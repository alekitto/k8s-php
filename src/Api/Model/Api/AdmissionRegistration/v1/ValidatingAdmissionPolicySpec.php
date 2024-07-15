<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\AdmissionRegistration\v1;

use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;
use Kcs\K8s\Collection;

/**
 * ValidatingAdmissionPolicySpec is the specification of the desired behavior of the AdmissionPolicy.
 */
class ValidatingAdmissionPolicySpec
{
    /** @var iterable|AuditAnnotation[]|null */
    #[Kubernetes\Attribute('auditAnnotations', type: AttributeType::Collection, model: AuditAnnotation::class)]
    protected $auditAnnotations = null;

    #[Kubernetes\Attribute('failurePolicy')]
    protected string|null $failurePolicy = null;

    /** @var iterable|MatchCondition[]|null */
    #[Kubernetes\Attribute('matchConditions', type: AttributeType::Collection, model: MatchCondition::class)]
    protected $matchConditions = null;

    #[Kubernetes\Attribute('matchConstraints', type: AttributeType::Model, model: MatchResources::class)]
    protected MatchResources|null $matchConstraints = null;

    #[Kubernetes\Attribute('paramKind', type: AttributeType::Model, model: ParamKind::class)]
    protected ParamKind|null $paramKind = null;

    /** @var iterable|Validation[]|null */
    #[Kubernetes\Attribute('validations', type: AttributeType::Collection, model: Validation::class)]
    protected $validations = null;

    /** @var iterable|Variable[]|null */
    #[Kubernetes\Attribute('variables', type: AttributeType::Collection, model: Variable::class)]
    protected $variables = null;

    /**
     * auditAnnotations contains CEL expressions which are used to produce audit annotations for the audit
     * event of the API request. validations and auditAnnotations may not both be empty; a least one of
     * validations or auditAnnotations is required.
     *
     * @return iterable|AuditAnnotation[]
     */
    public function getAuditAnnotations(): iterable|null
    {
        return $this->auditAnnotations;
    }

    /**
     * auditAnnotations contains CEL expressions which are used to produce audit annotations for the audit
     * event of the API request. validations and auditAnnotations may not both be empty; a least one of
     * validations or auditAnnotations is required.
     *
     * @return static
     */
    public function setAuditAnnotations(iterable $auditAnnotations): static
    {
        $this->auditAnnotations = $auditAnnotations;

        return $this;
    }

    /** @return static */
    public function addAuditAnnotations(AuditAnnotation $auditAnnotation): static
    {
        if (! $this->auditAnnotations) {
            $this->auditAnnotations = new Collection();
        }

        $this->auditAnnotations[] = $auditAnnotation;

        return $this;
    }

    /**
     * failurePolicy defines how to handle failures for the admission policy. Failures can occur from CEL
     * expression parse errors, type check errors, runtime errors and invalid or mis-configured policy
     * definitions or bindings.
     *
     * A policy is invalid if spec.paramKind refers to a non-existent Kind. A binding is invalid if
     * spec.paramRef.name refers to a non-existent resource.
     *
     * failurePolicy does not define how validations that evaluate to false are handled.
     *
     * When failurePolicy is set to Fail, ValidatingAdmissionPolicyBinding validationActions define how
     * failures are enforced.
     *
     * Allowed values are Ignore or Fail. Defaults to Fail.
     */
    public function getFailurePolicy(): string|null
    {
        return $this->failurePolicy;
    }

    /**
     * failurePolicy defines how to handle failures for the admission policy. Failures can occur from CEL
     * expression parse errors, type check errors, runtime errors and invalid or mis-configured policy
     * definitions or bindings.
     *
     * A policy is invalid if spec.paramKind refers to a non-existent Kind. A binding is invalid if
     * spec.paramRef.name refers to a non-existent resource.
     *
     * failurePolicy does not define how validations that evaluate to false are handled.
     *
     * When failurePolicy is set to Fail, ValidatingAdmissionPolicyBinding validationActions define how
     * failures are enforced.
     *
     * Allowed values are Ignore or Fail. Defaults to Fail.
     *
     * @return static
     */
    public function setFailurePolicy(string $failurePolicy): static
    {
        $this->failurePolicy = $failurePolicy;

        return $this;
    }

    /**
     * MatchConditions is a list of conditions that must be met for a request to be validated. Match
     * conditions filter requests that have already been matched by the rules, namespaceSelector, and
     * objectSelector. An empty list of matchConditions matches all requests. There are a maximum of 64
     * match conditions allowed.
     *
     * If a parameter object is provided, it can be accessed via the `params` handle in the same manner as
     * validation expressions.
     *
     * The exact matching logic is (in order):
     *   1. If ANY matchCondition evaluates to FALSE, the policy is skipped.
     *   2. If ALL matchConditions evaluate to TRUE, the policy is evaluated.
     *   3. If any matchCondition evaluates to an error (but none are FALSE):
     *      - If failurePolicy=Fail, reject the request
     *      - If failurePolicy=Ignore, the policy is skipped
     *
     * @return iterable|MatchCondition[]
     */
    public function getMatchConditions(): iterable|null
    {
        return $this->matchConditions;
    }

    /**
     * MatchConditions is a list of conditions that must be met for a request to be validated. Match
     * conditions filter requests that have already been matched by the rules, namespaceSelector, and
     * objectSelector. An empty list of matchConditions matches all requests. There are a maximum of 64
     * match conditions allowed.
     *
     * If a parameter object is provided, it can be accessed via the `params` handle in the same manner as
     * validation expressions.
     *
     * The exact matching logic is (in order):
     *   1. If ANY matchCondition evaluates to FALSE, the policy is skipped.
     *   2. If ALL matchConditions evaluate to TRUE, the policy is evaluated.
     *   3. If any matchCondition evaluates to an error (but none are FALSE):
     *      - If failurePolicy=Fail, reject the request
     *      - If failurePolicy=Ignore, the policy is skipped
     *
     * @return static
     */
    public function setMatchConditions(iterable $matchConditions): static
    {
        $this->matchConditions = $matchConditions;

        return $this;
    }

    /** @return static */
    public function addMatchConditions(MatchCondition $matchCondition): static
    {
        if (! $this->matchConditions) {
            $this->matchConditions = new Collection();
        }

        $this->matchConditions[] = $matchCondition;

        return $this;
    }

    /**
     * MatchConstraints specifies what resources this policy is designed to validate. The AdmissionPolicy
     * cares about a request if it matches _all_ Constraints. However, in order to prevent clusters from
     * being put into an unstable state that cannot be recovered from via the API ValidatingAdmissionPolicy
     * cannot match ValidatingAdmissionPolicy and ValidatingAdmissionPolicyBinding. Required.
     */
    public function getMatchConstraints(): MatchResources|null
    {
        return $this->matchConstraints;
    }

    /**
     * MatchConstraints specifies what resources this policy is designed to validate. The AdmissionPolicy
     * cares about a request if it matches _all_ Constraints. However, in order to prevent clusters from
     * being put into an unstable state that cannot be recovered from via the API ValidatingAdmissionPolicy
     * cannot match ValidatingAdmissionPolicy and ValidatingAdmissionPolicyBinding. Required.
     *
     * @return static
     */
    public function setMatchConstraints(MatchResources $matchConstraints): static
    {
        $this->matchConstraints = $matchConstraints;

        return $this;
    }

    /**
     * ParamKind specifies the kind of resources used to parameterize this policy. If absent, there are no
     * parameters for this policy and the param CEL variable will not be provided to validation
     * expressions. If ParamKind refers to a non-existent kind, this policy definition is mis-configured
     * and the FailurePolicy is applied. If paramKind is specified but paramRef is unset in
     * ValidatingAdmissionPolicyBinding, the params variable will be null.
     */
    public function getParamKind(): ParamKind|null
    {
        return $this->paramKind;
    }

    /**
     * ParamKind specifies the kind of resources used to parameterize this policy. If absent, there are no
     * parameters for this policy and the param CEL variable will not be provided to validation
     * expressions. If ParamKind refers to a non-existent kind, this policy definition is mis-configured
     * and the FailurePolicy is applied. If paramKind is specified but paramRef is unset in
     * ValidatingAdmissionPolicyBinding, the params variable will be null.
     *
     * @return static
     */
    public function setParamKind(ParamKind $paramKind): static
    {
        $this->paramKind = $paramKind;

        return $this;
    }

    /**
     * Validations contain CEL expressions which is used to apply the validation. Validations and
     * AuditAnnotations may not both be empty; a minimum of one Validations or AuditAnnotations is
     * required.
     *
     * @return iterable|Validation[]
     */
    public function getValidations(): iterable|null
    {
        return $this->validations;
    }

    /**
     * Validations contain CEL expressions which is used to apply the validation. Validations and
     * AuditAnnotations may not both be empty; a minimum of one Validations or AuditAnnotations is
     * required.
     *
     * @return static
     */
    public function setValidations(iterable $validations): static
    {
        $this->validations = $validations;

        return $this;
    }

    /** @return static */
    public function addValidations(Validation $validation): static
    {
        if (! $this->validations) {
            $this->validations = new Collection();
        }

        $this->validations[] = $validation;

        return $this;
    }

    /**
     * Variables contain definitions of variables that can be used in composition of other expressions.
     * Each variable is defined as a named CEL expression. The variables defined here will be available
     * under `variables` in other expressions of the policy except MatchConditions because MatchConditions
     * are evaluated before the rest of the policy.
     *
     * The expression of a variable can refer to other variables defined earlier in the list but not those
     * after. Thus, Variables must be sorted by the order of first appearance and acyclic.
     *
     * @return iterable|Variable[]
     */
    public function getVariables(): iterable|null
    {
        return $this->variables;
    }

    /**
     * Variables contain definitions of variables that can be used in composition of other expressions.
     * Each variable is defined as a named CEL expression. The variables defined here will be available
     * under `variables` in other expressions of the policy except MatchConditions because MatchConditions
     * are evaluated before the rest of the policy.
     *
     * The expression of a variable can refer to other variables defined earlier in the list but not those
     * after. Thus, Variables must be sorted by the order of first appearance and acyclic.
     *
     * @return static
     */
    public function setVariables(iterable $variables): static
    {
        $this->variables = $variables;

        return $this;
    }

    /** @return static */
    public function addVariables(Variable $variable): static
    {
        if (! $this->variables) {
            $this->variables = new Collection();
        }

        $this->variables[] = $variable;

        return $this;
    }
}
