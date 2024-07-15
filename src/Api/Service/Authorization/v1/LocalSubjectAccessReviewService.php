<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Service\Authorization\v1;

use Kcs\K8s\Api\Model\Api\Authorization\v1\LocalSubjectAccessReview;
use Kcs\K8s\Contract\ApiInterface;

class LocalSubjectAccessReviewService
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
     * Create a LocalSubjectAccessReview
     *
     * Allowed query parameters:
     *   dryRun
     *   fieldManager
     *   fieldValidation
     *   pretty
     */
    public function createAuthorizationV1Namespaced(
        LocalSubjectAccessReview $localSubjectAccessReview,
        array $query = [],
    ): LocalSubjectAccessReview {
        $options['query'] = $query;
        $options['method'] = 'post';
        $options['body'] = $localSubjectAccessReview;
        $options['model'] = LocalSubjectAccessReview::class;
        $uri = $this->api->makeUri(
            '/apis/authorization.k8s.io/v1/namespaces/{namespace}/localsubjectaccessreviews',
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
