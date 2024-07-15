<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Storage\v1;

use Kcs\K8s\Attribute as Kubernetes;

/**
 * TokenRequest contains parameters of a service account token.
 */
class TokenRequest
{
    #[Kubernetes\Attribute('audience', required: true)]
    protected string $audience;

    #[Kubernetes\Attribute('expirationSeconds')]
    protected int|null $expirationSeconds = null;

    public function __construct(string $audience)
    {
        $this->audience = $audience;
    }

    /**
     * audience is the intended audience of the token in "TokenRequestSpec". It will default to the
     * audiences of kube apiserver.
     */
    public function getAudience(): string
    {
        return $this->audience;
    }

    /**
     * audience is the intended audience of the token in "TokenRequestSpec". It will default to the
     * audiences of kube apiserver.
     *
     * @return static
     */
    public function setAudience(string $audience): static
    {
        $this->audience = $audience;

        return $this;
    }

    /**
     * expirationSeconds is the duration of validity of the token in "TokenRequestSpec". It has the same
     * default value of "ExpirationSeconds" in "TokenRequestSpec".
     */
    public function getExpirationSeconds(): int|null
    {
        return $this->expirationSeconds;
    }

    /**
     * expirationSeconds is the duration of validity of the token in "TokenRequestSpec". It has the same
     * default value of "ExpirationSeconds" in "TokenRequestSpec".
     *
     * @return static
     */
    public function setExpirationSeconds(int $expirationSeconds): static
    {
        $this->expirationSeconds = $expirationSeconds;

        return $this;
    }
}
