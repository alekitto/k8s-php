<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Resource\v1alpha3;

use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;
use Kcs\K8s\Collection;

/**
 * DeviceAllocationResult is the result of allocating devices.
 */
class DeviceAllocationResult
{
    /** @var iterable|DeviceAllocationConfiguration[]|null */
    #[Kubernetes\Attribute('config', type: AttributeType::Collection, model: DeviceAllocationConfiguration::class)]
    protected $config = null;

    /** @var iterable|DeviceRequestAllocationResult[]|null */
    #[Kubernetes\Attribute('results', type: AttributeType::Collection, model: DeviceRequestAllocationResult::class)]
    protected $results = null;

    /**
     * @param iterable|DeviceAllocationConfiguration[] $config
     * @param iterable|DeviceRequestAllocationResult[] $results
     */
    public function __construct(iterable $config = [], iterable $results = [])
    {
        $this->config = new Collection($config);
        $this->results = new Collection($results);
    }

    /**
     * This field is a combination of all the claim and class configuration parameters. Drivers can
     * distinguish between those based on a flag.
     *
     * This includes configuration parameters for drivers which have no allocated devices in the result
     * because it is up to the drivers which configuration parameters they support. They can silently
     * ignore unknown configuration parameters.
     *
     * @return iterable|DeviceAllocationConfiguration[]
     */
    public function getConfig(): iterable|null
    {
        return $this->config;
    }

    /**
     * This field is a combination of all the claim and class configuration parameters. Drivers can
     * distinguish between those based on a flag.
     *
     * This includes configuration parameters for drivers which have no allocated devices in the result
     * because it is up to the drivers which configuration parameters they support. They can silently
     * ignore unknown configuration parameters.
     *
     * @return static
     */
    public function setConfig(iterable $config): static
    {
        $this->config = $config;

        return $this;
    }

    /** @return static */
    public function addConfig(DeviceAllocationConfiguration $config): static
    {
        if (! $this->config) {
            $this->config = new Collection();
        }

        $this->config[] = $config;

        return $this;
    }

    /**
     * Results lists all allocated devices.
     *
     * @return iterable|DeviceRequestAllocationResult[]
     */
    public function getResults(): iterable|null
    {
        return $this->results;
    }

    /**
     * Results lists all allocated devices.
     *
     * @return static
     */
    public function setResults(iterable $results): static
    {
        $this->results = $results;

        return $this;
    }

    /** @return static */
    public function addResults(DeviceRequestAllocationResult $result): static
    {
        if (! $this->results) {
            $this->results = new Collection();
        }

        $this->results[] = $result;

        return $this;
    }
}
