<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\AdmissionRegistration\v1;

use DateTimeInterface;
use Kcs\K8s\Api\Model\ApiMachinery\Apis\Meta\v1\ManagedFieldsEntry;
use Kcs\K8s\Api\Model\ApiMachinery\Apis\Meta\v1\ObjectMeta;
use Kcs\K8s\Api\Model\ApiMachinery\Apis\Meta\v1\OwnerReference;
use Kcs\K8s\Api\Model\ApiMachinery\Apis\Meta\v1\Status;
use Kcs\K8s\Api\Model\ApiMachinery\Apis\Meta\v1\WatchEvent;
use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;

/**
 * ValidatingAdmissionPolicyBinding binds the ValidatingAdmissionPolicy with paramerized resources.
 * ValidatingAdmissionPolicyBinding and parameter CRDs together define how cluster administrators
 * configure policies for clusters.
 *
 * For a given admission request, each binding will cause its policy to be evaluated N times, where N
 * is 1 for policies/bindings that don't use params, otherwise N is the number of parameters selected
 * by the binding.
 *
 * The CEL expressions of a policy must have a computed CEL cost below the maximum CEL budget. Each
 * evaluation of the policy is given an independent CEL cost budget. Adding/removing policies,
 * bindings, or params can not affect whether a given (policy, binding, param) combination is within
 * its own CEL budget.
 */
#[Kubernetes\Kind('ValidatingAdmissionPolicyBinding', group: 'admissionregistration.k8s.io', version: 'v1')]
#[Kubernetes\Operation('get', path: '/apis/admissionregistration.k8s.io/v1/validatingadmissionpolicybindings/{name}', response: 'self')]
#[Kubernetes\Operation('post', path: '/apis/admissionregistration.k8s.io/v1/validatingadmissionpolicybindings', body: 'model', response: 'self')]
#[Kubernetes\Operation('delete', path: '/apis/admissionregistration.k8s.io/v1/validatingadmissionpolicybindings/{name}')]
#[Kubernetes\Operation(
    'put',
    path: '/apis/admissionregistration.k8s.io/v1/validatingadmissionpolicybindings/{name}',
    body: 'model',
    response: 'self',
)]
#[Kubernetes\Operation(
    'deletecollection-all',
    path: '/apis/admissionregistration.k8s.io/v1/validatingadmissionpolicybindings',
    response: Status::class,
)]
#[Kubernetes\Operation(
    'watch-all',
    path: '/apis/admissionregistration.k8s.io/v1/validatingadmissionpolicybindings',
    response: WatchEvent::class,
)]
#[Kubernetes\Operation(
    'patch',
    path: '/apis/admissionregistration.k8s.io/v1/validatingadmissionpolicybindings/{name}',
    body: 'patch',
    response: 'self',
)]
#[Kubernetes\Operation(
    'list-all',
    path: '/apis/admissionregistration.k8s.io/v1/validatingadmissionpolicybindings',
    response: ValidatingAdmissionPolicyBindingList::class,
)]
class ValidatingAdmissionPolicyBinding
{
    #[Kubernetes\Attribute('apiVersion')]
    protected string $apiVersion = 'admissionregistration.k8s.io/v1';

    #[Kubernetes\Attribute('kind')]
    protected string $kind = 'ValidatingAdmissionPolicyBinding';

    #[Kubernetes\Attribute('metadata', type: AttributeType::Model, model: ObjectMeta::class)]
    protected ObjectMeta $metadata;

    #[Kubernetes\Attribute('spec', type: AttributeType::Model, model: ValidatingAdmissionPolicyBindingSpec::class)]
    protected ValidatingAdmissionPolicyBindingSpec $spec;

    public function __construct(string|null $name)
    {
        $this->metadata = new ObjectMeta($name);
    }

    /**
     * Annotations is an unstructured key value map stored with a resource that may be set by external
     * tools to store and retrieve arbitrary metadata. They are not queryable and should be preserved when
     * modifying objects. More info:
     * https://kubernetes.io/docs/concepts/overview/working-with-objects/annotations
     */
    public function getAnnotations(): array|null
    {
        return $this->metadata->getAnnotations();
    }

    /**
     * Annotations is an unstructured key value map stored with a resource that may be set by external
     * tools to store and retrieve arbitrary metadata. They are not queryable and should be preserved when
     * modifying objects. More info:
     * https://kubernetes.io/docs/concepts/overview/working-with-objects/annotations
     */
    public function setAnnotations(array $annotations): static
    {
        $this->metadata->setAnnotations($annotations);

        return $this;
    }

    /**
     * CreationTimestamp is a timestamp representing the server time when this object was created. It is
     * not guaranteed to be set in happens-before order across separate operations. Clients may not set
     * this value. It is represented in RFC3339 form and is in UTC.
     *
     * Populated by the system. Read-only. Null for lists. More info:
     * https://git.k8s.io/community/contributors/devel/sig-architecture/api-conventions.md#metadata
     */
    public function getCreationTimestamp(): DateTimeInterface|null
    {
        return $this->metadata->getCreationTimestamp();
    }

    /**
     * Number of seconds allowed for this object to gracefully terminate before it will be removed from the
     * system. Only set when deletionTimestamp is also set. May only be shortened. Read-only.
     */
    public function getDeletionGracePeriodSeconds(): int|null
    {
        return $this->metadata->getDeletionGracePeriodSeconds();
    }

    /**
     * DeletionTimestamp is RFC 3339 date and time at which this resource will be deleted. This field is
     * set by the server when a graceful deletion is requested by the user, and is not directly settable by
     * a client. The resource is expected to be deleted (no longer visible from resource lists, and not
     * reachable by name) after the time in this field, once the finalizers list is empty. As long as the
     * finalizers list contains items, deletion is blocked. Once the deletionTimestamp is set, this value
     * may not be unset or be set further into the future, although it may be shortened or the resource may
     * be deleted prior to this time. For example, a user may request that a pod is deleted in 30 seconds.
     * The Kubelet will react by sending a graceful termination signal to the containers in the pod. After
     * that 30 seconds, the Kubelet will send a hard termination signal (SIGKILL) to the container and
     * after cleanup, remove the pod from the API. In the presence of network partitions, this object may
     * still exist after this timestamp, until an administrator or automated process can determine the
     * resource is fully terminated. If not set, graceful deletion of the object has not been requested.
     *
     * Populated by the system when a graceful deletion is requested. Read-only. More info:
     * https://git.k8s.io/community/contributors/devel/sig-architecture/api-conventions.md#metadata
     */
    public function getDeletionTimestamp(): DateTimeInterface|null
    {
        return $this->metadata->getDeletionTimestamp();
    }

    /**
     * Must be empty before the object is deleted from the registry. Each entry is an identifier for the
     * responsible component that will remove the entry from the list. If the deletionTimestamp of the
     * object is non-nil, entries in this list can only be removed. Finalizers may be processed and removed
     * in any order.  Order is NOT enforced because it introduces significant risk of stuck finalizers.
     * finalizers is a shared field, any actor with permission can reorder it. If the finalizer list is
     * processed in order, then this can lead to a situation in which the component responsible for the
     * first finalizer in the list is waiting for a signal (field value, external system, or other)
     * produced by a component responsible for a finalizer later in the list, resulting in a deadlock.
     * Without enforced ordering finalizers are free to order amongst themselves and are not vulnerable to
     * ordering changes in the list.
     */
    public function getFinalizers(): array|null
    {
        return $this->metadata->getFinalizers();
    }

    /**
     * Must be empty before the object is deleted from the registry. Each entry is an identifier for the
     * responsible component that will remove the entry from the list. If the deletionTimestamp of the
     * object is non-nil, entries in this list can only be removed. Finalizers may be processed and removed
     * in any order.  Order is NOT enforced because it introduces significant risk of stuck finalizers.
     * finalizers is a shared field, any actor with permission can reorder it. If the finalizer list is
     * processed in order, then this can lead to a situation in which the component responsible for the
     * first finalizer in the list is waiting for a signal (field value, external system, or other)
     * produced by a component responsible for a finalizer later in the list, resulting in a deadlock.
     * Without enforced ordering finalizers are free to order amongst themselves and are not vulnerable to
     * ordering changes in the list.
     */
    public function setFinalizers(array $finalizers): static
    {
        $this->metadata->setFinalizers($finalizers);

        return $this;
    }

    /**
     * GenerateName is an optional prefix, used by the server, to generate a unique name ONLY IF the Name
     * field has not been provided. If this field is used, the name returned to the client will be
     * different than the name passed. This value will also be combined with a unique suffix. The provided
     * value has the same validation rules as the Name field, and may be truncated by the length of the
     * suffix required to make the value unique on the server.
     *
     * If this field is specified and the generated name exists, the server will return a 409.
     *
     * Applied only if Name is not specified. More info:
     * https://git.k8s.io/community/contributors/devel/sig-architecture/api-conventions.md#idempotency
     */
    public function getGenerateName(): string|null
    {
        return $this->metadata->getGenerateName();
    }

    /**
     * GenerateName is an optional prefix, used by the server, to generate a unique name ONLY IF the Name
     * field has not been provided. If this field is used, the name returned to the client will be
     * different than the name passed. This value will also be combined with a unique suffix. The provided
     * value has the same validation rules as the Name field, and may be truncated by the length of the
     * suffix required to make the value unique on the server.
     *
     * If this field is specified and the generated name exists, the server will return a 409.
     *
     * Applied only if Name is not specified. More info:
     * https://git.k8s.io/community/contributors/devel/sig-architecture/api-conventions.md#idempotency
     */
    public function setGenerateName(string $generateName): static
    {
        $this->metadata->setGenerateName($generateName);

        return $this;
    }

    /**
     * A sequence number representing a specific generation of the desired state. Populated by the system.
     * Read-only.
     */
    public function getGeneration(): int|null
    {
        return $this->metadata->getGeneration();
    }

    /**
     * Map of string keys and values that can be used to organize and categorize (scope and select)
     * objects. May match selectors of replication controllers and services. More info:
     * https://kubernetes.io/docs/concepts/overview/working-with-objects/labels
     */
    public function getLabels(): array|null
    {
        return $this->metadata->getLabels();
    }

    /**
     * Map of string keys and values that can be used to organize and categorize (scope and select)
     * objects. May match selectors of replication controllers and services. More info:
     * https://kubernetes.io/docs/concepts/overview/working-with-objects/labels
     */
    public function setLabels(array $labels): static
    {
        $this->metadata->setLabels($labels);

        return $this;
    }

    /**
     * ManagedFields maps workflow-id and version to the set of fields that are managed by that workflow.
     * This is mostly for internal housekeeping, and users typically shouldn't need to set or understand
     * this field. A workflow can be the user's name, a controller's name, or the name of a specific apply
     * path like "ci-cd". The set of fields is always in the version that the workflow used when modifying
     * the object.
     *
     * @return iterable|ManagedFieldsEntry[]
     */
    public function getManagedFields(): iterable|null
    {
        return $this->metadata->getManagedFields();
    }

    /**
     * ManagedFields maps workflow-id and version to the set of fields that are managed by that workflow.
     * This is mostly for internal housekeeping, and users typically shouldn't need to set or understand
     * this field. A workflow can be the user's name, a controller's name, or the name of a specific apply
     * path like "ci-cd". The set of fields is always in the version that the workflow used when modifying
     * the object.
     */
    public function setManagedFields(iterable $managedFields): static
    {
        $this->metadata->setManagedFields($managedFields);

        return $this;
    }

    public function addManagedFields(ManagedFieldsEntry $managedField): static
    {
        $this->metadata->addManagedFields($managedField);

        return $this;
    }

    /**
     * Name must be unique within a namespace. Is required when creating resources, although some resources
     * may allow a client to request the generation of an appropriate name automatically. Name is primarily
     * intended for creation idempotence and configuration definition. Cannot be updated. More info:
     * https://kubernetes.io/docs/concepts/overview/working-with-objects/names#names
     */
    public function getName(): string|null
    {
        return $this->metadata->getName();
    }

    /**
     * Name must be unique within a namespace. Is required when creating resources, although some resources
     * may allow a client to request the generation of an appropriate name automatically. Name is primarily
     * intended for creation idempotence and configuration definition. Cannot be updated. More info:
     * https://kubernetes.io/docs/concepts/overview/working-with-objects/names#names
     */
    public function setName(string $name): static
    {
        $this->metadata->setName($name);

        return $this;
    }

    /**
     * Namespace defines the space within which each name must be unique. An empty namespace is equivalent
     * to the "default" namespace, but "default" is the canonical representation. Not all objects are
     * required to be scoped to a namespace - the value of this field for those objects will be empty.
     *
     * Must be a DNS_LABEL. Cannot be updated. More info:
     * https://kubernetes.io/docs/concepts/overview/working-with-objects/namespaces
     */
    public function getNamespace(): string|null
    {
        return $this->metadata->getNamespace();
    }

    /**
     * Namespace defines the space within which each name must be unique. An empty namespace is equivalent
     * to the "default" namespace, but "default" is the canonical representation. Not all objects are
     * required to be scoped to a namespace - the value of this field for those objects will be empty.
     *
     * Must be a DNS_LABEL. Cannot be updated. More info:
     * https://kubernetes.io/docs/concepts/overview/working-with-objects/namespaces
     */
    public function setNamespace(string $namespace): static
    {
        $this->metadata->setNamespace($namespace);

        return $this;
    }

    /**
     * List of objects depended by this object. If ALL objects in the list have been deleted, this object
     * will be garbage collected. If this object is managed by a controller, then an entry in this list
     * will point to this controller, with the controller field set to true. There cannot be more than one
     * managing controller.
     *
     * @return iterable|OwnerReference[]
     */
    public function getOwnerReferences(): iterable|null
    {
        return $this->metadata->getOwnerReferences();
    }

    /**
     * List of objects depended by this object. If ALL objects in the list have been deleted, this object
     * will be garbage collected. If this object is managed by a controller, then an entry in this list
     * will point to this controller, with the controller field set to true. There cannot be more than one
     * managing controller.
     */
    public function setOwnerReferences(iterable $ownerReferences): static
    {
        $this->metadata->setOwnerReferences($ownerReferences);

        return $this;
    }

    public function addOwnerReferences(OwnerReference $ownerReference): static
    {
        $this->metadata->addOwnerReferences($ownerReference);

        return $this;
    }

    /**
     * An opaque value that represents the internal version of this object that can be used by clients to
     * determine when objects have changed. May be used for optimistic concurrency, change detection, and
     * the watch operation on a resource or set of resources. Clients must treat these values as opaque and
     * passed unmodified back to the server. They may only be valid for a particular resource or set of
     * resources.
     *
     * Populated by the system. Read-only. Value must be treated as opaque by clients and . More info:
     * https://git.k8s.io/community/contributors/devel/sig-architecture/api-conventions.md#concurrency-control-and-consistency
     */
    public function getResourceVersion(): string|null
    {
        return $this->metadata->getResourceVersion();
    }

    /**
     * Deprecated: selfLink is a legacy read-only field that is no longer populated by the system.
     */
    public function getSelfLink(): string|null
    {
        return $this->metadata->getSelfLink();
    }

    /**
     * Deprecated: selfLink is a legacy read-only field that is no longer populated by the system.
     */
    public function setSelfLink(string $selfLink): static
    {
        $this->metadata->setSelfLink($selfLink);

        return $this;
    }

    /**
     * UID is the unique in time and space value for this object. It is typically generated by the server
     * on successful creation of a resource and is not allowed to change on PUT operations.
     *
     * Populated by the system. Read-only. More info:
     * https://kubernetes.io/docs/concepts/overview/working-with-objects/names#uids
     */
    public function getUid(): string|null
    {
        return $this->metadata->getUid();
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
        return $this->spec->getMatchResources();
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
        $this->spec->setMatchResources($matchResources);

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
        return $this->spec->getParamRef();
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
        $this->spec->setParamRef($paramRef);

        return $this;
    }

    /**
     * PolicyName references a ValidatingAdmissionPolicy name which the ValidatingAdmissionPolicyBinding
     * binds to. If the referenced resource does not exist, this binding is considered invalid and will be
     * ignored Required.
     */
    public function getPolicyName(): string|null
    {
        return $this->spec->getPolicyName();
    }

    /**
     * PolicyName references a ValidatingAdmissionPolicy name which the ValidatingAdmissionPolicyBinding
     * binds to. If the referenced resource does not exist, this binding is considered invalid and will be
     * ignored Required.
     */
    public function setPolicyName(string $policyName): static
    {
        $this->spec->setPolicyName($policyName);

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
        return $this->spec->getValidationActions();
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
        $this->spec->setValidationActions($validationActions);

        return $this;
    }

    /**
     * APIVersion defines the versioned schema of this representation of an object. Servers should convert
     * recognized schemas to the latest internal value, and may reject unrecognized values. More info:
     * https://git.k8s.io/community/contributors/devel/sig-architecture/api-conventions.md#resources
     */
    public function getApiVersion(): string
    {
        return $this->apiVersion;
    }

    /**
     * APIVersion defines the versioned schema of this representation of an object. Servers should convert
     * recognized schemas to the latest internal value, and may reject unrecognized values. More info:
     * https://git.k8s.io/community/contributors/devel/sig-architecture/api-conventions.md#resources
     */
    public function setApiVersion(string $apiVersion): static
    {
        $this->apiVersion = $apiVersion;

        return $this;
    }

    /**
     * Kind is a string value representing the REST resource this object represents. Servers may infer this
     * from the endpoint the client submits requests to. Cannot be updated. In CamelCase. More info:
     * https://git.k8s.io/community/contributors/devel/sig-architecture/api-conventions.md#types-kinds
     */
    public function getKind(): string
    {
        return $this->kind;
    }

    /**
     * Kind is a string value representing the REST resource this object represents. Servers may infer this
     * from the endpoint the client submits requests to. Cannot be updated. In CamelCase. More info:
     * https://git.k8s.io/community/contributors/devel/sig-architecture/api-conventions.md#types-kinds
     */
    public function setKind(string $kind): static
    {
        $this->kind = $kind;

        return $this;
    }

    /**
     * Standard object metadata; More info:
     * https://git.k8s.io/community/contributors/devel/sig-architecture/api-conventions.md#metadata.
     */
    public function getMetadata(): ObjectMeta
    {
        return $this->metadata;
    }

    /**
     * Standard object metadata; More info:
     * https://git.k8s.io/community/contributors/devel/sig-architecture/api-conventions.md#metadata.
     */
    public function setMetadata(ObjectMeta $metadata): static
    {
        $this->metadata = $metadata;

        return $this;
    }

    /**
     * Specification of the desired behavior of the ValidatingAdmissionPolicyBinding.
     */
    public function getSpec(): ValidatingAdmissionPolicyBindingSpec
    {
        return $this->spec;
    }

    /**
     * Specification of the desired behavior of the ValidatingAdmissionPolicyBinding.
     */
    public function setSpec(ValidatingAdmissionPolicyBindingSpec $spec): static
    {
        $this->spec = $spec;

        return $this;
    }
}
