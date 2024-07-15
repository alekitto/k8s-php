<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Resource\v1alpha2;

use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;

/**
 * ResourceFilter is a filter for resources from one particular driver.
 */
class ResourceFilter
{
    #[Kubernetes\Attribute('driverName')]
    protected string|null $driverName = null;

    #[Kubernetes\Attribute('namedResources', type: AttributeType::Model, model: NamedResourcesFilter::class)]
    protected NamedResourcesFilter|null $namedResources = null;

    public function __construct(string|null $driverName = null, NamedResourcesFilter|null $namedResources = null)
    {
        $this->driverName = $driverName;
        $this->namedResources = $namedResources;
    }

    /**
     * DriverName is the name used by the DRA driver kubelet plugin.
     */
    public function getDriverName(): string|null
    {
        return $this->driverName;
    }

    /**
     * DriverName is the name used by the DRA driver kubelet plugin.
     *
     * @return static
     */
    public function setDriverName(string $driverName): static
    {
        $this->driverName = $driverName;

        return $this;
    }

    /**
     * NamedResources describes a resource filter using the named resources model.
     */
    public function getNamedResources(): NamedResourcesFilter|null
    {
        return $this->namedResources;
    }

    /**
     * NamedResources describes a resource filter using the named resources model.
     *
     * @return static
     */
    public function setNamedResources(NamedResourcesFilter $namedResources): static
    {
        $this->namedResources = $namedResources;

        return $this;
    }
}
