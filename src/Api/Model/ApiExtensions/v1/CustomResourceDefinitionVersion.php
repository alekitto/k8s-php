<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\ApiExtensions\v1;

use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;
use Kcs\K8s\Collection;

/**
 * CustomResourceDefinitionVersion describes a version for CRD.
 */
class CustomResourceDefinitionVersion
{
    /** @var iterable|CustomResourceColumnDefinition[]|null */
    #[Kubernetes\Attribute(
        'additionalPrinterColumns',
        type: AttributeType::Collection,
        model: CustomResourceColumnDefinition::class,
    )]
    protected $additionalPrinterColumns = null;

    #[Kubernetes\Attribute('deprecated')]
    protected bool|null $deprecated = null;

    #[Kubernetes\Attribute('deprecationWarning')]
    protected string|null $deprecationWarning = null;

    #[Kubernetes\Attribute('name', required: true)]
    protected string $name;

    #[Kubernetes\Attribute('schema', type: AttributeType::Model, model: CustomResourceValidation::class)]
    protected CustomResourceValidation|null $schema = null;

    /** @var iterable|SelectableField[]|null */
    #[Kubernetes\Attribute('selectableFields', type: AttributeType::Collection, model: SelectableField::class)]
    protected $selectableFields = null;

    #[Kubernetes\Attribute('served', required: true)]
    protected bool $served;

    #[Kubernetes\Attribute('storage', required: true)]
    protected bool $storage;

    #[Kubernetes\Attribute('subresources', type: AttributeType::Model, model: CustomResourceSubresources::class)]
    protected CustomResourceSubresources|null $subresources = null;

    public function __construct(string $name, bool $served, bool $storage)
    {
        $this->name = $name;
        $this->served = $served;
        $this->storage = $storage;
    }

    /**
     * additionalPrinterColumns specifies additional columns returned in Table output. See
     * https://kubernetes.io/docs/reference/using-api/api-concepts/#receiving-resources-as-tables for
     * details. If no columns are specified, a single column displaying the age of the custom resource is
     * used.
     *
     * @return iterable|CustomResourceColumnDefinition[]
     */
    public function getAdditionalPrinterColumns(): iterable|null
    {
        return $this->additionalPrinterColumns;
    }

    /**
     * additionalPrinterColumns specifies additional columns returned in Table output. See
     * https://kubernetes.io/docs/reference/using-api/api-concepts/#receiving-resources-as-tables for
     * details. If no columns are specified, a single column displaying the age of the custom resource is
     * used.
     *
     * @return static
     */
    public function setAdditionalPrinterColumns(iterable $additionalPrinterColumns): static
    {
        $this->additionalPrinterColumns = $additionalPrinterColumns;

        return $this;
    }

    /** @return static */
    public function addAdditionalPrinterColumns(CustomResourceColumnDefinition $additionalPrinterColumn): static
    {
        if (! $this->additionalPrinterColumns) {
            $this->additionalPrinterColumns = new Collection();
        }

        $this->additionalPrinterColumns[] = $additionalPrinterColumn;

        return $this;
    }

    /**
     * deprecated indicates this version of the custom resource API is deprecated. When set to true, API
     * requests to this version receive a warning header in the server response. Defaults to false.
     */
    public function isDeprecated(): bool|null
    {
        return $this->deprecated;
    }

    /**
     * deprecated indicates this version of the custom resource API is deprecated. When set to true, API
     * requests to this version receive a warning header in the server response. Defaults to false.
     *
     * @return static
     */
    public function setIsDeprecated(bool $deprecated): static
    {
        $this->deprecated = $deprecated;

        return $this;
    }

    /**
     * deprecationWarning overrides the default warning returned to API clients. May only be set when
     * `deprecated` is true. The default warning indicates this version is deprecated and recommends use of
     * the newest served version of equal or greater stability, if one exists.
     */
    public function getDeprecationWarning(): string|null
    {
        return $this->deprecationWarning;
    }

    /**
     * deprecationWarning overrides the default warning returned to API clients. May only be set when
     * `deprecated` is true. The default warning indicates this version is deprecated and recommends use of
     * the newest served version of equal or greater stability, if one exists.
     *
     * @return static
     */
    public function setDeprecationWarning(string $deprecationWarning): static
    {
        $this->deprecationWarning = $deprecationWarning;

        return $this;
    }

    /**
     * name is the version name, e.g. “v1”, “v2beta1”, etc. The custom resources are served under
     * this version at `/apis/<group>/<version>/...` if `served` is true.
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * name is the version name, e.g. “v1”, “v2beta1”, etc. The custom resources are served under
     * this version at `/apis/<group>/<version>/...` if `served` is true.
     *
     * @return static
     */
    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    /**
     * schema describes the schema used for validation, pruning, and defaulting of this version of the
     * custom resource.
     */
    public function getSchema(): CustomResourceValidation|null
    {
        return $this->schema;
    }

    /**
     * schema describes the schema used for validation, pruning, and defaulting of this version of the
     * custom resource.
     *
     * @return static
     */
    public function setSchema(CustomResourceValidation $schema): static
    {
        $this->schema = $schema;

        return $this;
    }

    /**
     * selectableFields specifies paths to fields that may be used as field selectors. A maximum of 8
     * selectable fields are allowed. See
     * https://kubernetes.io/docs/concepts/overview/working-with-objects/field-selectors
     *
     * @return iterable|SelectableField[]
     */
    public function getSelectableFields(): iterable|null
    {
        return $this->selectableFields;
    }

    /**
     * selectableFields specifies paths to fields that may be used as field selectors. A maximum of 8
     * selectable fields are allowed. See
     * https://kubernetes.io/docs/concepts/overview/working-with-objects/field-selectors
     *
     * @return static
     */
    public function setSelectableFields(iterable $selectableFields): static
    {
        $this->selectableFields = $selectableFields;

        return $this;
    }

    /** @return static */
    public function addSelectableFields(SelectableField $selectableField): static
    {
        if (! $this->selectableFields) {
            $this->selectableFields = new Collection();
        }

        $this->selectableFields[] = $selectableField;

        return $this;
    }

    /**
     * served is a flag enabling/disabling this version from being served via REST APIs
     */
    public function isServed(): bool
    {
        return $this->served;
    }

    /**
     * served is a flag enabling/disabling this version from being served via REST APIs
     *
     * @return static
     */
    public function setIsServed(bool $served): static
    {
        $this->served = $served;

        return $this;
    }

    /**
     * storage indicates this version should be used when persisting custom resources to storage. There
     * must be exactly one version with storage=true.
     */
    public function isStorage(): bool
    {
        return $this->storage;
    }

    /**
     * storage indicates this version should be used when persisting custom resources to storage. There
     * must be exactly one version with storage=true.
     *
     * @return static
     */
    public function setIsStorage(bool $storage): static
    {
        $this->storage = $storage;

        return $this;
    }

    /**
     * subresources specify what subresources this version of the defined custom resource have.
     */
    public function getSubresources(): CustomResourceSubresources|null
    {
        return $this->subresources;
    }

    /**
     * subresources specify what subresources this version of the defined custom resource have.
     *
     * @return static
     */
    public function setSubresources(CustomResourceSubresources $subresources): static
    {
        $this->subresources = $subresources;

        return $this;
    }
}
