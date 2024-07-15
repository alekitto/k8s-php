<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Service\Core\v1;

use Kcs\K8s\Api\Model\Api\Core\v1\PersistentVolumeClaim;
use Kcs\K8s\Api\Model\Api\Core\v1\PersistentVolumeClaimList;
use Kcs\K8s\Api\Model\ApiMachinery\Apis\Meta\v1\Status;
use Kcs\K8s\Api\Model\ApiMachinery\Apis\Meta\v1\WatchEvent;
use Kcs\K8s\Contract\ApiInterface;
use Kcs\K8s\PatchInterface;

class PersistentVolumeClaimService
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
     * List or watch objects of kind PersistentVolumeClaim
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
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.30/#list-persistentvolumeclaim-v1-core
     */
    public function listNamespaced(array $query = [], callable|object|null $handler = null): PersistentVolumeClaimList|null
    {
        $options['query'] = $query;
        $options['method'] = 'get';
        $options['handler'] = $handler;
        $options['model'] = PersistentVolumeClaimList::class;
        $uri = $this->api->makeUri(
            '/api/v1/namespaces/{namespace}/persistentvolumeclaims',
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
     * Delete collection of PersistentVolumeClaim
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
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.30/#delete-collection-persistentvolumeclaim-v1-core
     */
    public function deleteCollectionNamespaced(array $query = []): Status
    {
        $options['query'] = $query;
        $options['method'] = 'delete';
        $options['model'] = Status::class;
        $uri = $this->api->makeUri(
            '/api/v1/namespaces/{namespace}/persistentvolumeclaims',
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
     * Create a PersistentVolumeClaim
     *
     * Allowed query parameters:
     *   dryRun
     *   fieldManager
     *   fieldValidation
     *   pretty
     *
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.30/#create-persistentvolumeclaim-v1-core
     */
    public function createNamespaced(
        PersistentVolumeClaim $persistentVolumeClaim,
        array $query = [],
    ): PersistentVolumeClaim {
        $options['query'] = $query;
        $options['method'] = 'post';
        $options['body'] = $persistentVolumeClaim;
        $options['model'] = PersistentVolumeClaim::class;
        $uri = $this->api->makeUri(
            '/api/v1/namespaces/{namespace}/persistentvolumeclaims',
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
     * Read the specified PersistentVolumeClaim
     *
     * Allowed query parameters:
     *   pretty
     *
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.30/#read-persistentvolumeclaim-v1-core
     */
    public function readNamespaced(string $name, array $query = []): PersistentVolumeClaim
    {
        $options['query'] = $query;
        $options['method'] = 'get';
        $options['model'] = PersistentVolumeClaim::class;
        $uri = $this->api->makeUri(
            '/api/v1/namespaces/{namespace}/persistentvolumeclaims/{name}',
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
     * Delete a PersistentVolumeClaim
     *
     * Allowed query parameters:
     *   dryRun
     *   gracePeriodSeconds
     *   orphanDependents
     *   propagationPolicy
     *   pretty
     *
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.30/#delete-persistentvolumeclaim-v1-core
     */
    public function deleteNamespaced(string $name, array $query = []): PersistentVolumeClaim
    {
        $options['query'] = $query;
        $options['method'] = 'delete';
        $options['model'] = PersistentVolumeClaim::class;
        $uri = $this->api->makeUri(
            '/api/v1/namespaces/{namespace}/persistentvolumeclaims/{name}',
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
     * Partially update the specified PersistentVolumeClaim
     *
     * Allowed query parameters:
     *   dryRun
     *   fieldManager
     *   fieldValidation
     *   force
     *   pretty
     *
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.30/#patch-persistentvolumeclaim-v1-core
     */
    public function patchNamespaced(string $name, PatchInterface $patch, array $query = []): PersistentVolumeClaim
    {
        $options['query'] = $query;
        $options['method'] = 'patch';
        $options['body'] = $patch;
        $options['model'] = PersistentVolumeClaim::class;
        $uri = $this->api->makeUri(
            '/api/v1/namespaces/{namespace}/persistentvolumeclaims/{name}',
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
     * Replace the specified PersistentVolumeClaim
     *
     * Allowed query parameters:
     *   dryRun
     *   fieldManager
     *   fieldValidation
     *   pretty
     *
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.30/#put-persistentvolumeclaim-v1-core
     */
    public function replaceNamespaced(
        string $name,
        PersistentVolumeClaim $persistentVolumeClaim,
        array $query = [],
    ): PersistentVolumeClaim {
        $options['query'] = $query;
        $options['method'] = 'put';
        $options['body'] = $persistentVolumeClaim;
        $options['model'] = PersistentVolumeClaim::class;
        $uri = $this->api->makeUri(
            '/api/v1/namespaces/{namespace}/persistentvolumeclaims/{name}',
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
     * Read status of the specified PersistentVolumeClaim
     *
     * Allowed query parameters:
     *   pretty
     *
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.30/#read-persistentvolumeclaim-v1-core
     */
    public function readNamespacedStatus(string $name, array $query = []): PersistentVolumeClaim
    {
        $options['query'] = $query;
        $options['method'] = 'get';
        $options['model'] = PersistentVolumeClaim::class;
        $uri = $this->api->makeUri(
            '/api/v1/namespaces/{namespace}/persistentvolumeclaims/{name}/status',
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
     * Partially update status of the specified PersistentVolumeClaim
     *
     * Allowed query parameters:
     *   dryRun
     *   fieldManager
     *   fieldValidation
     *   force
     *   pretty
     *
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.30/#patch-persistentvolumeclaim-v1-core
     */
    public function patchNamespacedStatus(
        string $name,
        PatchInterface $patch,
        array $query = [],
    ): PersistentVolumeClaim {
        $options['query'] = $query;
        $options['method'] = 'patch';
        $options['body'] = $patch;
        $options['model'] = PersistentVolumeClaim::class;
        $uri = $this->api->makeUri(
            '/api/v1/namespaces/{namespace}/persistentvolumeclaims/{name}/status',
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
     * Replace status of the specified PersistentVolumeClaim
     *
     * Allowed query parameters:
     *   dryRun
     *   fieldManager
     *   fieldValidation
     *   pretty
     *
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.30/#put-persistentvolumeclaim-v1-core
     */
    public function replaceNamespacedStatus(
        string $name,
        PersistentVolumeClaim $persistentVolumeClaim,
        array $query = [],
    ): PersistentVolumeClaim {
        $options['query'] = $query;
        $options['method'] = 'put';
        $options['body'] = $persistentVolumeClaim;
        $options['model'] = PersistentVolumeClaim::class;
        $uri = $this->api->makeUri(
            '/api/v1/namespaces/{namespace}/persistentvolumeclaims/{name}/status',
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
     * List or watch objects of kind PersistentVolumeClaim
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
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.30/#list-persistentvolumeclaim-v1-core
     */
    public function listForAllNamespaces(array $query = [], callable|object|null $handler = null): PersistentVolumeClaimList|null
    {
        $options['query'] = $query;
        $options['method'] = 'get';
        $options['handler'] = $handler;
        $options['model'] = PersistentVolumeClaimList::class;
        $uri = $this->api->makeUri(
            '/api/v1/persistentvolumeclaims',
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
     * Watch individual changes to a list of PersistentVolumeClaim. deprecated: use the 'watch' parameter
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
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.30/#watchlist-persistentvolumeclaim-v1-core
     */
    public function watchNamespacedList(array $query = [], callable|object|null $handler = null): void
    {
        $options['query'] = $query;
        $options['method'] = 'get';
        $options['handler'] = $handler;
        $options['model'] = WatchEvent::class;
        $uri = $this->api->makeUri(
            '/api/v1/watch/namespaces/{namespace}/persistentvolumeclaims',
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
     * Watch changes to an object of kind PersistentVolumeClaim. deprecated: use the 'watch' parameter with
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
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.30/#watch-persistentvolumeclaim-v1-core
     */
    public function watchNamespaced(string $name, array $query = [], callable|object|null $handler = null): void
    {
        $options['query'] = $query;
        $options['method'] = 'get';
        $options['handler'] = $handler;
        $options['model'] = WatchEvent::class;
        $uri = $this->api->makeUri(
            '/api/v1/watch/namespaces/{namespace}/persistentvolumeclaims/{name}',
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
     * Watch individual changes to a list of PersistentVolumeClaim. deprecated: use the 'watch' parameter
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
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.30/#watchlist-persistentvolumeclaim-v1-core
     */
    public function watchListForAllNamespaces(array $query = [], callable|object|null $handler = null): void
    {
        $options['query'] = $query;
        $options['method'] = 'get';
        $options['handler'] = $handler;
        $options['model'] = WatchEvent::class;
        $uri = $this->api->makeUri(
            '/api/v1/watch/persistentvolumeclaims',
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
