<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Service\Storage\v1;

use Kcs\K8s\Api\Model\Api\Storage\v1\CSIDriver;
use Kcs\K8s\Api\Model\Api\Storage\v1\CSIDriverList;
use Kcs\K8s\Api\Model\ApiMachinery\Apis\Meta\v1\Status;
use Kcs\K8s\Api\Model\ApiMachinery\Apis\Meta\v1\WatchEvent;
use Kcs\K8s\Contract\ApiInterface;
use Kcs\K8s\PatchInterface;

class CSIDriverService
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
     * List or watch objects of kind CSIDriver
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
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.31/#list-csidriver-v1-storage-k8s-io
     */
    public function listStorageV1(array $query = [], callable|object|null $handler = null): CSIDriverList|null
    {
        $options['query'] = $query;
        $options['method'] = 'get';
        $options['handler'] = $handler;
        $options['model'] = CSIDriverList::class;
        $uri = $this->api->buildUri(
            '/apis/storage.k8s.io/v1/csidrivers',
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
     * Delete collection of CSIDriver
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
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.31/#delete-collection-csidriver-v1-storage-k8s-io
     */
    public function deleteStorageV1Collection(array $query = []): Status
    {
        $options['query'] = $query;
        $options['method'] = 'delete';
        $options['model'] = Status::class;
        $uri = $this->api->buildUri(
            '/apis/storage.k8s.io/v1/csidrivers',
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
     * Create a CSIDriver
     *
     * Allowed query parameters:
     *   dryRun
     *   fieldManager
     *   fieldValidation
     *   pretty
     *
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.31/#create-csidriver-v1-storage-k8s-io
     */
    public function createStorageV1(CSIDriver $cSIDriver, array $query = []): CSIDriver
    {
        $options['query'] = $query;
        $options['method'] = 'post';
        $options['body'] = $cSIDriver;
        $options['model'] = CSIDriver::class;
        $uri = $this->api->buildUri(
            '/apis/storage.k8s.io/v1/csidrivers',
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
     * Read the specified CSIDriver
     *
     * Allowed query parameters:
     *   pretty
     *
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.31/#read-csidriver-v1-storage-k8s-io
     */
    public function readStorageV1(string $name, array $query = []): CSIDriver
    {
        $options['query'] = $query;
        $options['method'] = 'get';
        $options['model'] = CSIDriver::class;
        $uri = $this->api->buildUri(
            '/apis/storage.k8s.io/v1/csidrivers/{name}',
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
     * Delete a CSIDriver
     *
     * Allowed query parameters:
     *   dryRun
     *   gracePeriodSeconds
     *   orphanDependents
     *   propagationPolicy
     *   pretty
     *
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.31/#delete-csidriver-v1-storage-k8s-io
     */
    public function deleteStorageV1(string $name, array $query = [])
    {
        $options['query'] = $query;
        $options['method'] = 'delete';
        $uri = $this->api->buildUri(
            '/apis/storage.k8s.io/v1/csidrivers/{name}',
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
     * Partially update the specified CSIDriver
     *
     * Allowed query parameters:
     *   dryRun
     *   fieldManager
     *   fieldValidation
     *   force
     *   pretty
     *
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.31/#patch-csidriver-v1-storage-k8s-io
     */
    public function patchStorageV1(string $name, PatchInterface $patch, array $query = []): CSIDriver
    {
        $options['query'] = $query;
        $options['method'] = 'patch';
        $options['body'] = $patch;
        $options['model'] = CSIDriver::class;
        $uri = $this->api->buildUri(
            '/apis/storage.k8s.io/v1/csidrivers/{name}',
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
     * Replace the specified CSIDriver
     *
     * Allowed query parameters:
     *   dryRun
     *   fieldManager
     *   fieldValidation
     *   pretty
     *
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.31/#put-csidriver-v1-storage-k8s-io
     */
    public function replaceStorageV1(string $name, CSIDriver $cSIDriver, array $query = []): CSIDriver
    {
        $options['query'] = $query;
        $options['method'] = 'put';
        $options['body'] = $cSIDriver;
        $options['model'] = CSIDriver::class;
        $uri = $this->api->buildUri(
            '/apis/storage.k8s.io/v1/csidrivers/{name}',
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
     * Watch individual changes to a list of CSIDriver. deprecated: use the 'watch' parameter with a list
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
     *
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.31/#watchlist-csidriver-v1-storage-k8s-io
     */
    public function watchStorageV1List(array $query = [], callable|object|null $handler = null): void
    {
        $options['query'] = $query;
        $options['method'] = 'get';
        $options['handler'] = $handler;
        $options['model'] = WatchEvent::class;
        $uri = $this->api->buildUri(
            '/apis/storage.k8s.io/v1/watch/csidrivers',
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
     * Watch changes to an object of kind CSIDriver. deprecated: use the 'watch' parameter with a list
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
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.31/#watch-csidriver-v1-storage-k8s-io
     */
    public function watchStorageV1(string $name, array $query = [], callable|object|null $handler = null): void
    {
        $options['query'] = $query;
        $options['method'] = 'get';
        $options['handler'] = $handler;
        $options['model'] = WatchEvent::class;
        $uri = $this->api->buildUri(
            '/apis/storage.k8s.io/v1/watch/csidrivers/{name}',
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
