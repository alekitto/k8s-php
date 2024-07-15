<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\AdmissionRegistration\v1alpha1;

use Kcs\K8s\Attribute as Kubernetes;

/**
 * ExpressionWarning is a warning information that targets a specific expression.
 */
class ExpressionWarning
{
    #[Kubernetes\Attribute('fieldRef', required: true)]
    protected string $fieldRef;

    #[Kubernetes\Attribute('warning', required: true)]
    protected string $warning;

    public function __construct(string $fieldRef, string $warning)
    {
        $this->fieldRef = $fieldRef;
        $this->warning = $warning;
    }

    /**
     * The path to the field that refers the expression. For example, the reference to the expression of
     * the first item of validations is "spec.validations[0].expression"
     */
    public function getFieldRef(): string
    {
        return $this->fieldRef;
    }

    /**
     * The path to the field that refers the expression. For example, the reference to the expression of
     * the first item of validations is "spec.validations[0].expression"
     *
     * @return static
     */
    public function setFieldRef(string $fieldRef): static
    {
        $this->fieldRef = $fieldRef;

        return $this;
    }

    /**
     * The content of type checking information in a human-readable form. Each line of the warning contains
     * the type that the expression is checked against, followed by the type check error from the compiler.
     */
    public function getWarning(): string
    {
        return $this->warning;
    }

    /**
     * The content of type checking information in a human-readable form. Each line of the warning contains
     * the type that the expression is checked against, followed by the type check error from the compiler.
     *
     * @return static
     */
    public function setWarning(string $warning): static
    {
        $this->warning = $warning;

        return $this;
    }
}
