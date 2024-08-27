<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\ApiMachinery\Apis\Meta\v1;

use Kcs\K8s\Attribute as Kubernetes;

/**
 * FieldSelectorRequirement is a selector that contains values, a key, and an operator that relates the
 * key and values.
 */
class FieldSelectorRequirement
{
    #[Kubernetes\Attribute('key', required: true)]
    protected string $key;

    #[Kubernetes\Attribute('operator', required: true)]
    protected string $operator;

    /** @var string[]|null */
    #[Kubernetes\Attribute('values')]
    protected array|null $values = null;

    public function __construct(string $key, string $operator)
    {
        $this->key = $key;
        $this->operator = $operator;
    }

    /**
     * key is the field selector key that the requirement applies to.
     */
    public function getKey(): string
    {
        return $this->key;
    }

    /**
     * key is the field selector key that the requirement applies to.
     *
     * @return static
     */
    public function setKey(string $key): static
    {
        $this->key = $key;

        return $this;
    }

    /**
     * operator represents a key's relationship to a set of values. Valid operators are In, NotIn, Exists,
     * DoesNotExist. The list of operators may grow in the future.
     */
    public function getOperator(): string
    {
        return $this->operator;
    }

    /**
     * operator represents a key's relationship to a set of values. Valid operators are In, NotIn, Exists,
     * DoesNotExist. The list of operators may grow in the future.
     *
     * @return static
     */
    public function setOperator(string $operator): static
    {
        $this->operator = $operator;

        return $this;
    }

    /**
     * values is an array of string values. If the operator is In or NotIn, the values array must be
     * non-empty. If the operator is Exists or DoesNotExist, the values array must be empty.
     */
    public function getValues(): array|null
    {
        return $this->values;
    }

    /**
     * values is an array of string values. If the operator is In or NotIn, the values array must be
     * non-empty. If the operator is Exists or DoesNotExist, the values array must be empty.
     *
     * @return static
     */
    public function setValues(array $values): static
    {
        $this->values = $values;

        return $this;
    }
}
