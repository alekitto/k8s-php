<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Service\Policy\v1;

use Kcs\K8s\Api\Model\Api\Policy\v1\Eviction;
use Kcs\K8s\Contract\ApiInterface;

class EvictionService
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
     * Create eviction of a Pod
     *
     * Allowed query parameters:
     *   dryRun
     *   fieldManager
     *   fieldValidation
     *   pretty
     *
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.30/#create-eviction-v1-policy
     */
    public function createCoreV1NamespacedPod(string $name, Eviction $eviction, array $query = []): Eviction
    {
        $options['query'] = $query;
        $options['method'] = 'post';
        $options['body'] = $eviction;
        $options['model'] = Eviction::class;
        $uri = $this->api->makeUri(
            '/api/v1/namespaces/{namespace}/pods/{name}/eviction',
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
