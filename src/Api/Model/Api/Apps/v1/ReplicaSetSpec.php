<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Apps\v1;

use Kcs\K8s\Api\Model\Api\Core\v1\PodTemplateSpec;
use Kcs\K8s\Api\Model\ApiMachinery\Apis\Meta\v1\LabelSelector;
use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;

/**
 * ReplicaSetSpec is the specification of a ReplicaSet.
 */
class ReplicaSetSpec
{
    #[Kubernetes\Attribute('minReadySeconds')]
    protected int|null $minReadySeconds = null;

    #[Kubernetes\Attribute('replicas')]
    protected int|null $replicas = null;

    #[Kubernetes\Attribute('selector', type: AttributeType::Model, model: LabelSelector::class, required: true)]
    protected LabelSelector $selector;

    #[Kubernetes\Attribute('template', type: AttributeType::Model, model: PodTemplateSpec::class)]
    protected PodTemplateSpec|null $template = null;

    public function __construct(LabelSelector $selector)
    {
        $this->selector = $selector;
    }

    /**
     * Minimum number of seconds for which a newly created pod should be ready without any of its container
     * crashing, for it to be considered available. Defaults to 0 (pod will be considered available as soon
     * as it is ready)
     */
    public function getMinReadySeconds(): int|null
    {
        return $this->minReadySeconds;
    }

    /**
     * Minimum number of seconds for which a newly created pod should be ready without any of its container
     * crashing, for it to be considered available. Defaults to 0 (pod will be considered available as soon
     * as it is ready)
     *
     * @return static
     */
    public function setMinReadySeconds(int $minReadySeconds): static
    {
        $this->minReadySeconds = $minReadySeconds;

        return $this;
    }

    /**
     * Replicas is the number of desired replicas. This is a pointer to distinguish between explicit zero
     * and unspecified. Defaults to 1. More info:
     * https://kubernetes.io/docs/concepts/workloads/controllers/replicationcontroller/#what-is-a-replicationcontroller
     */
    public function getReplicas(): int|null
    {
        return $this->replicas;
    }

    /**
     * Replicas is the number of desired replicas. This is a pointer to distinguish between explicit zero
     * and unspecified. Defaults to 1. More info:
     * https://kubernetes.io/docs/concepts/workloads/controllers/replicationcontroller/#what-is-a-replicationcontroller
     *
     * @return static
     */
    public function setReplicas(int $replicas): static
    {
        $this->replicas = $replicas;

        return $this;
    }

    /**
     * Selector is a label query over pods that should match the replica count. Label keys and values that
     * must match in order to be controlled by this replica set. It must match the pod template's labels.
     * More info: https://kubernetes.io/docs/concepts/overview/working-with-objects/labels/#label-selectors
     */
    public function getSelector(): LabelSelector
    {
        return $this->selector;
    }

    /**
     * Selector is a label query over pods that should match the replica count. Label keys and values that
     * must match in order to be controlled by this replica set. It must match the pod template's labels.
     * More info: https://kubernetes.io/docs/concepts/overview/working-with-objects/labels/#label-selectors
     *
     * @return static
     */
    public function setSelector(LabelSelector $selector): static
    {
        $this->selector = $selector;

        return $this;
    }

    /**
     * Template is the object that describes the pod that will be created if insufficient replicas are
     * detected. More info:
     * https://kubernetes.io/docs/concepts/workloads/controllers/replicationcontroller#pod-template
     */
    public function getTemplate(): PodTemplateSpec|null
    {
        return $this->template;
    }

    /**
     * Template is the object that describes the pod that will be created if insufficient replicas are
     * detected. More info:
     * https://kubernetes.io/docs/concepts/workloads/controllers/replicationcontroller#pod-template
     *
     * @return static
     */
    public function setTemplate(PodTemplateSpec $template): static
    {
        $this->template = $template;

        return $this;
    }
}
