<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Authentication\v1;

use DateTimeInterface;
use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;

/**
 * TokenRequestStatus is the result of a token request.
 */
class TokenRequestStatus
{
    #[Kubernetes\Attribute('expirationTimestamp', type: AttributeType::DateTime, required: true)]
    protected DateTimeInterface $expirationTimestamp;

    #[Kubernetes\Attribute('token', required: true)]
    protected string $token;

    public function __construct(DateTimeInterface $expirationTimestamp, string $token)
    {
        $this->expirationTimestamp = $expirationTimestamp;
        $this->token = $token;
    }

    /**
     * ExpirationTimestamp is the time of expiration of the returned token.
     */
    public function getExpirationTimestamp(): DateTimeInterface
    {
        return $this->expirationTimestamp;
    }

    /**
     * ExpirationTimestamp is the time of expiration of the returned token.
     *
     * @return static
     */
    public function setExpirationTimestamp(DateTimeInterface $expirationTimestamp): static
    {
        $this->expirationTimestamp = $expirationTimestamp;

        return $this;
    }

    /**
     * Token is the opaque bearer token.
     */
    public function getToken(): string
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
