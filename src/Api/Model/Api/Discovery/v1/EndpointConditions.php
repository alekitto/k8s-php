<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Discovery\v1;

use Kcs\K8s\Attribute as Kubernetes;

/**
 * EndpointConditions represents the current condition of an endpoint.
 */
class EndpointConditions
{
    #[Kubernetes\Attribute('ready')]
    protected bool|null $ready = null;

    #[Kubernetes\Attribute('serving')]
    protected bool|null $serving = null;

    #[Kubernetes\Attribute('terminating')]
    protected bool|null $terminating = null;

    public function __construct(bool|null $ready = null, bool|null $serving = null, bool|null $terminating = null)
    {
        $this->ready = $ready;
        $this->serving = $serving;
        $this->terminating = $terminating;
    }

    /**
     * ready indicates that this endpoint is prepared to receive traffic, according to whatever system is
     * managing the endpoint. A nil value indicates an unknown state. In most cases consumers should
     * interpret this unknown state as ready. For compatibility reasons, ready should never be "true" for
     * terminating endpoints, except when the normal readiness behavior is being explicitly overridden, for
     * example when the associated Service has set the publishNotReadyAddresses flag.
     */
    public function isReady(): bool|null
    {
        return $this->ready;
    }

    /**
     * ready indicates that this endpoint is prepared to receive traffic, according to whatever system is
     * managing the endpoint. A nil value indicates an unknown state. In most cases consumers should
     * interpret this unknown state as ready. For compatibility reasons, ready should never be "true" for
     * terminating endpoints, except when the normal readiness behavior is being explicitly overridden, for
     * example when the associated Service has set the publishNotReadyAddresses flag.
     *
     * @return static
     */
    public function setIsReady(bool $ready): static
    {
        $this->ready = $ready;

        return $this;
    }

    /**
     * serving is identical to ready except that it is set regardless of the terminating state of
     * endpoints. This condition should be set to true for a ready endpoint that is terminating. If nil,
     * consumers should defer to the ready condition.
     */
    public function isServing(): bool|null
    {
        return $this->serving;
    }

    /**
     * serving is identical to ready except that it is set regardless of the terminating state of
     * endpoints. This condition should be set to true for a ready endpoint that is terminating. If nil,
     * consumers should defer to the ready condition.
     *
     * @return static
     */
    public function setIsServing(bool $serving): static
    {
        $this->serving = $serving;

        return $this;
    }

    /**
     * terminating indicates that this endpoint is terminating. A nil value indicates an unknown state.
     * Consumers should interpret this unknown state to mean that the endpoint is not terminating.
     */
    public function isTerminating(): bool|null
    {
        return $this->terminating;
    }

    /**
     * terminating indicates that this endpoint is terminating. A nil value indicates an unknown state.
     * Consumers should interpret this unknown state to mean that the endpoint is not terminating.
     *
     * @return static
     */
    public function setIsTerminating(bool $terminating): static
    {
        $this->terminating = $terminating;

        return $this;
    }
}
