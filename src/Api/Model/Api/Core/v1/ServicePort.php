<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Core\v1;

use Kcs\K8s\Attribute as Kubernetes;

/**
 * ServicePort contains information on service's port.
 */
class ServicePort
{
    #[Kubernetes\Attribute('appProtocol')]
    protected string|null $appProtocol = null;

    #[Kubernetes\Attribute('name')]
    protected string|null $name = null;

    #[Kubernetes\Attribute('nodePort')]
    protected int|null $nodePort = null;

    #[Kubernetes\Attribute('port', required: true)]
    protected int $port;

    #[Kubernetes\Attribute('protocol')]
    protected string|null $protocol = null;

    #[Kubernetes\Attribute('targetPort')]
    protected int|string|null $targetPort = null;

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
     * The name of this port within the service. This must be a DNS_LABEL. All ports within a ServiceSpec
     * must have unique names. When considering the endpoints for a Service, this must match the 'name'
     * field in the EndpointPort. Optional if only one ServicePort is defined on this service.
     */
    public function getName(): string|null
    {
        return $this->name;
    }

    /**
     * The name of this port within the service. This must be a DNS_LABEL. All ports within a ServiceSpec
     * must have unique names. When considering the endpoints for a Service, this must match the 'name'
     * field in the EndpointPort. Optional if only one ServicePort is defined on this service.
     *
     * @return static
     */
    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    /**
     * The port on each node on which this service is exposed when type is NodePort or LoadBalancer.
     * Usually assigned by the system. If a value is specified, in-range, and not in use it will be used,
     * otherwise the operation will fail.  If not specified, a port will be allocated if this Service
     * requires one.  If this field is specified when creating a Service which does not need it, creation
     * will fail. This field will be wiped when updating a Service to no longer need it (e.g. changing type
     * from NodePort to ClusterIP). More info:
     * https://kubernetes.io/docs/concepts/services-networking/service/#type-nodeport
     */
    public function getNodePort(): int|null
    {
        return $this->nodePort;
    }

    /**
     * The port on each node on which this service is exposed when type is NodePort or LoadBalancer.
     * Usually assigned by the system. If a value is specified, in-range, and not in use it will be used,
     * otherwise the operation will fail.  If not specified, a port will be allocated if this Service
     * requires one.  If this field is specified when creating a Service which does not need it, creation
     * will fail. This field will be wiped when updating a Service to no longer need it (e.g. changing type
     * from NodePort to ClusterIP). More info:
     * https://kubernetes.io/docs/concepts/services-networking/service/#type-nodeport
     *
     * @return static
     */
    public function setNodePort(int $nodePort): static
    {
        $this->nodePort = $nodePort;

        return $this;
    }

    /**
     * The port that will be exposed by this service.
     */
    public function getPort(): int
    {
        return $this->port;
    }

    /**
     * The port that will be exposed by this service.
     *
     * @return static
     */
    public function setPort(int $port): static
    {
        $this->port = $port;

        return $this;
    }

    /**
     * The IP protocol for this port. Supports "TCP", "UDP", and "SCTP". Default is TCP.
     */
    public function getProtocol(): string|null
    {
        return $this->protocol;
    }

    /**
     * The IP protocol for this port. Supports "TCP", "UDP", and "SCTP". Default is TCP.
     *
     * @return static
     */
    public function setProtocol(string $protocol): static
    {
        $this->protocol = $protocol;

        return $this;
    }

    /**
     * Number or name of the port to access on the pods targeted by the service. Number must be in the
     * range 1 to 65535. Name must be an IANA_SVC_NAME. If this is a string, it will be looked up as a
     * named port in the target Pod's container ports. If this is not specified, the value of the 'port'
     * field is used (an identity map). This field is ignored for services with clusterIP=None, and should
     * be omitted or set equal to the 'port' field. More info:
     * https://kubernetes.io/docs/concepts/services-networking/service/#defining-a-service
     */
    public function getTargetPort(): int|string
    {
        return $this->targetPort;
    }

    /**
     * Number or name of the port to access on the pods targeted by the service. Number must be in the
     * range 1 to 65535. Name must be an IANA_SVC_NAME. If this is a string, it will be looked up as a
     * named port in the target Pod's container ports. If this is not specified, the value of the 'port'
     * field is used (an identity map). This field is ignored for services with clusterIP=None, and should
     * be omitted or set equal to the 'port' field. More info:
     * https://kubernetes.io/docs/concepts/services-networking/service/#defining-a-service
     *
     * @return static
     */
    public function setTargetPort(int|string $targetPort): static
    {
        $this->targetPort = $targetPort;

        return $this;
    }
}
