<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Core\v1;

use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;

/**
 * VolumeNodeAffinity defines constraints that limit what nodes this volume can be accessed from.
 */
class VolumeNodeAffinity
{
    #[Kubernetes\Attribute('required', type: AttributeType::Model, model: NodeSelector::class)]
    protected NodeSelector|null $required = null;

    public function __construct(NodeSelector|null $required = null)
    {
        $this->required = $required;
    }

    /**
     * required specifies hard node constraints that must be met.
     */
    public function getRequired(): NodeSelector|null
    {
        return $this->required;
    }

    /**
     * required specifies hard node constraints that must be met.
     *
     * @return static
     */
    public function setRequired(NodeSelector $required): static
    {
        $this->required = $required;

        return $this;
    }
}
