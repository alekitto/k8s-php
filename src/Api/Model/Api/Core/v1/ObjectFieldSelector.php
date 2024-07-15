<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Core\v1;

use Kcs\K8s\Attribute as Kubernetes;

/**
 * ObjectFieldSelector selects an APIVersioned field of an object.
 */
class ObjectFieldSelector
{
    #[Kubernetes\Attribute('apiVersion')]
    protected string|null $apiVersion = '';

    #[Kubernetes\Attribute('fieldPath', required: true)]
    protected string $fieldPath;

    public function __construct(string $fieldPath)
    {
        $this->fieldPath = $fieldPath;
    }

    /**
     * Version of the schema the FieldPath is written in terms of, defaults to "v1".
     */
    public function getApiVersion(): string|null
    {
        return $this->apiVersion;
    }

    /**
     * Version of the schema the FieldPath is written in terms of, defaults to "v1".
     *
     * @return static
     */
    public function setApiVersion(string $apiVersion): static
    {
        $this->apiVersion = $apiVersion;

        return $this;
    }

    /**
     * Path of the field to select in the specified API version.
     */
    public function getFieldPath(): string
    {
        return $this->fieldPath;
    }

    /**
     * Path of the field to select in the specified API version.
     *
     * @return static
     */
    public function setFieldPath(string $fieldPath): static
    {
        $this->fieldPath = $fieldPath;

        return $this;
    }
}
