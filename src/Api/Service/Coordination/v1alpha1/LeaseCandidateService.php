<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Service\Coordination\v1alpha1;

use Kcs\K8s\Api\Model\Api\Coordination\v1alpha1\LeaseCandidate;
use Kcs\K8s\Api\Model\Api\Coordination\v1alpha1\LeaseCandidateList;
use Kcs\K8s\Api\Model\ApiMachinery\Apis\Meta\v1\Status;
use Kcs\K8s\Api\Model\ApiMachinery\Apis\Meta\v1\WatchEvent;
use Kcs\K8s\Contract\ApiInterface;
use Kcs\K8s\PatchInterface;

class LeaseCandidateService
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
     * List or watch objects of kind LeaseCandidate
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
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.31/#list-leasecandidate-v1alpha1-coordination-k8s-io
     */
    public function listCoordinationV1alpha1ForAllNamespaces(array $query = [], callable|object|null $handler = null): LeaseCandidateList|null
    {
        $options['query'] = $query;
        $options['method'] = 'get';
        $options['handler'] = $handler;
        $options['model'] = LeaseCandidateList::class;
        $uri = $this->api->buildUri(
            '/apis/coordination.k8s.io/v1alpha1/leasecandidates',
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
     * List or watch objects of kind LeaseCandidate
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
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.31/#list-leasecandidate-v1alpha1-coordination-k8s-io
     */
    public function listCoordinationV1alpha1Namespaced(array $query = [], callable|object|null $handler = null): LeaseCandidateList|null
    {
        $options['query'] = $query;
        $options['method'] = 'get';
        $options['handler'] = $handler;
        $options['model'] = LeaseCandidateList::class;
        $uri = $this->api->buildUri(
            '/apis/coordination.k8s.io/v1alpha1/namespaces/{namespace}/leasecandidates',
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
     * Delete collection of LeaseCandidate
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
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.31/#delete-collection-leasecandidate-v1alpha1-coordination-k8s-io
     */
    public function deleteCoordinationV1alpha1CollectionNamespaced(array $query = []): Status
    {
        $options['query'] = $query;
        $options['method'] = 'delete';
        $options['model'] = Status::class;
        $uri = $this->api->buildUri(
            '/apis/coordination.k8s.io/v1alpha1/namespaces/{namespace}/leasecandidates',
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
     * Create a LeaseCandidate
     *
     * Allowed query parameters:
     *   dryRun
     *   fieldManager
     *   fieldValidation
     *   pretty
     *
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.31/#create-leasecandidate-v1alpha1-coordination-k8s-io
     */
    public function createCoordinationV1alpha1Namespaced(
        LeaseCandidate $leaseCandidate,
        array $query = [],
    ): LeaseCandidate {
        $options['query'] = $query;
        $options['method'] = 'post';
        $options['body'] = $leaseCandidate;
        $options['model'] = LeaseCandidate::class;
        $uri = $this->api->buildUri(
            '/apis/coordination.k8s.io/v1alpha1/namespaces/{namespace}/leasecandidates',
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
     * Read the specified LeaseCandidate
     *
     * Allowed query parameters:
     *   pretty
     *
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.31/#read-leasecandidate-v1alpha1-coordination-k8s-io
     */
    public function readCoordinationV1alpha1Namespaced(string $name, array $query = []): LeaseCandidate
    {
        $options['query'] = $query;
        $options['method'] = 'get';
        $options['model'] = LeaseCandidate::class;
        $uri = $this->api->buildUri(
            '/apis/coordination.k8s.io/v1alpha1/namespaces/{namespace}/leasecandidates/{name}',
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
     * Delete a LeaseCandidate
     *
     * Allowed query parameters:
     *   dryRun
     *   gracePeriodSeconds
     *   orphanDependents
     *   propagationPolicy
     *   pretty
     *
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.31/#delete-leasecandidate-v1alpha1-coordination-k8s-io
     */
    public function deleteCoordinationV1alpha1Namespaced(string $name, array $query = [])
    {
        $options['query'] = $query;
        $options['method'] = 'delete';
        $uri = $this->api->buildUri(
            '/apis/coordination.k8s.io/v1alpha1/namespaces/{namespace}/leasecandidates/{name}',
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
     * Partially update the specified LeaseCandidate
     *
     * Allowed query parameters:
     *   dryRun
     *   fieldManager
     *   fieldValidation
     *   force
     *   pretty
     *
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.31/#patch-leasecandidate-v1alpha1-coordination-k8s-io
     */
    public function patchCoordinationV1alpha1Namespaced(
        string $name,
        PatchInterface $patch,
        array $query = [],
    ): LeaseCandidate {
        $options['query'] = $query;
        $options['method'] = 'patch';
        $options['body'] = $patch;
        $options['model'] = LeaseCandidate::class;
        $uri = $this->api->buildUri(
            '/apis/coordination.k8s.io/v1alpha1/namespaces/{namespace}/leasecandidates/{name}',
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
     * Replace the specified LeaseCandidate
     *
     * Allowed query parameters:
     *   dryRun
     *   fieldManager
     *   fieldValidation
     *   pretty
     *
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.31/#put-leasecandidate-v1alpha1-coordination-k8s-io
     */
    public function replaceCoordinationV1alpha1Namespaced(
        string $name,
        LeaseCandidate $leaseCandidate,
        array $query = [],
    ): LeaseCandidate {
        $options['query'] = $query;
        $options['method'] = 'put';
        $options['body'] = $leaseCandidate;
        $options['model'] = LeaseCandidate::class;
        $uri = $this->api->buildUri(
            '/apis/coordination.k8s.io/v1alpha1/namespaces/{namespace}/leasecandidates/{name}',
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
     * Watch individual changes to a list of LeaseCandidate. deprecated: use the 'watch' parameter with a
     * list operation instead.
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
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.31/#watchlist-leasecandidate-v1alpha1-coordination-k8s-io
     */
    public function watchCoordinationV1alpha1ListForAllNamespaces(array $query = [], callable|object|null $handler = null): void
    {
        $options['query'] = $query;
        $options['method'] = 'get';
        $options['handler'] = $handler;
        $options['model'] = WatchEvent::class;
        $uri = $this->api->buildUri(
            '/apis/coordination.k8s.io/v1alpha1/watch/leasecandidates',
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
     * Watch individual changes to a list of LeaseCandidate. deprecated: use the 'watch' parameter with a
     * list operation instead.
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
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.31/#watchlist-leasecandidate-v1alpha1-coordination-k8s-io
     */
    public function watchCoordinationV1alpha1NamespacedList(array $query = [], callable|object|null $handler = null): void
    {
        $options['query'] = $query;
        $options['method'] = 'get';
        $options['handler'] = $handler;
        $options['model'] = WatchEvent::class;
        $uri = $this->api->buildUri(
            '/apis/coordination.k8s.io/v1alpha1/watch/namespaces/{namespace}/leasecandidates',
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
     * Watch changes to an object of kind LeaseCandidate. deprecated: use the 'watch' parameter with a list
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
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.31/#watch-leasecandidate-v1alpha1-coordination-k8s-io
     */
    public function watchCoordinationV1alpha1Namespaced(string $name, array $query = [], callable|object|null $handler = null): void
    {
        $options['query'] = $query;
        $options['method'] = 'get';
        $options['handler'] = $handler;
        $options['model'] = WatchEvent::class;
        $uri = $this->api->buildUri(
            '/apis/coordination.k8s.io/v1alpha1/watch/namespaces/{namespace}/leasecandidates/{name}',
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