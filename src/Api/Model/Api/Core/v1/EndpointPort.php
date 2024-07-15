<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Core\v1;

use Kcs\K8s\Attribute as Kubernetes;

/**
 * EndpointPort is a tuple that describes a single port.
 */
class EndpointPort
{
    #[Kubernetes\Attribute('appProtocol')]
    protected string|null $appProtocol = null;

    #[Kubernetes\Attribute('name')]
    protected string|null $name = null;

    #[Kubernetes\Attribute('port', required: true)]
    protected int $port;

    #[Kubernetes\Attribute('protocol')]
    protected string|null $protocol = null;

    public function __construct(int $port)
    {
        $this->port = $port;
    }

    /**
     * The application protocol for this port. This is used as a hint for implementations to offer richer
     * behavior for protocols that they understand. This field follows standard Kubernetes label syntax.
     * Valid values are either:
     *
     * * Un-prefixed protocol names - reserved for IANA standard service names (as per RFC-6335 and
     * https://www.iana.org/assignments/service-names).
     *
     * * Kubernetes-defined prefixed names:
     *   * 'kubernetes.io/h2c' - HTTP/2 prior knowledge over cleartext as described in
     * https://www.rfc-editor.org/rfc/rfc9113.html#name-starting-http-2-with-prior-
     *   * 'kubernetes.io/ws'  - WebSocket over cleartext as described in
     * https://www.rfc-editor.org/rfc/rfc6455
     *   * 'kubernetes.io/wss' - WebSocket over TLS as described in https://www.rfc-editor.org/rfc/rfc6455
     *
     * * Other protocols should use implementation-defined prefixed names such as
     * mycompany.com/my-custom-protocol.
     */
    public function getAppProtocol(): string|null
    {
        return $this->appProtocol;
    }

    /**
     * The application protocol for this port. This is used as a hint for implementations to offer richer
     * behavior for protocols that they understand. This field follows standard Kubernetes label syntax.
     * Valid values are either:
     *
     * * Un-prefixed protocol names - reserved for IANA standard service names (as per RFC-6335 and
     * https://www.iana.org/assignments/service-names).
     *
     * * Kubernetes-defined prefixed names:
     *   * 'kubernetes.io/h2c' - HTTP/2 prior knowledge over cleartext as described in
     * https://www.rfc-editor.org/rfc/rfc9113.html#name-starting-http-2-with-prior-
     *   * 'kubernetes.io/ws'  - WebSocket over cleartext as described in
     * https://www.rfc-editor.org/rfc/rfc6455
     *   * 'kubernetes.io/wss' - WebSocket over TLS as described in https://www.rfc-editor.org/rfc/rfc6455
     *
     * * Other protocols should use implementation-defined prefixed names such as
     * mycompany.com/my-custom-protocol.
     *
     * @return static
     */
    public function setAppProtocol(string $appProtocol): static
    {
        $this->appProtocol = $appProtocol;

        return $this;
    }

    /**
     * The name of this port.  This must match the 'name' field in the corresponding ServicePort. Must be a
     * DNS_LABEL. Optional only if one port is defined.
     */
    public function getName(): string|null
    {
        return $this->name;
    }

    /**
     * The name of this port.  This must match the 'name' field in the corresponding ServicePort. Must be a
     * DNS_LABEL. Optional only if one port is defined.
     *
     * @return static
     */
    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    /**
     * The port number of the endpoint.
     */
    public function getPort(): int
    {
        return $this->port;
    }

    /**
     * The port number of the endpoint.
     *
     * @return static
     */
    public function setPort(int $port): static
    {
        $this->port = $port;

        return $this;
    }

    /**
     * The IP protocol for this port. Must be UDP, TCP, or SCTP. Default is TCP.
     */
    public function getProtocol(): string|null
    {
        return $this->protocol;
    }

    /**
     * The IP protocol for this port. Must be UDP, TCP, or SCTP. Default is TCP.
     *
     * @return static
     */
    public function setProtocol(string $protocol): static
    {
        $this->protocol = $protocol;

        return $this;
    }
}
