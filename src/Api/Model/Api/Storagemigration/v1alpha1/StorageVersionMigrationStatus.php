<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Storagemigration\v1alpha1;

use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;
use Kcs\K8s\Collection;

/**
 * Status of the storage version migration.
 */
class StorageVersionMigrationStatus
{
    /** @var iterable|MigrationCondition[]|null */
    #[Kubernetes\Attribute('conditions', type: AttributeType::Collection, model: MigrationCondition::class)]
    protected $conditions = null;

    #[Kubernetes\Attribute('resourceVersion')]
    protected string|null $resourceVersion = null;

    /** @param iterable|MigrationCondition[] $conditions */
    public function __construct(iterable $conditions = [], string|null $resourceVersion = null)
    {
        $this->conditions = new Collection($conditions);
        $this->resourceVersion = $resourceVersion;
    }

    /**
     * The latest available observations of the migration's current state.
     *
     * @return iterable|MigrationCondition[]
     */
    public function getConditions(): iterable|null
    {
        return $this->conditions;
    }

    /**
     * The latest available observations of the migration's current state.
     *
     * @return static
     */
    public function setConditions(iterable $conditions): static
    {
        $this->conditions = $conditions;

        return $this;
    }

    /** @return static */
    public function addConditions(MigrationCondition $condition): static
    {
        if (! $this->conditions) {
            $this->conditions = new Collection();
        }

        $this->conditions[] = $condition;

        return $this;
    }

    /**
     * ResourceVersion to compare with the GC cache for performing the migration. This is the current
     * resource version of given group, version and resource when kube-controller-manager first observes
     * this StorageVersionMigration resource.
     */
    public function getResourceVersion(): string|null
    {
        return $this->resourceVersion;
    }

    /**
     * ResourceVersion to compare with the GC cache for performing the migration. This is the current
     * resource version of given group, version and resource when kube-controller-manager first observes
     * this StorageVersionMigration resource.
     *
     * @return static
     */
    public function setResourceVersion(string $resourceVersion): static
    {
        $this->resourceVersion = $resourceVersion;

        return $this;
    }
}
