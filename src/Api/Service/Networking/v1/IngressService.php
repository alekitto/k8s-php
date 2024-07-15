<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Service\Networking\v1;

use Kcs\K8s\Api\Model\Api\Networking\v1\Ingress;
use Kcs\K8s\Api\Model\Api\Networking\v1\IngressList;
use Kcs\K8s\Api\Model\ApiMachinery\Apis\Meta\v1\Status;
use Kcs\K8s\Api\Model\ApiMachinery\Apis\Meta\v1\WatchEvent;
use Kcs\K8s\Contract\ApiInterface;
use Kcs\K8s\PatchInterface;

class IngressService
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
     * List or watch objects of kind Ingress
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
     */
    public function listNetworkingV1ForAllNamespaces(array $query = [], callable|object|null $handler = null): IngressList|null
    {
        $options['query'] = $query;
        $options['method'] = 'get';
        $options['handler'] = $handler;
        $options['model'] = IngressList::class;
        $uri = $this->api->makeUri(
            '/apis/networking.k8s.io/v1/ingresses',
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
     * List or watch objects of kind Ingress
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
    public function listNetworkingV1Namespaced(array $query = [], callable|object|null $handler = null): IngressList|null
    {
        $options['query'] = $query;
        $options['method'] = 'get';
        $options['handler'] = $handler;
        $options['model'] = IngressList::class;
        $uri = $this->api->makeUri(
            '/apis/networking.k8s.io/v1/namespaces/{namespace}/ingresses',
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
     * Delete collection of Ingress
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
    public function deleteNetworkingV1CollectionNamespaced(array $query = []): Status
    {
        $options['query'] = $query;
        $options['method'] = 'delete';
        $options['model'] = Status::class;
        $uri = $this->api->makeUri(
            '/apis/networking.k8s.io/v1/namespaces/{namespace}/ingresses',
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
     * Create an Ingress
     *
     * Allowed query parameters:
     *   dryRun
     *   fieldManager
     *   fieldValidation
     *   pretty
     */
    public function createNetworkingV1Namespaced(Ingress $ingress, array $query = []): Ingress
    {
        $options['query'] = $query;
        $options['method'] = 'post';
        $options['body'] = $ingress;
        $options['model'] = Ingress::class;
        $uri = $this->api->makeUri(
            '/apis/networking.k8s.io/v1/namespaces/{namespace}/ingresses',
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
     * Read the specified Ingress
     *
     * Allowed query parameters:
     *   pretty
     */
    public function readNetworkingV1Namespaced(string $name, array $query = []): Ingress
    {
        $options['query'] = $query;
        $options['method'] = 'get';
        $options['model'] = Ingress::class;
        $uri = $this->api->makeUri(
            '/apis/networking.k8s.io/v1/namespaces/{namespace}/ingresses/{name}',
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
     * Delete an Ingress
     *
     * Allowed query parameters:
     *   dryRun
     *   gracePeriodSeconds
     *   orphanDependents
     *   propagationPolicy
     *   pretty
     */
    public function deleteNetworkingV1Namespaced(string $name, array $query = []): Status
    {
        $options['query'] = $query;
        $options['method'] = 'delete';
        $options['model'] = Status::class;
        $uri = $this->api->makeUri(
            '/apis/networking.k8s.io/v1/namespaces/{namespace}/ingresses/{name}',
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
     * Partially update the specified Ingress
     *
     * Allowed query parameters:
     *   dryRun
     *   fieldManager
     *   fieldValidation
     *   force
     *   pretty
     */
    public function patchNetworkingV1Namespaced(string $name, PatchInterface $patch, array $query = []): Ingress
    {
        $options['query'] = $query;
        $options['method'] = 'patch';
        $options['body'] = $patch;
        $options['model'] = Ingress::class;
        $uri = $this->api->makeUri(
            '/apis/networking.k8s.io/v1/namespaces/{namespace}/ingresses/{name}',
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
     * Replace the specified Ingress
     *
     * Allowed query parameters:
     *   dryRun
     *   fieldManager
     *   fieldValidation
     *   pretty
     */
    public function replaceNetworkingV1Namespaced(string $name, Ingress $ingress, array $query = []): Ingress
    {
        $options['query'] = $query;
        $options['method'] = 'put';
        $options['body'] = $ingress;
        $options['model'] = Ingress::class;
        $uri = $this->api->makeUri(
            '/apis/networking.k8s.io/v1/namespaces/{namespace}/ingresses/{name}',
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
     * Read status of the specified Ingress
     *
     * Allowed query parameters:
     *   pretty
     */
    public function readNetworkingV1NamespacedStatus(string $name, array $query = []): Ingress
    {
        $options['query'] = $query;
        $options['method'] = 'get';
        $options['model'] = Ingress::class;
        $uri = $this->api->makeUri(
            '/apis/networking.k8s.io/v1/namespaces/{namespace}/ingresses/{name}/status',
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
     * Partially update status of the specified Ingress
     *
     * Allowed query parameters:
     *   dryRun
     *   fieldManager
     *   fieldValidation
     *   force
     *   pretty
     */
    public function patchNetworkingV1NamespacedStatus(string $name, PatchInterface $patch, array $query = []): Ingress
    {
        $options['query'] = $query;
        $options['method'] = 'patch';
        $options['body'] = $patch;
        $options['model'] = Ingress::class;
        $uri = $this->api->makeUri(
            '/apis/networking.k8s.io/v1/namespaces/{namespace}/ingresses/{name}/status',
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
     * Replace status of the specified Ingress
     *
     * Allowed query parameters:
     *   dryRun
     *   fieldManager
     *   fieldValidation
     *   pretty
     */
    public function replaceNetworkingV1NamespacedStatus(string $name, Ingress $ingress, array $query = []): Ingress
    {
        $options['query'] = $query;
        $options['method'] = 'put';
        $options['body'] = $ingress;
        $options['model'] = Ingress::class;
        $uri = $this->api->makeUri(
            '/apis/networking.k8s.io/v1/namespaces/{namespace}/ingresses/{name}/status',
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
     * Watch individual changes to a list of Ingress. deprecated: use the 'watch' parameter with a list
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
    public function watchNetworkingV1ListForAllNamespaces(array $query = [], callable|object|null $handler = null): void
    {
        $options['query'] = $query;
        $options['method'] = 'get';
        $options['handler'] = $handler;
        $options['model'] = WatchEvent::class;
        $uri = $this->api->makeUri(
            '/apis/networking.k8s.io/v1/watch/ingresses',
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
     * Watch individual changes to a list of Ingress. deprecated: use the 'watch' parameter with a list
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
    public function watchNetworkingV1NamespacedList(array $query = [], callable|object|null $handler = null): void
    {
        $options['query'] = $query;
        $options['method'] = 'get';
        $options['handler'] = $handler;
        $options['model'] = WatchEvent::class;
        $uri = $this->api->makeUri(
            '/apis/networking.k8s.io/v1/watch/namespaces/{namespace}/ingresses',
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
     * Watch changes to an object of kind Ingress. deprecated: use the 'watch' parameter with a list
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
    public function watchNetworkingV1Namespaced(string $name, array $query = [], callable|object|null $handler = null): void
    {
        $options['query'] = $query;
        $options['method'] = 'get';
        $options['handler'] = $handler;
        $options['model'] = WatchEvent::class;
        $uri = $this->api->makeUri(
            '/apis/networking.k8s.io/v1/watch/namespaces/{namespace}/ingresses/{name}',
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
