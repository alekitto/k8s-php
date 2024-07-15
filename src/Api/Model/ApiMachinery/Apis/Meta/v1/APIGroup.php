<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\ApiMachinery\Apis\Meta\v1;

use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;
use Kcs\K8s\Collection;

/**
 * APIGroup contains the name, the supported versions, and the preferred version of a group.
 */
#[Kubernetes\Kind('APIGroup', version: 'v1')]
class APIGroup
{
    #[Kubernetes\Attribute('apiVersion')]
    protected string|null $apiVersion = 'v1';

    #[Kubernetes\Attribute('kind')]
    protected string|null $kind = 'APIGroup';

    #[Kubernetes\Attribute('name', required: true)]
    protected string $name;

    #[Kubernetes\Attribute('preferredVersion', type: AttributeType::Model, model: GroupVersionForDiscovery::class)]
    protected GroupVersionForDiscovery|null $preferredVersion = null;

    /** @var iterable|ServerAddressByClientCIDR[]|null */
    #[Kubernetes\Attribute(
        'serverAddressByClientCIDRs',
        type: AttributeType::Collection,
        model: ServerAddressByClientCIDR::class,
    )]
    protected $serverAddressByClientCIDRs = null;

    /** @var iterable|GroupVersionForDiscovery[] */
    #[Kubernetes\Attribute('versions', type: AttributeType::Collection, model: GroupVersionForDiscovery::class, required: true)]
    protected iterable $versions;

    /** @param iterable|GroupVersionForDiscovery[] $versions */
    public function __construct(string $name, iterable $versions)
    {
        $this->name = $name;
        $this->versions = new Collection($versions);
    }

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
     * name is the name of the group.
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * name is the name of the group.
     *
     * @return static
     */
    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    /**
     * preferredVersion is the version preferred by the API server, which probably is the storage version.
     */
    public function getPreferredVersion(): GroupVersionForDiscovery|null
    {
        return $this->preferredVersion;
    }

    /**
     * preferredVersion is the version preferred by the API server, which probably is the storage version.
     *
     * @return static
     */
    public function setPreferredVersion(GroupVersionForDiscovery $preferredVersion): static
    {
        $this->preferredVersion = $preferredVersion;

        return $this;
    }

    /**
     * a map of client CIDR to server address that is serving this group. This is to help clients reach
     * servers in the most network-efficient way possible. Clients can use the appropriate server address
     * as per the CIDR that they match. In case of multiple matches, clients should use the longest
     * matching CIDR. The server returns only those CIDRs that it thinks that the client can match. For
     * example: the master will return an internal IP CIDR only, if the client reaches the server using an
     * internal IP. Server looks at X-Forwarded-For header or X-Real-Ip header or request.RemoteAddr (in
     * that order) to get the client IP.
     *
     * @return iterable|ServerAddressByClientCIDR[]
     */
    public function getServerAddressByClientCIDRs(): iterable|null
    {
        return $this->serverAddressByClientCIDRs;
    }

    /**
     * a map of client CIDR to server address that is serving this group. This is to help clients reach
     * servers in the most network-efficient way possible. Clients can use the appropriate server address
     * as per the CIDR that they match. In case of multiple matches, clients should use the longest
     * matching CIDR. The server returns only those CIDRs that it thinks that the client can match. For
     * example: the master will return an internal IP CIDR only, if the client reaches the server using an
     * internal IP. Server looks at X-Forwarded-For header or X-Real-Ip header or request.RemoteAddr (in
     * that order) to get the client IP.
     *
     * @return static
     */
    public function setServerAddressByClientCIDRs(iterable $serverAddressByClientCIDRs): static
    {
        $this->serverAddressByClientCIDRs = $serverAddressByClientCIDRs;

        return $this;
    }

    /** @return static */
    public function addServerAddressByClientCIDRs(ServerAddressByClientCIDR $serverAddressByClientCIDR): static
    {
        if (! $this->serverAddressByClientCIDRs) {
            $this->serverAddressByClientCIDRs = new Collection();
        }

        $this->serverAddressByClientCIDRs[] = $serverAddressByClientCIDR;

        return $this;
    }

    /**
     * versions are the versions supported in this group.
     *
     * @return iterable|GroupVersionForDiscovery[]
     */
    public function getVersions(): iterable
    {
        return $this->versions;
    }

    /**
     * versions are the versions supported in this group.
     *
     * @return static
     */
    public function setVersions(iterable $versions): static
    {
        $this->versions = $versions;

        return $this;
    }

    /** @return static */
    public function addVersions(GroupVersionForDiscovery $version): static
    {
        if (! $this->versions) {
            $this->versions = new Collection();
        }

        $this->versions[] = $version;

        return $this;
    }
}
