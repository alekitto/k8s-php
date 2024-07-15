<?php

declare(strict_types=1);

namespace Kcs\K8s\Client\Kind;

use Kcs\K8s\Api\Service\Core\v1\PodExecOptionsService;
use Kcs\K8s\Client\Exception\InvalidArgumentException;
use Kcs\K8s\Client\Websocket\Contract\ContainerExecInterface;

use function gettype;
use function is_callable;
use function is_object;
use function sprintf;

class PodExecService
{
    use PodExecTrait;

    public function __construct(private PodExecOptionsService $service, private string $name, string $namespace)
    {
        $this->service->useNamespace($namespace);
    }

    /**
     * Command is the remote command to execute. argv array. Not executed within a shell.
     *
     * @param string|string[] $command
     */
    public function command(string|array $command): self
    {
        $this->options['command'] = $command;

        return $this;
    }

    /**
     * Executes the command with the given handler in the Pod.
     */
    public function run(callable|ContainerExecInterface $handler): void
    {
        if (! (is_callable($handler) || $handler instanceof ContainerExecInterface)) {
            throw new InvalidArgumentException(sprintf(
                'The handler for the command must be a callable or ContainerExecInterface instance. Got: %s',
                is_object($handler) ? $handler::class : gettype($handler),
            ));
        }

        $this->service->connectGetNamespacedPodExec(
            $this->name,
            $handler,
            $this->options,
        );
    }
}
