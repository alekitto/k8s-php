<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Networking\v1;

use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;

/**
 * HTTPIngressPath associates a path with a backend. Incoming urls matching the path are forwarded to
 * the backend.
 */
class HTTPIngressPath
{
    #[Kubernetes\Attribute('backend', type: AttributeType::Model, model: IngressBackend::class, required: true)]
    protected IngressBackend $backend;

    #[Kubernetes\Attribute('path')]
    protected string|null $path = null;

    #[Kubernetes\Attribute('pathType', required: true)]
    protected string $pathType;

    public function __construct(IngressBackend $backend, string $pathType)
    {
        $this->backend = $backend;
        $this->pathType = $pathType;
    }

    /**
     * backend defines the referenced service endpoint to which the traffic will be forwarded to.
     */
    public function getBackend(): IngressBackend
    {
        return $this->backend;
    }

    /**
     * backend defines the referenced service endpoint to which the traffic will be forwarded to.
     *
     * @return static
     */
    public function setBackend(IngressBackend $backend): static
    {
        $this->backend = $backend;

        return $this;
    }

    /**
     * path is matched against the path of an incoming request. Currently it can contain characters
     * disallowed from the conventional "path" part of a URL as defined by RFC 3986. Paths must begin with
     * a '/' and must be present when using PathType with value "Exact" or "Prefix".
     */
    public function getPath(): string|null
    {
        return $this->path;
    }

    /**
     * path is matched against the path of an incoming request. Currently it can contain characters
     * disallowed from the conventional "path" part of a URL as defined by RFC 3986. Paths must begin with
     * a '/' and must be present when using PathType with value "Exact" or "Prefix".
     *
     * @return static
     */
    public function setPath(string $path): static
    {
        $this->path = $path;

        return $this;
    }

    /**
     * pathType determines the interpretation of the path matching. PathType can be one of the following
     * values: * Exact: Matches the URL path exactly. * Prefix: Matches based on a URL path prefix split by
     * '/'. Matching is
     *   done on a path element by element basis. A path element refers is the
     *   list of labels in the path split by the '/' separator. A request is a
     *   match for path p if every p is an element-wise prefix of p of the
     *   request path. Note that if the last element of the path is a substring
     *   of the last element in request path, it is not a match (e.g. /foo/bar
     *   matches /foo/bar/baz, but does not match /foo/barbaz).
     * * ImplementationSpecific: Interpretation of the Path matching is up to
     *   the IngressClass. Implementations can treat this as a separate PathType
     *   or treat it identically to Prefix or Exact path types.
     * Implementations are required to support all path types.
     */
    public function getPathType(): string
    {
        return $this->pathType;
    }

    /**
     * pathType determines the interpretation of the path matching. PathType can be one of the following
     * values: * Exact: Matches the URL path exactly. * Prefix: Matches based on a URL path prefix split by
     * '/'. Matching is
     *   done on a path element by element basis. A path element refers is the
     *   list of labels in the path split by the '/' separator. A request is a
     *   match for path p if every p is an element-wise prefix of p of the
     *   request path. Note that if the last element of the path is a substring
     *   of the last element in request path, it is not a match (e.g. /foo/bar
     *   matches /foo/bar/baz, but does not match /foo/barbaz).
     * * ImplementationSpecific: Interpretation of the Path matching is up to
     *   the IngressClass. Implementations can treat this as a separate PathType
     *   or treat it identically to Prefix or Exact path types.
     * Implementations are required to support all path types.
     *
     * @return static
     */
    public function setPathType(string $pathType): static
    {
        $this->pathType = $pathType;

        return $this;
    }
}
