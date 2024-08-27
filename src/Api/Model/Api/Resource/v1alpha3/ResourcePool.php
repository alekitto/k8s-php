<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Resource\v1alpha3;

use Kcs\K8s\Attribute as Kubernetes;

/**
 * ResourcePool describes the pool that ResourceSlices belong to.
 */
class ResourcePool
{
    #[Kubernetes\Attribute('generation', required: true)]
    protected int $generation;

    #[Kubernetes\Attribute('name', required: true)]
    protected string $name;

    #[Kubernetes\Attribute('resourceSliceCount', required: true)]
    protected int $resourceSliceCount;

    public function __construct(int $generation, string $name, int $resourceSliceCount)
    {
        $this->generation = $generation;
        $this->name = $name;
        $this->resourceSliceCount = $resourceSliceCount;
    }

    /**
     * Generation tracks the change in a pool over time. Whenever a driver changes something about one or
     * more of the resources in a pool, it must change the generation in all ResourceSlices which are part
     * of that pool. Consumers of ResourceSlices should only consider resources from the pool with the
     * highest generation number. The generation may be reset by drivers, which should be fine for
     * consumers, assuming that all ResourceSlices in a pool are updated to match or deleted.
     *
     * Combined with ResourceSliceCount, this mechanism enables consumers to detect pools which are
     * comprised of multiple ResourceSlices and are in an incomplete state.
     */
    public function getGeneration(): int
    {
        return $this->generation;
    }

    /**
     * Generation tracks the change in a pool over time. Whenever a driver changes something about one or
     * more of the resources in a pool, it must change the generation in all ResourceSlices which are part
     * of that pool. Consumers of ResourceSlices should only consider resources from the pool with the
     * highest generation number. The generation may be reset by drivers, which should be fine for
     * consumers, assuming that all ResourceSlices in a pool are updated to match or deleted.
     *
     * Combined with ResourceSliceCount, this mechanism enables consumers to detect pools which are
     * comprised of multiple ResourceSlices and are in an incomplete state.
     *
     * @return static
     */
    public function setGeneration(int $generation): static
    {
        $this->generation = $generation;

        return $this;
    }

    /**
     * Name is used to identify the pool. For node-local devices, this is often the node name, but this is
     * not required.
     *
     * It must not be longer than 253 characters and must consist of one or more DNS sub-domains separated
     * by slashes. This field is immutable.
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Name is used to identify the pool. For node-local devices, this is often the node name, but this is
     * not required.
     *
     * It must not be longer than 253 characters and must consist of one or more DNS sub-domains separated
     * by slashes. This field is immutable.
     *
     * @return static
     */
    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    /**
     * ResourceSliceCount is the total number of ResourceSlices in the pool at this generation number. Must
     * be greater than zero.
     *
     * Consumers can use this to check whether they have seen all ResourceSlices belonging to the same
     * pool.
     */
    public function getResourceSliceCount(): int
    {
        return $this->resourceSliceCount;
    }

    /**
     * ResourceSliceCount is the total number of ResourceSlices in the pool at this generation number. Must
     * be greater than zero.
     *
     * Consumers can use this to check whether they have seen all ResourceSlices belonging to the same
     * pool.
     *
     * @return static
     */
    public function setResourceSliceCount(int $resourceSliceCount): static
    {
        $this->resourceSliceCount = $resourceSliceCount;

        return $this;
    }
}
