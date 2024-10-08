<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Service\Networking\v1beta1;

use Kcs\K8s\Api\Model\Api\Networking\v1beta1\IPAddress;
use Kcs\K8s\Api\Model\Api\Networking\v1beta1\IPAddressList;
use Kcs\K8s\Api\Model\ApiMachinery\Apis\Meta\v1\Status;
use Kcs\K8s\Api\Model\ApiMachinery\Apis\Meta\v1\WatchEvent;
use Kcs\K8s\Contract\ApiInterface;
use Kcs\K8s\PatchInterface;

class IPAddressService
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
     * List or watch objects of kind IPAddress
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
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.31/#list-ipaddress-v1beta1-networking-k8s-io
     */
    public function listNetworkingV1beta1(array $query = [], callable|object|null $handler = null): IPAddressList|null
    {
        $options['query'] = $query;
        $options['method'] = 'get';
        $options['handler'] = $handler;
        $options['model'] = IPAddressList::class;
        $uri = $this->api->buildUri(
            '/apis/networking.k8s.io/v1beta1/ipaddresses',
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
     * Delete collection of IPAddress
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
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.31/#delete-collection-ipaddress-v1beta1-networking-k8s-io
     */
    public function deleteNetworkingV1beta1Collection(array $query = []): Status
    {
        $options['query'] = $query;
        $options['method'] = 'delete';
        $options['model'] = Status::class;
        $uri = $this->api->buildUri(
            '/apis/networking.k8s.io/v1beta1/ipaddresses',
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
     * Create an IPAddress
     *
     * Allowed query parameters:
     *   dryRun
     *   fieldManager
     *   fieldValidation
     *   pretty
     *
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.31/#create-ipaddress-v1beta1-networking-k8s-io
     */
    public function createNetworkingV1beta1(IPAddress $iPAddress, array $query = []): IPAddress
    {
        $options['query'] = $query;
        $options['method'] = 'post';
        $options['body'] = $iPAddress;
        $options['model'] = IPAddress::class;
        $uri = $this->api->buildUri(
            '/apis/networking.k8s.io/v1beta1/ipaddresses',
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
     * Read the specified IPAddress
     *
     * Allowed query parameters:
     *   pretty
     *
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.31/#read-ipaddress-v1beta1-networking-k8s-io
     */
    public function readNetworkingV1beta1(string $name, array $query = []): IPAddress
    {
        $options['query'] = $query;
        $options['method'] = 'get';
        $options['model'] = IPAddress::class;
        $uri = $this->api->buildUri(
            '/apis/networking.k8s.io/v1beta1/ipaddresses/{name}',
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
     * Delete an IPAddress
     *
     * Allowed query parameters:
     *   dryRun
     *   gracePeriodSeconds
     *   orphanDependents
     *   propagationPolicy
     *   pretty
     *
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.31/#delete-ipaddress-v1beta1-networking-k8s-io
     */
    public function deleteNetworkingV1beta1(string $name, array $query = [])
    {
        $options['query'] = $query;
        $options['method'] = 'delete';
        $uri = $this->api->buildUri(
            '/apis/networking.k8s.io/v1beta1/ipaddresses/{name}',
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
     * Partially update the specified IPAddress
     *
     * Allowed query parameters:
     *   dryRun
     *   fieldManager
     *   fieldValidation
     *   force
     *   pretty
     *
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.31/#patch-ipaddress-v1beta1-networking-k8s-io
     */
    public function patchNetworkingV1beta1(string $name, PatchInterface $patch, array $query = []): IPAddress
    {
        $options['query'] = $query;
        $options['method'] = 'patch';
        $options['body'] = $patch;
        $options['model'] = IPAddress::class;
        $uri = $this->api->buildUri(
            '/apis/networking.k8s.io/v1beta1/ipaddresses/{name}',
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
     * Replace the specified IPAddress
     *
     * Allowed query parameters:
     *   dryRun
     *   fieldManager
     *   fieldValidation
     *   pretty
     *
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.31/#put-ipaddress-v1beta1-networking-k8s-io
     */
    public function replaceNetworkingV1beta1(string $name, IPAddress $iPAddress, array $query = []): IPAddress
    {
        $options['query'] = $query;
        $options['method'] = 'put';
        $options['body'] = $iPAddress;
        $options['model'] = IPAddress::class;
        $uri = $this->api->buildUri(
            '/apis/networking.k8s.io/v1beta1/ipaddresses/{name}',
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
     * Watch individual changes to a list of IPAddress. deprecated: use the 'watch' parameter with a list
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
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.31/#watchlist-ipaddress-v1beta1-networking-k8s-io
     */
    public function watchNetworkingV1beta1List(array $query = [], callable|object|null $handler = null): void
    {
        $options['query'] = $query;
        $options['method'] = 'get';
        $options['handler'] = $handler;
        $options['model'] = WatchEvent::class;
        $uri = $this->api->buildUri(
            '/apis/networking.k8s.io/v1beta1/watch/ipaddresses',
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
     * Watch changes to an object of kind IPAddress. deprecated: use the 'watch' parameter with a list
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
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.31/#watch-ipaddress-v1beta1-networking-k8s-io
     */
    public function watchNetworkingV1beta1(string $name, array $query = [], callable|object|null $handler = null): void
    {
        $options['query'] = $query;
        $options['method'] = 'get';
        $options['handler'] = $handler;
        $options['model'] = WatchEvent::class;
        $uri = $this->api->buildUri(
            '/apis/networking.k8s.io/v1beta1/watch/ipaddresses/{name}',
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
