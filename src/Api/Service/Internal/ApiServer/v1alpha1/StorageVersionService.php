<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Service\Internal\ApiServer\v1alpha1;

use Kcs\K8s\Api\Model\Api\ApiServerInternal\v1alpha1\StorageVersion;
use Kcs\K8s\Api\Model\Api\ApiServerInternal\v1alpha1\StorageVersionList;
use Kcs\K8s\Api\Model\ApiMachinery\Apis\Meta\v1\Status;
use Kcs\K8s\Api\Model\ApiMachinery\Apis\Meta\v1\WatchEvent;
use Kcs\K8s\Contract\ApiInterface;
use Kcs\K8s\PatchInterface;

class StorageVersionService
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
     * List or watch objects of kind StorageVersion
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
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.31/#list-storageversion-v1alpha1-internal-apiserver-k8s-io
     */
    public function listInternalApiServerV1alpha1(array $query = [], callable|object|null $handler = null): StorageVersionList|null
    {
        $options['query'] = $query;
        $options['method'] = 'get';
        $options['handler'] = $handler;
        $options['model'] = StorageVersionList::class;
        $uri = $this->api->buildUri(
            '/apis/internal.apiserver.k8s.io/v1alpha1/storageversions',
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
     * Delete collection of StorageVersion
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
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.31/#delete-collection-storageversion-v1alpha1-internal-apiserver-k8s-io
     */
    public function deleteInternalApiServerV1alpha1Collection(array $query = []): Status
    {
        $options['query'] = $query;
        $options['method'] = 'delete';
        $options['model'] = Status::class;
        $uri = $this->api->buildUri(
            '/apis/internal.apiserver.k8s.io/v1alpha1/storageversions',
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
     * Create a StorageVersion
     *
     * Allowed query parameters:
     *   dryRun
     *   fieldManager
     *   fieldValidation
     *   pretty
     *
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.31/#create-storageversion-v1alpha1-internal-apiserver-k8s-io
     */
    public function createInternalApiServerV1alpha1(StorageVersion $storageVersion, array $query = []): StorageVersion
    {
        $options['query'] = $query;
        $options['method'] = 'post';
        $options['body'] = $storageVersion;
        $options['model'] = StorageVersion::class;
        $uri = $this->api->buildUri(
            '/apis/internal.apiserver.k8s.io/v1alpha1/storageversions',
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
     * Read the specified StorageVersion
     *
     * Allowed query parameters:
     *   pretty
     *
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.31/#read-storageversion-v1alpha1-internal-apiserver-k8s-io
     */
    public function readInternalApiServerV1alpha1(string $name, array $query = []): StorageVersion
    {
        $options['query'] = $query;
        $options['method'] = 'get';
        $options['model'] = StorageVersion::class;
        $uri = $this->api->buildUri(
            '/apis/internal.apiserver.k8s.io/v1alpha1/storageversions/{name}',
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
     * Delete a StorageVersion
     *
     * Allowed query parameters:
     *   dryRun
     *   gracePeriodSeconds
     *   orphanDependents
     *   propagationPolicy
     *   pretty
     *
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.31/#delete-storageversion-v1alpha1-internal-apiserver-k8s-io
     */
    public function deleteInternalApiServerV1alpha1(string $name, array $query = [])
    {
        $options['query'] = $query;
        $options['method'] = 'delete';
        $uri = $this->api->buildUri(
            '/apis/internal.apiserver.k8s.io/v1alpha1/storageversions/{name}',
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
     * Partially update the specified StorageVersion
     *
     * Allowed query parameters:
     *   dryRun
     *   fieldManager
     *   fieldValidation
     *   force
     *   pretty
     *
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.31/#patch-storageversion-v1alpha1-internal-apiserver-k8s-io
     */
    public function patchInternalApiServerV1alpha1(
        string $name,
        PatchInterface $patch,
        array $query = [],
    ): StorageVersion {
        $options['query'] = $query;
        $options['method'] = 'patch';
        $options['body'] = $patch;
        $options['model'] = StorageVersion::class;
        $uri = $this->api->buildUri(
            '/apis/internal.apiserver.k8s.io/v1alpha1/storageversions/{name}',
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
     * Replace the specified StorageVersion
     *
     * Allowed query parameters:
     *   dryRun
     *   fieldManager
     *   fieldValidation
     *   pretty
     *
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.31/#put-storageversion-v1alpha1-internal-apiserver-k8s-io
     */
    public function replaceInternalApiServerV1alpha1(
        string $name,
        StorageVersion $storageVersion,
        array $query = [],
    ): StorageVersion {
        $options['query'] = $query;
        $options['method'] = 'put';
        $options['body'] = $storageVersion;
        $options['model'] = StorageVersion::class;
        $uri = $this->api->buildUri(
            '/apis/internal.apiserver.k8s.io/v1alpha1/storageversions/{name}',
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
     * Read status of the specified StorageVersion
     *
     * Allowed query parameters:
     *   pretty
     *
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.31/#read-storageversion-v1alpha1-internal-apiserver-k8s-io
     */
    public function readInternalApiServerV1alpha1Status(string $name, array $query = []): StorageVersion
    {
        $options['query'] = $query;
        $options['method'] = 'get';
        $options['model'] = StorageVersion::class;
        $uri = $this->api->buildUri(
            '/apis/internal.apiserver.k8s.io/v1alpha1/storageversions/{name}/status',
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
     * Partially update status of the specified StorageVersion
     *
     * Allowed query parameters:
     *   dryRun
     *   fieldManager
     *   fieldValidation
     *   force
     *   pretty
     *
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.31/#patch-storageversion-v1alpha1-internal-apiserver-k8s-io
     */
    public function patchInternalApiServerV1alpha1Status(
        string $name,
        PatchInterface $patch,
        array $query = [],
    ): StorageVersion {
        $options['query'] = $query;
        $options['method'] = 'patch';
        $options['body'] = $patch;
        $options['model'] = StorageVersion::class;
        $uri = $this->api->buildUri(
            '/apis/internal.apiserver.k8s.io/v1alpha1/storageversions/{name}/status',
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
     * Replace status of the specified StorageVersion
     *
     * Allowed query parameters:
     *   dryRun
     *   fieldManager
     *   fieldValidation
     *   pretty
     *
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.31/#put-storageversion-v1alpha1-internal-apiserver-k8s-io
     */
    public function replaceInternalApiServerV1alpha1Status(
        string $name,
        StorageVersion $storageVersion,
        array $query = [],
    ): StorageVersion {
        $options['query'] = $query;
        $options['method'] = 'put';
        $options['body'] = $storageVersion;
        $options['model'] = StorageVersion::class;
        $uri = $this->api->buildUri(
            '/apis/internal.apiserver.k8s.io/v1alpha1/storageversions/{name}/status',
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
     * Watch individual changes to a list of StorageVersion. deprecated: use the 'watch' parameter with a
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
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.31/#watchlist-storageversion-v1alpha1-internal-apiserver-k8s-io
     */
    public function watchInternalApiServerV1alpha1List(array $query = [], callable|object|null $handler = null): void
    {
        $options['query'] = $query;
        $options['method'] = 'get';
        $options['handler'] = $handler;
        $options['model'] = WatchEvent::class;
        $uri = $this->api->buildUri(
            '/apis/internal.apiserver.k8s.io/v1alpha1/watch/storageversions',
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
     * Watch changes to an object of kind StorageVersion. deprecated: use the 'watch' parameter with a list
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
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.31/#watch-storageversion-v1alpha1-internal-apiserver-k8s-io
     */
    public function watchInternalApiServerV1alpha1(string $name, array $query = [], callable|object|null $handler = null): void
    {
        $options['query'] = $query;
        $options['method'] = 'get';
        $options['handler'] = $handler;
        $options['model'] = WatchEvent::class;
        $uri = $this->api->buildUri(
            '/apis/internal.apiserver.k8s.io/v1alpha1/watch/storageversions/{name}',
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
