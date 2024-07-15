<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Core\v1;

use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;
use Kcs\K8s\Collection;

/**
 * A single application container that you want to run within a pod.
 */
class Container
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

    public function __construct(string $name, string|null $image = null)
    {
        $this->name = $name;
        $this->image = $image;
    }

    /**
     * Arguments to the entrypoint. The container image's CMD is used if this is not provided. Variable
     * references $(VAR_NAME) are expanded using the container's environment. If a variable cannot be
     * resolved, the reference in the input string will be unchanged. Double $$ are reduced to a single $,
     * which allows for escaping the $(VAR_NAME) syntax: i.e. "$$(VAR_NAME)" will produce the string
     * literal "$(VAR_NAME)". Escaped references will never be expanded, regardless of whether the variable
     * exists or not. Cannot be updated. More info:
     * https://kubernetes.io/docs/tasks/inject-data-application/define-command-argument-container/#running-a-command-in-a-shell
     */
    public function getArgs(): array|null
    {
        return $this->args;
    }

    /**
     * Arguments to the entrypoint. The container image's CMD is used if this is not provided. Variable
     * references $(VAR_NAME) are expanded using the container's environment. If a variable cannot be
     * resolved, the reference in the input string will be unchanged. Double $$ are reduced to a single $,
     * which allows for escaping the $(VAR_NAME) syntax: i.e. "$$(VAR_NAME)" will produce the string
     * literal "$(VAR_NAME)". Escaped references will never be expanded, regardless of whether the variable
     * exists or not. Cannot be updated. More info:
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
     * Entrypoint array. Not executed within a shell. The container image's ENTRYPOINT is used if this is
     * not provided. Variable references $(VAR_NAME) are expanded using the container's environment. If a
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
     * Entrypoint array. Not executed within a shell. The container image's ENTRYPOINT is used if this is
     * not provided. Variable references $(VAR_NAME) are expanded using the container's environment. If a
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
     * Container image name. More info: https://kubernetes.io/docs/concepts/containers/images This field is
     * optional to allow higher level config management to default or override container images in workload
     * controllers like Deployments and StatefulSets.
     */
    public function getImage(): string|null
    {
        return $this->image;
    }

    /**
     * Container image name. More info: https://kubernetes.io/docs/concepts/containers/images This field is
     * optional to allow higher level config management to default or override container images in workload
     * controllers like Deployments and StatefulSets.
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
     * Actions that the management system should take in response to container lifecycle events. Cannot be
     * updated.
     */
    public function getLifecycle(): Lifecycle|null
    {
        return $this->lifecycle;
    }

    /**
     * Actions that the management system should take in response to container lifecycle events. Cannot be
     * updated.
     *
     * @return static
     */
    public function setLifecycle(Lifecycle $lifecycle): static
    {
        $this->lifecycle = $lifecycle;

        return $this;
    }

    /**
     * Periodic probe of container liveness. Container will be restarted if the probe fails. Cannot be
     * updated. More info:
     * https://kubernetes.io/docs/concepts/workloads/pods/pod-lifecycle#container-probes
     */
    public function getLivenessProbe(): Probe|null
    {
        return $this->livenessProbe;
    }

    /**
     * Periodic probe of container liveness. Container will be restarted if the probe fails. Cannot be
     * updated. More info:
     * https://kubernetes.io/docs/concepts/workloads/pods/pod-lifecycle#container-probes
     *
     * @return static
     */
    public function setLivenessProbe(Probe $livenessProbe): static
    {
        $this->livenessProbe = $livenessProbe;

        return $this;
    }

    /**
     * Name of the container specified as a DNS_LABEL. Each container in a pod must have a unique name
     * (DNS_LABEL). Cannot be updated.
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Name of the container specified as a DNS_LABEL. Each container in a pod must have a unique name
     * (DNS_LABEL). Cannot be updated.
     *
     * @return static
     */
    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    /**
     * List of ports to expose from the container. Not specifying a port here DOES NOT prevent that port
     * from being exposed. Any port which is listening on the default "0.0.0.0" address inside a container
     * will be accessible from the network. Modifying this array with strategic merge patch may corrupt the
     * data. For more information See https://github.com/kubernetes/kubernetes/issues/108255. Cannot be
     * updated.
     *
     * @return iterable|ContainerPort[]
     */
    public function getPorts(): iterable|null
    {
        return $this->ports;
    }

    /**
     * List of ports to expose from the container. Not specifying a port here DOES NOT prevent that port
     * from being exposed. Any port which is listening on the default "0.0.0.0" address inside a container
     * will be accessible from the network. Modifying this array with strategic merge patch may corrupt the
     * data. For more information See https://github.com/kubernetes/kubernetes/issues/108255. Cannot be
     * updated.
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
     * Periodic probe of container service readiness. Container will be removed from service endpoints if
     * the probe fails. Cannot be updated. More info:
     * https://kubernetes.io/docs/concepts/workloads/pods/pod-lifecycle#container-probes
     */
    public function getReadinessProbe(): Probe|null
    {
        return $this->readinessProbe;
    }

    /**
     * Periodic probe of container service readiness. Container will be removed from service endpoints if
     * the probe fails. Cannot be updated. More info:
     * https://kubernetes.io/docs/concepts/workloads/pods/pod-lifecycle#container-probes
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
     * Compute Resources required by this container. Cannot be updated. More info:
     * https://kubernetes.io/docs/concepts/configuration/manage-resources-containers/
     */
    public function getResources(): ResourceRequirements|null
    {
        return $this->resources;
    }

    /**
     * Compute Resources required by this container. Cannot be updated. More info:
     * https://kubernetes.io/docs/concepts/configuration/manage-resources-containers/
     *
     * @return static
     */
    public function setResources(ResourceRequirements $resources): static
    {
        $this->resources = $resources;

        return $this;
    }

    /**
     * RestartPolicy defines the restart behavior of individual containers in a pod. This field may only be
     * set for init containers, and the only allowed value is "Always". For non-init containers or when
     * this field is not specified, the restart behavior is defined by the Pod's restart policy and the
     * container type. Setting the RestartPolicy as "Always" for the init container will have the following
     * effect: this init container will be continually restarted on exit until all regular containers have
     * terminated. Once all regular containers have completed, all init containers with restartPolicy
     * "Always" will be shut down. This lifecycle differs from normal init containers and is often referred
     * to as a "sidecar" container. Although this init container still starts in the init container
     * sequence, it does not wait for the container to complete before proceeding to the next init
     * container. Instead, the next init container starts immediately after this init container is started,
     * or after any startupProbe has successfully completed.
     */
    public function getRestartPolicy(): string|null
    {
        return $this->restartPolicy;
    }

    /**
     * RestartPolicy defines the restart behavior of individual containers in a pod. This field may only be
     * set for init containers, and the only allowed value is "Always". For non-init containers or when
     * this field is not specified, the restart behavior is defined by the Pod's restart policy and the
     * container type. Setting the RestartPolicy as "Always" for the init container will have the following
     * effect: this init container will be continually restarted on exit until all regular containers have
     * terminated. Once all regular containers have completed, all init containers with restartPolicy
     * "Always" will be shut down. This lifecycle differs from normal init containers and is often referred
     * to as a "sidecar" container. Although this init container still starts in the init container
     * sequence, it does not wait for the container to complete before proceeding to the next init
     * container. Instead, the next init container starts immediately after this init container is started,
     * or after any startupProbe has successfully completed.
     *
     * @return static
     */
    public function setRestartPolicy(string $restartPolicy): static
    {
        $this->restartPolicy = $restartPolicy;

        return $this;
    }

    /**
     * SecurityContext defines the security options the container should be run with. If set, the fields of
     * SecurityContext override the equivalent fields of PodSecurityContext. More info:
     * https://kubernetes.io/docs/tasks/configure-pod-container/security-context/
     */
    public function getSecurityContext(): SecurityContext|null
    {
        return $this->securityContext;
    }

    /**
     * SecurityContext defines the security options the container should be run with. If set, the fields of
     * SecurityContext override the equivalent fields of PodSecurityContext. More info:
     * https://kubernetes.io/docs/tasks/configure-pod-container/security-context/
     *
     * @return static
     */
    public function setSecurityContext(SecurityContext $securityContext): static
    {
        $this->securityContext = $securityContext;

        return $this;
    }

    /**
     * StartupProbe indicates that the Pod has successfully initialized. If specified, no other probes are
     * executed until this completes successfully. If this probe fails, the Pod will be restarted, just as
     * if the livenessProbe failed. This can be used to provide different probe parameters at the beginning
     * of a Pod's lifecycle, when it might take a long time to load data or warm a cache, than during
     * steady-state operation. This cannot be updated. More info:
     * https://kubernetes.io/docs/concepts/workloads/pods/pod-lifecycle#container-probes
     */
    public function getStartupProbe(): Probe|null
    {
        return $this->startupProbe;
    }

    /**
     * StartupProbe indicates that the Pod has successfully initialized. If specified, no other probes are
     * executed until this completes successfully. If this probe fails, the Pod will be restarted, just as
     * if the livenessProbe failed. This can be used to provide different probe parameters at the beginning
     * of a Pod's lifecycle, when it might take a long time to load data or warm a cache, than during
     * steady-state operation. This cannot be updated. More info:
     * https://kubernetes.io/docs/concepts/workloads/pods/pod-lifecycle#container-probes
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
     * Pod volumes to mount into the container's filesystem. Cannot be updated.
     *
     * @return iterable|VolumeMount[]
     */
    public function getVolumeMounts(): iterable|null
    {
        return $this->volumeMounts;
    }

    /**
     * Pod volumes to mount into the container's filesystem. Cannot be updated.
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
