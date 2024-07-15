<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\ApiExtensions\v1;

use Kcs\K8s\Attribute as Kubernetes;

/**
 * SelectableField specifies the JSON path of a field that may be used with field selectors.
 */
class SelectableField
{
    #[Kubernetes\Attribute('jsonPath', required: true)]
    protected string $jsonPath;

    public function __construct(string $jsonPath)
    {
        $this->jsonPath = $jsonPath;
    }

    /**
     * jsonPath is a simple JSON path which is evaluated against each custom resource to produce a field
     * selector value. Only JSON paths without the array notation are allowed. Must point to a field of
     * type string, boolean or integer. Types with enum values and strings with formats are allowed. If
     * jsonPath refers to absent field in a resource, the jsonPath evaluates to an empty string. Must not
     * point to metdata fields. Required.
     */
    public function getJsonPath(): string
    {
        return $this->jsonPath;
    }

    /**
     * jsonPath is a simple JSON path which is evaluated against each custom resource to produce a field
     * selector value. Only JSON paths without the array notation are allowed. Must point to a field of
     * type string, boolean or integer. Types with enum values and strings with formats are allowed. If
     * jsonPath refers to absent field in a resource, the jsonPath evaluates to an empty string. Must not
     * point to metdata fields. Required.
     *
     * @return static
     */
    public function setJsonPath(string $jsonPath): static
    {
        $this->jsonPath = $jsonPath;

        return $this;
    }
}
