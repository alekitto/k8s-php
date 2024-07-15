<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Core\v1;

use Kcs\K8s\Attribute as Kubernetes;

/**
 * Maps a string key to a path within a volume.
 */
class KeyToPath
{
    #[Kubernetes\Attribute('key', required: true)]
    protected string $key;

    #[Kubernetes\Attribute('mode')]
    protected int|null $mode = null;

    #[Kubernetes\Attribute('path', required: true)]
    protected string $path;

    public function __construct(string $key, string $path)
    {
        $this->key = $key;
        $this->path = $path;
    }

    /**
     * key is the key to project.
     */
    public function getKey(): string
    {
        return $this->key;
    }

    /**
     * key is the key to project.
     *
     * @return static
     */
    public function setKey(string $key): static
    {
        $this->key = $key;

        return $this;
    }

    /**
     * mode is Optional: mode bits used to set permissions on this file. Must be an octal value between
     * 0000 and 0777 or a decimal value between 0 and 511. YAML accepts both octal and decimal values, JSON
     * requires decimal values for mode bits. If not specified, the volume defaultMode will be used. This
     * might be in conflict with other options that affect the file mode, like fsGroup, and the result can
     * be other mode bits set.
     */
    public function getMode(): int|null
    {
        return $this->mode;
    }

    /**
     * mode is Optional: mode bits used to set permissions on this file. Must be an octal value between
     * 0000 and 0777 or a decimal value between 0 and 511. YAML accepts both octal and decimal values, JSON
     * requires decimal values for mode bits. If not specified, the volume defaultMode will be used. This
     * might be in conflict with other options that affect the file mode, like fsGroup, and the result can
     * be other mode bits set.
     *
     * @return static
     */
    public function setMode(int $mode): static
    {
        $this->mode = $mode;

        return $this;
    }

    /**
     * path is the relative path of the file to map the key to. May not be an absolute path. May not
     * contain the path element '..'. May not start with the string '..'.
     */
    public function getPath(): string
    {
        return $this->path;
    }

    /**
     * path is the relative path of the file to map the key to. May not be an absolute path. May not
     * contain the path element '..'. May not start with the string '..'.
     *
     * @return static
     */
    public function setPath(string $path): static
    {
        $this->path = $path;

        return $this;
    }
}
