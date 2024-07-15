<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\ApiExtensions\v1;

use Kcs\K8s\Attribute as Kubernetes;

/**
 * ExternalDocumentation allows referencing an external resource for extended documentation.
 */
class ExternalDocumentation
{
    #[Kubernetes\Attribute('description')]
    protected string|null $description = null;

    #[Kubernetes\Attribute('url')]
    protected string|null $url = null;

    public function __construct(string|null $description = null, string|null $url = null)
    {
        $this->description = $description;
        $this->url = $url;
    }

    public function getDescription(): string|null
    {
        return $this->description;
    }

    /** @return static */
    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getUrl(): string|null
    {
        return $this->url;
    }

    /** @return static */
    public function setUrl(string $url): static
    {
        $this->url = $url;

        return $this;
    }
}
