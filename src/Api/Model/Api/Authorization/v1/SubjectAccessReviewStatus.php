<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Authorization\v1;

use Kcs\K8s\Attribute as Kubernetes;

/**
 * SubjectAccessReviewStatus
 */
class SubjectAccessReviewStatus
{
    #[Kubernetes\Attribute('allowed', required: true)]
    protected bool $allowed;

    #[Kubernetes\Attribute('denied')]
    protected bool|null $denied = null;

    #[Kubernetes\Attribute('evaluationError')]
    protected string|null $evaluationError = null;

    #[Kubernetes\Attribute('reason')]
    protected string|null $reason = null;

    public function __construct(bool $allowed)
    {
        $this->allowed = $allowed;
    }

    /**
     * Allowed is required. True if the action would be allowed, false otherwise.
     */
    public function isAllowed(): bool
    {
        return $this->allowed;
    }

    /**
     * Allowed is required. True if the action would be allowed, false otherwise.
     *
     * @return static
     */
    public function setIsAllowed(bool $allowed): static
    {
        $this->allowed = $allowed;

        return $this;
    }

    /**
     * Denied is optional. True if the action would be denied, otherwise false. If both allowed is false
     * and denied is false, then the authorizer has no opinion on whether to authorize the action. Denied
     * may not be true if Allowed is true.
     */
    public function isDenied(): bool|null
    {
        return $this->denied;
    }

    /**
     * Denied is optional. True if the action would be denied, otherwise false. If both allowed is false
     * and denied is false, then the authorizer has no opinion on whether to authorize the action. Denied
     * may not be true if Allowed is true.
     *
     * @return static
     */
    public function setIsDenied(bool $denied): static
    {
        $this->denied = $denied;

        return $this;
    }

    /**
     * EvaluationError is an indication that some error occurred during the authorization check. It is
     * entirely possible to get an error and be able to continue determine authorization status in spite of
     * it. For instance, RBAC can be missing a role, but enough roles are still present and bound to reason
     * about the request.
     */
    public function getEvaluationError(): string|null
    {
        return $this->evaluationError;
    }

    /**
     * EvaluationError is an indication that some error occurred during the authorization check. It is
     * entirely possible to get an error and be able to continue determine authorization status in spite of
     * it. For instance, RBAC can be missing a role, but enough roles are still present and bound to reason
     * about the request.
     *
     * @return static
     */
    public function setEvaluationError(string $evaluationError): static
    {
        $this->evaluationError = $evaluationError;

        return $this;
    }

    /**
     * Reason is optional.  It indicates why a request was allowed or denied.
     */
    public function getReason(): string|null
    {
        return $this->reason;
    }

    /**
     * Reason is optional.  It indicates why a request was allowed or denied.
     *
     * @return static
     */
    public function setReason(string $reason): static
    {
        $this->reason = $reason;

        return $this;
    }
}