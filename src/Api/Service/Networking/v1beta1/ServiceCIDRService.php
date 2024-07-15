<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Service\Networking\v1beta1;

use Kcs\K8s\Api\Model\Api\Networking\v1beta1\ServiceCIDR;
use Kcs\K8s\Api\Model\Api\Networking\v1beta1\ServiceCIDRList;
use Kcs\K8s\Api\Model\ApiMachinery\Apis\Meta\v1\Status;
use Kcs\K8s\Api\Model\ApiMachinery\Apis\Meta\v1\WatchEvent;
use Kcs\K8s\Contract\ApiInterface;
use Kcs\K8s\PatchInterface;

class ServiceCIDRService
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
     * List or watch objects of kind ServiceCIDR
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
    public function listNetworkingV1beta1(array $query = [], callable|object|null $handler = null): ServiceCIDRList|null
    {
        $options['query'] = $query;
        $options['method'] = 'get';
        $options['handler'] = $handler;
        $options['model'] = ServiceCIDRList::class;
        $uri = $this->api->makeUri(
            '/apis/networking.k8s.io/v1beta1/servicecidrs',
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
     * Delete collection of ServiceCIDR
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
    public function deleteNetworkingV1beta1Collection(array $query = []): Status
    {
        $options['query'] = $query;
        $options['method'] = 'delete';
        $options['model'] = Status::class;
        $uri = $this->api->makeUri(
            '/apis/networking.k8s.io/v1beta1/servicecidrs',
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
     * Create a ServiceCIDR
     *
     * Allowed query parameters:
     *   dryRun
     *   fieldManager
     *   fieldValidation
     *   pretty
     */
    public function createNetworkingV1beta1(ServiceCIDR $serviceCIDR, array $query = []): ServiceCIDR
    {
        $options['query'] = $query;
        $options['method'] = 'post';
        $options['body'] = $serviceCIDR;
        $options['model'] = ServiceCIDR::class;
        $uri = $this->api->makeUri(
            '/apis/networking.k8s.io/v1beta1/servicecidrs',
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
     * Read the specified ServiceCIDR
     *
     * Allowed query parameters:
     *   pretty
     */
    public function readNetworkingV1beta1(string $name, array $query = []): ServiceCIDR
    {
        $options['query'] = $query;
        $options['method'] = 'get';
        $options['model'] = ServiceCIDR::class;
        $uri = $this->api->makeUri(
            '/apis/networking.k8s.io/v1beta1/servicecidrs/{name}',
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
     * Delete a ServiceCIDR
     *
     * Allowed query parameters:
     *   dryRun
     *   gracePeriodSeconds
     *   orphanDependents
     *   propagationPolicy
     *   pretty
     */
    public function deleteNetworkingV1beta1(string $name, array $query = []): Status
    {
        $options['query'] = $query;
        $options['method'] = 'delete';
        $options['model'] = Status::class;
        $uri = $this->api->makeUri(
            '/apis/networking.k8s.io/v1beta1/servicecidrs/{name}',
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
     * Partially update the specified ServiceCIDR
     *
     * Allowed query parameters:
     *   dryRun
     *   fieldManager
     *   fieldValidation
     *   force
     *   pretty
     */
    public function patchNetworkingV1beta1(string $name, PatchInterface $patch, array $query = []): ServiceCIDR
    {
        $options['query'] = $query;
        $options['method'] = 'patch';
        $options['body'] = $patch;
        $options['model'] = ServiceCIDR::class;
        $uri = $this->api->makeUri(
            '/apis/networking.k8s.io/v1beta1/servicecidrs/{name}',
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
     * Replace the specified ServiceCIDR
     *
     * Allowed query parameters:
     *   dryRun
     *   fieldManager
     *   fieldValidation
     *   pretty
     */
    public function replaceNetworkingV1beta1(string $name, ServiceCIDR $serviceCIDR, array $query = []): ServiceCIDR
    {
        $options['query'] = $query;
        $options['method'] = 'put';
        $options['body'] = $serviceCIDR;
        $options['model'] = ServiceCIDR::class;
        $uri = $this->api->makeUri(
            '/apis/networking.k8s.io/v1beta1/servicecidrs/{name}',
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
     * Read status of the specified ServiceCIDR
     *
     * Allowed query parameters:
     *   pretty
     */
    public function readNetworkingV1beta1Status(string $name, array $query = []): ServiceCIDR
    {
        $options['query'] = $query;
        $options['method'] = 'get';
        $options['model'] = ServiceCIDR::class;
        $uri = $this->api->makeUri(
            '/apis/networking.k8s.io/v1beta1/servicecidrs/{name}/status',
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
     * Partially update status of the specified ServiceCIDR
     *
     * Allowed query parameters:
     *   dryRun
     *   fieldManager
     *   fieldValidation
     *   force
     *   pretty
     */
    public function patchNetworkingV1beta1Status(string $name, PatchInterface $patch, array $query = []): ServiceCIDR
    {
        $options['query'] = $query;
        $options['method'] = 'patch';
        $options['body'] = $patch;
        $options['model'] = ServiceCIDR::class;
        $uri = $this->api->makeUri(
            '/apis/networking.k8s.io/v1beta1/servicecidrs/{name}/status',
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
     * Replace status of the specified ServiceCIDR
     *
     * Allowed query parameters:
     *   dryRun
     *   fieldManager
     *   fieldValidation
     *   pretty
     */
    public function replaceNetworkingV1beta1Status(
        string $name,
        ServiceCIDR $serviceCIDR,
        array $query = [],
    ): ServiceCIDR {
        $options['query'] = $query;
        $options['method'] = 'put';
        $options['body'] = $serviceCIDR;
        $options['model'] = ServiceCIDR::class;
        $uri = $this->api->makeUri(
            '/apis/networking.k8s.io/v1beta1/servicecidrs/{name}/status',
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
     * Watch individual changes to a list of ServiceCIDR. deprecated: use the 'watch' parameter with a list
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
     */
    public function watchNetworkingV1beta1List(array $query = [], callable|object|null $handler = null): void
    {
        $options['query'] = $query;
        $options['method'] = 'get';
        $options['handler'] = $handler;
        $options['model'] = WatchEvent::class;
        $uri = $this->api->makeUri(
            '/apis/networking.k8s.io/v1beta1/watch/servicecidrs',
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
     * Watch changes to an object of kind ServiceCIDR. deprecated: use the 'watch' parameter with a list
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
     */
    public function watchNetworkingV1beta1(string $name, array $query = [], callable|object|null $handler = null): void
    {
        $options['query'] = $query;
        $options['method'] = 'get';
        $options['handler'] = $handler;
        $options['model'] = WatchEvent::class;
        $uri = $this->api->makeUri(
            '/apis/networking.k8s.io/v1beta1/watch/servicecidrs/{name}',
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
