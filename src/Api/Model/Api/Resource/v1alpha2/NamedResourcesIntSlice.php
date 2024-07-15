<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Resource\v1alpha2;

use Kcs\K8s\Attribute as Kubernetes;

/**
 * NamedResourcesIntSlice contains a slice of 64-bit integers.
 */
class NamedResourcesIntSlice
{
    /** @var int[] */
    #[Kubernetes\Attribute('ints', required: true)]
    protected array $ints;

    /** @param int[] $ints */
    public function __construct(array $ints)
    {
        $this->ints = $ints;
    }

    /**
     * Ints is the slice of 64-bit integers.
     */
    public function getInts(): array
    {
        return $this->ints;
    }

    /**
     * Ints is the slice of 64-bit integers.
     *
     * @return static
     */
    public function setInts(array $ints): static
    {
        $this->ints = $ints;

        return $this;
    }
}
