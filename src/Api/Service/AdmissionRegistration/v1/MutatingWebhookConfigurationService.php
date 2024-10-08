<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Service\AdmissionRegistration\v1;

use Kcs\K8s\Api\Model\Api\AdmissionRegistration\v1\MutatingWebhookConfiguration;
use Kcs\K8s\Api\Model\Api\AdmissionRegistration\v1\MutatingWebhookConfigurationList;
use Kcs\K8s\Api\Model\ApiMachinery\Apis\Meta\v1\Status;
use Kcs\K8s\Api\Model\ApiMachinery\Apis\Meta\v1\WatchEvent;
use Kcs\K8s\Contract\ApiInterface;
use Kcs\K8s\PatchInterface;

class MutatingWebhookConfigurationService
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
     * List or watch objects of kind MutatingWebhookConfiguration
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
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.31/#list-mutatingwebhookconfiguration-v1-admissionregistration-k8s-io
     */
    public function listAdmissionRegistrationV1(array $query = [], callable|object|null $handler = null): MutatingWebhookConfigurationList|null
    {
        $options['query'] = $query;
        $options['method'] = 'get';
        $options['handler'] = $handler;
        $options['model'] = MutatingWebhookConfigurationList::class;
        $uri = $this->api->buildUri(
            '/apis/admissionregistration.k8s.io/v1/mutatingwebhookconfigurations',
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
     * Delete collection of MutatingWebhookConfiguration
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
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.31/#delete-collection-mutatingwebhookconfiguration-v1-admissionregistration-k8s-io
     */
    public function deleteAdmissionRegistrationV1Collection(array $query = []): Status
    {
        $options['query'] = $query;
        $options['method'] = 'delete';
        $options['model'] = Status::class;
        $uri = $this->api->buildUri(
            '/apis/admissionregistration.k8s.io/v1/mutatingwebhookconfigurations',
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
     * Create a MutatingWebhookConfiguration
     *
     * Allowed query parameters:
     *   dryRun
     *   fieldManager
     *   fieldValidation
     *   pretty
     *
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.31/#create-mutatingwebhookconfiguration-v1-admissionregistration-k8s-io
     */
    public function createAdmissionRegistrationV1(
        MutatingWebhookConfiguration $mutatingWebhookConfiguration,
        array $query = [],
    ): MutatingWebhookConfiguration {
        $options['query'] = $query;
        $options['method'] = 'post';
        $options['body'] = $mutatingWebhookConfiguration;
        $options['model'] = MutatingWebhookConfiguration::class;
        $uri = $this->api->buildUri(
            '/apis/admissionregistration.k8s.io/v1/mutatingwebhookconfigurations',
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
     * Read the specified MutatingWebhookConfiguration
     *
     * Allowed query parameters:
     *   pretty
     *
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.31/#read-mutatingwebhookconfiguration-v1-admissionregistration-k8s-io
     */
    public function readAdmissionRegistrationV1(string $name, array $query = []): MutatingWebhookConfiguration
    {
        $options['query'] = $query;
        $options['method'] = 'get';
        $options['model'] = MutatingWebhookConfiguration::class;
        $uri = $this->api->buildUri(
            '/apis/admissionregistration.k8s.io/v1/mutatingwebhookconfigurations/{name}',
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
     * Delete a MutatingWebhookConfiguration
     *
     * Allowed query parameters:
     *   dryRun
     *   gracePeriodSeconds
     *   orphanDependents
     *   propagationPolicy
     *   pretty
     *
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.31/#delete-mutatingwebhookconfiguration-v1-admissionregistration-k8s-io
     */
    public function deleteAdmissionRegistrationV1(string $name, array $query = [])
    {
        $options['query'] = $query;
        $options['method'] = 'delete';
        $uri = $this->api->buildUri(
            '/apis/admissionregistration.k8s.io/v1/mutatingwebhookconfigurations/{name}',
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
     * Partially update the specified MutatingWebhookConfiguration
     *
     * Allowed query parameters:
     *   dryRun
     *   fieldManager
     *   fieldValidation
     *   force
     *   pretty
     *
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.31/#patch-mutatingwebhookconfiguration-v1-admissionregistration-k8s-io
     */
    public function patchAdmissionRegistrationV1(
        string $name,
        PatchInterface $patch,
        array $query = [],
    ): MutatingWebhookConfiguration {
        $options['query'] = $query;
        $options['method'] = 'patch';
        $options['body'] = $patch;
        $options['model'] = MutatingWebhookConfiguration::class;
        $uri = $this->api->buildUri(
            '/apis/admissionregistration.k8s.io/v1/mutatingwebhookconfigurations/{name}',
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
     * Replace the specified MutatingWebhookConfiguration
     *
     * Allowed query parameters:
     *   dryRun
     *   fieldManager
     *   fieldValidation
     *   pretty
     *
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.31/#put-mutatingwebhookconfiguration-v1-admissionregistration-k8s-io
     */
    public function replaceAdmissionRegistrationV1(
        string $name,
        MutatingWebhookConfiguration $mutatingWebhookConfiguration,
        array $query = [],
    ): MutatingWebhookConfiguration {
        $options['query'] = $query;
        $options['method'] = 'put';
        $options['body'] = $mutatingWebhookConfiguration;
        $options['model'] = MutatingWebhookConfiguration::class;
        $uri = $this->api->buildUri(
            '/apis/admissionregistration.k8s.io/v1/mutatingwebhookconfigurations/{name}',
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
     * Watch individual changes to a list of MutatingWebhookConfiguration. deprecated: use the 'watch'
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
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.31/#watchlist-mutatingwebhookconfiguration-v1-admissionregistration-k8s-io
     */
    public function watchAdmissionRegistrationV1List(array $query = [], callable|object|null $handler = null): void
    {
        $options['query'] = $query;
        $options['method'] = 'get';
        $options['handler'] = $handler;
        $options['model'] = WatchEvent::class;
        $uri = $this->api->buildUri(
            '/apis/admissionregistration.k8s.io/v1/watch/mutatingwebhookconfigurations',
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
     * Watch changes to an object of kind MutatingWebhookConfiguration. deprecated: use the 'watch'
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
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.31/#watch-mutatingwebhookconfiguration-v1-admissionregistration-k8s-io
     */
    public function watchAdmissionRegistrationV1(string $name, array $query = [], callable|object|null $handler = null): void
    {
        $options['query'] = $query;
        $options['method'] = 'get';
        $options['handler'] = $handler;
        $options['model'] = WatchEvent::class;
        $uri = $this->api->buildUri(
            '/apis/admissionregistration.k8s.io/v1/watch/mutatingwebhookconfigurations/{name}',
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
