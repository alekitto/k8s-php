<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Discovery\v1;

use Kcs\K8s\Api\Model\Api\Core\v1\ObjectReference;
use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;

/**
 * Endpoint represents a single logical "backend" implementing a service.
 */
class Endpoint
{
    /** @var string[] */
    #[Kubernetes\Attribute('addresses', required: true)]
    protected array $addresses;

    #[Kubernetes\Attribute('conditions', type: AttributeType::Model, model: EndpointConditions::class)]
    protected EndpointConditions|null $conditions = null;

    /** @var string[]|null */
    #[Kubernetes\Attribute('deprecatedTopology')]
    protected array|null $deprecatedTopology = null;

    #[Kubernetes\Attribute('hints', type: AttributeType::Model, model: EndpointHints::class)]
    protected EndpointHints|null $hints = null;

    #[Kubernetes\Attribute('hostname')]
    protected string|null $hostname = null;

    #[Kubernetes\Attribute('nodeName')]
    protected string|null $nodeName = null;

    #[Kubernetes\Attribute('targetRef', type: AttributeType::Model, model: ObjectReference::class)]
    protected ObjectReference|null $targetRef = null;

    #[Kubernetes\Attribute('zone')]
    protected string|null $zone = null;

    /** @param string[] $addresses */
    public function __construct(array $addresses)
    {
        $this->addresses = $addresses;
    }

    /**
     * addresses of this endpoint. The contents of this field are interpreted according to the
     * corresponding EndpointSlice addressType field. Consumers must handle different types of addresses in
     * the context of their own capabilities. This must contain at least one address but no more than 100.
     * These are all assumed to be fungible and clients may choose to only use the first element. Refer to:
     * https://issue.k8s.io/106267
     */
    public function getAddresses(): array
    {
        return $this->addresses;
    }

    /**
     * addresses of this endpoint. The contents of this field are interpreted according to the
     * corresponding EndpointSlice addressType field. Consumers must handle different types of addresses in
     * the context of their own capabilities. This must contain at least one address but no more than 100.
     * These are all assumed to be fungible and clients may choose to only use the first element. Refer to:
     * https://issue.k8s.io/106267
     *
     * @return static
     */
    public function setAddresses(array $addresses): static
    {
        $this->addresses = $addresses;

        return $this;
    }

    /**
     * conditions contains information about the current status of the endpoint.
     */
    public function getConditions(): EndpointConditions|null
    {
        return $this->conditions;
    }

    /**
     * conditions contains information about the current status of the endpoint.
     *
     * @return static
     */
    public function setConditions(EndpointConditions $conditions): static
    {
        $this->conditions = $conditions;

        return $this;
    }

    /**
     * deprecatedTopology contains topology information part of the v1beta1 API. This field is deprecated,
     * and will be removed when the v1beta1 API is removed (no sooner than kubernetes v1.24).  While this
     * field can hold values, it is not writable through the v1 API, and any attempts to write to it will
     * be silently ignored. Topology information can be found in the zone and nodeName fields instead.
     */
    public function getDeprecatedTopology(): array|null
    {
        return $this->deprecatedTopology;
    }

    /**
     * deprecatedTopology contains topology information part of the v1beta1 API. This field is deprecated,
     * and will be removed when the v1beta1 API is removed (no sooner than kubernetes v1.24).  While this
     * field can hold values, it is not writable through the v1 API, and any attempts to write to it will
     * be silently ignored. Topology information can be found in the zone and nodeName fields instead.
     *
     * @return static
     */
    public function setDeprecatedTopology(array $deprecatedTopology): static
    {
        $this->deprecatedTopology = $deprecatedTopology;

        return $this;
    }

    /**
     * hints contains information associated with how an endpoint should be consumed.
     */
    public function getHints(): EndpointHints|null
    {
        return $this->hints;
    }

    /**
     * hints contains information associated with how an endpoint should be consumed.
     *
     * @return static
     */
    public function setHints(EndpointHints $hints): static
    {
        $this->hints = $hints;

        return $this;
    }

    /**
     * hostname of this endpoint. This field may be used by consumers of endpoints to distinguish endpoints
     * from each other (e.g. in DNS names). Multiple endpoints which use the same hostname should be
     * considered fungible (e.g. multiple A values in DNS). Must be lowercase and pass DNS Label (RFC 1123)
     * validation.
     */
    public function getHostname(): string|null
    {
        return $this->hostname;
    }

    /**
     * hostname of this endpoint. This field may be used by consumers of endpoints to distinguish endpoints
     * from each other (e.g. in DNS names). Multiple endpoints which use the same hostname should be
     * considered fungible (e.g. multiple A values in DNS). Must be lowercase and pass DNS Label (RFC 1123)
     * validation.
     *
     * @return static
     */
    public function setHostname(string $hostname): static
    {
        $this->hostname = $hostname;

        return $this;
    }

    /**
     * nodeName represents the name of the Node hosting this endpoint. This can be used to determine
     * endpoints local to a Node.
     */
    public function getNodeName(): string|null
    {
        return $this->nodeName;
    }

    /**
     * nodeName represents the name of the Node hosting this endpoint. This can be used to determine
     * endpoints local to a Node.
     *
     * @return static
     */
    public function setNodeName(string $nodeName): static
    {
        $this->nodeName = $nodeName;

        return $this;
    }

    /**
     * targetRef is a reference to a Kubernetes object that represents this endpoint.
     */
    public function getTargetRef(): ObjectReference|null
    {
        return $this->targetRef;
    }

    /**
     * targetRef is a reference to a Kubernetes object that represents this endpoint.
     *
     * @return static
     */
    public function setTargetRef(ObjectReference $targetRef): static
    {
        $this->targetRef = $targetRef;

        return $this;
    }

    /**
     * zone is the name of the Zone this endpoint exists in.
     */
    public function getZone(): string|null
    {
        return $this->zone;
    }

    /**
     * zone is the name of the Zone this endpoint exists in.
     *
     * @return static
     */
    public function setZone(string $zone): static
    {
        $this->zone = $zone;

        return $this;
    }
}
