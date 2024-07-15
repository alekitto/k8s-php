<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Core\v1;

use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;

/**
 * Affinity is a group of affinity scheduling rules.
 */
class Affinity
{
    #[Kubernetes\Attribute('nodeAffinity', type: AttributeType::Model, model: NodeAffinity::class)]
    protected NodeAffinity|null $nodeAffinity = null;

    #[Kubernetes\Attribute('podAffinity', type: AttributeType::Model, model: PodAffinity::class)]
    protected PodAffinity|null $podAffinity = null;

    #[Kubernetes\Attribute('podAntiAffinity', type: AttributeType::Model, model: PodAntiAffinity::class)]
    protected PodAntiAffinity|null $podAntiAffinity = null;

    public function __construct(
        NodeAffinity|null $nodeAffinity = null,
        PodAffinity|null $podAffinity = null,
        PodAntiAffinity|null $podAntiAffinity = null,
    ) {
        $this->nodeAffinity = $nodeAffinity;
        $this->podAffinity = $podAffinity;
        $this->podAntiAffinity = $podAntiAffinity;
    }

    /**
     * Describes node affinity scheduling rules for the pod.
     */
    public function getNodeAffinity(): NodeAffinity|null
    {
        return $this->nodeAffinity;
    }

    /**
     * Describes node affinity scheduling rules for the pod.
     *
     * @return static
     */
    public function setNodeAffinity(NodeAffinity $nodeAffinity): static
    {
        $this->nodeAffinity = $nodeAffinity;

        return $this;
    }

    /**
     * Describes pod affinity scheduling rules (e.g. co-locate this pod in the same node, zone, etc. as
     * some other pod(s)).
     */
    public function getPodAffinity(): PodAffinity|null
    {
        return $this->podAffinity;
    }

    /**
     * Describes pod affinity scheduling rules (e.g. co-locate this pod in the same node, zone, etc. as
     * some other pod(s)).
     *
     * @return static
     */
    public function setPodAffinity(PodAffinity $podAffinity): static
    {
        $this->podAffinity = $podAffinity;

        return $this;
    }

    /**
     * Describes pod anti-affinity scheduling rules (e.g. avoid putting this pod in the same node, zone,
     * etc. as some other pod(s)).
     */
    public function getPodAntiAffinity(): PodAntiAffinity|null
    {
        return $this->podAntiAffinity;
    }

    /**
     * Describes pod anti-affinity scheduling rules (e.g. avoid putting this pod in the same node, zone,
     * etc. as some other pod(s)).
     *
     * @return static
     */
    public function setPodAntiAffinity(PodAntiAffinity $podAntiAffinity): static
    {
        $this->podAntiAffinity = $podAntiAffinity;

        return $this;
    }
}
