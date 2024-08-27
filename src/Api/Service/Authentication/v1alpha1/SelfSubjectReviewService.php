<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Service\Authentication\v1alpha1;

use Kcs\K8s\Api\Model\Api\Authentication\v1alpha1\SelfSubjectReview;
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
     *
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.31/#create-selfsubjectreview-v1alpha1-authentication-k8s-io
     */
    public function createAuthenticationV1alpha1(
        SelfSubjectReview $selfSubjectReview,
        array $query = [],
    ): SelfSubjectReview {
        $options['query'] = $query;
        $options['method'] = 'post';
        $options['body'] = $selfSubjectReview;
        $options['model'] = SelfSubjectReview::class;
        $uri = $this->api->buildUri(
            '/apis/authentication.k8s.io/v1alpha1/selfsubjectreviews',
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
