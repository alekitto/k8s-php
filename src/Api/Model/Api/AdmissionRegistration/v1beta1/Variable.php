<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\AdmissionRegistration\v1beta1;

use Kcs\K8s\Attribute as Kubernetes;

/**
 * Variable is the definition of a variable that is used for composition. A variable is defined as a
 * named expression.
 */
class Variable
{
    #[Kubernetes\Attribute('expression', required: true)]
    protected string $expression;

    #[Kubernetes\Attribute('name', required: true)]
    protected string $name;

    public function __construct(string $expression, string $name)
    {
        $this->expression = $expression;
        $this->name = $name;
    }

    /**
     * Expression is the expression that will be evaluated as the value of the variable. The CEL expression
     * has access to the same identifiers as the CEL expressions in Validation.
     */
    public function getExpression(): string
    {
        return $this->expression;
    }

    /**
     * Expression is the expression that will be evaluated as the value of the variable. The CEL expression
     * has access to the same identifiers as the CEL expressions in Validation.
     *
     * @return static
     */
    public function setExpression(string $expression): static
    {
        $this->expression = $expression;

        return $this;
    }

    /**
     * Name is the name of the variable. The name must be a valid CEL identifier and unique among all
     * variables. The variable can be accessed in other expressions through `variables` For example, if
     * name is "foo", the variable will be available as `variables.foo`
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Name is the name of the variable. The name must be a valid CEL identifier and unique among all
     * variables. The variable can be accessed in other expressions through `variables` For example, if
     * name is "foo", the variable will be available as `variables.foo`
     *
     * @return static
     */
    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }
}
