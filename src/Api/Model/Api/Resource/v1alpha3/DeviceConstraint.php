<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Resource\v1alpha3;

use Kcs\K8s\Attribute as Kubernetes;

/**
 * DeviceConstraint must have exactly one field set besides Requests.
 */
class DeviceConstraint
{
    #[Kubernetes\Attribute('matchAttribute')]
    protected string|null $matchAttribute = null;

    /** @var string[]|null */
    #[Kubernetes\Attribute('requests')]
    protected array|null $requests = null;

    /** @param string[]|null $requests */
    public function __construct(string|null $matchAttribute = null, array|null $requests = null)
    {
        $this->matchAttribute = $matchAttribute;
        $this->requests = $requests;
    }

    /**
     * MatchAttribute requires that all devices in question have this attribute and that its type and value
     * are the same across those devices.
     *
     * For example, if you specified "dra.example.com/numa" (a hypothetical example!), then only devices in
     * the same NUMA node will be chosen. A device which does not have that attribute will not be chosen.
     * All devices should use a value of the same type for this attribute because that is part of its
     * specification, but if one device doesn't, then it also will not be chosen.
     *
     * Must include the domain qualifier.
     */
    public function getMatchAttribute(): string|null
    {
        return $this->matchAttribute;
    }

    /**
     * MatchAttribute requires that all devices in question have this attribute and that its type and value
     * are the same across those devices.
     *
     * For example, if you specified "dra.example.com/numa" (a hypothetical example!), then only devices in
     * the same NUMA node will be chosen. A device which does not have that attribute will not be chosen.
     * All devices should use a value of the same type for this attribute because that is part of its
     * specification, but if one device doesn't, then it also will not be chosen.
     *
     * Must include the domain qualifier.
     *
     * @return static
     */
    public function setMatchAttribute(string $matchAttribute): static
    {
        $this->matchAttribute = $matchAttribute;

        return $this;
    }

    /**
     * Requests is a list of the one or more requests in this claim which must co-satisfy this constraint.
     * If a request is fulfilled by multiple devices, then all of the devices must satisfy the constraint.
     * If this is not specified, this constraint applies to all requests in this claim.
     */
    public function getRequests(): array|null
    {
        return $this->requests;
    }

    /**
     * Requests is a list of the one or more requests in this claim which must co-satisfy this constraint.
     * If a request is fulfilled by multiple devices, then all of the devices must satisfy the constraint.
     * If this is not specified, this constraint applies to all requests in this claim.
     *
     * @return static
     */
    public function setRequests(array $requests): static
    {
        $this->requests = $requests;

        return $this;
    }
}
