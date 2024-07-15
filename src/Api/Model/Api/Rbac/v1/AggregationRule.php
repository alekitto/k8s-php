<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Rbac\v1;

use Kcs\K8s\Api\Model\ApiMachinery\Apis\Meta\v1\LabelSelector;
use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;
use Kcs\K8s\Collection;

/**
 * AggregationRule describes how to locate ClusterRoles to aggregate into the ClusterRole
 */
class AggregationRule
{
    /** @var iterable|LabelSelector[]|null */
    #[Kubernetes\Attribute('clusterRoleSelectors', type: AttributeType::Collection, model: LabelSelector::class)]
    protected $clusterRoleSelectors = null;

    /** @param iterable|LabelSelector[] $clusterRoleSelectors */
    public function __construct(iterable $clusterRoleSelectors = [])
    {
        $this->clusterRoleSelectors = new Collection($clusterRoleSelectors);
    }

    /**
     * ClusterRoleSelectors holds a list of selectors which will be used to find ClusterRoles and create
     * the rules. If any of the selectors match, then the ClusterRole's permissions will be added
     *
     * @return iterable|LabelSelector[]
     */
    public function getClusterRoleSelectors(): iterable|null
    {
        return $this->clusterRoleSelectors;
    }

    /**
     * ClusterRoleSelectors holds a list of selectors which will be used to find ClusterRoles and create
     * the rules. If any of the selectors match, then the ClusterRole's permissions will be added
     *
     * @return static
     */
    public function setClusterRoleSelectors(iterable $clusterRoleSelectors): static
    {
        $this->clusterRoleSelectors = $clusterRoleSelectors;

        return $this;
    }

    /** @return static */
    public function addClusterRoleSelectors(LabelSelector $clusterRoleSelector): static
    {
        if (! $this->clusterRoleSelectors) {
            $this->clusterRoleSelectors = new Collection();
        }

        $this->clusterRoleSelectors[] = $clusterRoleSelector;

        return $this;
    }
}
