<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Service\Storagemigration\v1alpha1;

use Kcs\K8s\Api\Model\Api\Storagemigration\v1alpha1\StorageVersionMigration;
use Kcs\K8s\Api\Model\Api\Storagemigration\v1alpha1\StorageVersionMigrationList;
use Kcs\K8s\Api\Model\ApiMachinery\Apis\Meta\v1\Status;
use Kcs\K8s\Api\Model\ApiMachinery\Apis\Meta\v1\WatchEvent;
use Kcs\K8s\Contract\ApiInterface;
use Kcs\K8s\PatchInterface;

class StorageVersionMigrationService
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
     * List or watch objects of kind StorageVersionMigration
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
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.30/#list-storageversionmigration-v1alpha1-storagemigration-k8s-io
     */
    public function listStoragemigrationV1alpha1(array $query = [], callable|object|null $handler = null): StorageVersionMigrationList|null
    {
        $options['query'] = $query;
        $options['method'] = 'get';
        $options['handler'] = $handler;
        $options['model'] = StorageVersionMigrationList::class;
        $uri = $this->api->makeUri(
            '/apis/storagemigration.k8s.io/v1alpha1/storageversionmigrations',
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
     * Delete collection of StorageVersionMigration
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
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.30/#delete-collection-storageversionmigration-v1alpha1-storagemigration-k8s-io
     */
    public function deleteStoragemigrationV1alpha1Collection(array $query = []): Status
    {
        $options['query'] = $query;
        $options['method'] = 'delete';
        $options['model'] = Status::class;
        $uri = $this->api->makeUri(
            '/apis/storagemigration.k8s.io/v1alpha1/storageversionmigrations',
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
     * Create a StorageVersionMigration
     *
     * Allowed query parameters:
     *   dryRun
     *   fieldManager
     *   fieldValidation
     *   pretty
     *
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.30/#create-storageversionmigration-v1alpha1-storagemigration-k8s-io
     */
    public function createStoragemigrationV1alpha1(
        StorageVersionMigration $storageVersionMigration,
        array $query = [],
    ): StorageVersionMigration {
        $options['query'] = $query;
        $options['method'] = 'post';
        $options['body'] = $storageVersionMigration;
        $options['model'] = StorageVersionMigration::class;
        $uri = $this->api->makeUri(
            '/apis/storagemigration.k8s.io/v1alpha1/storageversionmigrations',
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
     * Read the specified StorageVersionMigration
     *
     * Allowed query parameters:
     *   pretty
     *
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.30/#read-storageversionmigration-v1alpha1-storagemigration-k8s-io
     */
    public function readStoragemigrationV1alpha1(string $name, array $query = []): StorageVersionMigration
    {
        $options['query'] = $query;
        $options['method'] = 'get';
        $options['model'] = StorageVersionMigration::class;
        $uri = $this->api->makeUri(
            '/apis/storagemigration.k8s.io/v1alpha1/storageversionmigrations/{name}',
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
     * Delete a StorageVersionMigration
     *
     * Allowed query parameters:
     *   dryRun
     *   gracePeriodSeconds
     *   orphanDependents
     *   propagationPolicy
     *   pretty
     *
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.30/#delete-storageversionmigration-v1alpha1-storagemigration-k8s-io
     */
    public function deleteStoragemigrationV1alpha1(string $name, array $query = []): Status
    {
        $options['query'] = $query;
        $options['method'] = 'delete';
        $options['model'] = Status::class;
        $uri = $this->api->makeUri(
            '/apis/storagemigration.k8s.io/v1alpha1/storageversionmigrations/{name}',
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
     * Partially update the specified StorageVersionMigration
     *
     * Allowed query parameters:
     *   dryRun
     *   fieldManager
     *   fieldValidation
     *   force
     *   pretty
     *
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.30/#patch-storageversionmigration-v1alpha1-storagemigration-k8s-io
     */
    public function patchStoragemigrationV1alpha1(
        string $name,
        PatchInterface $patch,
        array $query = [],
    ): StorageVersionMigration {
        $options['query'] = $query;
        $options['method'] = 'patch';
        $options['body'] = $patch;
        $options['model'] = StorageVersionMigration::class;
        $uri = $this->api->makeUri(
            '/apis/storagemigration.k8s.io/v1alpha1/storageversionmigrations/{name}',
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
     * Replace the specified StorageVersionMigration
     *
     * Allowed query parameters:
     *   dryRun
     *   fieldManager
     *   fieldValidation
     *   pretty
     *
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.30/#put-storageversionmigration-v1alpha1-storagemigration-k8s-io
     */
    public function replaceStoragemigrationV1alpha1(
        string $name,
        StorageVersionMigration $storageVersionMigration,
        array $query = [],
    ): StorageVersionMigration {
        $options['query'] = $query;
        $options['method'] = 'put';
        $options['body'] = $storageVersionMigration;
        $options['model'] = StorageVersionMigration::class;
        $uri = $this->api->makeUri(
            '/apis/storagemigration.k8s.io/v1alpha1/storageversionmigrations/{name}',
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
     * Read status of the specified StorageVersionMigration
     *
     * Allowed query parameters:
     *   pretty
     *
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.30/#read-storageversionmigration-v1alpha1-storagemigration-k8s-io
     */
    public function readStoragemigrationV1alpha1Status(string $name, array $query = []): StorageVersionMigration
    {
        $options['query'] = $query;
        $options['method'] = 'get';
        $options['model'] = StorageVersionMigration::class;
        $uri = $this->api->makeUri(
            '/apis/storagemigration.k8s.io/v1alpha1/storageversionmigrations/{name}/status',
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
     * Partially update status of the specified StorageVersionMigration
     *
     * Allowed query parameters:
     *   dryRun
     *   fieldManager
     *   fieldValidation
     *   force
     *   pretty
     *
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.30/#patch-storageversionmigration-v1alpha1-storagemigration-k8s-io
     */
    public function patchStoragemigrationV1alpha1Status(
        string $name,
        PatchInterface $patch,
        array $query = [],
    ): StorageVersionMigration {
        $options['query'] = $query;
        $options['method'] = 'patch';
        $options['body'] = $patch;
        $options['model'] = StorageVersionMigration::class;
        $uri = $this->api->makeUri(
            '/apis/storagemigration.k8s.io/v1alpha1/storageversionmigrations/{name}/status',
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
     * Replace status of the specified StorageVersionMigration
     *
     * Allowed query parameters:
     *   dryRun
     *   fieldManager
     *   fieldValidation
     *   pretty
     *
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.30/#put-storageversionmigration-v1alpha1-storagemigration-k8s-io
     */
    public function replaceStoragemigrationV1alpha1Status(
        string $name,
        StorageVersionMigration $storageVersionMigration,
        array $query = [],
    ): StorageVersionMigration {
        $options['query'] = $query;
        $options['method'] = 'put';
        $options['body'] = $storageVersionMigration;
        $options['model'] = StorageVersionMigration::class;
        $uri = $this->api->makeUri(
            '/apis/storagemigration.k8s.io/v1alpha1/storageversionmigrations/{name}/status',
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
     * Watch individual changes to a list of StorageVersionMigration. deprecated: use the 'watch' parameter
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
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.30/#watchlist-storageversionmigration-v1alpha1-storagemigration-k8s-io
     */
    public function watchStoragemigrationV1alpha1List(array $query = [], callable|object|null $handler = null): void
    {
        $options['query'] = $query;
        $options['method'] = 'get';
        $options['handler'] = $handler;
        $options['model'] = WatchEvent::class;
        $uri = $this->api->makeUri(
            '/apis/storagemigration.k8s.io/v1alpha1/watch/storageversionmigrations',
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
     * Watch changes to an object of kind StorageVersionMigration. deprecated: use the 'watch' parameter
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
     *
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.30/#watch-storageversionmigration-v1alpha1-storagemigration-k8s-io
     */
    public function watchStoragemigrationV1alpha1(string $name, array $query = [], callable|object|null $handler = null): void
    {
        $options['query'] = $query;
        $options['method'] = 'get';
        $options['handler'] = $handler;
        $options['model'] = WatchEvent::class;
        $uri = $this->api->makeUri(
            '/apis/storagemigration.k8s.io/v1alpha1/watch/storageversionmigrations/{name}',
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
