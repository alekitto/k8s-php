<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Service\Networking\v1alpha1;

use Kcs\K8s\Api\Model\Api\Networking\v1alpha1\ServiceCIDR;
use Kcs\K8s\Api\Model\Api\Networking\v1alpha1\ServiceCIDRList;
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
     *
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.30/#list-servicecidr-v1alpha1-networking-k8s-io
     */
    public function listNetworkingV1alpha1(array $query = [], callable|object|null $handler = null): ServiceCIDRList|null
    {
        $options['query'] = $query;
        $options['method'] = 'get';
        $options['handler'] = $handler;
        $options['model'] = ServiceCIDRList::class;
        $uri = $this->api->buildUri(
            '/apis/networking.k8s.io/v1alpha1/servicecidrs',
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
     *
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.30/#delete-collection-servicecidr-v1alpha1-networking-k8s-io
     */
    public function deleteNetworkingV1alpha1Collection(array $query = []): Status
    {
        $options['query'] = $query;
        $options['method'] = 'delete';
        $options['model'] = Status::class;
        $uri = $this->api->buildUri(
            '/apis/networking.k8s.io/v1alpha1/servicecidrs',
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
     *
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.30/#create-servicecidr-v1alpha1-networking-k8s-io
     */
    public function createNetworkingV1alpha1(ServiceCIDR $serviceCIDR, array $query = []): ServiceCIDR
    {
        $options['query'] = $query;
        $options['method'] = 'post';
        $options['body'] = $serviceCIDR;
        $options['model'] = ServiceCIDR::class;
        $uri = $this->api->buildUri(
            '/apis/networking.k8s.io/v1alpha1/servicecidrs',
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
     *
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.30/#read-servicecidr-v1alpha1-networking-k8s-io
     */
    public function readNetworkingV1alpha1(string $name, array $query = []): ServiceCIDR
    {
        $options['query'] = $query;
        $options['method'] = 'get';
        $options['model'] = ServiceCIDR::class;
        $uri = $this->api->buildUri(
            '/apis/networking.k8s.io/v1alpha1/servicecidrs/{name}',
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
     *
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.30/#delete-servicecidr-v1alpha1-networking-k8s-io
     */
    public function deleteNetworkingV1alpha1(string $name, array $query = []): Status
    {
        $options['query'] = $query;
        $options['method'] = 'delete';
        $options['model'] = Status::class;
        $uri = $this->api->buildUri(
            '/apis/networking.k8s.io/v1alpha1/servicecidrs/{name}',
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
     *
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.30/#patch-servicecidr-v1alpha1-networking-k8s-io
     */
    public function patchNetworkingV1alpha1(string $name, PatchInterface $patch, array $query = []): ServiceCIDR
    {
        $options['query'] = $query;
        $options['method'] = 'patch';
        $options['body'] = $patch;
        $options['model'] = ServiceCIDR::class;
        $uri = $this->api->buildUri(
            '/apis/networking.k8s.io/v1alpha1/servicecidrs/{name}',
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
     *
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.30/#put-servicecidr-v1alpha1-networking-k8s-io
     */
    public function replaceNetworkingV1alpha1(string $name, ServiceCIDR $serviceCIDR, array $query = []): ServiceCIDR
    {
        $options['query'] = $query;
        $options['method'] = 'put';
        $options['body'] = $serviceCIDR;
        $options['model'] = ServiceCIDR::class;
        $uri = $this->api->buildUri(
            '/apis/networking.k8s.io/v1alpha1/servicecidrs/{name}',
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
     *
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.30/#read-servicecidr-v1alpha1-networking-k8s-io
     */
    public function readNetworkingV1alpha1Status(string $name, array $query = []): ServiceCIDR
    {
        $options['query'] = $query;
        $options['method'] = 'get';
        $options['model'] = ServiceCIDR::class;
        $uri = $this->api->buildUri(
            '/apis/networking.k8s.io/v1alpha1/servicecidrs/{name}/status',
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
     *
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.30/#patch-servicecidr-v1alpha1-networking-k8s-io
     */
    public function patchNetworkingV1alpha1Status(string $name, PatchInterface $patch, array $query = []): ServiceCIDR
    {
        $options['query'] = $query;
        $options['method'] = 'patch';
        $options['body'] = $patch;
        $options['model'] = ServiceCIDR::class;
        $uri = $this->api->buildUri(
            '/apis/networking.k8s.io/v1alpha1/servicecidrs/{name}/status',
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
     *
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.30/#put-servicecidr-v1alpha1-networking-k8s-io
     */
    public function replaceNetworkingV1alpha1Status(
        string $name,
        ServiceCIDR $serviceCIDR,
        array $query = [],
    ): ServiceCIDR {
        $options['query'] = $query;
        $options['method'] = 'put';
        $options['body'] = $serviceCIDR;
        $options['model'] = ServiceCIDR::class;
        $uri = $this->api->buildUri(
            '/apis/networking.k8s.io/v1alpha1/servicecidrs/{name}/status',
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
     *
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.30/#watchlist-servicecidr-v1alpha1-networking-k8s-io
     */
    public function watchNetworkingV1alpha1List(array $query = [], callable|object|null $handler = null): void
    {
        $options['query'] = $query;
        $options['method'] = 'get';
        $options['handler'] = $handler;
        $options['model'] = WatchEvent::class;
        $uri = $this->api->buildUri(
            '/apis/networking.k8s.io/v1alpha1/watch/servicecidrs',
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
     *
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.30/#watch-servicecidr-v1alpha1-networking-k8s-io
     */
    public function watchNetworkingV1alpha1(string $name, array $query = [], callable|object|null $handler = null): void
    {
        $options['query'] = $query;
        $options['method'] = 'get';
        $options['handler'] = $handler;
        $options['model'] = WatchEvent::class;
        $uri = $this->api->buildUri(
            '/apis/networking.k8s.io/v1alpha1/watch/servicecidrs/{name}',
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
