<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\FlowControl\v1beta3;

use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;

/**
 * PriorityLevelConfigurationSpec specifies the configuration of a priority level.
 */
class PriorityLevelConfigurationSpec
{
    #[Kubernetes\Attribute('exempt', type: AttributeType::Model, model: ExemptPriorityLevelConfiguration::class)]
    protected ExemptPriorityLevelConfiguration|null $exempt = null;

    #[Kubernetes\Attribute('limited', type: AttributeType::Model, model: LimitedPriorityLevelConfiguration::class)]
    protected LimitedPriorityLevelConfiguration|null $limited = null;

    #[Kubernetes\Attribute('type', required: true)]
    protected string $type;

    public function __construct(string $type)
    {
        $this->type = $type;
    }

    /**
     * `exempt` specifies how requests are handled for an exempt priority level. This field MUST be empty
     * if `type` is `"Limited"`. This field MAY be non-empty if `type` is `"Exempt"`. If empty and `type`
     * is `"Exempt"` then the default values for `ExemptPriorityLevelConfiguration` apply.
     */
    public function getExempt(): ExemptPriorityLevelConfiguration|null
    {
        return $this->exempt;
    }

    /**
     * `exempt` specifies how requests are handled for an exempt priority level. This field MUST be empty
     * if `type` is `"Limited"`. This field MAY be non-empty if `type` is `"Exempt"`. If empty and `type`
     * is `"Exempt"` then the default values for `ExemptPriorityLevelConfiguration` apply.
     *
     * @return static
     */
    public function setExempt(ExemptPriorityLevelConfiguration $exempt): static
    {
        $this->exempt = $exempt;

        return $this;
    }

    /**
     * `limited` specifies how requests are handled for a Limited priority level. This field must be
     * non-empty if and only if `type` is `"Limited"`.
     */
    public function getLimited(): LimitedPriorityLevelConfiguration|null
    {
        return $this->limited;
    }

    /**
     * `limited` specifies how requests are handled for a Limited priority level. This field must be
     * non-empty if and only if `type` is `"Limited"`.
     *
     * @return static
     */
    public function setLimited(LimitedPriorityLevelConfiguration $limited): static
    {
        $this->limited = $limited;

        return $this;
    }

    /**
     * `type` indicates whether this priority level is subject to limitation on request execution.  A value
     * of `"Exempt"` means that requests of this priority level are not subject to a limit (and thus are
     * never queued) and do not detract from the capacity made available to other priority levels.  A value
     * of `"Limited"` means that (a) requests of this priority level _are_ subject to limits and (b) some
     * of the server's limited capacity is made available exclusively to this priority level. Required.
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * `type` indicates whether this priority level is subject to limitation on request execution.  A value
     * of `"Exempt"` means that requests of this priority level are not subject to a limit (and thus are
     * never queued) and do not detract from the capacity made available to other priority levels.  A value
     * of `"Limited"` means that (a) requests of this priority level _are_ subject to limits and (b) some
     * of the server's limited capacity is made available exclusively to this priority level. Required.
     *
     * @return static
     */
    public function setType(string $type): static
    {
        $this->type = $type;

        return $this;
    }
}
