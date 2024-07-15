<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Core\v1;

use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;

/**
 * EnvVarSource represents a source for the value of an EnvVar.
 */
class EnvVarSource
{
    #[Kubernetes\Attribute('configMapKeyRef', type: AttributeType::Model, model: ConfigMapKeySelector::class)]
    protected ConfigMapKeySelector|null $configMapKeyRef = null;

    #[Kubernetes\Attribute('fieldRef', type: AttributeType::Model, model: ObjectFieldSelector::class)]
    protected ObjectFieldSelector|null $fieldRef = null;

    #[Kubernetes\Attribute('resourceFieldRef', type: AttributeType::Model, model: ResourceFieldSelector::class)]
    protected ResourceFieldSelector|null $resourceFieldRef = null;

    #[Kubernetes\Attribute('secretKeyRef', type: AttributeType::Model, model: SecretKeySelector::class)]
    protected SecretKeySelector|null $secretKeyRef = null;

    public function __construct(
        ConfigMapKeySelector|null $configMapKeyRef = null,
        ObjectFieldSelector|null $fieldRef = null,
        ResourceFieldSelector|null $resourceFieldRef = null,
        SecretKeySelector|null $secretKeyRef = null,
    ) {
        $this->configMapKeyRef = $configMapKeyRef;
        $this->fieldRef = $fieldRef;
        $this->resourceFieldRef = $resourceFieldRef;
        $this->secretKeyRef = $secretKeyRef;
    }

    /**
     * Selects a key of a ConfigMap.
     */
    public function getConfigMapKeyRef(): ConfigMapKeySelector|null
    {
        return $this->configMapKeyRef;
    }

    /**
     * Selects a key of a ConfigMap.
     *
     * @return static
     */
    public function setConfigMapKeyRef(ConfigMapKeySelector $configMapKeyRef): static
    {
        $this->configMapKeyRef = $configMapKeyRef;

        return $this;
    }

    /**
     * Selects a field of the pod: supports metadata.name, metadata.namespace, `metadata.labels['<KEY>']`,
     * `metadata.annotations['<KEY>']`, spec.nodeName, spec.serviceAccountName, status.hostIP,
     * status.podIP, status.podIPs.
     */
    public function getFieldRef(): ObjectFieldSelector|null
    {
        return $this->fieldRef;
    }

    /**
     * Selects a field of the pod: supports metadata.name, metadata.namespace, `metadata.labels['<KEY>']`,
     * `metadata.annotations['<KEY>']`, spec.nodeName, spec.serviceAccountName, status.hostIP,
     * status.podIP, status.podIPs.
     *
     * @return static
     */
    public function setFieldRef(ObjectFieldSelector $fieldRef): static
    {
        $this->fieldRef = $fieldRef;

        return $this;
    }

    /**
     * Selects a resource of the container: only resources limits and requests (limits.cpu, limits.memory,
     * limits.ephemeral-storage, requests.cpu, requests.memory and requests.ephemeral-storage) are
     * currently supported.
     */
    public function getResourceFieldRef(): ResourceFieldSelector|null
    {
        return $this->resourceFieldRef;
    }

    /**
     * Selects a resource of the container: only resources limits and requests (limits.cpu, limits.memory,
     * limits.ephemeral-storage, requests.cpu, requests.memory and requests.ephemeral-storage) are
     * currently supported.
     *
     * @return static
     */
    public function setResourceFieldRef(ResourceFieldSelector $resourceFieldRef): static
    {
        $this->resourceFieldRef = $resourceFieldRef;

        return $this;
    }

    /**
     * Selects a key of a secret in the pod's namespace
     */
    public function getSecretKeyRef(): SecretKeySelector|null
    {
        return $this->secretKeyRef;
    }

    /**
     * Selects a key of a secret in the pod's namespace
     *
     * @return static
     */
    public function setSecretKeyRef(SecretKeySelector $secretKeyRef): static
    {
        $this->secretKeyRef = $secretKeyRef;

        return $this;
    }
}
