<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Storagemigration\v1alpha1;

use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;

/**
 * Spec of the storage version migration.
 */
class StorageVersionMigrationSpec
{
    #[Kubernetes\Attribute('continueToken')]
    protected string|null $continueToken = null;

    #[Kubernetes\Attribute('resource', type: AttributeType::Model, model: GroupVersionResource::class, required: true)]
    protected GroupVersionResource $resource;

    public function __construct(GroupVersionResource $resource)
    {
        $this->resource = $resource;
    }

    /**
     * The token used in the list options to get the next chunk of objects to migrate. When the
     * .status.conditions indicates the migration is "Running", users can use this token to check the
     * progress of the migration.
     */
    public function getContinueToken(): string|null
    {
        return $this->continueToken;
    }

    /**
     * The token used in the list options to get the next chunk of objects to migrate. When the
     * .status.conditions indicates the migration is "Running", users can use this token to check the
     * progress of the migration.
     *
     * @return static
     */
    public function setContinueToken(string $continueToken): static
    {
        $this->continueToken = $continueToken;

        return $this;
    }

    /**
     * The resource that is being migrated. The migrator sends requests to the endpoint serving the
     * resource. Immutable.
     */
    public function getResource(): GroupVersionResource
    {
        return $this->resource;
    }

    /**
     * The resource that is being migrated. The migrator sends requests to the endpoint serving the
     * resource. Immutable.
     *
     * @return static
     */
    public function setResource(GroupVersionResource $resource): static
    {
        $this->resource = $resource;

        return $this;
    }
}
