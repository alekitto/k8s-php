<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Core\v1;

use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;
use Kcs\K8s\Collection;

/**
 * NamespaceStatus is information about the current status of a Namespace.
 */
class NamespaceStatus
{
    /** @var iterable|NamespaceCondition[]|null */
    #[Kubernetes\Attribute('conditions', type: AttributeType::Collection, model: NamespaceCondition::class)]
    protected $conditions = null;

    #[Kubernetes\Attribute('phase')]
    protected string|null $phase = null;

    /** @param iterable|NamespaceCondition[] $conditions */
    public function __construct(iterable $conditions = [], string|null $phase = null)
    {
        $this->conditions = new Collection($conditions);
        $this->phase = $phase;
    }

    /**
     * Represents the latest available observations of a namespace's current state.
     *
     * @return iterable|NamespaceCondition[]
     */
    public function getConditions(): iterable|null
    {
        return $this->conditions;
    }

    /**
     * Represents the latest available observations of a namespace's current state.
     *
     * @return static
     */
    public function setConditions(iterable $conditions): static
    {
        $this->conditions = $conditions;

        return $this;
    }

    /** @return static */
    public function addConditions(NamespaceCondition $condition): static
    {
        if (! $this->conditions) {
            $this->conditions = new Collection();
        }

        $this->conditions[] = $condition;

        return $this;
    }

    /**
     * Phase is the current lifecycle phase of the namespace. More info:
     * https://kubernetes.io/docs/tasks/administer-cluster/namespaces/
     */
    public function getPhase(): string|null
    {
        return $this->phase;
    }

    /**
     * Phase is the current lifecycle phase of the namespace. More info:
     * https://kubernetes.io/docs/tasks/administer-cluster/namespaces/
     *
     * @return static
     */
    public function setPhase(string $phase): static
    {
        $this->phase = $phase;

        return $this;
    }
}
