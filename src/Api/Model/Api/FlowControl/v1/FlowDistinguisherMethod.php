<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\FlowControl\v1;

use Kcs\K8s\Attribute as Kubernetes;

/**
 * FlowDistinguisherMethod specifies the method of a flow distinguisher.
 */
class FlowDistinguisherMethod
{
    #[Kubernetes\Attribute('type', required: true)]
    protected string $type;

    public function __construct(string $type)
    {
        $this->type = $type;
    }

    /**
     * `type` is the type of flow distinguisher method The supported types are "ByUser" and "ByNamespace".
     * Required.
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * `type` is the type of flow distinguisher method The supported types are "ByUser" and "ByNamespace".
     * Required.
     *
     * @return static
     */
    public function setType(string $type): static
    {
        $this->type = $type;

        return $this;
    }
}
