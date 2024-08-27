<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Service\Resource\v1alpha3;

use Kcs\K8s\Api\Model\Api\Resource\v1alpha3\ResourceSlice;
use Kcs\K8s\Api\Model\Api\Resource\v1alpha3\ResourceSliceList;
use Kcs\K8s\Api\Model\ApiMachinery\Apis\Meta\v1\Status;
use Kcs\K8s\Api\Model\ApiMachinery\Apis\Meta\v1\WatchEvent;
use Kcs\K8s\Contract\ApiInterface;
use Kcs\K8s\PatchInterface;

class ResourceSliceService
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
     * List or watch objects of kind ResourceSlice
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
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.31/#list-resourceslice-v1alpha3-resource-k8s-io
     */
    public function listResourceV1alpha3(array $query = [], callable|object|null $handler = null): ResourceSliceList|null
    {
        $options['query'] = $query;
        $options['method'] = 'get';
        $options['handler'] = $handler;
        $options['model'] = ResourceSliceList::class;
        $uri = $this->api->buildUri(
            '/apis/resource.k8s.io/v1alpha3/resourceslices',
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
     * Delete collection of ResourceSlice
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
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.31/#delete-collection-resourceslice-v1alpha3-resource-k8s-io
     */
    public function deleteResourceV1alpha3Collection(array $query = []): Status
    {
        $options['query'] = $query;
        $options['method'] = 'delete';
        $options['model'] = Status::class;
        $uri = $this->api->buildUri(
            '/apis/resource.k8s.io/v1alpha3/resourceslices',
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
     * Create a ResourceSlice
     *
     * Allowed query parameters:
     *   dryRun
     *   fieldManager
     *   fieldValidation
     *   pretty
     *
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.31/#create-resourceslice-v1alpha3-resource-k8s-io
     */
    public function createResourceV1alpha3(ResourceSlice $resourceSlice, array $query = []): ResourceSlice
    {
        $options['query'] = $query;
        $options['method'] = 'post';
        $options['body'] = $resourceSlice;
        $options['model'] = ResourceSlice::class;
        $uri = $this->api->buildUri(
            '/apis/resource.k8s.io/v1alpha3/resourceslices',
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
     * Read the specified ResourceSlice
     *
     * Allowed query parameters:
     *   pretty
     *
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.31/#read-resourceslice-v1alpha3-resource-k8s-io
     */
    public function readResourceV1alpha3(string $name, array $query = []): ResourceSlice
    {
        $options['query'] = $query;
        $options['method'] = 'get';
        $options['model'] = ResourceSlice::class;
        $uri = $this->api->buildUri(
            '/apis/resource.k8s.io/v1alpha3/resourceslices/{name}',
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
     * Delete a ResourceSlice
     *
     * Allowed query parameters:
     *   dryRun
     *   gracePeriodSeconds
     *   orphanDependents
     *   propagationPolicy
     *   pretty
     *
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.31/#delete-resourceslice-v1alpha3-resource-k8s-io
     */
    public function deleteResourceV1alpha3(string $name, array $query = [])
    {
        $options['query'] = $query;
        $options['method'] = 'delete';
        $uri = $this->api->buildUri(
            '/apis/resource.k8s.io/v1alpha3/resourceslices/{name}',
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
     * Partially update the specified ResourceSlice
     *
     * Allowed query parameters:
     *   dryRun
     *   fieldManager
     *   fieldValidation
     *   force
     *   pretty
     *
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.31/#patch-resourceslice-v1alpha3-resource-k8s-io
     */
    public function patchResourceV1alpha3(string $name, PatchInterface $patch, array $query = []): ResourceSlice
    {
        $options['query'] = $query;
        $options['method'] = 'patch';
        $options['body'] = $patch;
        $options['model'] = ResourceSlice::class;
        $uri = $this->api->buildUri(
            '/apis/resource.k8s.io/v1alpha3/resourceslices/{name}',
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
     * Replace the specified ResourceSlice
     *
     * Allowed query parameters:
     *   dryRun
     *   fieldManager
     *   fieldValidation
     *   pretty
     *
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.31/#put-resourceslice-v1alpha3-resource-k8s-io
     */
    public function replaceResourceV1alpha3(
        string $name,
        ResourceSlice $resourceSlice,
        array $query = [],
    ): ResourceSlice {
        $options['query'] = $query;
        $options['method'] = 'put';
        $options['body'] = $resourceSlice;
        $options['model'] = ResourceSlice::class;
        $uri = $this->api->buildUri(
            '/apis/resource.k8s.io/v1alpha3/resourceslices/{name}',
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
     * Watch individual changes to a list of ResourceSlice. deprecated: use the 'watch' parameter with a
     * list operation instead.
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
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.31/#watchlist-resourceslice-v1alpha3-resource-k8s-io
     */
    public function watchResourceV1alpha3List(array $query = [], callable|object|null $handler = null): void
    {
        $options['query'] = $query;
        $options['method'] = 'get';
        $options['handler'] = $handler;
        $options['model'] = WatchEvent::class;
        $uri = $this->api->buildUri(
            '/apis/resource.k8s.io/v1alpha3/watch/resourceslices',
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
     * Watch changes to an object of kind ResourceSlice. deprecated: use the 'watch' parameter with a list
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
     *
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.31/#watch-resourceslice-v1alpha3-resource-k8s-io
     */
    public function watchResourceV1alpha3(string $name, array $query = [], callable|object|null $handler = null): void
    {
        $options['query'] = $query;
        $options['method'] = 'get';
        $options['handler'] = $handler;
        $options['model'] = WatchEvent::class;
        $uri = $this->api->buildUri(
            '/apis/resource.k8s.io/v1alpha3/watch/resourceslices/{name}',
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
