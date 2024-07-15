<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\ApiExtensions\v1;

use Kcs\K8s\Attribute as Kubernetes;

/**
 * CustomResourceDefinitionNames indicates the names to serve this CustomResourceDefinition
 */
class CustomResourceDefinitionNames
{
    /** @var string[]|null */
    #[Kubernetes\Attribute('categories')]
    protected array|null $categories = null;

    #[Kubernetes\Attribute('kind', required: true)]
    protected string $kind;

    #[Kubernetes\Attribute('listKind')]
    protected string|null $listKind = null;

    #[Kubernetes\Attribute('plural', required: true)]
    protected string $plural;

    /** @var string[]|null */
    #[Kubernetes\Attribute('shortNames')]
    protected array|null $shortNames = null;

    #[Kubernetes\Attribute('singular')]
    protected string|null $singular = null;

    public function __construct(string $kind, string $plural)
    {
        $this->kind = $kind;
        $this->plural = $plural;
    }

    /**
     * categories is a list of grouped resources this custom resource belongs to (e.g. 'all'). This is
     * published in API discovery documents, and used by clients to support invocations like `kubectl get
     * all`.
     */
    public function getCategories(): array|null
    {
        return $this->categories;
    }

    /**
     * categories is a list of grouped resources this custom resource belongs to (e.g. 'all'). This is
     * published in API discovery documents, and used by clients to support invocations like `kubectl get
     * all`.
     *
     * @return static
     */
    public function setCategories(array $categories): static
    {
        $this->categories = $categories;

        return $this;
    }

    /**
     * kind is the serialized kind of the resource. It is normally CamelCase and singular. Custom resource
     * instances will use this value as the `kind` attribute in API calls.
     */
    public function getKind(): string
    {
        return $this->kind;
    }

    /**
     * kind is the serialized kind of the resource. It is normally CamelCase and singular. Custom resource
     * instances will use this value as the `kind` attribute in API calls.
     *
     * @return static
     */
    public function setKind(string $kind): static
    {
        $this->kind = $kind;

        return $this;
    }

    /**
     * listKind is the serialized kind of the list for this resource. Defaults to "`kind`List".
     */
    public function getListKind(): string|null
    {
        return $this->listKind;
    }

    /**
     * listKind is the serialized kind of the list for this resource. Defaults to "`kind`List".
     *
     * @return static
     */
    public function setListKind(string $listKind): static
    {
        $this->listKind = $listKind;

        return $this;
    }

    /**
     * plural is the plural name of the resource to serve. The custom resources are served under
     * `/apis/<group>/<version>/.../<plural>`. Must match the name of the CustomResourceDefinition (in the
     * form `<names.plural>.<group>`). Must be all lowercase.
     */
    public function getPlural(): string
    {
        return $this->plural;
    }

    /**
     * plural is the plural name of the resource to serve. The custom resources are served under
     * `/apis/<group>/<version>/.../<plural>`. Must match the name of the CustomResourceDefinition (in the
     * form `<names.plural>.<group>`). Must be all lowercase.
     *
     * @return static
     */
    public function setPlural(string $plural): static
    {
        $this->plural = $plural;

        return $this;
    }

    /**
     * shortNames are short names for the resource, exposed in API discovery documents, and used by clients
     * to support invocations like `kubectl get <shortname>`. It must be all lowercase.
     */
    public function getShortNames(): array|null
    {
        return $this->shortNames;
    }

    /**
     * shortNames are short names for the resource, exposed in API discovery documents, and used by clients
     * to support invocations like `kubectl get <shortname>`. It must be all lowercase.
     *
     * @return static
     */
    public function setShortNames(array $shortNames): static
    {
        $this->shortNames = $shortNames;

        return $this;
    }

    /**
     * singular is the singular name of the resource. It must be all lowercase. Defaults to lowercased
     * `kind`.
     */
    public function getSingular(): string|null
    {
        return $this->singular;
    }

    /**
     * singular is the singular name of the resource. It must be all lowercase. Defaults to lowercased
     * `kind`.
     *
     * @return static
     */
    public function setSingular(string $singular): static
    {
        $this->singular = $singular;

        return $this;
    }
}
