<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\FlowControl\v1beta3;

use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;

/**
 * LimitedPriorityLevelConfiguration specifies how to handle requests that are subject to limits. It
 * addresses two issues:
 *   - How are requests for this priority level limited?
 *   - What should be done with requests that exceed the limit?
 */
class LimitedPriorityLevelConfiguration
{
    #[Kubernetes\Attribute('borrowingLimitPercent')]
    protected int|null $borrowingLimitPercent = null;

    #[Kubernetes\Attribute('lendablePercent')]
    protected int|null $lendablePercent = null;

    #[Kubernetes\Attribute('limitResponse', type: AttributeType::Model, model: LimitResponse::class)]
    protected LimitResponse|null $limitResponse = null;

    #[Kubernetes\Attribute('nominalConcurrencyShares')]
    protected int|null $nominalConcurrencyShares = null;

    public function __construct(
        int|null $borrowingLimitPercent = null,
        int|null $lendablePercent = null,
        LimitResponse|null $limitResponse = null,
        int|null $nominalConcurrencyShares = null,
    ) {
        $this->borrowingLimitPercent = $borrowingLimitPercent;
        $this->lendablePercent = $lendablePercent;
        $this->limitResponse = $limitResponse;
        $this->nominalConcurrencyShares = $nominalConcurrencyShares;
    }

    /**
     * `borrowingLimitPercent`, if present, configures a limit on how many seats this priority level can
     * borrow from other priority levels. The limit is known as this level's BorrowingConcurrencyLimit
     * (BorrowingCL) and is a limit on the total number of seats that this level may borrow at any one
     * time. This field holds the ratio of that limit to the level's nominal concurrency limit. When this
     * field is non-nil, it must hold a non-negative integer and the limit is calculated as follows.
     *
     * BorrowingCL(i) = round( NominalCL(i) * borrowingLimitPercent(i)/100.0 )
     *
     * The value of this field can be more than 100, implying that this priority level can borrow a number
     * of seats that is greater than its own nominal concurrency limit (NominalCL). When this field is left
     * `nil`, the limit is effectively infinite.
     */
    public function getBorrowingLimitPercent(): int|null
    {
        return $this->borrowingLimitPercent;
    }

    /**
     * `borrowingLimitPercent`, if present, configures a limit on how many seats this priority level can
     * borrow from other priority levels. The limit is known as this level's BorrowingConcurrencyLimit
     * (BorrowingCL) and is a limit on the total number of seats that this level may borrow at any one
     * time. This field holds the ratio of that limit to the level's nominal concurrency limit. When this
     * field is non-nil, it must hold a non-negative integer and the limit is calculated as follows.
     *
     * BorrowingCL(i) = round( NominalCL(i) * borrowingLimitPercent(i)/100.0 )
     *
     * The value of this field can be more than 100, implying that this priority level can borrow a number
     * of seats that is greater than its own nominal concurrency limit (NominalCL). When this field is left
     * `nil`, the limit is effectively infinite.
     *
     * @return static
     */
    public function setBorrowingLimitPercent(int $borrowingLimitPercent): static
    {
        $this->borrowingLimitPercent = $borrowingLimitPercent;

        return $this;
    }

    /**
     * `lendablePercent` prescribes the fraction of the level's NominalCL that can be borrowed by other
     * priority levels. The value of this field must be between 0 and 100, inclusive, and it defaults to 0.
     * The number of seats that other levels can borrow from this level, known as this level's
     * LendableConcurrencyLimit (LendableCL), is defined as follows.
     *
     * LendableCL(i) = round( NominalCL(i) * lendablePercent(i)/100.0 )
     */
    public function getLendablePercent(): int|null
    {
        return $this->lendablePercent;
    }

    /**
     * `lendablePercent` prescribes the fraction of the level's NominalCL that can be borrowed by other
     * priority levels. The value of this field must be between 0 and 100, inclusive, and it defaults to 0.
     * The number of seats that other levels can borrow from this level, known as this level's
     * LendableConcurrencyLimit (LendableCL), is defined as follows.
     *
     * LendableCL(i) = round( NominalCL(i) * lendablePercent(i)/100.0 )
     *
     * @return static
     */
    public function setLendablePercent(int $lendablePercent): static
    {
        $this->lendablePercent = $lendablePercent;

        return $this;
    }

    /**
     * `limitResponse` indicates what to do with requests that can not be executed right now
     */
    public function getLimitResponse(): LimitResponse|null
    {
        return $this->limitResponse;
    }

    /**
     * `limitResponse` indicates what to do with requests that can not be executed right now
     *
     * @return static
     */
    public function setLimitResponse(LimitResponse $limitResponse): static
    {
        $this->limitResponse = $limitResponse;

        return $this;
    }

    /**
     * `nominalConcurrencyShares` (NCS) contributes to the computation of the NominalConcurrencyLimit
     * (NominalCL) of this level. This is the number of execution seats available at this priority level.
     * This is used both for requests dispatched from this priority level as well as requests dispatched
     * from other priority levels borrowing seats from this level. The server's concurrency limit
     * (ServerCL) is divided among the Limited priority levels in proportion to their NCS values:
     *
     * NominalCL(i)  = ceil( ServerCL * NCS(i) / sum_ncs ) sum_ncs = sum[priority level k] NCS(k)
     *
     * Bigger numbers mean a larger nominal concurrency limit, at the expense of every other priority
     * level. This field has a default value of 30.
     */
    public function getNominalConcurrencyShares(): int|null
    {
        return $this->nominalConcurrencyShares;
    }

    /**
     * `nominalConcurrencyShares` (NCS) contributes to the computation of the NominalConcurrencyLimit
     * (NominalCL) of this level. This is the number of execution seats available at this priority level.
     * This is used both for requests dispatched from this priority level as well as requests dispatched
     * from other priority levels borrowing seats from this level. The server's concurrency limit
     * (ServerCL) is divided among the Limited priority levels in proportion to their NCS values:
     *
     * NominalCL(i)  = ceil( ServerCL * NCS(i) / sum_ncs ) sum_ncs = sum[priority level k] NCS(k)
     *
     * Bigger numbers mean a larger nominal concurrency limit, at the expense of every other priority
     * level. This field has a default value of 30.
     *
     * @return static
     */
    public function setNominalConcurrencyShares(int $nominalConcurrencyShares): static
    {
        $this->nominalConcurrencyShares = $nominalConcurrencyShares;

        return $this;
    }
}
