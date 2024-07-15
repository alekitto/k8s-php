<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Core\v1;

use Kcs\K8s\Attribute as Kubernetes;

/**
 * SleepAction describes a "sleep" action.
 */
class SleepAction
{
    #[Kubernetes\Attribute('seconds', required: true)]
    protected int $seconds;

    public function __construct(int $seconds)
    {
        $this->seconds = $seconds;
    }

    /**
     * Seconds is the number of seconds to sleep.
     */
    public function getSeconds(): int
    {
        return $this->seconds;
    }

    /**
     * Seconds is the number of seconds to sleep.
     *
     * @return static
     */
    public function setSeconds(int $seconds): static
    {
        $this->seconds = $seconds;

        return $this;
    }
}
