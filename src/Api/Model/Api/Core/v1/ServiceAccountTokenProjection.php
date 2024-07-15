<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Core\v1;

use Kcs\K8s\Attribute as Kubernetes;

/**
 * ServiceAccountTokenProjection represents a projected service account token volume. This projection
 * can be used to insert a service account token into the pods runtime filesystem for use against APIs
 * (Kubernetes API Server or otherwise).
 */
class ServiceAccountTokenProjection
{
    #[Kubernetes\Attribute('audience')]
    protected string|null $audience = null;

    #[Kubernetes\Attribute('expirationSeconds')]
    protected int|null $expirationSeconds = null;

    #[Kubernetes\Attribute('path', required: true)]
    protected string $path;

    public function __construct(string $path)
    {
        $this->path = $path;
    }

    /**
     * audience is the intended audience of the token. A recipient of a token must identify itself with an
     * identifier specified in the audience of the token, and otherwise should reject the token. The
     * audience defaults to the identifier of the apiserver.
     */
    public function getAudience(): string|null
    {
        return $this->audience;
    }

    /**
     * audience is the intended audience of the token. A recipient of a token must identify itself with an
     * identifier specified in the audience of the token, and otherwise should reject the token. The
     * audience defaults to the identifier of the apiserver.
     *
     * @return static
     */
    public function setAudience(string $audience): static
    {
        $this->audience = $audience;

        return $this;
    }

    /**
     * expirationSeconds is the requested duration of validity of the service account token. As the token
     * approaches expiration, the kubelet volume plugin will proactively rotate the service account token.
     * The kubelet will start trying to rotate the token if the token is older than 80 percent of its time
     * to live or if the token is older than 24 hours.Defaults to 1 hour and must be at least 10 minutes.
     */
    public function getExpirationSeconds(): int|null
    {
        return $this->expirationSeconds;
    }

    /**
     * expirationSeconds is the requested duration of validity of the service account token. As the token
     * approaches expiration, the kubelet volume plugin will proactively rotate the service account token.
     * The kubelet will start trying to rotate the token if the token is older than 80 percent of its time
     * to live or if the token is older than 24 hours.Defaults to 1 hour and must be at least 10 minutes.
     *
     * @return static
     */
    public function setExpirationSeconds(int $expirationSeconds): static
    {
        $this->expirationSeconds = $expirationSeconds;

        return $this;
    }

    /**
     * path is the path relative to the mount point of the file to project the token into.
     */
    public function getPath(): string
    {
        return $this->path;
    }

    /**
     * path is the path relative to the mount point of the file to project the token into.
     *
     * @return static
     */
    public function setPath(string $path): static
    {
        $this->path = $path;

        return $this;
    }
}
