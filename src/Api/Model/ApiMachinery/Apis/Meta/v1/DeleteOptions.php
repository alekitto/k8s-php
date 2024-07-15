<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\ApiMachinery\Apis\Meta\v1;

use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;

/**
 * DeleteOptions may be provided when deleting an API object.
 */
#[Kubernetes\Kind('DeleteOptions', version: 'v1')]
class DeleteOptions
{
    #[Kubernetes\Attribute('apiVersion')]
    protected string|null $apiVersion = 'v1';

    /** @var string[]|null */
    #[Kubernetes\Attribute('dryRun')]
    protected array|null $dryRun = null;

    #[Kubernetes\Attribute('gracePeriodSeconds')]
    protected int|null $gracePeriodSeconds = null;

    #[Kubernetes\Attribute('kind')]
    protected string|null $kind = 'DeleteOptions';

    #[Kubernetes\Attribute('orphanDependents')]
    protected bool|null $orphanDependents = null;

    #[Kubernetes\Attribute('preconditions', type: AttributeType::Model, model: Preconditions::class)]
    protected Preconditions|null $preconditions = null;

    #[Kubernetes\Attribute('propagationPolicy')]
    protected string|null $propagationPolicy = null;

    /**
     * APIVersion defines the versioned schema of this representation of an object. Servers should convert
     * recognized schemas to the latest internal value, and may reject unrecognized values. More info:
     * https://git.k8s.io/community/contributors/devel/sig-architecture/api-conventions.md#resources
     */
    public function getApiVersion(): string|null
    {
        return $this->apiVersion;
    }

    /**
     * APIVersion defines the versioned schema of this representation of an object. Servers should convert
     * recognized schemas to the latest internal value, and may reject unrecognized values. More info:
     * https://git.k8s.io/community/contributors/devel/sig-architecture/api-conventions.md#resources
     *
     * @return static
     */
    public function setApiVersion(string $apiVersion): static
    {
        $this->apiVersion = $apiVersion;

        return $this;
    }

    /**
     * When present, indicates that modifications should not be persisted. An invalid or unrecognized
     * dryRun directive will result in an error response and no further processing of the request. Valid
     * values are: - All: all dry run stages will be processed
     */
    public function getDryRun(): array|null
    {
        return $this->dryRun;
    }

    /**
     * When present, indicates that modifications should not be persisted. An invalid or unrecognized
     * dryRun directive will result in an error response and no further processing of the request. Valid
     * values are: - All: all dry run stages will be processed
     *
     * @return static
     */
    public function setDryRun(array $dryRun): static
    {
        $this->dryRun = $dryRun;

        return $this;
    }

    /**
     * The duration in seconds before the object should be deleted. Value must be non-negative integer. The
     * value zero indicates delete immediately. If this value is nil, the default grace period for the
     * specified type will be used. Defaults to a per object value if not specified. zero means delete
     * immediately.
     */
    public function getGracePeriodSeconds(): int|null
    {
        return $this->gracePeriodSeconds;
    }

    /**
     * The duration in seconds before the object should be deleted. Value must be non-negative integer. The
     * value zero indicates delete immediately. If this value is nil, the default grace period for the
     * specified type will be used. Defaults to a per object value if not specified. zero means delete
     * immediately.
     *
     * @return static
     */
    public function setGracePeriodSeconds(int $gracePeriodSeconds): static
    {
        $this->gracePeriodSeconds = $gracePeriodSeconds;

        return $this;
    }

    /**
     * Kind is a string value representing the REST resource this object represents. Servers may infer this
     * from the endpoint the client submits requests to. Cannot be updated. In CamelCase. More info:
     * https://git.k8s.io/community/contributors/devel/sig-architecture/api-conventions.md#types-kinds
     */
    public function getKind(): string|null
    {
        return $this->kind;
    }

    /**
     * Kind is a string value representing the REST resource this object represents. Servers may infer this
     * from the endpoint the client submits requests to. Cannot be updated. In CamelCase. More info:
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
     * Deprecated: please use the PropagationPolicy, this field will be deprecated in 1.7. Should the
     * dependent objects be orphaned. If true/false, the "orphan" finalizer will be added to/removed from
     * the object's finalizers list. Either this field or PropagationPolicy may be set, but not both.
     */
    public function isOrphanDependents(): bool|null
    {
        return $this->orphanDependents;
    }

    /**
     * Deprecated: please use the PropagationPolicy, this field will be deprecated in 1.7. Should the
     * dependent objects be orphaned. If true/false, the "orphan" finalizer will be added to/removed from
     * the object's finalizers list. Either this field or PropagationPolicy may be set, but not both.
     *
     * @return static
     */
    public function setIsOrphanDependents(bool $orphanDependents): static
    {
        $this->orphanDependents = $orphanDependents;

        return $this;
    }

    /**
     * Must be fulfilled before a deletion is carried out. If not possible, a 409 Conflict status will be
     * returned.
     */
    public function getPreconditions(): Preconditions|null
    {
        return $this->preconditions;
    }

    /**
     * Must be fulfilled before a deletion is carried out. If not possible, a 409 Conflict status will be
     * returned.
     *
     * @return static
     */
    public function setPreconditions(Preconditions $preconditions): static
    {
        $this->preconditions = $preconditions;

        return $this;
    }

    /**
     * Whether and how garbage collection will be performed. Either this field or OrphanDependents may be
     * set, but not both. The default policy is decided by the existing finalizer set in the
     * metadata.finalizers and the resource-specific default policy. Acceptable values are: 'Orphan' -
     * orphan the dependents; 'Background' - allow the garbage collector to delete the dependents in the
     * background; 'Foreground' - a cascading policy that deletes all dependents in the foreground.
     */
    public function getPropagationPolicy(): string|null
    {
        return $this->propagationPolicy;
    }

    /**
     * Whether and how garbage collection will be performed. Either this field or OrphanDependents may be
     * set, but not both. The default policy is decided by the existing finalizer set in the
     * metadata.finalizers and the resource-specific default policy. Acceptable values are: 'Orphan' -
     * orphan the dependents; 'Background' - allow the garbage collector to delete the dependents in the
     * background; 'Foreground' - a cascading policy that deletes all dependents in the foreground.
     *
     * @return static
     */
    public function setPropagationPolicy(string $propagationPolicy): static
    {
        $this->propagationPolicy = $propagationPolicy;

        return $this;
    }
}
