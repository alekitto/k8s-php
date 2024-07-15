<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Networking\v1;

use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;
use Kcs\K8s\Collection;

/**
 * HTTPIngressRuleValue is a list of http selectors pointing to backends. In the example:
 * http://<host>/<path>?<searchpart> -> backend where where parts of the url correspond to RFC 3986,
 * this resource will be used to match against everything after the last '/' and before the first '?'
 * or '#'.
 */
class HTTPIngressRuleValue
{
    /** @var iterable|HTTPIngressPath[] */
    #[Kubernetes\Attribute('paths', type: AttributeType::Collection, model: HTTPIngressPath::class, required: true)]
    protected iterable $paths;

    /** @param iterable|HTTPIngressPath[] $paths */
    public function __construct(iterable $paths)
    {
        $this->paths = new Collection($paths);
    }

    /**
     * paths is a collection of paths that map requests to backends.
     *
     * @return iterable|HTTPIngressPath[]
     */
    public function getPaths(): iterable
    {
        return $this->paths;
    }

    /**
     * paths is a collection of paths that map requests to backends.
     *
     * @return static
     */
    public function setPaths(iterable $paths): static
    {
        $this->paths = $paths;

        return $this;
    }

    /** @return static */
    public function addPaths(HTTPIngressPath $path): static
    {
        if (! $this->paths) {
            $this->paths = new Collection();
        }

        $this->paths[] = $path;

        return $this;
    }
}
