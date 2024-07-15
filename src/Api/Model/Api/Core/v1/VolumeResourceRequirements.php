<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Core\v1;

use Kcs\K8s\Attribute as Kubernetes;

/**
 * VolumeResourceRequirements describes the storage resource requirements for a volume.
 */
class VolumeResourceRequirements
{
    /** @var object[]|null */
    #[Kubernetes\Attribute('limits')]
    protected array|null $limits = null;

    /** @var object[]|null */
    #[Kubernetes\Attribute('requests')]
    protected array|null $requests = null;

    /**
     * @param object[]|null $limits
     * @param object[]|null $requests
     */
    public function __construct(array|null $limits = null, array|null $requests = null)
    {
        $this->limits = $limits;
        $this->requests = $requests;
    }

    /**
     * Limits describes the maximum amount of compute resources allowed. More info:
     * https://kubernetes.io/docs/concepts/configuration/manage-resources-containers/
     */
    public function getLimits(): array|null
    {
        return $this->limits;
    }

    /**
     * Limits describes the maximum amount of compute resources allowed. More info:
     * https://kubernetes.io/docs/concepts/configuration/manage-resources-containers/
     *
     * @return static
     */
    public function setLimits(array $limits): static
    {
        $this->limits = $limits;

        return $this;
    }

    /**
     * Requests describes the minimum amount of compute resources required. If Requests is omitted for a
     * container, it defaults to Limits if that is explicitly specified, otherwise to an
     * implementation-defined value. Requests cannot exceed Limits. More info:
     * https://kubernetes.io/docs/concepts/configuration/manage-resources-containers/
     */
    public function getRequests(): array|null
    {
        return $this->requests;
    }

    /**
     * Requests describes the minimum amount of compute resources required. If Requests is omitted for a
     * container, it defaults to Limits if that is explicitly specified, otherwise to an
     * implementation-defined value. Requests cannot exceed Limits. More info:
     * https://kubernetes.io/docs/concepts/configuration/manage-resources-containers/
     *
     * @return static
     */
    public function setRequests(array $requests): static
    {
        $this->requests = $requests;

        return $this;
    }
}
