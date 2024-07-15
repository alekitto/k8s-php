<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\FlowControl\v1;

use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;
use Kcs\K8s\Collection;

/**
 * PolicyRulesWithSubjects prescribes a test that applies to a request to an apiserver. The test
 * considers the subject making the request, the verb being requested, and the resource to be acted
 * upon. This PolicyRulesWithSubjects matches a request if and only if both (a) at least one member of
 * subjects matches the request and (b) at least one member of resourceRules or nonResourceRules
 * matches the request.
 */
class PolicyRulesWithSubjects
{
    /** @var iterable|NonResourcePolicyRule[]|null */
    #[Kubernetes\Attribute('nonResourceRules', type: AttributeType::Collection, model: NonResourcePolicyRule::class)]
    protected $nonResourceRules = null;

    /** @var iterable|ResourcePolicyRule[]|null */
    #[Kubernetes\Attribute('resourceRules', type: AttributeType::Collection, model: ResourcePolicyRule::class)]
    protected $resourceRules = null;

    /** @var iterable|Subject[] */
    #[Kubernetes\Attribute('subjects', type: AttributeType::Collection, model: Subject::class, required: true)]
    protected iterable $subjects;

    /** @param iterable|Subject[] $subjects */
    public function __construct(iterable $subjects)
    {
        $this->subjects = new Collection($subjects);
    }

    /**
     * `nonResourceRules` is a list of NonResourcePolicyRules that identify matching requests according to
     * their verb and the target non-resource URL.
     *
     * @return iterable|NonResourcePolicyRule[]
     */
    public function getNonResourceRules(): iterable|null
    {
        return $this->nonResourceRules;
    }

    /**
     * `nonResourceRules` is a list of NonResourcePolicyRules that identify matching requests according to
     * their verb and the target non-resource URL.
     *
     * @return static
     */
    public function setNonResourceRules(iterable $nonResourceRules): static
    {
        $this->nonResourceRules = $nonResourceRules;

        return $this;
    }

    /** @return static */
    public function addNonResourceRules(NonResourcePolicyRule $nonResourceRule): static
    {
        if (! $this->nonResourceRules) {
            $this->nonResourceRules = new Collection();
        }

        $this->nonResourceRules[] = $nonResourceRule;

        return $this;
    }

    /**
     * `resourceRules` is a slice of ResourcePolicyRules that identify matching requests according to their
     * verb and the target resource. At least one of `resourceRules` and `nonResourceRules` has to be
     * non-empty.
     *
     * @return iterable|ResourcePolicyRule[]
     */
    public function getResourceRules(): iterable|null
    {
        return $this->resourceRules;
    }

    /**
     * `resourceRules` is a slice of ResourcePolicyRules that identify matching requests according to their
     * verb and the target resource. At least one of `resourceRules` and `nonResourceRules` has to be
     * non-empty.
     *
     * @return static
     */
    public function setResourceRules(iterable $resourceRules): static
    {
        $this->resourceRules = $resourceRules;

        return $this;
    }

    /** @return static */
    public function addResourceRules(ResourcePolicyRule $resourceRule): static
    {
        if (! $this->resourceRules) {
            $this->resourceRules = new Collection();
        }

        $this->resourceRules[] = $resourceRule;

        return $this;
    }

    /**
     * subjects is the list of normal user, serviceaccount, or group that this rule cares about. There must
     * be at least one member in this slice. A slice that includes both the system:authenticated and
     * system:unauthenticated user groups matches every request. Required.
     *
     * @return iterable|Subject[]
     */
    public function getSubjects(): iterable
    {
        return $this->subjects;
    }

    /**
     * subjects is the list of normal user, serviceaccount, or group that this rule cares about. There must
     * be at least one member in this slice. A slice that includes both the system:authenticated and
     * system:unauthenticated user groups matches every request. Required.
     *
     * @return static
     */
    public function setSubjects(iterable $subjects): static
    {
        $this->subjects = $subjects;

        return $this;
    }

    /** @return static */
    public function addSubjects(Subject $subject): static
    {
        if (! $this->subjects) {
            $this->subjects = new Collection();
        }

        $this->subjects[] = $subject;

        return $this;
    }
}
