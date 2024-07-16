<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Service\FlowControl\ApiServer\v1;

use Kcs\K8s\Api\Model\Api\FlowControl\v1\FlowSchema;
use Kcs\K8s\Api\Model\Api\FlowControl\v1\FlowSchemaList;
use Kcs\K8s\Api\Model\ApiMachinery\Apis\Meta\v1\Status;
use Kcs\K8s\Api\Model\ApiMachinery\Apis\Meta\v1\WatchEvent;
use Kcs\K8s\Contract\ApiInterface;
use Kcs\K8s\PatchInterface;

class FlowSchemaService
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
     * List or watch objects of kind FlowSchema
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
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.30/#list-flowschema-v1-flowcontrol-apiserver-k8s-io
     */
    public function listFlowControlApiServerV1(array $query = [], callable|object|null $handler = null): FlowSchemaList|null
    {
        $options['query'] = $query;
        $options['method'] = 'get';
        $options['handler'] = $handler;
        $options['model'] = FlowSchemaList::class;
        $uri = $this->api->buildUri(
            '/apis/flowcontrol.apiserver.k8s.io/v1/flowschemas',
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
     * Delete collection of FlowSchema
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
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.30/#delete-collection-flowschema-v1-flowcontrol-apiserver-k8s-io
     */
    public function deleteFlowControlApiServerV1Collection(array $query = []): Status
    {
        $options['query'] = $query;
        $options['method'] = 'delete';
        $options['model'] = Status::class;
        $uri = $this->api->buildUri(
            '/apis/flowcontrol.apiserver.k8s.io/v1/flowschemas',
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
     * Create a FlowSchema
     *
     * Allowed query parameters:
     *   dryRun
     *   fieldManager
     *   fieldValidation
     *   pretty
     *
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.30/#create-flowschema-v1-flowcontrol-apiserver-k8s-io
     */
    public function createFlowControlApiServerV1(FlowSchema $flowSchema, array $query = []): FlowSchema
    {
        $options['query'] = $query;
        $options['method'] = 'post';
        $options['body'] = $flowSchema;
        $options['model'] = FlowSchema::class;
        $uri = $this->api->buildUri(
            '/apis/flowcontrol.apiserver.k8s.io/v1/flowschemas',
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
     * Read the specified FlowSchema
     *
     * Allowed query parameters:
     *   pretty
     *
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.30/#read-flowschema-v1-flowcontrol-apiserver-k8s-io
     */
    public function readFlowControlApiServerV1(string $name, array $query = []): FlowSchema
    {
        $options['query'] = $query;
        $options['method'] = 'get';
        $options['model'] = FlowSchema::class;
        $uri = $this->api->buildUri(
            '/apis/flowcontrol.apiserver.k8s.io/v1/flowschemas/{name}',
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
     * Delete a FlowSchema
     *
     * Allowed query parameters:
     *   dryRun
     *   gracePeriodSeconds
     *   orphanDependents
     *   propagationPolicy
     *   pretty
     *
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.30/#delete-flowschema-v1-flowcontrol-apiserver-k8s-io
     */
    public function deleteFlowControlApiServerV1(string $name, array $query = []): Status
    {
        $options['query'] = $query;
        $options['method'] = 'delete';
        $options['model'] = Status::class;
        $uri = $this->api->buildUri(
            '/apis/flowcontrol.apiserver.k8s.io/v1/flowschemas/{name}',
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
     * Partially update the specified FlowSchema
     *
     * Allowed query parameters:
     *   dryRun
     *   fieldManager
     *   fieldValidation
     *   force
     *   pretty
     *
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.30/#patch-flowschema-v1-flowcontrol-apiserver-k8s-io
     */
    public function patchFlowControlApiServerV1(string $name, PatchInterface $patch, array $query = []): FlowSchema
    {
        $options['query'] = $query;
        $options['method'] = 'patch';
        $options['body'] = $patch;
        $options['model'] = FlowSchema::class;
        $uri = $this->api->buildUri(
            '/apis/flowcontrol.apiserver.k8s.io/v1/flowschemas/{name}',
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
     * Replace the specified FlowSchema
     *
     * Allowed query parameters:
     *   dryRun
     *   fieldManager
     *   fieldValidation
     *   pretty
     *
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.30/#put-flowschema-v1-flowcontrol-apiserver-k8s-io
     */
    public function replaceFlowControlApiServerV1(string $name, FlowSchema $flowSchema, array $query = []): FlowSchema
    {
        $options['query'] = $query;
        $options['method'] = 'put';
        $options['body'] = $flowSchema;
        $options['model'] = FlowSchema::class;
        $uri = $this->api->buildUri(
            '/apis/flowcontrol.apiserver.k8s.io/v1/flowschemas/{name}',
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
     * Read status of the specified FlowSchema
     *
     * Allowed query parameters:
     *   pretty
     *
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.30/#read-flowschema-v1-flowcontrol-apiserver-k8s-io
     */
    public function readFlowControlApiServerV1Status(string $name, array $query = []): FlowSchema
    {
        $options['query'] = $query;
        $options['method'] = 'get';
        $options['model'] = FlowSchema::class;
        $uri = $this->api->buildUri(
            '/apis/flowcontrol.apiserver.k8s.io/v1/flowschemas/{name}/status',
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
     * Partially update status of the specified FlowSchema
     *
     * Allowed query parameters:
     *   dryRun
     *   fieldManager
     *   fieldValidation
     *   force
     *   pretty
     *
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.30/#patch-flowschema-v1-flowcontrol-apiserver-k8s-io
     */
    public function patchFlowControlApiServerV1Status(
        string $name,
        PatchInterface $patch,
        array $query = [],
    ): FlowSchema {
        $options['query'] = $query;
        $options['method'] = 'patch';
        $options['body'] = $patch;
        $options['model'] = FlowSchema::class;
        $uri = $this->api->buildUri(
            '/apis/flowcontrol.apiserver.k8s.io/v1/flowschemas/{name}/status',
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
     * Replace status of the specified FlowSchema
     *
     * Allowed query parameters:
     *   dryRun
     *   fieldManager
     *   fieldValidation
     *   pretty
     *
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.30/#put-flowschema-v1-flowcontrol-apiserver-k8s-io
     */
    public function replaceFlowControlApiServerV1Status(
        string $name,
        FlowSchema $flowSchema,
        array $query = [],
    ): FlowSchema {
        $options['query'] = $query;
        $options['method'] = 'put';
        $options['body'] = $flowSchema;
        $options['model'] = FlowSchema::class;
        $uri = $this->api->buildUri(
            '/apis/flowcontrol.apiserver.k8s.io/v1/flowschemas/{name}/status',
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
     * Watch individual changes to a list of FlowSchema. deprecated: use the 'watch' parameter with a list
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
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.30/#watchlist-flowschema-v1-flowcontrol-apiserver-k8s-io
     */
    public function watchFlowControlApiServerV1List(array $query = [], callable|object|null $handler = null): void
    {
        $options['query'] = $query;
        $options['method'] = 'get';
        $options['handler'] = $handler;
        $options['model'] = WatchEvent::class;
        $uri = $this->api->buildUri(
            '/apis/flowcontrol.apiserver.k8s.io/v1/watch/flowschemas',
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
     * Watch changes to an object of kind FlowSchema. deprecated: use the 'watch' parameter with a list
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
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.30/#watch-flowschema-v1-flowcontrol-apiserver-k8s-io
     */
    public function watchFlowControlApiServerV1(string $name, array $query = [], callable|object|null $handler = null): void
    {
        $options['query'] = $query;
        $options['method'] = 'get';
        $options['handler'] = $handler;
        $options['model'] = WatchEvent::class;
        $uri = $this->api->buildUri(
            '/apis/flowcontrol.apiserver.k8s.io/v1/watch/flowschemas/{name}',
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
