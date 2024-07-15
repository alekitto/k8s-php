<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Core\v1;

use Kcs\K8s\Attribute as Kubernetes;

/**
 * LocalObjectReference contains enough information to let you locate the referenced object inside the
 * same namespace.
 */
class LocalObjectReference
{
    #[Kubernetes\Attribute('name')]
    protected string|null $name = null;

    public function __construct(string|null $name = null)
    {
        $this->name = $name;
    }

    /**
     * Name of the referent. This field is effectively required, but due to backwards compatibility is
     * allowed to be empty. Instances of this type with an empty value here are almost certainly wrong.
     * More info: https://kubernetes.io/docs/concepts/overview/working-with-objects/names/#names
     */
    public function getName(): string|null
    {
        return $this->name;
    }

    /**
     * Name of the referent. This field is effectively required, but due to backwards compatibility is
     * allowed to be empty. Instances of this type with an empty value here are almost certainly wrong.
     * More info: https://kubernetes.io/docs/concepts/overview/working-with-objects/names/#names
     *
     * @return static
     */
    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }
}
