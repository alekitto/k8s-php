<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\ApiServerInternal\v1alpha1;

use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;
use Kcs\K8s\Collection;

/**
 * API server instances report the versions they can decode and the version they encode objects to when
 * persisting objects in the backend.
 */
class StorageVersionStatus
{
    #[Kubernetes\Attribute('commonEncodingVersion')]
    protected string|null $commonEncodingVersion = null;

    /** @var iterable|StorageVersionCondition[]|null */
    #[Kubernetes\Attribute('conditions', type: AttributeType::Collection, model: StorageVersionCondition::class)]
    protected $conditions = null;

    /** @var iterable|ServerStorageVersion[]|null */
    #[Kubernetes\Attribute('storageVersions', type: AttributeType::Collection, model: ServerStorageVersion::class)]
    protected $storageVersions = null;

    /**
     * @param iterable|StorageVersionCondition[] $conditions
     * @param iterable|ServerStorageVersion[] $storageVersions
     */
    public function __construct(
        string|null $commonEncodingVersion = null,
        iterable $conditions = [],
        iterable $storageVersions = [],
    ) {
        $this->commonEncodingVersion = $commonEncodingVersion;
        $this->conditions = new Collection($conditions);
        $this->storageVersions = new Collection($storageVersions);
    }

    /**
     * If all API server instances agree on the same encoding storage version, then this field is set to
     * that version. Otherwise this field is left empty. API servers should finish updating its
     * storageVersionStatus entry before serving write operations, so that this field will be in sync with
     * the reality.
     */
    public function getCommonEncodingVersion(): string|null
    {
        return $this->commonEncodingVersion;
    }

    /**
     * If all API server instances agree on the same encoding storage version, then this field is set to
     * that version. Otherwise this field is left empty. API servers should finish updating its
     * storageVersionStatus entry before serving write operations, so that this field will be in sync with
     * the reality.
     *
     * @return static
     */
    public function setCommonEncodingVersion(string $commonEncodingVersion): static
    {
        $this->commonEncodingVersion = $commonEncodingVersion;

        return $this;
    }

    /**
     * The latest available observations of the storageVersion's state.
     *
     * @return iterable|StorageVersionCondition[]
     */
    public function getConditions(): iterable|null
    {
        return $this->conditions;
    }

    /**
     * The latest available observations of the storageVersion's state.
     *
     * @return static
     */
    public function setConditions(iterable $conditions): static
    {
        $this->conditions = $conditions;

        return $this;
    }

    /** @return static */
    public function addConditions(StorageVersionCondition $condition): static
    {
        if (! $this->conditions) {
            $this->conditions = new Collection();
        }

        $this->conditions[] = $condition;

        return $this;
    }

    /**
     * The reported versions per API server instance.
     *
     * @return iterable|ServerStorageVersion[]
     */
    public function getStorageVersions(): iterable|null
    {
        return $this->storageVersions;
    }

    /**
     * The reported versions per API server instance.
     *
     * @return static
     */
    public function setStorageVersions(iterable $storageVersions): static
    {
        $this->storageVersions = $storageVersions;

        return $this;
    }

    /** @return static */
    public function addStorageVersions(ServerStorageVersion $storageVersion): static
    {
        if (! $this->storageVersions) {
            $this->storageVersions = new Collection();
        }

        $this->storageVersions[] = $storageVersion;

        return $this;
    }
}
