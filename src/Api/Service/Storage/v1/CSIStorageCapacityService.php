<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Service\Storage\v1;

use Kcs\K8s\Api\Model\Api\Storage\v1\CSIStorageCapacity;
use Kcs\K8s\Api\Model\Api\Storage\v1\CSIStorageCapacityList;
use Kcs\K8s\Api\Model\ApiMachinery\Apis\Meta\v1\Status;
use Kcs\K8s\Api\Model\ApiMachinery\Apis\Meta\v1\WatchEvent;
use Kcs\K8s\Contract\ApiInterface;
use Kcs\K8s\PatchInterface;

class CSIStorageCapacityService
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
     * List or watch objects of kind CSIStorageCapacity
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
     */
    public function listStorageV1ForAllNamespaces(array $query = [], callable|object|null $handler = null): CSIStorageCapacityList|null
    {
        $options['query'] = $query;
        $options['method'] = 'get';
        $options['handler'] = $handler;
        $options['model'] = CSIStorageCapacityList::class;
        $uri = $this->api->makeUri(
            '/apis/storage.k8s.io/v1/csistoragecapacities',
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
     * List or watch objects of kind CSIStorageCapacity
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
    public function listStorageV1Namespaced(array $query = [], callable|object|null $handler = null): CSIStorageCapacityList|null
    {
        $options['query'] = $query;
        $options['method'] = 'get';
        $options['handler'] = $handler;
        $options['model'] = CSIStorageCapacityList::class;
        $uri = $this->api->makeUri(
            '/apis/storage.k8s.io/v1/namespaces/{namespace}/csistoragecapacities',
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
     * Delete collection of CSIStorageCapacity
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
    public function deleteStorageV1CollectionNamespaced(array $query = []): Status
    {
        $options['query'] = $query;
        $options['method'] = 'delete';
        $options['model'] = Status::class;
        $uri = $this->api->makeUri(
            '/apis/storage.k8s.io/v1/namespaces/{namespace}/csistoragecapacities',
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
     * Create a CSIStorageCapacity
     *
     * Allowed query parameters:
     *   dryRun
     *   fieldManager
     *   fieldValidation
     *   pretty
     */
    public function createStorageV1Namespaced(
        CSIStorageCapacity $cSIStorageCapacity,
        array $query = [],
    ): CSIStorageCapacity {
        $options['query'] = $query;
        $options['method'] = 'post';
        $options['body'] = $cSIStorageCapacity;
        $options['model'] = CSIStorageCapacity::class;
        $uri = $this->api->makeUri(
            '/apis/storage.k8s.io/v1/namespaces/{namespace}/csistoragecapacities',
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
     * Read the specified CSIStorageCapacity
     *
     * Allowed query parameters:
     *   pretty
     */
    public function readStorageV1Namespaced(string $name, array $query = []): CSIStorageCapacity
    {
        $options['query'] = $query;
        $options['method'] = 'get';
        $options['model'] = CSIStorageCapacity::class;
        $uri = $this->api->makeUri(
            '/apis/storage.k8s.io/v1/namespaces/{namespace}/csistoragecapacities/{name}',
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
     * Delete a CSIStorageCapacity
     *
     * Allowed query parameters:
     *   dryRun
     *   gracePeriodSeconds
     *   orphanDependents
     *   propagationPolicy
     *   pretty
     */
    public function deleteStorageV1Namespaced(string $name, array $query = []): Status
    {
        $options['query'] = $query;
        $options['method'] = 'delete';
        $options['model'] = Status::class;
        $uri = $this->api->makeUri(
            '/apis/storage.k8s.io/v1/namespaces/{namespace}/csistoragecapacities/{name}',
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
     * Partially update the specified CSIStorageCapacity
     *
     * Allowed query parameters:
     *   dryRun
     *   fieldManager
     *   fieldValidation
     *   force
     *   pretty
     */
    public function patchStorageV1Namespaced(
        string $name,
        PatchInterface $patch,
        array $query = [],
    ): CSIStorageCapacity {
        $options['query'] = $query;
        $options['method'] = 'patch';
        $options['body'] = $patch;
        $options['model'] = CSIStorageCapacity::class;
        $uri = $this->api->makeUri(
            '/apis/storage.k8s.io/v1/namespaces/{namespace}/csistoragecapacities/{name}',
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
     * Replace the specified CSIStorageCapacity
     *
     * Allowed query parameters:
     *   dryRun
     *   fieldManager
     *   fieldValidation
     *   pretty
     */
    public function replaceStorageV1Namespaced(
        string $name,
        CSIStorageCapacity $cSIStorageCapacity,
        array $query = [],
    ): CSIStorageCapacity {
        $options['query'] = $query;
        $options['method'] = 'put';
        $options['body'] = $cSIStorageCapacity;
        $options['model'] = CSIStorageCapacity::class;
        $uri = $this->api->makeUri(
            '/apis/storage.k8s.io/v1/namespaces/{namespace}/csistoragecapacities/{name}',
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
     * Watch individual changes to a list of CSIStorageCapacity. deprecated: use the 'watch' parameter with
     * a list operation instead.
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
    public function watchStorageV1ListForAllNamespaces(array $query = [], callable|object|null $handler = null): void
    {
        $options['query'] = $query;
        $options['method'] = 'get';
        $options['handler'] = $handler;
        $options['model'] = WatchEvent::class;
        $uri = $this->api->makeUri(
            '/apis/storage.k8s.io/v1/watch/csistoragecapacities',
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
     * Watch individual changes to a list of CSIStorageCapacity. deprecated: use the 'watch' parameter with
     * a list operation instead.
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
    public function watchStorageV1NamespacedList(array $query = [], callable|object|null $handler = null): void
    {
        $options['query'] = $query;
        $options['method'] = 'get';
        $options['handler'] = $handler;
        $options['model'] = WatchEvent::class;
        $uri = $this->api->makeUri(
            '/apis/storage.k8s.io/v1/watch/namespaces/{namespace}/csistoragecapacities',
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
     * Watch changes to an object of kind CSIStorageCapacity. deprecated: use the 'watch' parameter with a
     * list operation instead, filtered to a single item with the 'fieldSelector' parameter.
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
    public function watchStorageV1Namespaced(string $name, array $query = [], callable|object|null $handler = null): void
    {
        $options['query'] = $query;
        $options['method'] = 'get';
        $options['handler'] = $handler;
        $options['model'] = WatchEvent::class;
        $uri = $this->api->makeUri(
            '/apis/storage.k8s.io/v1/watch/namespaces/{namespace}/csistoragecapacities/{name}',
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
