<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Service\Resource\v1alpha2;

use Kcs\K8s\Api\Model\Api\Resource\v1alpha2\ResourceClaimParameters;
use Kcs\K8s\Api\Model\Api\Resource\v1alpha2\ResourceClaimParametersList;
use Kcs\K8s\Api\Model\ApiMachinery\Apis\Meta\v1\Status;
use Kcs\K8s\Api\Model\ApiMachinery\Apis\Meta\v1\WatchEvent;
use Kcs\K8s\Contract\ApiInterface;
use Kcs\K8s\PatchInterface;

class ResourceClaimParametersService
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
     * List or watch objects of kind ResourceClaimParameters
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
    public function listResourceV1alpha2Namespaced(array $query = [], callable|object|null $handler = null): ResourceClaimParametersList|null
    {
        $options['query'] = $query;
        $options['method'] = 'get';
        $options['handler'] = $handler;
        $options['model'] = ResourceClaimParametersList::class;
        $uri = $this->api->makeUri(
            '/apis/resource.k8s.io/v1alpha2/namespaces/{namespace}/resourceclaimparameters',
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
     * Delete collection of ResourceClaimParameters
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
    public function deleteResourceV1alpha2CollectionNamespaced(array $query = []): Status
    {
        $options['query'] = $query;
        $options['method'] = 'delete';
        $options['model'] = Status::class;
        $uri = $this->api->makeUri(
            '/apis/resource.k8s.io/v1alpha2/namespaces/{namespace}/resourceclaimparameters',
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
     * Create ResourceClaimParameters
     *
     * Allowed query parameters:
     *   dryRun
     *   fieldManager
     *   fieldValidation
     *   pretty
     */
    public function createResourceV1alpha2Namespaced(
        ResourceClaimParameters $resourceClaimParameters,
        array $query = [],
    ): ResourceClaimParameters {
        $options['query'] = $query;
        $options['method'] = 'post';
        $options['body'] = $resourceClaimParameters;
        $options['model'] = ResourceClaimParameters::class;
        $uri = $this->api->makeUri(
            '/apis/resource.k8s.io/v1alpha2/namespaces/{namespace}/resourceclaimparameters',
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
     * Read the specified ResourceClaimParameters
     *
     * Allowed query parameters:
     *   pretty
     */
    public function readResourceV1alpha2Namespaced(string $name, array $query = []): ResourceClaimParameters
    {
        $options['query'] = $query;
        $options['method'] = 'get';
        $options['model'] = ResourceClaimParameters::class;
        $uri = $this->api->makeUri(
            '/apis/resource.k8s.io/v1alpha2/namespaces/{namespace}/resourceclaimparameters/{name}',
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
     * Delete ResourceClaimParameters
     *
     * Allowed query parameters:
     *   dryRun
     *   gracePeriodSeconds
     *   orphanDependents
     *   propagationPolicy
     *   pretty
     */
    public function deleteResourceV1alpha2Namespaced(string $name, array $query = []): ResourceClaimParameters
    {
        $options['query'] = $query;
        $options['method'] = 'delete';
        $options['model'] = ResourceClaimParameters::class;
        $uri = $this->api->makeUri(
            '/apis/resource.k8s.io/v1alpha2/namespaces/{namespace}/resourceclaimparameters/{name}',
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
     * Partially update the specified ResourceClaimParameters
     *
     * Allowed query parameters:
     *   dryRun
     *   fieldManager
     *   fieldValidation
     *   force
     *   pretty
     */
    public function patchResourceV1alpha2Namespaced(
        string $name,
        PatchInterface $patch,
        array $query = [],
    ): ResourceClaimParameters {
        $options['query'] = $query;
        $options['method'] = 'patch';
        $options['body'] = $patch;
        $options['model'] = ResourceClaimParameters::class;
        $uri = $this->api->makeUri(
            '/apis/resource.k8s.io/v1alpha2/namespaces/{namespace}/resourceclaimparameters/{name}',
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
     * Replace the specified ResourceClaimParameters
     *
     * Allowed query parameters:
     *   dryRun
     *   fieldManager
     *   fieldValidation
     *   pretty
     */
    public function replaceResourceV1alpha2Namespaced(
        string $name,
        ResourceClaimParameters $resourceClaimParameters,
        array $query = [],
    ): ResourceClaimParameters {
        $options['query'] = $query;
        $options['method'] = 'put';
        $options['body'] = $resourceClaimParameters;
        $options['model'] = ResourceClaimParameters::class;
        $uri = $this->api->makeUri(
            '/apis/resource.k8s.io/v1alpha2/namespaces/{namespace}/resourceclaimparameters/{name}',
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
     * List or watch objects of kind ResourceClaimParameters
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
    public function listResourceV1alpha2ForAllNamespaces(
        array $query = [],
        callable|object|null $handler = null,
    ): ResourceClaimParametersList|null {
        $options['query'] = $query;
        $options['method'] = 'get';
        $options['handler'] = $handler;
        $options['model'] = ResourceClaimParametersList::class;
        $uri = $this->api->makeUri(
            '/apis/resource.k8s.io/v1alpha2/resourceclaimparameters',
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
     * Watch individual changes to a list of ResourceClaimParameters. deprecated: use the 'watch' parameter
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
    public function watchResourceV1alpha2NamespacedList(array $query = [], callable|object|null $handler = null): void
    {
        $options['query'] = $query;
        $options['method'] = 'get';
        $options['handler'] = $handler;
        $options['model'] = WatchEvent::class;
        $uri = $this->api->makeUri(
            '/apis/resource.k8s.io/v1alpha2/watch/namespaces/{namespace}/resourceclaimparameters',
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
     * Watch changes to an object of kind ResourceClaimParameters. deprecated: use the 'watch' parameter
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
    public function watchResourceV1alpha2Namespaced(string $name, array $query = [], callable|object|null $handler = null): void
    {
        $options['query'] = $query;
        $options['method'] = 'get';
        $options['handler'] = $handler;
        $options['model'] = WatchEvent::class;
        $uri = $this->api->makeUri(
            '/apis/resource.k8s.io/v1alpha2/watch/namespaces/{namespace}/resourceclaimparameters/{name}',
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
     * Watch individual changes to a list of ResourceClaimParameters. deprecated: use the 'watch' parameter
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
    public function watchResourceV1alpha2ListForAllNamespaces(array $query = [], callable|object|null $handler = null): void
    {
        $options['query'] = $query;
        $options['method'] = 'get';
        $options['handler'] = $handler;
        $options['model'] = WatchEvent::class;
        $uri = $this->api->makeUri(
            '/apis/resource.k8s.io/v1alpha2/watch/resourceclaimparameters',
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