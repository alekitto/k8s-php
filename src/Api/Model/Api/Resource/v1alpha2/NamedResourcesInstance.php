<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Resource\v1alpha2;

use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;
use Kcs\K8s\Collection;

/**
 * NamedResourcesInstance represents one individual hardware instance that can be selected based on its
 * attributes.
 */
class NamedResourcesInstance
{
    /** @var iterable|NamedResourcesAttribute[]|null */
    #[Kubernetes\Attribute('attributes', type: AttributeType::Collection, model: NamedResourcesAttribute::class)]
    protected $attributes = null;

    #[Kubernetes\Attribute('name', required: true)]
    protected string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * Attributes defines the attributes of this resource instance. The name of each attribute must be
     * unique.
     *
     * @return iterable|NamedResourcesAttribute[]
     */
    public function getAttributes(): iterable|null
    {
        return $this->attributes;
    }

    /**
     * Attributes defines the attributes of this resource instance. The name of each attribute must be
     * unique.
     *
     * @return static
     */
    public function setAttributes(iterable $attributes): static
    {
        $this->attributes = $attributes;

        return $this;
    }

    /** @return static */
    public function addAttributes(NamedResourcesAttribute $attribute): static
    {
        if (! $this->attributes) {
            $this->attributes = new Collection();
        }

        $this->attributes[] = $attribute;

        return $this;
    }

    /**
     * Name is unique identifier among all resource instances managed by the driver on the node. It must be
     * a DNS subdomain.
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Name is unique identifier among all resource instances managed by the driver on the node. It must be
     * a DNS subdomain.
     *
     * @return static
     */
    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }
}
