<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Service\Storage\v1;

use Kcs\K8s\Api\Model\Api\Storage\v1\VolumeAttachment;
use Kcs\K8s\Api\Model\Api\Storage\v1\VolumeAttachmentList;
use Kcs\K8s\Api\Model\ApiMachinery\Apis\Meta\v1\Status;
use Kcs\K8s\Api\Model\ApiMachinery\Apis\Meta\v1\WatchEvent;
use Kcs\K8s\Contract\ApiInterface;
use Kcs\K8s\PatchInterface;

class VolumeAttachmentService
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
     * List or watch objects of kind VolumeAttachment
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
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.31/#list-volumeattachment-v1-storage-k8s-io
     */
    public function listStorageV1(array $query = [], callable|object|null $handler = null): VolumeAttachmentList|null
    {
        $options['query'] = $query;
        $options['method'] = 'get';
        $options['handler'] = $handler;
        $options['model'] = VolumeAttachmentList::class;
        $uri = $this->api->buildUri(
            '/apis/storage.k8s.io/v1/volumeattachments',
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
     * Delete collection of VolumeAttachment
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
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.31/#delete-collection-volumeattachment-v1-storage-k8s-io
     */
    public function deleteStorageV1Collection(array $query = []): Status
    {
        $options['query'] = $query;
        $options['method'] = 'delete';
        $options['model'] = Status::class;
        $uri = $this->api->buildUri(
            '/apis/storage.k8s.io/v1/volumeattachments',
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
     * Create a VolumeAttachment
     *
     * Allowed query parameters:
     *   dryRun
     *   fieldManager
     *   fieldValidation
     *   pretty
     *
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.31/#create-volumeattachment-v1-storage-k8s-io
     */
    public function createStorageV1(VolumeAttachment $volumeAttachment, array $query = []): VolumeAttachment
    {
        $options['query'] = $query;
        $options['method'] = 'post';
        $options['body'] = $volumeAttachment;
        $options['model'] = VolumeAttachment::class;
        $uri = $this->api->buildUri(
            '/apis/storage.k8s.io/v1/volumeattachments',
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
     * Read the specified VolumeAttachment
     *
     * Allowed query parameters:
     *   pretty
     *
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.31/#read-volumeattachment-v1-storage-k8s-io
     */
    public function readStorageV1(string $name, array $query = []): VolumeAttachment
    {
        $options['query'] = $query;
        $options['method'] = 'get';
        $options['model'] = VolumeAttachment::class;
        $uri = $this->api->buildUri(
            '/apis/storage.k8s.io/v1/volumeattachments/{name}',
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
     * Delete a VolumeAttachment
     *
     * Allowed query parameters:
     *   dryRun
     *   gracePeriodSeconds
     *   orphanDependents
     *   propagationPolicy
     *   pretty
     *
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.31/#delete-volumeattachment-v1-storage-k8s-io
     */
    public function deleteStorageV1(string $name, array $query = [])
    {
        $options['query'] = $query;
        $options['method'] = 'delete';
        $uri = $this->api->buildUri(
            '/apis/storage.k8s.io/v1/volumeattachments/{name}',
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
     * Partially update the specified VolumeAttachment
     *
     * Allowed query parameters:
     *   dryRun
     *   fieldManager
     *   fieldValidation
     *   force
     *   pretty
     *
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.31/#patch-volumeattachment-v1-storage-k8s-io
     */
    public function patchStorageV1(string $name, PatchInterface $patch, array $query = []): VolumeAttachment
    {
        $options['query'] = $query;
        $options['method'] = 'patch';
        $options['body'] = $patch;
        $options['model'] = VolumeAttachment::class;
        $uri = $this->api->buildUri(
            '/apis/storage.k8s.io/v1/volumeattachments/{name}',
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
     * Replace the specified VolumeAttachment
     *
     * Allowed query parameters:
     *   dryRun
     *   fieldManager
     *   fieldValidation
     *   pretty
     *
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.31/#put-volumeattachment-v1-storage-k8s-io
     */
    public function replaceStorageV1(
        string $name,
        VolumeAttachment $volumeAttachment,
        array $query = [],
    ): VolumeAttachment {
        $options['query'] = $query;
        $options['method'] = 'put';
        $options['body'] = $volumeAttachment;
        $options['model'] = VolumeAttachment::class;
        $uri = $this->api->buildUri(
            '/apis/storage.k8s.io/v1/volumeattachments/{name}',
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
     * Read status of the specified VolumeAttachment
     *
     * Allowed query parameters:
     *   pretty
     *
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.31/#read-volumeattachment-v1-storage-k8s-io
     */
    public function readStorageV1Status(string $name, array $query = []): VolumeAttachment
    {
        $options['query'] = $query;
        $options['method'] = 'get';
        $options['model'] = VolumeAttachment::class;
        $uri = $this->api->buildUri(
            '/apis/storage.k8s.io/v1/volumeattachments/{name}/status',
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
     * Partially update status of the specified VolumeAttachment
     *
     * Allowed query parameters:
     *   dryRun
     *   fieldManager
     *   fieldValidation
     *   force
     *   pretty
     *
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.31/#patch-volumeattachment-v1-storage-k8s-io
     */
    public function patchStorageV1Status(string $name, PatchInterface $patch, array $query = []): VolumeAttachment
    {
        $options['query'] = $query;
        $options['method'] = 'patch';
        $options['body'] = $patch;
        $options['model'] = VolumeAttachment::class;
        $uri = $this->api->buildUri(
            '/apis/storage.k8s.io/v1/volumeattachments/{name}/status',
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
     * Replace status of the specified VolumeAttachment
     *
     * Allowed query parameters:
     *   dryRun
     *   fieldManager
     *   fieldValidation
     *   pretty
     *
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.31/#put-volumeattachment-v1-storage-k8s-io
     */
    public function replaceStorageV1Status(
        string $name,
        VolumeAttachment $volumeAttachment,
        array $query = [],
    ): VolumeAttachment {
        $options['query'] = $query;
        $options['method'] = 'put';
        $options['body'] = $volumeAttachment;
        $options['model'] = VolumeAttachment::class;
        $uri = $this->api->buildUri(
            '/apis/storage.k8s.io/v1/volumeattachments/{name}/status',
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
     * Watch individual changes to a list of VolumeAttachment. deprecated: use the 'watch' parameter with a
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
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.31/#watchlist-volumeattachment-v1-storage-k8s-io
     */
    public function watchStorageV1List(array $query = [], callable|object|null $handler = null): void
    {
        $options['query'] = $query;
        $options['method'] = 'get';
        $options['handler'] = $handler;
        $options['model'] = WatchEvent::class;
        $uri = $this->api->buildUri(
            '/apis/storage.k8s.io/v1/watch/volumeattachments',
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
     * Watch changes to an object of kind VolumeAttachment. deprecated: use the 'watch' parameter with a
     * list operation instead, filtered to a single item with the 'fieldSelector' parameter.
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
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.31/#watch-volumeattachment-v1-storage-k8s-io
     */
    public function watchStorageV1(string $name, array $query = [], callable|object|null $handler = null): void
    {
        $options['query'] = $query;
        $options['method'] = 'get';
        $options['handler'] = $handler;
        $options['model'] = WatchEvent::class;
        $uri = $this->api->buildUri(
            '/apis/storage.k8s.io/v1/watch/volumeattachments/{name}',
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
