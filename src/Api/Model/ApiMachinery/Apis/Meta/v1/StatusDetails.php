<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\ApiMachinery\Apis\Meta\v1;

use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;
use Kcs\K8s\Collection;

/**
 * StatusDetails is a set of additional properties that MAY be set by the server to provide additional
 * information about a response. The Reason field of a Status object defines what attributes will be
 * set. Clients must ignore fields that do not match the defined type of each attribute, and should
 * assume that any attribute may be empty, invalid, or under defined.
 */
class StatusDetails
{
    /** @var iterable|StatusCause[]|null */
    #[Kubernetes\Attribute('causes', type: AttributeType::Collection, model: StatusCause::class)]
    protected $causes = null;

    #[Kubernetes\Attribute('group')]
    protected string|null $group = null;

    #[Kubernetes\Attribute('kind')]
    protected string|null $kind = null;

    #[Kubernetes\Attribute('name')]
    protected string|null $name = null;

    #[Kubernetes\Attribute('retryAfterSeconds')]
    protected int|null $retryAfterSeconds = null;

    #[Kubernetes\Attribute('uid')]
    protected string|null $uid = null;

    /**
     * The Causes array includes more details associated with the StatusReason failure. Not all
     * StatusReasons may provide detailed causes.
     *
     * @return iterable|StatusCause[]
     */
    public function getCauses(): iterable|null
    {
        return $this->causes;
    }

    /**
     * The Causes array includes more details associated with the StatusReason failure. Not all
     * StatusReasons may provide detailed causes.
     *
     * @return static
     */
    public function setCauses(iterable $causes): static
    {
        $this->causes = $causes;

        return $this;
    }

    /** @return static */
    public function addCauses(StatusCause $cause): static
    {
        if (! $this->causes) {
            $this->causes = new Collection();
        }

        $this->causes[] = $cause;

        return $this;
    }

    /**
     * The group attribute of the resource associated with the status StatusReason.
     */
    public function getGroup(): string|null
    {
        return $this->group;
    }

    /**
     * The group attribute of the resource associated with the status StatusReason.
     *
     * @return static
     */
    public function setGroup(string $group): static
    {
        $this->group = $group;

        return $this;
    }

    /**
     * The kind attribute of the resource associated with the status StatusReason. On some operations may
     * differ from the requested resource Kind. More info:
     * https://git.k8s.io/community/contributors/devel/sig-architecture/api-conventions.md#types-kinds
     */
    public function getKind(): string|null
    {
        return $this->kind;
    }

    /**
     * The kind attribute of the resource associated with the status StatusReason. On some operations may
     * differ from the requested resource Kind. More info:
     * https://git.k8s.io/community/contributors/devel/sig-architecture/api-conventions.md#types-kinds
     *
     * @return static
     */
    public function setKind(string $kind): static
    {
        $this->kind = $kind;

        return $this;
    }

    /**
     * The name attribute of the resource associated with the status StatusReason (when there is a single
     * name which can be described).
     */
    public function getName(): string|null
    {
        return $this->name;
    }

    /**
     * The name attribute of the resource associated with the status StatusReason (when there is a single
     * name which can be described).
     *
     * @return static
     */
    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    /**
     * If specified, the time in seconds before the operation should be retried. Some errors may indicate
     * the client must take an alternate action - for those errors this field may indicate how long to wait
     * before taking the alternate action.
     */
    public function getRetryAfterSeconds(): int|null
    {
        return $this->retryAfterSeconds;
    }

    /**
     * If specified, the time in seconds before the operation should be retried. Some errors may indicate
     * the client must take an alternate action - for those errors this field may indicate how long to wait
     * before taking the alternate action.
     *
     * @return static
     */
    public function setRetryAfterSeconds(int $retryAfterSeconds): static
    {
        $this->retryAfterSeconds = $retryAfterSeconds;

        return $this;
    }

    /**
     * UID of the resource. (when there is a single resource which can be described). More info:
     * https://kubernetes.io/docs/concepts/overview/working-with-objects/names#uids
     */
    public function getUid(): string|null
    {
        return $this->uid;
    }

    /**
     * UID of the resource. (when there is a single resource which can be described). More info:
     * https://kubernetes.io/docs/concepts/overview/working-with-objects/names#uids
     *
     * @return static
     */
    public function setUid(string $uid): static
    {
        $this->uid = $uid;

        return $this;
    }
}
