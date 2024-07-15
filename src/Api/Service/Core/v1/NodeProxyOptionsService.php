<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Service\Core\v1;

use Kcs\K8s\Contract\ApiInterface;

class NodeProxyOptionsService
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
     * Connect GET requests to proxy of Node
     *
     * Allowed query parameters:
     *   path
     */
    public function connectGetNodeProxy(string $name, array $query = []): string
    {
        $options['query'] = $query;
        $options['method'] = 'get';
        $uri = $this->api->makeUri(
            '/api/v1/nodes/{name}/proxy',
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
     * Connect DELETE requests to proxy of Node
     *
     * Allowed query parameters:
     *   path
     */
    public function connectDeleteNodeProxy(string $name, array $query = []): string
    {
        $options['query'] = $query;
        $options['method'] = 'delete';
        $uri = $this->api->makeUri(
            '/api/v1/nodes/{name}/proxy',
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
     * Connect POST requests to proxy of Node
     *
     * Allowed query parameters:
     *   path
     */
    public function connectPostNodeProxy(string $name, array $query = []): string
    {
        $options['query'] = $query;
        $options['method'] = 'post';
        $uri = $this->api->makeUri(
            '/api/v1/nodes/{name}/proxy',
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
     * Connect PATCH requests to proxy of Node
     *
     * Allowed query parameters:
     *   path
     */
    public function connectPatchNodeProxy(string $name, array $query = []): string
    {
        $options['query'] = $query;
        $options['method'] = 'patch';
        $uri = $this->api->makeUri(
            '/api/v1/nodes/{name}/proxy',
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
     * Connect PUT requests to proxy of Node
     *
     * Allowed query parameters:
     *   path
     */
    public function connectPutNodeProxy(string $name, array $query = []): string
    {
        $options['query'] = $query;
        $options['method'] = 'put';
        $uri = $this->api->makeUri(
            '/api/v1/nodes/{name}/proxy',
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
     * Connect OPTIONS requests to proxy of Node
     *
     * Allowed query parameters:
     *   path
     */
    public function connectOptionsNodeProxy(string $name, array $query = []): string
    {
        $options['query'] = $query;
        $options['method'] = 'options';
        $uri = $this->api->makeUri(
            '/api/v1/nodes/{name}/proxy',
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
     * Connect HEAD requests to proxy of Node
     *
     * Allowed query parameters:
     *   path
     */
    public function connectHeadNodeProxy(string $name, array $query = []): string
    {
        $options['query'] = $query;
        $options['method'] = 'head';
        $uri = $this->api->makeUri(
            '/api/v1/nodes/{name}/proxy',
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
     * Connect GET requests to proxy of Node
     *
     * Allowed query parameters:
     *   path
     */
    public function connectGetNodeProxyWithPath(string $name, array $query = []): string
    {
        $options['query'] = $query;
        $options['method'] = 'get';
        $uri = $this->api->makeUri(
            '/api/v1/nodes/{name}/proxy/{path}',
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
     * Connect DELETE requests to proxy of Node
     *
     * Allowed query parameters:
     *   path
     */
    public function connectDeleteNodeProxyWithPath(string $name, array $query = []): string
    {
        $options['query'] = $query;
        $options['method'] = 'delete';
        $uri = $this->api->makeUri(
            '/api/v1/nodes/{name}/proxy/{path}',
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
     * Connect POST requests to proxy of Node
     *
     * Allowed query parameters:
     *   path
     */
    public function connectPostNodeProxyWithPath(string $name, array $query = []): string
    {
        $options['query'] = $query;
        $options['method'] = 'post';
        $uri = $this->api->makeUri(
            '/api/v1/nodes/{name}/proxy/{path}',
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
     * Connect PATCH requests to proxy of Node
     *
     * Allowed query parameters:
     *   path
     */
    public function connectPatchNodeProxyWithPath(string $name, array $query = []): string
    {
        $options['query'] = $query;
        $options['method'] = 'patch';
        $uri = $this->api->makeUri(
            '/api/v1/nodes/{name}/proxy/{path}',
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
     * Connect PUT requests to proxy of Node
     *
     * Allowed query parameters:
     *   path
     */
    public function connectPutNodeProxyWithPath(string $name, array $query = []): string
    {
        $options['query'] = $query;
        $options['method'] = 'put';
        $uri = $this->api->makeUri(
            '/api/v1/nodes/{name}/proxy/{path}',
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
     * Connect OPTIONS requests to proxy of Node
     *
     * Allowed query parameters:
     *   path
     */
    public function connectOptionsNodeProxyWithPath(string $name, array $query = []): string
    {
        $options['query'] = $query;
        $options['method'] = 'options';
        $uri = $this->api->makeUri(
            '/api/v1/nodes/{name}/proxy/{path}',
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
     * Connect HEAD requests to proxy of Node
     *
     * Allowed query parameters:
     *   path
     */
    public function connectHeadNodeProxyWithPath(string $name, array $query = []): string
    {
        $options['query'] = $query;
        $options['method'] = 'head';
        $uri = $this->api->makeUri(
            '/api/v1/nodes/{name}/proxy/{path}',
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
