<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Service\Core\v1;

use Kcs\K8s\Contract\ApiInterface;

class ServiceProxyOptionsService
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
     * Connect GET requests to proxy of Service
     *
     * Allowed query parameters:
     *   path
     */
    public function connectGetNamespacedServiceProxy(string $name, array $query = []): string
    {
        $options['query'] = $query;
        $options['method'] = 'get';
        $uri = $this->api->makeUri(
            '/api/v1/namespaces/{namespace}/services/{name}/proxy',
            ['{name}' => $name],
            $query,
            $this->namespace,
        );

        return $this->api->executeHttp(
            $uri,
            'connect',
            $options,
        );
    }

    /**
     * Connect DELETE requests to proxy of Service
     *
     * Allowed query parameters:
     *   path
     */
    public function connectDeleteNamespacedServiceProxy(string $name, array $query = []): string
    {
        $options['query'] = $query;
        $options['method'] = 'delete';
        $uri = $this->api->makeUri(
            '/api/v1/namespaces/{namespace}/services/{name}/proxy',
            ['{name}' => $name],
            $query,
            $this->namespace,
        );

        return $this->api->executeHttp(
            $uri,
            'connect',
            $options,
        );
    }

    /**
     * Connect POST requests to proxy of Service
     *
     * Allowed query parameters:
     *   path
     */
    public function connectPostNamespacedServiceProxy(string $name, array $query = []): string
    {
        $options['query'] = $query;
        $options['method'] = 'post';
        $uri = $this->api->makeUri(
            '/api/v1/namespaces/{namespace}/services/{name}/proxy',
            ['{name}' => $name],
            $query,
            $this->namespace,
        );

        return $this->api->executeHttp(
            $uri,
            'connect',
            $options,
        );
    }

    /**
     * Connect PATCH requests to proxy of Service
     *
     * Allowed query parameters:
     *   path
     */
    public function connectPatchNamespacedServiceProxy(string $name, array $query = []): string
    {
        $options['query'] = $query;
        $options['method'] = 'patch';
        $uri = $this->api->makeUri(
            '/api/v1/namespaces/{namespace}/services/{name}/proxy',
            ['{name}' => $name],
            $query,
            $this->namespace,
        );

        return $this->api->executeHttp(
            $uri,
            'connect',
            $options,
        );
    }

    /**
     * Connect PUT requests to proxy of Service
     *
     * Allowed query parameters:
     *   path
     */
    public function connectPutNamespacedServiceProxy(string $name, array $query = []): string
    {
        $options['query'] = $query;
        $options['method'] = 'put';
        $uri = $this->api->makeUri(
            '/api/v1/namespaces/{namespace}/services/{name}/proxy',
            ['{name}' => $name],
            $query,
            $this->namespace,
        );

        return $this->api->executeHttp(
            $uri,
            'connect',
            $options,
        );
    }

    /**
     * Connect OPTIONS requests to proxy of Service
     *
     * Allowed query parameters:
     *   path
     */
    public function connectOptionsNamespacedServiceProxy(string $name, array $query = []): string
    {
        $options['query'] = $query;
        $options['method'] = 'options';
        $uri = $this->api->makeUri(
            '/api/v1/namespaces/{namespace}/services/{name}/proxy',
            ['{name}' => $name],
            $query,
            $this->namespace,
        );

        return $this->api->executeHttp(
            $uri,
            'connect',
            $options,
        );
    }

    /**
     * Connect HEAD requests to proxy of Service
     *
     * Allowed query parameters:
     *   path
     */
    public function connectHeadNamespacedServiceProxy(string $name, array $query = []): string
    {
        $options['query'] = $query;
        $options['method'] = 'head';
        $uri = $this->api->makeUri(
            '/api/v1/namespaces/{namespace}/services/{name}/proxy',
            ['{name}' => $name],
            $query,
            $this->namespace,
        );

        return $this->api->executeHttp(
            $uri,
            'connect',
            $options,
        );
    }

    /**
     * Connect GET requests to proxy of Service
     *
     * Allowed query parameters:
     *   path
     */
    public function connectGetNamespacedServiceProxyWithPath(string $name, array $query = []): string
    {
        $options['query'] = $query;
        $options['method'] = 'get';
        $uri = $this->api->makeUri(
            '/api/v1/namespaces/{namespace}/services/{name}/proxy/{path}',
            ['{name}' => $name],
            $query,
            $this->namespace,
        );

        return $this->api->executeHttp(
            $uri,
            'connect',
            $options,
        );
    }

    /**
     * Connect DELETE requests to proxy of Service
     *
     * Allowed query parameters:
     *   path
     */
    public function connectDeleteNamespacedServiceProxyWithPath(string $name, array $query = []): string
    {
        $options['query'] = $query;
        $options['method'] = 'delete';
        $uri = $this->api->makeUri(
            '/api/v1/namespaces/{namespace}/services/{name}/proxy/{path}',
            ['{name}' => $name],
            $query,
            $this->namespace,
        );

        return $this->api->executeHttp(
            $uri,
            'connect',
            $options,
        );
    }

    /**
     * Connect POST requests to proxy of Service
     *
     * Allowed query parameters:
     *   path
     */
    public function connectPostNamespacedServiceProxyWithPath(string $name, array $query = []): string
    {
        $options['query'] = $query;
        $options['method'] = 'post';
        $uri = $this->api->makeUri(
            '/api/v1/namespaces/{namespace}/services/{name}/proxy/{path}',
            ['{name}' => $name],
            $query,
            $this->namespace,
        );

        return $this->api->executeHttp(
            $uri,
            'connect',
            $options,
        );
    }

    /**
     * Connect PATCH requests to proxy of Service
     *
     * Allowed query parameters:
     *   path
     */
    public function connectPatchNamespacedServiceProxyWithPath(string $name, array $query = []): string
    {
        $options['query'] = $query;
        $options['method'] = 'patch';
        $uri = $this->api->makeUri(
            '/api/v1/namespaces/{namespace}/services/{name}/proxy/{path}',
            ['{name}' => $name],
            $query,
            $this->namespace,
        );

        return $this->api->executeHttp(
            $uri,
            'connect',
            $options,
        );
    }

    /**
     * Connect PUT requests to proxy of Service
     *
     * Allowed query parameters:
     *   path
     */
    public function connectPutNamespacedServiceProxyWithPath(string $name, array $query = []): string
    {
        $options['query'] = $query;
        $options['method'] = 'put';
        $uri = $this->api->makeUri(
            '/api/v1/namespaces/{namespace}/services/{name}/proxy/{path}',
            ['{name}' => $name],
            $query,
            $this->namespace,
        );

        return $this->api->executeHttp(
            $uri,
            'connect',
            $options,
        );
    }

    /**
     * Connect OPTIONS requests to proxy of Service
     *
     * Allowed query parameters:
     *   path
     */
    public function connectOptionsNamespacedServiceProxyWithPath(string $name, array $query = []): string
    {
        $options['query'] = $query;
        $options['method'] = 'options';
        $uri = $this->api->makeUri(
            '/api/v1/namespaces/{namespace}/services/{name}/proxy/{path}',
            ['{name}' => $name],
            $query,
            $this->namespace,
        );

        return $this->api->executeHttp(
            $uri,
            'connect',
            $options,
        );
    }

    /**
     * Connect HEAD requests to proxy of Service
     *
     * Allowed query parameters:
     *   path
     */
    public function connectHeadNamespacedServiceProxyWithPath(string $name, array $query = []): string
    {
        $options['query'] = $query;
        $options['method'] = 'head';
        $uri = $this->api->makeUri(
            '/api/v1/namespaces/{namespace}/services/{name}/proxy/{path}',
            ['{name}' => $name],
            $query,
            $this->namespace,
        );

        return $this->api->executeHttp(
            $uri,
            'connect',
            $options,
        );
    }
}