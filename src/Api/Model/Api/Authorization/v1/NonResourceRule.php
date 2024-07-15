<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Authorization\v1;

use Kcs\K8s\Attribute as Kubernetes;

/**
 * NonResourceRule holds information that describes a rule for the non-resource
 */
class NonResourceRule
{
    /** @var string[]|null */
    #[Kubernetes\Attribute('nonResourceURLs')]
    protected array|null $nonResourceURLs = null;

    /** @var string[] */
    #[Kubernetes\Attribute('verbs', required: true)]
    protected array $verbs;

    /** @param string[] $verbs */
    public function __construct(array $verbs)
    {
        $this->verbs = $verbs;
    }

    /**
     * NonResourceURLs is a set of partial urls that a user should have access to.  *s are allowed, but
     * only as the full, final step in the path.  "*" means all.
     */
    public function getNonResourceURLs(): array|null
    {
        return $this->nonResourceURLs;
    }

    /**
     * NonResourceURLs is a set of partial urls that a user should have access to.  *s are allowed, but
     * only as the full, final step in the path.  "*" means all.
     *
     * @return static
     */
    public function setNonResourceURLs(array $nonResourceURLs): static
    {
        $this->nonResourceURLs = $nonResourceURLs;

        return $this;
    }

    /**
     * Verb is a list of kubernetes non-resource API verbs, like: get, post, put, delete, patch, head,
     * options.  "*" means all.
     */
    public function getVerbs(): array
    {
        return $this->verbs;
    }

    /**
     * Verb is a list of kubernetes non-resource API verbs, like: get, post, put, delete, patch, head,
     * options.  "*" means all.
     *
     * @return static
     */
    public function setVerbs(array $verbs): static
    {
        $this->verbs = $verbs;

        return $this;
    }
}
