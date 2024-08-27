<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Core\v1;

use Kcs\K8s\Attribute as Kubernetes;

/**
 * LinuxContainerUser represents user identity information in Linux containers
 */
class LinuxContainerUser
{
    #[Kubernetes\Attribute('gid', required: true)]
    protected int $gid;

    /** @var int[]|null */
    #[Kubernetes\Attribute('supplementalGroups')]
    protected array|null $supplementalGroups = null;

    #[Kubernetes\Attribute('uid', required: true)]
    protected int $uid;

    public function __construct(int $gid, int $uid)
    {
        $this->gid = $gid;
        $this->uid = $uid;
    }

    /**
     * GID is the primary gid initially attached to the first process in the container
     */
    public function getGid(): int
    {
        return $this->gid;
    }

    /**
     * GID is the primary gid initially attached to the first process in the container
     *
     * @return static
     */
    public function setGid(int $gid): static
    {
        $this->gid = $gid;

        return $this;
    }

    /**
     * SupplementalGroups are the supplemental groups initially attached to the first process in the
     * container
     */
    public function getSupplementalGroups(): array|null
    {
        return $this->supplementalGroups;
    }

    /**
     * SupplementalGroups are the supplemental groups initially attached to the first process in the
     * container
     *
     * @return static
     */
    public function setSupplementalGroups(array $supplementalGroups): static
    {
        $this->supplementalGroups = $supplementalGroups;

        return $this;
    }

    /**
     * UID is the primary uid initially attached to the first process in the container
     */
    public function getUid(): int
    {
        return $this->uid;
    }

    /**
     * UID is the primary uid initially attached to the first process in the container
     *
     * @return static
     */
    public function setUid(int $uid): static
    {
        $this->uid = $uid;

        return $this;
    }
}
