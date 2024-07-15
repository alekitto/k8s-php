<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Service\Policy\v1;

use Kcs\K8s\Api\Model\Api\Policy\v1\PodDisruptionBudget;
use Kcs\K8s\Api\Model\Api\Policy\v1\PodDisruptionBudgetList;
use Kcs\K8s\Api\Model\ApiMachinery\Apis\Meta\v1\Status;
use Kcs\K8s\Api\Model\ApiMachinery\Apis\Meta\v1\WatchEvent;
use Kcs\K8s\Contract\ApiInterface;
use Kcs\K8s\PatchInterface;

class PodDisruptionBudgetService
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
     * List or watch objects of kind PodDisruptionBudget
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
    public function listNamespaced(array $query = [], callable|object|null $handler = null): PodDisruptionBudgetList|null
    {
        $options['query'] = $query;
        $options['method'] = 'get';
        $options['handler'] = $handler;
        $options['model'] = PodDisruptionBudgetList::class;
        $uri = $this->api->makeUri(
            '/apis/policy/v1/namespaces/{namespace}/poddisruptionbudgets',
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
     * Delete collection of PodDisruptionBudget
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
    public function deleteCollectionNamespaced(array $query = []): Status
    {
        $options['query'] = $query;
        $options['method'] = 'delete';
        $options['model'] = Status::class;
        $uri = $this->api->makeUri(
            '/apis/policy/v1/namespaces/{namespace}/poddisruptionbudgets',
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
     * Create a PodDisruptionBudget
     *
     * Allowed query parameters:
     *   dryRun
     *   fieldManager
     *   fieldValidation
     *   pretty
     */
    public function createNamespaced(PodDisruptionBudget $podDisruptionBudget, array $query = []): PodDisruptionBudget
    {
        $options['query'] = $query;
        $options['method'] = 'post';
        $options['body'] = $podDisruptionBudget;
        $options['model'] = PodDisruptionBudget::class;
        $uri = $this->api->makeUri(
            '/apis/policy/v1/namespaces/{namespace}/poddisruptionbudgets',
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
     * Read the specified PodDisruptionBudget
     *
     * Allowed query parameters:
     *   pretty
     */
    public function readNamespaced(string $name, array $query = []): PodDisruptionBudget
    {
        $options['query'] = $query;
        $options['method'] = 'get';
        $options['model'] = PodDisruptionBudget::class;
        $uri = $this->api->makeUri(
            '/apis/policy/v1/namespaces/{namespace}/poddisruptionbudgets/{name}',
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
     * Delete a PodDisruptionBudget
     *
     * Allowed query parameters:
     *   dryRun
     *   gracePeriodSeconds
     *   orphanDependents
     *   propagationPolicy
     *   pretty
     */
    public function deleteNamespaced(string $name, array $query = []): Status
    {
        $options['query'] = $query;
        $options['method'] = 'delete';
        $options['model'] = Status::class;
        $uri = $this->api->makeUri(
            '/apis/policy/v1/namespaces/{namespace}/poddisruptionbudgets/{name}',
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
     * Partially update the specified PodDisruptionBudget
     *
     * Allowed query parameters:
     *   dryRun
     *   fieldManager
     *   fieldValidation
     *   force
     *   pretty
     */
    public function patchNamespaced(string $name, PatchInterface $patch, array $query = []): PodDisruptionBudget
    {
        $options['query'] = $query;
        $options['method'] = 'patch';
        $options['body'] = $patch;
        $options['model'] = PodDisruptionBudget::class;
        $uri = $this->api->makeUri(
            '/apis/policy/v1/namespaces/{namespace}/poddisruptionbudgets/{name}',
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
     * Replace the specified PodDisruptionBudget
     *
     * Allowed query parameters:
     *   dryRun
     *   fieldManager
     *   fieldValidation
     *   pretty
     */
    public function replaceNamespaced(
        string $name,
        PodDisruptionBudget $podDisruptionBudget,
        array $query = [],
    ): PodDisruptionBudget {
        $options['query'] = $query;
        $options['method'] = 'put';
        $options['body'] = $podDisruptionBudget;
        $options['model'] = PodDisruptionBudget::class;
        $uri = $this->api->makeUri(
            '/apis/policy/v1/namespaces/{namespace}/poddisruptionbudgets/{name}',
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
     * Read status of the specified PodDisruptionBudget
     *
     * Allowed query parameters:
     *   pretty
     */
    public function readNamespacedStatus(string $name, array $query = []): PodDisruptionBudget
    {
        $options['query'] = $query;
        $options['method'] = 'get';
        $options['model'] = PodDisruptionBudget::class;
        $uri = $this->api->makeUri(
            '/apis/policy/v1/namespaces/{namespace}/poddisruptionbudgets/{name}/status',
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
     * Partially update status of the specified PodDisruptionBudget
     *
     * Allowed query parameters:
     *   dryRun
     *   fieldManager
     *   fieldValidation
     *   force
     *   pretty
     */
    public function patchNamespacedStatus(string $name, PatchInterface $patch, array $query = []): PodDisruptionBudget
    {
        $options['query'] = $query;
        $options['method'] = 'patch';
        $options['body'] = $patch;
        $options['model'] = PodDisruptionBudget::class;
        $uri = $this->api->makeUri(
            '/apis/policy/v1/namespaces/{namespace}/poddisruptionbudgets/{name}/status',
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
     * Replace status of the specified PodDisruptionBudget
     *
     * Allowed query parameters:
     *   dryRun
     *   fieldManager
     *   fieldValidation
     *   pretty
     */
    public function replaceNamespacedStatus(
        string $name,
        PodDisruptionBudget $podDisruptionBudget,
        array $query = [],
    ): PodDisruptionBudget {
        $options['query'] = $query;
        $options['method'] = 'put';
        $options['body'] = $podDisruptionBudget;
        $options['model'] = PodDisruptionBudget::class;
        $uri = $this->api->makeUri(
            '/apis/policy/v1/namespaces/{namespace}/poddisruptionbudgets/{name}/status',
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
     * List or watch objects of kind PodDisruptionBudget
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
    public function listForAllNamespaces(array $query = [], callable|object|null $handler = null): PodDisruptionBudgetList|null
    {
        $options['query'] = $query;
        $options['method'] = 'get';
        $options['handler'] = $handler;
        $options['model'] = PodDisruptionBudgetList::class;
        $uri = $this->api->makeUri(
            '/apis/policy/v1/poddisruptionbudgets',
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
     * Watch individual changes to a list of PodDisruptionBudget. deprecated: use the 'watch' parameter
     * with a list operation instead.
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
    public function watchNamespacedList(array $query = [], callable|object|null $handler = null): void
    {
        $options['query'] = $query;
        $options['method'] = 'get';
        $options['handler'] = $handler;
        $options['model'] = WatchEvent::class;
        $uri = $this->api->makeUri(
            '/apis/policy/v1/watch/namespaces/{namespace}/poddisruptionbudgets',
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
     * Watch changes to an object of kind PodDisruptionBudget. deprecated: use the 'watch' parameter with a
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
    public function watchNamespaced(string $name, array $query = [], callable|object|null $handler = null): void
    {
        $options['query'] = $query;
        $options['method'] = 'get';
        $options['handler'] = $handler;
        $options['model'] = WatchEvent::class;
        $uri = $this->api->makeUri(
            '/apis/policy/v1/watch/namespaces/{namespace}/poddisruptionbudgets/{name}',
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

    /**
     * Watch individual changes to a list of PodDisruptionBudget. deprecated: use the 'watch' parameter
     * with a list operation instead.
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
    public function watchListForAllNamespaces(array $query = [], callable|object|null $handler = null): void
    {
        $options['query'] = $query;
        $options['method'] = 'get';
        $options['handler'] = $handler;
        $options['model'] = WatchEvent::class;
        $uri = $this->api->makeUri(
            '/apis/policy/v1/watch/poddisruptionbudgets',
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
}
