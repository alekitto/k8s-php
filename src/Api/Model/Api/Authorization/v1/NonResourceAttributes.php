<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Authorization\v1;

use Kcs\K8s\Attribute as Kubernetes;

/**
 * NonResourceAttributes includes the authorization attributes available for non-resource requests to
 * the Authorizer interface
 */
class NonResourceAttributes
{
    #[Kubernetes\Attribute('path')]
    protected string|null $path = null;

    #[Kubernetes\Attribute('verb')]
    protected string|null $verb = null;

    public function __construct(string|null $path = null, string|null $verb = null)
    {
        $this->path = $path;
        $this->verb = $verb;
    }

    /**
     * Path is the URL path of the request
     */
    public function getPath(): string|null
    {
        return $this->path;
    }

    /**
     * Path is the URL path of the request
     *
     * @return static
     */
    public function setPath(string $path): static
    {
        $this->path = $path;

        return $this;
    }

    /**
     * Verb is the standard HTTP verb
     */
    public function getVerb(): string|null
    {
        return $this->verb;
    }

    /**
     * Verb is the standard HTTP verb
     *
     * @return static
     */
    public function setVerb(string $verb): static
    {
        $this->verb = $verb;

        return $this;
    }
}
