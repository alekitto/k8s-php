<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Core\v1;

use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;
use Kcs\K8s\Collection;

/**
 * PodDNSConfig defines the DNS parameters of a pod in addition to those generated from DNSPolicy.
 */
class PodDNSConfig
{
    /** @var string[]|null */
    #[Kubernetes\Attribute('nameservers')]
    protected array|null $nameservers = null;

    /** @var iterable|PodDNSConfigOption[]|null */
    #[Kubernetes\Attribute('options', type: AttributeType::Collection, model: PodDNSConfigOption::class)]
    protected $options = null;

    /** @var string[]|null */
    #[Kubernetes\Attribute('searches')]
    protected array|null $searches = null;

    /**
     * @param string[]|null $nameservers
     * @param iterable|PodDNSConfigOption[] $options
     * @param string[]|null $searches
     */
    public function __construct(array|null $nameservers = null, iterable $options = [], array|null $searches = null)
    {
        $this->nameservers = $nameservers;
        $this->options = new Collection($options);
        $this->searches = $searches;
    }

    /**
     * A list of DNS name server IP addresses. This will be appended to the base nameservers generated from
     * DNSPolicy. Duplicated nameservers will be removed.
     */
    public function getNameservers(): array|null
    {
        return $this->nameservers;
    }

    /**
     * A list of DNS name server IP addresses. This will be appended to the base nameservers generated from
     * DNSPolicy. Duplicated nameservers will be removed.
     *
     * @return static
     */
    public function setNameservers(array $nameservers): static
    {
        $this->nameservers = $nameservers;

        return $this;
    }

    /**
     * A list of DNS resolver options. This will be merged with the base options generated from DNSPolicy.
     * Duplicated entries will be removed. Resolution options given in Options will override those that
     * appear in the base DNSPolicy.
     *
     * @return iterable|PodDNSConfigOption[]
     */
    public function getOptions(): iterable|null
    {
        return $this->options;
    }

    /**
     * A list of DNS resolver options. This will be merged with the base options generated from DNSPolicy.
     * Duplicated entries will be removed. Resolution options given in Options will override those that
     * appear in the base DNSPolicy.
     *
     * @return static
     */
    public function setOptions(iterable $options): static
    {
        $this->options = $options;

        return $this;
    }

    /** @return static */
    public function addOptions(PodDNSConfigOption $option): static
    {
        if (! $this->options) {
            $this->options = new Collection();
        }

        $this->options[] = $option;

        return $this;
    }

    /**
     * A list of DNS search domains for host-name lookup. This will be appended to the base search paths
     * generated from DNSPolicy. Duplicated search paths will be removed.
     */
    public function getSearches(): array|null
    {
        return $this->searches;
    }

    /**
     * A list of DNS search domains for host-name lookup. This will be appended to the base search paths
     * generated from DNSPolicy. Duplicated search paths will be removed.
     *
     * @return static
     */
    public function setSearches(array $searches): static
    {
        $this->searches = $searches;

        return $this;
    }
}
