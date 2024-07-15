<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Authentication\v1;

use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;

/**
 * TokenReviewStatus is the result of the token authentication request.
 */
class TokenReviewStatus
{
    /** @var string[]|null */
    #[Kubernetes\Attribute('audiences')]
    protected array|null $audiences = null;

    #[Kubernetes\Attribute('authenticated')]
    protected bool|null $authenticated = null;

    #[Kubernetes\Attribute('error')]
    protected string|null $error = null;

    #[Kubernetes\Attribute('user', type: AttributeType::Model, model: UserInfo::class)]
    protected UserInfo|null $user = null;

    /** @param string[]|null $audiences */
    public function __construct(
        array|null $audiences = null,
        bool|null $authenticated = null,
        string|null $error = null,
        UserInfo|null $user = null,
    ) {
        $this->audiences = $audiences;
        $this->authenticated = $authenticated;
        $this->error = $error;
        $this->user = $user;
    }

    /**
     * Audiences are audience identifiers chosen by the authenticator that are compatible with both the
     * TokenReview and token. An identifier is any identifier in the intersection of the TokenReviewSpec
     * audiences and the token's audiences. A client of the TokenReview API that sets the spec.audiences
     * field should validate that a compatible audience identifier is returned in the status.audiences
     * field to ensure that the TokenReview server is audience aware. If a TokenReview returns an empty
     * status.audience field where status.authenticated is "true", the token is valid against the audience
     * of the Kubernetes API server.
     */
    public function getAudiences(): array|null
    {
        return $this->audiences;
    }

    /**
     * Audiences are audience identifiers chosen by the authenticator that are compatible with both the
     * TokenReview and token. An identifier is any identifier in the intersection of the TokenReviewSpec
     * audiences and the token's audiences. A client of the TokenReview API that sets the spec.audiences
     * field should validate that a compatible audience identifier is returned in the status.audiences
     * field to ensure that the TokenReview server is audience aware. If a TokenReview returns an empty
     * status.audience field where status.authenticated is "true", the token is valid against the audience
     * of the Kubernetes API server.
     *
     * @return static
     */
    public function setAudiences(array $audiences): static
    {
        $this->audiences = $audiences;

        return $this;
    }

    /**
     * Authenticated indicates that the token was associated with a known user.
     */
    public function isAuthenticated(): bool|null
    {
        return $this->authenticated;
    }

    /**
     * Authenticated indicates that the token was associated with a known user.
     *
     * @return static
     */
    public function setIsAuthenticated(bool $authenticated): static
    {
        $this->authenticated = $authenticated;

        return $this;
    }

    /**
     * Error indicates that the token couldn't be checked
     */
    public function getError(): string|null
    {
        return $this->error;
    }

    /**
     * Error indicates that the token couldn't be checked
     *
     * @return static
     */
    public function setError(string $error): static
    {
        $this->error = $error;

        return $this;
    }

    /**
     * User is the UserInfo associated with the provided token.
     */
    public function getUser(): UserInfo|null
    {
        return $this->user;
    }

    /**
     * User is the UserInfo associated with the provided token.
     *
     * @return static
     */
    public function setUser(UserInfo $user): static
    {
        $this->user = $user;

        return $this;
    }
}
