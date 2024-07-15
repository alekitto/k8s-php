<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Core\v1;

use Kcs\K8s\Attribute as Kubernetes;

/**
 * ResourceQuotaStatus defines the enforced hard limits and observed use.
 */
class ResourceQuotaStatus
{
    /** @var object[]|null */
    #[Kubernetes\Attribute('hard')]
    protected array|null $hard = null;

    /** @var object[]|null */
    #[Kubernetes\Attribute('used')]
    protected array|null $used = null;

    /**
     * @param object[]|null $hard
     * @param object[]|null $used
     */
    public function __construct(array|null $hard = null, array|null $used = null)
    {
        $this->hard = $hard;
        $this->used = $used;
    }

    /**
     * Hard is the set of enforced hard limits for each named resource. More info:
     * https://kubernetes.io/docs/concepts/policy/resource-quotas/
     */
    public function getHard(): array|null
    {
        return $this->hard;
    }

    /**
     * Hard is the set of enforced hard limits for each named resource. More info:
     * https://kubernetes.io/docs/concepts/policy/resource-quotas/
     *
     * @return static
     */
    public function setHard(array $hard): static
    {
        $this->hard = $hard;

        return $this;
    }

    /**
     * Used is the current observed total usage of the resource in the namespace.
     */
    public function getUsed(): array|null
    {
        return $this->used;
    }

    /**
     * Used is the current observed total usage of the resource in the namespace.
     *
     * @return static
     */
    public function setUsed(array $used): static
    {
        $this->used = $used;

        return $this;
    }
}
