<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\FlowControl\v1beta3;

use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;

/**
 * LimitResponse defines how to handle requests that can not be executed right now.
 */
class LimitResponse
{
    #[Kubernetes\Attribute('queuing', type: AttributeType::Model, model: QueuingConfiguration::class)]
    protected QueuingConfiguration|null $queuing = null;

    #[Kubernetes\Attribute('type', required: true)]
    protected string $type;

    public function __construct(string $type)
    {
        $this->type = $type;
    }

    /**
     * `queuing` holds the configuration parameters for queuing. This field may be non-empty only if `type`
     * is `"Queue"`.
     */
    public function getQueuing(): QueuingConfiguration|null
    {
        return $this->queuing;
    }

    /**
     * `queuing` holds the configuration parameters for queuing. This field may be non-empty only if `type`
     * is `"Queue"`.
     *
     * @return static
     */
    public function setQueuing(QueuingConfiguration $queuing): static
    {
        $this->queuing = $queuing;

        return $this;
    }

    /**
     * `type` is "Queue" or "Reject". "Queue" means that requests that can not be executed upon arrival are
     * held in a queue until they can be executed or a queuing limit is reached. "Reject" means that
     * requests that can not be executed upon arrival are rejected. Required.
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * `type` is "Queue" or "Reject". "Queue" means that requests that can not be executed upon arrival are
     * held in a queue until they can be executed or a queuing limit is reached. "Reject" means that
     * requests that can not be executed upon arrival are rejected. Required.
     *
     * @return static
     */
    public function setType(string $type): static
    {
        $this->type = $type;

        return $this;
    }
}
