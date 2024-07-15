<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Storage\v1;

use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;
use Kcs\K8s\Collection;

/**
 * CSINodeSpec holds information about the specification of all CSI drivers installed on a node
 */
class CSINodeSpec
{
    /** @var iterable|CSINodeDriver[] */
    #[Kubernetes\Attribute('drivers', type: AttributeType::Collection, model: CSINodeDriver::class, required: true)]
    protected iterable $drivers;

    /** @param iterable|CSINodeDriver[] $drivers */
    public function __construct(iterable $drivers)
    {
        $this->drivers = new Collection($drivers);
    }

    /**
     * drivers is a list of information of all CSI Drivers existing on a node. If all drivers in the list
     * are uninstalled, this can become empty.
     *
     * @return iterable|CSINodeDriver[]
     */
    public function getDrivers(): iterable
    {
        return $this->drivers;
    }

    /**
     * drivers is a list of information of all CSI Drivers existing on a node. If all drivers in the list
     * are uninstalled, this can become empty.
     *
     * @return static
     */
    public function setDrivers(iterable $drivers): static
    {
        $this->drivers = $drivers;

        return $this;
    }

    /** @return static */
    public function addDrivers(CSINodeDriver $driver): static
    {
        if (! $this->drivers) {
            $this->drivers = new Collection();
        }

        $this->drivers[] = $driver;

        return $this;
    }
}
