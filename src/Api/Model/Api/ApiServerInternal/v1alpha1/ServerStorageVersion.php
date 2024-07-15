<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\ApiServerInternal\v1alpha1;

use Kcs\K8s\Attribute as Kubernetes;

/**
 * An API server instance reports the version it can decode and the version it encodes objects to when
 * persisting objects in the backend.
 */
class ServerStorageVersion
{
    #[Kubernetes\Attribute('apiServerID')]
    protected string|null $apiServerID = null;

    /** @var string[]|null */
    #[Kubernetes\Attribute('decodableVersions')]
    protected array|null $decodableVersions = null;

    #[Kubernetes\Attribute('encodingVersion')]
    protected string|null $encodingVersion = null;

    /** @var string[]|null */
    #[Kubernetes\Attribute('servedVersions')]
    protected array|null $servedVersions = null;

    /**
     * @param string[]|null $decodableVersions
     * @param string[]|null $servedVersions
     */
    public function __construct(
        string|null $apiServerID = null,
        array|null $decodableVersions = null,
        string|null $encodingVersion = null,
        array|null $servedVersions = null,
    ) {
        $this->apiServerID = $apiServerID;
        $this->decodableVersions = $decodableVersions;
        $this->encodingVersion = $encodingVersion;
        $this->servedVersions = $servedVersions;
    }

    /**
     * The ID of the reporting API server.
     */
    public function getApiServerID(): string|null
    {
        return $this->apiServerID;
    }

    /**
     * The ID of the reporting API server.
     *
     * @return static
     */
    public function setApiServerID(string $apiServerID): static
    {
        $this->apiServerID = $apiServerID;

        return $this;
    }

    /**
     * The API server can decode objects encoded in these versions. The encodingVersion must be included in
     * the decodableVersions.
     */
    public function getDecodableVersions(): array|null
    {
        return $this->decodableVersions;
    }

    /**
     * The API server can decode objects encoded in these versions. The encodingVersion must be included in
     * the decodableVersions.
     *
     * @return static
     */
    public function setDecodableVersions(array $decodableVersions): static
    {
        $this->decodableVersions = $decodableVersions;

        return $this;
    }

    /**
     * The API server encodes the object to this version when persisting it in the backend (e.g., etcd).
     */
    public function getEncodingVersion(): string|null
    {
        return $this->encodingVersion;
    }

    /**
     * The API server encodes the object to this version when persisting it in the backend (e.g., etcd).
     *
     * @return static
     */
    public function setEncodingVersion(string $encodingVersion): static
    {
        $this->encodingVersion = $encodingVersion;

        return $this;
    }

    /**
     * The API server can serve these versions. DecodableVersions must include all ServedVersions.
     */
    public function getServedVersions(): array|null
    {
        return $this->servedVersions;
    }

    /**
     * The API server can serve these versions. DecodableVersions must include all ServedVersions.
     *
     * @return static
     */
    public function setServedVersions(array $servedVersions): static
    {
        $this->servedVersions = $servedVersions;

        return $this;
    }
}
