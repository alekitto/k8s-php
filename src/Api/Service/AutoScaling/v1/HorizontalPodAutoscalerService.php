<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Service\AutoScaling\v1;

use Kcs\K8s\Api\Model\Api\AutoScaling\v1\HorizontalPodAutoscaler;
use Kcs\K8s\Api\Model\Api\AutoScaling\v1\HorizontalPodAutoscalerList;
use Kcs\K8s\Api\Model\ApiMachinery\Apis\Meta\v1\Status;
use Kcs\K8s\Api\Model\ApiMachinery\Apis\Meta\v1\WatchEvent;
use Kcs\K8s\Contract\ApiInterface;
use Kcs\K8s\PatchInterface;

class HorizontalPodAutoscalerService
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
     * List or watch objects of kind HorizontalPodAutoscaler
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
    public function listForAllNamespaces(array $query = [], callable|object|null $handler = null): HorizontalPodAutoscalerList|null
    {
        $options['query'] = $query;
        $options['method'] = 'get';
        $options['handler'] = $handler;
        $options['model'] = HorizontalPodAutoscalerList::class;
        $uri = $this->api->makeUri(
            '/apis/autoscaling/v1/horizontalpodautoscalers',
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
     * List or watch objects of kind HorizontalPodAutoscaler
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
    public function listNamespaced(array $query = [], callable|object|null $handler = null): HorizontalPodAutoscalerList|null
    {
        $options['query'] = $query;
        $options['method'] = 'get';
        $options['handler'] = $handler;
        $options['model'] = HorizontalPodAutoscalerList::class;
        $uri = $this->api->makeUri(
            '/apis/autoscaling/v1/namespaces/{namespace}/horizontalpodautoscalers',
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
     * Delete collection of HorizontalPodAutoscaler
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
            '/apis/autoscaling/v1/namespaces/{namespace}/horizontalpodautoscalers',
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
     * Create a HorizontalPodAutoscaler
     *
     * Allowed query parameters:
     *   dryRun
     *   fieldManager
     *   fieldValidation
     *   pretty
     */
    public function createNamespaced(
        HorizontalPodAutoscaler $horizontalPodAutoscaler,
        array $query = [],
    ): HorizontalPodAutoscaler {
        $options['query'] = $query;
        $options['method'] = 'post';
        $options['body'] = $horizontalPodAutoscaler;
        $options['model'] = HorizontalPodAutoscaler::class;
        $uri = $this->api->makeUri(
            '/apis/autoscaling/v1/namespaces/{namespace}/horizontalpodautoscalers',
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
     * Read the specified HorizontalPodAutoscaler
     *
     * Allowed query parameters:
     *   pretty
     */
    public function readNamespaced(string $name, array $query = []): HorizontalPodAutoscaler
    {
        $options['query'] = $query;
        $options['method'] = 'get';
        $options['model'] = HorizontalPodAutoscaler::class;
        $uri = $this->api->makeUri(
            '/apis/autoscaling/v1/namespaces/{namespace}/horizontalpodautoscalers/{name}',
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
     * Delete a HorizontalPodAutoscaler
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
            '/apis/autoscaling/v1/namespaces/{namespace}/horizontalpodautoscalers/{name}',
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
     * Partially update the specified HorizontalPodAutoscaler
     *
     * Allowed query parameters:
     *   dryRun
     *   fieldManager
     *   fieldValidation
     *   force
     *   pretty
     */
    public function patchNamespaced(string $name, PatchInterface $patch, array $query = []): HorizontalPodAutoscaler
    {
        $options['query'] = $query;
        $options['method'] = 'patch';
        $options['body'] = $patch;
        $options['model'] = HorizontalPodAutoscaler::class;
        $uri = $this->api->makeUri(
            '/apis/autoscaling/v1/namespaces/{namespace}/horizontalpodautoscalers/{name}',
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
     * Replace the specified HorizontalPodAutoscaler
     *
     * Allowed query parameters:
     *   dryRun
     *   fieldManager
     *   fieldValidation
     *   pretty
     */
    public function replaceNamespaced(
        string $name,
        HorizontalPodAutoscaler $horizontalPodAutoscaler,
        array $query = [],
    ): HorizontalPodAutoscaler {
        $options['query'] = $query;
        $options['method'] = 'put';
        $options['body'] = $horizontalPodAutoscaler;
        $options['model'] = HorizontalPodAutoscaler::class;
        $uri = $this->api->makeUri(
            '/apis/autoscaling/v1/namespaces/{namespace}/horizontalpodautoscalers/{name}',
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
     * Read status of the specified HorizontalPodAutoscaler
     *
     * Allowed query parameters:
     *   pretty
     */
    public function readNamespacedStatus(string $name, array $query = []): HorizontalPodAutoscaler
    {
        $options['query'] = $query;
        $options['method'] = 'get';
        $options['model'] = HorizontalPodAutoscaler::class;
        $uri = $this->api->makeUri(
            '/apis/autoscaling/v1/namespaces/{namespace}/horizontalpodautoscalers/{name}/status',
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
     * Partially update status of the specified HorizontalPodAutoscaler
     *
     * Allowed query parameters:
     *   dryRun
     *   fieldManager
     *   fieldValidation
     *   force
     *   pretty
     */
    public function patchNamespacedStatus(
        string $name,
        PatchInterface $patch,
        array $query = [],
    ): HorizontalPodAutoscaler {
        $options['query'] = $query;
        $options['method'] = 'patch';
        $options['body'] = $patch;
        $options['model'] = HorizontalPodAutoscaler::class;
        $uri = $this->api->makeUri(
            '/apis/autoscaling/v1/namespaces/{namespace}/horizontalpodautoscalers/{name}/status',
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
     * Replace status of the specified HorizontalPodAutoscaler
     *
     * Allowed query parameters:
     *   dryRun
     *   fieldManager
     *   fieldValidation
     *   pretty
     */
    public function replaceNamespacedStatus(
        string $name,
        HorizontalPodAutoscaler $horizontalPodAutoscaler,
        array $query = [],
    ): HorizontalPodAutoscaler {
        $options['query'] = $query;
        $options['method'] = 'put';
        $options['body'] = $horizontalPodAutoscaler;
        $options['model'] = HorizontalPodAutoscaler::class;
        $uri = $this->api->makeUri(
            '/apis/autoscaling/v1/namespaces/{namespace}/horizontalpodautoscalers/{name}/status',
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
     * Watch individual changes to a list of HorizontalPodAutoscaler. deprecated: use the 'watch' parameter
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
            '/apis/autoscaling/v1/watch/horizontalpodautoscalers',
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
     * Watch individual changes to a list of HorizontalPodAutoscaler. deprecated: use the 'watch' parameter
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
            '/apis/autoscaling/v1/watch/namespaces/{namespace}/horizontalpodautoscalers',
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
     * Watch changes to an object of kind HorizontalPodAutoscaler. deprecated: use the 'watch' parameter
     * with a list operation instead, filtered to a single item with the 'fieldSelector' parameter.
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
            '/apis/autoscaling/v1/watch/namespaces/{namespace}/horizontalpodautoscalers/{name}',
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
