<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Core\v1;

use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;
use Kcs\K8s\Collection;

/**
 * HTTPGetAction describes an action based on HTTP Get requests.
 */
class HTTPGetAction
{
    #[Kubernetes\Attribute('host')]
    protected string|null $host = null;

    /** @var iterable|HTTPHeader[]|null */
    #[Kubernetes\Attribute('httpHeaders', type: AttributeType::Collection, model: HTTPHeader::class)]
    protected $httpHeaders = null;

    #[Kubernetes\Attribute('path')]
    protected string|null $path = null;

    #[Kubernetes\Attribute('port', required: true)]
    protected int|string $port;

    #[Kubernetes\Attribute('scheme')]
    protected string|null $scheme = null;

    public function __construct(int|string $port)
    {
        $this->port = $port;
    }

    /**
     * Host name to connect to, defaults to the pod IP. You probably want to set "Host" in httpHeaders
     * instead.
     */
    public function getHost(): string|null
    {
        return $this->host;
    }

    /**
     * Host name to connect to, defaults to the pod IP. You probably want to set "Host" in httpHeaders
     * instead.
     *
     * @return static
     */
    public function setHost(string $host): static
    {
        $this->host = $host;

        return $this;
    }

    /**
     * Custom headers to set in the request. HTTP allows repeated headers.
     *
     * @return iterable|HTTPHeader[]
     */
    public function getHttpHeaders(): iterable|null
    {
        return $this->httpHeaders;
    }

    /**
     * Custom headers to set in the request. HTTP allows repeated headers.
     *
     * @return static
     */
    public function setHttpHeaders(iterable $httpHeaders): static
    {
        $this->httpHeaders = $httpHeaders;

        return $this;
    }

    /** @return static */
    public function addHttpHeaders(HTTPHeader $httpHeader): static
    {
        if (! $this->httpHeaders) {
            $this->httpHeaders = new Collection();
        }

        $this->httpHeaders[] = $httpHeader;

        return $this;
    }

    /**
     * Path to access on the HTTP server.
     */
    public function getPath(): string|null
    {
        return $this->path;
    }

    /**
     * Path to access on the HTTP server.
     *
     * @return static
     */
    public function setPath(string $path): static
    {
        $this->path = $path;

        return $this;
    }

    /**
     * Name or number of the port to access on the container. Number must be in the range 1 to 65535. Name
     * must be an IANA_SVC_NAME.
     */
    public function getPort(): int|string
    {
        return $this->port;
    }

    /**
     * Name or number of the port to access on the container. Number must be in the range 1 to 65535. Name
     * must be an IANA_SVC_NAME.
     *
     * @return static
     */
    public function setPort(int|string $port): static
    {
        $this->port = $port;

        return $this;
    }

    /**
     * Scheme to use for connecting to the host. Defaults to HTTP.
     */
    public function getScheme(): string|null
    {
        return $this->scheme;
    }

    /**
     * Scheme to use for connecting to the host. Defaults to HTTP.
     *
     * @return static
     */
    public function setScheme(string $scheme): static
    {
        $this->scheme = $scheme;

        return $this;
    }
}
