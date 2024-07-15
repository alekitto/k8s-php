<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Core\v1;

use Kcs\K8s\Attribute as Kubernetes;

/**
 * ExecAction describes a "run in container" action.
 */
class ExecAction
{
    /** @var string[]|null */
    #[Kubernetes\Attribute('command')]
    protected array|null $command = null;

    /** @param string[]|null $command */
    public function __construct(array|null $command = null)
    {
        $this->command = $command;
    }

    /**
     * Command is the command line to execute inside the container, the working directory for the command
     * is root ('/') in the container's filesystem. The command is simply exec'd, it is not run inside a
     * shell, so traditional shell instructions ('|', etc) won't work. To use a shell, you need to
     * explicitly call out to that shell. Exit status of 0 is treated as live/healthy and non-zero is
     * unhealthy.
     */
    public function getCommand(): array|null
    {
        return $this->command;
    }

    /**
     * Command is the command line to execute inside the container, the working directory for the command
     * is root ('/') in the container's filesystem. The command is simply exec'd, it is not run inside a
     * shell, so traditional shell instructions ('|', etc) won't work. To use a shell, you need to
     * explicitly call out to that shell. Exit status of 0 is treated as live/healthy and non-zero is
     * unhealthy.
     *
     * @return static
     */
    public function setCommand(array $command): static
    {
        $this->command = $command;

        return $this;
    }
}
