<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Core\v1;

use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;
use Kcs\K8s\Collection;

/**
 * Adapts a ConfigMap into a volume.
 *
 * The contents of the target ConfigMap's Data field will be presented in a volume as files using the
 * keys in the Data field as the file names, unless the items element is populated with specific
 * mappings of keys to paths. ConfigMap volumes support ownership management and SELinux relabeling.
 */
class ConfigMapVolumeSource
{
    #[Kubernetes\Attribute('defaultMode')]
    protected int|null $defaultMode = null;

    /** @var iterable|KeyToPath[]|null */
    #[Kubernetes\Attribute('items', type: AttributeType::Collection, model: KeyToPath::class)]
    protected $items = null;

    #[Kubernetes\Attribute('name')]
    protected string|null $name = null;

    #[Kubernetes\Attribute('optional')]
    protected bool|null $optional = null;

    /** @param iterable|KeyToPath[] $items */
    public function __construct(
        int|null $defaultMode = null,
        iterable $items = [],
        string|null $name = null,
        bool|null $optional = null,
    ) {
        $this->defaultMode = $defaultMode;
        $this->items = new Collection($items);
        $this->name = $name;
        $this->optional = $optional;
    }

    /**
     * defaultMode is optional: mode bits used to set permissions on created files by default. Must be an
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
     * defaultMode is optional: mode bits used to set permissions on created files by default. Must be an
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
     * items if unspecified, each key-value pair in the Data field of the referenced ConfigMap will be
     * projected into the volume as a file whose name is the key and content is the value. If specified,
     * the listed keys will be projected into the specified paths, and unlisted keys will not be present.
     * If a key is specified which is not present in the ConfigMap, the volume setup will error unless it
     * is marked optional. Paths must be relative and may not contain the '..' path or start with '..'.
     *
     * @return iterable|KeyToPath[]
     */
    public function getItems(): iterable|null
    {
        return $this->items;
    }

    /**
     * items if unspecified, each key-value pair in the Data field of the referenced ConfigMap will be
     * projected into the volume as a file whose name is the key and content is the value. If specified,
     * the listed keys will be projected into the specified paths, and unlisted keys will not be present.
     * If a key is specified which is not present in the ConfigMap, the volume setup will error unless it
     * is marked optional. Paths must be relative and may not contain the '..' path or start with '..'.
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
     * Name of the referent. This field is effectively required, but due to backwards compatibility is
     * allowed to be empty. Instances of this type with an empty value here are almost certainly wrong.
     * More info: https://kubernetes.io/docs/concepts/overview/working-with-objects/names/#names
     */
    public function getName(): string|null
    {
        return $this->name;
    }

    /**
     * Name of the referent. This field is effectively required, but due to backwards compatibility is
     * allowed to be empty. Instances of this type with an empty value here are almost certainly wrong.
     * More info: https://kubernetes.io/docs/concepts/overview/working-with-objects/names/#names
     *
     * @return static
     */
    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    /**
     * optional specify whether the ConfigMap or its keys must be defined
     */
    public function isOptional(): bool|null
    {
        return $this->optional;
    }

    /**
     * optional specify whether the ConfigMap or its keys must be defined
     *
     * @return static
     */
    public function setIsOptional(bool $optional): static
    {
        $this->optional = $optional;

        return $this;
    }
}
