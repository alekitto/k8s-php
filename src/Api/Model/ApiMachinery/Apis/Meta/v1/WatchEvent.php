<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\ApiMachinery\Apis\Meta\v1;

use Kcs\K8s\Attribute as Kubernetes;

/**
 * Event represents a single event to a watched resource.
 */
#[Kubernetes\Kind('WatchEvent', version: 'v1')]
class WatchEvent
{
    #[Kubernetes\Attribute('object', required: true)]
    protected object $object;

    #[Kubernetes\Attribute('type', required: true)]
    protected string $type;

    public function __construct(object $object, string $type)
    {
        $this->object = $object;
        $this->type = $type;
    }

    /**
     * Object is:
     *  * If Type is Added or Modified: the new state of the object.
     *  * If Type is Deleted: the state of the object immediately before deletion.
     *  * If Type is Error: *Status is recommended; other types may make sense
     *    depending on context.
     */
    public function getObject(): object
    {
        return $this->object;
    }

    /**
     * Object is:
     *  * If Type is Added or Modified: the new state of the object.
     *  * If Type is Deleted: the state of the object immediately before deletion.
     *  * If Type is Error: *Status is recommended; other types may make sense
     *    depending on context.
     *
     * @return static
     */
    public function setObject(object $object): static
    {
        $this->object = $object;

        return $this;
    }

    public function getType(): string
    {
        return $this->type;
    }

    /** @return static */
    public function setType(string $type): static
    {
        $this->type = $type;

        return $this;
    }
}
