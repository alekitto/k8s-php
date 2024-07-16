<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Service\Rbac\Authorization\v1;

use Kcs\K8s\Api\Model\Api\Rbac\v1\ClusterRoleBinding;
use Kcs\K8s\Api\Model\Api\Rbac\v1\ClusterRoleBindingList;
use Kcs\K8s\Api\Model\ApiMachinery\Apis\Meta\v1\Status;
use Kcs\K8s\Api\Model\ApiMachinery\Apis\Meta\v1\WatchEvent;
use Kcs\K8s\Contract\ApiInterface;
use Kcs\K8s\PatchInterface;

class ClusterRoleBindingService
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
     * List or watch objects of kind ClusterRoleBinding
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
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.30/#list-clusterrolebinding-v1-rbac-authorization-k8s-io
     */
    public function listRbacAuthorizationV1(array $query = [], callable|object|null $handler = null): ClusterRoleBindingList|null
    {
        $options['query'] = $query;
        $options['method'] = 'get';
        $options['handler'] = $handler;
        $options['model'] = ClusterRoleBindingList::class;
        $uri = $this->api->buildUri(
            '/apis/rbac.authorization.k8s.io/v1/clusterrolebindings',
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
     * Delete collection of ClusterRoleBinding
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
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.30/#delete-collection-clusterrolebinding-v1-rbac-authorization-k8s-io
     */
    public function deleteRbacAuthorizationV1Collection(array $query = []): Status
    {
        $options['query'] = $query;
        $options['method'] = 'delete';
        $options['model'] = Status::class;
        $uri = $this->api->buildUri(
            '/apis/rbac.authorization.k8s.io/v1/clusterrolebindings',
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
     * Create a ClusterRoleBinding
     *
     * Allowed query parameters:
     *   dryRun
     *   fieldManager
     *   fieldValidation
     *   pretty
     *
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.30/#create-clusterrolebinding-v1-rbac-authorization-k8s-io
     */
    public function createRbacAuthorizationV1(
        ClusterRoleBinding $clusterRoleBinding,
        array $query = [],
    ): ClusterRoleBinding {
        $options['query'] = $query;
        $options['method'] = 'post';
        $options['body'] = $clusterRoleBinding;
        $options['model'] = ClusterRoleBinding::class;
        $uri = $this->api->buildUri(
            '/apis/rbac.authorization.k8s.io/v1/clusterrolebindings',
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
     * Read the specified ClusterRoleBinding
     *
     * Allowed query parameters:
     *   pretty
     *
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.30/#read-clusterrolebinding-v1-rbac-authorization-k8s-io
     */
    public function readRbacAuthorizationV1(string $name, array $query = []): ClusterRoleBinding
    {
        $options['query'] = $query;
        $options['method'] = 'get';
        $options['model'] = ClusterRoleBinding::class;
        $uri = $this->api->buildUri(
            '/apis/rbac.authorization.k8s.io/v1/clusterrolebindings/{name}',
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
     * Delete a ClusterRoleBinding
     *
     * Allowed query parameters:
     *   dryRun
     *   gracePeriodSeconds
     *   orphanDependents
     *   propagationPolicy
     *   pretty
     *
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.30/#delete-clusterrolebinding-v1-rbac-authorization-k8s-io
     */
    public function deleteRbacAuthorizationV1(string $name, array $query = []): Status
    {
        $options['query'] = $query;
        $options['method'] = 'delete';
        $options['model'] = Status::class;
        $uri = $this->api->buildUri(
            '/apis/rbac.authorization.k8s.io/v1/clusterrolebindings/{name}',
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
     * Partially update the specified ClusterRoleBinding
     *
     * Allowed query parameters:
     *   dryRun
     *   fieldManager
     *   fieldValidation
     *   force
     *   pretty
     *
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.30/#patch-clusterrolebinding-v1-rbac-authorization-k8s-io
     */
    public function patchRbacAuthorizationV1(
        string $name,
        PatchInterface $patch,
        array $query = [],
    ): ClusterRoleBinding {
        $options['query'] = $query;
        $options['method'] = 'patch';
        $options['body'] = $patch;
        $options['model'] = ClusterRoleBinding::class;
        $uri = $this->api->buildUri(
            '/apis/rbac.authorization.k8s.io/v1/clusterrolebindings/{name}',
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
     * Replace the specified ClusterRoleBinding
     *
     * Allowed query parameters:
     *   dryRun
     *   fieldManager
     *   fieldValidation
     *   pretty
     *
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.30/#put-clusterrolebinding-v1-rbac-authorization-k8s-io
     */
    public function replaceRbacAuthorizationV1(
        string $name,
        ClusterRoleBinding $clusterRoleBinding,
        array $query = [],
    ): ClusterRoleBinding {
        $options['query'] = $query;
        $options['method'] = 'put';
        $options['body'] = $clusterRoleBinding;
        $options['model'] = ClusterRoleBinding::class;
        $uri = $this->api->buildUri(
            '/apis/rbac.authorization.k8s.io/v1/clusterrolebindings/{name}',
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
     * Watch individual changes to a list of ClusterRoleBinding. deprecated: use the 'watch' parameter with
     * a list operation instead.
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
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.30/#watchlist-clusterrolebinding-v1-rbac-authorization-k8s-io
     */
    public function watchRbacAuthorizationV1List(array $query = [], callable|object|null $handler = null): void
    {
        $options['query'] = $query;
        $options['method'] = 'get';
        $options['handler'] = $handler;
        $options['model'] = WatchEvent::class;
        $uri = $this->api->buildUri(
            '/apis/rbac.authorization.k8s.io/v1/watch/clusterrolebindings',
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
     * Watch changes to an object of kind ClusterRoleBinding. deprecated: use the 'watch' parameter with a
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
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.30/#watch-clusterrolebinding-v1-rbac-authorization-k8s-io
     */
    public function watchRbacAuthorizationV1(string $name, array $query = [], callable|object|null $handler = null): void
    {
        $options['query'] = $query;
        $options['method'] = 'get';
        $options['handler'] = $handler;
        $options['model'] = WatchEvent::class;
        $uri = $this->api->buildUri(
            '/apis/rbac.authorization.k8s.io/v1/watch/clusterrolebindings/{name}',
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
