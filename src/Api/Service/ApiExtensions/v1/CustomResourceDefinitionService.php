<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Service\ApiExtensions\v1;

use Kcs\K8s\Api\Model\ApiExtensions\v1\CustomResourceDefinition;
use Kcs\K8s\Api\Model\ApiExtensions\v1\CustomResourceDefinitionList;
use Kcs\K8s\Api\Model\ApiMachinery\Apis\Meta\v1\Status;
use Kcs\K8s\Api\Model\ApiMachinery\Apis\Meta\v1\WatchEvent;
use Kcs\K8s\Contract\ApiInterface;
use Kcs\K8s\PatchInterface;

class CustomResourceDefinitionService
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
     * List or watch objects of kind CustomResourceDefinition
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
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.30/#list-customresourcedefinition-v1-apiextensions-k8s-io
     */
    public function listApiExtensionsV1(array $query = [], callable|object|null $handler = null): CustomResourceDefinitionList|null
    {
        $options['query'] = $query;
        $options['method'] = 'get';
        $options['handler'] = $handler;
        $options['model'] = CustomResourceDefinitionList::class;
        $uri = $this->api->buildUri(
            '/apis/apiextensions.k8s.io/v1/customresourcedefinitions',
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
     * Delete collection of CustomResourceDefinition
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
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.30/#delete-collection-customresourcedefinition-v1-apiextensions-k8s-io
     */
    public function deleteApiExtensionsV1Collection(array $query = []): Status
    {
        $options['query'] = $query;
        $options['method'] = 'delete';
        $options['model'] = Status::class;
        $uri = $this->api->buildUri(
            '/apis/apiextensions.k8s.io/v1/customresourcedefinitions',
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
     * Create a CustomResourceDefinition
     *
     * Allowed query parameters:
     *   dryRun
     *   fieldManager
     *   fieldValidation
     *   pretty
     *
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.30/#create-customresourcedefinition-v1-apiextensions-k8s-io
     */
    public function createApiExtensionsV1(
        CustomResourceDefinition $customResourceDefinition,
        array $query = [],
    ): CustomResourceDefinition {
        $options['query'] = $query;
        $options['method'] = 'post';
        $options['body'] = $customResourceDefinition;
        $options['model'] = CustomResourceDefinition::class;
        $uri = $this->api->buildUri(
            '/apis/apiextensions.k8s.io/v1/customresourcedefinitions',
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
     * Read the specified CustomResourceDefinition
     *
     * Allowed query parameters:
     *   pretty
     *
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.30/#read-customresourcedefinition-v1-apiextensions-k8s-io
     */
    public function readApiExtensionsV1(string $name, array $query = []): CustomResourceDefinition
    {
        $options['query'] = $query;
        $options['method'] = 'get';
        $options['model'] = CustomResourceDefinition::class;
        $uri = $this->api->buildUri(
            '/apis/apiextensions.k8s.io/v1/customresourcedefinitions/{name}',
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
     * Delete a CustomResourceDefinition
     *
     * Allowed query parameters:
     *   dryRun
     *   gracePeriodSeconds
     *   orphanDependents
     *   propagationPolicy
     *   pretty
     *
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.30/#delete-customresourcedefinition-v1-apiextensions-k8s-io
     */
    public function deleteApiExtensionsV1(string $name, array $query = []): Status
    {
        $options['query'] = $query;
        $options['method'] = 'delete';
        $options['model'] = Status::class;
        $uri = $this->api->buildUri(
            '/apis/apiextensions.k8s.io/v1/customresourcedefinitions/{name}',
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
     * Partially update the specified CustomResourceDefinition
     *
     * Allowed query parameters:
     *   dryRun
     *   fieldManager
     *   fieldValidation
     *   force
     *   pretty
     *
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.30/#patch-customresourcedefinition-v1-apiextensions-k8s-io
     */
    public function patchApiExtensionsV1(
        string $name,
        PatchInterface $patch,
        array $query = [],
    ): CustomResourceDefinition {
        $options['query'] = $query;
        $options['method'] = 'patch';
        $options['body'] = $patch;
        $options['model'] = CustomResourceDefinition::class;
        $uri = $this->api->buildUri(
            '/apis/apiextensions.k8s.io/v1/customresourcedefinitions/{name}',
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
     * Replace the specified CustomResourceDefinition
     *
     * Allowed query parameters:
     *   dryRun
     *   fieldManager
     *   fieldValidation
     *   pretty
     *
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.30/#put-customresourcedefinition-v1-apiextensions-k8s-io
     */
    public function replaceApiExtensionsV1(
        string $name,
        CustomResourceDefinition $customResourceDefinition,
        array $query = [],
    ): CustomResourceDefinition {
        $options['query'] = $query;
        $options['method'] = 'put';
        $options['body'] = $customResourceDefinition;
        $options['model'] = CustomResourceDefinition::class;
        $uri = $this->api->buildUri(
            '/apis/apiextensions.k8s.io/v1/customresourcedefinitions/{name}',
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
     * Read status of the specified CustomResourceDefinition
     *
     * Allowed query parameters:
     *   pretty
     *
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.30/#read-customresourcedefinition-v1-apiextensions-k8s-io
     */
    public function readApiExtensionsV1Status(string $name, array $query = []): CustomResourceDefinition
    {
        $options['query'] = $query;
        $options['method'] = 'get';
        $options['model'] = CustomResourceDefinition::class;
        $uri = $this->api->buildUri(
            '/apis/apiextensions.k8s.io/v1/customresourcedefinitions/{name}/status',
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
     * Partially update status of the specified CustomResourceDefinition
     *
     * Allowed query parameters:
     *   dryRun
     *   fieldManager
     *   fieldValidation
     *   force
     *   pretty
     *
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.30/#patch-customresourcedefinition-v1-apiextensions-k8s-io
     */
    public function patchApiExtensionsV1Status(
        string $name,
        PatchInterface $patch,
        array $query = [],
    ): CustomResourceDefinition {
        $options['query'] = $query;
        $options['method'] = 'patch';
        $options['body'] = $patch;
        $options['model'] = CustomResourceDefinition::class;
        $uri = $this->api->buildUri(
            '/apis/apiextensions.k8s.io/v1/customresourcedefinitions/{name}/status',
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
     * Replace status of the specified CustomResourceDefinition
     *
     * Allowed query parameters:
     *   dryRun
     *   fieldManager
     *   fieldValidation
     *   pretty
     *
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.30/#put-customresourcedefinition-v1-apiextensions-k8s-io
     */
    public function replaceApiExtensionsV1Status(
        string $name,
        CustomResourceDefinition $customResourceDefinition,
        array $query = [],
    ): CustomResourceDefinition {
        $options['query'] = $query;
        $options['method'] = 'put';
        $options['body'] = $customResourceDefinition;
        $options['model'] = CustomResourceDefinition::class;
        $uri = $this->api->buildUri(
            '/apis/apiextensions.k8s.io/v1/customresourcedefinitions/{name}/status',
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
     * Watch individual changes to a list of CustomResourceDefinition. deprecated: use the 'watch'
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
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.30/#watchlist-customresourcedefinition-v1-apiextensions-k8s-io
     */
    public function watchApiExtensionsV1List(array $query = [], callable|object|null $handler = null): void
    {
        $options['query'] = $query;
        $options['method'] = 'get';
        $options['handler'] = $handler;
        $options['model'] = WatchEvent::class;
        $uri = $this->api->buildUri(
            '/apis/apiextensions.k8s.io/v1/watch/customresourcedefinitions',
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
     * Watch changes to an object of kind CustomResourceDefinition. deprecated: use the 'watch' parameter
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
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.30/#watch-customresourcedefinition-v1-apiextensions-k8s-io
     */
    public function watchApiExtensionsV1(string $name, array $query = [], callable|object|null $handler = null): void
    {
        $options['query'] = $query;
        $options['method'] = 'get';
        $options['handler'] = $handler;
        $options['model'] = WatchEvent::class;
        $uri = $this->api->buildUri(
            '/apis/apiextensions.k8s.io/v1/watch/customresourcedefinitions/{name}',
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
