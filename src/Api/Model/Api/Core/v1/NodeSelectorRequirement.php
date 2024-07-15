<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Core\v1;

use Kcs\K8s\Attribute as Kubernetes;

/**
 * A node selector requirement is a selector that contains values, a key, and an operator that relates
 * the key and values.
 */
class NodeSelectorRequirement
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
     * The label key that the selector applies to.
     */
    public function getKey(): string
    {
        return $this->key;
    }

    /**
     * The label key that the selector applies to.
     *
     * @return static
     */
    public function setKey(string $key): static
    {
        $this->key = $key;

        return $this;
    }

    /**
     * Represents a key's relationship to a set of values. Valid operators are In, NotIn, Exists,
     * DoesNotExist. Gt, and Lt.
     */
    public function getOperator(): string
    {
        return $this->operator;
    }

    /**
     * Represents a key's relationship to a set of values. Valid operators are In, NotIn, Exists,
     * DoesNotExist. Gt, and Lt.
     *
     * @return static
     */
    public function setOperator(string $operator): static
    {
        $this->operator = $operator;

        return $this;
    }

    /**
     * An array of string values. If the operator is In or NotIn, the values array must be non-empty. If
     * the operator is Exists or DoesNotExist, the values array must be empty. If the operator is Gt or Lt,
     * the values array must have a single element, which will be interpreted as an integer. This array is
     * replaced during a strategic merge patch.
     */
    public function getValues(): array|null
    {
        return $this->values;
    }

    /**
     * An array of string values. If the operator is In or NotIn, the values array must be non-empty. If
     * the operator is Exists or DoesNotExist, the values array must be empty. If the operator is Gt or Lt,
     * the values array must have a single element, which will be interpreted as an integer. This array is
     * replaced during a strategic merge patch.
     *
     * @return static
     */
    public function setValues(array $values): static
    {
        $this->values = $values;

        return $this;
    }
}
