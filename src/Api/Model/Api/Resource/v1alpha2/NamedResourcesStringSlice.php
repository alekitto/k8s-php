<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Resource\v1alpha2;

use Kcs\K8s\Attribute as Kubernetes;

/**
 * NamedResourcesStringSlice contains a slice of strings.
 */
class NamedResourcesStringSlice
{
    /** @var string[] */
    #[Kubernetes\Attribute('strings', required: true)]
    protected array $strings;

    /** @param string[] $strings */
    public function __construct(array $strings)
    {
        $this->strings = $strings;
    }

    /**
     * Strings is the slice of strings.
     */
    public function getStrings(): array
    {
        return $this->strings;
    }

    /**
     * Strings is the slice of strings.
     *
     * @return static
     */
    public function setStrings(array $strings): static
    {
        $this->strings = $strings;

        return $this;
    }
}
