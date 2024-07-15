<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Discovery\v1;

use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;
use Kcs\K8s\Collection;

/**
 * EndpointHints provides hints describing how an endpoint should be consumed.
 */
class EndpointHints
{
    /** @var iterable|ForZone[]|null */
    #[Kubernetes\Attribute('forZones', type: AttributeType::Collection, model: ForZone::class)]
    protected $forZones = null;

    /** @param iterable|ForZone[] $forZones */
    public function __construct(iterable $forZones = [])
    {
        $this->forZones = new Collection($forZones);
    }

    /**
     * forZones indicates the zone(s) this endpoint should be consumed by to enable topology aware routing.
     *
     * @return iterable|ForZone[]
     */
    public function getForZones(): iterable|null
    {
        return $this->forZones;
    }

    /**
     * forZones indicates the zone(s) this endpoint should be consumed by to enable topology aware routing.
     *
     * @return static
     */
    public function setForZones(iterable $forZones): static
    {
        $this->forZones = $forZones;

        return $this;
    }

    /** @return static */
    public function addForZones(ForZone $forZone): static
    {
        if (! $this->forZones) {
            $this->forZones = new Collection();
        }

        $this->forZones[] = $forZone;

        return $this;
    }
}
