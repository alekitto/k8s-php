<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Service\Authentication\v1;

use Kcs\K8s\Api\Model\Api\Authentication\v1\TokenReview;
use Kcs\K8s\Contract\ApiInterface;

class TokenReviewService
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
     * Create a TokenReview
     *
     * Allowed query parameters:
     *   dryRun
     *   fieldManager
     *   fieldValidation
     *   pretty
     *
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.31/#create-tokenreview-v1-authentication-k8s-io
     */
    public function createAuthenticationV1(TokenReview $tokenReview, array $query = []): TokenReview
    {
        $options['query'] = $query;
        $options['method'] = 'post';
        $options['body'] = $tokenReview;
        $options['model'] = TokenReview::class;
        $uri = $this->api->buildUri(
            '/apis/authentication.k8s.io/v1/tokenreviews',
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
}
