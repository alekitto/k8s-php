<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\ApiMachinery\Apis\Meta\v1;

use Kcs\K8s\Attribute as Kubernetes;

/**
 * Preconditions must be fulfilled before an operation (update, delete, etc.) is carried out.
 */
class Preconditions
{
    #[Kubernetes\Attribute('resourceVersion')]
    protected string|null $resourceVersion = null;

    #[Kubernetes\Attribute('uid')]
    protected string|null $uid = null;

    public function __construct(string|null $resourceVersion = null, string|null $uid = null)
    {
        $this->resourceVersion = $resourceVersion;
        $this->uid = $uid;
    }

    /**
     * Specifies the target ResourceVersion
     */
    public function getResourceVersion(): string|null
    {
        return $this->resourceVersion;
    }

    /**
     * Specifies the target ResourceVersion
     *
     * @return static
     */
    public function setResourceVersion(string $resourceVersion): static
    {
        $this->resourceVersion = $resourceVersion;

        return $this;
    }

    /**
     * Specifies the target UID.
     */
    public function getUid(): string|null
    {
        return $this->uid;
    }

    /**
     * Specifies the target UID.
     *
     * @return static
     */
    public function setUid(string $uid): static
    {
        $this->uid = $uid;

        return $this;
    }
}
