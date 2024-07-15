<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Networking\v1alpha1;

use Kcs\K8s\Attribute as Kubernetes;

/**
 * ServiceCIDRSpec define the CIDRs the user wants to use for allocating ClusterIPs for Services.
 */
class ServiceCIDRSpec
{
    /** @var string[]|null */
    #[Kubernetes\Attribute('cidrs')]
    protected array|null $cidrs = null;

    /** @param string[]|null $cidrs */
    public function __construct(array|null $cidrs = null)
    {
        $this->cidrs = $cidrs;
    }

    /**
     * CIDRs defines the IP blocks in CIDR notation (e.g. "192.168.0.0/24" or "2001:db8::/64") from which
     * to assign service cluster IPs. Max of two CIDRs is allowed, one of each IP family. This field is
     * immutable.
     */
    public function getCidrs(): array|null
    {
        return $this->cidrs;
    }

    /**
     * CIDRs defines the IP blocks in CIDR notation (e.g. "192.168.0.0/24" or "2001:db8::/64") from which
     * to assign service cluster IPs. Max of two CIDRs is allowed, one of each IP family. This field is
     * immutable.
     *
     * @return static
     */
    public function setCidrs(array $cidrs): static
    {
        $this->cidrs = $cidrs;

        return $this;
    }
}
