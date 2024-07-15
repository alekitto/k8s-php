<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Core\v1;

use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;

/**
 * NodeRuntimeHandler is a set of runtime handler information.
 */
class NodeRuntimeHandler
{
    #[Kubernetes\Attribute('features', type: AttributeType::Model, model: NodeRuntimeHandlerFeatures::class)]
    protected NodeRuntimeHandlerFeatures|null $features = null;

    #[Kubernetes\Attribute('name')]
    protected string|null $name = null;

    public function __construct(NodeRuntimeHandlerFeatures|null $features = null, string|null $name = null)
    {
        $this->features = $features;
        $this->name = $name;
    }

    /**
     * Supported features.
     */
    public function getFeatures(): NodeRuntimeHandlerFeatures|null
    {
        return $this->features;
    }

    /**
     * Supported features.
     *
     * @return static
     */
    public function setFeatures(NodeRuntimeHandlerFeatures $features): static
    {
        $this->features = $features;

        return $this;
    }

    /**
     * Runtime handler name. Empty for the default runtime handler.
     */
    public function getName(): string|null
    {
        return $this->name;
    }

    /**
     * Runtime handler name. Empty for the default runtime handler.
     *
     * @return static
     */
    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }
}
