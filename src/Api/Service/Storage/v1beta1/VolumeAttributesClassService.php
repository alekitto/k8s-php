<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Service\Storage\v1beta1;

use Kcs\K8s\Api\Model\Api\Storage\v1beta1\VolumeAttributesClass;
use Kcs\K8s\Api\Model\Api\Storage\v1beta1\VolumeAttributesClassList;
use Kcs\K8s\Api\Model\ApiMachinery\Apis\Meta\v1\Status;
use Kcs\K8s\Api\Model\ApiMachinery\Apis\Meta\v1\WatchEvent;
use Kcs\K8s\Contract\ApiInterface;
use Kcs\K8s\PatchInterface;

class VolumeAttributesClassService
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
     * List or watch objects of kind VolumeAttributesClass
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
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.31/#list-volumeattributesclass-v1beta1-storage-k8s-io
     */
    public function listStorageV1beta1(array $query = [], callable|object|null $handler = null): VolumeAttributesClassList|null
    {
        $options['query'] = $query;
        $options['method'] = 'get';
        $options['handler'] = $handler;
        $options['model'] = VolumeAttributesClassList::class;
        $uri = $this->api->buildUri(
            '/apis/storage.k8s.io/v1beta1/volumeattributesclasses',
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
     * Delete collection of VolumeAttributesClass
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
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.31/#delete-collection-volumeattributesclass-v1beta1-storage-k8s-io
     */
    public function deleteStorageV1beta1Collection(array $query = []): Status
    {
        $options['query'] = $query;
        $options['method'] = 'delete';
        $options['model'] = Status::class;
        $uri = $this->api->buildUri(
            '/apis/storage.k8s.io/v1beta1/volumeattributesclasses',
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
     * Create a VolumeAttributesClass
     *
     * Allowed query parameters:
     *   dryRun
     *   fieldManager
     *   fieldValidation
     *   pretty
     *
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.31/#create-volumeattributesclass-v1beta1-storage-k8s-io
     */
    public function createStorageV1beta1(
        VolumeAttributesClass $volumeAttributesClass,
        array $query = [],
    ): VolumeAttributesClass {
        $options['query'] = $query;
        $options['method'] = 'post';
        $options['body'] = $volumeAttributesClass;
        $options['model'] = VolumeAttributesClass::class;
        $uri = $this->api->buildUri(
            '/apis/storage.k8s.io/v1beta1/volumeattributesclasses',
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
     * Read the specified VolumeAttributesClass
     *
     * Allowed query parameters:
     *   pretty
     *
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.31/#read-volumeattributesclass-v1beta1-storage-k8s-io
     */
    public function readStorageV1beta1(string $name, array $query = []): VolumeAttributesClass
    {
        $options['query'] = $query;
        $options['method'] = 'get';
        $options['model'] = VolumeAttributesClass::class;
        $uri = $this->api->buildUri(
            '/apis/storage.k8s.io/v1beta1/volumeattributesclasses/{name}',
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
     * Delete a VolumeAttributesClass
     *
     * Allowed query parameters:
     *   dryRun
     *   gracePeriodSeconds
     *   orphanDependents
     *   propagationPolicy
     *   pretty
     *
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.31/#delete-volumeattributesclass-v1beta1-storage-k8s-io
     */
    public function deleteStorageV1beta1(string $name, array $query = [])
    {
        $options['query'] = $query;
        $options['method'] = 'delete';
        $uri = $this->api->buildUri(
            '/apis/storage.k8s.io/v1beta1/volumeattributesclasses/{name}',
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
     * Partially update the specified VolumeAttributesClass
     *
     * Allowed query parameters:
     *   dryRun
     *   fieldManager
     *   fieldValidation
     *   force
     *   pretty
     *
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.31/#patch-volumeattributesclass-v1beta1-storage-k8s-io
     */
    public function patchStorageV1beta1(string $name, PatchInterface $patch, array $query = []): VolumeAttributesClass
    {
        $options['query'] = $query;
        $options['method'] = 'patch';
        $options['body'] = $patch;
        $options['model'] = VolumeAttributesClass::class;
        $uri = $this->api->buildUri(
            '/apis/storage.k8s.io/v1beta1/volumeattributesclasses/{name}',
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
     * Replace the specified VolumeAttributesClass
     *
     * Allowed query parameters:
     *   dryRun
     *   fieldManager
     *   fieldValidation
     *   pretty
     *
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.31/#put-volumeattributesclass-v1beta1-storage-k8s-io
     */
    public function replaceStorageV1beta1(
        string $name,
        VolumeAttributesClass $volumeAttributesClass,
        array $query = [],
    ): VolumeAttributesClass {
        $options['query'] = $query;
        $options['method'] = 'put';
        $options['body'] = $volumeAttributesClass;
        $options['model'] = VolumeAttributesClass::class;
        $uri = $this->api->buildUri(
            '/apis/storage.k8s.io/v1beta1/volumeattributesclasses/{name}',
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
     * Watch individual changes to a list of VolumeAttributesClass. deprecated: use the 'watch' parameter
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
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.31/#watchlist-volumeattributesclass-v1beta1-storage-k8s-io
     */
    public function watchStorageV1beta1List(array $query = [], callable|object|null $handler = null): void
    {
        $options['query'] = $query;
        $options['method'] = 'get';
        $options['handler'] = $handler;
        $options['model'] = WatchEvent::class;
        $uri = $this->api->buildUri(
            '/apis/storage.k8s.io/v1beta1/watch/volumeattributesclasses',
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
     * Watch changes to an object of kind VolumeAttributesClass. deprecated: use the 'watch' parameter with
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
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.31/#watch-volumeattributesclass-v1beta1-storage-k8s-io
     */
    public function watchStorageV1beta1(string $name, array $query = [], callable|object|null $handler = null): void
    {
        $options['query'] = $query;
        $options['method'] = 'get';
        $options['handler'] = $handler;
        $options['model'] = WatchEvent::class;
        $uri = $this->api->buildUri(
            '/apis/storage.k8s.io/v1beta1/watch/volumeattributesclasses/{name}',
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
