<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\ApiMachinery\Apis\Meta\v1;

use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;
use Kcs\K8s\Collection;

/**
 * A label selector is a label query over a set of resources. The result of matchLabels and
 * matchExpressions are ANDed. An empty label selector matches all objects. A null label selector
 * matches no objects.
 */
class LabelSelector
{
    /** @var iterable|LabelSelectorRequirement[]|null */
    #[Kubernetes\Attribute('matchExpressions', type: AttributeType::Collection, model: LabelSelectorRequirement::class)]
    protected $matchExpressions = null;

    /** @var string[]|null */
    #[Kubernetes\Attribute('matchLabels')]
    protected array|null $matchLabels = null;

    /**
     * @param iterable|LabelSelectorRequirement[] $matchExpressions
     * @param string[]|null $matchLabels
     */
    public function __construct(iterable $matchExpressions = [], array|null $matchLabels = null)
    {
        $this->matchExpressions = new Collection($matchExpressions);
        $this->matchLabels = $matchLabels;
    }

    /**
     * matchExpressions is a list of label selector requirements. The requirements are ANDed.
     *
     * @return iterable|LabelSelectorRequirement[]
     */
    public function getMatchExpressions(): iterable|null
    {
        return $this->matchExpressions;
    }

    /**
     * matchExpressions is a list of label selector requirements. The requirements are ANDed.
     *
     * @return static
     */
    public function setMatchExpressions(iterable $matchExpressions): static
    {
        $this->matchExpressions = $matchExpressions;

        return $this;
    }

    /** @return static */
    public function addMatchExpressions(LabelSelectorRequirement $matchExpression): static
    {
        if (! $this->matchExpressions) {
            $this->matchExpressions = new Collection();
        }

        $this->matchExpressions[] = $matchExpression;

        return $this;
    }

    /**
     * matchLabels is a map of {key,value} pairs. A single {key,value} in the matchLabels map is equivalent
     * to an element of matchExpressions, whose key field is "key", the operator is "In", and the values
     * array contains only "value". The requirements are ANDed.
     */
    public function getMatchLabels(): array|null
    {
        return $this->matchLabels;
    }

    /**
     * matchLabels is a map of {key,value} pairs. A single {key,value} in the matchLabels map is equivalent
     * to an element of matchExpressions, whose key field is "key", the operator is "In", and the values
     * array contains only "value". The requirements are ANDed.
     *
     * @return static
     */
    public function setMatchLabels(array $matchLabels): static
    {
        $this->matchLabels = $matchLabels;

        return $this;
    }
}
