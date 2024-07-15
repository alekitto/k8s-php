<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Node\v1;

use Kcs\K8s\Api\Model\Api\Core\v1\Toleration;
use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;
use Kcs\K8s\Collection;

/**
 * Scheduling specifies the scheduling constraints for nodes supporting a RuntimeClass.
 */
class Scheduling
{
    /** @var string[]|null */
    #[Kubernetes\Attribute('nodeSelector')]
    protected array|null $nodeSelector = null;

    /** @var iterable|Toleration[]|null */
    #[Kubernetes\Attribute('tolerations', type: AttributeType::Collection, model: Toleration::class)]
    protected $tolerations = null;

    /**
     * @param string[]|null $nodeSelector
     * @param iterable|Toleration[] $tolerations
     */
    public function __construct(array|null $nodeSelector = null, iterable $tolerations = [])
    {
        $this->nodeSelector = $nodeSelector;
        $this->tolerations = new Collection($tolerations);
    }

    /**
     * nodeSelector lists labels that must be present on nodes that support this RuntimeClass. Pods using
     * this RuntimeClass can only be scheduled to a node matched by this selector. The RuntimeClass
     * nodeSelector is merged with a pod's existing nodeSelector. Any conflicts will cause the pod to be
     * rejected in admission.
     */
    public function getNodeSelector(): array|null
    {
        return $this->nodeSelector;
    }

    /**
     * nodeSelector lists labels that must be present on nodes that support this RuntimeClass. Pods using
     * this RuntimeClass can only be scheduled to a node matched by this selector. The RuntimeClass
     * nodeSelector is merged with a pod's existing nodeSelector. Any conflicts will cause the pod to be
     * rejected in admission.
     *
     * @return static
     */
    public function setNodeSelector(array $nodeSelector): static
    {
        $this->nodeSelector = $nodeSelector;

        return $this;
    }

    /**
     * tolerations are appended (excluding duplicates) to pods running with this RuntimeClass during
     * admission, effectively unioning the set of nodes tolerated by the pod and the RuntimeClass.
     *
     * @return iterable|Toleration[]
     */
    public function getTolerations(): iterable|null
    {
        return $this->tolerations;
    }

    /**
     * tolerations are appended (excluding duplicates) to pods running with this RuntimeClass during
     * admission, effectively unioning the set of nodes tolerated by the pod and the RuntimeClass.
     *
     * @return static
     */
    public function setTolerations(iterable $tolerations): static
    {
        $this->tolerations = $tolerations;

        return $this;
    }

    /** @return static */
    public function addTolerations(Toleration $toleration): static
    {
        if (! $this->tolerations) {
            $this->tolerations = new Collection();
        }

        $this->tolerations[] = $toleration;

        return $this;
    }
}
