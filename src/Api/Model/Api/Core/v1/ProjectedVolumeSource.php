<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Core\v1;

use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;
use Kcs\K8s\Collection;

/**
 * Represents a projected volume source
 */
class ProjectedVolumeSource
{
    #[Kubernetes\Attribute('defaultMode')]
    protected int|null $defaultMode = null;

    /** @var iterable|VolumeProjection[]|null */
    #[Kubernetes\Attribute('sources', type: AttributeType::Collection, model: VolumeProjection::class)]
    protected $sources = null;

    /** @param iterable|VolumeProjection[] $sources */
    public function __construct(int|null $defaultMode = null, iterable $sources = [])
    {
        $this->defaultMode = $defaultMode;
        $this->sources = new Collection($sources);
    }

    /**
     * defaultMode are the mode bits used to set permissions on created files by default. Must be an octal
     * value between 0000 and 0777 or a decimal value between 0 and 511. YAML accepts both octal and
     * decimal values, JSON requires decimal values for mode bits. Directories within the path are not
     * affected by this setting. This might be in conflict with other options that affect the file mode,
     * like fsGroup, and the result can be other mode bits set.
     */
    public function getDefaultMode(): int|null
    {
        return $this->defaultMode;
    }

    /**
     * defaultMode are the mode bits used to set permissions on created files by default. Must be an octal
     * value between 0000 and 0777 or a decimal value between 0 and 511. YAML accepts both octal and
     * decimal values, JSON requires decimal values for mode bits. Directories within the path are not
     * affected by this setting. This might be in conflict with other options that affect the file mode,
     * like fsGroup, and the result can be other mode bits set.
     *
     * @return static
     */
    public function setDefaultMode(int $defaultMode): static
    {
        $this->defaultMode = $defaultMode;

        return $this;
    }

    /**
     * sources is the list of volume projections
     *
     * @return iterable|VolumeProjection[]
     */
    public function getSources(): iterable|null
    {
        return $this->sources;
    }

    /**
     * sources is the list of volume projections
     *
     * @return static
     */
    public function setSources(iterable $sources): static
    {
        $this->sources = $sources;

        return $this;
    }

    /** @return static */
    public function addSources(VolumeProjection $source): static
    {
        if (! $this->sources) {
            $this->sources = new Collection();
        }

        $this->sources[] = $source;

        return $this;
    }
}
