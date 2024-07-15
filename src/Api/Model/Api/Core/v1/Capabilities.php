<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Core\v1;

use Kcs\K8s\Attribute as Kubernetes;

/**
 * Adds and removes POSIX capabilities from running containers.
 */
class Capabilities
{
    /** @var string[]|null */
    #[Kubernetes\Attribute('add')]
    protected array|null $add = null;

    /** @var string[]|null */
    #[Kubernetes\Attribute('drop')]
    protected array|null $drop = null;

    /**
     * @param string[]|null $add
     * @param string[]|null $drop
     */
    public function __construct(array|null $add = null, array|null $drop = null)
    {
        $this->add = $add;
        $this->drop = $drop;
    }

    /**
     * Added capabilities
     */
    public function getAdd(): array|null
    {
        return $this->add;
    }

    /**
     * Added capabilities
     *
     * @return static
     */
    public function setAdd(array $add): static
    {
        $this->add = $add;

        return $this;
    }

    /**
     * Removed capabilities
     */
    public function getDrop(): array|null
    {
        return $this->drop;
    }

    /**
     * Removed capabilities
     *
     * @return static
     */
    public function setDrop(array $drop): static
    {
        $this->drop = $drop;

        return $this;
    }
}
