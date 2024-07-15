<?php

declare(strict_types=1);

namespace Kcs\K8s\Client\Kind;

use Kcs\K8s\Api\Service\Core\v1\PodAttachOptionsService;
use Kcs\K8s\Client\Exception\InvalidArgumentException;
use Kcs\K8s\Client\Websocket\Contract\ContainerExecInterface;

use function gettype;
use function is_callable;
use function is_object;
use function sprintf;

class PodAttachService
{
    use PodExecTrait;

    public function __construct(private PodAttachOptionsService $service, private string $name, string $namespace)
    {
        $this->service->useNamespace($namespace);
    }

    /**
     * Attaches to the containers main process with the given handler.
     */
    public function run(callable|ContainerExecInterface $handler): void
    {
        if (! (is_callable($handler) || $handler instanceof ContainerExecInterface)) {
            throw new InvalidArgumentException(sprintf(
                'The handler for the command must be a callable or ContainerExecInterface instance. Got: %s',
                is_object($handler) ? $handler::class : gettype($handler),
            ));
        }

        $this->service->connectGetNamespacedPodAttach(
            $this->name,
            $handler,
            $this->options,
        );
    }
}
