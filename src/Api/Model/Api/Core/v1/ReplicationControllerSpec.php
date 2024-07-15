<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Core\v1;

use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;

/**
 * ReplicationControllerSpec is the specification of a replication controller.
 */
class ReplicationControllerSpec
{
    #[Kubernetes\Attribute('minReadySeconds')]
    protected int|null $minReadySeconds = null;

    #[Kubernetes\Attribute('replicas')]
    protected int|null $replicas = null;

    /** @var string[]|null */
    #[Kubernetes\Attribute('selector')]
    protected array|null $selector = null;

    #[Kubernetes\Attribute('template', type: AttributeType::Model, model: PodTemplateSpec::class)]
    protected PodTemplateSpec|null $template = null;

    public function __construct()
    {
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
     * https://kubernetes.io/docs/concepts/workloads/controllers/replicationcontroller#what-is-a-replicationcontroller
     */
    public function getReplicas(): int|null
    {
        return $this->replicas;
    }

    /**
     * Replicas is the number of desired replicas. This is a pointer to distinguish between explicit zero
     * and unspecified. Defaults to 1. More info:
     * https://kubernetes.io/docs/concepts/workloads/controllers/replicationcontroller#what-is-a-replicationcontroller
     *
     * @return static
     */
    public function setReplicas(int $replicas): static
    {
        $this->replicas = $replicas;

        return $this;
    }

    /**
     * Selector is a label query over pods that should match the Replicas count. If Selector is empty, it
     * is defaulted to the labels present on the Pod template. Label keys and values that must match in
     * order to be controlled by this replication controller, if empty defaulted to labels on Pod template.
     * More info: https://kubernetes.io/docs/concepts/overview/working-with-objects/labels/#label-selectors
     */
    public function getSelector(): array|null
    {
        return $this->selector;
    }

    /**
     * Selector is a label query over pods that should match the Replicas count. If Selector is empty, it
     * is defaulted to the labels present on the Pod template. Label keys and values that must match in
     * order to be controlled by this replication controller, if empty defaulted to labels on Pod template.
     * More info: https://kubernetes.io/docs/concepts/overview/working-with-objects/labels/#label-selectors
     *
     * @return static
     */
    public function setSelector(array $selector): static
    {
        $this->selector = $selector;

        return $this;
    }

    /**
     * Template is the object that describes the pod that will be created if insufficient replicas are
     * detected. This takes precedence over a TemplateRef. The only allowed template.spec.restartPolicy
     * value is "Always". More info:
     * https://kubernetes.io/docs/concepts/workloads/controllers/replicationcontroller#pod-template
     */
    public function getTemplate(): PodTemplateSpec|null
    {
        return $this->template;
    }

    /**
     * Template is the object that describes the pod that will be created if insufficient replicas are
     * detected. This takes precedence over a TemplateRef. The only allowed template.spec.restartPolicy
     * value is "Always". More info:
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
