<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\ApiMachinery\Apis\Meta\v1;

use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;
use Kcs\K8s\Collection;

/**
 * APIVersions lists the versions that are available, to allow clients to discover the API at /api,
 * which is the root path of the legacy v1 API.
 */
#[Kubernetes\Kind('APIVersions', version: 'v1')]
class APIVersions
{
    #[Kubernetes\Attribute('apiVersion')]
    protected string|null $apiVersion = 'v1';

    #[Kubernetes\Attribute('kind')]
    protected string|null $kind = 'APIVersions';

    /** @var iterable|ServerAddressByClientCIDR[] */
    #[Kubernetes\Attribute(
        'serverAddressByClientCIDRs',
        type: AttributeType::Collection,
        model: ServerAddressByClientCIDR::class,
        required: true,
    )]
    protected iterable $serverAddressByClientCIDRs;

    /** @var string[] */
    #[Kubernetes\Attribute('versions', required: true)]
    protected array $versions;

    /**
     * @param iterable|ServerAddressByClientCIDR[] $serverAddressByClientCIDRs
     * @param string[] $versions
     */
    public function __construct(iterable $serverAddressByClientCIDRs, array $versions)
    {
        $this->serverAddressByClientCIDRs = new Collection($serverAddressByClientCIDRs);
        $this->versions = $versions;
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
    public function getServerAddressByClientCIDRs(): iterable
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
     * versions are the api versions that are available.
     */
    public function getVersions(): array
    {
        return $this->versions;
    }

    /**
     * versions are the api versions that are available.
     *
     * @return static
     */
    public function setVersions(array $versions): static
    {
        $this->versions = $versions;

        return $this;
    }
}
