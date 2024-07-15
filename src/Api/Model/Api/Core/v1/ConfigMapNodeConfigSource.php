<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Core\v1;

use Kcs\K8s\Attribute as Kubernetes;

/**
 * ConfigMapNodeConfigSource contains the information to reference a ConfigMap as a config source for
 * the Node. This API is deprecated since 1.22:
 * https://git.k8s.io/enhancements/keps/sig-node/281-dynamic-kubelet-configuration
 */
class ConfigMapNodeConfigSource
{
    #[Kubernetes\Attribute('kubeletConfigKey', required: true)]
    protected string $kubeletConfigKey;

    #[Kubernetes\Attribute('name', required: true)]
    protected string $name;

    #[Kubernetes\Attribute('namespace', required: true)]
    protected string $namespace;

    #[Kubernetes\Attribute('resourceVersion')]
    protected string|null $resourceVersion = null;

    #[Kubernetes\Attribute('uid')]
    protected string|null $uid = null;

    public function __construct(string $kubeletConfigKey, string $name, string $namespace)
    {
        $this->kubeletConfigKey = $kubeletConfigKey;
        $this->name = $name;
        $this->namespace = $namespace;
    }

    /**
     * KubeletConfigKey declares which key of the referenced ConfigMap corresponds to the
     * KubeletConfiguration structure This field is required in all cases.
     */
    public function getKubeletConfigKey(): string
    {
        return $this->kubeletConfigKey;
    }

    /**
     * KubeletConfigKey declares which key of the referenced ConfigMap corresponds to the
     * KubeletConfiguration structure This field is required in all cases.
     *
     * @return static
     */
    public function setKubeletConfigKey(string $kubeletConfigKey): static
    {
        $this->kubeletConfigKey = $kubeletConfigKey;

        return $this;
    }

    /**
     * Name is the metadata.name of the referenced ConfigMap. This field is required in all cases.
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Name is the metadata.name of the referenced ConfigMap. This field is required in all cases.
     *
     * @return static
     */
    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Namespace is the metadata.namespace of the referenced ConfigMap. This field is required in all
     * cases.
     */
    public function getNamespace(): string
    {
        return $this->namespace;
    }

    /**
     * Namespace is the metadata.namespace of the referenced ConfigMap. This field is required in all
     * cases.
     *
     * @return static
     */
    public function setNamespace(string $namespace): static
    {
        $this->namespace = $namespace;

        return $this;
    }

    /**
     * ResourceVersion is the metadata.ResourceVersion of the referenced ConfigMap. This field is forbidden
     * in Node.Spec, and required in Node.Status.
     */
    public function getResourceVersion(): string|null
    {
        return $this->resourceVersion;
    }

    /**
     * ResourceVersion is the metadata.ResourceVersion of the referenced ConfigMap. This field is forbidden
     * in Node.Spec, and required in Node.Status.
     *
     * @return static
     */
    public function setResourceVersion(string $resourceVersion): static
    {
        $this->resourceVersion = $resourceVersion;

        return $this;
    }

    /**
     * UID is the metadata.UID of the referenced ConfigMap. This field is forbidden in Node.Spec, and
     * required in Node.Status.
     */
    public function getUid(): string|null
    {
        return $this->uid;
    }

    /**
     * UID is the metadata.UID of the referenced ConfigMap. This field is forbidden in Node.Spec, and
     * required in Node.Status.
     *
     * @return static
     */
    public function setUid(string $uid): static
    {
        $this->uid = $uid;

        return $this;
    }
}
