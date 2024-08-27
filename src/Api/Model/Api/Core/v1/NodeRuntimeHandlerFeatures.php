<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Core\v1;

use Kcs\K8s\Attribute as Kubernetes;

/**
 * NodeRuntimeHandlerFeatures is a set of features implemented by the runtime handler.
 */
class NodeRuntimeHandlerFeatures
{
    #[Kubernetes\Attribute('recursiveReadOnlyMounts')]
    protected bool|null $recursiveReadOnlyMounts = null;

    #[Kubernetes\Attribute('userNamespaces')]
    protected bool|null $userNamespaces = null;

    public function __construct(bool|null $recursiveReadOnlyMounts = null, bool|null $userNamespaces = null)
    {
        $this->recursiveReadOnlyMounts = $recursiveReadOnlyMounts;
        $this->userNamespaces = $userNamespaces;
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

    /**
     * UserNamespaces is set to true if the runtime handler supports UserNamespaces, including for volumes.
     */
    public function isUserNamespaces(): bool|null
    {
        return $this->userNamespaces;
    }

    /**
     * UserNamespaces is set to true if the runtime handler supports UserNamespaces, including for volumes.
     *
     * @return static
     */
    public function setIsUserNamespaces(bool $userNamespaces): static
    {
        $this->userNamespaces = $userNamespaces;

        return $this;
    }
}
