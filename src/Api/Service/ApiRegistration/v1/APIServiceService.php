<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Service\ApiRegistration\v1;

use Kcs\K8s\Api\Model\ApiMachinery\Apis\Meta\v1\Status;
use Kcs\K8s\Api\Model\ApiMachinery\Apis\Meta\v1\WatchEvent;
use Kcs\K8s\Api\Model\KubeAggregator\Apis\ApiRegistration\v1\APIService;
use Kcs\K8s\Api\Model\KubeAggregator\Apis\ApiRegistration\v1\APIServiceList;
use Kcs\K8s\Contract\ApiInterface;
use Kcs\K8s\PatchInterface;

class APIServiceService
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
     * List or watch objects of kind APIService
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
    public function listApiRegistrationV1(array $query = [], callable|object|null $handler = null): APIServiceList|null
    {
        $options['query'] = $query;
        $options['method'] = 'get';
        $options['handler'] = $handler;
        $options['model'] = APIServiceList::class;
        $uri = $this->api->makeUri(
            '/apis/apiregistration.k8s.io/v1/apiservices',
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
     * Delete collection of APIService
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
    public function deleteApiRegistrationV1Collection(array $query = []): Status
    {
        $options['query'] = $query;
        $options['method'] = 'delete';
        $options['model'] = Status::class;
        $uri = $this->api->makeUri(
            '/apis/apiregistration.k8s.io/v1/apiservices',
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
     * Create an APIService
     *
     * Allowed query parameters:
     *   dryRun
     *   fieldManager
     *   fieldValidation
     *   pretty
     */
    public function createApiRegistrationV1(APIService $aPIService, array $query = []): APIService
    {
        $options['query'] = $query;
        $options['method'] = 'post';
        $options['body'] = $aPIService;
        $options['model'] = APIService::class;
        $uri = $this->api->makeUri(
            '/apis/apiregistration.k8s.io/v1/apiservices',
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
     * Read the specified APIService
     *
     * Allowed query parameters:
     *   pretty
     */
    public function readApiRegistrationV1(string $name, array $query = []): APIService
    {
        $options['query'] = $query;
        $options['method'] = 'get';
        $options['model'] = APIService::class;
        $uri = $this->api->makeUri(
            '/apis/apiregistration.k8s.io/v1/apiservices/{name}',
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
     * Delete an APIService
     *
     * Allowed query parameters:
     *   dryRun
     *   gracePeriodSeconds
     *   orphanDependents
     *   propagationPolicy
     *   pretty
     */
    public function deleteApiRegistrationV1(string $name, array $query = []): Status
    {
        $options['query'] = $query;
        $options['method'] = 'delete';
        $options['model'] = Status::class;
        $uri = $this->api->makeUri(
            '/apis/apiregistration.k8s.io/v1/apiservices/{name}',
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
     * Partially update the specified APIService
     *
     * Allowed query parameters:
     *   dryRun
     *   fieldManager
     *   fieldValidation
     *   force
     *   pretty
     */
    public function patchApiRegistrationV1(string $name, PatchInterface $patch, array $query = []): APIService
    {
        $options['query'] = $query;
        $options['method'] = 'patch';
        $options['body'] = $patch;
        $options['model'] = APIService::class;
        $uri = $this->api->makeUri(
            '/apis/apiregistration.k8s.io/v1/apiservices/{name}',
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
     * Replace the specified APIService
     *
     * Allowed query parameters:
     *   dryRun
     *   fieldManager
     *   fieldValidation
     *   pretty
     */
    public function replaceApiRegistrationV1(string $name, APIService $aPIService, array $query = []): APIService
    {
        $options['query'] = $query;
        $options['method'] = 'put';
        $options['body'] = $aPIService;
        $options['model'] = APIService::class;
        $uri = $this->api->makeUri(
            '/apis/apiregistration.k8s.io/v1/apiservices/{name}',
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
     * Read status of the specified APIService
     *
     * Allowed query parameters:
     *   pretty
     */
    public function readApiRegistrationV1Status(string $name, array $query = []): APIService
    {
        $options['query'] = $query;
        $options['method'] = 'get';
        $options['model'] = APIService::class;
        $uri = $this->api->makeUri(
            '/apis/apiregistration.k8s.io/v1/apiservices/{name}/status',
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
     * Partially update status of the specified APIService
     *
     * Allowed query parameters:
     *   dryRun
     *   fieldManager
     *   fieldValidation
     *   force
     *   pretty
     */
    public function patchApiRegistrationV1Status(string $name, PatchInterface $patch, array $query = []): APIService
    {
        $options['query'] = $query;
        $options['method'] = 'patch';
        $options['body'] = $patch;
        $options['model'] = APIService::class;
        $uri = $this->api->makeUri(
            '/apis/apiregistration.k8s.io/v1/apiservices/{name}/status',
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
     * Replace status of the specified APIService
     *
     * Allowed query parameters:
     *   dryRun
     *   fieldManager
     *   fieldValidation
     *   pretty
     */
    public function replaceApiRegistrationV1Status(
        string $name,
        APIService $aPIService,
        array $query = [],
    ): APIService {
        $options['query'] = $query;
        $options['method'] = 'put';
        $options['body'] = $aPIService;
        $options['model'] = APIService::class;
        $uri = $this->api->makeUri(
            '/apis/apiregistration.k8s.io/v1/apiservices/{name}/status',
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
     * Watch individual changes to a list of APIService. deprecated: use the 'watch' parameter with a list
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
    public function watchApiRegistrationV1List(array $query = [], callable|object|null $handler = null): void
    {
        $options['query'] = $query;
        $options['method'] = 'get';
        $options['handler'] = $handler;
        $options['model'] = WatchEvent::class;
        $uri = $this->api->makeUri(
            '/apis/apiregistration.k8s.io/v1/watch/apiservices',
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
     * Watch changes to an object of kind APIService. deprecated: use the 'watch' parameter with a list
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
    public function watchApiRegistrationV1(string $name, array $query = [], callable|object|null $handler = null): void
    {
        $options['query'] = $query;
        $options['method'] = 'get';
        $options['handler'] = $handler;
        $options['model'] = WatchEvent::class;
        $uri = $this->api->makeUri(
            '/apis/apiregistration.k8s.io/v1/watch/apiservices/{name}',
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