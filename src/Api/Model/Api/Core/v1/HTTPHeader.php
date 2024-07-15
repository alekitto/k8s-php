<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Core\v1;

use Kcs\K8s\Attribute as Kubernetes;

/**
 * HTTPHeader describes a custom header to be used in HTTP probes
 */
class HTTPHeader
{
    #[Kubernetes\Attribute('name', required: true)]
    protected string $name;

    #[Kubernetes\Attribute('value', required: true)]
    protected string $value;

    public function __construct(string $name, string $value)
    {
        $this->name = $name;
        $this->value = $value;
    }

    /**
     * The header field name. This will be canonicalized upon output, so case-variant names will be
     * understood as the same header.
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * The header field name. This will be canonicalized upon output, so case-variant names will be
     * understood as the same header.
     *
     * @return static
     */
    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    /**
     * The header field value
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * The header field value
     *
     * @return static
     */
    public function setValue(string $value): static
    {
        $this->value = $value;

        return $this;
    }
}
