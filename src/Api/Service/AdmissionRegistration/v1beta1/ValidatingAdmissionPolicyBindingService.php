<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Service\AdmissionRegistration\v1beta1;

use Kcs\K8s\Api\Model\Api\AdmissionRegistration\v1beta1\ValidatingAdmissionPolicyBinding;
use Kcs\K8s\Api\Model\Api\AdmissionRegistration\v1beta1\ValidatingAdmissionPolicyBindingList;
use Kcs\K8s\Api\Model\ApiMachinery\Apis\Meta\v1\Status;
use Kcs\K8s\Api\Model\ApiMachinery\Apis\Meta\v1\WatchEvent;
use Kcs\K8s\Contract\ApiInterface;
use Kcs\K8s\PatchInterface;

class ValidatingAdmissionPolicyBindingService
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
     * List or watch objects of kind ValidatingAdmissionPolicyBinding
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
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.30/#list-validatingadmissionpolicybinding-v1beta1-admissionregistration-k8s-io
     */
    public function listAdmissionRegistrationV1beta1(
        array $query = [],
        callable|object|null $handler = null,
    ): ValidatingAdmissionPolicyBindingList|null {
        $options['query'] = $query;
        $options['method'] = 'get';
        $options['handler'] = $handler;
        $options['model'] = ValidatingAdmissionPolicyBindingList::class;
        $uri = $this->api->buildUri(
            '/apis/admissionregistration.k8s.io/v1beta1/validatingadmissionpolicybindings',
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
     * Delete collection of ValidatingAdmissionPolicyBinding
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
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.30/#delete-collection-validatingadmissionpolicybinding-v1beta1-admissionregistration-k8s-io
     */
    public function deleteAdmissionRegistrationV1beta1Collection(array $query = []): Status
    {
        $options['query'] = $query;
        $options['method'] = 'delete';
        $options['model'] = Status::class;
        $uri = $this->api->buildUri(
            '/apis/admissionregistration.k8s.io/v1beta1/validatingadmissionpolicybindings',
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
     * Create a ValidatingAdmissionPolicyBinding
     *
     * Allowed query parameters:
     *   dryRun
     *   fieldManager
     *   fieldValidation
     *   pretty
     *
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.30/#create-validatingadmissionpolicybinding-v1beta1-admissionregistration-k8s-io
     */
    public function createAdmissionRegistrationV1beta1(
        ValidatingAdmissionPolicyBinding $validatingAdmissionPolicyBinding,
        array $query = [],
    ): ValidatingAdmissionPolicyBinding {
        $options['query'] = $query;
        $options['method'] = 'post';
        $options['body'] = $validatingAdmissionPolicyBinding;
        $options['model'] = ValidatingAdmissionPolicyBinding::class;
        $uri = $this->api->buildUri(
            '/apis/admissionregistration.k8s.io/v1beta1/validatingadmissionpolicybindings',
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
     * Read the specified ValidatingAdmissionPolicyBinding
     *
     * Allowed query parameters:
     *   pretty
     *
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.30/#read-validatingadmissionpolicybinding-v1beta1-admissionregistration-k8s-io
     */
    public function readAdmissionRegistrationV1beta1(
        string $name,
        array $query = [],
    ): ValidatingAdmissionPolicyBinding {
        $options['query'] = $query;
        $options['method'] = 'get';
        $options['model'] = ValidatingAdmissionPolicyBinding::class;
        $uri = $this->api->buildUri(
            '/apis/admissionregistration.k8s.io/v1beta1/validatingadmissionpolicybindings/{name}',
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
     * Delete a ValidatingAdmissionPolicyBinding
     *
     * Allowed query parameters:
     *   dryRun
     *   gracePeriodSeconds
     *   orphanDependents
     *   propagationPolicy
     *   pretty
     *
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.30/#delete-validatingadmissionpolicybinding-v1beta1-admissionregistration-k8s-io
     */
    public function deleteAdmissionRegistrationV1beta1(string $name, array $query = []): Status
    {
        $options['query'] = $query;
        $options['method'] = 'delete';
        $options['model'] = Status::class;
        $uri = $this->api->buildUri(
            '/apis/admissionregistration.k8s.io/v1beta1/validatingadmissionpolicybindings/{name}',
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
     * Partially update the specified ValidatingAdmissionPolicyBinding
     *
     * Allowed query parameters:
     *   dryRun
     *   fieldManager
     *   fieldValidation
     *   force
     *   pretty
     *
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.30/#patch-validatingadmissionpolicybinding-v1beta1-admissionregistration-k8s-io
     */
    public function patchAdmissionRegistrationV1beta1(
        string $name,
        PatchInterface $patch,
        array $query = [],
    ): ValidatingAdmissionPolicyBinding {
        $options['query'] = $query;
        $options['method'] = 'patch';
        $options['body'] = $patch;
        $options['model'] = ValidatingAdmissionPolicyBinding::class;
        $uri = $this->api->buildUri(
            '/apis/admissionregistration.k8s.io/v1beta1/validatingadmissionpolicybindings/{name}',
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
     * Replace the specified ValidatingAdmissionPolicyBinding
     *
     * Allowed query parameters:
     *   dryRun
     *   fieldManager
     *   fieldValidation
     *   pretty
     *
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.30/#put-validatingadmissionpolicybinding-v1beta1-admissionregistration-k8s-io
     */
    public function replaceAdmissionRegistrationV1beta1(
        string $name,
        ValidatingAdmissionPolicyBinding $validatingAdmissionPolicyBinding,
        array $query = [],
    ): ValidatingAdmissionPolicyBinding {
        $options['query'] = $query;
        $options['method'] = 'put';
        $options['body'] = $validatingAdmissionPolicyBinding;
        $options['model'] = ValidatingAdmissionPolicyBinding::class;
        $uri = $this->api->buildUri(
            '/apis/admissionregistration.k8s.io/v1beta1/validatingadmissionpolicybindings/{name}',
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
     * Watch individual changes to a list of ValidatingAdmissionPolicyBinding. deprecated: use the 'watch'
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
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.30/#watchlist-validatingadmissionpolicybinding-v1beta1-admissionregistration-k8s-io
     */
    public function watchAdmissionRegistrationV1beta1List(array $query = [], callable|object|null $handler = null): void
    {
        $options['query'] = $query;
        $options['method'] = 'get';
        $options['handler'] = $handler;
        $options['model'] = WatchEvent::class;
        $uri = $this->api->buildUri(
            '/apis/admissionregistration.k8s.io/v1beta1/watch/validatingadmissionpolicybindings',
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
     * Watch changes to an object of kind ValidatingAdmissionPolicyBinding. deprecated: use the 'watch'
     * parameter with a list operation instead, filtered to a single item with the 'fieldSelector'
     * parameter.
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
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.30/#watch-validatingadmissionpolicybinding-v1beta1-admissionregistration-k8s-io
     */
    public function watchAdmissionRegistrationV1beta1(string $name, array $query = [], callable|object|null $handler = null): void
    {
        $options['query'] = $query;
        $options['method'] = 'get';
        $options['handler'] = $handler;
        $options['model'] = WatchEvent::class;
        $uri = $this->api->buildUri(
            '/apis/admissionregistration.k8s.io/v1beta1/watch/validatingadmissionpolicybindings/{name}',
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
