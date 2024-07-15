<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Resource\v1alpha2;

use Kcs\K8s\Attribute as Kubernetes;

/**
 * NamedResourcesFilter is used in ResourceFilterModel.
 */
class NamedResourcesFilter
{
    #[Kubernetes\Attribute('selector', required: true)]
    protected string $selector;

    public function __construct(string $selector)
    {
        $this->selector = $selector;
    }

    /**
     * Selector is a CEL expression which must evaluate to true if a resource instance is suitable. The
     * language is as defined in https://kubernetes.io/docs/reference/using-api/cel/
     *
     * In addition, for each type in NamedResourcesAttributeValue there is a map that resolves to the
     * corresponding value of the instance under evaluation. For example:
     *
     *    attributes.quantity["a"].isGreaterThan(quantity("0")) &&
     *    attributes.stringslice["b"].isSorted()
     */
    public function getSelector(): string
    {
        return $this->selector;
    }

    /**
     * Selector is a CEL expression which must evaluate to true if a resource instance is suitable. The
     * language is as defined in https://kubernetes.io/docs/reference/using-api/cel/
     *
     * In addition, for each type in NamedResourcesAttributeValue there is a map that resolves to the
     * corresponding value of the instance under evaluation. For example:
     *
     *    attributes.quantity["a"].isGreaterThan(quantity("0")) &&
     *    attributes.stringslice["b"].isSorted()
     *
     * @return static
     */
    public function setSelector(string $selector): static
    {
        $this->selector = $selector;

        return $this;
    }
}
