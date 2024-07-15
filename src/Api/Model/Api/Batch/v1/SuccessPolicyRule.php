<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Batch\v1;

use Kcs\K8s\Attribute as Kubernetes;

/**
 * SuccessPolicyRule describes rule for declaring a Job as succeeded. Each rule must have at least one
 * of the "succeededIndexes" or "succeededCount" specified.
 */
class SuccessPolicyRule
{
    #[Kubernetes\Attribute('succeededCount')]
    protected int|null $succeededCount = null;

    #[Kubernetes\Attribute('succeededIndexes')]
    protected string|null $succeededIndexes = null;

    public function __construct(int|null $succeededCount = null, string|null $succeededIndexes = null)
    {
        $this->succeededCount = $succeededCount;
        $this->succeededIndexes = $succeededIndexes;
    }

    /**
     * succeededCount specifies the minimal required size of the actual set of the succeeded indexes for
     * the Job. When succeededCount is used along with succeededIndexes, the check is constrained only to
     * the set of indexes specified by succeededIndexes. For example, given that succeededIndexes is "1-4",
     * succeededCount is "3", and completed indexes are "1", "3", and "5", the Job isn't declared as
     * succeeded because only "1" and "3" indexes are considered in that rules. When this field is null,
     * this doesn't default to any value and is never evaluated at any time. When specified it needs to be
     * a positive integer.
     */
    public function getSucceededCount(): int|null
    {
        return $this->succeededCount;
    }

    /**
     * succeededCount specifies the minimal required size of the actual set of the succeeded indexes for
     * the Job. When succeededCount is used along with succeededIndexes, the check is constrained only to
     * the set of indexes specified by succeededIndexes. For example, given that succeededIndexes is "1-4",
     * succeededCount is "3", and completed indexes are "1", "3", and "5", the Job isn't declared as
     * succeeded because only "1" and "3" indexes are considered in that rules. When this field is null,
     * this doesn't default to any value and is never evaluated at any time. When specified it needs to be
     * a positive integer.
     *
     * @return static
     */
    public function setSucceededCount(int $succeededCount): static
    {
        $this->succeededCount = $succeededCount;

        return $this;
    }

    /**
     * succeededIndexes specifies the set of indexes which need to be contained in the actual set of the
     * succeeded indexes for the Job. The list of indexes must be within 0 to ".spec.completions-1" and
     * must not contain duplicates. At least one element is required. The indexes are represented as
     * intervals separated by commas. The intervals can be a decimal integer or a pair of decimal integers
     * separated by a hyphen. The number are listed in represented by the first and last element of the
     * series, separated by a hyphen. For example, if the completed indexes are 1, 3, 4, 5 and 7, they are
     * represented as "1,3-5,7". When this field is null, this field doesn't default to any value and is
     * never evaluated at any time.
     */
    public function getSucceededIndexes(): string|null
    {
        return $this->succeededIndexes;
    }

    /**
     * succeededIndexes specifies the set of indexes which need to be contained in the actual set of the
     * succeeded indexes for the Job. The list of indexes must be within 0 to ".spec.completions-1" and
     * must not contain duplicates. At least one element is required. The indexes are represented as
     * intervals separated by commas. The intervals can be a decimal integer or a pair of decimal integers
     * separated by a hyphen. The number are listed in represented by the first and last element of the
     * series, separated by a hyphen. For example, if the completed indexes are 1, 3, 4, 5 and 7, they are
     * represented as "1,3-5,7". When this field is null, this field doesn't default to any value and is
     * never evaluated at any time.
     *
     * @return static
     */
    public function setSucceededIndexes(string $succeededIndexes): static
    {
        $this->succeededIndexes = $succeededIndexes;

        return $this;
    }
}