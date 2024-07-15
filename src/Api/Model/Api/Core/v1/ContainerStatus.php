<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Core\v1;

use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;
use Kcs\K8s\Collection;

/**
 * ContainerStatus contains details for the current status of this container.
 */
class ContainerStatus
{
    /** @var object[]|null */
    #[Kubernetes\Attribute('allocatedResources')]
    protected array|null $allocatedResources = null;

    #[Kubernetes\Attribute('containerID')]
    protected string|null $containerID = null;

    #[Kubernetes\Attribute('image', required: true)]
    protected string $image;

    #[Kubernetes\Attribute('imageID', required: true)]
    protected string $imageID;

    #[Kubernetes\Attribute('lastState', type: AttributeType::Model, model: ContainerState::class)]
    protected ContainerState|null $lastState = null;

    #[Kubernetes\Attribute('name', required: true)]
    protected string $name;

    #[Kubernetes\Attribute('ready', required: true)]
    protected bool $ready;

    #[Kubernetes\Attribute('resources', type: AttributeType::Model, model: ResourceRequirements::class)]
    protected ResourceRequirements|null $resources = null;

    #[Kubernetes\Attribute('restartCount', required: true)]
    protected int $restartCount;

    #[Kubernetes\Attribute('started')]
    protected bool|null $started = null;

    #[Kubernetes\Attribute('state', type: AttributeType::Model, model: ContainerState::class)]
    protected ContainerState|null $state = null;

    /** @var iterable|VolumeMountStatus[]|null */
    #[Kubernetes\Attribute('volumeMounts', type: AttributeType::Collection, model: VolumeMountStatus::class)]
    protected $volumeMounts = null;

    public function __construct(string $image, string $imageID, string $name, bool $ready, int $restartCount)
    {
        $this->image = $image;
        $this->imageID = $imageID;
        $this->name = $name;
        $this->ready = $ready;
        $this->restartCount = $restartCount;
    }

    /**
     * AllocatedResources represents the compute resources allocated for this container by the node.
     * Kubelet sets this value to Container.Resources.Requests upon successful pod admission and after
     * successfully admitting desired pod resize.
     */
    public function getAllocatedResources(): array|null
    {
        return $this->allocatedResources;
    }

    /**
     * AllocatedResources represents the compute resources allocated for this container by the node.
     * Kubelet sets this value to Container.Resources.Requests upon successful pod admission and after
     * successfully admitting desired pod resize.
     *
     * @return static
     */
    public function setAllocatedResources(array $allocatedResources): static
    {
        $this->allocatedResources = $allocatedResources;

        return $this;
    }

    /**
     * ContainerID is the ID of the container in the format '<type>://<container_id>'. Where type is a
     * container runtime identifier, returned from Version call of CRI API (for example "containerd").
     */
    public function getContainerID(): string|null
    {
        return $this->containerID;
    }

    /**
     * ContainerID is the ID of the container in the format '<type>://<container_id>'. Where type is a
     * container runtime identifier, returned from Version call of CRI API (for example "containerd").
     *
     * @return static
     */
    public function setContainerID(string $containerID): static
    {
        $this->containerID = $containerID;

        return $this;
    }

    /**
     * Image is the name of container image that the container is running. The container image may not
     * match the image used in the PodSpec, as it may have been resolved by the runtime. More info:
     * https://kubernetes.io/docs/concepts/containers/images.
     */
    public function getImage(): string
    {
        return $this->image;
    }

    /**
     * Image is the name of container image that the container is running. The container image may not
     * match the image used in the PodSpec, as it may have been resolved by the runtime. More info:
     * https://kubernetes.io/docs/concepts/containers/images.
     *
     * @return static
     */
    public function setImage(string $image): static
    {
        $this->image = $image;

        return $this;
    }

    /**
     * ImageID is the image ID of the container's image. The image ID may not match the image ID of the
     * image used in the PodSpec, as it may have been resolved by the runtime.
     */
    public function getImageID(): string
    {
        return $this->imageID;
    }

    /**
     * ImageID is the image ID of the container's image. The image ID may not match the image ID of the
     * image used in the PodSpec, as it may have been resolved by the runtime.
     *
     * @return static
     */
    public function setImageID(string $imageID): static
    {
        $this->imageID = $imageID;

        return $this;
    }

    /**
     * LastTerminationState holds the last termination state of the container to help debug container
     * crashes and restarts. This field is not populated if the container is still running and RestartCount
     * is 0.
     */
    public function getLastState(): ContainerState|null
    {
        return $this->lastState;
    }

    /**
     * LastTerminationState holds the last termination state of the container to help debug container
     * crashes and restarts. This field is not populated if the container is still running and RestartCount
     * is 0.
     *
     * @return static
     */
    public function setLastState(ContainerState $lastState): static
    {
        $this->lastState = $lastState;

        return $this;
    }

    /**
     * Name is a DNS_LABEL representing the unique name of the container. Each container in a pod must have
     * a unique name across all container types. Cannot be updated.
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Name is a DNS_LABEL representing the unique name of the container. Each container in a pod must have
     * a unique name across all container types. Cannot be updated.
     *
     * @return static
     */
    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Ready specifies whether the container is currently passing its readiness check. The value will
     * change as readiness probes keep executing. If no readiness probes are specified, this field defaults
     * to true once the container is fully started (see Started field).
     *
     * The value is typically used to determine whether a container is ready to accept traffic.
     */
    public function isReady(): bool
    {
        return $this->ready;
    }

    /**
     * Ready specifies whether the container is currently passing its readiness check. The value will
     * change as readiness probes keep executing. If no readiness probes are specified, this field defaults
     * to true once the container is fully started (see Started field).
     *
     * The value is typically used to determine whether a container is ready to accept traffic.
     *
     * @return static
     */
    public function setIsReady(bool $ready): static
    {
        $this->ready = $ready;

        return $this;
    }

    /**
     * Resources represents the compute resource requests and limits that have been successfully enacted on
     * the running container after it has been started or has been successfully resized.
     */
    public function getResources(): ResourceRequirements|null
    {
        return $this->resources;
    }

    /**
     * Resources represents the compute resource requests and limits that have been successfully enacted on
     * the running container after it has been started or has been successfully resized.
     *
     * @return static
     */
    public function setResources(ResourceRequirements $resources): static
    {
        $this->resources = $resources;

        return $this;
    }

    /**
     * RestartCount holds the number of times the container has been restarted. Kubelet makes an effort to
     * always increment the value, but there are cases when the state may be lost due to node restarts and
     * then the value may be reset to 0. The value is never negative.
     */
    public function getRestartCount(): int
    {
        return $this->restartCount;
    }

    /**
     * RestartCount holds the number of times the container has been restarted. Kubelet makes an effort to
     * always increment the value, but there are cases when the state may be lost due to node restarts and
     * then the value may be reset to 0. The value is never negative.
     *
     * @return static
     */
    public function setRestartCount(int $restartCount): static
    {
        $this->restartCount = $restartCount;

        return $this;
    }

    /**
     * Started indicates whether the container has finished its postStart lifecycle hook and passed its
     * startup probe. Initialized as false, becomes true after startupProbe is considered successful.
     * Resets to false when the container is restarted, or if kubelet loses state temporarily. In both
     * cases, startup probes will run again. Is always true when no startupProbe is defined and container
     * is running and has passed the postStart lifecycle hook. The null value must be treated the same as
     * false.
     */
    public function isStarted(): bool|null
    {
        return $this->started;
    }

    /**
     * Started indicates whether the container has finished its postStart lifecycle hook and passed its
     * startup probe. Initialized as false, becomes true after startupProbe is considered successful.
     * Resets to false when the container is restarted, or if kubelet loses state temporarily. In both
     * cases, startup probes will run again. Is always true when no startupProbe is defined and container
     * is running and has passed the postStart lifecycle hook. The null value must be treated the same as
     * false.
     *
     * @return static
     */
    public function setIsStarted(bool $started): static
    {
        $this->started = $started;

        return $this;
    }

    /**
     * State holds details about the container's current condition.
     */
    public function getState(): ContainerState|null
    {
        return $this->state;
    }

    /**
     * State holds details about the container's current condition.
     *
     * @return static
     */
    public function setState(ContainerState $state): static
    {
        $this->state = $state;

        return $this;
    }

    /**
     * Status of volume mounts.
     *
     * @return iterable|VolumeMountStatus[]
     */
    public function getVolumeMounts(): iterable|null
    {
        return $this->volumeMounts;
    }

    /**
     * Status of volume mounts.
     *
     * @return static
     */
    public function setVolumeMounts(iterable $volumeMounts): static
    {
        $this->volumeMounts = $volumeMounts;

        return $this;
    }

    /** @return static */
    public function addVolumeMounts(VolumeMountStatus $volumeMount): static
    {
        if (! $this->volumeMounts) {
            $this->volumeMounts = new Collection();
        }

        $this->volumeMounts[] = $volumeMount;

        return $this;
    }
}
