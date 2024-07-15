<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Core\v1;

use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;

/**
 * NodeConfigSource specifies a source of node configuration. Exactly one subfield (excluding metadata)
 * must be non-nil. This API is deprecated since 1.22
 */
class NodeConfigSource
{
    #[Kubernetes\Attribute('configMap', type: AttributeType::Model, model: ConfigMapNodeConfigSource::class)]
    protected ConfigMapNodeConfigSource|null $configMap = null;

    public function __construct(ConfigMapNodeConfigSource|null $configMap = null)
    {
        $this->configMap = $configMap;
    }

    /**
     * ConfigMap is a reference to a Node's ConfigMap
     */
    public function getConfigMap(): ConfigMapNodeConfigSource|null
    {
        return $this->configMap;
    }

    /**
     * ConfigMap is a reference to a Node's ConfigMap
     *
     * @return static
     */
    public function setConfigMap(ConfigMapNodeConfigSource $configMap): static
    {
        $this->configMap = $configMap;

        return $this;
    }
}
