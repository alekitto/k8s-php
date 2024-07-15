<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Service\FlowControl\ApiServer\v1;

use Kcs\K8s\Api\Model\Api\FlowControl\v1\PriorityLevelConfiguration;
use Kcs\K8s\Api\Model\Api\FlowControl\v1\PriorityLevelConfigurationList;
use Kcs\K8s\Api\Model\ApiMachinery\Apis\Meta\v1\Status;
use Kcs\K8s\Api\Model\ApiMachinery\Apis\Meta\v1\WatchEvent;
use Kcs\K8s\Contract\ApiInterface;
use Kcs\K8s\PatchInterface;

class PriorityLevelConfigurationService
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
     * List or watch objects of kind PriorityLevelConfiguration
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
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.30/#list-prioritylevelconfiguration-v1-flowcontrol-apiserver-k8s-io
     */
    public function listFlowControlApiServerV1(array $query = [], callable|object|null $handler = null): PriorityLevelConfigurationList|null
    {
        $options['query'] = $query;
        $options['method'] = 'get';
        $options['handler'] = $handler;
        $options['model'] = PriorityLevelConfigurationList::class;
        $uri = $this->api->makeUri(
            '/apis/flowcontrol.apiserver.k8s.io/v1/prioritylevelconfigurations',
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
     * Delete collection of PriorityLevelConfiguration
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
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.30/#delete-collection-prioritylevelconfiguration-v1-flowcontrol-apiserver-k8s-io
     */
    public function deleteFlowControlApiServerV1Collection(array $query = []): Status
    {
        $options['query'] = $query;
        $options['method'] = 'delete';
        $options['model'] = Status::class;
        $uri = $this->api->makeUri(
            '/apis/flowcontrol.apiserver.k8s.io/v1/prioritylevelconfigurations',
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
     * Create a PriorityLevelConfiguration
     *
     * Allowed query parameters:
     *   dryRun
     *   fieldManager
     *   fieldValidation
     *   pretty
     *
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.30/#create-prioritylevelconfiguration-v1-flowcontrol-apiserver-k8s-io
     */
    public function createFlowControlApiServerV1(
        PriorityLevelConfiguration $priorityLevelConfiguration,
        array $query = [],
    ): PriorityLevelConfiguration {
        $options['query'] = $query;
        $options['method'] = 'post';
        $options['body'] = $priorityLevelConfiguration;
        $options['model'] = PriorityLevelConfiguration::class;
        $uri = $this->api->makeUri(
            '/apis/flowcontrol.apiserver.k8s.io/v1/prioritylevelconfigurations',
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
     * Read the specified PriorityLevelConfiguration
     *
     * Allowed query parameters:
     *   pretty
     *
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.30/#read-prioritylevelconfiguration-v1-flowcontrol-apiserver-k8s-io
     */
    public function readFlowControlApiServerV1(string $name, array $query = []): PriorityLevelConfiguration
    {
        $options['query'] = $query;
        $options['method'] = 'get';
        $options['model'] = PriorityLevelConfiguration::class;
        $uri = $this->api->makeUri(
            '/apis/flowcontrol.apiserver.k8s.io/v1/prioritylevelconfigurations/{name}',
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
     * Delete a PriorityLevelConfiguration
     *
     * Allowed query parameters:
     *   dryRun
     *   gracePeriodSeconds
     *   orphanDependents
     *   propagationPolicy
     *   pretty
     *
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.30/#delete-prioritylevelconfiguration-v1-flowcontrol-apiserver-k8s-io
     */
    public function deleteFlowControlApiServerV1(string $name, array $query = []): Status
    {
        $options['query'] = $query;
        $options['method'] = 'delete';
        $options['model'] = Status::class;
        $uri = $this->api->makeUri(
            '/apis/flowcontrol.apiserver.k8s.io/v1/prioritylevelconfigurations/{name}',
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
     * Partially update the specified PriorityLevelConfiguration
     *
     * Allowed query parameters:
     *   dryRun
     *   fieldManager
     *   fieldValidation
     *   force
     *   pretty
     *
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.30/#patch-prioritylevelconfiguration-v1-flowcontrol-apiserver-k8s-io
     */
    public function patchFlowControlApiServerV1(
        string $name,
        PatchInterface $patch,
        array $query = [],
    ): PriorityLevelConfiguration {
        $options['query'] = $query;
        $options['method'] = 'patch';
        $options['body'] = $patch;
        $options['model'] = PriorityLevelConfiguration::class;
        $uri = $this->api->makeUri(
            '/apis/flowcontrol.apiserver.k8s.io/v1/prioritylevelconfigurations/{name}',
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
     * Replace the specified PriorityLevelConfiguration
     *
     * Allowed query parameters:
     *   dryRun
     *   fieldManager
     *   fieldValidation
     *   pretty
     *
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.30/#put-prioritylevelconfiguration-v1-flowcontrol-apiserver-k8s-io
     */
    public function replaceFlowControlApiServerV1(
        string $name,
        PriorityLevelConfiguration $priorityLevelConfiguration,
        array $query = [],
    ): PriorityLevelConfiguration {
        $options['query'] = $query;
        $options['method'] = 'put';
        $options['body'] = $priorityLevelConfiguration;
        $options['model'] = PriorityLevelConfiguration::class;
        $uri = $this->api->makeUri(
            '/apis/flowcontrol.apiserver.k8s.io/v1/prioritylevelconfigurations/{name}',
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
     * Read status of the specified PriorityLevelConfiguration
     *
     * Allowed query parameters:
     *   pretty
     *
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.30/#read-prioritylevelconfiguration-v1-flowcontrol-apiserver-k8s-io
     */
    public function readFlowControlApiServerV1Status(string $name, array $query = []): PriorityLevelConfiguration
    {
        $options['query'] = $query;
        $options['method'] = 'get';
        $options['model'] = PriorityLevelConfiguration::class;
        $uri = $this->api->makeUri(
            '/apis/flowcontrol.apiserver.k8s.io/v1/prioritylevelconfigurations/{name}/status',
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
     * Partially update status of the specified PriorityLevelConfiguration
     *
     * Allowed query parameters:
     *   dryRun
     *   fieldManager
     *   fieldValidation
     *   force
     *   pretty
     *
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.30/#patch-prioritylevelconfiguration-v1-flowcontrol-apiserver-k8s-io
     */
    public function patchFlowControlApiServerV1Status(
        string $name,
        PatchInterface $patch,
        array $query = [],
    ): PriorityLevelConfiguration {
        $options['query'] = $query;
        $options['method'] = 'patch';
        $options['body'] = $patch;
        $options['model'] = PriorityLevelConfiguration::class;
        $uri = $this->api->makeUri(
            '/apis/flowcontrol.apiserver.k8s.io/v1/prioritylevelconfigurations/{name}/status',
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
     * Replace status of the specified PriorityLevelConfiguration
     *
     * Allowed query parameters:
     *   dryRun
     *   fieldManager
     *   fieldValidation
     *   pretty
     *
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.30/#put-prioritylevelconfiguration-v1-flowcontrol-apiserver-k8s-io
     */
    public function replaceFlowControlApiServerV1Status(
        string $name,
        PriorityLevelConfiguration $priorityLevelConfiguration,
        array $query = [],
    ): PriorityLevelConfiguration {
        $options['query'] = $query;
        $options['method'] = 'put';
        $options['body'] = $priorityLevelConfiguration;
        $options['model'] = PriorityLevelConfiguration::class;
        $uri = $this->api->makeUri(
            '/apis/flowcontrol.apiserver.k8s.io/v1/prioritylevelconfigurations/{name}/status',
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
     * Watch individual changes to a list of PriorityLevelConfiguration. deprecated: use the 'watch'
     * parameter with a list operation instead.
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
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.30/#watchlist-prioritylevelconfiguration-v1-flowcontrol-apiserver-k8s-io
     */
    public function watchFlowControlApiServerV1List(array $query = [], callable|object|null $handler = null): void
    {
        $options['query'] = $query;
        $options['method'] = 'get';
        $options['handler'] = $handler;
        $options['model'] = WatchEvent::class;
        $uri = $this->api->makeUri(
            '/apis/flowcontrol.apiserver.k8s.io/v1/watch/prioritylevelconfigurations',
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
     * Watch changes to an object of kind PriorityLevelConfiguration. deprecated: use the 'watch' parameter
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
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.30/#watch-prioritylevelconfiguration-v1-flowcontrol-apiserver-k8s-io
     */
    public function watchFlowControlApiServerV1(string $name, array $query = [], callable|object|null $handler = null): void
    {
        $options['query'] = $query;
        $options['method'] = 'get';
        $options['handler'] = $handler;
        $options['model'] = WatchEvent::class;
        $uri = $this->api->makeUri(
            '/apis/flowcontrol.apiserver.k8s.io/v1/watch/prioritylevelconfigurations/{name}',
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
