<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Core\v1;

use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;
use Kcs\K8s\Collection;

/**
 * Adapts a Secret into a volume.
 *
 * The contents of the target Secret's Data field will be presented in a volume as files using the keys
 * in the Data field as the file names. Secret volumes support ownership management and SELinux
 * relabeling.
 */
class SecretVolumeSource
{
    #[Kubernetes\Attribute('defaultMode')]
    protected int|null $defaultMode = null;

    /** @var iterable|KeyToPath[]|null */
    #[Kubernetes\Attribute('items', type: AttributeType::Collection, model: KeyToPath::class)]
    protected $items = null;

    #[Kubernetes\Attribute('optional')]
    protected bool|null $optional = null;

    #[Kubernetes\Attribute('secretName')]
    protected string|null $secretName = null;

    /** @param iterable|KeyToPath[] $items */
    public function __construct(
        int|null $defaultMode = null,
        iterable $items = [],
        bool|null $optional = null,
        string|null $secretName = null,
    ) {
        $this->defaultMode = $defaultMode;
        $this->items = new Collection($items);
        $this->optional = $optional;
        $this->secretName = $secretName;
    }

    /**
     * defaultMode is Optional: mode bits used to set permissions on created files by default. Must be an
     * octal value between 0000 and 0777 or a decimal value between 0 and 511. YAML accepts both octal and
     * decimal values, JSON requires decimal values for mode bits. Defaults to 0644. Directories within the
     * path are not affected by this setting. This might be in conflict with other options that affect the
     * file mode, like fsGroup, and the result can be other mode bits set.
     */
    public function getDefaultMode(): int|null
    {
        return $this->defaultMode;
    }

    /**
     * defaultMode is Optional: mode bits used to set permissions on created files by default. Must be an
     * octal value between 0000 and 0777 or a decimal value between 0 and 511. YAML accepts both octal and
     * decimal values, JSON requires decimal values for mode bits. Defaults to 0644. Directories within the
     * path are not affected by this setting. This might be in conflict with other options that affect the
     * file mode, like fsGroup, and the result can be other mode bits set.
     *
     * @return static
     */
    public function setDefaultMode(int $defaultMode): static
    {
        $this->defaultMode = $defaultMode;

        return $this;
    }

    /**
     * items If unspecified, each key-value pair in the Data field of the referenced Secret will be
     * projected into the volume as a file whose name is the key and content is the value. If specified,
     * the listed keys will be projected into the specified paths, and unlisted keys will not be present.
     * If a key is specified which is not present in the Secret, the volume setup will error unless it is
     * marked optional. Paths must be relative and may not contain the '..' path or start with '..'.
     *
     * @return iterable|KeyToPath[]
     */
    public function getItems(): iterable|null
    {
        return $this->items;
    }

    /**
     * items If unspecified, each key-value pair in the Data field of the referenced Secret will be
     * projected into the volume as a file whose name is the key and content is the value. If specified,
     * the listed keys will be projected into the specified paths, and unlisted keys will not be present.
     * If a key is specified which is not present in the Secret, the volume setup will error unless it is
     * marked optional. Paths must be relative and may not contain the '..' path or start with '..'.
     *
     * @return static
     */
    public function setItems(iterable $items): static
    {
        $this->items = $items;

        return $this;
    }

    /** @return static */
    public function addItems(KeyToPath $item): static
    {
        if (! $this->items) {
            $this->items = new Collection();
        }

        $this->items[] = $item;

        return $this;
    }

    /**
     * optional field specify whether the Secret or its keys must be defined
     */
    public function isOptional(): bool|null
    {
        return $this->optional;
    }

    /**
     * optional field specify whether the Secret or its keys must be defined
     *
     * @return static
     */
    public function setIsOptional(bool $optional): static
    {
        $this->optional = $optional;

        return $this;
    }

    /**
     * secretName is the name of the secret in the pod's namespace to use. More info:
     * https://kubernetes.io/docs/concepts/storage/volumes#secret
     */
    public function getSecretName(): string|null
    {
        return $this->secretName;
    }

    /**
     * secretName is the name of the secret in the pod's namespace to use. More info:
     * https://kubernetes.io/docs/concepts/storage/volumes#secret
     *
     * @return static
     */
    public function setSecretName(string $secretName): static
    {
        $this->secretName = $secretName;

        return $this;
    }
}
