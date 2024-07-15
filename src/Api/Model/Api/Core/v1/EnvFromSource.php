<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Core\v1;

use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;

/**
 * EnvFromSource represents the source of a set of ConfigMaps
 */
class EnvFromSource
{
    #[Kubernetes\Attribute('configMapRef', type: AttributeType::Model, model: ConfigMapEnvSource::class)]
    protected ConfigMapEnvSource|null $configMapRef = null;

    #[Kubernetes\Attribute('prefix')]
    protected string|null $prefix = null;

    #[Kubernetes\Attribute('secretRef', type: AttributeType::Model, model: SecretEnvSource::class)]
    protected SecretEnvSource|null $secretRef = null;

    public function __construct(
        ConfigMapEnvSource|null $configMapRef = null,
        string|null $prefix = null,
        SecretEnvSource|null $secretRef = null,
    ) {
        $this->configMapRef = $configMapRef;
        $this->prefix = $prefix;
        $this->secretRef = $secretRef;
    }

    /**
     * The ConfigMap to select from
     */
    public function getConfigMapRef(): ConfigMapEnvSource|null
    {
        return $this->configMapRef;
    }

    /**
     * The ConfigMap to select from
     *
     * @return static
     */
    public function setConfigMapRef(ConfigMapEnvSource $configMapRef): static
    {
        $this->configMapRef = $configMapRef;

        return $this;
    }

    /**
     * An optional identifier to prepend to each key in the ConfigMap. Must be a C_IDENTIFIER.
     */
    public function getPrefix(): string|null
    {
        return $this->prefix;
    }

    /**
     * An optional identifier to prepend to each key in the ConfigMap. Must be a C_IDENTIFIER.
     *
     * @return static
     */
    public function setPrefix(string $prefix): static
    {
        $this->prefix = $prefix;

        return $this;
    }

    /**
     * The Secret to select from
     */
    public function getSecretRef(): SecretEnvSource|null
    {
        return $this->secretRef;
    }

    /**
     * The Secret to select from
     *
     * @return static
     */
    public function setSecretRef(SecretEnvSource $secretRef): static
    {
        $this->secretRef = $secretRef;

        return $this;
    }
}
