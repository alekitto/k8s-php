<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Service\Authentication\v1;

use Kcs\K8s\Api\Model\Api\Authentication\v1\TokenRequest;
use Kcs\K8s\Contract\ApiInterface;

class TokenRequestService
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
     * Create token of a ServiceAccount
     *
     * Allowed query parameters:
     *   dryRun
     *   fieldManager
     *   fieldValidation
     *   pretty
     *
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.30/#create-tokenrequest-v1-authentication-k8s-io
     */
    public function createCoreV1NamespacedServiceAccountToken(
        string $name,
        TokenRequest $tokenRequest,
        array $query = [],
    ): TokenRequest {
        $options['query'] = $query;
        $options['method'] = 'post';
        $options['body'] = $tokenRequest;
        $options['model'] = TokenRequest::class;
        $uri = $this->api->makeUri(
            '/api/v1/namespaces/{namespace}/serviceaccounts/{name}/token',
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
