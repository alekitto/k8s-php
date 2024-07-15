<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\AdmissionRegistration\v1;

use Kcs\K8s\Api\Model\ApiMachinery\Apis\Meta\v1\LabelSelector;
use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;

/**
 * ParamRef describes how to locate the params to be used as input to expressions of rules applied by a
 * policy binding.
 */
class ParamRef
{
    #[Kubernetes\Attribute('name')]
    protected string|null $name = null;

    #[Kubernetes\Attribute('namespace')]
    protected string|null $namespace = null;

    #[Kubernetes\Attribute('parameterNotFoundAction')]
    protected string|null $parameterNotFoundAction = null;

    #[Kubernetes\Attribute('selector', type: AttributeType::Model, model: LabelSelector::class)]
    protected LabelSelector|null $selector = null;

    public function __construct(
        string|null $name = null,
        string|null $namespace = null,
        string|null $parameterNotFoundAction = null,
        LabelSelector|null $selector = null,
    ) {
        $this->name = $name;
        $this->namespace = $namespace;
        $this->parameterNotFoundAction = $parameterNotFoundAction;
        $this->selector = $selector;
    }

    /**
     * name is the name of the resource being referenced.
     *
     * One of `name` or `selector` must be set, but `name` and `selector` are mutually exclusive
     * properties. If one is set, the other must be unset.
     *
     * A single parameter used for all admission requests can be configured by setting the `name` field,
     * leaving `selector` blank, and setting namespace if `paramKind` is namespace-scoped.
     */
    public function getName(): string|null
    {
        return $this->name;
    }

    /**
     * name is the name of the resource being referenced.
     *
     * One of `name` or `selector` must be set, but `name` and `selector` are mutually exclusive
     * properties. If one is set, the other must be unset.
     *
     * A single parameter used for all admission requests can be configured by setting the `name` field,
     * leaving `selector` blank, and setting namespace if `paramKind` is namespace-scoped.
     *
     * @return static
     */
    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    /**
     * namespace is the namespace of the referenced resource. Allows limiting the search for params to a
     * specific namespace. Applies to both `name` and `selector` fields.
     *
     * A per-namespace parameter may be used by specifying a namespace-scoped `paramKind` in the policy and
     * leaving this field empty.
     *
     * - If `paramKind` is cluster-scoped, this field MUST be unset. Setting this field results in a
     * configuration error.
     *
     * - If `paramKind` is namespace-scoped, the namespace of the object being evaluated for admission will
     * be used when this field is left unset. Take care that if this is left empty the binding must not
     * match any cluster-scoped resources, which will result in an error.
     */
    public function getNamespace(): string|null
    {
        return $this->namespace;
    }

    /**
     * namespace is the namespace of the referenced resource. Allows limiting the search for params to a
     * specific namespace. Applies to both `name` and `selector` fields.
     *
     * A per-namespace parameter may be used by specifying a namespace-scoped `paramKind` in the policy and
     * leaving this field empty.
     *
     * - If `paramKind` is cluster-scoped, this field MUST be unset. Setting this field results in a
     * configuration error.
     *
     * - If `paramKind` is namespace-scoped, the namespace of the object being evaluated for admission will
     * be used when this field is left unset. Take care that if this is left empty the binding must not
     * match any cluster-scoped resources, which will result in an error.
     *
     * @return static
     */
    public function setNamespace(string $namespace): static
    {
        $this->namespace = $namespace;

        return $this;
    }

    /**
     * `parameterNotFoundAction` controls the behavior of the binding when the resource exists, and name or
     * selector is valid, but there are no parameters matched by the binding. If the value is set to
     * `Allow`, then no matched parameters will be treated as successful validation by the binding. If set
     * to `Deny`, then no matched parameters will be subject to the `failurePolicy` of the policy.
     *
     * Allowed values are `Allow` or `Deny`
     *
     * Required
     */
    public function getParameterNotFoundAction(): string|null
    {
        return $this->parameterNotFoundAction;
    }

    /**
     * `parameterNotFoundAction` controls the behavior of the binding when the resource exists, and name or
     * selector is valid, but there are no parameters matched by the binding. If the value is set to
     * `Allow`, then no matched parameters will be treated as successful validation by the binding. If set
     * to `Deny`, then no matched parameters will be subject to the `failurePolicy` of the policy.
     *
     * Allowed values are `Allow` or `Deny`
     *
     * Required
     *
     * @return static
     */
    public function setParameterNotFoundAction(string $parameterNotFoundAction): static
    {
        $this->parameterNotFoundAction = $parameterNotFoundAction;

        return $this;
    }

    /**
     * selector can be used to match multiple param objects based on their labels. Supply selector: {} to
     * match all resources of the ParamKind.
     *
     * If multiple params are found, they are all evaluated with the policy expressions and the results are
     * ANDed together.
     *
     * One of `name` or `selector` must be set, but `name` and `selector` are mutually exclusive
     * properties. If one is set, the other must be unset.
     */
    public function getSelector(): LabelSelector|null
    {
        return $this->selector;
    }

    /**
     * selector can be used to match multiple param objects based on their labels. Supply selector: {} to
     * match all resources of the ParamKind.
     *
     * If multiple params are found, they are all evaluated with the policy expressions and the results are
     * ANDed together.
     *
     * One of `name` or `selector` must be set, but `name` and `selector` are mutually exclusive
     * properties. If one is set, the other must be unset.
     *
     * @return static
     */
    public function setSelector(LabelSelector $selector): static
    {
        $this->selector = $selector;

        return $this;
    }
}
