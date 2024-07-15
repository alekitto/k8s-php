<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Core\v1;

use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;
use Kcs\K8s\Collection;

/**
 * NodeSpec describes the attributes that a node is created with.
 */
class NodeSpec
{
    #[Kubernetes\Attribute('configSource', type: AttributeType::Model, model: NodeConfigSource::class)]
    protected NodeConfigSource|null $configSource = null;

    #[Kubernetes\Attribute('externalID')]
    protected string|null $externalID = null;

    #[Kubernetes\Attribute('podCIDR')]
    protected string|null $podCIDR = null;

    /** @var string[]|null */
    #[Kubernetes\Attribute('podCIDRs')]
    protected array|null $podCIDRs = null;

    #[Kubernetes\Attribute('providerID')]
    protected string|null $providerID = null;

    /** @var iterable|Taint[]|null */
    #[Kubernetes\Attribute('taints', type: AttributeType::Collection, model: Taint::class)]
    protected $taints = null;

    #[Kubernetes\Attribute('unschedulable')]
    protected bool|null $unschedulable = null;

    /**
     * Deprecated: Previously used to specify the source of the node's configuration for the
     * DynamicKubeletConfig feature. This feature is removed.
     */
    public function getConfigSource(): NodeConfigSource|null
    {
        return $this->configSource;
    }

    /**
     * Deprecated: Previously used to specify the source of the node's configuration for the
     * DynamicKubeletConfig feature. This feature is removed.
     *
     * @return static
     */
    public function setConfigSource(NodeConfigSource $configSource): static
    {
        $this->configSource = $configSource;

        return $this;
    }

    /**
     * Deprecated. Not all kubelets will set this field. Remove field after 1.13. see:
     * https://issues.k8s.io/61966
     */
    public function getExternalID(): string|null
    {
        return $this->externalID;
    }

    /**
     * Deprecated. Not all kubelets will set this field. Remove field after 1.13. see:
     * https://issues.k8s.io/61966
     *
     * @return static
     */
    public function setExternalID(string $externalID): static
    {
        $this->externalID = $externalID;

        return $this;
    }

    /**
     * PodCIDR represents the pod IP range assigned to the node.
     */
    public function getPodCIDR(): string|null
    {
        return $this->podCIDR;
    }

    /**
     * PodCIDR represents the pod IP range assigned to the node.
     *
     * @return static
     */
    public function setPodCIDR(string $podCIDR): static
    {
        $this->podCIDR = $podCIDR;

        return $this;
    }

    /**
     * podCIDRs represents the IP ranges assigned to the node for usage by Pods on that node. If this field
     * is specified, the 0th entry must match the podCIDR field. It may contain at most 1 value for each of
     * IPv4 and IPv6.
     */
    public function getPodCIDRs(): array|null
    {
        return $this->podCIDRs;
    }

    /**
     * podCIDRs represents the IP ranges assigned to the node for usage by Pods on that node. If this field
     * is specified, the 0th entry must match the podCIDR field. It may contain at most 1 value for each of
     * IPv4 and IPv6.
     *
     * @return static
     */
    public function setPodCIDRs(array $podCIDRs): static
    {
        $this->podCIDRs = $podCIDRs;

        return $this;
    }

    /**
     * ID of the node assigned by the cloud provider in the format:
     * <ProviderName>://<ProviderSpecificNodeID>
     */
    public function getProviderID(): string|null
    {
        return $this->providerID;
    }

    /**
     * ID of the node assigned by the cloud provider in the format:
     * <ProviderName>://<ProviderSpecificNodeID>
     *
     * @return static
     */
    public function setProviderID(string $providerID): static
    {
        $this->providerID = $providerID;

        return $this;
    }

    /**
     * If specified, the node's taints.
     *
     * @return iterable|Taint[]
     */
    public function getTaints(): iterable|null
    {
        return $this->taints;
    }

    /**
     * If specified, the node's taints.
     *
     * @return static
     */
    public function setTaints(iterable $taints): static
    {
        $this->taints = $taints;

        return $this;
    }

    /** @return static */
    public function addTaints(Taint $taint): static
    {
        if (! $this->taints) {
            $this->taints = new Collection();
        }

        $this->taints[] = $taint;

        return $this;
    }

    /**
     * Unschedulable controls node schedulability of new pods. By default, node is schedulable. More info:
     * https://kubernetes.io/docs/concepts/nodes/node/#manual-node-administration
     */
    public function isUnschedulable(): bool|null
    {
        return $this->unschedulable;
    }

    /**
     * Unschedulable controls node schedulability of new pods. By default, node is schedulable. More info:
     * https://kubernetes.io/docs/concepts/nodes/node/#manual-node-administration
     *
     * @return static
     */
    public function setIsUnschedulable(bool $unschedulable): static
    {
        $this->unschedulable = $unschedulable;

        return $this;
    }
}
