<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Service\Certificates\v1alpha1;

use Kcs\K8s\Api\Model\Api\Certificates\v1alpha1\ClusterTrustBundle;
use Kcs\K8s\Api\Model\Api\Certificates\v1alpha1\ClusterTrustBundleList;
use Kcs\K8s\Api\Model\ApiMachinery\Apis\Meta\v1\Status;
use Kcs\K8s\Api\Model\ApiMachinery\Apis\Meta\v1\WatchEvent;
use Kcs\K8s\Contract\ApiInterface;
use Kcs\K8s\PatchInterface;

class ClusterTrustBundleService
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
     * List or watch objects of kind ClusterTrustBundle
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
    public function listCertificatesV1alpha1(array $query = [], callable|object|null $handler = null): ClusterTrustBundleList|null
    {
        $options['query'] = $query;
        $options['method'] = 'get';
        $options['handler'] = $handler;
        $options['model'] = ClusterTrustBundleList::class;
        $uri = $this->api->makeUri(
            '/apis/certificates.k8s.io/v1alpha1/clustertrustbundles',
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
     * Delete collection of ClusterTrustBundle
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
    public function deleteCertificatesV1alpha1Collection(array $query = []): Status
    {
        $options['query'] = $query;
        $options['method'] = 'delete';
        $options['model'] = Status::class;
        $uri = $this->api->makeUri(
            '/apis/certificates.k8s.io/v1alpha1/clustertrustbundles',
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
     * Create a ClusterTrustBundle
     *
     * Allowed query parameters:
     *   dryRun
     *   fieldManager
     *   fieldValidation
     *   pretty
     */
    public function createCertificatesV1alpha1(
        ClusterTrustBundle $clusterTrustBundle,
        array $query = [],
    ): ClusterTrustBundle {
        $options['query'] = $query;
        $options['method'] = 'post';
        $options['body'] = $clusterTrustBundle;
        $options['model'] = ClusterTrustBundle::class;
        $uri = $this->api->makeUri(
            '/apis/certificates.k8s.io/v1alpha1/clustertrustbundles',
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
     * Read the specified ClusterTrustBundle
     *
     * Allowed query parameters:
     *   pretty
     */
    public function readCertificatesV1alpha1(string $name, array $query = []): ClusterTrustBundle
    {
        $options['query'] = $query;
        $options['method'] = 'get';
        $options['model'] = ClusterTrustBundle::class;
        $uri = $this->api->makeUri(
            '/apis/certificates.k8s.io/v1alpha1/clustertrustbundles/{name}',
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
     * Delete a ClusterTrustBundle
     *
     * Allowed query parameters:
     *   dryRun
     *   gracePeriodSeconds
     *   orphanDependents
     *   propagationPolicy
     *   pretty
     */
    public function deleteCertificatesV1alpha1(string $name, array $query = []): Status
    {
        $options['query'] = $query;
        $options['method'] = 'delete';
        $options['model'] = Status::class;
        $uri = $this->api->makeUri(
            '/apis/certificates.k8s.io/v1alpha1/clustertrustbundles/{name}',
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
     * Partially update the specified ClusterTrustBundle
     *
     * Allowed query parameters:
     *   dryRun
     *   fieldManager
     *   fieldValidation
     *   force
     *   pretty
     */
    public function patchCertificatesV1alpha1(
        string $name,
        PatchInterface $patch,
        array $query = [],
    ): ClusterTrustBundle {
        $options['query'] = $query;
        $options['method'] = 'patch';
        $options['body'] = $patch;
        $options['model'] = ClusterTrustBundle::class;
        $uri = $this->api->makeUri(
            '/apis/certificates.k8s.io/v1alpha1/clustertrustbundles/{name}',
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
     * Replace the specified ClusterTrustBundle
     *
     * Allowed query parameters:
     *   dryRun
     *   fieldManager
     *   fieldValidation
     *   pretty
     */
    public function replaceCertificatesV1alpha1(
        string $name,
        ClusterTrustBundle $clusterTrustBundle,
        array $query = [],
    ): ClusterTrustBundle {
        $options['query'] = $query;
        $options['method'] = 'put';
        $options['body'] = $clusterTrustBundle;
        $options['model'] = ClusterTrustBundle::class;
        $uri = $this->api->makeUri(
            '/apis/certificates.k8s.io/v1alpha1/clustertrustbundles/{name}',
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
     * Watch individual changes to a list of ClusterTrustBundle. deprecated: use the 'watch' parameter with
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
     */
    public function watchCertificatesV1alpha1List(array $query = [], callable|object|null $handler = null): void
    {
        $options['query'] = $query;
        $options['method'] = 'get';
        $options['handler'] = $handler;
        $options['model'] = WatchEvent::class;
        $uri = $this->api->makeUri(
            '/apis/certificates.k8s.io/v1alpha1/watch/clustertrustbundles',
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
     * Watch changes to an object of kind ClusterTrustBundle. deprecated: use the 'watch' parameter with a
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
     */
    public function watchCertificatesV1alpha1(string $name, array $query = [], callable|object|null $handler = null): void
    {
        $options['query'] = $query;
        $options['method'] = 'get';
        $options['handler'] = $handler;
        $options['model'] = WatchEvent::class;
        $uri = $this->api->makeUri(
            '/apis/certificates.k8s.io/v1alpha1/watch/clustertrustbundles/{name}',
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
