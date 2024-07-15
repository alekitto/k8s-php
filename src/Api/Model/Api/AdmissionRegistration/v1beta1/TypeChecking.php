<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\AdmissionRegistration\v1beta1;

use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;
use Kcs\K8s\Collection;

/**
 * TypeChecking contains results of type checking the expressions in the ValidatingAdmissionPolicy
 */
class TypeChecking
{
    /** @var iterable|ExpressionWarning[]|null */
    #[Kubernetes\Attribute('expressionWarnings', type: AttributeType::Collection, model: ExpressionWarning::class)]
    protected $expressionWarnings = null;

    /** @param iterable|ExpressionWarning[] $expressionWarnings */
    public function __construct(iterable $expressionWarnings = [])
    {
        $this->expressionWarnings = new Collection($expressionWarnings);
    }

    /**
     * The type checking warnings for each expression.
     *
     * @return iterable|ExpressionWarning[]
     */
    public function getExpressionWarnings(): iterable|null
    {
        return $this->expressionWarnings;
    }

    /**
     * The type checking warnings for each expression.
     *
     * @return static
     */
    public function setExpressionWarnings(iterable $expressionWarnings): static
    {
        $this->expressionWarnings = $expressionWarnings;

        return $this;
    }

    /** @return static */
    public function addExpressionWarnings(ExpressionWarning $expressionWarning): static
    {
        if (! $this->expressionWarnings) {
            $this->expressionWarnings = new Collection();
        }

        $this->expressionWarnings[] = $expressionWarning;

        return $this;
    }
}
