<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Authentication\v1;

use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;

/**
 * TokenRequestSpec contains client provided parameters of a token request.
 */
class TokenRequestSpec
{
    /** @var string[] */
    #[Kubernetes\Attribute('audiences', required: true)]
    protected array $audiences;

    #[Kubernetes\Attribute('boundObjectRef', type: AttributeType::Model, model: BoundObjectReference::class)]
    protected BoundObjectReference|null $boundObjectRef = null;

    #[Kubernetes\Attribute('expirationSeconds')]
    protected int|null $expirationSeconds = null;

    /** @param string[] $audiences */
    public function __construct(array $audiences)
    {
        $this->audiences = $audiences;
    }

    /**
     * Audiences are the intendend audiences of the token. A recipient of a token must identify themself
     * with an identifier in the list of audiences of the token, and otherwise should reject the token. A
     * token issued for multiple audiences may be used to authenticate against any of the audiences listed
     * but implies a high degree of trust between the target audiences.
     */
    public function getAudiences(): array
    {
        return $this->audiences;
    }

    /**
     * Audiences are the intendend audiences of the token. A recipient of a token must identify themself
     * with an identifier in the list of audiences of the token, and otherwise should reject the token. A
     * token issued for multiple audiences may be used to authenticate against any of the audiences listed
     * but implies a high degree of trust between the target audiences.
     *
     * @return static
     */
    public function setAudiences(array $audiences): static
    {
        $this->audiences = $audiences;

        return $this;
    }

    /**
     * BoundObjectRef is a reference to an object that the token will be bound to. The token will only be
     * valid for as long as the bound object exists. NOTE: The API server's TokenReview endpoint will
     * validate the BoundObjectRef, but other audiences may not. Keep ExpirationSeconds small if you want
     * prompt revocation.
     */
    public function getBoundObjectRef(): BoundObjectReference|null
    {
        return $this->boundObjectRef;
    }

    /**
     * BoundObjectRef is a reference to an object that the token will be bound to. The token will only be
     * valid for as long as the bound object exists. NOTE: The API server's TokenReview endpoint will
     * validate the BoundObjectRef, but other audiences may not. Keep ExpirationSeconds small if you want
     * prompt revocation.
     *
     * @return static
     */
    public function setBoundObjectRef(BoundObjectReference $boundObjectRef): static
    {
        $this->boundObjectRef = $boundObjectRef;

        return $this;
    }

    /**
     * ExpirationSeconds is the requested duration of validity of the request. The token issuer may return
     * a token with a different validity duration so a client needs to check the 'expiration' field in a
     * response.
     */
    public function getExpirationSeconds(): int|null
    {
        return $this->expirationSeconds;
    }

    /**
     * ExpirationSeconds is the requested duration of validity of the request. The token issuer may return
     * a token with a different validity duration so a client needs to check the 'expiration' field in a
     * response.
     *
     * @return static
     */
    public function setExpirationSeconds(int $expirationSeconds): static
    {
        $this->expirationSeconds = $expirationSeconds;

        return $this;
    }
}
