<?php

declare(strict_types=1);

namespace Kcs\K8s\Client\Kind;

use Kcs\K8s\Api\Service\Core\v1\PodPortForwardOptionsService;
use Kcs\K8s\Client\Websocket\Contract\PortForwardInterface;

class PortForwardService
{
    public function __construct(private readonly string $podName, private array $ports, private readonly PodPortForwardOptionsService $portforward)
    {
    }

    /**
     * Add a specific port to forward from the pod.
     *
     * @return $this
     */
    public function addPort(int $port): self
    {
        $this->ports[] = $port;

        return $this;
    }

    /**
     * A specific Kubernetes namespace to run the port forward within (where the pod is located).
     *
     * @return $this
     */
    public function useNamespace(string $namespace): self
    {
        $this->portforward->useNamespace($namespace);

        return $this;
    }

    /**
     * Start the port forward process.
     */
    public function start(PortForwardInterface|callable $handler): void
    {
        $this->portforward->connectGetNamespacedPodPortforward(
            $this->podName,
            $handler,
            ['ports' => $this->ports],
        );
    }
}
