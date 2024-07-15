<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\ApiMachinery\Apis\Meta\v1;

use Kcs\K8s\Attribute as Kubernetes;

/**
 * APIResource specifies the name of a resource and whether it is namespaced.
 */
class APIResource
{
    /** @var string[]|null */
    #[Kubernetes\Attribute('categories')]
    protected array|null $categories = null;

    #[Kubernetes\Attribute('group')]
    protected string|null $group = null;

    #[Kubernetes\Attribute('kind', required: true)]
    protected string $kind;

    #[Kubernetes\Attribute('name', required: true)]
    protected string $name;

    #[Kubernetes\Attribute('namespaced', required: true)]
    protected bool $namespaced;

    /** @var string[]|null */
    #[Kubernetes\Attribute('shortNames')]
    protected array|null $shortNames = null;

    #[Kubernetes\Attribute('singularName', required: true)]
    protected string $singularName;

    #[Kubernetes\Attribute('storageVersionHash')]
    protected string|null $storageVersionHash = null;

    /** @var string[] */
    #[Kubernetes\Attribute('verbs', required: true)]
    protected array $verbs;

    #[Kubernetes\Attribute('version')]
    protected string|null $version = null;

    /** @param string[] $verbs */
    public function __construct(string $kind, string $name, bool $namespaced, string $singularName, array $verbs)
    {
        $this->kind = $kind;
        $this->name = $name;
        $this->namespaced = $namespaced;
        $this->singularName = $singularName;
        $this->verbs = $verbs;
    }

    /**
     * categories is a list of the grouped resources this resource belongs to (e.g. 'all')
     */
    public function getCategories(): array|null
    {
        return $this->categories;
    }

    /**
     * categories is a list of the grouped resources this resource belongs to (e.g. 'all')
     *
     * @return static
     */
    public function setCategories(array $categories): static
    {
        $this->categories = $categories;

        return $this;
    }

    /**
     * group is the preferred group of the resource.  Empty implies the group of the containing resource
     * list. For subresources, this may have a different value, for example: Scale".
     */
    public function getGroup(): string|null
    {
        return $this->group;
    }

    /**
     * group is the preferred group of the resource.  Empty implies the group of the containing resource
     * list. For subresources, this may have a different value, for example: Scale".
     *
     * @return static
     */
    public function setGroup(string $group): static
    {
        $this->group = $group;

        return $this;
    }

    /**
     * kind is the kind for the resource (e.g. 'Foo' is the kind for a resource 'foo')
     */
    public function getKind(): string
    {
        return $this->kind;
    }

    /**
     * kind is the kind for the resource (e.g. 'Foo' is the kind for a resource 'foo')
     *
     * @return static
     */
    public function setKind(string $kind): static
    {
        $this->kind = $kind;

        return $this;
    }

    /**
     * name is the plural name of the resource.
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * name is the plural name of the resource.
     *
     * @return static
     */
    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    /**
     * namespaced indicates if a resource is namespaced or not.
     */
    public function isNamespaced(): bool
    {
        return $this->namespaced;
    }

    /**
     * namespaced indicates if a resource is namespaced or not.
     *
     * @return static
     */
    public function setIsNamespaced(bool $namespaced): static
    {
        $this->namespaced = $namespaced;

        return $this;
    }

    /**
     * shortNames is a list of suggested short names of the resource.
     */
    public function getShortNames(): array|null
    {
        return $this->shortNames;
    }

    /**
     * shortNames is a list of suggested short names of the resource.
     *
     * @return static
     */
    public function setShortNames(array $shortNames): static
    {
        $this->shortNames = $shortNames;

        return $this;
    }

    /**
     * singularName is the singular name of the resource.  This allows clients to handle plural and
     * singular opaquely. The singularName is more correct for reporting status on a single item and both
     * singular and plural are allowed from the kubectl CLI interface.
     */
    public function getSingularName(): string
    {
        return $this->singularName;
    }

    /**
     * singularName is the singular name of the resource.  This allows clients to handle plural and
     * singular opaquely. The singularName is more correct for reporting status on a single item and both
     * singular and plural are allowed from the kubectl CLI interface.
     *
     * @return static
     */
    public function setSingularName(string $singularName): static
    {
        $this->singularName = $singularName;

        return $this;
    }

    /**
     * The hash value of the storage version, the version this resource is converted to when written to the
     * data store. Value must be treated as opaque by clients. Only equality comparison on the value is
     * valid. This is an alpha feature and may change or be removed in the future. The field is populated
     * by the apiserver only if the StorageVersionHash feature gate is enabled. This field will remain
     * optional even if it graduates.
     */
    public function getStorageVersionHash(): string|null
    {
        return $this->storageVersionHash;
    }

    /**
     * The hash value of the storage version, the version this resource is converted to when written to the
     * data store. Value must be treated as opaque by clients. Only equality comparison on the value is
     * valid. This is an alpha feature and may change or be removed in the future. The field is populated
     * by the apiserver only if the StorageVersionHash feature gate is enabled. This field will remain
     * optional even if it graduates.
     *
     * @return static
     */
    public function setStorageVersionHash(string $storageVersionHash): static
    {
        $this->storageVersionHash = $storageVersionHash;

        return $this;
    }

    /**
     * verbs is a list of supported kube verbs (this includes get, list, watch, create, update, patch,
     * delete, deletecollection, and proxy)
     */
    public function getVerbs(): array
    {
        return $this->verbs;
    }

    /**
     * verbs is a list of supported kube verbs (this includes get, list, watch, create, update, patch,
     * delete, deletecollection, and proxy)
     *
     * @return static
     */
    public function setVerbs(array $verbs): static
    {
        $this->verbs = $verbs;

        return $this;
    }

    /**
     * version is the preferred version of the resource.  Empty implies the version of the containing
     * resource list For subresources, this may have a different value, for example: v1 (while inside a
     * v1beta1 version of the core resource's group)".
     */
    public function getVersion(): string|null
    {
        return $this->version;
    }

    /**
     * version is the preferred version of the resource.  Empty implies the version of the containing
     * resource list For subresources, this may have a different value, for example: v1 (while inside a
     * v1beta1 version of the core resource's group)".
     *
     * @return static
     */
    public function setVersion(string $version): static
    {
        $this->version = $version;

        return $this;
    }
}
