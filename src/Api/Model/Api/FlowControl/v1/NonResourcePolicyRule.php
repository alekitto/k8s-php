<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\FlowControl\v1;

use Kcs\K8s\Attribute as Kubernetes;

/**
 * NonResourcePolicyRule is a predicate that matches non-resource requests according to their verb and
 * the target non-resource URL. A NonResourcePolicyRule matches a request if and only if both (a) at
 * least one member of verbs matches the request and (b) at least one member of nonResourceURLs matches
 * the request.
 */
class NonResourcePolicyRule
{
    /** @var string[] */
    #[Kubernetes\Attribute('nonResourceURLs', required: true)]
    protected array $nonResourceURLs;

    /** @var string[] */
    #[Kubernetes\Attribute('verbs', required: true)]
    protected array $verbs;

    /**
     * @param string[] $nonResourceURLs
     * @param string[] $verbs
     */
    public function __construct(array $nonResourceURLs, array $verbs)
    {
        $this->nonResourceURLs = $nonResourceURLs;
        $this->verbs = $verbs;
    }

    /**
     * `nonResourceURLs` is a set of url prefixes that a user should have access to and may not be empty.
     * For example:
     *   - "/healthz" is legal
     *   - "/hea*" is illegal
     *   - "/hea" is legal but matches nothing
     *   - "/hea/*" also matches nothing
     *   - "/healthz/*" matches all per-component health checks.
     * "*" matches all non-resource urls. if it is present, it must be the only entry. Required.
     */
    public function getNonResourceURLs(): array
    {
        return $this->nonResourceURLs;
    }

    /**
     * `nonResourceURLs` is a set of url prefixes that a user should have access to and may not be empty.
     * For example:
     *   - "/healthz" is legal
     *   - "/hea*" is illegal
     *   - "/hea" is legal but matches nothing
     *   - "/hea/*" also matches nothing
     *   - "/healthz/*" matches all per-component health checks.
     * "*" matches all non-resource urls. if it is present, it must be the only entry. Required.
     *
     * @return static
     */
    public function setNonResourceURLs(array $nonResourceURLs): static
    {
        $this->nonResourceURLs = $nonResourceURLs;

        return $this;
    }

    /**
     * `verbs` is a list of matching verbs and may not be empty. "*" matches all verbs. If it is present,
     * it must be the only entry. Required.
     */
    public function getVerbs(): array
    {
        return $this->verbs;
    }

    /**
     * `verbs` is a list of matching verbs and may not be empty. "*" matches all verbs. If it is present,
     * it must be the only entry. Required.
     *
     * @return static
     */
    public function setVerbs(array $verbs): static
    {
        $this->verbs = $verbs;

        return $this;
    }
}
