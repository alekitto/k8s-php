<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Service\Authorization\v1;

use Kcs\K8s\Api\Model\Api\Authorization\v1\SelfSubjectRulesReview;
use Kcs\K8s\Contract\ApiInterface;

class SelfSubjectRulesReviewService
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
     * Create a SelfSubjectRulesReview
     *
     * Allowed query parameters:
     *   dryRun
     *   fieldManager
     *   fieldValidation
     *   pretty
     *
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.30/#create-selfsubjectrulesreview-v1-authorization-k8s-io
     */
    public function createAuthorizationV1(
        SelfSubjectRulesReview $selfSubjectRulesReview,
        array $query = [],
    ): SelfSubjectRulesReview {
        $options['query'] = $query;
        $options['method'] = 'post';
        $options['body'] = $selfSubjectRulesReview;
        $options['model'] = SelfSubjectRulesReview::class;
        $uri = $this->api->buildUri(
            '/apis/authorization.k8s.io/v1/selfsubjectrulesreviews',
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
