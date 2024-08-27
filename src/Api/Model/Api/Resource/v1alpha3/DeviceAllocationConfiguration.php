<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Resource\v1alpha3;

use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;

/**
 * DeviceAllocationConfiguration gets embedded in an AllocationResult.
 */
class DeviceAllocationConfiguration
{
    #[Kubernetes\Attribute('opaque', type: AttributeType::Model, model: OpaqueDeviceConfiguration::class)]
    protected OpaqueDeviceConfiguration|null $opaque = null;

    /** @var string[]|null */
    #[Kubernetes\Attribute('requests')]
    protected array|null $requests = null;

    #[Kubernetes\Attribute('source', required: true)]
    protected string $source;

    public function __construct(string $source)
    {
        $this->source = $source;
    }

    /**
     * Opaque provides driver-specific configuration parameters.
     */
    public function getOpaque(): OpaqueDeviceConfiguration|null
    {
        return $this->opaque;
    }

    /**
     * Opaque provides driver-specific configuration parameters.
     *
     * @return static
     */
    public function setOpaque(OpaqueDeviceConfiguration $opaque): static
    {
        $this->opaque = $opaque;

        return $this;
    }

    /**
     * Requests lists the names of requests where the configuration applies. If empty, its applies to all
     * requests.
     */
    public function getRequests(): array|null
    {
        return $this->requests;
    }

    /**
     * Requests lists the names of requests where the configuration applies. If empty, its applies to all
     * requests.
     *
     * @return static
     */
    public function setRequests(array $requests): static
    {
        $this->requests = $requests;

        return $this;
    }

    /**
     * Source records whether the configuration comes from a class and thus is not something that a normal
     * user would have been able to set or from a claim.
     */
    public function getSource(): string
    {
        return $this->source;
    }

    /**
     * Source records whether the configuration comes from a class and thus is not something that a normal
     * user would have been able to set or from a claim.
     *
     * @return static
     */
    public function setSource(string $source): static
    {
        $this->source = $source;

        return $this;
    }
}
