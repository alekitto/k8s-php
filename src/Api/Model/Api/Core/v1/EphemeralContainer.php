<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Core\v1;

use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;
use Kcs\K8s\Collection;

/**
 * An EphemeralContainer is a temporary container that you may add to an existing Pod for
 * user-initiated activities such as debugging. Ephemeral containers have no resource or scheduling
 * guarantees, and they will not be restarted when they exit or when a Pod is removed or restarted. The
 * kubelet may evict a Pod if an ephemeral container causes the Pod to exceed its resource allocation.
 *
 * To add an ephemeral container, use the ephemeralcontainers subresource of an existing Pod. Ephemeral
 * containers may not be removed or restarted.
 */
class EphemeralContainer
{
    /** @var string[]|null */
    #[Kubernetes\Attribute('args')]
    protected array|null $args = null;

    /** @var string[]|null */
    #[Kubernetes\Attribute('command')]
    protected array|null $command = null;

    /** @var iterable|EnvVar[]|null */
    #[Kubernetes\Attribute('env', type: AttributeType::Collection, model: EnvVar::class)]
    protected $env = null;

    /** @var iterable|EnvFromSource[]|null */
    #[Kubernetes\Attribute('envFrom', type: AttributeType::Collection, model: EnvFromSource::class)]
    protected $envFrom = null;

    #[Kubernetes\Attribute('image')]
    protected string|null $image = null;

    #[Kubernetes\Attribute('imagePullPolicy')]
    protected string|null $imagePullPolicy = null;

    #[Kubernetes\Attribute('lifecycle', type: AttributeType::Model, model: Lifecycle::class)]
    protected Lifecycle|null $lifecycle = null;

    #[Kubernetes\Attribute('livenessProbe', type: AttributeType::Model, model: Probe::class)]
    protected Probe|null $livenessProbe = null;

    #[Kubernetes\Attribute('name', required: true)]
    protected string $name;

    /** @var iterable|ContainerPort[]|null */
    #[Kubernetes\Attribute('ports', type: AttributeType::Collection, model: ContainerPort::class)]
    protected $ports = null;

    #[Kubernetes\Attribute('readinessProbe', type: AttributeType::Model, model: Probe::class)]
    protected Probe|null $readinessProbe = null;

    /** @var iterable|ContainerResizePolicy[]|null */
    #[Kubernetes\Attribute('resizePolicy', type: AttributeType::Collection, model: ContainerResizePolicy::class)]
    protected $resizePolicy = null;

    #[Kubernetes\Attribute('resources', type: AttributeType::Model, model: ResourceRequirements::class)]
    protected ResourceRequirements|null $resources = null;

    #[Kubernetes\Attribute('restartPolicy')]
    protected string|null $restartPolicy = null;

    #[Kubernetes\Attribute('securityContext', type: AttributeType::Model, model: SecurityContext::class)]
    protected SecurityContext|null $securityContext = null;

    #[Kubernetes\Attribute('startupProbe', type: AttributeType::Model, model: Probe::class)]
    protected Probe|null $startupProbe = null;

    #[Kubernetes\Attribute('stdin')]
    protected bool|null $stdin = null;

    #[Kubernetes\Attribute('stdinOnce')]
    protected bool|null $stdinOnce = null;

    #[Kubernetes\Attribute('targetContainerName')]
    protected string|null $targetContainerName = null;

    #[Kubernetes\Attribute('terminationMessagePath')]
    protected string|null $terminationMessagePath = null;

    #[Kubernetes\Attribute('terminationMessagePolicy')]
    protected string|null $terminationMessagePolicy = null;

    #[Kubernetes\Attribute('tty')]
    protected bool|null $tty = null;

    /** @var iterable|VolumeDevice[]|null */
    #[Kubernetes\Attribute('volumeDevices', type: AttributeType::Collection, model: VolumeDevice::class)]
    protected $volumeDevices = null;

    /** @var iterable|VolumeMount[]|null */
    #[Kubernetes\Attribute('volumeMounts', type: AttributeType::Collection, model: VolumeMount::class)]
    protected $volumeMounts = null;

    #[Kubernetes\Attribute('workingDir')]
    protected string|null $workingDir = null;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * Arguments to the entrypoint. The image's CMD is used if this is not provided. Variable references
     * $(VAR_NAME) are expanded using the container's environment. If a variable cannot be resolved, the
     * reference in the input string will be unchanged. Double $$ are reduced to a single $, which allows
     * for escaping the $(VAR_NAME) syntax: i.e. "$$(VAR_NAME)" will produce the string literal
     * "$(VAR_NAME)". Escaped references will never be expanded, regardless of whether the variable exists
     * or not. Cannot be updated. More info:
     * https://kubernetes.io/docs/tasks/inject-data-application/define-command-argument-container/#running-a-command-in-a-shell
     */
    public function getArgs(): array|null
    {
        return $this->args;
    }

    /**
     * Arguments to the entrypoint. The image's CMD is used if this is not provided. Variable references
     * $(VAR_NAME) are expanded using the container's environment. If a variable cannot be resolved, the
     * reference in the input string will be unchanged. Double $$ are reduced to a single $, which allows
     * for escaping the $(VAR_NAME) syntax: i.e. "$$(VAR_NAME)" will produce the string literal
     * "$(VAR_NAME)". Escaped references will never be expanded, regardless of whether the variable exists
     * or not. Cannot be updated. More info:
     * https://kubernetes.io/docs/tasks/inject-data-application/define-command-argument-container/#running-a-command-in-a-shell
     *
     * @return static
     */
    public function setArgs(array $args): static
    {
        $this->args = $args;

        return $this;
    }

    /**
     * Entrypoint array. Not executed within a shell. The image's ENTRYPOINT is used if this is not
     * provided. Variable references $(VAR_NAME) are expanded using the container's environment. If a
     * variable cannot be resolved, the reference in the input string will be unchanged. Double $$ are
     * reduced to a single $, which allows for escaping the $(VAR_NAME) syntax: i.e. "$$(VAR_NAME)" will
     * produce the string literal "$(VAR_NAME)". Escaped references will never be expanded, regardless of
     * whether the variable exists or not. Cannot be updated. More info:
     * https://kubernetes.io/docs/tasks/inject-data-application/define-command-argument-container/#running-a-command-in-a-shell
     */
    public function getCommand(): array|null
    {
        return $this->command;
    }

    /**
     * Entrypoint array. Not executed within a shell. The image's ENTRYPOINT is used if this is not
     * provided. Variable references $(VAR_NAME) are expanded using the container's environment. If a
     * variable cannot be resolved, the reference in the input string will be unchanged. Double $$ are
     * reduced to a single $, which allows for escaping the $(VAR_NAME) syntax: i.e. "$$(VAR_NAME)" will
     * produce the string literal "$(VAR_NAME)". Escaped references will never be expanded, regardless of
     * whether the variable exists or not. Cannot be updated. More info:
     * https://kubernetes.io/docs/tasks/inject-data-application/define-command-argument-container/#running-a-command-in-a-shell
     *
     * @return static
     */
    public function setCommand(array $command): static
    {
        $this->command = $command;

        return $this;
    }

    /**
     * List of environment variables to set in the container. Cannot be updated.
     *
     * @return iterable|EnvVar[]
     */
    public function getEnv(): iterable|null
    {
        return $this->env;
    }

    /**
     * List of environment variables to set in the container. Cannot be updated.
     *
     * @return static
     */
    public function setEnv(iterable $env): static
    {
        $this->env = $env;

        return $this;
    }

    /** @return static */
    public function addEnv(EnvVar $env): static
    {
        if (! $this->env) {
            $this->env = new Collection();
        }

        $this->env[] = $env;

        return $this;
    }

    /**
     * List of sources to populate environment variables in the container. The keys defined within a source
     * must be a C_IDENTIFIER. All invalid keys will be reported as an event when the container is
     * starting. When a key exists in multiple sources, the value associated with the last source will take
     * precedence. Values defined by an Env with a duplicate key will take precedence. Cannot be updated.
     *
     * @return iterable|EnvFromSource[]
     */
    public function getEnvFrom(): iterable|null
    {
        return $this->envFrom;
    }

    /**
     * List of sources to populate environment variables in the container. The keys defined within a source
     * must be a C_IDENTIFIER. All invalid keys will be reported as an event when the container is
     * starting. When a key exists in multiple sources, the value associated with the last source will take
     * precedence. Values defined by an Env with a duplicate key will take precedence. Cannot be updated.
     *
     * @return static
     */
    public function setEnvFrom(iterable $envFrom): static
    {
        $this->envFrom = $envFrom;

        return $this;
    }

    /** @return static */
    public function addEnvFrom(EnvFromSource $envFrom): static
    {
        if (! $this->envFrom) {
            $this->envFrom = new Collection();
        }

        $this->envFrom[] = $envFrom;

        return $this;
    }

    /**
     * Container image name. More info: https://kubernetes.io/docs/concepts/containers/images
     */
    public function getImage(): string|null
    {
        return $this->image;
    }

    /**
     * Container image name. More info: https://kubernetes.io/docs/concepts/containers/images
     *
     * @return static
     */
    public function setImage(string $image): static
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Image pull policy. One of Always, Never, IfNotPresent. Defaults to Always if :latest tag is
     * specified, or IfNotPresent otherwise. Cannot be updated. More info:
     * https://kubernetes.io/docs/concepts/containers/images#updating-images
     */
    public function getImagePullPolicy(): string|null
    {
        return $this->imagePullPolicy;
    }

    /**
     * Image pull policy. One of Always, Never, IfNotPresent. Defaults to Always if :latest tag is
     * specified, or IfNotPresent otherwise. Cannot be updated. More info:
     * https://kubernetes.io/docs/concepts/containers/images#updating-images
     *
     * @return static
     */
    public function setImagePullPolicy(string $imagePullPolicy): static
    {
        $this->imagePullPolicy = $imagePullPolicy;

        return $this;
    }

    /**
     * Lifecycle is not allowed for ephemeral containers.
     */
    public function getLifecycle(): Lifecycle|null
    {
        return $this->lifecycle;
    }

    /**
     * Lifecycle is not allowed for ephemeral containers.
     *
     * @return static
     */
    public function setLifecycle(Lifecycle $lifecycle): static
    {
        $this->lifecycle = $lifecycle;

        return $this;
    }

    /**
     * Probes are not allowed for ephemeral containers.
     */
    public function getLivenessProbe(): Probe|null
    {
        return $this->livenessProbe;
    }

    /**
     * Probes are not allowed for ephemeral containers.
     *
     * @return static
     */
    public function setLivenessProbe(Probe $livenessProbe): static
    {
        $this->livenessProbe = $livenessProbe;

        return $this;
    }

    /**
     * Name of the ephemeral container specified as a DNS_LABEL. This name must be unique among all
     * containers, init containers and ephemeral containers.
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Name of the ephemeral container specified as a DNS_LABEL. This name must be unique among all
     * containers, init containers and ephemeral containers.
     *
     * @return static
     */
    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Ports are not allowed for ephemeral containers.
     *
     * @return iterable|ContainerPort[]
     */
    public function getPorts(): iterable|null
    {
        return $this->ports;
    }

    /**
     * Ports are not allowed for ephemeral containers.
     *
     * @return static
     */
    public function setPorts(iterable $ports): static
    {
        $this->ports = $ports;

        return $this;
    }

    /** @return static */
    public function addPorts(ContainerPort $port): static
    {
        if (! $this->ports) {
            $this->ports = new Collection();
        }

        $this->ports[] = $port;

        return $this;
    }

    /**
     * Probes are not allowed for ephemeral containers.
     */
    public function getReadinessProbe(): Probe|null
    {
        return $this->readinessProbe;
    }

    /**
     * Probes are not allowed for ephemeral containers.
     *
     * @return static
     */
    public function setReadinessProbe(Probe $readinessProbe): static
    {
        $this->readinessProbe = $readinessProbe;

        return $this;
    }

    /**
     * Resources resize policy for the container.
     *
     * @return iterable|ContainerResizePolicy[]
     */
    public function getResizePolicy(): iterable|null
    {
        return $this->resizePolicy;
    }

    /**
     * Resources resize policy for the container.
     *
     * @return static
     */
    public function setResizePolicy(iterable $resizePolicy): static
    {
        $this->resizePolicy = $resizePolicy;

        return $this;
    }

    /** @return static */
    public function addResizePolicy(ContainerResizePolicy $resizePolicy): static
    {
        if (! $this->resizePolicy) {
            $this->resizePolicy = new Collection();
        }

        $this->resizePolicy[] = $resizePolicy;

        return $this;
    }

    /**
     * Resources are not allowed for ephemeral containers. Ephemeral containers use spare resources already
     * allocated to the pod.
     */
    public function getResources(): ResourceRequirements|null
    {
        return $this->resources;
    }

    /**
     * Resources are not allowed for ephemeral containers. Ephemeral containers use spare resources already
     * allocated to the pod.
     *
     * @return static
     */
    public function setResources(ResourceRequirements $resources): static
    {
        $this->resources = $resources;

        return $this;
    }

    /**
     * Restart policy for the container to manage the restart behavior of each container within a pod. This
     * may only be set for init containers. You cannot set this field on ephemeral containers.
     */
    public function getRestartPolicy(): string|null
    {
        return $this->restartPolicy;
    }

    /**
     * Restart policy for the container to manage the restart behavior of each container within a pod. This
     * may only be set for init containers. You cannot set this field on ephemeral containers.
     *
     * @return static
     */
    public function setRestartPolicy(string $restartPolicy): static
    {
        $this->restartPolicy = $restartPolicy;

        return $this;
    }

    /**
     * Optional: SecurityContext defines the security options the ephemeral container should be run with.
     * If set, the fields of SecurityContext override the equivalent fields of PodSecurityContext.
     */
    public function getSecurityContext(): SecurityContext|null
    {
        return $this->securityContext;
    }

    /**
     * Optional: SecurityContext defines the security options the ephemeral container should be run with.
     * If set, the fields of SecurityContext override the equivalent fields of PodSecurityContext.
     *
     * @return static
     */
    public function setSecurityContext(SecurityContext $securityContext): static
    {
        $this->securityContext = $securityContext;

        return $this;
    }

    /**
     * Probes are not allowed for ephemeral containers.
     */
    public function getStartupProbe(): Probe|null
    {
        return $this->startupProbe;
    }

    /**
     * Probes are not allowed for ephemeral containers.
     *
     * @return static
     */
    public function setStartupProbe(Probe $startupProbe): static
    {
        $this->startupProbe = $startupProbe;

        return $this;
    }

    /**
     * Whether this container should allocate a buffer for stdin in the container runtime. If this is not
     * set, reads from stdin in the container will always result in EOF. Default is false.
     */
    public function isStdin(): bool|null
    {
        return $this->stdin;
    }

    /**
     * Whether this container should allocate a buffer for stdin in the container runtime. If this is not
     * set, reads from stdin in the container will always result in EOF. Default is false.
     *
     * @return static
     */
    public function setIsStdin(bool $stdin): static
    {
        $this->stdin = $stdin;

        return $this;
    }

    /**
     * Whether the container runtime should close the stdin channel after it has been opened by a single
     * attach. When stdin is true the stdin stream will remain open across multiple attach sessions. If
     * stdinOnce is set to true, stdin is opened on container start, is empty until the first client
     * attaches to stdin, and then remains open and accepts data until the client disconnects, at which
     * time stdin is closed and remains closed until the container is restarted. If this flag is false, a
     * container processes that reads from stdin will never receive an EOF. Default is false
     */
    public function isStdinOnce(): bool|null
    {
        return $this->stdinOnce;
    }

    /**
     * Whether the container runtime should close the stdin channel after it has been opened by a single
     * attach. When stdin is true the stdin stream will remain open across multiple attach sessions. If
     * stdinOnce is set to true, stdin is opened on container start, is empty until the first client
     * attaches to stdin, and then remains open and accepts data until the client disconnects, at which
     * time stdin is closed and remains closed until the container is restarted. If this flag is false, a
     * container processes that reads from stdin will never receive an EOF. Default is false
     *
     * @return static
     */
    public function setIsStdinOnce(bool $stdinOnce): static
    {
        $this->stdinOnce = $stdinOnce;

        return $this;
    }

    /**
     * If set, the name of the container from PodSpec that this ephemeral container targets. The ephemeral
     * container will be run in the namespaces (IPC, PID, etc) of this container. If not set then the
     * ephemeral container uses the namespaces configured in the Pod spec.
     *
     * The container runtime must implement support for this feature. If the runtime does not support
     * namespace targeting then the result of setting this field is undefined.
     */
    public function getTargetContainerName(): string|null
    {
        return $this->targetContainerName;
    }

    /**
     * If set, the name of the container from PodSpec that this ephemeral container targets. The ephemeral
     * container will be run in the namespaces (IPC, PID, etc) of this container. If not set then the
     * ephemeral container uses the namespaces configured in the Pod spec.
     *
     * The container runtime must implement support for this feature. If the runtime does not support
     * namespace targeting then the result of setting this field is undefined.
     *
     * @return static
     */
    public function setTargetContainerName(string $targetContainerName): static
    {
        $this->targetContainerName = $targetContainerName;

        return $this;
    }

    /**
     * Optional: Path at which the file to which the container's termination message will be written is
     * mounted into the container's filesystem. Message written is intended to be brief final status, such
     * as an assertion failure message. Will be truncated by the node if greater than 4096 bytes. The total
     * message length across all containers will be limited to 12kb. Defaults to /dev/termination-log.
     * Cannot be updated.
     */
    public function getTerminationMessagePath(): string|null
    {
        return $this->terminationMessagePath;
    }

    /**
     * Optional: Path at which the file to which the container's termination message will be written is
     * mounted into the container's filesystem. Message written is intended to be brief final status, such
     * as an assertion failure message. Will be truncated by the node if greater than 4096 bytes. The total
     * message length across all containers will be limited to 12kb. Defaults to /dev/termination-log.
     * Cannot be updated.
     *
     * @return static
     */
    public function setTerminationMessagePath(string $terminationMessagePath): static
    {
        $this->terminationMessagePath = $terminationMessagePath;

        return $this;
    }

    /**
     * Indicate how the termination message should be populated. File will use the contents of
     * terminationMessagePath to populate the container status message on both success and failure.
     * FallbackToLogsOnError will use the last chunk of container log output if the termination message
     * file is empty and the container exited with an error. The log output is limited to 2048 bytes or 80
     * lines, whichever is smaller. Defaults to File. Cannot be updated.
     */
    public function getTerminationMessagePolicy(): string|null
    {
        return $this->terminationMessagePolicy;
    }

    /**
     * Indicate how the termination message should be populated. File will use the contents of
     * terminationMessagePath to populate the container status message on both success and failure.
     * FallbackToLogsOnError will use the last chunk of container log output if the termination message
     * file is empty and the container exited with an error. The log output is limited to 2048 bytes or 80
     * lines, whichever is smaller. Defaults to File. Cannot be updated.
     *
     * @return static
     */
    public function setTerminationMessagePolicy(string $terminationMessagePolicy): static
    {
        $this->terminationMessagePolicy = $terminationMessagePolicy;

        return $this;
    }

    /**
     * Whether this container should allocate a TTY for itself, also requires 'stdin' to be true. Default
     * is false.
     */
    public function isTty(): bool|null
    {
        return $this->tty;
    }

    /**
     * Whether this container should allocate a TTY for itself, also requires 'stdin' to be true. Default
     * is false.
     *
     * @return static
     */
    public function setIsTty(bool $tty): static
    {
        $this->tty = $tty;

        return $this;
    }

    /**
     * volumeDevices is the list of block devices to be used by the container.
     *
     * @return iterable|VolumeDevice[]
     */
    public function getVolumeDevices(): iterable|null
    {
        return $this->volumeDevices;
    }

    /**
     * volumeDevices is the list of block devices to be used by the container.
     *
     * @return static
     */
    public function setVolumeDevices(iterable $volumeDevices): static
    {
        $this->volumeDevices = $volumeDevices;

        return $this;
    }

    /** @return static */
    public function addVolumeDevices(VolumeDevice $volumeDevice): static
    {
        if (! $this->volumeDevices) {
            $this->volumeDevices = new Collection();
        }

        $this->volumeDevices[] = $volumeDevice;

        return $this;
    }

    /**
     * Pod volumes to mount into the container's filesystem. Subpath mounts are not allowed for ephemeral
     * containers. Cannot be updated.
     *
     * @return iterable|VolumeMount[]
     */
    public function getVolumeMounts(): iterable|null
    {
        return $this->volumeMounts;
    }

    /**
     * Pod volumes to mount into the container's filesystem. Subpath mounts are not allowed for ephemeral
     * containers. Cannot be updated.
     *
     * @return static
     */
    public function setVolumeMounts(iterable $volumeMounts): static
    {
        $this->volumeMounts = $volumeMounts;

        return $this;
    }

    /** @return static */
    public function addVolumeMounts(VolumeMount $volumeMount): static
    {
        if (! $this->volumeMounts) {
            $this->volumeMounts = new Collection();
        }

        $this->volumeMounts[] = $volumeMount;

        return $this;
    }

    /**
     * Container's working directory. If not specified, the container runtime's default will be used, which
     * might be configured in the container image. Cannot be updated.
     */
    public function getWorkingDir(): string|null
    {
        return $this->workingDir;
    }

    /**
     * Container's working directory. If not specified, the container runtime's default will be used, which
     * might be configured in the container image. Cannot be updated.
     *
     * @return static
     */
    public function setWorkingDir(string $workingDir): static
    {
        $this->workingDir = $workingDir;

        return $this;
    }
}
