<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Core\v1;

use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;

/**
 * Probe describes a health check to be performed against a container to determine whether it is alive
 * or ready to receive traffic.
 */
class Probe
{
    #[Kubernetes\Attribute('exec', type: AttributeType::Model, model: ExecAction::class)]
    protected ExecAction|null $exec = null;

    #[Kubernetes\Attribute('failureThreshold')]
    protected int|null $failureThreshold = null;

    #[Kubernetes\Attribute('grpc', type: AttributeType::Model, model: GRPCAction::class)]
    protected GRPCAction|null $grpc = null;

    #[Kubernetes\Attribute('httpGet', type: AttributeType::Model, model: HTTPGetAction::class)]
    protected HTTPGetAction|null $httpGet = null;

    #[Kubernetes\Attribute('initialDelaySeconds')]
    protected int|null $initialDelaySeconds = null;

    #[Kubernetes\Attribute('periodSeconds')]
    protected int|null $periodSeconds = null;

    #[Kubernetes\Attribute('successThreshold')]
    protected int|null $successThreshold = null;

    #[Kubernetes\Attribute('tcpSocket', type: AttributeType::Model, model: TCPSocketAction::class)]
    protected TCPSocketAction|null $tcpSocket = null;

    #[Kubernetes\Attribute('terminationGracePeriodSeconds')]
    protected int|null $terminationGracePeriodSeconds = null;

    #[Kubernetes\Attribute('timeoutSeconds')]
    protected int|null $timeoutSeconds = null;

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
     * Minimum consecutive failures for the probe to be considered failed after having succeeded. Defaults
     * to 3. Minimum value is 1.
     */
    public function getFailureThreshold(): int|null
    {
        return $this->failureThreshold;
    }

    /**
     * Minimum consecutive failures for the probe to be considered failed after having succeeded. Defaults
     * to 3. Minimum value is 1.
     *
     * @return static
     */
    public function setFailureThreshold(int $failureThreshold): static
    {
        $this->failureThreshold = $failureThreshold;

        return $this;
    }

    /**
     * GRPC specifies an action involving a GRPC port.
     */
    public function getGrpc(): GRPCAction|null
    {
        return $this->grpc;
    }

    /**
     * GRPC specifies an action involving a GRPC port.
     *
     * @return static
     */
    public function setGrpc(GRPCAction $grpc): static
    {
        $this->grpc = $grpc;

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
     * Number of seconds after the container has started before liveness probes are initiated. More info:
     * https://kubernetes.io/docs/concepts/workloads/pods/pod-lifecycle#container-probes
     */
    public function getInitialDelaySeconds(): int|null
    {
        return $this->initialDelaySeconds;
    }

    /**
     * Number of seconds after the container has started before liveness probes are initiated. More info:
     * https://kubernetes.io/docs/concepts/workloads/pods/pod-lifecycle#container-probes
     *
     * @return static
     */
    public function setInitialDelaySeconds(int $initialDelaySeconds): static
    {
        $this->initialDelaySeconds = $initialDelaySeconds;

        return $this;
    }

    /**
     * How often (in seconds) to perform the probe. Default to 10 seconds. Minimum value is 1.
     */
    public function getPeriodSeconds(): int|null
    {
        return $this->periodSeconds;
    }

    /**
     * How often (in seconds) to perform the probe. Default to 10 seconds. Minimum value is 1.
     *
     * @return static
     */
    public function setPeriodSeconds(int $periodSeconds): static
    {
        $this->periodSeconds = $periodSeconds;

        return $this;
    }

    /**
     * Minimum consecutive successes for the probe to be considered successful after having failed.
     * Defaults to 1. Must be 1 for liveness and startup. Minimum value is 1.
     */
    public function getSuccessThreshold(): int|null
    {
        return $this->successThreshold;
    }

    /**
     * Minimum consecutive successes for the probe to be considered successful after having failed.
     * Defaults to 1. Must be 1 for liveness and startup. Minimum value is 1.
     *
     * @return static
     */
    public function setSuccessThreshold(int $successThreshold): static
    {
        $this->successThreshold = $successThreshold;

        return $this;
    }

    /**
     * TCPSocket specifies an action involving a TCP port.
     */
    public function getTcpSocket(): TCPSocketAction|null
    {
        return $this->tcpSocket;
    }

    /**
     * TCPSocket specifies an action involving a TCP port.
     *
     * @return static
     */
    public function setTcpSocket(TCPSocketAction $tcpSocket): static
    {
        $this->tcpSocket = $tcpSocket;

        return $this;
    }

    /**
     * Optional duration in seconds the pod needs to terminate gracefully upon probe failure. The grace
     * period is the duration in seconds after the processes running in the pod are sent a termination
     * signal and the time when the processes are forcibly halted with a kill signal. Set this value longer
     * than the expected cleanup time for your process. If this value is nil, the pod's
     * terminationGracePeriodSeconds will be used. Otherwise, this value overrides the value provided by
     * the pod spec. Value must be non-negative integer. The value zero indicates stop immediately via the
     * kill signal (no opportunity to shut down). This is a beta field and requires enabling
     * ProbeTerminationGracePeriod feature gate. Minimum value is 1. spec.terminationGracePeriodSeconds is
     * used if unset.
     */
    public function getTerminationGracePeriodSeconds(): int|null
    {
        return $this->terminationGracePeriodSeconds;
    }

    /**
     * Optional duration in seconds the pod needs to terminate gracefully upon probe failure. The grace
     * period is the duration in seconds after the processes running in the pod are sent a termination
     * signal and the time when the processes are forcibly halted with a kill signal. Set this value longer
     * than the expected cleanup time for your process. If this value is nil, the pod's
     * terminationGracePeriodSeconds will be used. Otherwise, this value overrides the value provided by
     * the pod spec. Value must be non-negative integer. The value zero indicates stop immediately via the
     * kill signal (no opportunity to shut down). This is a beta field and requires enabling
     * ProbeTerminationGracePeriod feature gate. Minimum value is 1. spec.terminationGracePeriodSeconds is
     * used if unset.
     *
     * @return static
     */
    public function setTerminationGracePeriodSeconds(int $terminationGracePeriodSeconds): static
    {
        $this->terminationGracePeriodSeconds = $terminationGracePeriodSeconds;

        return $this;
    }

    /**
     * Number of seconds after which the probe times out. Defaults to 1 second. Minimum value is 1. More
     * info: https://kubernetes.io/docs/concepts/workloads/pods/pod-lifecycle#container-probes
     */
    public function getTimeoutSeconds(): int|null
    {
        return $this->timeoutSeconds;
    }

    /**
     * Number of seconds after which the probe times out. Defaults to 1 second. Minimum value is 1. More
     * info: https://kubernetes.io/docs/concepts/workloads/pods/pod-lifecycle#container-probes
     *
     * @return static
     */
    public function setTimeoutSeconds(int $timeoutSeconds): static
    {
        $this->timeoutSeconds = $timeoutSeconds;

        return $this;
    }
}
