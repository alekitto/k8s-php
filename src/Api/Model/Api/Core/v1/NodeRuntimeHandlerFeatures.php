<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Core\v1;

use Kcs\K8s\Attribute as Kubernetes;

/**
 * NodeRuntimeHandlerFeatures is a set of runtime features.
 */
class NodeRuntimeHandlerFeatures
{
    #[Kubernetes\Attribute('recursiveReadOnlyMounts')]
    protected bool|null $recursiveReadOnlyMounts = null;

    public function __construct(bool|null $recursiveReadOnlyMounts = null)
    {
        $this->recursiveReadOnlyMounts = $recursiveReadOnlyMounts;
    }

    /**
     * RecursiveReadOnlyMounts is set to true if the runtime handler supports RecursiveReadOnlyMounts.
     */
    public function isRecursiveReadOnlyMounts(): bool|null
    {
        return $this->recursiveReadOnlyMounts;
    }

    /**
     * RecursiveReadOnlyMounts is set to true if the runtime handler supports RecursiveReadOnlyMounts.
     *
     * @return static
     */
    public function setIsRecursiveReadOnlyMounts(bool $recursiveReadOnlyMounts): static
    {
        $this->recursiveReadOnlyMounts = $recursiveReadOnlyMounts;

        return $this;
    }
}
