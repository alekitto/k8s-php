<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Service\Authorization\v1;

use Kcs\K8s\Api\Model\Api\Authorization\v1\SubjectAccessReview;
use Kcs\K8s\Contract\ApiInterface;

class SubjectAccessReviewService
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
     * Create a SubjectAccessReview
     *
     * Allowed query parameters:
     *   dryRun
     *   fieldManager
     *   fieldValidation
     *   pretty
     *
     * @link https://kubernetes.io/docs/reference/generated/kubernetes-api/v1.30/#create-subjectaccessreview-v1-authorization-k8s-io
     */
    public function createAuthorizationV1(
        SubjectAccessReview $subjectAccessReview,
        array $query = [],
    ): SubjectAccessReview {
        $options['query'] = $query;
        $options['method'] = 'post';
        $options['body'] = $subjectAccessReview;
        $options['model'] = SubjectAccessReview::class;
        $uri = $this->api->makeUri(
            '/apis/authorization.k8s.io/v1/subjectaccessreviews',
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
