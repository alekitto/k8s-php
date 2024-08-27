<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Authorization\v1;

use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;

/**
 * ResourceAttributes includes the authorization attributes available for resource requests to the
 * Authorizer interface
 */
class ResourceAttributes
{
    #[Kubernetes\Attribute('fieldSelector', type: AttributeType::Model, model: FieldSelectorAttributes::class)]
    protected FieldSelectorAttributes|null $fieldSelector = null;

    #[Kubernetes\Attribute('group')]
    protected string|null $group = null;

    #[Kubernetes\Attribute('labelSelector', type: AttributeType::Model, model: LabelSelectorAttributes::class)]
    protected LabelSelectorAttributes|null $labelSelector = null;

    #[Kubernetes\Attribute('name')]
    protected string|null $name = null;

    #[Kubernetes\Attribute('namespace')]
    protected string|null $namespace = null;

    #[Kubernetes\Attribute('resource')]
    protected string|null $resource = null;

    #[Kubernetes\Attribute('subresource')]
    protected string|null $subresource = null;

    #[Kubernetes\Attribute('verb')]
    protected string|null $verb = null;

    #[Kubernetes\Attribute('version')]
    protected string|null $version = null;

    /**
     * fieldSelector describes the limitation on access based on field.  It can only limit access, not
     * broaden it.
     *
     * This field  is alpha-level. To use this field, you must enable the `AuthorizeWithSelectors` feature
     * gate (disabled by default).
     */
    public function getFieldSelector(): FieldSelectorAttributes|null
    {
        return $this->fieldSelector;
    }

    /**
     * fieldSelector describes the limitation on access based on field.  It can only limit access, not
     * broaden it.
     *
     * This field  is alpha-level. To use this field, you must enable the `AuthorizeWithSelectors` feature
     * gate (disabled by default).
     *
     * @return static
     */
    public function setFieldSelector(FieldSelectorAttributes $fieldSelector): static
    {
        $this->fieldSelector = $fieldSelector;

        return $this;
    }

    /**
     * Group is the API Group of the Resource.  "*" means all.
     */
    public function getGroup(): string|null
    {
        return $this->group;
    }

    /**
     * Group is the API Group of the Resource.  "*" means all.
     *
     * @return static
     */
    public function setGroup(string $group): static
    {
        $this->group = $group;

        return $this;
    }

    /**
     * labelSelector describes the limitation on access based on labels.  It can only limit access, not
     * broaden it.
     *
     * This field  is alpha-level. To use this field, you must enable the `AuthorizeWithSelectors` feature
     * gate (disabled by default).
     */
    public function getLabelSelector(): LabelSelectorAttributes|null
    {
        return $this->labelSelector;
    }

    /**
     * labelSelector describes the limitation on access based on labels.  It can only limit access, not
     * broaden it.
     *
     * This field  is alpha-level. To use this field, you must enable the `AuthorizeWithSelectors` feature
     * gate (disabled by default).
     *
     * @return static
     */
    public function setLabelSelector(LabelSelectorAttributes $labelSelector): static
    {
        $this->labelSelector = $labelSelector;

        return $this;
    }

    /**
     * Name is the name of the resource being requested for a "get" or deleted for a "delete". "" (empty)
     * means all.
     */
    public function getName(): string|null
    {
        return $this->name;
    }

    /**
     * Name is the name of the resource being requested for a "get" or deleted for a "delete". "" (empty)
     * means all.
     *
     * @return static
     */
    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Namespace is the namespace of the action being requested.  Currently, there is no distinction
     * between no namespace and all namespaces "" (empty) is defaulted for LocalSubjectAccessReviews ""
     * (empty) is empty for cluster-scoped resources "" (empty) means "all" for namespace scoped resources
     * from a SubjectAccessReview or SelfSubjectAccessReview
     */
    public function getNamespace(): string|null
    {
        return $this->namespace;
    }

    /**
     * Namespace is the namespace of the action being requested.  Currently, there is no distinction
     * between no namespace and all namespaces "" (empty) is defaulted for LocalSubjectAccessReviews ""
     * (empty) is empty for cluster-scoped resources "" (empty) means "all" for namespace scoped resources
     * from a SubjectAccessReview or SelfSubjectAccessReview
     *
     * @return static
     */
    public function setNamespace(string $namespace): static
    {
        $this->namespace = $namespace;

        return $this;
    }

    /**
     * Resource is one of the existing resource types.  "*" means all.
     */
    public function getResource(): string|null
    {
        return $this->resource;
    }

    /**
     * Resource is one of the existing resource types.  "*" means all.
     *
     * @return static
     */
    public function setResource(string $resource): static
    {
        $this->resource = $resource;

        return $this;
    }

    /**
     * Subresource is one of the existing resource types.  "" means none.
     */
    public function getSubresource(): string|null
    {
        return $this->subresource;
    }

    /**
     * Subresource is one of the existing resource types.  "" means none.
     *
     * @return static
     */
    public function setSubresource(string $subresource): static
    {
        $this->subresource = $subresource;

        return $this;
    }

    /**
     * Verb is a kubernetes resource API verb, like: get, list, watch, create, update, delete, proxy.  "*"
     * means all.
     */
    public function getVerb(): string|null
    {
        return $this->verb;
    }

    /**
     * Verb is a kubernetes resource API verb, like: get, list, watch, create, update, delete, proxy.  "*"
     * means all.
     *
     * @return static
     */
    public function setVerb(string $verb): static
    {
        $this->verb = $verb;

        return $this;
    }

    /**
     * Version is the API Version of the Resource.  "*" means all.
     */
    public function getVersion(): string|null
    {
        return $this->version;
    }

    /**
     * Version is the API Version of the Resource.  "*" means all.
     *
     * @return static
     */
    public function setVersion(string $version): static
    {
        $this->version = $version;

        return $this;
    }
}
