<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Service\Core\v1;

use Kcs\K8s\Api\Model\Api\Core\v1\K8sNamespace;
use Kcs\K8s\Api\Model\Api\Core\v1\NamespaceList;
use Kcs\K8s\Api\Model\ApiMachinery\Apis\Meta\v1\Status;
use Kcs\K8s\Api\Model\ApiMachinery\Apis\Meta\v1\WatchEvent;
use Kcs\K8s\Contract\ApiInterface;
use Kcs\K8s\PatchInterface;

/**
 * Namespace provides a scope for Names. Use of multiple namespaces is optional.
 */
class NamespaceService
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
     * List or watch objects of kind Namespace
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
    public function list(array $query = [], callable|object|null $handler = null): NamespaceList|null
    {
        $options['query'] = $query;
        $options['method'] = 'get';
        $options['handler'] = $handler;
        $options['model'] = NamespaceList::class;
        $uri = $this->api->makeUri(
            '/api/v1/namespaces',
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
     * Create a Namespace
     *
     * Allowed query parameters:
     *   dryRun
     *   fieldManager
     *   fieldValidation
     *   pretty
     */
    public function create(K8sNamespace $k8sNamespace, array $query = []): K8sNamespace
    {
        $options['query'] = $query;
        $options['method'] = 'post';
        $options['body'] = $k8sNamespace;
        $options['model'] = K8sNamespace::class;
        $uri = $this->api->makeUri(
            '/api/v1/namespaces',
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
     * Read the specified Namespace
     *
     * Allowed query parameters:
     *   pretty
     */
    public function read(string $name, array $query = []): K8sNamespace
    {
        $options['query'] = $query;
        $options['method'] = 'get';
        $options['model'] = K8sNamespace::class;
        $uri = $this->api->makeUri(
            '/api/v1/namespaces/{name}',
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
     * Delete a Namespace
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
            '/api/v1/namespaces/{name}',
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
     * Partially update the specified Namespace
     *
     * Allowed query parameters:
     *   dryRun
     *   fieldManager
     *   fieldValidation
     *   force
     *   pretty
     */
    public function patch(string $name, PatchInterface $patch, array $query = []): K8sNamespace
    {
        $options['query'] = $query;
        $options['method'] = 'patch';
        $options['body'] = $patch;
        $options['model'] = K8sNamespace::class;
        $uri = $this->api->makeUri(
            '/api/v1/namespaces/{name}',
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
     * Replace the specified Namespace
     *
     * Allowed query parameters:
     *   dryRun
     *   fieldManager
     *   fieldValidation
     *   pretty
     */
    public function replace(string $name, K8sNamespace $k8sNamespace, array $query = []): K8sNamespace
    {
        $options['query'] = $query;
        $options['method'] = 'put';
        $options['body'] = $k8sNamespace;
        $options['model'] = K8sNamespace::class;
        $uri = $this->api->makeUri(
            '/api/v1/namespaces/{name}',
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
     * Replace finalize of the specified Namespace
     *
     * Allowed query parameters:
     *   dryRun
     *   fieldManager
     *   fieldValidation
     *   pretty
     */
    public function replaceFinalize(string $name, K8sNamespace $k8sNamespace, array $query = []): K8sNamespace
    {
        $options['query'] = $query;
        $options['method'] = 'put';
        $options['body'] = $k8sNamespace;
        $options['model'] = K8sNamespace::class;
        $uri = $this->api->makeUri(
            '/api/v1/namespaces/{name}/finalize',
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
     * Read status of the specified Namespace
     *
     * Allowed query parameters:
     *   pretty
     */
    public function readStatus(string $name, array $query = []): K8sNamespace
    {
        $options['query'] = $query;
        $options['method'] = 'get';
        $options['model'] = K8sNamespace::class;
        $uri = $this->api->makeUri(
            '/api/v1/namespaces/{name}/status',
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
     * Partially update status of the specified Namespace
     *
     * Allowed query parameters:
     *   dryRun
     *   fieldManager
     *   fieldValidation
     *   force
     *   pretty
     */
    public function patchStatus(string $name, PatchInterface $patch, array $query = []): K8sNamespace
    {
        $options['query'] = $query;
        $options['method'] = 'patch';
        $options['body'] = $patch;
        $options['model'] = K8sNamespace::class;
        $uri = $this->api->makeUri(
            '/api/v1/namespaces/{name}/status',
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
     * Replace status of the specified Namespace
     *
     * Allowed query parameters:
     *   dryRun
     *   fieldManager
     *   fieldValidation
     *   pretty
     */
    public function replaceStatus(string $name, K8sNamespace $k8sNamespace, array $query = []): K8sNamespace
    {
        $options['query'] = $query;
        $options['method'] = 'put';
        $options['body'] = $k8sNamespace;
        $options['model'] = K8sNamespace::class;
        $uri = $this->api->makeUri(
            '/api/v1/namespaces/{name}/status',
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
     * Watch individual changes to a list of Namespace. deprecated: use the 'watch' parameter with a list
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
            '/api/v1/watch/namespaces',
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
     * Watch changes to an object of kind Namespace. deprecated: use the 'watch' parameter with a list
     * operation instead, filtered to a single item with the 'fieldSelector' parameter.
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
            '/api/v1/watch/namespaces/{name}',
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
