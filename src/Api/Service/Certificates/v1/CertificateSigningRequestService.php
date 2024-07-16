<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Service\Certificates\v1;

use Kcs\K8s\Api\Model\Api\Certificates\v1\CertificateSigningRequest;
use Kcs\K8s\Api\Model\Api\Certificates\v1\CertificateSigningRequestList;
use Kcs\K8s\Api\Model\ApiMachinery\Apis\Meta\v1\Status;
use Kcs\K8s\Api\Model\ApiMachinery\Apis\Meta\v1\WatchEvent;
use Kcs\K8s\Contract\ApiInterface;
use Kcs\K8s\PatchInterface;

class CertificateSigningRequestService
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
     * List or watch objects of kind CertificateSigningRequest
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
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.30/#list-certificatesigningrequest-v1-certificates-k8s-io
     */
    public function listCertificatesV1(array $query = [], callable|object|null $handler = null): CertificateSigningRequestList|null
    {
        $options['query'] = $query;
        $options['method'] = 'get';
        $options['handler'] = $handler;
        $options['model'] = CertificateSigningRequestList::class;
        $uri = $this->api->buildUri(
            '/apis/certificates.k8s.io/v1/certificatesigningrequests',
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
     * Delete collection of CertificateSigningRequest
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
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.30/#delete-collection-certificatesigningrequest-v1-certificates-k8s-io
     */
    public function deleteCertificatesV1Collection(array $query = []): Status
    {
        $options['query'] = $query;
        $options['method'] = 'delete';
        $options['model'] = Status::class;
        $uri = $this->api->buildUri(
            '/apis/certificates.k8s.io/v1/certificatesigningrequests',
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
     * Create a CertificateSigningRequest
     *
     * Allowed query parameters:
     *   dryRun
     *   fieldManager
     *   fieldValidation
     *   pretty
     *
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.30/#create-certificatesigningrequest-v1-certificates-k8s-io
     */
    public function createCertificatesV1(
        CertificateSigningRequest $certificateSigningRequest,
        array $query = [],
    ): CertificateSigningRequest {
        $options['query'] = $query;
        $options['method'] = 'post';
        $options['body'] = $certificateSigningRequest;
        $options['model'] = CertificateSigningRequest::class;
        $uri = $this->api->buildUri(
            '/apis/certificates.k8s.io/v1/certificatesigningrequests',
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
     * Read the specified CertificateSigningRequest
     *
     * Allowed query parameters:
     *   pretty
     *
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.30/#read-certificatesigningrequest-v1-certificates-k8s-io
     */
    public function readCertificatesV1(string $name, array $query = []): CertificateSigningRequest
    {
        $options['query'] = $query;
        $options['method'] = 'get';
        $options['model'] = CertificateSigningRequest::class;
        $uri = $this->api->buildUri(
            '/apis/certificates.k8s.io/v1/certificatesigningrequests/{name}',
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
     * Delete a CertificateSigningRequest
     *
     * Allowed query parameters:
     *   dryRun
     *   gracePeriodSeconds
     *   orphanDependents
     *   propagationPolicy
     *   pretty
     *
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.30/#delete-certificatesigningrequest-v1-certificates-k8s-io
     */
    public function deleteCertificatesV1(string $name, array $query = []): Status
    {
        $options['query'] = $query;
        $options['method'] = 'delete';
        $options['model'] = Status::class;
        $uri = $this->api->buildUri(
            '/apis/certificates.k8s.io/v1/certificatesigningrequests/{name}',
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
     * Partially update the specified CertificateSigningRequest
     *
     * Allowed query parameters:
     *   dryRun
     *   fieldManager
     *   fieldValidation
     *   force
     *   pretty
     *
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.30/#patch-certificatesigningrequest-v1-certificates-k8s-io
     */
    public function patchCertificatesV1(
        string $name,
        PatchInterface $patch,
        array $query = [],
    ): CertificateSigningRequest {
        $options['query'] = $query;
        $options['method'] = 'patch';
        $options['body'] = $patch;
        $options['model'] = CertificateSigningRequest::class;
        $uri = $this->api->buildUri(
            '/apis/certificates.k8s.io/v1/certificatesigningrequests/{name}',
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
     * Replace the specified CertificateSigningRequest
     *
     * Allowed query parameters:
     *   dryRun
     *   fieldManager
     *   fieldValidation
     *   pretty
     *
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.30/#put-certificatesigningrequest-v1-certificates-k8s-io
     */
    public function replaceCertificatesV1(
        string $name,
        CertificateSigningRequest $certificateSigningRequest,
        array $query = [],
    ): CertificateSigningRequest {
        $options['query'] = $query;
        $options['method'] = 'put';
        $options['body'] = $certificateSigningRequest;
        $options['model'] = CertificateSigningRequest::class;
        $uri = $this->api->buildUri(
            '/apis/certificates.k8s.io/v1/certificatesigningrequests/{name}',
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
     * Read approval of the specified CertificateSigningRequest
     *
     * Allowed query parameters:
     *   pretty
     *
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.30/#read-certificatesigningrequest-v1-certificates-k8s-io
     */
    public function readCertificatesV1Approval(string $name, array $query = []): CertificateSigningRequest
    {
        $options['query'] = $query;
        $options['method'] = 'get';
        $options['model'] = CertificateSigningRequest::class;
        $uri = $this->api->buildUri(
            '/apis/certificates.k8s.io/v1/certificatesigningrequests/{name}/approval',
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
     * Partially update approval of the specified CertificateSigningRequest
     *
     * Allowed query parameters:
     *   dryRun
     *   fieldManager
     *   fieldValidation
     *   force
     *   pretty
     *
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.30/#patch-certificatesigningrequest-v1-certificates-k8s-io
     */
    public function patchCertificatesV1Approval(
        string $name,
        PatchInterface $patch,
        array $query = [],
    ): CertificateSigningRequest {
        $options['query'] = $query;
        $options['method'] = 'patch';
        $options['body'] = $patch;
        $options['model'] = CertificateSigningRequest::class;
        $uri = $this->api->buildUri(
            '/apis/certificates.k8s.io/v1/certificatesigningrequests/{name}/approval',
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
     * Replace approval of the specified CertificateSigningRequest
     *
     * Allowed query parameters:
     *   dryRun
     *   fieldManager
     *   fieldValidation
     *   pretty
     *
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.30/#put-certificatesigningrequest-v1-certificates-k8s-io
     */
    public function replaceCertificatesV1Approval(
        string $name,
        CertificateSigningRequest $certificateSigningRequest,
        array $query = [],
    ): CertificateSigningRequest {
        $options['query'] = $query;
        $options['method'] = 'put';
        $options['body'] = $certificateSigningRequest;
        $options['model'] = CertificateSigningRequest::class;
        $uri = $this->api->buildUri(
            '/apis/certificates.k8s.io/v1/certificatesigningrequests/{name}/approval',
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
     * Read status of the specified CertificateSigningRequest
     *
     * Allowed query parameters:
     *   pretty
     *
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.30/#read-certificatesigningrequest-v1-certificates-k8s-io
     */
    public function readCertificatesV1Status(string $name, array $query = []): CertificateSigningRequest
    {
        $options['query'] = $query;
        $options['method'] = 'get';
        $options['model'] = CertificateSigningRequest::class;
        $uri = $this->api->buildUri(
            '/apis/certificates.k8s.io/v1/certificatesigningrequests/{name}/status',
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
     * Partially update status of the specified CertificateSigningRequest
     *
     * Allowed query parameters:
     *   dryRun
     *   fieldManager
     *   fieldValidation
     *   force
     *   pretty
     *
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.30/#patch-certificatesigningrequest-v1-certificates-k8s-io
     */
    public function patchCertificatesV1Status(
        string $name,
        PatchInterface $patch,
        array $query = [],
    ): CertificateSigningRequest {
        $options['query'] = $query;
        $options['method'] = 'patch';
        $options['body'] = $patch;
        $options['model'] = CertificateSigningRequest::class;
        $uri = $this->api->buildUri(
            '/apis/certificates.k8s.io/v1/certificatesigningrequests/{name}/status',
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
     * Replace status of the specified CertificateSigningRequest
     *
     * Allowed query parameters:
     *   dryRun
     *   fieldManager
     *   fieldValidation
     *   pretty
     *
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.30/#put-certificatesigningrequest-v1-certificates-k8s-io
     */
    public function replaceCertificatesV1Status(
        string $name,
        CertificateSigningRequest $certificateSigningRequest,
        array $query = [],
    ): CertificateSigningRequest {
        $options['query'] = $query;
        $options['method'] = 'put';
        $options['body'] = $certificateSigningRequest;
        $options['model'] = CertificateSigningRequest::class;
        $uri = $this->api->buildUri(
            '/apis/certificates.k8s.io/v1/certificatesigningrequests/{name}/status',
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
     * Watch individual changes to a list of CertificateSigningRequest. deprecated: use the 'watch'
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
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.30/#watchlist-certificatesigningrequest-v1-certificates-k8s-io
     */
    public function watchCertificatesV1List(array $query = [], callable|object|null $handler = null): void
    {
        $options['query'] = $query;
        $options['method'] = 'get';
        $options['handler'] = $handler;
        $options['model'] = WatchEvent::class;
        $uri = $this->api->buildUri(
            '/apis/certificates.k8s.io/v1/watch/certificatesigningrequests',
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
     * Watch changes to an object of kind CertificateSigningRequest. deprecated: use the 'watch' parameter
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
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.30/#watch-certificatesigningrequest-v1-certificates-k8s-io
     */
    public function watchCertificatesV1(string $name, array $query = [], callable|object|null $handler = null): void
    {
        $options['query'] = $query;
        $options['method'] = 'get';
        $options['handler'] = $handler;
        $options['model'] = WatchEvent::class;
        $uri = $this->api->buildUri(
            '/apis/certificates.k8s.io/v1/watch/certificatesigningrequests/{name}',
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
