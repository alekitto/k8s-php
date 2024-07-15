<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Core\v1;

use Kcs\K8s\Attribute as Kubernetes;

/**
 * The pod this Toleration is attached to tolerates any taint that matches the triple
 * <key,value,effect> using the matching operator <operator>.
 */
class Toleration
{
    #[Kubernetes\Attribute('effect')]
    protected string|null $effect = null;

    #[Kubernetes\Attribute('key')]
    protected string|null $key = null;

    #[Kubernetes\Attribute('operator')]
    protected string|null $operator = null;

    #[Kubernetes\Attribute('tolerationSeconds')]
    protected int|null $tolerationSeconds = null;

    #[Kubernetes\Attribute('value')]
    protected string|null $value = null;

    public function __construct(
        string|null $effect = null,
        string|null $key = null,
        string|null $operator = null,
        int|null $tolerationSeconds = null,
        string|null $value = null,
    ) {
        $this->effect = $effect;
        $this->key = $key;
        $this->operator = $operator;
        $this->tolerationSeconds = $tolerationSeconds;
        $this->value = $value;
    }

    /**
     * Effect indicates the taint effect to match. Empty means match all taint effects. When specified,
     * allowed values are NoSchedule, PreferNoSchedule and NoExecute.
     */
    public function getEffect(): string|null
    {
        return $this->effect;
    }

    /**
     * Effect indicates the taint effect to match. Empty means match all taint effects. When specified,
     * allowed values are NoSchedule, PreferNoSchedule and NoExecute.
     *
     * @return static
     */
    public function setEffect(string $effect): static
    {
        $this->effect = $effect;

        return $this;
    }

    /**
     * Key is the taint key that the toleration applies to. Empty means match all taint keys. If the key is
     * empty, operator must be Exists; this combination means to match all values and all keys.
     */
    public function getKey(): string|null
    {
        return $this->key;
    }

    /**
     * Key is the taint key that the toleration applies to. Empty means match all taint keys. If the key is
     * empty, operator must be Exists; this combination means to match all values and all keys.
     *
     * @return static
     */
    public function setKey(string $key): static
    {
        $this->key = $key;

        return $this;
    }

    /**
     * Operator represents a key's relationship to the value. Valid operators are Exists and Equal.
     * Defaults to Equal. Exists is equivalent to wildcard for value, so that a pod can tolerate all taints
     * of a particular category.
     */
    public function getOperator(): string|null
    {
        return $this->operator;
    }

    /**
     * Operator represents a key's relationship to the value. Valid operators are Exists and Equal.
     * Defaults to Equal. Exists is equivalent to wildcard for value, so that a pod can tolerate all taints
     * of a particular category.
     *
     * @return static
     */
    public function setOperator(string $operator): static
    {
        $this->operator = $operator;

        return $this;
    }

    /**
     * TolerationSeconds represents the period of time the toleration (which must be of effect NoExecute,
     * otherwise this field is ignored) tolerates the taint. By default, it is not set, which means
     * tolerate the taint forever (do not evict). Zero and negative values will be treated as 0 (evict
     * immediately) by the system.
     */
    public function getTolerationSeconds(): int|null
    {
        return $this->tolerationSeconds;
    }

    /**
     * TolerationSeconds represents the period of time the toleration (which must be of effect NoExecute,
     * otherwise this field is ignored) tolerates the taint. By default, it is not set, which means
     * tolerate the taint forever (do not evict). Zero and negative values will be treated as 0 (evict
     * immediately) by the system.
     *
     * @return static
     */
    public function setTolerationSeconds(int $tolerationSeconds): static
    {
        $this->tolerationSeconds = $tolerationSeconds;

        return $this;
    }

    /**
     * Value is the taint value the toleration matches to. If the operator is Exists, the value should be
     * empty, otherwise just a regular string.
     */
    public function getValue(): string|null
    {
        return $this->value;
    }

    /**
     * Value is the taint value the toleration matches to. If the operator is Exists, the value should be
     * empty, otherwise just a regular string.
     *
     * @return static
     */
    public function setValue(string $value): static
    {
        $this->value = $value;

        return $this;
    }
}
