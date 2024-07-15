<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\ApiMachinery\Apis\Meta\v1;

use Kcs\K8s\Attribute as Kubernetes;

/**
 * StatusCause provides more information about an api.Status failure, including cases when multiple
 * errors are encountered.
 */
class StatusCause
{
    #[Kubernetes\Attribute('field')]
    protected string|null $field = null;

    #[Kubernetes\Attribute('message')]
    protected string|null $message = null;

    #[Kubernetes\Attribute('reason')]
    protected string|null $reason = null;

    public function __construct(string|null $field = null, string|null $message = null, string|null $reason = null)
    {
        $this->field = $field;
        $this->message = $message;
        $this->reason = $reason;
    }

    /**
     * The field of the resource that has caused this error, as named by its JSON serialization. May
     * include dot and postfix notation for nested attributes. Arrays are zero-indexed.  Fields may appear
     * more than once in an array of causes due to fields having multiple errors. Optional.
     *
     * Examples:
     *   "name" - the field "name" on the current resource
     *   "items[0].name" - the field "name" on the first array entry in "items"
     */
    public function getField(): string|null
    {
        return $this->field;
    }

    /**
     * The field of the resource that has caused this error, as named by its JSON serialization. May
     * include dot and postfix notation for nested attributes. Arrays are zero-indexed.  Fields may appear
     * more than once in an array of causes due to fields having multiple errors. Optional.
     *
     * Examples:
     *   "name" - the field "name" on the current resource
     *   "items[0].name" - the field "name" on the first array entry in "items"
     *
     * @return static
     */
    public function setField(string $field): static
    {
        $this->field = $field;

        return $this;
    }

    /**
     * A human-readable description of the cause of the error.  This field may be presented as-is to a
     * reader.
     */
    public function getMessage(): string|null
    {
        return $this->message;
    }

    /**
     * A human-readable description of the cause of the error.  This field may be presented as-is to a
     * reader.
     *
     * @return static
     */
    public function setMessage(string $message): static
    {
        $this->message = $message;

        return $this;
    }

    /**
     * A machine-readable description of the cause of the error. If this value is empty there is no
     * information available.
     */
    public function getReason(): string|null
    {
        return $this->reason;
    }

    /**
     * A machine-readable description of the cause of the error. If this value is empty there is no
     * information available.
     *
     * @return static
     */
    public function setReason(string $reason): static
    {
        $this->reason = $reason;

        return $this;
    }
}
