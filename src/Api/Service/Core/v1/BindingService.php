<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Service\Core\v1;

use Kcs\K8s\Api\Model\Api\Core\v1\Binding;
use Kcs\K8s\Contract\ApiInterface;

class BindingService
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
     * Create a Binding
     *
     * Allowed query parameters:
     *   dryRun
     *   fieldManager
     *   fieldValidation
     *   pretty
     *
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.30/#create-binding-v1-core
     */
    public function createNamespaced(Binding $binding, array $query = []): Binding
    {
        $options['query'] = $query;
        $options['method'] = 'post';
        $options['body'] = $binding;
        $options['model'] = Binding::class;
        $uri = $this->api->buildUri(
            '/api/v1/namespaces/{namespace}/bindings',
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
     * Create binding of a Pod
     *
     * Allowed query parameters:
     *   dryRun
     *   fieldManager
     *   fieldValidation
     *   pretty
     *
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.30/#create-binding-v1-core
     */
    public function createNamespacedPod(string $name, Binding $binding, array $query = []): Binding
    {
        $options['query'] = $query;
        $options['method'] = 'post';
        $options['body'] = $binding;
        $options['model'] = Binding::class;
        $uri = $this->api->buildUri(
            '/api/v1/namespaces/{namespace}/pods/{name}/binding',
            ['{name}' => $name],
            $query,
            $this->namespace,
        );

        return $this->api->executeHttp(
            $uri,
            'post',
            $options,
        );
    }
}
