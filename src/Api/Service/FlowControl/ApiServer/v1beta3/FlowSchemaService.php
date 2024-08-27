<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Service\FlowControl\ApiServer\v1beta3;

use Kcs\K8s\Api\Model\Api\FlowControl\v1beta3\FlowSchema;
use Kcs\K8s\Api\Model\Api\FlowControl\v1beta3\FlowSchemaList;
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
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.31/#list-flowschema-v1beta3-flowcontrol-apiserver-k8s-io
     */
    public function listFlowControlApiServerV1beta3(array $query = [], callable|object|null $handler = null): FlowSchemaList|null
    {
        $options['query'] = $query;
        $options['method'] = 'get';
        $options['handler'] = $handler;
        $options['model'] = FlowSchemaList::class;
        $uri = $this->api->buildUri(
            '/apis/flowcontrol.apiserver.k8s.io/v1beta3/flowschemas',
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
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.31/#delete-collection-flowschema-v1beta3-flowcontrol-apiserver-k8s-io
     */
    public function deleteFlowControlApiServerV1beta3Collection(array $query = []): Status
    {
        $options['query'] = $query;
        $options['method'] = 'delete';
        $options['model'] = Status::class;
        $uri = $this->api->buildUri(
            '/apis/flowcontrol.apiserver.k8s.io/v1beta3/flowschemas',
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
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.31/#create-flowschema-v1beta3-flowcontrol-apiserver-k8s-io
     */
    public function createFlowControlApiServerV1beta3(FlowSchema $flowSchema, array $query = []): FlowSchema
    {
        $options['query'] = $query;
        $options['method'] = 'post';
        $options['body'] = $flowSchema;
        $options['model'] = FlowSchema::class;
        $uri = $this->api->buildUri(
            '/apis/flowcontrol.apiserver.k8s.io/v1beta3/flowschemas',
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
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.31/#read-flowschema-v1beta3-flowcontrol-apiserver-k8s-io
     */
    public function readFlowControlApiServerV1beta3(string $name, array $query = []): FlowSchema
    {
        $options['query'] = $query;
        $options['method'] = 'get';
        $options['model'] = FlowSchema::class;
        $uri = $this->api->buildUri(
            '/apis/flowcontrol.apiserver.k8s.io/v1beta3/flowschemas/{name}',
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
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.31/#delete-flowschema-v1beta3-flowcontrol-apiserver-k8s-io
     */
    public function deleteFlowControlApiServerV1beta3(string $name, array $query = [])
    {
        $options['query'] = $query;
        $options['method'] = 'delete';
        $uri = $this->api->buildUri(
            '/apis/flowcontrol.apiserver.k8s.io/v1beta3/flowschemas/{name}',
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
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.31/#patch-flowschema-v1beta3-flowcontrol-apiserver-k8s-io
     */
    public function patchFlowControlApiServerV1beta3(
        string $name,
        PatchInterface $patch,
        array $query = [],
    ): FlowSchema {
        $options['query'] = $query;
        $options['method'] = 'patch';
        $options['body'] = $patch;
        $options['model'] = FlowSchema::class;
        $uri = $this->api->buildUri(
            '/apis/flowcontrol.apiserver.k8s.io/v1beta3/flowschemas/{name}',
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
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.31/#put-flowschema-v1beta3-flowcontrol-apiserver-k8s-io
     */
    public function replaceFlowControlApiServerV1beta3(
        string $name,
        FlowSchema $flowSchema,
        array $query = [],
    ): FlowSchema {
        $options['query'] = $query;
        $options['method'] = 'put';
        $options['body'] = $flowSchema;
        $options['model'] = FlowSchema::class;
        $uri = $this->api->buildUri(
            '/apis/flowcontrol.apiserver.k8s.io/v1beta3/flowschemas/{name}',
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
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.31/#read-flowschema-v1beta3-flowcontrol-apiserver-k8s-io
     */
    public function readFlowControlApiServerV1beta3Status(string $name, array $query = []): FlowSchema
    {
        $options['query'] = $query;
        $options['method'] = 'get';
        $options['model'] = FlowSchema::class;
        $uri = $this->api->buildUri(
            '/apis/flowcontrol.apiserver.k8s.io/v1beta3/flowschemas/{name}/status',
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
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.31/#patch-flowschema-v1beta3-flowcontrol-apiserver-k8s-io
     */
    public function patchFlowControlApiServerV1beta3Status(
        string $name,
        PatchInterface $patch,
        array $query = [],
    ): FlowSchema {
        $options['query'] = $query;
        $options['method'] = 'patch';
        $options['body'] = $patch;
        $options['model'] = FlowSchema::class;
        $uri = $this->api->buildUri(
            '/apis/flowcontrol.apiserver.k8s.io/v1beta3/flowschemas/{name}/status',
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
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.31/#put-flowschema-v1beta3-flowcontrol-apiserver-k8s-io
     */
    public function replaceFlowControlApiServerV1beta3Status(
        string $name,
        FlowSchema $flowSchema,
        array $query = [],
    ): FlowSchema {
        $options['query'] = $query;
        $options['method'] = 'put';
        $options['body'] = $flowSchema;
        $options['model'] = FlowSchema::class;
        $uri = $this->api->buildUri(
            '/apis/flowcontrol.apiserver.k8s.io/v1beta3/flowschemas/{name}/status',
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
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.31/#watchlist-flowschema-v1beta3-flowcontrol-apiserver-k8s-io
     */
    public function watchFlowControlApiServerV1beta3List(array $query = [], callable|object|null $handler = null): void
    {
        $options['query'] = $query;
        $options['method'] = 'get';
        $options['handler'] = $handler;
        $options['model'] = WatchEvent::class;
        $uri = $this->api->buildUri(
            '/apis/flowcontrol.apiserver.k8s.io/v1beta3/watch/flowschemas',
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
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.31/#watch-flowschema-v1beta3-flowcontrol-apiserver-k8s-io
     */
    public function watchFlowControlApiServerV1beta3(string $name, array $query = [], callable|object|null $handler = null): void
    {
        $options['query'] = $query;
        $options['method'] = 'get';
        $options['handler'] = $handler;
        $options['model'] = WatchEvent::class;
        $uri = $this->api->buildUri(
            '/apis/flowcontrol.apiserver.k8s.io/v1beta3/watch/flowschemas/{name}',
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
