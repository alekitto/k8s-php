<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Core\v1;

use Kcs\K8s\Attribute as Kubernetes;

/**
 * LimitRangeItem defines a min/max usage limit for any resource that matches on kind.
 */
class LimitRangeItem
{
    /** @var object[]|null */
    #[Kubernetes\Attribute('default')]
    protected array|null $default = null;

    /** @var object[]|null */
    #[Kubernetes\Attribute('defaultRequest')]
    protected array|null $defaultRequest = null;

    /** @var object[]|null */
    #[Kubernetes\Attribute('max')]
    protected array|null $max = null;

    /** @var object[]|null */
    #[Kubernetes\Attribute('maxLimitRequestRatio')]
    protected array|null $maxLimitRequestRatio = null;

    /** @var object[]|null */
    #[Kubernetes\Attribute('min')]
    protected array|null $min = null;

    #[Kubernetes\Attribute('type', required: true)]
    protected string $type;

    public function __construct(string $type)
    {
        $this->type = $type;
    }

    /**
     * Default resource requirement limit value by resource name if resource limit is omitted.
     */
    public function getDefault(): array|null
    {
        return $this->default;
    }

    /**
     * Default resource requirement limit value by resource name if resource limit is omitted.
     *
     * @return static
     */
    public function setDefault(array $default): static
    {
        $this->default = $default;

        return $this;
    }

    /**
     * DefaultRequest is the default resource requirement request value by resource name if resource
     * request is omitted.
     */
    public function getDefaultRequest(): array|null
    {
        return $this->defaultRequest;
    }

    /**
     * DefaultRequest is the default resource requirement request value by resource name if resource
     * request is omitted.
     *
     * @return static
     */
    public function setDefaultRequest(array $defaultRequest): static
    {
        $this->defaultRequest = $defaultRequest;

        return $this;
    }

    /**
     * Max usage constraints on this kind by resource name.
     */
    public function getMax(): array|null
    {
        return $this->max;
    }

    /**
     * Max usage constraints on this kind by resource name.
     *
     * @return static
     */
    public function setMax(array $max): static
    {
        $this->max = $max;

        return $this;
    }

    /**
     * MaxLimitRequestRatio if specified, the named resource must have a request and limit that are both
     * non-zero where limit divided by request is less than or equal to the enumerated value; this
     * represents the max burst for the named resource.
     */
    public function getMaxLimitRequestRatio(): array|null
    {
        return $this->maxLimitRequestRatio;
    }

    /**
     * MaxLimitRequestRatio if specified, the named resource must have a request and limit that are both
     * non-zero where limit divided by request is less than or equal to the enumerated value; this
     * represents the max burst for the named resource.
     *
     * @return static
     */
    public function setMaxLimitRequestRatio(array $maxLimitRequestRatio): static
    {
        $this->maxLimitRequestRatio = $maxLimitRequestRatio;

        return $this;
    }

    /**
     * Min usage constraints on this kind by resource name.
     */
    public function getMin(): array|null
    {
        return $this->min;
    }

    /**
     * Min usage constraints on this kind by resource name.
     *
     * @return static
     */
    public function setMin(array $min): static
    {
        $this->min = $min;

        return $this;
    }

    /**
     * Type of resource that this limit applies to.
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * Type of resource that this limit applies to.
     *
     * @return static
     */
    public function setType(string $type): static
    {
        $this->type = $type;

        return $this;
    }
}
