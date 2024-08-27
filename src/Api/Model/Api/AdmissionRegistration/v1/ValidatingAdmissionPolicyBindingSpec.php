<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\AdmissionRegistration\v1;

use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;

/**
 * ValidatingAdmissionPolicyBindingSpec is the specification of the ValidatingAdmissionPolicyBinding.
 */
class ValidatingAdmissionPolicyBindingSpec
{
    #[Kubernetes\Attribute('matchResources', type: AttributeType::Model, model: MatchResources::class)]
    protected MatchResources|null $matchResources = null;

    #[Kubernetes\Attribute('paramRef', type: AttributeType::Model, model: ParamRef::class)]
    protected ParamRef|null $paramRef = null;

    #[Kubernetes\Attribute('policyName')]
    protected string|null $policyName = null;

    /** @var string[]|null */
    #[Kubernetes\Attribute('validationActions')]
    protected array|null $validationActions = null;

    /** @param string[]|null $validationActions */
    public function __construct(
        MatchResources|null $matchResources = null,
        ParamRef|null $paramRef = null,
        string|null $policyName = null,
        array|null $validationActions = null,
    ) {
        $this->matchResources = $matchResources;
        $this->paramRef = $paramRef;
        $this->policyName = $policyName;
        $this->validationActions = $validationActions;
    }

    /**
     * MatchResources declares what resources match this binding and will be validated by it. Note that
     * this is intersected with the policy's matchConstraints, so only requests that are matched by the
     * policy can be selected by this. If this is unset, all resources matched by the policy are validated
     * by this binding When resourceRules is unset, it does not constrain resource matching. If a resource
     * is matched by the other fields of this object, it will be validated. Note that this is differs from
     * ValidatingAdmissionPolicy matchConstraints, where resourceRules are required.
     */
    public function getMatchResources(): MatchResources|null
    {
        return $this->matchResources;
    }

    /**
     * MatchResources declares what resources match this binding and will be validated by it. Note that
     * this is intersected with the policy's matchConstraints, so only requests that are matched by the
     * policy can be selected by this. If this is unset, all resources matched by the policy are validated
     * by this binding When resourceRules is unset, it does not constrain resource matching. If a resource
     * is matched by the other fields of this object, it will be validated. Note that this is differs from
     * ValidatingAdmissionPolicy matchConstraints, where resourceRules are required.
     */
    public function setMatchResources(MatchResources $matchResources): static
    {
        $this->matchResources = $matchResources;

        return $this;
    }

    /**
     * paramRef specifies the parameter resource used to configure the admission control policy. It should
     * point to a resource of the type specified in ParamKind of the bound ValidatingAdmissionPolicy. If
     * the policy specifies a ParamKind and the resource referred to by ParamRef does not exist, this
     * binding is considered mis-configured and the FailurePolicy of the ValidatingAdmissionPolicy applied.
     * If the policy does not specify a ParamKind then this field is ignored, and the rules are evaluated
     * without a param.
     */
    public function getParamRef(): ParamRef|null
    {
        return $this->paramRef;
    }

    /**
     * paramRef specifies the parameter resource used to configure the admission control policy. It should
     * point to a resource of the type specified in ParamKind of the bound ValidatingAdmissionPolicy. If
     * the policy specifies a ParamKind and the resource referred to by ParamRef does not exist, this
     * binding is considered mis-configured and the FailurePolicy of the ValidatingAdmissionPolicy applied.
     * If the policy does not specify a ParamKind then this field is ignored, and the rules are evaluated
     * without a param.
     */
    public function setParamRef(ParamRef $paramRef): static
    {
        $this->paramRef = $paramRef;

        return $this;
    }

    /**
     * PolicyName references a ValidatingAdmissionPolicy name which the ValidatingAdmissionPolicyBinding
     * binds to. If the referenced resource does not exist, this binding is considered invalid and will be
     * ignored Required.
     */
    public function getPolicyName(): string|null
    {
        return $this->policyName;
    }

    /**
     * PolicyName references a ValidatingAdmissionPolicy name which the ValidatingAdmissionPolicyBinding
     * binds to. If the referenced resource does not exist, this binding is considered invalid and will be
     * ignored Required.
     */
    public function setPolicyName(string $policyName): static
    {
        $this->policyName = $policyName;

        return $this;
    }

    /**
     * validationActions declares how Validations of the referenced ValidatingAdmissionPolicy are enforced.
     * If a validation evaluates to false it is always enforced according to these actions.
     *
     * Failures defined by the ValidatingAdmissionPolicy's FailurePolicy are enforced according to these
     * actions only if the FailurePolicy is set to Fail, otherwise the failures are ignored. This includes
     * compilation errors, runtime errors and misconfigurations of the policy.
     *
     * validationActions is declared as a set of action values. Order does not matter. validationActions
     * may not contain duplicates of the same action.
     *
     * The supported actions values are:
     *
     * "Deny" specifies that a validation failure results in a denied request.
     *
     * "Warn" specifies that a validation failure is reported to the request client in HTTP Warning
     * headers, with a warning code of 299. Warnings can be sent both for allowed or denied admission
     * responses.
     *
     * "Audit" specifies that a validation failure is included in the published audit event for the
     * request. The audit event will contain a `validation.policy.admission.k8s.io/validation_failure`
     * audit annotation with a value containing the details of the validation failures, formatted as a JSON
     * list of objects, each with the following fields: - message: The validation failure message string -
     * policy: The resource name of the ValidatingAdmissionPolicy - binding: The resource name of the
     * ValidatingAdmissionPolicyBinding - expressionIndex: The index of the failed validations in the
     * ValidatingAdmissionPolicy - validationActions: The enforcement actions enacted for the validation
     * failure Example audit annotation: `"validation.policy.admission.k8s.io/validation_failure":
     * "[{"message": "Invalid value", {"policy": "policy.example.com", {"binding":
     * "policybinding.example.com", {"expressionIndex": "1", {"validationActions": ["Audit"]}]"`
     *
     * Clients should expect to handle additional values by ignoring any values not recognized.
     *
     * "Deny" and "Warn" may not be used together since this combination needlessly duplicates the
     * validation failure both in the API response body and the HTTP warning headers.
     *
     * Required.
     */
    public function getValidationActions(): array|null
    {
        return $this->validationActions;
    }

    /**
     * validationActions declares how Validations of the referenced ValidatingAdmissionPolicy are enforced.
     * If a validation evaluates to false it is always enforced according to these actions.
     *
     * Failures defined by the ValidatingAdmissionPolicy's FailurePolicy are enforced according to these
     * actions only if the FailurePolicy is set to Fail, otherwise the failures are ignored. This includes
     * compilation errors, runtime errors and misconfigurations of the policy.
     *
     * validationActions is declared as a set of action values. Order does not matter. validationActions
     * may not contain duplicates of the same action.
     *
     * The supported actions values are:
     *
     * "Deny" specifies that a validation failure results in a denied request.
     *
     * "Warn" specifies that a validation failure is reported to the request client in HTTP Warning
     * headers, with a warning code of 299. Warnings can be sent both for allowed or denied admission
     * responses.
     *
     * "Audit" specifies that a validation failure is included in the published audit event for the
     * request. The audit event will contain a `validation.policy.admission.k8s.io/validation_failure`
     * audit annotation with a value containing the details of the validation failures, formatted as a JSON
     * list of objects, each with the following fields: - message: The validation failure message string -
     * policy: The resource name of the ValidatingAdmissionPolicy - binding: The resource name of the
     * ValidatingAdmissionPolicyBinding - expressionIndex: The index of the failed validations in the
     * ValidatingAdmissionPolicy - validationActions: The enforcement actions enacted for the validation
     * failure Example audit annotation: `"validation.policy.admission.k8s.io/validation_failure":
     * "[{"message": "Invalid value", {"policy": "policy.example.com", {"binding":
     * "policybinding.example.com", {"expressionIndex": "1", {"validationActions": ["Audit"]}]"`
     *
     * Clients should expect to handle additional values by ignoring any values not recognized.
     *
     * "Deny" and "Warn" may not be used together since this combination needlessly duplicates the
     * validation failure both in the API response body and the HTTP warning headers.
     *
     * Required.
     */
    public function setValidationActions(array $validationActions): static
    {
        $this->validationActions = $validationActions;

        return $this;
    }
}
