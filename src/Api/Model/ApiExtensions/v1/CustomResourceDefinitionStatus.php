<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\ApiExtensions\v1;

use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;
use Kcs\K8s\Collection;

/**
 * CustomResourceDefinitionStatus indicates the state of the CustomResourceDefinition
 */
class CustomResourceDefinitionStatus
{
    #[Kubernetes\Attribute('acceptedNames', type: AttributeType::Model, model: CustomResourceDefinitionNames::class)]
    protected CustomResourceDefinitionNames|null $acceptedNames = null;

    /** @var iterable|CustomResourceDefinitionCondition[]|null */
    #[Kubernetes\Attribute('conditions', type: AttributeType::Collection, model: CustomResourceDefinitionCondition::class)]
    protected $conditions = null;

    /** @var string[]|null */
    #[Kubernetes\Attribute('storedVersions')]
    protected array|null $storedVersions = null;

    /**
     * @param iterable|CustomResourceDefinitionCondition[] $conditions
     * @param string[]|null $storedVersions
     */
    public function __construct(
        CustomResourceDefinitionNames|null $acceptedNames = null,
        iterable $conditions = [],
        array|null $storedVersions = null,
    ) {
        $this->acceptedNames = $acceptedNames;
        $this->conditions = new Collection($conditions);
        $this->storedVersions = $storedVersions;
    }

    /**
     * acceptedNames are the names that are actually being used to serve discovery. They may be different
     * than the names in spec.
     */
    public function getAcceptedNames(): CustomResourceDefinitionNames|null
    {
        return $this->acceptedNames;
    }

    /**
     * acceptedNames are the names that are actually being used to serve discovery. They may be different
     * than the names in spec.
     *
     * @return static
     */
    public function setAcceptedNames(CustomResourceDefinitionNames $acceptedNames): static
    {
        $this->acceptedNames = $acceptedNames;

        return $this;
    }

    /**
     * conditions indicate state for particular aspects of a CustomResourceDefinition
     *
     * @return iterable|CustomResourceDefinitionCondition[]
     */
    public function getConditions(): iterable|null
    {
        return $this->conditions;
    }

    /**
     * conditions indicate state for particular aspects of a CustomResourceDefinition
     *
     * @return static
     */
    public function setConditions(iterable $conditions): static
    {
        $this->conditions = $conditions;

        return $this;
    }

    /** @return static */
    public function addConditions(CustomResourceDefinitionCondition $condition): static
    {
        if (! $this->conditions) {
            $this->conditions = new Collection();
        }

        $this->conditions[] = $condition;

        return $this;
    }

    /**
     * storedVersions lists all versions of CustomResources that were ever persisted. Tracking these
     * versions allows a migration path for stored versions in etcd. The field is mutable so a migration
     * controller can finish a migration to another version (ensuring no old objects are left in storage),
     * and then remove the rest of the versions from this list. Versions may not be removed from
     * `spec.versions` while they exist in this list.
     */
    public function getStoredVersions(): array|null
    {
        return $this->storedVersions;
    }

    /**
     * storedVersions lists all versions of CustomResources that were ever persisted. Tracking these
     * versions allows a migration path for stored versions in etcd. The field is mutable so a migration
     * controller can finish a migration to another version (ensuring no old objects are left in storage),
     * and then remove the rest of the versions from this list. Versions may not be removed from
     * `spec.versions` while they exist in this list.
     *
     * @return static
     */
    public function setStoredVersions(array $storedVersions): static
    {
        $this->storedVersions = $storedVersions;

        return $this;
    }
}
