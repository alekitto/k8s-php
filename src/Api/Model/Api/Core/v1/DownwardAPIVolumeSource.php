<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Core\v1;

use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;
use Kcs\K8s\Collection;

/**
 * DownwardAPIVolumeSource represents a volume containing downward API info. Downward API volumes
 * support ownership management and SELinux relabeling.
 */
class DownwardAPIVolumeSource
{
    #[Kubernetes\Attribute('defaultMode')]
    protected int|null $defaultMode = null;

    /** @var iterable|DownwardAPIVolumeFile[]|null */
    #[Kubernetes\Attribute('items', type: AttributeType::Collection, model: DownwardAPIVolumeFile::class)]
    protected $items = null;

    /** @param iterable|DownwardAPIVolumeFile[] $items */
    public function __construct(int|null $defaultMode = null, iterable $items = [])
    {
        $this->defaultMode = $defaultMode;
        $this->items = new Collection($items);
    }

    /**
     * Optional: mode bits to use on created files by default. Must be a Optional: mode bits used to set
     * permissions on created files by default. Must be an octal value between 0000 and 0777 or a decimal
     * value between 0 and 511. YAML accepts both octal and decimal values, JSON requires decimal values
     * for mode bits. Defaults to 0644. Directories within the path are not affected by this setting. This
     * might be in conflict with other options that affect the file mode, like fsGroup, and the result can
     * be other mode bits set.
     */
    public function getDefaultMode(): int|null
    {
        return $this->defaultMode;
    }

    /**
     * Optional: mode bits to use on created files by default. Must be a Optional: mode bits used to set
     * permissions on created files by default. Must be an octal value between 0000 and 0777 or a decimal
     * value between 0 and 511. YAML accepts both octal and decimal values, JSON requires decimal values
     * for mode bits. Defaults to 0644. Directories within the path are not affected by this setting. This
     * might be in conflict with other options that affect the file mode, like fsGroup, and the result can
     * be other mode bits set.
     *
     * @return static
     */
    public function setDefaultMode(int $defaultMode): static
    {
        $this->defaultMode = $defaultMode;

        return $this;
    }

    /**
     * Items is a list of downward API volume file
     *
     * @return iterable|DownwardAPIVolumeFile[]
     */
    public function getItems(): iterable|null
    {
        return $this->items;
    }

    /**
     * Items is a list of downward API volume file
     *
     * @return static
     */
    public function setItems(iterable $items): static
    {
        $this->items = $items;

        return $this;
    }

    /** @return static */
    public function addItems(DownwardAPIVolumeFile $item): static
    {
        if (! $this->items) {
            $this->items = new Collection();
        }

        $this->items[] = $item;

        return $this;
    }
}
