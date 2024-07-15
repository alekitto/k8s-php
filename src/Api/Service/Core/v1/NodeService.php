<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Service\Core\v1;

use Kcs\K8s\Api\Model\Api\Core\v1\Node;
use Kcs\K8s\Api\Model\Api\Core\v1\NodeList;
use Kcs\K8s\Api\Model\ApiMachinery\Apis\Meta\v1\Status;
use Kcs\K8s\Api\Model\ApiMachinery\Apis\Meta\v1\WatchEvent;
use Kcs\K8s\Contract\ApiInterface;
use Kcs\K8s\PatchInterface;

/**
 * Node is a worker node in Kubernetes. Each node will have a unique identifier in the cache (i.e. in
 * etcd).
 */
class NodeService
{
    private string|null $namespace = null;

    public function __construct(private ApiInterface $api)
    {
    }

    public function useNamespace(string $namespace): self
    {
        $this->namespace = $namespace;

        return $this;
    }

    /**
     * List or watch objects of kind Node
     *
     * Allowed query parameters:
     *   allowWatchBookmarks
     *   continue
     *   fieldSelector
     *   labelSelector
     *   limit
     *   resourceVersion
     *   resourceVersionMatch
     *   sendInitialEvents
     *   timeoutSeconds
     *   watch
     *   pretty
     */
    public function list(array $query = [], callable|object|null $handler = null): NodeList|null
    {
        $options['query'] = $query;
        $options['method'] = 'get';
        $options['handler'] = $handler;
        $options['model'] = NodeList::class;
        $uri = $this->api->makeUri(
            '/api/v1/nodes',
            [],
            $query,
            $this->namespace,
        );

        return $this->api->executeHttp(
            $uri,
            'list',
            $options,
        );
    }

    /**
     * Delete collection of Node
     *
     * Allowed query parameters:
     *   continue
     *   dryRun
     *   fieldSelector
     *   gracePeriodSeconds
     *   labelSelector
     *   limit
     *   orphanDependents
     *   propagationPolicy
     *   resourceVersion
     *   resourceVersionMatch
     *   sendInitialEvents
     *   timeoutSeconds
     *   pretty
     */
    public function deleteCollection(array $query = []): Status
    {
        $options['query'] = $query;
        $options['method'] = 'delete';
        $options['model'] = Status::class;
        $uri = $this->api->makeUri(
            '/api/v1/nodes',
            [],
            $query,
            $this->namespace,
        );

        return $this->api->executeHttp(
            $uri,
            'deletecollection',
            $options,
        );
    }

    /**
     * Create a Node
     *
     * Allowed query parameters:
     *   dryRun
     *   fieldManager
     *   fieldValidation
     *   pretty
     */
    public function create(Node $node, array $query = []): Node
    {
        $options['query'] = $query;
        $options['method'] = 'post';
        $options['body'] = $node;
        $options['model'] = Node::class;
        $uri = $this->api->makeUri(
            '/api/v1/nodes',
            [],
            $query,
            $this->namespace,
        );

        return $this->api->executeHttp(
            $uri,
            'post',
            $options,
        );
    }

    /**
     * Read the specified Node
     *
     * Allowed query parameters:
     *   pretty
     */
    public function read(string $name, array $query = []): Node
    {
        $options['query'] = $query;
        $options['method'] = 'get';
        $options['model'] = Node::class;
        $uri = $this->api->makeUri(
            '/api/v1/nodes/{name}',
            ['{name}' => $name],
            $query,
            $this->namespace,
        );

        return $this->api->executeHttp(
            $uri,
            'get',
            $options,
        );
    }

    /**
     * Delete a Node
     *
     * Allowed query parameters:
     *   dryRun
     *   gracePeriodSeconds
     *   orphanDependents
     *   propagationPolicy
     *   pretty
     */
    public function delete(string $name, array $query = []): Status
    {
        $options['query'] = $query;
        $options['method'] = 'delete';
        $options['model'] = Status::class;
        $uri = $this->api->makeUri(
            '/api/v1/nodes/{name}',
            ['{name}' => $name],
            $query,
            $this->namespace,
        );

        return $this->api->executeHttp(
            $uri,
            'delete',
            $options,
        );
    }

    /**
     * Partially update the specified Node
     *
     * Allowed query parameters:
     *   dryRun
     *   fieldManager
     *   fieldValidation
     *   force
     *   pretty
     */
    public function patch(string $name, PatchInterface $patch, array $query = []): Node
    {
        $options['query'] = $query;
        $options['method'] = 'patch';
        $options['body'] = $patch;
        $options['model'] = Node::class;
        $uri = $this->api->makeUri(
            '/api/v1/nodes/{name}',
            ['{name}' => $name],
            $query,
            $this->namespace,
        );

        return $this->api->executeHttp(
            $uri,
            'patch',
            $options,
        );
    }

    /**
     * Replace the specified Node
     *
     * Allowed query parameters:
     *   dryRun
     *   fieldManager
     *   fieldValidation
     *   pretty
     */
    public function replace(string $name, Node $node, array $query = []): Node
    {
        $options['query'] = $query;
        $options['method'] = 'put';
        $options['body'] = $node;
        $options['model'] = Node::class;
        $uri = $this->api->makeUri(
            '/api/v1/nodes/{name}',
            ['{name}' => $name],
            $query,
            $this->namespace,
        );

        return $this->api->executeHttp(
            $uri,
            'put',
            $options,
        );
    }

    /**
     * Read status of the specified Node
     *
     * Allowed query parameters:
     *   pretty
     */
    public function readStatus(string $name, array $query = []): Node
    {
        $options['query'] = $query;
        $options['method'] = 'get';
        $options['model'] = Node::class;
        $uri = $this->api->makeUri(
            '/api/v1/nodes/{name}/status',
            ['{name}' => $name],
            $query,
            $this->namespace,
        );

        return $this->api->executeHttp(
            $uri,
            'get',
            $options,
        );
    }

    /**
     * Partially update status of the specified Node
     *
     * Allowed query parameters:
     *   dryRun
     *   fieldManager
     *   fieldValidation
     *   force
     *   pretty
     */
    public function patchStatus(string $name, PatchInterface $patch, array $query = []): Node
    {
        $options['query'] = $query;
        $options['method'] = 'patch';
        $options['body'] = $patch;
        $options['model'] = Node::class;
        $uri = $this->api->makeUri(
            '/api/v1/nodes/{name}/status',
            ['{name}' => $name],
            $query,
            $this->namespace,
        );

        return $this->api->executeHttp(
            $uri,
            'patch',
            $options,
        );
    }

    /**
     * Replace status of the specified Node
     *
     * Allowed query parameters:
     *   dryRun
     *   fieldManager
     *   fieldValidation
     *   pretty
     */
    public function replaceStatus(string $name, Node $node, array $query = []): Node
    {
        $options['query'] = $query;
        $options['method'] = 'put';
        $options['body'] = $node;
        $options['model'] = Node::class;
        $uri = $this->api->makeUri(
            '/api/v1/nodes/{name}/status',
            ['{name}' => $name],
            $query,
            $this->namespace,
        );

        return $this->api->executeHttp(
            $uri,
            'put',
            $options,
        );
    }

    /**
     * Watch individual changes to a list of Node. deprecated: use the 'watch' parameter with a list
     * operation instead.
     *
     * Allowed query parameters:
     *   allowWatchBookmarks
     *   continue
     *   fieldSelector
     *   labelSelector
     *   limit
     *   pretty
     *   resourceVersion
     *   resourceVersionMatch
     *   sendInitialEvents
     *   timeoutSeconds
     *   watch
     *
     * @deprecated Use the 'watch' parameter with a list operation instead.
     */
    public function watchList(array $query = [], callable|object|null $handler = null): void
    {
        $options['query'] = $query;
        $options['method'] = 'get';
        $options['handler'] = $handler;
        $options['model'] = WatchEvent::class;
        $uri = $this->api->makeUri(
            '/api/v1/watch/nodes',
            [],
            $query,
            $this->namespace,
        );

        $this->api->executeHttp(
            $uri,
            'watchlist',
            $options,
        );
    }

    /**
     * Watch changes to an object of kind Node. deprecated: use the 'watch' parameter with a list operation
     * instead, filtered to a single item with the 'fieldSelector' parameter.
     *
     * Allowed query parameters:
     *   allowWatchBookmarks
     *   continue
     *   fieldSelector
     *   labelSelector
     *   limit
     *   pretty
     *   resourceVersion
     *   resourceVersionMatch
     *   sendInitialEvents
     *   timeoutSeconds
     *   watch
     *
     * @deprecated Use the 'watch' parameter with a list operation instead, filtered to a single item with the 'fieldSelector' parameter.
     */
    public function watch(string $name, array $query = [], callable|object|null $handler = null): void
    {
        $options['query'] = $query;
        $options['method'] = 'get';
        $options['handler'] = $handler;
        $options['model'] = WatchEvent::class;
        $uri = $this->api->makeUri(
            '/api/v1/watch/nodes/{name}',
            ['{name}' => $name],
            $query,
            $this->namespace,
        );

        $this->api->executeHttp(
            $uri,
            'watch',
            $options,
        );
    }
}
