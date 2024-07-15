<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Authorization\v1;

use Kcs\K8s\Attribute as Kubernetes;

/**
 * SelfSubjectRulesReviewSpec defines the specification for SelfSubjectRulesReview.
 */
class SelfSubjectRulesReviewSpec
{
    #[Kubernetes\Attribute('namespace')]
    protected string|null $namespace = null;

    public function __construct(string|null $namespace = null)
    {
        $this->namespace = $namespace;
    }

    /**
     * Namespace to evaluate rules for. Required.
     */
    public function getNamespace(): string|null
    {
        return $this->namespace;
    }

    /**
     * Namespace to evaluate rules for. Required.
     *
     * @return static
     */
    public function setNamespace(string $namespace): static
    {
        $this->namespace = $namespace;

        return $this;
    }
}
