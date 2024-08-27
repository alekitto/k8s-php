<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Resource\v1alpha3;

use Kcs\K8s\Api\Model\Api\Core\v1\NodeSelector;
use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;
use Kcs\K8s\Collection;

/**
 * DeviceClassSpec is used in a [DeviceClass] to define what can be allocated and how to configure it.
 */
class DeviceClassSpec
{
    /** @var iterable|DeviceClassConfiguration[]|null */
    #[Kubernetes\Attribute('config', type: AttributeType::Collection, model: DeviceClassConfiguration::class)]
    protected $config = null;

    /** @var iterable|DeviceSelector[]|null */
    #[Kubernetes\Attribute('selectors', type: AttributeType::Collection, model: DeviceSelector::class)]
    protected $selectors = null;

    #[Kubernetes\Attribute('suitableNodes', type: AttributeType::Model, model: NodeSelector::class)]
    protected NodeSelector|null $suitableNodes = null;

    /**
     * @param iterable|DeviceClassConfiguration[] $config
     * @param iterable|DeviceSelector[] $selectors
     */
    public function __construct(iterable $config = [], iterable $selectors = [], NodeSelector|null $suitableNodes = null)
    {
        $this->config = new Collection($config);
        $this->selectors = new Collection($selectors);
        $this->suitableNodes = $suitableNodes;
    }

    /**
     * Config defines configuration parameters that apply to each device that is claimed via this class.
     * Some classses may potentially be satisfied by multiple drivers, so each instance of a vendor
     * configuration applies to exactly one driver.
     *
     * They are passed to the driver, but are not considered while allocating the claim.
     *
     * @return iterable|DeviceClassConfiguration[]
     */
    public function getConfig(): iterable|null
    {
        return $this->config;
    }

    /**
     * Config defines configuration parameters that apply to each device that is claimed via this class.
     * Some classses may potentially be satisfied by multiple drivers, so each instance of a vendor
     * configuration applies to exactly one driver.
     *
     * They are passed to the driver, but are not considered while allocating the claim.
     *
     * @return static
     */
    public function setConfig(iterable $config): static
    {
        $this->config = $config;

        return $this;
    }

    /** @return static */
    public function addConfig(DeviceClassConfiguration $config): static
    {
        if (! $this->config) {
            $this->config = new Collection();
        }

        $this->config[] = $config;

        return $this;
    }

    /**
     * Each selector must be satisfied by a device which is claimed via this class.
     *
     * @return iterable|DeviceSelector[]
     */
    public function getSelectors(): iterable|null
    {
        return $this->selectors;
    }

    /**
     * Each selector must be satisfied by a device which is claimed via this class.
     *
     * @return static
     */
    public function setSelectors(iterable $selectors): static
    {
        $this->selectors = $selectors;

        return $this;
    }

    /** @return static */
    public function addSelectors(DeviceSelector $selector): static
    {
        if (! $this->selectors) {
            $this->selectors = new Collection();
        }

        $this->selectors[] = $selector;

        return $this;
    }

    /**
     * Only nodes matching the selector will be considered by the scheduler when trying to find a Node that
     * fits a Pod when that Pod uses a claim that has not been allocated yet *and* that claim gets
     * allocated through a control plane controller. It is ignored when the claim does not use a control
     * plane controller for allocation.
     *
     * Setting this field is optional. If unset, all Nodes are candidates.
     *
     * This is an alpha field and requires enabling the DRAControlPlaneController feature gate.
     */
    public function getSuitableNodes(): NodeSelector|null
    {
        return $this->suitableNodes;
    }

    /**
     * Only nodes matching the selector will be considered by the scheduler when trying to find a Node that
     * fits a Pod when that Pod uses a claim that has not been allocated yet *and* that claim gets
     * allocated through a control plane controller. It is ignored when the claim does not use a control
     * plane controller for allocation.
     *
     * Setting this field is optional. If unset, all Nodes are candidates.
     *
     * This is an alpha field and requires enabling the DRAControlPlaneController feature gate.
     *
     * @return static
     */
    public function setSuitableNodes(NodeSelector $suitableNodes): static
    {
        $this->suitableNodes = $suitableNodes;

        return $this;
    }
}
