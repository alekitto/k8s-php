<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Discovery\v1;

use Kcs\K8s\Attribute as Kubernetes;

/**
 * EndpointPort represents a Port used by an EndpointSlice
 */
class EndpointPort
{
    #[Kubernetes\Attribute('appProtocol')]
    protected string|null $appProtocol = null;

    #[Kubernetes\Attribute('name')]
    protected string|null $name = null;

    #[Kubernetes\Attribute('port')]
    protected int|null $port = null;

    #[Kubernetes\Attribute('protocol')]
    protected string|null $protocol = null;

    public function __construct(
        string|null $appProtocol = null,
        string|null $name = null,
        int|null $port = null,
        string|null $protocol = null,
    ) {
        $this->appProtocol = $appProtocol;
        $this->name = $name;
        $this->port = $port;
        $this->protocol = $protocol;
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
     * name represents the name of this port. All ports in an EndpointSlice must have a unique name. If the
     * EndpointSlice is derived from a Kubernetes service, this corresponds to the Service.ports[].name.
     * Name must either be an empty string or pass DNS_LABEL validation: * must be no more than 63
     * characters long. * must consist of lower case alphanumeric characters or '-'. * must start and end
     * with an alphanumeric character. Default is empty string.
     */
    public function getName(): string|null
    {
        return $this->name;
    }

    /**
     * name represents the name of this port. All ports in an EndpointSlice must have a unique name. If the
     * EndpointSlice is derived from a Kubernetes service, this corresponds to the Service.ports[].name.
     * Name must either be an empty string or pass DNS_LABEL validation: * must be no more than 63
     * characters long. * must consist of lower case alphanumeric characters or '-'. * must start and end
     * with an alphanumeric character. Default is empty string.
     *
     * @return static
     */
    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    /**
     * port represents the port number of the endpoint. If this is not specified, ports are not restricted
     * and must be interpreted in the context of the specific consumer.
     */
    public function getPort(): int|null
    {
        return $this->port;
    }

    /**
     * port represents the port number of the endpoint. If this is not specified, ports are not restricted
     * and must be interpreted in the context of the specific consumer.
     *
     * @return static
     */
    public function setPort(int $port): static
    {
        $this->port = $port;

        return $this;
    }

    /**
     * protocol represents the IP protocol for this port. Must be UDP, TCP, or SCTP. Default is TCP.
     */
    public function getProtocol(): string|null
    {
        return $this->protocol;
    }

    /**
     * protocol represents the IP protocol for this port. Must be UDP, TCP, or SCTP. Default is TCP.
     *
     * @return static
     */
    public function setProtocol(string $protocol): static
    {
        $this->protocol = $protocol;

        return $this;
    }
}
