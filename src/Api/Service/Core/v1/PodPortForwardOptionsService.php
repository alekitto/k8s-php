<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Service\Core\v1;

use Kcs\K8s\Contract\ApiInterface;

class PodPortForwardOptionsService
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
     * Connect GET requests to portforward of Pod
     *
     * Allowed query parameters:
     *   ports
     *
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.30/#connect-podportforwardoptions-v1-core
     */
    public function connectGetNamespacedPodPortforward(string $name, callable|object $handler, array $query = []): void
    {
        $options['query'] = $query;
        $options['method'] = 'get';
        $options['handler'] = $handler;
        $uri = $this->api->makeUri(
            '/api/v1/namespaces/{namespace}/pods/{name}/portforward',
            ['{name}' => $name],
            $query,
            $this->namespace,
        );

        $this->api->executeWebsocket(
            $uri,
            'portforward',
            $handler,
        );
    }

    /**
     * Connect POST requests to portforward of Pod
     *
     * Allowed query parameters:
     *   ports
     *
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.30/#connect-podportforwardoptions-v1-core
     */
    public function connectPostNamespacedPodPortforward(string $name, callable|object $handler, array $query = []): void
    {
        $options['query'] = $query;
        $options['method'] = 'post';
        $options['handler'] = $handler;
        $uri = $this->api->makeUri(
            '/api/v1/namespaces/{namespace}/pods/{name}/portforward',
            ['{name}' => $name],
            $query,
            $this->namespace,
        );

        $this->api->executeWebsocket(
            $uri,
            'portforward',
            $handler,
        );
    }
}
