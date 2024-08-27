<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Resource\v1alpha3;

use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;
use Kcs\K8s\Collection;

/**
 * DeviceRequest is a request for devices required for a claim. This is typically a request for a
 * single resource like a device, but can also ask for several identical devices.
 *
 * A DeviceClassName is currently required. Clients must check that it is indeed set. It's absence
 * indicates that something changed in a way that is not supported by the client yet, in which case it
 * must refuse to handle the request.
 */
class DeviceRequest
{
    #[Kubernetes\Attribute('adminAccess')]
    protected bool|null $adminAccess = null;

    #[Kubernetes\Attribute('allocationMode')]
    protected string|null $allocationMode = null;

    #[Kubernetes\Attribute('count')]
    protected int|null $count = null;

    #[Kubernetes\Attribute('deviceClassName', required: true)]
    protected string $deviceClassName;

    #[Kubernetes\Attribute('name', required: true)]
    protected string $name;

    /** @var iterable|DeviceSelector[]|null */
    #[Kubernetes\Attribute('selectors', type: AttributeType::Collection, model: DeviceSelector::class)]
    protected $selectors = null;

    public function __construct(string $deviceClassName, string $name)
    {
        $this->deviceClassName = $deviceClassName;
        $this->name = $name;
    }

    /**
     * AdminAccess indicates that this is a claim for administrative access to the device(s). Claims with
     * AdminAccess are expected to be used for monitoring or other management services for a device.  They
     * ignore all ordinary claims to the device with respect to access modes and any resource allocations.
     */
    public function isAdminAccess(): bool|null
    {
        return $this->adminAccess;
    }

    /**
     * AdminAccess indicates that this is a claim for administrative access to the device(s). Claims with
     * AdminAccess are expected to be used for monitoring or other management services for a device.  They
     * ignore all ordinary claims to the device with respect to access modes and any resource allocations.
     *
     * @return static
     */
    public function setIsAdminAccess(bool $adminAccess): static
    {
        $this->adminAccess = $adminAccess;

        return $this;
    }

    /**
     * AllocationMode and its related fields define how devices are allocated to satisfy this request.
     * Supported values are:
     *
     * - ExactCount: This request is for a specific number of devices.
     *   This is the default. The exact number is provided in the
     *   count field.
     *
     * - All: This request is for all of the matching devices in a pool.
     *   Allocation will fail if some devices are already allocated,
     *   unless adminAccess is requested.
     *
     * If AlloctionMode is not specified, the default mode is ExactCount. If the mode is ExactCount and
     * count is not specified, the default count is one. Any other requests must specify this field.
     *
     * More modes may get added in the future. Clients must refuse to handle requests with unknown modes.
     */
    public function getAllocationMode(): string|null
    {
        return $this->allocationMode;
    }

    /**
     * AllocationMode and its related fields define how devices are allocated to satisfy this request.
     * Supported values are:
     *
     * - ExactCount: This request is for a specific number of devices.
     *   This is the default. The exact number is provided in the
     *   count field.
     *
     * - All: This request is for all of the matching devices in a pool.
     *   Allocation will fail if some devices are already allocated,
     *   unless adminAccess is requested.
     *
     * If AlloctionMode is not specified, the default mode is ExactCount. If the mode is ExactCount and
     * count is not specified, the default count is one. Any other requests must specify this field.
     *
     * More modes may get added in the future. Clients must refuse to handle requests with unknown modes.
     *
     * @return static
     */
    public function setAllocationMode(string $allocationMode): static
    {
        $this->allocationMode = $allocationMode;

        return $this;
    }

    /**
     * Count is used only when the count mode is "ExactCount". Must be greater than zero. If AllocationMode
     * is ExactCount and this field is not specified, the default is one.
     */
    public function getCount(): int|null
    {
        return $this->count;
    }

    /**
     * Count is used only when the count mode is "ExactCount". Must be greater than zero. If AllocationMode
     * is ExactCount and this field is not specified, the default is one.
     *
     * @return static
     */
    public function setCount(int $count): static
    {
        $this->count = $count;

        return $this;
    }

    /**
     * DeviceClassName references a specific DeviceClass, which can define additional configuration and
     * selectors to be inherited by this request.
     *
     * A class is required. Which classes are available depends on the cluster.
     *
     * Administrators may use this to restrict which devices may get requested by only installing classes
     * with selectors for permitted devices. If users are free to request anything without restrictions,
     * then administrators can create an empty DeviceClass for users to reference.
     */
    public function getDeviceClassName(): string
    {
        return $this->deviceClassName;
    }

    /**
     * DeviceClassName references a specific DeviceClass, which can define additional configuration and
     * selectors to be inherited by this request.
     *
     * A class is required. Which classes are available depends on the cluster.
     *
     * Administrators may use this to restrict which devices may get requested by only installing classes
     * with selectors for permitted devices. If users are free to request anything without restrictions,
     * then administrators can create an empty DeviceClass for users to reference.
     *
     * @return static
     */
    public function setDeviceClassName(string $deviceClassName): static
    {
        $this->deviceClassName = $deviceClassName;

        return $this;
    }

    /**
     * Name can be used to reference this request in a pod.spec.containers[].resources.claims entry and in
     * a constraint of the claim.
     *
     * Must be a DNS label.
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Name can be used to reference this request in a pod.spec.containers[].resources.claims entry and in
     * a constraint of the claim.
     *
     * Must be a DNS label.
     *
     * @return static
     */
    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Selectors define criteria which must be satisfied by a specific device in order for that device to
     * be considered for this request. All selectors must be satisfied for a device to be considered.
     *
     * @return iterable|DeviceSelector[]
     */
    public function getSelectors(): iterable|null
    {
        return $this->selectors;
    }

    /**
     * Selectors define criteria which must be satisfied by a specific device in order for that device to
     * be considered for this request. All selectors must be satisfied for a device to be considered.
     *
     * @return static
     */
    public function setSelectors(iterable $selectors): static
    {
        $this->selectors = $selectors;

        return $this;
    }

    /** @return static */
    public function addSelectors(DeviceSelector $selector): static
    {
        if (! $this->selectors) {
            $this->selectors = new Collection();
        }

        $this->selectors[] = $selector;

        return $this;
    }
}
