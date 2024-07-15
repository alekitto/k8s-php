<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Networking\v1;

use Kcs\K8s\Attribute as Kubernetes;

/**
 * IngressTLS describes the transport layer security associated with an ingress.
 */
class IngressTLS
{
    /** @var string[]|null */
    #[Kubernetes\Attribute('hosts')]
    protected array|null $hosts = null;

    #[Kubernetes\Attribute('secretName')]
    protected string|null $secretName = null;

    /** @param string[]|null $hosts */
    public function __construct(array|null $hosts = null, string|null $secretName = null)
    {
        $this->hosts = $hosts;
        $this->secretName = $secretName;
    }

    /**
     * hosts is a list of hosts included in the TLS certificate. The values in this list must match the
     * name/s used in the tlsSecret. Defaults to the wildcard host setting for the loadbalancer controller
     * fulfilling this Ingress, if left unspecified.
     */
    public function getHosts(): array|null
    {
        return $this->hosts;
    }

    /**
     * hosts is a list of hosts included in the TLS certificate. The values in this list must match the
     * name/s used in the tlsSecret. Defaults to the wildcard host setting for the loadbalancer controller
     * fulfilling this Ingress, if left unspecified.
     *
     * @return static
     */
    public function setHosts(array $hosts): static
    {
        $this->hosts = $hosts;

        return $this;
    }

    /**
     * secretName is the name of the secret used to terminate TLS traffic on port 443. Field is left
     * optional to allow TLS routing based on SNI hostname alone. If the SNI host in a listener conflicts
     * with the "Host" header field used by an IngressRule, the SNI host is used for termination and value
     * of the "Host" header is used for routing.
     */
    public function getSecretName(): string|null
    {
        return $this->secretName;
    }

    /**
     * secretName is the name of the secret used to terminate TLS traffic on port 443. Field is left
     * optional to allow TLS routing based on SNI hostname alone. If the SNI host in a listener conflicts
     * with the "Host" header field used by an IngressRule, the SNI host is used for termination and value
     * of the "Host" header is used for routing.
     *
     * @return static
     */
    public function setSecretName(string $secretName): static
    {
        $this->secretName = $secretName;

        return $this;
    }
}
