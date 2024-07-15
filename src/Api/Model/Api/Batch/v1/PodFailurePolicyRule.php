<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Batch\v1;

use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;
use Kcs\K8s\Collection;

/**
 * PodFailurePolicyRule describes how a pod failure is handled when the requirements are met. One of
 * onExitCodes and onPodConditions, but not both, can be used in each rule.
 */
class PodFailurePolicyRule
{
    #[Kubernetes\Attribute('action', required: true)]
    protected string $action;

    #[Kubernetes\Attribute('onExitCodes', type: AttributeType::Model, model: PodFailurePolicyOnExitCodesRequirement::class)]
    protected PodFailurePolicyOnExitCodesRequirement|null $onExitCodes = null;

    /** @var iterable|PodFailurePolicyOnPodConditionsPattern[]|null */
    #[Kubernetes\Attribute(
        'onPodConditions',
        type: AttributeType::Collection,
        model: PodFailurePolicyOnPodConditionsPattern::class,
    )]
    protected $onPodConditions = null;

    public function __construct(string $action)
    {
        $this->action = $action;
    }

    /**
     * Specifies the action taken on a pod failure when the requirements are satisfied. Possible values
     * are:
     *
     * - FailJob: indicates that the pod's job is marked as Failed and all
     *   running pods are terminated.
     * - FailIndex: indicates that the pod's index is marked as Failed and will
     *   not be restarted.
     *   This value is beta-level. It can be used when the
     *   `JobBackoffLimitPerIndex` feature gate is enabled (enabled by default).
     * - Ignore: indicates that the counter towards the .backoffLimit is not
     *   incremented and a replacement pod is created.
     * - Count: indicates that the pod is handled in the default way - the
     *   counter towards the .backoffLimit is incremented.
     * Additional values are considered to be added in the future. Clients should react to an unknown
     * action by skipping the rule.
     */
    public function getAction(): string
    {
        return $this->action;
    }

    /**
     * Specifies the action taken on a pod failure when the requirements are satisfied. Possible values
     * are:
     *
     * - FailJob: indicates that the pod's job is marked as Failed and all
     *   running pods are terminated.
     * - FailIndex: indicates that the pod's index is marked as Failed and will
     *   not be restarted.
     *   This value is beta-level. It can be used when the
     *   `JobBackoffLimitPerIndex` feature gate is enabled (enabled by default).
     * - Ignore: indicates that the counter towards the .backoffLimit is not
     *   incremented and a replacement pod is created.
     * - Count: indicates that the pod is handled in the default way - the
     *   counter towards the .backoffLimit is incremented.
     * Additional values are considered to be added in the future. Clients should react to an unknown
     * action by skipping the rule.
     *
     * @return static
     */
    public function setAction(string $action): static
    {
        $this->action = $action;

        return $this;
    }

    /**
     * Represents the requirement on the container exit codes.
     */
    public function getOnExitCodes(): PodFailurePolicyOnExitCodesRequirement|null
    {
        return $this->onExitCodes;
    }

    /**
     * Represents the requirement on the container exit codes.
     *
     * @return static
     */
    public function setOnExitCodes(PodFailurePolicyOnExitCodesRequirement $onExitCodes): static
    {
        $this->onExitCodes = $onExitCodes;

        return $this;
    }

    /**
     * Represents the requirement on the pod conditions. The requirement is represented as a list of pod
     * condition patterns. The requirement is satisfied if at least one pattern matches an actual pod
     * condition. At most 20 elements are allowed.
     *
     * @return iterable|PodFailurePolicyOnPodConditionsPattern[]
     */
    public function getOnPodConditions(): iterable|null
    {
        return $this->onPodConditions;
    }

    /**
     * Represents the requirement on the pod conditions. The requirement is represented as a list of pod
     * condition patterns. The requirement is satisfied if at least one pattern matches an actual pod
     * condition. At most 20 elements are allowed.
     *
     * @return static
     */
    public function setOnPodConditions(iterable $onPodConditions): static
    {
        $this->onPodConditions = $onPodConditions;

        return $this;
    }

    /** @return static */
    public function addOnPodConditions(PodFailurePolicyOnPodConditionsPattern $onPodCondition): static
    {
        if (! $this->onPodConditions) {
            $this->onPodConditions = new Collection();
        }

        $this->onPodConditions[] = $onPodCondition;

        return $this;
    }
}
