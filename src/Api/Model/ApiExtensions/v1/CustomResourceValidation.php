<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\ApiExtensions\v1;

use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;

/**
 * CustomResourceValidation is a list of validation methods for CustomResources.
 */
class CustomResourceValidation
{
    #[Kubernetes\Attribute('openAPIV3Schema', type: AttributeType::Model, model: JSONSchemaProps::class)]
    protected JSONSchemaProps|null $openAPIV3Schema = null;

    public function __construct(JSONSchemaProps|null $openAPIV3Schema = null)
    {
        $this->openAPIV3Schema = $openAPIV3Schema;
    }

    /**
     * openAPIV3Schema is the OpenAPI v3 schema to use for validation and pruning.
     */
    public function getOpenAPIV3Schema(): JSONSchemaProps|null
    {
        return $this->openAPIV3Schema;
    }

    /**
     * openAPIV3Schema is the OpenAPI v3 schema to use for validation and pruning.
     *
     * @return static
     */
    public function setOpenAPIV3Schema(JSONSchemaProps $openAPIV3Schema): static
    {
        $this->openAPIV3Schema = $openAPIV3Schema;

        return $this;
    }
}
