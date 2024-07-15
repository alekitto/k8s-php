<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Core\v1;

use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;
use Kcs\K8s\Collection;

/**
 * Represents downward API info for projecting into a projected volume. Note that this is identical to
 * a downwardAPI volume source without the default mode.
 */
class DownwardAPIProjection
{
    /** @var iterable|DownwardAPIVolumeFile[]|null */
    #[Kubernetes\Attribute('items', type: AttributeType::Collection, model: DownwardAPIVolumeFile::class)]
    protected $items = null;

    /** @param iterable|DownwardAPIVolumeFile[] $items */
    public function __construct(iterable $items = [])
    {
        $this->items = new Collection($items);
    }

    /**
     * Items is a list of DownwardAPIVolume file
     *
     * @return iterable|DownwardAPIVolumeFile[]
     */
    public function getItems(): iterable|null
    {
        return $this->items;
    }

    /**
     * Items is a list of DownwardAPIVolume file
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
