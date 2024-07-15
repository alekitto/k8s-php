<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Core\v1;

use Kcs\K8s\Attribute as Kubernetes;

/**
 * NamespaceSpec describes the attributes on a Namespace.
 */
class NamespaceSpec
{
    /** @var string[]|null */
    #[Kubernetes\Attribute('finalizers')]
    protected array|null $finalizers = null;

    /** @param string[]|null $finalizers */
    public function __construct(array|null $finalizers = null)
    {
        $this->finalizers = $finalizers;
    }

    /**
     * Finalizers is an opaque list of values that must be empty to permanently remove object from storage.
     * More info: https://kubernetes.io/docs/tasks/administer-cluster/namespaces/
     */
    public function getFinalizers(): array|null
    {
        return $this->finalizers;
    }

    /**
     * Finalizers is an opaque list of values that must be empty to permanently remove object from storage.
     * More info: https://kubernetes.io/docs/tasks/administer-cluster/namespaces/
     *
     * @return static
     */
    public function setFinalizers(array $finalizers): static
    {
        $this->finalizers = $finalizers;

        return $this;
    }
}
