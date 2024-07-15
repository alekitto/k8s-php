<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Core\v1;

use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;

/**
 * DownwardAPIVolumeFile represents information to create the file containing the pod field
 */
class DownwardAPIVolumeFile
{
    #[Kubernetes\Attribute('fieldRef', type: AttributeType::Model, model: ObjectFieldSelector::class)]
    protected ObjectFieldSelector|null $fieldRef = null;

    #[Kubernetes\Attribute('mode')]
    protected int|null $mode = null;

    #[Kubernetes\Attribute('path', required: true)]
    protected string $path;

    #[Kubernetes\Attribute('resourceFieldRef', type: AttributeType::Model, model: ResourceFieldSelector::class)]
    protected ResourceFieldSelector|null $resourceFieldRef = null;

    public function __construct(string $path)
    {
        $this->path = $path;
    }

    /**
     * Required: Selects a field of the pod: only annotations, labels, name, namespace and uid are
     * supported.
     */
    public function getFieldRef(): ObjectFieldSelector|null
    {
        return $this->fieldRef;
    }

    /**
     * Required: Selects a field of the pod: only annotations, labels, name, namespace and uid are
     * supported.
     *
     * @return static
     */
    public function setFieldRef(ObjectFieldSelector $fieldRef): static
    {
        $this->fieldRef = $fieldRef;

        return $this;
    }

    /**
     * Optional: mode bits used to set permissions on this file, must be an octal value between 0000 and
     * 0777 or a decimal value between 0 and 511. YAML accepts both octal and decimal values, JSON requires
     * decimal values for mode bits. If not specified, the volume defaultMode will be used. This might be
     * in conflict with other options that affect the file mode, like fsGroup, and the result can be other
     * mode bits set.
     */
    public function getMode(): int|null
    {
        return $this->mode;
    }

    /**
     * Optional: mode bits used to set permissions on this file, must be an octal value between 0000 and
     * 0777 or a decimal value between 0 and 511. YAML accepts both octal and decimal values, JSON requires
     * decimal values for mode bits. If not specified, the volume defaultMode will be used. This might be
     * in conflict with other options that affect the file mode, like fsGroup, and the result can be other
     * mode bits set.
     *
     * @return static
     */
    public function setMode(int $mode): static
    {
        $this->mode = $mode;

        return $this;
    }

    /**
     * Required: Path is  the relative path name of the file to be created. Must not be absolute or contain
     * the '..' path. Must be utf-8 encoded. The first item of the relative path must not start with '..'
     */
    public function getPath(): string
    {
        return $this->path;
    }

    /**
     * Required: Path is  the relative path name of the file to be created. Must not be absolute or contain
     * the '..' path. Must be utf-8 encoded. The first item of the relative path must not start with '..'
     *
     * @return static
     */
    public function setPath(string $path): static
    {
        $this->path = $path;

        return $this;
    }

    /**
     * Selects a resource of the container: only resources limits and requests (limits.cpu, limits.memory,
     * requests.cpu and requests.memory) are currently supported.
     */
    public function getResourceFieldRef(): ResourceFieldSelector|null
    {
        return $this->resourceFieldRef;
    }

    /**
     * Selects a resource of the container: only resources limits and requests (limits.cpu, limits.memory,
     * requests.cpu and requests.memory) are currently supported.
     *
     * @return static
     */
    public function setResourceFieldRef(ResourceFieldSelector $resourceFieldRef): static
    {
        $this->resourceFieldRef = $resourceFieldRef;

        return $this;
    }
}
