<?php

declare(strict_types=1);

namespace Kcs\K8s\Contract;

use Kcs\K8s\Exception\HttpException;
use Kcs\K8s\Exception\WebsocketException;

interface ApiInterface
{
    /**
     * Execute an HTTP based request against the API.
     *
     * @throws HttpException
     */
    public function executeHttp(string $uri, string $action, array $options): mixed;

    /**
     * Execute a websocket based request against the API.
     *
     * @throws WebsocketException
     */
    public function executeWebsocket(string $uri, string $type, callable|object $handler): void;

    /**
     * Given a URI path from kubernetes, the parameters, and the query options, form the complete path.
     */
    public function makeUri(string $uri, array $parameters, array $query = [], string|null $namespace = null): string;
}
