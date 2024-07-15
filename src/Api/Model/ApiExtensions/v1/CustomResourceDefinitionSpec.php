<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\ApiExtensions\v1;

use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;
use Kcs\K8s\Collection;

/**
 * CustomResourceDefinitionSpec describes how a user wants their resource to appear
 */
class CustomResourceDefinitionSpec
{
    #[Kubernetes\Attribute('conversion', type: AttributeType::Model, model: CustomResourceConversion::class)]
    protected CustomResourceConversion|null $conversion = null;

    #[Kubernetes\Attribute('group', required: true)]
    protected string $group;

    #[Kubernetes\Attribute('names', type: AttributeType::Model, model: CustomResourceDefinitionNames::class, required: true)]
    protected CustomResourceDefinitionNames $names;

    #[Kubernetes\Attribute('preserveUnknownFields')]
    protected bool|null $preserveUnknownFields = null;

    #[Kubernetes\Attribute('scope', required: true)]
    protected string $scope;

    /** @var iterable|CustomResourceDefinitionVersion[] */
    #[Kubernetes\Attribute(
        'versions',
        type: AttributeType::Collection,
        model: CustomResourceDefinitionVersion::class,
        required: true,
    )]
    protected iterable $versions;

    /** @param iterable|CustomResourceDefinitionVersion[] $versions */
    public function __construct(
        string $group,
        CustomResourceDefinitionNames $names,
        string $scope,
        iterable $versions,
    ) {
        $this->group = $group;
        $this->names = $names;
        $this->scope = $scope;
        $this->versions = new Collection($versions);
    }

    /**
     * conversion defines conversion settings for the CRD.
     */
    public function getConversion(): CustomResourceConversion|null
    {
        return $this->conversion;
    }

    /**
     * conversion defines conversion settings for the CRD.
     *
     * @return static
     */
    public function setConversion(CustomResourceConversion $conversion): static
    {
        $this->conversion = $conversion;

        return $this;
    }

    /**
     * group is the API group of the defined custom resource. The custom resources are served under
     * `/apis/<group>/...`. Must match the name of the CustomResourceDefinition (in the form
     * `<names.plural>.<group>`).
     */
    public function getGroup(): string
    {
        return $this->group;
    }

    /**
     * group is the API group of the defined custom resource. The custom resources are served under
     * `/apis/<group>/...`. Must match the name of the CustomResourceDefinition (in the form
     * `<names.plural>.<group>`).
     *
     * @return static
     */
    public function setGroup(string $group): static
    {
        $this->group = $group;

        return $this;
    }

    /**
     * names specify the resource and kind names for the custom resource.
     */
    public function getNames(): CustomResourceDefinitionNames
    {
        return $this->names;
    }

    /**
     * names specify the resource and kind names for the custom resource.
     *
     * @return static
     */
    public function setNames(CustomResourceDefinitionNames $names): static
    {
        $this->names = $names;

        return $this;
    }

    /**
     * preserveUnknownFields indicates that object fields which are not specified in the OpenAPI schema
     * should be preserved when persisting to storage. apiVersion, kind, metadata and known fields inside
     * metadata are always preserved. This field is deprecated in favor of setting
     * `x-preserve-unknown-fields` to true in `spec.versions[*].schema.openAPIV3Schema`. See
     * https://kubernetes.io/docs/tasks/extend-kubernetes/custom-resources/custom-resource-definitions/#field-pruning
     * for details.
     */
    public function isPreserveUnknownFields(): bool|null
    {
        return $this->preserveUnknownFields;
    }

    /**
     * preserveUnknownFields indicates that object fields which are not specified in the OpenAPI schema
     * should be preserved when persisting to storage. apiVersion, kind, metadata and known fields inside
     * metadata are always preserved. This field is deprecated in favor of setting
     * `x-preserve-unknown-fields` to true in `spec.versions[*].schema.openAPIV3Schema`. See
     * https://kubernetes.io/docs/tasks/extend-kubernetes/custom-resources/custom-resource-definitions/#field-pruning
     * for details.
     *
     * @return static
     */
    public function setIsPreserveUnknownFields(bool $preserveUnknownFields): static
    {
        $this->preserveUnknownFields = $preserveUnknownFields;

        return $this;
    }

    /**
     * scope indicates whether the defined custom resource is cluster- or namespace-scoped. Allowed values
     * are `Cluster` and `Namespaced`.
     */
    public function getScope(): string
    {
        return $this->scope;
    }

    /**
     * scope indicates whether the defined custom resource is cluster- or namespace-scoped. Allowed values
     * are `Cluster` and `Namespaced`.
     *
     * @return static
     */
    public function setScope(string $scope): static
    {
        $this->scope = $scope;

        return $this;
    }

    /**
     * versions is the list of all API versions of the defined custom resource. Version names are used to
     * compute the order in which served versions are listed in API discovery. If the version string is
     * "kube-like", it will sort above non "kube-like" version strings, which are ordered
     * lexicographically. "Kube-like" versions start with a "v", then are followed by a number (the major
     * version), then optionally the string "alpha" or "beta" and another number (the minor version). These
     * are sorted first by GA > beta > alpha (where GA is a version with no suffix such as beta or alpha),
     * and then by comparing major version, then minor version. An example sorted list of versions: v10,
     * v2, v1, v11beta2, v10beta3, v3beta1, v12alpha1, v11alpha2, foo1, foo10.
     *
     * @return iterable|CustomResourceDefinitionVersion[]
     */
    public function getVersions(): iterable
    {
        return $this->versions;
    }

    /**
     * versions is the list of all API versions of the defined custom resource. Version names are used to
     * compute the order in which served versions are listed in API discovery. If the version string is
     * "kube-like", it will sort above non "kube-like" version strings, which are ordered
     * lexicographically. "Kube-like" versions start with a "v", then are followed by a number (the major
     * version), then optionally the string "alpha" or "beta" and another number (the minor version). These
     * are sorted first by GA > beta > alpha (where GA is a version with no suffix such as beta or alpha),
     * and then by comparing major version, then minor version. An example sorted list of versions: v10,
     * v2, v1, v11beta2, v10beta3, v3beta1, v12alpha1, v11alpha2, foo1, foo10.
     *
     * @return static
     */
    public function setVersions(iterable $versions): static
    {
        $this->versions = $versions;

        return $this;
    }

    /** @return static */
    public function addVersions(CustomResourceDefinitionVersion $version): static
    {
        if (! $this->versions) {
            $this->versions = new Collection();
        }

        $this->versions[] = $version;

        return $this;
    }
}
