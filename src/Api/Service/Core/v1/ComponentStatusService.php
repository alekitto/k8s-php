<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Service\Core\v1;

use Kcs\K8s\Api\Model\Api\Core\v1\ComponentStatus;
use Kcs\K8s\Api\Model\Api\Core\v1\ComponentStatusList;
use Kcs\K8s\Contract\ApiInterface;

/**
 * ComponentStatus (and ComponentStatusList) holds the cluster validation info. Deprecated: This API is
 * deprecated in v1.19+
 */
class ComponentStatusService
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
     * List objects of kind ComponentStatus
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
     * @deprecated This API is deprecated in v1.19+
     *
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.31/#list-componentstatus-v1-core
     */
    public function list(array $query = [], callable|object|null $handler = null): ComponentStatusList|null
    {
        $options['query'] = $query;
        $options['method'] = 'get';
        $options['handler'] = $handler;
        $options['model'] = ComponentStatusList::class;
        $uri = $this->api->buildUri(
            '/api/v1/componentstatuses',
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
     * Read the specified ComponentStatus
     *
     * Allowed query parameters:
     *   pretty
     *
     * @deprecated This API is deprecated in v1.19+
     *
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.31/#read-componentstatus-v1-core
     */
    public function read(string $name, array $query = []): ComponentStatus
    {
        $options['query'] = $query;
        $options['method'] = 'get';
        $options['model'] = ComponentStatus::class;
        $uri = $this->api->buildUri(
            '/api/v1/componentstatuses/{name}',
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
}
