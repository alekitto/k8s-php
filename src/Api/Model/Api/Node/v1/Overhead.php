<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Node\v1;

use Kcs\K8s\Attribute as Kubernetes;

/**
 * Overhead structure represents the resource overhead associated with running a pod.
 */
class Overhead
{
    /** @var object[]|null */
    #[Kubernetes\Attribute('podFixed')]
    protected array|null $podFixed = null;

    /** @param object[]|null $podFixed */
    public function __construct(array|null $podFixed = null)
    {
        $this->podFixed = $podFixed;
    }

    /**
     * podFixed represents the fixed resource overhead associated with running a pod.
     */
    public function getPodFixed(): array|null
    {
        return $this->podFixed;
    }

    /**
     * podFixed represents the fixed resource overhead associated with running a pod.
     *
     * @return static
     */
    public function setPodFixed(array $podFixed): static
    {
        $this->podFixed = $podFixed;

        return $this;
    }
}
