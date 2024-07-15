<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\ApiMachinery\Apis\Meta\v1;

use Kcs\K8s\Attribute as Kubernetes;

/**
 * GroupVersion contains the "group/version" and "version" string of a version. It is made a struct to
 * keep extensibility.
 */
class GroupVersionForDiscovery
{
    #[Kubernetes\Attribute('groupVersion', required: true)]
    protected string $groupVersion;

    #[Kubernetes\Attribute('version', required: true)]
    protected string $version;

    public function __construct(string $groupVersion, string $version)
    {
        $this->groupVersion = $groupVersion;
        $this->version = $version;
    }

    /**
     * groupVersion specifies the API group and version in the form "group/version"
     */
    public function getGroupVersion(): string
    {
        return $this->groupVersion;
    }

    /**
     * groupVersion specifies the API group and version in the form "group/version"
     *
     * @return static
     */
    public function setGroupVersion(string $groupVersion): static
    {
        $this->groupVersion = $groupVersion;

        return $this;
    }

    /**
     * version specifies the version in the form of "version". This is to save the clients the trouble of
     * splitting the GroupVersion.
     */
    public function getVersion(): string
    {
        return $this->version;
    }

    /**
     * version specifies the version in the form of "version". This is to save the clients the trouble of
     * splitting the GroupVersion.
     *
     * @return static
     */
    public function setVersion(string $version): static
    {
        $this->version = $version;

        return $this;
    }
}
