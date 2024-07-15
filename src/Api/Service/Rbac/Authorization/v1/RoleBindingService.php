<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Service\Rbac\Authorization\v1;

use Kcs\K8s\Api\Model\Api\Rbac\v1\RoleBinding;
use Kcs\K8s\Api\Model\Api\Rbac\v1\RoleBindingList;
use Kcs\K8s\Api\Model\ApiMachinery\Apis\Meta\v1\Status;
use Kcs\K8s\Api\Model\ApiMachinery\Apis\Meta\v1\WatchEvent;
use Kcs\K8s\Contract\ApiInterface;
use Kcs\K8s\PatchInterface;

class RoleBindingService
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
     * List or watch objects of kind RoleBinding
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
    public function listRbacAuthorizationV1Namespaced(array $query = [], callable|object|null $handler = null): RoleBindingList|null
    {
        $options['query'] = $query;
        $options['method'] = 'get';
        $options['handler'] = $handler;
        $options['model'] = RoleBindingList::class;
        $uri = $this->api->makeUri(
            '/apis/rbac.authorization.k8s.io/v1/namespaces/{namespace}/rolebindings',
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
     * Delete collection of RoleBinding
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
    public function deleteRbacAuthorizationV1CollectionNamespaced(array $query = []): Status
    {
        $options['query'] = $query;
        $options['method'] = 'delete';
        $options['model'] = Status::class;
        $uri = $this->api->makeUri(
            '/apis/rbac.authorization.k8s.io/v1/namespaces/{namespace}/rolebindings',
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
     * Create a RoleBinding
     *
     * Allowed query parameters:
     *   dryRun
     *   fieldManager
     *   fieldValidation
     *   pretty
     */
    public function createRbacAuthorizationV1Namespaced(RoleBinding $roleBinding, array $query = []): RoleBinding
    {
        $options['query'] = $query;
        $options['method'] = 'post';
        $options['body'] = $roleBinding;
        $options['model'] = RoleBinding::class;
        $uri = $this->api->makeUri(
            '/apis/rbac.authorization.k8s.io/v1/namespaces/{namespace}/rolebindings',
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
     * Read the specified RoleBinding
     *
     * Allowed query parameters:
     *   pretty
     */
    public function readRbacAuthorizationV1Namespaced(string $name, array $query = []): RoleBinding
    {
        $options['query'] = $query;
        $options['method'] = 'get';
        $options['model'] = RoleBinding::class;
        $uri = $this->api->makeUri(
            '/apis/rbac.authorization.k8s.io/v1/namespaces/{namespace}/rolebindings/{name}',
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
     * Delete a RoleBinding
     *
     * Allowed query parameters:
     *   dryRun
     *   gracePeriodSeconds
     *   orphanDependents
     *   propagationPolicy
     *   pretty
     */
    public function deleteRbacAuthorizationV1Namespaced(string $name, array $query = []): Status
    {
        $options['query'] = $query;
        $options['method'] = 'delete';
        $options['model'] = Status::class;
        $uri = $this->api->makeUri(
            '/apis/rbac.authorization.k8s.io/v1/namespaces/{namespace}/rolebindings/{name}',
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
     * Partially update the specified RoleBinding
     *
     * Allowed query parameters:
     *   dryRun
     *   fieldManager
     *   fieldValidation
     *   force
     *   pretty
     */
    public function patchRbacAuthorizationV1Namespaced(
        string $name,
        PatchInterface $patch,
        array $query = [],
    ): RoleBinding {
        $options['query'] = $query;
        $options['method'] = 'patch';
        $options['body'] = $patch;
        $options['model'] = RoleBinding::class;
        $uri = $this->api->makeUri(
            '/apis/rbac.authorization.k8s.io/v1/namespaces/{namespace}/rolebindings/{name}',
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
     * Replace the specified RoleBinding
     *
     * Allowed query parameters:
     *   dryRun
     *   fieldManager
     *   fieldValidation
     *   pretty
     */
    public function replaceRbacAuthorizationV1Namespaced(
        string $name,
        RoleBinding $roleBinding,
        array $query = [],
    ): RoleBinding {
        $options['query'] = $query;
        $options['method'] = 'put';
        $options['body'] = $roleBinding;
        $options['model'] = RoleBinding::class;
        $uri = $this->api->makeUri(
            '/apis/rbac.authorization.k8s.io/v1/namespaces/{namespace}/rolebindings/{name}',
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
     * List or watch objects of kind RoleBinding
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
    public function listRbacAuthorizationV1ForAllNamespaces(array $query = [], callable|object|null $handler = null): RoleBindingList|null
    {
        $options['query'] = $query;
        $options['method'] = 'get';
        $options['handler'] = $handler;
        $options['model'] = RoleBindingList::class;
        $uri = $this->api->makeUri(
            '/apis/rbac.authorization.k8s.io/v1/rolebindings',
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
     * Watch individual changes to a list of RoleBinding. deprecated: use the 'watch' parameter with a list
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
    public function watchRbacAuthorizationV1NamespacedList(array $query = [], callable|object|null $handler = null): void
    {
        $options['query'] = $query;
        $options['method'] = 'get';
        $options['handler'] = $handler;
        $options['model'] = WatchEvent::class;
        $uri = $this->api->makeUri(
            '/apis/rbac.authorization.k8s.io/v1/watch/namespaces/{namespace}/rolebindings',
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
     * Watch changes to an object of kind RoleBinding. deprecated: use the 'watch' parameter with a list
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
    public function watchRbacAuthorizationV1Namespaced(string $name, array $query = [], callable|object|null $handler = null): void
    {
        $options['query'] = $query;
        $options['method'] = 'get';
        $options['handler'] = $handler;
        $options['model'] = WatchEvent::class;
        $uri = $this->api->makeUri(
            '/apis/rbac.authorization.k8s.io/v1/watch/namespaces/{namespace}/rolebindings/{name}',
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

    /**
     * Watch individual changes to a list of RoleBinding. deprecated: use the 'watch' parameter with a list
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
    public function watchRbacAuthorizationV1ListForAllNamespaces(array $query = [], callable|object|null $handler = null): void
    {
        $options['query'] = $query;
        $options['method'] = 'get';
        $options['handler'] = $handler;
        $options['model'] = WatchEvent::class;
        $uri = $this->api->makeUri(
            '/apis/rbac.authorization.k8s.io/v1/watch/rolebindings',
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
}
