<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Authentication\v1;

use Kcs\K8s\Attribute as Kubernetes;

/**
 * TokenReviewSpec is a description of the token authentication request.
 */
class TokenReviewSpec
{
    /** @var string[]|null */
    #[Kubernetes\Attribute('audiences')]
    protected array|null $audiences = null;

    #[Kubernetes\Attribute('token')]
    protected string|null $token = null;

    /** @param string[]|null $audiences */
    public function __construct(array|null $audiences = null, string|null $token = null)
    {
        $this->audiences = $audiences;
        $this->token = $token;
    }

    /**
     * Audiences is a list of the identifiers that the resource server presented with the token identifies
     * as. Audience-aware token authenticators will verify that the token was intended for at least one of
     * the audiences in this list. If no audiences are provided, the audience will default to the audience
     * of the Kubernetes apiserver.
     */
    public function getAudiences(): array|null
    {
        return $this->audiences;
    }

    /**
     * Audiences is a list of the identifiers that the resource server presented with the token identifies
     * as. Audience-aware token authenticators will verify that the token was intended for at least one of
     * the audiences in this list. If no audiences are provided, the audience will default to the audience
     * of the Kubernetes apiserver.
     *
     * @return static
     */
    public function setAudiences(array $audiences): static
    {
        $this->audiences = $audiences;

        return $this;
    }

    /**
     * Token is the opaque bearer token.
     */
    public function getToken(): string|null
    {
        return $this->token;
    }

    /**
     * Token is the opaque bearer token.
     *
     * @return static
     */
    public function setToken(string $token): static
    {
        $this->token = $token;

        return $this;
    }
}
