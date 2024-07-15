<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Core\v1;

use Kcs\K8s\Attribute as Kubernetes;

/**
 * A topology selector requirement is a selector that matches given label. This is an alpha feature and
 * may change in the future.
 */
class TopologySelectorLabelRequirement
{
    #[Kubernetes\Attribute('key', required: true)]
    protected string $key;

    /** @var string[] */
    #[Kubernetes\Attribute('values', required: true)]
    protected array $values;

    /** @param string[] $values */
    public function __construct(string $key, array $values)
    {
        $this->key = $key;
        $this->values = $values;
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
     * An array of string values. One value must match the label to be selected. Each entry in Values is
     * ORed.
     */
    public function getValues(): array
    {
        return $this->values;
    }

    /**
     * An array of string values. One value must match the label to be selected. Each entry in Values is
     * ORed.
     *
     * @return static
     */
    public function setValues(array $values): static
    {
        $this->values = $values;

        return $this;
    }
}
