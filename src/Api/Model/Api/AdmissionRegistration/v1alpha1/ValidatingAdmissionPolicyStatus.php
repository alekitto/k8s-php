<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\AdmissionRegistration\v1alpha1;

use Kcs\K8s\Api\Model\ApiMachinery\Apis\Meta\v1\Condition;
use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;
use Kcs\K8s\Collection;

/**
 * ValidatingAdmissionPolicyStatus represents the status of a ValidatingAdmissionPolicy.
 */
class ValidatingAdmissionPolicyStatus
{
    /** @var iterable|Condition[]|null */
    #[Kubernetes\Attribute('conditions', type: AttributeType::Collection, model: Condition::class)]
    protected $conditions = null;

    #[Kubernetes\Attribute('observedGeneration')]
    protected int|null $observedGeneration = null;

    #[Kubernetes\Attribute('typeChecking', type: AttributeType::Model, model: TypeChecking::class)]
    protected TypeChecking|null $typeChecking = null;

    /** @param iterable|Condition[] $conditions */
    public function __construct(
        iterable $conditions = [],
        int|null $observedGeneration = null,
        TypeChecking|null $typeChecking = null,
    ) {
        $this->conditions = new Collection($conditions);
        $this->observedGeneration = $observedGeneration;
        $this->typeChecking = $typeChecking;
    }

    /**
     * The conditions represent the latest available observations of a policy's current state.
     *
     * @return iterable|Condition[]
     */
    public function getConditions(): iterable|null
    {
        return $this->conditions;
    }

    /**
     * The conditions represent the latest available observations of a policy's current state.
     *
     * @return static
     */
    public function setConditions(iterable $conditions): static
    {
        $this->conditions = $conditions;

        return $this;
    }

    /** @return static */
    public function addConditions(Condition $condition): static
    {
        if (! $this->conditions) {
            $this->conditions = new Collection();
        }

        $this->conditions[] = $condition;

        return $this;
    }

    /**
     * The generation observed by the controller.
     */
    public function getObservedGeneration(): int|null
    {
        return $this->observedGeneration;
    }

    /**
     * The generation observed by the controller.
     *
     * @return static
     */
    public function setObservedGeneration(int $observedGeneration): static
    {
        $this->observedGeneration = $observedGeneration;

        return $this;
    }

    /**
     * The results of type checking for each expression. Presence of this field indicates the completion of
     * the type checking.
     */
    public function getTypeChecking(): TypeChecking|null
    {
        return $this->typeChecking;
    }

    /**
     * The results of type checking for each expression. Presence of this field indicates the completion of
     * the type checking.
     *
     * @return static
     */
    public function setTypeChecking(TypeChecking $typeChecking): static
    {
        $this->typeChecking = $typeChecking;

        return $this;
    }
}
