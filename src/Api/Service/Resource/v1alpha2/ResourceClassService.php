<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Service\Resource\v1alpha2;

use Kcs\K8s\Api\Model\Api\Resource\v1alpha2\ResourceClass;
use Kcs\K8s\Api\Model\Api\Resource\v1alpha2\ResourceClassList;
use Kcs\K8s\Api\Model\ApiMachinery\Apis\Meta\v1\Status;
use Kcs\K8s\Api\Model\ApiMachinery\Apis\Meta\v1\WatchEvent;
use Kcs\K8s\Contract\ApiInterface;
use Kcs\K8s\PatchInterface;

class ResourceClassService
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
     * List or watch objects of kind ResourceClass
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
    public function listResourceV1alpha2(array $query = [], callable|object|null $handler = null): ResourceClassList|null
    {
        $options['query'] = $query;
        $options['method'] = 'get';
        $options['handler'] = $handler;
        $options['model'] = ResourceClassList::class;
        $uri = $this->api->makeUri(
            '/apis/resource.k8s.io/v1alpha2/resourceclasses',
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
     * Delete collection of ResourceClass
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
    public function deleteResourceV1alpha2Collection(array $query = []): Status
    {
        $options['query'] = $query;
        $options['method'] = 'delete';
        $options['model'] = Status::class;
        $uri = $this->api->makeUri(
            '/apis/resource.k8s.io/v1alpha2/resourceclasses',
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
     * Create a ResourceClass
     *
     * Allowed query parameters:
     *   dryRun
     *   fieldManager
     *   fieldValidation
     *   pretty
     */
    public function createResourceV1alpha2(ResourceClass $resourceClass, array $query = []): ResourceClass
    {
        $options['query'] = $query;
        $options['method'] = 'post';
        $options['body'] = $resourceClass;
        $options['model'] = ResourceClass::class;
        $uri = $this->api->makeUri(
            '/apis/resource.k8s.io/v1alpha2/resourceclasses',
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
     * Read the specified ResourceClass
     *
     * Allowed query parameters:
     *   pretty
     */
    public function readResourceV1alpha2(string $name, array $query = []): ResourceClass
    {
        $options['query'] = $query;
        $options['method'] = 'get';
        $options['model'] = ResourceClass::class;
        $uri = $this->api->makeUri(
            '/apis/resource.k8s.io/v1alpha2/resourceclasses/{name}',
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
     * Delete a ResourceClass
     *
     * Allowed query parameters:
     *   dryRun
     *   gracePeriodSeconds
     *   orphanDependents
     *   propagationPolicy
     *   pretty
     */
    public function deleteResourceV1alpha2(string $name, array $query = []): ResourceClass
    {
        $options['query'] = $query;
        $options['method'] = 'delete';
        $options['model'] = ResourceClass::class;
        $uri = $this->api->makeUri(
            '/apis/resource.k8s.io/v1alpha2/resourceclasses/{name}',
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
     * Partially update the specified ResourceClass
     *
     * Allowed query parameters:
     *   dryRun
     *   fieldManager
     *   fieldValidation
     *   force
     *   pretty
     */
    public function patchResourceV1alpha2(string $name, PatchInterface $patch, array $query = []): ResourceClass
    {
        $options['query'] = $query;
        $options['method'] = 'patch';
        $options['body'] = $patch;
        $options['model'] = ResourceClass::class;
        $uri = $this->api->makeUri(
            '/apis/resource.k8s.io/v1alpha2/resourceclasses/{name}',
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
     * Replace the specified ResourceClass
     *
     * Allowed query parameters:
     *   dryRun
     *   fieldManager
     *   fieldValidation
     *   pretty
     */
    public function replaceResourceV1alpha2(
        string $name,
        ResourceClass $resourceClass,
        array $query = [],
    ): ResourceClass {
        $options['query'] = $query;
        $options['method'] = 'put';
        $options['body'] = $resourceClass;
        $options['model'] = ResourceClass::class;
        $uri = $this->api->makeUri(
            '/apis/resource.k8s.io/v1alpha2/resourceclasses/{name}',
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
     * Watch individual changes to a list of ResourceClass. deprecated: use the 'watch' parameter with a
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
     */
    public function watchResourceV1alpha2List(array $query = [], callable|object|null $handler = null): void
    {
        $options['query'] = $query;
        $options['method'] = 'get';
        $options['handler'] = $handler;
        $options['model'] = WatchEvent::class;
        $uri = $this->api->makeUri(
            '/apis/resource.k8s.io/v1alpha2/watch/resourceclasses',
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
     * Watch changes to an object of kind ResourceClass. deprecated: use the 'watch' parameter with a list
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
    public function watchResourceV1alpha2(string $name, array $query = [], callable|object|null $handler = null): void
    {
        $options['query'] = $query;
        $options['method'] = 'get';
        $options['handler'] = $handler;
        $options['model'] = WatchEvent::class;
        $uri = $this->api->makeUri(
            '/apis/resource.k8s.io/v1alpha2/watch/resourceclasses/{name}',
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
