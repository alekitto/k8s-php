<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Apps\v1;

use Kcs\K8s\Api\Model\Api\Core\v1\PodTemplateSpec;
use Kcs\K8s\Api\Model\ApiMachinery\Apis\Meta\v1\LabelSelector;
use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;

/**
 * DaemonSetSpec is the specification of a daemon set.
 */
class DaemonSetSpec
{
    #[Kubernetes\Attribute('minReadySeconds')]
    protected int|null $minReadySeconds = null;

    #[Kubernetes\Attribute('revisionHistoryLimit')]
    protected int|null $revisionHistoryLimit = null;

    #[Kubernetes\Attribute('selector', type: AttributeType::Model, model: LabelSelector::class, required: true)]
    protected LabelSelector $selector;

    #[Kubernetes\Attribute('template', type: AttributeType::Model, model: PodTemplateSpec::class, required: true)]
    protected PodTemplateSpec $template;

    #[Kubernetes\Attribute('updateStrategy', type: AttributeType::Model, model: DaemonSetUpdateStrategy::class)]
    protected DaemonSetUpdateStrategy|null $updateStrategy = null;

    public function __construct(LabelSelector $selector, PodTemplateSpec $template)
    {
        $this->selector = $selector;
        $this->template = $template;
    }

    /**
     * The minimum number of seconds for which a newly created DaemonSet pod should be ready without any of
     * its container crashing, for it to be considered available. Defaults to 0 (pod will be considered
     * available as soon as it is ready).
     */
    public function getMinReadySeconds(): int|null
    {
        return $this->minReadySeconds;
    }

    /**
     * The minimum number of seconds for which a newly created DaemonSet pod should be ready without any of
     * its container crashing, for it to be considered available. Defaults to 0 (pod will be considered
     * available as soon as it is ready).
     *
     * @return static
     */
    public function setMinReadySeconds(int $minReadySeconds): static
    {
        $this->minReadySeconds = $minReadySeconds;

        return $this;
    }

    /**
     * The number of old history to retain to allow rollback. This is a pointer to distinguish between
     * explicit zero and not specified. Defaults to 10.
     */
    public function getRevisionHistoryLimit(): int|null
    {
        return $this->revisionHistoryLimit;
    }

    /**
     * The number of old history to retain to allow rollback. This is a pointer to distinguish between
     * explicit zero and not specified. Defaults to 10.
     *
     * @return static
     */
    public function setRevisionHistoryLimit(int $revisionHistoryLimit): static
    {
        $this->revisionHistoryLimit = $revisionHistoryLimit;

        return $this;
    }

    /**
     * A label query over pods that are managed by the daemon set. Must match in order to be controlled. It
     * must match the pod template's labels. More info:
     * https://kubernetes.io/docs/concepts/overview/working-with-objects/labels/#label-selectors
     */
    public function getSelector(): LabelSelector
    {
        return $this->selector;
    }

    /**
     * A label query over pods that are managed by the daemon set. Must match in order to be controlled. It
     * must match the pod template's labels. More info:
     * https://kubernetes.io/docs/concepts/overview/working-with-objects/labels/#label-selectors
     *
     * @return static
     */
    public function setSelector(LabelSelector $selector): static
    {
        $this->selector = $selector;

        return $this;
    }

    /**
     * An object that describes the pod that will be created. The DaemonSet will create exactly one copy of
     * this pod on every node that matches the template's node selector (or on every node if no node
     * selector is specified). The only allowed template.spec.restartPolicy value is "Always". More info:
     * https://kubernetes.io/docs/concepts/workloads/controllers/replicationcontroller#pod-template
     */
    public function getTemplate(): PodTemplateSpec
    {
        return $this->template;
    }

    /**
     * An object that describes the pod that will be created. The DaemonSet will create exactly one copy of
     * this pod on every node that matches the template's node selector (or on every node if no node
     * selector is specified). The only allowed template.spec.restartPolicy value is "Always". More info:
     * https://kubernetes.io/docs/concepts/workloads/controllers/replicationcontroller#pod-template
     *
     * @return static
     */
    public function setTemplate(PodTemplateSpec $template): static
    {
        $this->template = $template;

        return $this;
    }

    /**
     * An update strategy to replace existing DaemonSet pods with new pods.
     */
    public function getUpdateStrategy(): DaemonSetUpdateStrategy|null
    {
        return $this->updateStrategy;
    }

    /**
     * An update strategy to replace existing DaemonSet pods with new pods.
     *
     * @return static
     */
    public function setUpdateStrategy(DaemonSetUpdateStrategy $updateStrategy): static
    {
        $this->updateStrategy = $updateStrategy;

        return $this;
    }
}
