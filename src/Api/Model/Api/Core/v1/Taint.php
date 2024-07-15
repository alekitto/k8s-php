<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Core\v1;

use DateTimeInterface;
use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;

/**
 * The node this Taint is attached to has the "effect" on any pod that does not tolerate the Taint.
 */
class Taint
{
    #[Kubernetes\Attribute('effect', required: true)]
    protected string $effect;

    #[Kubernetes\Attribute('key', required: true)]
    protected string $key;

    #[Kubernetes\Attribute('timeAdded', type: AttributeType::DateTime)]
    protected DateTimeInterface|null $timeAdded = null;

    #[Kubernetes\Attribute('value')]
    protected string|null $value = null;

    public function __construct(string $effect, string $key)
    {
        $this->effect = $effect;
        $this->key = $key;
    }

    /**
     * Required. The effect of the taint on pods that do not tolerate the taint. Valid effects are
     * NoSchedule, PreferNoSchedule and NoExecute.
     */
    public function getEffect(): string
    {
        return $this->effect;
    }

    /**
     * Required. The effect of the taint on pods that do not tolerate the taint. Valid effects are
     * NoSchedule, PreferNoSchedule and NoExecute.
     *
     * @return static
     */
    public function setEffect(string $effect): static
    {
        $this->effect = $effect;

        return $this;
    }

    /**
     * Required. The taint key to be applied to a node.
     */
    public function getKey(): string
    {
        return $this->key;
    }

    /**
     * Required. The taint key to be applied to a node.
     *
     * @return static
     */
    public function setKey(string $key): static
    {
        $this->key = $key;

        return $this;
    }

    /**
     * TimeAdded represents the time at which the taint was added. It is only written for NoExecute taints.
     */
    public function getTimeAdded(): DateTimeInterface|null
    {
        return $this->timeAdded;
    }

    /**
     * TimeAdded represents the time at which the taint was added. It is only written for NoExecute taints.
     *
     * @return static
     */
    public function setTimeAdded(DateTimeInterface $timeAdded): static
    {
        $this->timeAdded = $timeAdded;

        return $this;
    }

    /**
     * The taint value corresponding to the taint key.
     */
    public function getValue(): string|null
    {
        return $this->value;
    }

    /**
     * The taint value corresponding to the taint key.
     *
     * @return static
     */
    public function setValue(string $value): static
    {
        $this->value = $value;

        return $this;
    }
}
