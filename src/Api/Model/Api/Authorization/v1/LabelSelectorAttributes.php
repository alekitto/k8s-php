<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Authorization\v1;

use Kcs\K8s\Api\Model\ApiMachinery\Apis\Meta\v1\LabelSelectorRequirement;
use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;
use Kcs\K8s\Collection;

/**
 * LabelSelectorAttributes indicates a label limited access. Webhook authors are encouraged to * ensure
 * rawSelector and requirements are not both set * consider the requirements field if set * not try to
 * parse or consider the rawSelector field if set. This is to avoid another CVE-2022-2880 (i.e. getting
 * different systems to agree on how exactly to parse a query is not something we want), see
 * https://www.oxeye.io/resources/golang-parameter-smuggling-attack for more details. For the
 * *SubjectAccessReview endpoints of the kube-apiserver: * If rawSelector is empty and requirements are
 * empty, the request is not limited. * If rawSelector is present and requirements are empty, the
 * rawSelector will be parsed and limited if the parsing succeeds. * If rawSelector is empty and
 * requirements are present, the requirements should be honored * If rawSelector is present and
 * requirements are present, the request is invalid.
 */
class LabelSelectorAttributes
{
    #[Kubernetes\Attribute('rawSelector')]
    protected string|null $rawSelector = null;

    /** @var iterable|LabelSelectorRequirement[]|null */
    #[Kubernetes\Attribute('requirements', type: AttributeType::Collection, model: LabelSelectorRequirement::class)]
    protected $requirements = null;

    /** @param iterable|LabelSelectorRequirement[] $requirements */
    public function __construct(string|null $rawSelector = null, iterable $requirements = [])
    {
        $this->rawSelector = $rawSelector;
        $this->requirements = new Collection($requirements);
    }

    /**
     * rawSelector is the serialization of a field selector that would be included in a query parameter.
     * Webhook implementations are encouraged to ignore rawSelector. The kube-apiserver's
     * *SubjectAccessReview will parse the rawSelector as long as the requirements are not present.
     */
    public function getRawSelector(): string|null
    {
        return $this->rawSelector;
    }

    /**
     * rawSelector is the serialization of a field selector that would be included in a query parameter.
     * Webhook implementations are encouraged to ignore rawSelector. The kube-apiserver's
     * *SubjectAccessReview will parse the rawSelector as long as the requirements are not present.
     *
     * @return static
     */
    public function setRawSelector(string $rawSelector): static
    {
        $this->rawSelector = $rawSelector;

        return $this;
    }

    /**
     * requirements is the parsed interpretation of a label selector. All requirements must be met for a
     * resource instance to match the selector. Webhook implementations should handle requirements, but how
     * to handle them is up to the webhook. Since requirements can only limit the request, it is safe to
     * authorize as unlimited request if the requirements are not understood.
     *
     * @return iterable|LabelSelectorRequirement[]
     */
    public function getRequirements(): iterable|null
    {
        return $this->requirements;
    }

    /**
     * requirements is the parsed interpretation of a label selector. All requirements must be met for a
     * resource instance to match the selector. Webhook implementations should handle requirements, but how
     * to handle them is up to the webhook. Since requirements can only limit the request, it is safe to
     * authorize as unlimited request if the requirements are not understood.
     *
     * @return static
     */
    public function setRequirements(iterable $requirements): static
    {
        $this->requirements = $requirements;

        return $this;
    }

    /** @return static */
    public function addRequirements(LabelSelectorRequirement $requirement): static
    {
        if (! $this->requirements) {
            $this->requirements = new Collection();
        }

        $this->requirements[] = $requirement;

        return $this;
    }
}
