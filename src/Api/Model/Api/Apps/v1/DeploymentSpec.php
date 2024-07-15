<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Apps\v1;

use Kcs\K8s\Api\Model\Api\Core\v1\PodTemplateSpec;
use Kcs\K8s\Api\Model\ApiMachinery\Apis\Meta\v1\LabelSelector;
use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;

/**
 * DeploymentSpec is the specification of the desired behavior of the Deployment.
 */
class DeploymentSpec
{
    #[Kubernetes\Attribute('minReadySeconds')]
    protected int|null $minReadySeconds = null;

    #[Kubernetes\Attribute('paused')]
    protected bool|null $paused = null;

    #[Kubernetes\Attribute('progressDeadlineSeconds')]
    protected int|null $progressDeadlineSeconds = null;

    #[Kubernetes\Attribute('replicas')]
    protected int|null $replicas = null;

    #[Kubernetes\Attribute('revisionHistoryLimit')]
    protected int|null $revisionHistoryLimit = null;

    #[Kubernetes\Attribute('selector', type: AttributeType::Model, model: LabelSelector::class, required: true)]
    protected LabelSelector $selector;

    #[Kubernetes\Attribute('strategy', type: AttributeType::Model, model: DeploymentStrategy::class)]
    protected DeploymentStrategy|null $strategy = null;

    #[Kubernetes\Attribute('template', type: AttributeType::Model, model: PodTemplateSpec::class, required: true)]
    protected PodTemplateSpec $template;

    public function __construct(LabelSelector $selector, PodTemplateSpec $template)
    {
        $this->selector = $selector;
        $this->template = $template;
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
     * Indicates that the deployment is paused.
     */
    public function isPaused(): bool|null
    {
        return $this->paused;
    }

    /**
     * Indicates that the deployment is paused.
     *
     * @return static
     */
    public function setIsPaused(bool $paused): static
    {
        $this->paused = $paused;

        return $this;
    }

    /**
     * The maximum time in seconds for a deployment to make progress before it is considered to be failed.
     * The deployment controller will continue to process failed deployments and a condition with a
     * ProgressDeadlineExceeded reason will be surfaced in the deployment status. Note that progress will
     * not be estimated during the time a deployment is paused. Defaults to 600s.
     */
    public function getProgressDeadlineSeconds(): int|null
    {
        return $this->progressDeadlineSeconds;
    }

    /**
     * The maximum time in seconds for a deployment to make progress before it is considered to be failed.
     * The deployment controller will continue to process failed deployments and a condition with a
     * ProgressDeadlineExceeded reason will be surfaced in the deployment status. Note that progress will
     * not be estimated during the time a deployment is paused. Defaults to 600s.
     *
     * @return static
     */
    public function setProgressDeadlineSeconds(int $progressDeadlineSeconds): static
    {
        $this->progressDeadlineSeconds = $progressDeadlineSeconds;

        return $this;
    }

    /**
     * Number of desired pods. This is a pointer to distinguish between explicit zero and not specified.
     * Defaults to 1.
     */
    public function getReplicas(): int|null
    {
        return $this->replicas;
    }

    /**
     * Number of desired pods. This is a pointer to distinguish between explicit zero and not specified.
     * Defaults to 1.
     *
     * @return static
     */
    public function setReplicas(int $replicas): static
    {
        $this->replicas = $replicas;

        return $this;
    }

    /**
     * The number of old ReplicaSets to retain to allow rollback. This is a pointer to distinguish between
     * explicit zero and not specified. Defaults to 10.
     */
    public function getRevisionHistoryLimit(): int|null
    {
        return $this->revisionHistoryLimit;
    }

    /**
     * The number of old ReplicaSets to retain to allow rollback. This is a pointer to distinguish between
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
     * Label selector for pods. Existing ReplicaSets whose pods are selected by this will be the ones
     * affected by this deployment. It must match the pod template's labels.
     */
    public function getSelector(): LabelSelector
    {
        return $this->selector;
    }

    /**
     * Label selector for pods. Existing ReplicaSets whose pods are selected by this will be the ones
     * affected by this deployment. It must match the pod template's labels.
     *
     * @return static
     */
    public function setSelector(LabelSelector $selector): static
    {
        $this->selector = $selector;

        return $this;
    }

    /**
     * The deployment strategy to use to replace existing pods with new ones.
     */
    public function getStrategy(): DeploymentStrategy|null
    {
        return $this->strategy;
    }

    /**
     * The deployment strategy to use to replace existing pods with new ones.
     *
     * @return static
     */
    public function setStrategy(DeploymentStrategy $strategy): static
    {
        $this->strategy = $strategy;

        return $this;
    }

    /**
     * Template describes the pods that will be created. The only allowed template.spec.restartPolicy value
     * is "Always".
     */
    public function getTemplate(): PodTemplateSpec
    {
        return $this->template;
    }

    /**
     * Template describes the pods that will be created. The only allowed template.spec.restartPolicy value
     * is "Always".
     *
     * @return static
     */
    public function setTemplate(PodTemplateSpec $template): static
    {
        $this->template = $template;

        return $this;
    }
}
