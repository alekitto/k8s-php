<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\ApiMachinery\Apis\Meta\v1;

use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;

/**
 * Status is a return value for calls that don't return other objects.
 */
#[Kubernetes\Kind('Status', version: 'v1')]
class Status
{
    #[Kubernetes\Attribute('apiVersion')]
    protected string|null $apiVersion = 'v1';

    #[Kubernetes\Attribute('code')]
    protected int|null $code = null;

    #[Kubernetes\Attribute('details', type: AttributeType::Model, model: StatusDetails::class)]
    protected StatusDetails|null $details = null;

    #[Kubernetes\Attribute('kind')]
    protected string|null $kind = 'Status';

    #[Kubernetes\Attribute('message')]
    protected string|null $message = null;

    #[Kubernetes\Attribute('metadata', type: AttributeType::Model, model: ListMeta::class)]
    protected ListMeta|null $metadata = null;

    #[Kubernetes\Attribute('reason')]
    protected string|null $reason = null;

    #[Kubernetes\Attribute('status')]
    protected string|null $status = null;

    public function __construct()
    {
    }

    /**
     * continue may be set if the user set a limit on the number of items returned, and indicates that the
     * server has more data available. The value is opaque and may be used to issue another request to the
     * endpoint that served this list to retrieve the next set of available objects. Continuing a
     * consistent list may not be possible if the server configuration has changed or more than a few
     * minutes have passed. The resourceVersion field returned when using this continue value will be
     * identical to the value in the first response, unless you have received this token from an error
     * message.
     */
    public function getContinue(): string|null
    {
        return $this->metadata->getContinue();
    }

    /**
     * remainingItemCount is the number of subsequent items in the list which are not included in this list
     * response. If the list request contained label or field selectors, then the number of remaining items
     * is unknown and the field will be left unset and omitted during serialization. If the list is
     * complete (either because it is not chunking or because this is the last chunk), then there are no
     * more remaining items and this field will be left unset and omitted during serialization. Servers
     * older than v1.15 do not set this field. The intended use of the remainingItemCount is *estimating*
     * the size of a collection. Clients should not rely on the remainingItemCount to be set or to be
     * exact.
     */
    public function getRemainingItemCount(): int|null
    {
        return $this->metadata->getRemainingItemCount();
    }

    /**
     * String that identifies the server's internal version of this object that can be used by clients to
     * determine when objects have changed. Value must be treated as opaque by clients and passed
     * unmodified back to the server. Populated by the system. Read-only. More info:
     * https://git.k8s.io/community/contributors/devel/sig-architecture/api-conventions.md#concurrency-control-and-consistency
     */
    public function getResourceVersion(): string|null
    {
        return $this->metadata->getResourceVersion();
    }

    /**
     * Deprecated: selfLink is a legacy read-only field that is no longer populated by the system.
     */
    public function getSelfLink(): string|null
    {
        return $this->metadata->getSelfLink();
    }

    /**
     * APIVersion defines the versioned schema of this representation of an object. Servers should convert
     * recognized schemas to the latest internal value, and may reject unrecognized values. More info:
     * https://git.k8s.io/community/contributors/devel/sig-architecture/api-conventions.md#resources
     */
    public function getApiVersion(): string|null
    {
        return $this->apiVersion;
    }

    /**
     * APIVersion defines the versioned schema of this representation of an object. Servers should convert
     * recognized schemas to the latest internal value, and may reject unrecognized values. More info:
     * https://git.k8s.io/community/contributors/devel/sig-architecture/api-conventions.md#resources
     *
     * @return static
     */
    public function setApiVersion(string $apiVersion): static
    {
        $this->apiVersion = $apiVersion;

        return $this;
    }

    /**
     * Suggested HTTP return code for this status, 0 if not set.
     */
    public function getCode(): int|null
    {
        return $this->code;
    }

    /**
     * Suggested HTTP return code for this status, 0 if not set.
     *
     * @return static
     */
    public function setCode(int $code): static
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Extended data associated with the reason.  Each reason may define its own extended details. This
     * field is optional and the data returned is not guaranteed to conform to any schema except that
     * defined by the reason type.
     */
    public function getDetails(): StatusDetails|null
    {
        return $this->details;
    }

    /**
     * Extended data associated with the reason.  Each reason may define its own extended details. This
     * field is optional and the data returned is not guaranteed to conform to any schema except that
     * defined by the reason type.
     *
     * @return static
     */
    public function setDetails(StatusDetails $details): static
    {
        $this->details = $details;

        return $this;
    }

    /**
     * Kind is a string value representing the REST resource this object represents. Servers may infer this
     * from the endpoint the client submits requests to. Cannot be updated. In CamelCase. More info:
     * https://git.k8s.io/community/contributors/devel/sig-architecture/api-conventions.md#types-kinds
     */
    public function getKind(): string|null
    {
        return $this->kind;
    }

    /**
     * Kind is a string value representing the REST resource this object represents. Servers may infer this
     * from the endpoint the client submits requests to. Cannot be updated. In CamelCase. More info:
     * https://git.k8s.io/community/contributors/devel/sig-architecture/api-conventions.md#types-kinds
     *
     * @return static
     */
    public function setKind(string $kind): static
    {
        $this->kind = $kind;

        return $this;
    }

    /**
     * A human-readable description of the status of this operation.
     */
    public function getMessage(): string|null
    {
        return $this->message;
    }

    /**
     * A human-readable description of the status of this operation.
     *
     * @return static
     */
    public function setMessage(string $message): static
    {
        $this->message = $message;

        return $this;
    }

    /**
     * Standard list metadata. More info:
     * https://git.k8s.io/community/contributors/devel/sig-architecture/api-conventions.md#types-kinds
     */
    public function getMetadata(): ListMeta|null
    {
        return $this->metadata;
    }

    /**
     * Standard list metadata. More info:
     * https://git.k8s.io/community/contributors/devel/sig-architecture/api-conventions.md#types-kinds
     *
     * @return static
     */
    public function setMetadata(ListMeta $metadata): static
    {
        $this->metadata = $metadata;

        return $this;
    }

    /**
     * A machine-readable description of why this operation is in the "Failure" status. If this value is
     * empty there is no information available. A Reason clarifies an HTTP status code but does not
     * override it.
     */
    public function getReason(): string|null
    {
        return $this->reason;
    }

    /**
     * A machine-readable description of why this operation is in the "Failure" status. If this value is
     * empty there is no information available. A Reason clarifies an HTTP status code but does not
     * override it.
     *
     * @return static
     */
    public function setReason(string $reason): static
    {
        $this->reason = $reason;

        return $this;
    }

    /**
     * Status of the operation. One of: "Success" or "Failure". More info:
     * https://git.k8s.io/community/contributors/devel/sig-architecture/api-conventions.md#spec-and-status
     */
    public function getStatus(): string|null
    {
        return $this->status;
    }

    /**
     * Status of the operation. One of: "Success" or "Failure". More info:
     * https://git.k8s.io/community/contributors/devel/sig-architecture/api-conventions.md#spec-and-status
     *
     * @return static
     */
    public function setStatus(string $status): static
    {
        $this->status = $status;

        return $this;
    }
}
