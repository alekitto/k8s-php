<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Service\Authentication\v1;

use Kcs\K8s\Api\Model\Api\Authentication\v1\SelfSubjectReview;
use Kcs\K8s\Contract\ApiInterface;

class SelfSubjectReviewService
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
     * Create a SelfSubjectReview
     *
     * Allowed query parameters:
     *   dryRun
     *   fieldManager
     *   fieldValidation
     *   pretty
     */
    public function createAuthenticationV1(SelfSubjectReview $selfSubjectReview, array $query = []): SelfSubjectReview
    {
        $options['query'] = $query;
        $options['method'] = 'post';
        $options['body'] = $selfSubjectReview;
        $options['model'] = SelfSubjectReview::class;
        $uri = $this->api->makeUri(
            '/apis/authentication.k8s.io/v1/selfsubjectreviews',
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
