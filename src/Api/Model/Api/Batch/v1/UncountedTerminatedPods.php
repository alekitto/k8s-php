<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Batch\v1;

use Kcs\K8s\Attribute as Kubernetes;

/**
 * UncountedTerminatedPods holds UIDs of Pods that have terminated but haven't been accounted in Job
 * status counters.
 */
class UncountedTerminatedPods
{
    /** @var string[]|null */
    #[Kubernetes\Attribute('failed')]
    protected array|null $failed = null;

    /** @var string[]|null */
    #[Kubernetes\Attribute('succeeded')]
    protected array|null $succeeded = null;

    /**
     * @param string[]|null $failed
     * @param string[]|null $succeeded
     */
    public function __construct(array|null $failed = null, array|null $succeeded = null)
    {
        $this->failed = $failed;
        $this->succeeded = $succeeded;
    }

    /**
     * failed holds UIDs of failed Pods.
     */
    public function getFailed(): array|null
    {
        return $this->failed;
    }

    /**
     * failed holds UIDs of failed Pods.
     *
     * @return static
     */
    public function setFailed(array $failed): static
    {
        $this->failed = $failed;

        return $this;
    }

    /**
     * succeeded holds UIDs of succeeded Pods.
     */
    public function getSucceeded(): array|null
    {
        return $this->succeeded;
    }

    /**
     * succeeded holds UIDs of succeeded Pods.
     *
     * @return static
     */
    public function setSucceeded(array $succeeded): static
    {
        $this->succeeded = $succeeded;

        return $this;
    }
}
