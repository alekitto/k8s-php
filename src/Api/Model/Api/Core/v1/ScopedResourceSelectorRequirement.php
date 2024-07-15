<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Core\v1;

use Kcs\K8s\Attribute as Kubernetes;

/**
 * A scoped-resource selector requirement is a selector that contains values, a scope name, and an
 * operator that relates the scope name and values.
 */
class ScopedResourceSelectorRequirement
{
    #[Kubernetes\Attribute('operator', required: true)]
    protected string $operator;

    #[Kubernetes\Attribute('scopeName', required: true)]
    protected string $scopeName;

    /** @var string[]|null */
    #[Kubernetes\Attribute('values')]
    protected array|null $values = null;

    public function __construct(string $operator, string $scopeName)
    {
        $this->operator = $operator;
        $this->scopeName = $scopeName;
    }

    /**
     * Represents a scope's relationship to a set of values. Valid operators are In, NotIn, Exists,
     * DoesNotExist.
     */
    public function getOperator(): string
    {
        return $this->operator;
    }

    /**
     * Represents a scope's relationship to a set of values. Valid operators are In, NotIn, Exists,
     * DoesNotExist.
     *
     * @return static
     */
    public function setOperator(string $operator): static
    {
        $this->operator = $operator;

        return $this;
    }

    /**
     * The name of the scope that the selector applies to.
     */
    public function getScopeName(): string
    {
        return $this->scopeName;
    }

    /**
     * The name of the scope that the selector applies to.
     *
     * @return static
     */
    public function setScopeName(string $scopeName): static
    {
        $this->scopeName = $scopeName;

        return $this;
    }

    /**
     * An array of string values. If the operator is In or NotIn, the values array must be non-empty. If
     * the operator is Exists or DoesNotExist, the values array must be empty. This array is replaced
     * during a strategic merge patch.
     */
    public function getValues(): array|null
    {
        return $this->values;
    }

    /**
     * An array of string values. If the operator is In or NotIn, the values array must be non-empty. If
     * the operator is Exists or DoesNotExist, the values array must be empty. This array is replaced
     * during a strategic merge patch.
     *
     * @return static
     */
    public function setValues(array $values): static
    {
        $this->values = $values;

        return $this;
    }
}
