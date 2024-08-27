<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Core\v1;

use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;
use Kcs\K8s\Collection;

/**
 * PodSpec is a description of a pod.
 */
class PodSpec
{
    #[Kubernetes\Attribute('activeDeadlineSeconds')]
    protected int|null $activeDeadlineSeconds = null;

    #[Kubernetes\Attribute('affinity', type: AttributeType::Model, model: Affinity::class)]
    protected Affinity|null $affinity = null;

    #[Kubernetes\Attribute('automountServiceAccountToken')]
    protected bool|null $automountServiceAccountToken = null;

    /** @var iterable|Container[] */
    #[Kubernetes\Attribute('containers', type: AttributeType::Collection, model: Container::class, required: true)]
    protected iterable $containers;

    #[Kubernetes\Attribute('dnsConfig', type: AttributeType::Model, model: PodDNSConfig::class)]
    protected PodDNSConfig|null $dnsConfig = null;

    #[Kubernetes\Attribute('dnsPolicy')]
    protected string|null $dnsPolicy = null;

    #[Kubernetes\Attribute('enableServiceLinks')]
    protected bool|null $enableServiceLinks = null;

    /** @var iterable|EphemeralContainer[]|null */
    #[Kubernetes\Attribute('ephemeralContainers', type: AttributeType::Collection, model: EphemeralContainer::class)]
    protected $ephemeralContainers = null;

    /** @var iterable|HostAlias[]|null */
    #[Kubernetes\Attribute('hostAliases', type: AttributeType::Collection, model: HostAlias::class)]
    protected $hostAliases = null;

    #[Kubernetes\Attribute('hostIPC')]
    protected bool|null $hostIPC = null;

    #[Kubernetes\Attribute('hostNetwork')]
    protected bool|null $hostNetwork = null;

    #[Kubernetes\Attribute('hostPID')]
    protected bool|null $hostPID = null;

    #[Kubernetes\Attribute('hostUsers')]
    protected bool|null $hostUsers = null;

    #[Kubernetes\Attribute('hostname')]
    protected string|null $hostname = null;

    /** @var iterable|LocalObjectReference[]|null */
    #[Kubernetes\Attribute('imagePullSecrets', type: AttributeType::Collection, model: LocalObjectReference::class)]
    protected $imagePullSecrets = null;

    /** @var iterable|Container[]|null */
    #[Kubernetes\Attribute('initContainers', type: AttributeType::Collection, model: Container::class)]
    protected $initContainers = null;

    #[Kubernetes\Attribute('nodeName')]
    protected string|null $nodeName = null;

    /** @var string[]|null */
    #[Kubernetes\Attribute('nodeSelector')]
    protected array|null $nodeSelector = null;

    #[Kubernetes\Attribute('os', type: AttributeType::Model, model: PodOS::class)]
    protected PodOS|null $os = null;

    /** @var object[]|null */
    #[Kubernetes\Attribute('overhead')]
    protected array|null $overhead = null;

    #[Kubernetes\Attribute('preemptionPolicy')]
    protected string|null $preemptionPolicy = null;

    #[Kubernetes\Attribute('priority')]
    protected int|null $priority = null;

    #[Kubernetes\Attribute('priorityClassName')]
    protected string|null $priorityClassName = null;

    /** @var iterable|PodReadinessGate[]|null */
    #[Kubernetes\Attribute('readinessGates', type: AttributeType::Collection, model: PodReadinessGate::class)]
    protected $readinessGates = null;

    /** @var iterable|PodResourceClaim[]|null */
    #[Kubernetes\Attribute('resourceClaims', type: AttributeType::Collection, model: PodResourceClaim::class)]
    protected $resourceClaims = null;

    #[Kubernetes\Attribute('restartPolicy')]
    protected string|null $restartPolicy = null;

    #[Kubernetes\Attribute('runtimeClassName')]
    protected string|null $runtimeClassName = null;

    #[Kubernetes\Attribute('schedulerName')]
    protected string|null $schedulerName = null;

    /** @var iterable|PodSchedulingGate[]|null */
    #[Kubernetes\Attribute('schedulingGates', type: AttributeType::Collection, model: PodSchedulingGate::class)]
    protected $schedulingGates = null;

    #[Kubernetes\Attribute('securityContext', type: AttributeType::Model, model: PodSecurityContext::class)]
    protected PodSecurityContext|null $securityContext = null;

    #[Kubernetes\Attribute('serviceAccount')]
    protected string|null $serviceAccount = null;

    #[Kubernetes\Attribute('serviceAccountName')]
    protected string|null $serviceAccountName = null;

    #[Kubernetes\Attribute('setHostnameAsFQDN')]
    protected bool|null $setHostnameAsFQDN = null;

    #[Kubernetes\Attribute('shareProcessNamespace')]
    protected bool|null $shareProcessNamespace = null;

    #[Kubernetes\Attribute('subdomain')]
    protected string|null $subdomain = null;

    #[Kubernetes\Attribute('terminationGracePeriodSeconds')]
    protected int|null $terminationGracePeriodSeconds = null;

    /** @var iterable|Toleration[]|null */
    #[Kubernetes\Attribute('tolerations', type: AttributeType::Collection, model: Toleration::class)]
    protected $tolerations = null;

    /** @var iterable|TopologySpreadConstraint[]|null */
    #[Kubernetes\Attribute('topologySpreadConstraints', type: AttributeType::Collection, model: TopologySpreadConstraint::class)]
    protected $topologySpreadConstraints = null;

    /** @var iterable|Volume[]|null */
    #[Kubernetes\Attribute('volumes', type: AttributeType::Collection, model: Volume::class)]
    protected $volumes = null;

    /** @param iterable|Container[] $containers */
    public function __construct(iterable $containers)
    {
        $this->containers = new Collection($containers);
    }

    /**
     * Optional duration in seconds the pod may be active on the node relative to StartTime before the
     * system will actively try to mark it failed and kill associated containers. Value must be a positive
     * integer.
     */
    public function getActiveDeadlineSeconds(): int|null
    {
        return $this->activeDeadlineSeconds;
    }

    /**
     * Optional duration in seconds the pod may be active on the node relative to StartTime before the
     * system will actively try to mark it failed and kill associated containers. Value must be a positive
     * integer.
     *
     * @return static
     */
    public function setActiveDeadlineSeconds(int $activeDeadlineSeconds): static
    {
        $this->activeDeadlineSeconds = $activeDeadlineSeconds;

        return $this;
    }

    /**
     * If specified, the pod's scheduling constraints
     */
    public function getAffinity(): Affinity|null
    {
        return $this->affinity;
    }

    /**
     * If specified, the pod's scheduling constraints
     *
     * @return static
     */
    public function setAffinity(Affinity $affinity): static
    {
        $this->affinity = $affinity;

        return $this;
    }

    /**
     * AutomountServiceAccountToken indicates whether a service account token should be automatically
     * mounted.
     */
    public function isAutomountServiceAccountToken(): bool|null
    {
        return $this->automountServiceAccountToken;
    }

    /**
     * AutomountServiceAccountToken indicates whether a service account token should be automatically
     * mounted.
     *
     * @return static
     */
    public function setIsAutomountServiceAccountToken(bool $automountServiceAccountToken): static
    {
        $this->automountServiceAccountToken = $automountServiceAccountToken;

        return $this;
    }

    /**
     * List of containers belonging to the pod. Containers cannot currently be added or removed. There must
     * be at least one container in a Pod. Cannot be updated.
     *
     * @return iterable|Container[]
     */
    public function getContainers(): iterable
    {
        return $this->containers;
    }

    /**
     * List of containers belonging to the pod. Containers cannot currently be added or removed. There must
     * be at least one container in a Pod. Cannot be updated.
     *
     * @return static
     */
    public function setContainers(iterable $containers): static
    {
        $this->containers = $containers;

        return $this;
    }

    /** @return static */
    public function addContainers(Container $container): static
    {
        if (! $this->containers) {
            $this->containers = new Collection();
        }

        $this->containers[] = $container;

        return $this;
    }

    /**
     * Specifies the DNS parameters of a pod. Parameters specified here will be merged to the generated DNS
     * configuration based on DNSPolicy.
     */
    public function getDnsConfig(): PodDNSConfig|null
    {
        return $this->dnsConfig;
    }

    /**
     * Specifies the DNS parameters of a pod. Parameters specified here will be merged to the generated DNS
     * configuration based on DNSPolicy.
     *
     * @return static
     */
    public function setDnsConfig(PodDNSConfig $dnsConfig): static
    {
        $this->dnsConfig = $dnsConfig;

        return $this;
    }

    /**
     * Set DNS policy for the pod. Defaults to "ClusterFirst". Valid values are 'ClusterFirstWithHostNet',
     * 'ClusterFirst', 'Default' or 'None'. DNS parameters given in DNSConfig will be merged with the
     * policy selected with DNSPolicy. To have DNS options set along with hostNetwork, you have to specify
     * DNS policy explicitly to 'ClusterFirstWithHostNet'.
     */
    public function getDnsPolicy(): string|null
    {
        return $this->dnsPolicy;
    }

    /**
     * Set DNS policy for the pod. Defaults to "ClusterFirst". Valid values are 'ClusterFirstWithHostNet',
     * 'ClusterFirst', 'Default' or 'None'. DNS parameters given in DNSConfig will be merged with the
     * policy selected with DNSPolicy. To have DNS options set along with hostNetwork, you have to specify
     * DNS policy explicitly to 'ClusterFirstWithHostNet'.
     *
     * @return static
     */
    public function setDnsPolicy(string $dnsPolicy): static
    {
        $this->dnsPolicy = $dnsPolicy;

        return $this;
    }

    /**
     * EnableServiceLinks indicates whether information about services should be injected into pod's
     * environment variables, matching the syntax of Docker links. Optional: Defaults to true.
     */
    public function isEnableServiceLinks(): bool|null
    {
        return $this->enableServiceLinks;
    }

    /**
     * EnableServiceLinks indicates whether information about services should be injected into pod's
     * environment variables, matching the syntax of Docker links. Optional: Defaults to true.
     *
     * @return static
     */
    public function setIsEnableServiceLinks(bool $enableServiceLinks): static
    {
        $this->enableServiceLinks = $enableServiceLinks;

        return $this;
    }

    /**
     * List of ephemeral containers run in this pod. Ephemeral containers may be run in an existing pod to
     * perform user-initiated actions such as debugging. This list cannot be specified when creating a pod,
     * and it cannot be modified by updating the pod spec. In order to add an ephemeral container to an
     * existing pod, use the pod's ephemeralcontainers subresource.
     *
     * @return iterable|EphemeralContainer[]
     */
    public function getEphemeralContainers(): iterable|null
    {
        return $this->ephemeralContainers;
    }

    /**
     * List of ephemeral containers run in this pod. Ephemeral containers may be run in an existing pod to
     * perform user-initiated actions such as debugging. This list cannot be specified when creating a pod,
     * and it cannot be modified by updating the pod spec. In order to add an ephemeral container to an
     * existing pod, use the pod's ephemeralcontainers subresource.
     *
     * @return static
     */
    public function setEphemeralContainers(iterable $ephemeralContainers): static
    {
        $this->ephemeralContainers = $ephemeralContainers;

        return $this;
    }

    /** @return static */
    public function addEphemeralContainers(EphemeralContainer $ephemeralContainer): static
    {
        if (! $this->ephemeralContainers) {
            $this->ephemeralContainers = new Collection();
        }

        $this->ephemeralContainers[] = $ephemeralContainer;

        return $this;
    }

    /**
     * HostAliases is an optional list of hosts and IPs that will be injected into the pod's hosts file if
     * specified.
     *
     * @return iterable|HostAlias[]
     */
    public function getHostAliases(): iterable|null
    {
        return $this->hostAliases;
    }

    /**
     * HostAliases is an optional list of hosts and IPs that will be injected into the pod's hosts file if
     * specified.
     *
     * @return static
     */
    public function setHostAliases(iterable $hostAliases): static
    {
        $this->hostAliases = $hostAliases;

        return $this;
    }

    /** @return static */
    public function addHostAliases(HostAlias $hostAliase): static
    {
        if (! $this->hostAliases) {
            $this->hostAliases = new Collection();
        }

        $this->hostAliases[] = $hostAliase;

        return $this;
    }

    /**
     * Use the host's ipc namespace. Optional: Default to false.
     */
    public function isHostIPC(): bool|null
    {
        return $this->hostIPC;
    }

    /**
     * Use the host's ipc namespace. Optional: Default to false.
     *
     * @return static
     */
    public function setIsHostIPC(bool $hostIPC): static
    {
        $this->hostIPC = $hostIPC;

        return $this;
    }

    /**
     * Host networking requested for this pod. Use the host's network namespace. If this option is set, the
     * ports that will be used must be specified. Default to false.
     */
    public function isHostNetwork(): bool|null
    {
        return $this->hostNetwork;
    }

    /**
     * Host networking requested for this pod. Use the host's network namespace. If this option is set, the
     * ports that will be used must be specified. Default to false.
     *
     * @return static
     */
    public function setIsHostNetwork(bool $hostNetwork): static
    {
        $this->hostNetwork = $hostNetwork;

        return $this;
    }

    /**
     * Use the host's pid namespace. Optional: Default to false.
     */
    public function isHostPID(): bool|null
    {
        return $this->hostPID;
    }

    /**
     * Use the host's pid namespace. Optional: Default to false.
     *
     * @return static
     */
    public function setIsHostPID(bool $hostPID): static
    {
        $this->hostPID = $hostPID;

        return $this;
    }

    /**
     * Use the host's user namespace. Optional: Default to true. If set to true or not present, the pod
     * will be run in the host user namespace, useful for when the pod needs a feature only available to
     * the host user namespace, such as loading a kernel module with CAP_SYS_MODULE. When set to false, a
     * new userns is created for the pod. Setting false is useful for mitigating container breakout
     * vulnerabilities even allowing users to run their containers as root without actually having root
     * privileges on the host. This field is alpha-level and is only honored by servers that enable the
     * UserNamespacesSupport feature.
     */
    public function isHostUsers(): bool|null
    {
        return $this->hostUsers;
    }

    /**
     * Use the host's user namespace. Optional: Default to true. If set to true or not present, the pod
     * will be run in the host user namespace, useful for when the pod needs a feature only available to
     * the host user namespace, such as loading a kernel module with CAP_SYS_MODULE. When set to false, a
     * new userns is created for the pod. Setting false is useful for mitigating container breakout
     * vulnerabilities even allowing users to run their containers as root without actually having root
     * privileges on the host. This field is alpha-level and is only honored by servers that enable the
     * UserNamespacesSupport feature.
     *
     * @return static
     */
    public function setIsHostUsers(bool $hostUsers): static
    {
        $this->hostUsers = $hostUsers;

        return $this;
    }

    /**
     * Specifies the hostname of the Pod If not specified, the pod's hostname will be set to a
     * system-defined value.
     */
    public function getHostname(): string|null
    {
        return $this->hostname;
    }

    /**
     * Specifies the hostname of the Pod If not specified, the pod's hostname will be set to a
     * system-defined value.
     *
     * @return static
     */
    public function setHostname(string $hostname): static
    {
        $this->hostname = $hostname;

        return $this;
    }

    /**
     * ImagePullSecrets is an optional list of references to secrets in the same namespace to use for
     * pulling any of the images used by this PodSpec. If specified, these secrets will be passed to
     * individual puller implementations for them to use. More info:
     * https://kubernetes.io/docs/concepts/containers/images#specifying-imagepullsecrets-on-a-pod
     *
     * @return iterable|LocalObjectReference[]
     */
    public function getImagePullSecrets(): iterable|null
    {
        return $this->imagePullSecrets;
    }

    /**
     * ImagePullSecrets is an optional list of references to secrets in the same namespace to use for
     * pulling any of the images used by this PodSpec. If specified, these secrets will be passed to
     * individual puller implementations for them to use. More info:
     * https://kubernetes.io/docs/concepts/containers/images#specifying-imagepullsecrets-on-a-pod
     *
     * @return static
     */
    public function setImagePullSecrets(iterable $imagePullSecrets): static
    {
        $this->imagePullSecrets = $imagePullSecrets;

        return $this;
    }

    /** @return static */
    public function addImagePullSecrets(LocalObjectReference $imagePullSecret): static
    {
        if (! $this->imagePullSecrets) {
            $this->imagePullSecrets = new Collection();
        }

        $this->imagePullSecrets[] = $imagePullSecret;

        return $this;
    }

    /**
     * List of initialization containers belonging to the pod. Init containers are executed in order prior
     * to containers being started. If any init container fails, the pod is considered to have failed and
     * is handled according to its restartPolicy. The name for an init container or normal container must
     * be unique among all containers. Init containers may not have Lifecycle actions, Readiness probes,
     * Liveness probes, or Startup probes. The resourceRequirements of an init container are taken into
     * account during scheduling by finding the highest request/limit for each resource type, and then
     * using the max of of that value or the sum of the normal containers. Limits are applied to init
     * containers in a similar fashion. Init containers cannot currently be added or removed. Cannot be
     * updated. More info: https://kubernetes.io/docs/concepts/workloads/pods/init-containers/
     *
     * @return iterable|Container[]
     */
    public function getInitContainers(): iterable|null
    {
        return $this->initContainers;
    }

    /**
     * List of initialization containers belonging to the pod. Init containers are executed in order prior
     * to containers being started. If any init container fails, the pod is considered to have failed and
     * is handled according to its restartPolicy. The name for an init container or normal container must
     * be unique among all containers. Init containers may not have Lifecycle actions, Readiness probes,
     * Liveness probes, or Startup probes. The resourceRequirements of an init container are taken into
     * account during scheduling by finding the highest request/limit for each resource type, and then
     * using the max of of that value or the sum of the normal containers. Limits are applied to init
     * containers in a similar fashion. Init containers cannot currently be added or removed. Cannot be
     * updated. More info: https://kubernetes.io/docs/concepts/workloads/pods/init-containers/
     *
     * @return static
     */
    public function setInitContainers(iterable $initContainers): static
    {
        $this->initContainers = $initContainers;

        return $this;
    }

    /** @return static */
    public function addInitContainers(Container $initContainer): static
    {
        if (! $this->initContainers) {
            $this->initContainers = new Collection();
        }

        $this->initContainers[] = $initContainer;

        return $this;
    }

    /**
     * NodeName indicates in which node this pod is scheduled. If empty, this pod is a candidate for
     * scheduling by the scheduler defined in schedulerName. Once this field is set, the kubelet for this
     * node becomes responsible for the lifecycle of this pod. This field should not be used to express a
     * desire for the pod to be scheduled on a specific node.
     * https://kubernetes.io/docs/concepts/scheduling-eviction/assign-pod-node/#nodename
     */
    public function getNodeName(): string|null
    {
        return $this->nodeName;
    }

    /**
     * NodeName indicates in which node this pod is scheduled. If empty, this pod is a candidate for
     * scheduling by the scheduler defined in schedulerName. Once this field is set, the kubelet for this
     * node becomes responsible for the lifecycle of this pod. This field should not be used to express a
     * desire for the pod to be scheduled on a specific node.
     * https://kubernetes.io/docs/concepts/scheduling-eviction/assign-pod-node/#nodename
     *
     * @return static
     */
    public function setNodeName(string $nodeName): static
    {
        $this->nodeName = $nodeName;

        return $this;
    }

    /**
     * NodeSelector is a selector which must be true for the pod to fit on a node. Selector which must
     * match a node's labels for the pod to be scheduled on that node. More info:
     * https://kubernetes.io/docs/concepts/configuration/assign-pod-node/
     */
    public function getNodeSelector(): array|null
    {
        return $this->nodeSelector;
    }

    /**
     * NodeSelector is a selector which must be true for the pod to fit on a node. Selector which must
     * match a node's labels for the pod to be scheduled on that node. More info:
     * https://kubernetes.io/docs/concepts/configuration/assign-pod-node/
     *
     * @return static
     */
    public function setNodeSelector(array $nodeSelector): static
    {
        $this->nodeSelector = $nodeSelector;

        return $this;
    }

    /**
     * Specifies the OS of the containers in the pod. Some pod and container fields are restricted if this
     * is set.
     *
     * If the OS field is set to linux, the following fields must be unset: -securityContext.windowsOptions
     *
     * If the OS field is set to windows, following fields must be unset: - spec.hostPID - spec.hostIPC -
     * spec.hostUsers - spec.securityContext.appArmorProfile - spec.securityContext.seLinuxOptions -
     * spec.securityContext.seccompProfile - spec.securityContext.fsGroup -
     * spec.securityContext.fsGroupChangePolicy - spec.securityContext.sysctls - spec.shareProcessNamespace
     * - spec.securityContext.runAsUser - spec.securityContext.runAsGroup -
     * spec.securityContext.supplementalGroups - spec.securityContext.supplementalGroupsPolicy -
     * spec.containers[*].securityContext.appArmorProfile -
     * spec.containers[*].securityContext.seLinuxOptions -
     * spec.containers[*].securityContext.seccompProfile - spec.containers[*].securityContext.capabilities
     * - spec.containers[*].securityContext.readOnlyRootFilesystem -
     * spec.containers[*].securityContext.privileged -
     * spec.containers[*].securityContext.allowPrivilegeEscalation -
     * spec.containers[*].securityContext.procMount - spec.containers[*].securityContext.runAsUser -
     * spec.containers[*].securityContext.runAsGroup
     */
    public function getOs(): PodOS|null
    {
        return $this->os;
    }

    /**
     * Specifies the OS of the containers in the pod. Some pod and container fields are restricted if this
     * is set.
     *
     * If the OS field is set to linux, the following fields must be unset: -securityContext.windowsOptions
     *
     * If the OS field is set to windows, following fields must be unset: - spec.hostPID - spec.hostIPC -
     * spec.hostUsers - spec.securityContext.appArmorProfile - spec.securityContext.seLinuxOptions -
     * spec.securityContext.seccompProfile - spec.securityContext.fsGroup -
     * spec.securityContext.fsGroupChangePolicy - spec.securityContext.sysctls - spec.shareProcessNamespace
     * - spec.securityContext.runAsUser - spec.securityContext.runAsGroup -
     * spec.securityContext.supplementalGroups - spec.securityContext.supplementalGroupsPolicy -
     * spec.containers[*].securityContext.appArmorProfile -
     * spec.containers[*].securityContext.seLinuxOptions -
     * spec.containers[*].securityContext.seccompProfile - spec.containers[*].securityContext.capabilities
     * - spec.containers[*].securityContext.readOnlyRootFilesystem -
     * spec.containers[*].securityContext.privileged -
     * spec.containers[*].securityContext.allowPrivilegeEscalation -
     * spec.containers[*].securityContext.procMount - spec.containers[*].securityContext.runAsUser -
     * spec.containers[*].securityContext.runAsGroup
     *
     * @return static
     */
    public function setOs(PodOS $os): static
    {
        $this->os = $os;

        return $this;
    }

    /**
     * Overhead represents the resource overhead associated with running a pod for a given RuntimeClass.
     * This field will be autopopulated at admission time by the RuntimeClass admission controller. If the
     * RuntimeClass admission controller is enabled, overhead must not be set in Pod create requests. The
     * RuntimeClass admission controller will reject Pod create requests which have the overhead already
     * set. If RuntimeClass is configured and selected in the PodSpec, Overhead will be set to the value
     * defined in the corresponding RuntimeClass, otherwise it will remain unset and treated as zero. More
     * info: https://git.k8s.io/enhancements/keps/sig-node/688-pod-overhead/README.md
     */
    public function getOverhead(): array|null
    {
        return $this->overhead;
    }

    /**
     * Overhead represents the resource overhead associated with running a pod for a given RuntimeClass.
     * This field will be autopopulated at admission time by the RuntimeClass admission controller. If the
     * RuntimeClass admission controller is enabled, overhead must not be set in Pod create requests. The
     * RuntimeClass admission controller will reject Pod create requests which have the overhead already
     * set. If RuntimeClass is configured and selected in the PodSpec, Overhead will be set to the value
     * defined in the corresponding RuntimeClass, otherwise it will remain unset and treated as zero. More
     * info: https://git.k8s.io/enhancements/keps/sig-node/688-pod-overhead/README.md
     *
     * @return static
     */
    public function setOverhead(array $overhead): static
    {
        $this->overhead = $overhead;

        return $this;
    }

    /**
     * PreemptionPolicy is the Policy for preempting pods with lower priority. One of Never,
     * PreemptLowerPriority. Defaults to PreemptLowerPriority if unset.
     */
    public function getPreemptionPolicy(): string|null
    {
        return $this->preemptionPolicy;
    }

    /**
     * PreemptionPolicy is the Policy for preempting pods with lower priority. One of Never,
     * PreemptLowerPriority. Defaults to PreemptLowerPriority if unset.
     *
     * @return static
     */
    public function setPreemptionPolicy(string $preemptionPolicy): static
    {
        $this->preemptionPolicy = $preemptionPolicy;

        return $this;
    }

    /**
     * The priority value. Various system components use this field to find the priority of the pod. When
     * Priority Admission Controller is enabled, it prevents users from setting this field. The admission
     * controller populates this field from PriorityClassName. The higher the value, the higher the
     * priority.
     */
    public function getPriority(): int|null
    {
        return $this->priority;
    }

    /**
     * The priority value. Various system components use this field to find the priority of the pod. When
     * Priority Admission Controller is enabled, it prevents users from setting this field. The admission
     * controller populates this field from PriorityClassName. The higher the value, the higher the
     * priority.
     *
     * @return static
     */
    public function setPriority(int $priority): static
    {
        $this->priority = $priority;

        return $this;
    }

    /**
     * If specified, indicates the pod's priority. "system-node-critical" and "system-cluster-critical" are
     * two special keywords which indicate the highest priorities with the former being the highest
     * priority. Any other name must be defined by creating a PriorityClass object with that name. If not
     * specified, the pod priority will be default or zero if there is no default.
     */
    public function getPriorityClassName(): string|null
    {
        return $this->priorityClassName;
    }

    /**
     * If specified, indicates the pod's priority. "system-node-critical" and "system-cluster-critical" are
     * two special keywords which indicate the highest priorities with the former being the highest
     * priority. Any other name must be defined by creating a PriorityClass object with that name. If not
     * specified, the pod priority will be default or zero if there is no default.
     *
     * @return static
     */
    public function setPriorityClassName(string $priorityClassName): static
    {
        $this->priorityClassName = $priorityClassName;

        return $this;
    }

    /**
     * If specified, all readiness gates will be evaluated for pod readiness. A pod is ready when all its
     * containers are ready AND all conditions specified in the readiness gates have status equal to "True"
     * More info: https://git.k8s.io/enhancements/keps/sig-network/580-pod-readiness-gates
     *
     * @return iterable|PodReadinessGate[]
     */
    public function getReadinessGates(): iterable|null
    {
        return $this->readinessGates;
    }

    /**
     * If specified, all readiness gates will be evaluated for pod readiness. A pod is ready when all its
     * containers are ready AND all conditions specified in the readiness gates have status equal to "True"
     * More info: https://git.k8s.io/enhancements/keps/sig-network/580-pod-readiness-gates
     *
     * @return static
     */
    public function setReadinessGates(iterable $readinessGates): static
    {
        $this->readinessGates = $readinessGates;

        return $this;
    }

    /** @return static */
    public function addReadinessGates(PodReadinessGate $readinessGate): static
    {
        if (! $this->readinessGates) {
            $this->readinessGates = new Collection();
        }

        $this->readinessGates[] = $readinessGate;

        return $this;
    }

    /**
     * ResourceClaims defines which ResourceClaims must be allocated and reserved before the Pod is allowed
     * to start. The resources will be made available to those containers which consume them by name.
     *
     * This is an alpha field and requires enabling the DynamicResourceAllocation feature gate.
     *
     * This field is immutable.
     *
     * @return iterable|PodResourceClaim[]
     */
    public function getResourceClaims(): iterable|null
    {
        return $this->resourceClaims;
    }

    /**
     * ResourceClaims defines which ResourceClaims must be allocated and reserved before the Pod is allowed
     * to start. The resources will be made available to those containers which consume them by name.
     *
     * This is an alpha field and requires enabling the DynamicResourceAllocation feature gate.
     *
     * This field is immutable.
     *
     * @return static
     */
    public function setResourceClaims(iterable $resourceClaims): static
    {
        $this->resourceClaims = $resourceClaims;

        return $this;
    }

    /** @return static */
    public function addResourceClaims(PodResourceClaim $resourceClaim): static
    {
        if (! $this->resourceClaims) {
            $this->resourceClaims = new Collection();
        }

        $this->resourceClaims[] = $resourceClaim;

        return $this;
    }

    /**
     * Restart policy for all containers within the pod. One of Always, OnFailure, Never. In some contexts,
     * only a subset of those values may be permitted. Default to Always. More info:
     * https://kubernetes.io/docs/concepts/workloads/pods/pod-lifecycle/#restart-policy
     */
    public function getRestartPolicy(): string|null
    {
        return $this->restartPolicy;
    }

    /**
     * Restart policy for all containers within the pod. One of Always, OnFailure, Never. In some contexts,
     * only a subset of those values may be permitted. Default to Always. More info:
     * https://kubernetes.io/docs/concepts/workloads/pods/pod-lifecycle/#restart-policy
     *
     * @return static
     */
    public function setRestartPolicy(string $restartPolicy): static
    {
        $this->restartPolicy = $restartPolicy;

        return $this;
    }

    /**
     * RuntimeClassName refers to a RuntimeClass object in the node.k8s.io group, which should be used to
     * run this pod.  If no RuntimeClass resource matches the named class, the pod will not be run. If
     * unset or empty, the "legacy" RuntimeClass will be used, which is an implicit class with an empty
     * definition that uses the default runtime handler. More info:
     * https://git.k8s.io/enhancements/keps/sig-node/585-runtime-class
     */
    public function getRuntimeClassName(): string|null
    {
        return $this->runtimeClassName;
    }

    /**
     * RuntimeClassName refers to a RuntimeClass object in the node.k8s.io group, which should be used to
     * run this pod.  If no RuntimeClass resource matches the named class, the pod will not be run. If
     * unset or empty, the "legacy" RuntimeClass will be used, which is an implicit class with an empty
     * definition that uses the default runtime handler. More info:
     * https://git.k8s.io/enhancements/keps/sig-node/585-runtime-class
     *
     * @return static
     */
    public function setRuntimeClassName(string $runtimeClassName): static
    {
        $this->runtimeClassName = $runtimeClassName;

        return $this;
    }

    /**
     * If specified, the pod will be dispatched by specified scheduler. If not specified, the pod will be
     * dispatched by default scheduler.
     */
    public function getSchedulerName(): string|null
    {
        return $this->schedulerName;
    }

    /**
     * If specified, the pod will be dispatched by specified scheduler. If not specified, the pod will be
     * dispatched by default scheduler.
     *
     * @return static
     */
    public function setSchedulerName(string $schedulerName): static
    {
        $this->schedulerName = $schedulerName;

        return $this;
    }

    /**
     * SchedulingGates is an opaque list of values that if specified will block scheduling the pod. If
     * schedulingGates is not empty, the pod will stay in the SchedulingGated state and the scheduler will
     * not attempt to schedule the pod.
     *
     * SchedulingGates can only be set at pod creation time, and be removed only afterwards.
     *
     * @return iterable|PodSchedulingGate[]
     */
    public function getSchedulingGates(): iterable|null
    {
        return $this->schedulingGates;
    }

    /**
     * SchedulingGates is an opaque list of values that if specified will block scheduling the pod. If
     * schedulingGates is not empty, the pod will stay in the SchedulingGated state and the scheduler will
     * not attempt to schedule the pod.
     *
     * SchedulingGates can only be set at pod creation time, and be removed only afterwards.
     *
     * @return static
     */
    public function setSchedulingGates(iterable $schedulingGates): static
    {
        $this->schedulingGates = $schedulingGates;

        return $this;
    }

    /** @return static */
    public function addSchedulingGates(PodSchedulingGate $schedulingGate): static
    {
        if (! $this->schedulingGates) {
            $this->schedulingGates = new Collection();
        }

        $this->schedulingGates[] = $schedulingGate;

        return $this;
    }

    /**
     * SecurityContext holds pod-level security attributes and common container settings. Optional:
     * Defaults to empty.  See type description for default values of each field.
     */
    public function getSecurityContext(): PodSecurityContext|null
    {
        return $this->securityContext;
    }

    /**
     * SecurityContext holds pod-level security attributes and common container settings. Optional:
     * Defaults to empty.  See type description for default values of each field.
     *
     * @return static
     */
    public function setSecurityContext(PodSecurityContext $securityContext): static
    {
        $this->securityContext = $securityContext;

        return $this;
    }

    /**
     * DeprecatedServiceAccount is a deprecated alias for ServiceAccountName. Deprecated: Use
     * serviceAccountName instead.
     */
    public function getServiceAccount(): string|null
    {
        return $this->serviceAccount;
    }

    /**
     * DeprecatedServiceAccount is a deprecated alias for ServiceAccountName. Deprecated: Use
     * serviceAccountName instead.
     *
     * @return static
     */
    public function setServiceAccount(string $serviceAccount): static
    {
        $this->serviceAccount = $serviceAccount;

        return $this;
    }

    /**
     * ServiceAccountName is the name of the ServiceAccount to use to run this pod. More info:
     * https://kubernetes.io/docs/tasks/configure-pod-container/configure-service-account/
     */
    public function getServiceAccountName(): string|null
    {
        return $this->serviceAccountName;
    }

    /**
     * ServiceAccountName is the name of the ServiceAccount to use to run this pod. More info:
     * https://kubernetes.io/docs/tasks/configure-pod-container/configure-service-account/
     *
     * @return static
     */
    public function setServiceAccountName(string $serviceAccountName): static
    {
        $this->serviceAccountName = $serviceAccountName;

        return $this;
    }

    /**
     * If true the pod's hostname will be configured as the pod's FQDN, rather than the leaf name (the
     * default). In Linux containers, this means setting the FQDN in the hostname field of the kernel (the
     * nodename field of struct utsname). In Windows containers, this means setting the registry value of
     * hostname for the registry key HKEY_LOCAL_MACHINE\SYSTEM\CurrentControlSet\Services\Tcpip\Parameters
     * to FQDN. If a pod does not have FQDN, this has no effect. Default to false.
     */
    public function isSetHostnameAsFQDN(): bool|null
    {
        return $this->setHostnameAsFQDN;
    }

    /**
     * If true the pod's hostname will be configured as the pod's FQDN, rather than the leaf name (the
     * default). In Linux containers, this means setting the FQDN in the hostname field of the kernel (the
     * nodename field of struct utsname). In Windows containers, this means setting the registry value of
     * hostname for the registry key HKEY_LOCAL_MACHINE\SYSTEM\CurrentControlSet\Services\Tcpip\Parameters
     * to FQDN. If a pod does not have FQDN, this has no effect. Default to false.
     *
     * @return static
     */
    public function setIsSetHostnameAsFQDN(bool $setHostnameAsFQDN): static
    {
        $this->setHostnameAsFQDN = $setHostnameAsFQDN;

        return $this;
    }

    /**
     * Share a single process namespace between all of the containers in a pod. When this is set containers
     * will be able to view and signal processes from other containers in the same pod, and the first
     * process in each container will not be assigned PID 1. HostPID and ShareProcessNamespace cannot both
     * be set. Optional: Default to false.
     */
    public function isShareProcessNamespace(): bool|null
    {
        return $this->shareProcessNamespace;
    }

    /**
     * Share a single process namespace between all of the containers in a pod. When this is set containers
     * will be able to view and signal processes from other containers in the same pod, and the first
     * process in each container will not be assigned PID 1. HostPID and ShareProcessNamespace cannot both
     * be set. Optional: Default to false.
     *
     * @return static
     */
    public function setIsShareProcessNamespace(bool $shareProcessNamespace): static
    {
        $this->shareProcessNamespace = $shareProcessNamespace;

        return $this;
    }

    /**
     * If specified, the fully qualified Pod hostname will be "<hostname>.<subdomain>.<pod
     * namespace>.svc.<cluster domain>". If not specified, the pod will not have a domainname at all.
     */
    public function getSubdomain(): string|null
    {
        return $this->subdomain;
    }

    /**
     * If specified, the fully qualified Pod hostname will be "<hostname>.<subdomain>.<pod
     * namespace>.svc.<cluster domain>". If not specified, the pod will not have a domainname at all.
     *
     * @return static
     */
    public function setSubdomain(string $subdomain): static
    {
        $this->subdomain = $subdomain;

        return $this;
    }

    /**
     * Optional duration in seconds the pod needs to terminate gracefully. May be decreased in delete
     * request. Value must be non-negative integer. The value zero indicates stop immediately via the kill
     * signal (no opportunity to shut down). If this value is nil, the default grace period will be used
     * instead. The grace period is the duration in seconds after the processes running in the pod are sent
     * a termination signal and the time when the processes are forcibly halted with a kill signal. Set
     * this value longer than the expected cleanup time for your process. Defaults to 30 seconds.
     */
    public function getTerminationGracePeriodSeconds(): int|null
    {
        return $this->terminationGracePeriodSeconds;
    }

    /**
     * Optional duration in seconds the pod needs to terminate gracefully. May be decreased in delete
     * request. Value must be non-negative integer. The value zero indicates stop immediately via the kill
     * signal (no opportunity to shut down). If this value is nil, the default grace period will be used
     * instead. The grace period is the duration in seconds after the processes running in the pod are sent
     * a termination signal and the time when the processes are forcibly halted with a kill signal. Set
     * this value longer than the expected cleanup time for your process. Defaults to 30 seconds.
     *
     * @return static
     */
    public function setTerminationGracePeriodSeconds(int $terminationGracePeriodSeconds): static
    {
        $this->terminationGracePeriodSeconds = $terminationGracePeriodSeconds;

        return $this;
    }

    /**
     * If specified, the pod's tolerations.
     *
     * @return iterable|Toleration[]
     */
    public function getTolerations(): iterable|null
    {
        return $this->tolerations;
    }

    /**
     * If specified, the pod's tolerations.
     *
     * @return static
     */
    public function setTolerations(iterable $tolerations): static
    {
        $this->tolerations = $tolerations;

        return $this;
    }

    /** @return static */
    public function addTolerations(Toleration $toleration): static
    {
        if (! $this->tolerations) {
            $this->tolerations = new Collection();
        }

        $this->tolerations[] = $toleration;

        return $this;
    }

    /**
     * TopologySpreadConstraints describes how a group of pods ought to spread across topology domains.
     * Scheduler will schedule pods in a way which abides by the constraints. All topologySpreadConstraints
     * are ANDed.
     *
     * @return iterable|TopologySpreadConstraint[]
     */
    public function getTopologySpreadConstraints(): iterable|null
    {
        return $this->topologySpreadConstraints;
    }

    /**
     * TopologySpreadConstraints describes how a group of pods ought to spread across topology domains.
     * Scheduler will schedule pods in a way which abides by the constraints. All topologySpreadConstraints
     * are ANDed.
     *
     * @return static
     */
    public function setTopologySpreadConstraints(iterable $topologySpreadConstraints): static
    {
        $this->topologySpreadConstraints = $topologySpreadConstraints;

        return $this;
    }

    /** @return static */
    public function addTopologySpreadConstraints(TopologySpreadConstraint $topologySpreadConstraint): static
    {
        if (! $this->topologySpreadConstraints) {
            $this->topologySpreadConstraints = new Collection();
        }

        $this->topologySpreadConstraints[] = $topologySpreadConstraint;

        return $this;
    }

    /**
     * List of volumes that can be mounted by containers belonging to the pod. More info:
     * https://kubernetes.io/docs/concepts/storage/volumes
     *
     * @return iterable|Volume[]
     */
    public function getVolumes(): iterable|null
    {
        return $this->volumes;
    }

    /**
     * List of volumes that can be mounted by containers belonging to the pod. More info:
     * https://kubernetes.io/docs/concepts/storage/volumes
     *
     * @return static
     */
    public function setVolumes(iterable $volumes): static
    {
        $this->volumes = $volumes;

        return $this;
    }

    /** @return static */
    public function addVolumes(Volume $volume): static
    {
        if (! $this->volumes) {
            $this->volumes = new Collection();
        }

        $this->volumes[] = $volume;

        return $this;
    }
}
