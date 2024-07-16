<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Service\Core\v1;

use Kcs\K8s\Contract\ApiInterface;

class PodExecOptionsService
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
     * Connect GET requests to exec of Pod
     *
     * Allowed query parameters:
     *   command
     *   container
     *   stderr
     *   stdin
     *   stdout
     *   tty
     *
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.30/#connect-podexecoptions-v1-core
     */
    public function connectGetNamespacedPodExec(string $name, callable|object $handler, array $query = []): void
    {
        $options['query'] = $query;
        $options['method'] = 'get';
        $options['handler'] = $handler;
        $uri = $this->api->buildUri(
            '/api/v1/namespaces/{namespace}/pods/{name}/exec',
            ['{name}' => $name],
            $query,
            $this->namespace,
        );

        $this->api->executeWebsocket(
            $uri,
            'exec',
            $handler,
        );
    }

    /**
     * Connect POST requests to exec of Pod
     *
     * Allowed query parameters:
     *   command
     *   container
     *   stderr
     *   stdin
     *   stdout
     *   tty
     *
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.30/#connect-podexecoptions-v1-core
     */
    public function connectPostNamespacedPodExec(string $name, callable|object $handler, array $query = []): void
    {
        $options['query'] = $query;
        $options['method'] = 'post';
        $options['handler'] = $handler;
        $uri = $this->api->buildUri(
            '/api/v1/namespaces/{namespace}/pods/{name}/exec',
            ['{name}' => $name],
            $query,
            $this->namespace,
        );

        $this->api->executeWebsocket(
            $uri,
            'exec',
            $handler,
        );
    }
}
