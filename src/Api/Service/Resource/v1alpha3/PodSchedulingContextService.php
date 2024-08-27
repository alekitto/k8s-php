<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Service\Resource\v1alpha3;

use Kcs\K8s\Api\Model\Api\Resource\v1alpha3\PodSchedulingContext;
use Kcs\K8s\Api\Model\Api\Resource\v1alpha3\PodSchedulingContextList;
use Kcs\K8s\Api\Model\ApiMachinery\Apis\Meta\v1\Status;
use Kcs\K8s\Api\Model\ApiMachinery\Apis\Meta\v1\WatchEvent;
use Kcs\K8s\Contract\ApiInterface;
use Kcs\K8s\PatchInterface;

class PodSchedulingContextService
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
     * List or watch objects of kind PodSchedulingContext
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
     *
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.31/#list-podschedulingcontext-v1alpha3-resource-k8s-io
     */
    public function listResourceV1alpha3Namespaced(array $query = [], callable|object|null $handler = null): PodSchedulingContextList|null
    {
        $options['query'] = $query;
        $options['method'] = 'get';
        $options['handler'] = $handler;
        $options['model'] = PodSchedulingContextList::class;
        $uri = $this->api->buildUri(
            '/apis/resource.k8s.io/v1alpha3/namespaces/{namespace}/podschedulingcontexts',
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
     * Delete collection of PodSchedulingContext
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
     *
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.31/#delete-collection-podschedulingcontext-v1alpha3-resource-k8s-io
     */
    public function deleteResourceV1alpha3CollectionNamespaced(array $query = []): Status
    {
        $options['query'] = $query;
        $options['method'] = 'delete';
        $options['model'] = Status::class;
        $uri = $this->api->buildUri(
            '/apis/resource.k8s.io/v1alpha3/namespaces/{namespace}/podschedulingcontexts',
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
     * Create a PodSchedulingContext
     *
     * Allowed query parameters:
     *   dryRun
     *   fieldManager
     *   fieldValidation
     *   pretty
     *
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.31/#create-podschedulingcontext-v1alpha3-resource-k8s-io
     */
    public function createResourceV1alpha3Namespaced(
        PodSchedulingContext $podSchedulingContext,
        array $query = [],
    ): PodSchedulingContext {
        $options['query'] = $query;
        $options['method'] = 'post';
        $options['body'] = $podSchedulingContext;
        $options['model'] = PodSchedulingContext::class;
        $uri = $this->api->buildUri(
            '/apis/resource.k8s.io/v1alpha3/namespaces/{namespace}/podschedulingcontexts',
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
     * Read the specified PodSchedulingContext
     *
     * Allowed query parameters:
     *   pretty
     *
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.31/#read-podschedulingcontext-v1alpha3-resource-k8s-io
     */
    public function readResourceV1alpha3Namespaced(string $name, array $query = []): PodSchedulingContext
    {
        $options['query'] = $query;
        $options['method'] = 'get';
        $options['model'] = PodSchedulingContext::class;
        $uri = $this->api->buildUri(
            '/apis/resource.k8s.io/v1alpha3/namespaces/{namespace}/podschedulingcontexts/{name}',
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
     * Delete a PodSchedulingContext
     *
     * Allowed query parameters:
     *   dryRun
     *   gracePeriodSeconds
     *   orphanDependents
     *   propagationPolicy
     *   pretty
     *
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.31/#delete-podschedulingcontext-v1alpha3-resource-k8s-io
     */
    public function deleteResourceV1alpha3Namespaced(string $name, array $query = [])
    {
        $options['query'] = $query;
        $options['method'] = 'delete';
        $uri = $this->api->buildUri(
            '/apis/resource.k8s.io/v1alpha3/namespaces/{namespace}/podschedulingcontexts/{name}',
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
     * Partially update the specified PodSchedulingContext
     *
     * Allowed query parameters:
     *   dryRun
     *   fieldManager
     *   fieldValidation
     *   force
     *   pretty
     *
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.31/#patch-podschedulingcontext-v1alpha3-resource-k8s-io
     */
    public function patchResourceV1alpha3Namespaced(
        string $name,
        PatchInterface $patch,
        array $query = [],
    ): PodSchedulingContext {
        $options['query'] = $query;
        $options['method'] = 'patch';
        $options['body'] = $patch;
        $options['model'] = PodSchedulingContext::class;
        $uri = $this->api->buildUri(
            '/apis/resource.k8s.io/v1alpha3/namespaces/{namespace}/podschedulingcontexts/{name}',
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
     * Replace the specified PodSchedulingContext
     *
     * Allowed query parameters:
     *   dryRun
     *   fieldManager
     *   fieldValidation
     *   pretty
     *
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.31/#put-podschedulingcontext-v1alpha3-resource-k8s-io
     */
    public function replaceResourceV1alpha3Namespaced(
        string $name,
        PodSchedulingContext $podSchedulingContext,
        array $query = [],
    ): PodSchedulingContext {
        $options['query'] = $query;
        $options['method'] = 'put';
        $options['body'] = $podSchedulingContext;
        $options['model'] = PodSchedulingContext::class;
        $uri = $this->api->buildUri(
            '/apis/resource.k8s.io/v1alpha3/namespaces/{namespace}/podschedulingcontexts/{name}',
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
     * Read status of the specified PodSchedulingContext
     *
     * Allowed query parameters:
     *   pretty
     *
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.31/#read-podschedulingcontext-v1alpha3-resource-k8s-io
     */
    public function readResourceV1alpha3NamespacedStatus(string $name, array $query = []): PodSchedulingContext
    {
        $options['query'] = $query;
        $options['method'] = 'get';
        $options['model'] = PodSchedulingContext::class;
        $uri = $this->api->buildUri(
            '/apis/resource.k8s.io/v1alpha3/namespaces/{namespace}/podschedulingcontexts/{name}/status',
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
     * Partially update status of the specified PodSchedulingContext
     *
     * Allowed query parameters:
     *   dryRun
     *   fieldManager
     *   fieldValidation
     *   force
     *   pretty
     *
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.31/#patch-podschedulingcontext-v1alpha3-resource-k8s-io
     */
    public function patchResourceV1alpha3NamespacedStatus(
        string $name,
        PatchInterface $patch,
        array $query = [],
    ): PodSchedulingContext {
        $options['query'] = $query;
        $options['method'] = 'patch';
        $options['body'] = $patch;
        $options['model'] = PodSchedulingContext::class;
        $uri = $this->api->buildUri(
            '/apis/resource.k8s.io/v1alpha3/namespaces/{namespace}/podschedulingcontexts/{name}/status',
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
     * Replace status of the specified PodSchedulingContext
     *
     * Allowed query parameters:
     *   dryRun
     *   fieldManager
     *   fieldValidation
     *   pretty
     *
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.31/#put-podschedulingcontext-v1alpha3-resource-k8s-io
     */
    public function replaceResourceV1alpha3NamespacedStatus(
        string $name,
        PodSchedulingContext $podSchedulingContext,
        array $query = [],
    ): PodSchedulingContext {
        $options['query'] = $query;
        $options['method'] = 'put';
        $options['body'] = $podSchedulingContext;
        $options['model'] = PodSchedulingContext::class;
        $uri = $this->api->buildUri(
            '/apis/resource.k8s.io/v1alpha3/namespaces/{namespace}/podschedulingcontexts/{name}/status',
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
     * List or watch objects of kind PodSchedulingContext
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
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.31/#list-podschedulingcontext-v1alpha3-resource-k8s-io
     */
    public function listResourceV1alpha3ForAllNamespaces(
        array $query = [],
        callable|object|null $handler = null,
    ): PodSchedulingContextList|null {
        $options['query'] = $query;
        $options['method'] = 'get';
        $options['handler'] = $handler;
        $options['model'] = PodSchedulingContextList::class;
        $uri = $this->api->buildUri(
            '/apis/resource.k8s.io/v1alpha3/podschedulingcontexts',
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
     * Watch individual changes to a list of PodSchedulingContext. deprecated: use the 'watch' parameter
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
     *
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.31/#watchlist-podschedulingcontext-v1alpha3-resource-k8s-io
     */
    public function watchResourceV1alpha3NamespacedList(array $query = [], callable|object|null $handler = null): void
    {
        $options['query'] = $query;
        $options['method'] = 'get';
        $options['handler'] = $handler;
        $options['model'] = WatchEvent::class;
        $uri = $this->api->buildUri(
            '/apis/resource.k8s.io/v1alpha3/watch/namespaces/{namespace}/podschedulingcontexts',
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
     * Watch changes to an object of kind PodSchedulingContext. deprecated: use the 'watch' parameter with
     * a list operation instead, filtered to a single item with the 'fieldSelector' parameter.
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
     *
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.31/#watch-podschedulingcontext-v1alpha3-resource-k8s-io
     */
    public function watchResourceV1alpha3Namespaced(string $name, array $query = [], callable|object|null $handler = null): void
    {
        $options['query'] = $query;
        $options['method'] = 'get';
        $options['handler'] = $handler;
        $options['model'] = WatchEvent::class;
        $uri = $this->api->buildUri(
            '/apis/resource.k8s.io/v1alpha3/watch/namespaces/{namespace}/podschedulingcontexts/{name}',
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
     * Watch individual changes to a list of PodSchedulingContext. deprecated: use the 'watch' parameter
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
     *
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.31/#watchlist-podschedulingcontext-v1alpha3-resource-k8s-io
     */
    public function watchResourceV1alpha3ListForAllNamespaces(array $query = [], callable|object|null $handler = null): void
    {
        $options['query'] = $query;
        $options['method'] = 'get';
        $options['handler'] = $handler;
        $options['model'] = WatchEvent::class;
        $uri = $this->api->buildUri(
            '/apis/resource.k8s.io/v1alpha3/watch/podschedulingcontexts',
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
