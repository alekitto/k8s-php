<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Service\AdmissionRegistration\v1;

use Kcs\K8s\Api\Model\Api\AdmissionRegistration\v1\ValidatingAdmissionPolicy;
use Kcs\K8s\Api\Model\Api\AdmissionRegistration\v1\ValidatingAdmissionPolicyList;
use Kcs\K8s\Api\Model\ApiMachinery\Apis\Meta\v1\Status;
use Kcs\K8s\Api\Model\ApiMachinery\Apis\Meta\v1\WatchEvent;
use Kcs\K8s\Contract\ApiInterface;
use Kcs\K8s\PatchInterface;

class ValidatingAdmissionPolicyService
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
     * List or watch objects of kind ValidatingAdmissionPolicy
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
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.30/#list-validatingadmissionpolicy-v1-admissionregistration-k8s-io
     */
    public function listAdmissionRegistrationV1(array $query = [], callable|object|null $handler = null): ValidatingAdmissionPolicyList|null
    {
        $options['query'] = $query;
        $options['method'] = 'get';
        $options['handler'] = $handler;
        $options['model'] = ValidatingAdmissionPolicyList::class;
        $uri = $this->api->buildUri(
            '/apis/admissionregistration.k8s.io/v1/validatingadmissionpolicies',
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
     * Delete collection of ValidatingAdmissionPolicy
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
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.30/#delete-collection-validatingadmissionpolicy-v1-admissionregistration-k8s-io
     */
    public function deleteAdmissionRegistrationV1Collection(array $query = []): Status
    {
        $options['query'] = $query;
        $options['method'] = 'delete';
        $options['model'] = Status::class;
        $uri = $this->api->buildUri(
            '/apis/admissionregistration.k8s.io/v1/validatingadmissionpolicies',
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
     * Create a ValidatingAdmissionPolicy
     *
     * Allowed query parameters:
     *   dryRun
     *   fieldManager
     *   fieldValidation
     *   pretty
     *
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.30/#create-validatingadmissionpolicy-v1-admissionregistration-k8s-io
     */
    public function createAdmissionRegistrationV1(
        ValidatingAdmissionPolicy $validatingAdmissionPolicy,
        array $query = [],
    ): ValidatingAdmissionPolicy {
        $options['query'] = $query;
        $options['method'] = 'post';
        $options['body'] = $validatingAdmissionPolicy;
        $options['model'] = ValidatingAdmissionPolicy::class;
        $uri = $this->api->buildUri(
            '/apis/admissionregistration.k8s.io/v1/validatingadmissionpolicies',
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
     * Read the specified ValidatingAdmissionPolicy
     *
     * Allowed query parameters:
     *   pretty
     *
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.30/#read-validatingadmissionpolicy-v1-admissionregistration-k8s-io
     */
    public function readAdmissionRegistrationV1(string $name, array $query = []): ValidatingAdmissionPolicy
    {
        $options['query'] = $query;
        $options['method'] = 'get';
        $options['model'] = ValidatingAdmissionPolicy::class;
        $uri = $this->api->buildUri(
            '/apis/admissionregistration.k8s.io/v1/validatingadmissionpolicies/{name}',
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
     * Delete a ValidatingAdmissionPolicy
     *
     * Allowed query parameters:
     *   dryRun
     *   gracePeriodSeconds
     *   orphanDependents
     *   propagationPolicy
     *   pretty
     *
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.30/#delete-validatingadmissionpolicy-v1-admissionregistration-k8s-io
     */
    public function deleteAdmissionRegistrationV1(string $name, array $query = []): Status
    {
        $options['query'] = $query;
        $options['method'] = 'delete';
        $options['model'] = Status::class;
        $uri = $this->api->buildUri(
            '/apis/admissionregistration.k8s.io/v1/validatingadmissionpolicies/{name}',
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
     * Partially update the specified ValidatingAdmissionPolicy
     *
     * Allowed query parameters:
     *   dryRun
     *   fieldManager
     *   fieldValidation
     *   force
     *   pretty
     *
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.30/#patch-validatingadmissionpolicy-v1-admissionregistration-k8s-io
     */
    public function patchAdmissionRegistrationV1(
        string $name,
        PatchInterface $patch,
        array $query = [],
    ): ValidatingAdmissionPolicy {
        $options['query'] = $query;
        $options['method'] = 'patch';
        $options['body'] = $patch;
        $options['model'] = ValidatingAdmissionPolicy::class;
        $uri = $this->api->buildUri(
            '/apis/admissionregistration.k8s.io/v1/validatingadmissionpolicies/{name}',
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
     * Replace the specified ValidatingAdmissionPolicy
     *
     * Allowed query parameters:
     *   dryRun
     *   fieldManager
     *   fieldValidation
     *   pretty
     *
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.30/#put-validatingadmissionpolicy-v1-admissionregistration-k8s-io
     */
    public function replaceAdmissionRegistrationV1(
        string $name,
        ValidatingAdmissionPolicy $validatingAdmissionPolicy,
        array $query = [],
    ): ValidatingAdmissionPolicy {
        $options['query'] = $query;
        $options['method'] = 'put';
        $options['body'] = $validatingAdmissionPolicy;
        $options['model'] = ValidatingAdmissionPolicy::class;
        $uri = $this->api->buildUri(
            '/apis/admissionregistration.k8s.io/v1/validatingadmissionpolicies/{name}',
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
     * Read status of the specified ValidatingAdmissionPolicy
     *
     * Allowed query parameters:
     *   pretty
     *
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.30/#read-validatingadmissionpolicy-v1-admissionregistration-k8s-io
     */
    public function readAdmissionRegistrationV1Status(string $name, array $query = []): ValidatingAdmissionPolicy
    {
        $options['query'] = $query;
        $options['method'] = 'get';
        $options['model'] = ValidatingAdmissionPolicy::class;
        $uri = $this->api->buildUri(
            '/apis/admissionregistration.k8s.io/v1/validatingadmissionpolicies/{name}/status',
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
     * Partially update status of the specified ValidatingAdmissionPolicy
     *
     * Allowed query parameters:
     *   dryRun
     *   fieldManager
     *   fieldValidation
     *   force
     *   pretty
     *
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.30/#patch-validatingadmissionpolicy-v1-admissionregistration-k8s-io
     */
    public function patchAdmissionRegistrationV1Status(
        string $name,
        PatchInterface $patch,
        array $query = [],
    ): ValidatingAdmissionPolicy {
        $options['query'] = $query;
        $options['method'] = 'patch';
        $options['body'] = $patch;
        $options['model'] = ValidatingAdmissionPolicy::class;
        $uri = $this->api->buildUri(
            '/apis/admissionregistration.k8s.io/v1/validatingadmissionpolicies/{name}/status',
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
     * Replace status of the specified ValidatingAdmissionPolicy
     *
     * Allowed query parameters:
     *   dryRun
     *   fieldManager
     *   fieldValidation
     *   pretty
     *
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.30/#put-validatingadmissionpolicy-v1-admissionregistration-k8s-io
     */
    public function replaceAdmissionRegistrationV1Status(
        string $name,
        ValidatingAdmissionPolicy $validatingAdmissionPolicy,
        array $query = [],
    ): ValidatingAdmissionPolicy {
        $options['query'] = $query;
        $options['method'] = 'put';
        $options['body'] = $validatingAdmissionPolicy;
        $options['model'] = ValidatingAdmissionPolicy::class;
        $uri = $this->api->buildUri(
            '/apis/admissionregistration.k8s.io/v1/validatingadmissionpolicies/{name}/status',
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
     * Watch individual changes to a list of ValidatingAdmissionPolicy. deprecated: use the 'watch'
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
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.30/#watchlist-validatingadmissionpolicy-v1-admissionregistration-k8s-io
     */
    public function watchAdmissionRegistrationV1List(array $query = [], callable|object|null $handler = null): void
    {
        $options['query'] = $query;
        $options['method'] = 'get';
        $options['handler'] = $handler;
        $options['model'] = WatchEvent::class;
        $uri = $this->api->buildUri(
            '/apis/admissionregistration.k8s.io/v1/watch/validatingadmissionpolicies',
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
     * Watch changes to an object of kind ValidatingAdmissionPolicy. deprecated: use the 'watch' parameter
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
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.30/#watch-validatingadmissionpolicy-v1-admissionregistration-k8s-io
     */
    public function watchAdmissionRegistrationV1(string $name, array $query = [], callable|object|null $handler = null): void
    {
        $options['query'] = $query;
        $options['method'] = 'get';
        $options['handler'] = $handler;
        $options['model'] = WatchEvent::class;
        $uri = $this->api->buildUri(
            '/apis/admissionregistration.k8s.io/v1/watch/validatingadmissionpolicies/{name}',
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
