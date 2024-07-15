<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Resource\v1alpha2;

use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;
use Kcs\K8s\Collection;

/**
 * NamedResourcesResources is used in ResourceModel.
 */
class NamedResourcesResources
{
    /** @var iterable|NamedResourcesInstance[] */
    #[Kubernetes\Attribute('instances', type: AttributeType::Collection, model: NamedResourcesInstance::class, required: true)]
    protected iterable $instances;

    /** @param iterable|NamedResourcesInstance[] $instances */
    public function __construct(iterable $instances)
    {
        $this->instances = new Collection($instances);
    }

    /**
     * The list of all individual resources instances currently available.
     *
     * @return iterable|NamedResourcesInstance[]
     */
    public function getInstances(): iterable
    {
        return $this->instances;
    }

    /**
     * The list of all individual resources instances currently available.
     *
     * @return static
     */
    public function setInstances(iterable $instances): static
    {
        $this->instances = $instances;

        return $this;
    }

    /** @return static */
    public function addInstances(NamedResourcesInstance $instance): static
    {
        if (! $this->instances) {
            $this->instances = new Collection();
        }

        $this->instances[] = $instance;

        return $this;
    }
}
