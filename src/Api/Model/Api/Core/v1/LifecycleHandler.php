<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Core\v1;

use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;

/**
 * LifecycleHandler defines a specific action that should be taken in a lifecycle hook. One and only
 * one of the fields, except TCPSocket must be specified.
 */
class LifecycleHandler
{
    #[Kubernetes\Attribute('exec', type: AttributeType::Model, model: ExecAction::class)]
    protected ExecAction|null $exec = null;

    #[Kubernetes\Attribute('httpGet', type: AttributeType::Model, model: HTTPGetAction::class)]
    protected HTTPGetAction|null $httpGet = null;

    #[Kubernetes\Attribute('sleep', type: AttributeType::Model, model: SleepAction::class)]
    protected SleepAction|null $sleep = null;

    #[Kubernetes\Attribute('tcpSocket', type: AttributeType::Model, model: TCPSocketAction::class)]
    protected TCPSocketAction|null $tcpSocket = null;

    public function __construct(
        ExecAction|null $exec = null,
        HTTPGetAction|null $httpGet = null,
        SleepAction|null $sleep = null,
        TCPSocketAction|null $tcpSocket = null,
    ) {
        $this->exec = $exec;
        $this->httpGet = $httpGet;
        $this->sleep = $sleep;
        $this->tcpSocket = $tcpSocket;
    }

    /**
     * Exec specifies the action to take.
     */
    public function getExec(): ExecAction|null
    {
        return $this->exec;
    }

    /**
     * Exec specifies the action to take.
     *
     * @return static
     */
    public function setExec(ExecAction $exec): static
    {
        $this->exec = $exec;

        return $this;
    }

    /**
     * HTTPGet specifies the http request to perform.
     */
    public function getHttpGet(): HTTPGetAction|null
    {
        return $this->httpGet;
    }

    /**
     * HTTPGet specifies the http request to perform.
     *
     * @return static
     */
    public function setHttpGet(HTTPGetAction $httpGet): static
    {
        $this->httpGet = $httpGet;

        return $this;
    }

    /**
     * Sleep represents the duration that the container should sleep before being terminated.
     */
    public function getSleep(): SleepAction|null
    {
        return $this->sleep;
    }

    /**
     * Sleep represents the duration that the container should sleep before being terminated.
     *
     * @return static
     */
    public function setSleep(SleepAction $sleep): static
    {
        $this->sleep = $sleep;

        return $this;
    }

    /**
     * Deprecated. TCPSocket is NOT supported as a LifecycleHandler and kept for the backward
     * compatibility. There are no validation of this field and lifecycle hooks will fail in runtime when
     * tcp handler is specified.
     */
    public function getTcpSocket(): TCPSocketAction|null
    {
        return $this->tcpSocket;
    }

    /**
     * Deprecated. TCPSocket is NOT supported as a LifecycleHandler and kept for the backward
     * compatibility. There are no validation of this field and lifecycle hooks will fail in runtime when
     * tcp handler is specified.
     *
     * @return static
     */
    public function setTcpSocket(TCPSocketAction $tcpSocket): static
    {
        $this->tcpSocket = $tcpSocket;

        return $this;
    }
}
