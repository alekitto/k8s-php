<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Networking\v1;

use Kcs\K8s\Attribute as Kubernetes;

/**
 * IPBlock describes a particular CIDR (Ex. "192.168.1.0/24","2001:db8::/64") that is allowed to the
 * pods matched by a NetworkPolicySpec's podSelector. The except entry describes CIDRs that should not
 * be included within this rule.
 */
class IPBlock
{
    #[Kubernetes\Attribute('cidr', required: true)]
    protected string $cidr;

    /** @var string[]|null */
    #[Kubernetes\Attribute('except')]
    protected array|null $except = null;

    public function __construct(string $cidr)
    {
        $this->cidr = $cidr;
    }

    /**
     * cidr is a string representing the IPBlock Valid examples are "192.168.1.0/24" or "2001:db8::/64"
     */
    public function getCidr(): string
    {
        return $this->cidr;
    }

    /**
     * cidr is a string representing the IPBlock Valid examples are "192.168.1.0/24" or "2001:db8::/64"
     *
     * @return static
     */
    public function setCidr(string $cidr): static
    {
        $this->cidr = $cidr;

        return $this;
    }

    /**
     * except is a slice of CIDRs that should not be included within an IPBlock Valid examples are
     * "192.168.1.0/24" or "2001:db8::/64" Except values will be rejected if they are outside the cidr
     * range
     */
    public function getExcept(): array|null
    {
        return $this->except;
    }

    /**
     * except is a slice of CIDRs that should not be included within an IPBlock Valid examples are
     * "192.168.1.0/24" or "2001:db8::/64" Except values will be rejected if they are outside the cidr
     * range
     *
     * @return static
     */
    public function setExcept(array $except): static
    {
        $this->except = $except;

        return $this;
    }
}
