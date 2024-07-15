<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Discovery\v1;

use Kcs\K8s\Attribute as Kubernetes;

/**
 * ForZone provides information about which zones should consume this endpoint.
 */
class ForZone
{
    #[Kubernetes\Attribute('name', required: true)]
    protected string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * name represents the name of the zone.
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * name represents the name of the zone.
     *
     * @return static
     */
    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }
}
