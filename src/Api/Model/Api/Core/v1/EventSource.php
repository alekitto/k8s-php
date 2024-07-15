<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Core\v1;

use Kcs\K8s\Attribute as Kubernetes;

/**
 * EventSource contains information for an event.
 */
class EventSource
{
    #[Kubernetes\Attribute('component')]
    protected string|null $component = null;

    #[Kubernetes\Attribute('host')]
    protected string|null $host = null;

    public function __construct(string|null $component = null, string|null $host = null)
    {
        $this->component = $component;
        $this->host = $host;
    }

    /**
     * Component from which the event is generated.
     */
    public function getComponent(): string|null
    {
        return $this->component;
    }

    /**
     * Component from which the event is generated.
     *
     * @return static
     */
    public function setComponent(string $component): static
    {
        $this->component = $component;

        return $this;
    }

    /**
     * Node name on which the event is generated.
     */
    public function getHost(): string|null
    {
        return $this->host;
    }

    /**
     * Node name on which the event is generated.
     *
     * @return static
     */
    public function setHost(string $host): static
    {
        $this->host = $host;

        return $this;
    }
}
