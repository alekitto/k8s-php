<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Core\v1;

use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;

/**
 * Lifecycle describes actions that the management system should take in response to container
 * lifecycle events. For the PostStart and PreStop lifecycle handlers, management of the container
 * blocks until the action is complete, unless the container process fails, in which case the handler
 * is aborted.
 */
class Lifecycle
{
    #[Kubernetes\Attribute('postStart', type: AttributeType::Model, model: LifecycleHandler::class)]
    protected LifecycleHandler|null $postStart = null;

    #[Kubernetes\Attribute('preStop', type: AttributeType::Model, model: LifecycleHandler::class)]
    protected LifecycleHandler|null $preStop = null;

    public function __construct(LifecycleHandler|null $postStart = null, LifecycleHandler|null $preStop = null)
    {
        $this->postStart = $postStart;
        $this->preStop = $preStop;
    }

    /**
     * PostStart is called immediately after a container is created. If the handler fails, the container is
     * terminated and restarted according to its restart policy. Other management of the container blocks
     * until the hook completes. More info:
     * https://kubernetes.io/docs/concepts/containers/container-lifecycle-hooks/#container-hooks
     */
    public function getPostStart(): LifecycleHandler|null
    {
        return $this->postStart;
    }

    /**
     * PostStart is called immediately after a container is created. If the handler fails, the container is
     * terminated and restarted according to its restart policy. Other management of the container blocks
     * until the hook completes. More info:
     * https://kubernetes.io/docs/concepts/containers/container-lifecycle-hooks/#container-hooks
     *
     * @return static
     */
    public function setPostStart(LifecycleHandler $postStart): static
    {
        $this->postStart = $postStart;

        return $this;
    }

    /**
     * PreStop is called immediately before a container is terminated due to an API request or management
     * event such as liveness/startup probe failure, preemption, resource contention, etc. The handler is
     * not called if the container crashes or exits. The Pod's termination grace period countdown begins
     * before the PreStop hook is executed. Regardless of the outcome of the handler, the container will
     * eventually terminate within the Pod's termination grace period (unless delayed by finalizers). Other
     * management of the container blocks until the hook completes or until the termination grace period is
     * reached. More info:
     * https://kubernetes.io/docs/concepts/containers/container-lifecycle-hooks/#container-hooks
     */
    public function getPreStop(): LifecycleHandler|null
    {
        return $this->preStop;
    }

    /**
     * PreStop is called immediately before a container is terminated due to an API request or management
     * event such as liveness/startup probe failure, preemption, resource contention, etc. The handler is
     * not called if the container crashes or exits. The Pod's termination grace period countdown begins
     * before the PreStop hook is executed. Regardless of the outcome of the handler, the container will
     * eventually terminate within the Pod's termination grace period (unless delayed by finalizers). Other
     * management of the container blocks until the hook completes or until the termination grace period is
     * reached. More info:
     * https://kubernetes.io/docs/concepts/containers/container-lifecycle-hooks/#container-hooks
     *
     * @return static
     */
    public function setPreStop(LifecycleHandler $preStop): static
    {
        $this->preStop = $preStop;

        return $this;
    }
}
