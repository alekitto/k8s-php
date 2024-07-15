<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Core\v1;

use Kcs\K8s\Attribute as Kubernetes;

/**
 * Represents an empty directory for a pod. Empty directory volumes support ownership management and
 * SELinux relabeling.
 */
class EmptyDirVolumeSource
{
    #[Kubernetes\Attribute('medium')]
    protected string|null $medium = null;

    #[Kubernetes\Attribute('sizeLimit')]
    protected string|null $sizeLimit = null;

    public function __construct(string|null $medium = null, string|null $sizeLimit = null)
    {
        $this->medium = $medium;
        $this->sizeLimit = $sizeLimit;
    }

    /**
     * medium represents what type of storage medium should back this directory. The default is "" which
     * means to use the node's default medium. Must be an empty string (default) or Memory. More info:
     * https://kubernetes.io/docs/concepts/storage/volumes#emptydir
     */
    public function getMedium(): string|null
    {
        return $this->medium;
    }

    /**
     * medium represents what type of storage medium should back this directory. The default is "" which
     * means to use the node's default medium. Must be an empty string (default) or Memory. More info:
     * https://kubernetes.io/docs/concepts/storage/volumes#emptydir
     *
     * @return static
     */
    public function setMedium(string $medium): static
    {
        $this->medium = $medium;

        return $this;
    }

    /**
     * sizeLimit is the total amount of local storage required for this EmptyDir volume. The size limit is
     * also applicable for memory medium. The maximum usage on memory medium EmptyDir would be the minimum
     * value between the SizeLimit specified here and the sum of memory limits of all containers in a pod.
     * The default is nil which means that the limit is undefined. More info:
     * https://kubernetes.io/docs/concepts/storage/volumes#emptydir
     */
    public function getSizeLimit(): string
    {
        return $this->sizeLimit;
    }

    /**
     * sizeLimit is the total amount of local storage required for this EmptyDir volume. The size limit is
     * also applicable for memory medium. The maximum usage on memory medium EmptyDir would be the minimum
     * value between the SizeLimit specified here and the sum of memory limits of all containers in a pod.
     * The default is nil which means that the limit is undefined. More info:
     * https://kubernetes.io/docs/concepts/storage/volumes#emptydir
     *
     * @return static
     */
    public function setSizeLimit(string $sizeLimit): static
    {
        $this->sizeLimit = $sizeLimit;

        return $this;
    }
}
