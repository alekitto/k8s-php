<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Core\v1;

use DateTimeInterface;
use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;
use Kcs\K8s\Collection;

/**
 * PodStatus represents information about the status of a pod. Status may trail the actual state of a
 * system, especially if the node that hosts the pod cannot contact the control plane.
 */
class PodStatus
{
    /** @var iterable|PodCondition[]|null */
    #[Kubernetes\Attribute('conditions', type: AttributeType::Collection, model: PodCondition::class)]
    protected $conditions = null;

    /** @var iterable|ContainerStatus[]|null */
    #[Kubernetes\Attribute('containerStatuses', type: AttributeType::Collection, model: ContainerStatus::class)]
    protected $containerStatuses = null;

    /** @var iterable|ContainerStatus[]|null */
    #[Kubernetes\Attribute('ephemeralContainerStatuses', type: AttributeType::Collection, model: ContainerStatus::class)]
    protected $ephemeralContainerStatuses = null;

    #[Kubernetes\Attribute('hostIP')]
    protected string|null $hostIP = null;

    /** @var iterable|HostIP[]|null */
    #[Kubernetes\Attribute('hostIPs', type: AttributeType::Collection, model: HostIP::class)]
    protected $hostIPs = null;

    /** @var iterable|ContainerStatus[]|null */
    #[Kubernetes\Attribute('initContainerStatuses', type: AttributeType::Collection, model: ContainerStatus::class)]
    protected $initContainerStatuses = null;

    #[Kubernetes\Attribute('message')]
    protected string|null $message = null;

    #[Kubernetes\Attribute('nominatedNodeName')]
    protected string|null $nominatedNodeName = null;

    #[Kubernetes\Attribute('phase')]
    protected string|null $phase = null;

    #[Kubernetes\Attribute('podIP')]
    protected string|null $podIP = null;

    /** @var iterable|PodIP[]|null */
    #[Kubernetes\Attribute('podIPs', type: AttributeType::Collection, model: PodIP::class)]
    protected $podIPs = null;

    #[Kubernetes\Attribute('qosClass')]
    protected string|null $qosClass = null;

    #[Kubernetes\Attribute('reason')]
    protected string|null $reason = null;

    #[Kubernetes\Attribute('resize')]
    protected string|null $resize = null;

    /** @var iterable|PodResourceClaimStatus[]|null */
    #[Kubernetes\Attribute('resourceClaimStatuses', type: AttributeType::Collection, model: PodResourceClaimStatus::class)]
    protected $resourceClaimStatuses = null;

    #[Kubernetes\Attribute('startTime', type: AttributeType::DateTime)]
    protected DateTimeInterface|null $startTime = null;

    /**
     * Current service state of pod. More info:
     * https://kubernetes.io/docs/concepts/workloads/pods/pod-lifecycle#pod-conditions
     *
     * @return iterable|PodCondition[]
     */
    public function getConditions(): iterable|null
    {
        return $this->conditions;
    }

    /**
     * Current service state of pod. More info:
     * https://kubernetes.io/docs/concepts/workloads/pods/pod-lifecycle#pod-conditions
     *
     * @return static
     */
    public function setConditions(iterable $conditions): static
    {
        $this->conditions = $conditions;

        return $this;
    }

    /** @return static */
    public function addConditions(PodCondition $condition): static
    {
        if (! $this->conditions) {
            $this->conditions = new Collection();
        }

        $this->conditions[] = $condition;

        return $this;
    }

    /**
     * The list has one entry per container in the manifest. More info:
     * https://kubernetes.io/docs/concepts/workloads/pods/pod-lifecycle#pod-and-container-status
     *
     * @return iterable|ContainerStatus[]
     */
    public function getContainerStatuses(): iterable|null
    {
        return $this->containerStatuses;
    }

    /**
     * The list has one entry per container in the manifest. More info:
     * https://kubernetes.io/docs/concepts/workloads/pods/pod-lifecycle#pod-and-container-status
     *
     * @return static
     */
    public function setContainerStatuses(iterable $containerStatuses): static
    {
        $this->containerStatuses = $containerStatuses;

        return $this;
    }

    /** @return static */
    public function addContainerStatuses(ContainerStatus $containerStatuse): static
    {
        if (! $this->containerStatuses) {
            $this->containerStatuses = new Collection();
        }

        $this->containerStatuses[] = $containerStatuse;

        return $this;
    }

    /**
     * Status for any ephemeral containers that have run in this pod.
     *
     * @return iterable|ContainerStatus[]
     */
    public function getEphemeralContainerStatuses(): iterable|null
    {
        return $this->ephemeralContainerStatuses;
    }

    /**
     * Status for any ephemeral containers that have run in this pod.
     *
     * @return static
     */
    public function setEphemeralContainerStatuses(iterable $ephemeralContainerStatuses): static
    {
        $this->ephemeralContainerStatuses = $ephemeralContainerStatuses;

        return $this;
    }

    /** @return static */
    public function addEphemeralContainerStatuses(ContainerStatus $ephemeralContainerStatuse): static
    {
        if (! $this->ephemeralContainerStatuses) {
            $this->ephemeralContainerStatuses = new Collection();
        }

        $this->ephemeralContainerStatuses[] = $ephemeralContainerStatuse;

        return $this;
    }

    /**
     * hostIP holds the IP address of the host to which the pod is assigned. Empty if the pod has not
     * started yet. A pod can be assigned to a node that has a problem in kubelet which in turns mean that
     * HostIP will not be updated even if there is a node is assigned to pod
     */
    public function getHostIP(): string|null
    {
        return $this->hostIP;
    }

    /**
     * hostIP holds the IP address of the host to which the pod is assigned. Empty if the pod has not
     * started yet. A pod can be assigned to a node that has a problem in kubelet which in turns mean that
     * HostIP will not be updated even if there is a node is assigned to pod
     *
     * @return static
     */
    public function setHostIP(string $hostIP): static
    {
        $this->hostIP = $hostIP;

        return $this;
    }

    /**
     * hostIPs holds the IP addresses allocated to the host. If this field is specified, the first entry
     * must match the hostIP field. This list is empty if the pod has not started yet. A pod can be
     * assigned to a node that has a problem in kubelet which in turns means that HostIPs will not be
     * updated even if there is a node is assigned to this pod.
     *
     * @return iterable|HostIP[]
     */
    public function getHostIPs(): iterable|null
    {
        return $this->hostIPs;
    }

    /**
     * hostIPs holds the IP addresses allocated to the host. If this field is specified, the first entry
     * must match the hostIP field. This list is empty if the pod has not started yet. A pod can be
     * assigned to a node that has a problem in kubelet which in turns means that HostIPs will not be
     * updated even if there is a node is assigned to this pod.
     *
     * @return static
     */
    public function setHostIPs(iterable $hostIPs): static
    {
        $this->hostIPs = $hostIPs;

        return $this;
    }

    /** @return static */
    public function addHostIPs(HostIP $hostIP): static
    {
        if (! $this->hostIPs) {
            $this->hostIPs = new Collection();
        }

        $this->hostIPs[] = $hostIP;

        return $this;
    }

    /**
     * The list has one entry per init container in the manifest. The most recent successful init container
     * will have ready = true, the most recently started container will have startTime set. More info:
     * https://kubernetes.io/docs/concepts/workloads/pods/pod-lifecycle#pod-and-container-status
     *
     * @return iterable|ContainerStatus[]
     */
    public function getInitContainerStatuses(): iterable|null
    {
        return $this->initContainerStatuses;
    }

    /**
     * The list has one entry per init container in the manifest. The most recent successful init container
     * will have ready = true, the most recently started container will have startTime set. More info:
     * https://kubernetes.io/docs/concepts/workloads/pods/pod-lifecycle#pod-and-container-status
     *
     * @return static
     */
    public function setInitContainerStatuses(iterable $initContainerStatuses): static
    {
        $this->initContainerStatuses = $initContainerStatuses;

        return $this;
    }

    /** @return static */
    public function addInitContainerStatuses(ContainerStatus $initContainerStatuse): static
    {
        if (! $this->initContainerStatuses) {
            $this->initContainerStatuses = new Collection();
        }

        $this->initContainerStatuses[] = $initContainerStatuse;

        return $this;
    }

    /**
     * A human readable message indicating details about why the pod is in this condition.
     */
    public function getMessage(): string|null
    {
        return $this->message;
    }

    /**
     * A human readable message indicating details about why the pod is in this condition.
     *
     * @return static
     */
    public function setMessage(string $message): static
    {
        $this->message = $message;

        return $this;
    }

    /**
     * nominatedNodeName is set only when this pod preempts other pods on the node, but it cannot be
     * scheduled right away as preemption victims receive their graceful termination periods. This field
     * does not guarantee that the pod will be scheduled on this node. Scheduler may decide to place the
     * pod elsewhere if other nodes become available sooner. Scheduler may also decide to give the
     * resources on this node to a higher priority pod that is created after preemption. As a result, this
     * field may be different than PodSpec.nodeName when the pod is scheduled.
     */
    public function getNominatedNodeName(): string|null
    {
        return $this->nominatedNodeName;
    }

    /**
     * nominatedNodeName is set only when this pod preempts other pods on the node, but it cannot be
     * scheduled right away as preemption victims receive their graceful termination periods. This field
     * does not guarantee that the pod will be scheduled on this node. Scheduler may decide to place the
     * pod elsewhere if other nodes become available sooner. Scheduler may also decide to give the
     * resources on this node to a higher priority pod that is created after preemption. As a result, this
     * field may be different than PodSpec.nodeName when the pod is scheduled.
     *
     * @return static
     */
    public function setNominatedNodeName(string $nominatedNodeName): static
    {
        $this->nominatedNodeName = $nominatedNodeName;

        return $this;
    }

    /**
     * The phase of a Pod is a simple, high-level summary of where the Pod is in its lifecycle. The
     * conditions array, the reason and message fields, and the individual container status arrays contain
     * more detail about the pod's status. There are five possible phase values:
     *
     * Pending: The pod has been accepted by the Kubernetes system, but one or more of the container images
     * has not been created. This includes time before being scheduled as well as time spent downloading
     * images over the network, which could take a while. Running: The pod has been bound to a node, and
     * all of the containers have been created. At least one container is still running, or is in the
     * process of starting or restarting. Succeeded: All containers in the pod have terminated in success,
     * and will not be restarted. Failed: All containers in the pod have terminated, and at least one
     * container has terminated in failure. The container either exited with non-zero status or was
     * terminated by the system. Unknown: For some reason the state of the pod could not be obtained,
     * typically due to an error in communicating with the host of the pod.
     *
     * More info: https://kubernetes.io/docs/concepts/workloads/pods/pod-lifecycle#pod-phase
     */
    public function getPhase(): string|null
    {
        return $this->phase;
    }

    /**
     * The phase of a Pod is a simple, high-level summary of where the Pod is in its lifecycle. The
     * conditions array, the reason and message fields, and the individual container status arrays contain
     * more detail about the pod's status. There are five possible phase values:
     *
     * Pending: The pod has been accepted by the Kubernetes system, but one or more of the container images
     * has not been created. This includes time before being scheduled as well as time spent downloading
     * images over the network, which could take a while. Running: The pod has been bound to a node, and
     * all of the containers have been created. At least one container is still running, or is in the
     * process of starting or restarting. Succeeded: All containers in the pod have terminated in success,
     * and will not be restarted. Failed: All containers in the pod have terminated, and at least one
     * container has terminated in failure. The container either exited with non-zero status or was
     * terminated by the system. Unknown: For some reason the state of the pod could not be obtained,
     * typically due to an error in communicating with the host of the pod.
     *
     * More info: https://kubernetes.io/docs/concepts/workloads/pods/pod-lifecycle#pod-phase
     *
     * @return static
     */
    public function setPhase(string $phase): static
    {
        $this->phase = $phase;

        return $this;
    }

    /**
     * podIP address allocated to the pod. Routable at least within the cluster. Empty if not yet
     * allocated.
     */
    public function getPodIP(): string|null
    {
        return $this->podIP;
    }

    /**
     * podIP address allocated to the pod. Routable at least within the cluster. Empty if not yet
     * allocated.
     *
     * @return static
     */
    public function setPodIP(string $podIP): static
    {
        $this->podIP = $podIP;

        return $this;
    }

    /**
     * podIPs holds the IP addresses allocated to the pod. If this field is specified, the 0th entry must
     * match the podIP field. Pods may be allocated at most 1 value for each of IPv4 and IPv6. This list is
     * empty if no IPs have been allocated yet.
     *
     * @return iterable|PodIP[]
     */
    public function getPodIPs(): iterable|null
    {
        return $this->podIPs;
    }

    /**
     * podIPs holds the IP addresses allocated to the pod. If this field is specified, the 0th entry must
     * match the podIP field. Pods may be allocated at most 1 value for each of IPv4 and IPv6. This list is
     * empty if no IPs have been allocated yet.
     *
     * @return static
     */
    public function setPodIPs(iterable $podIPs): static
    {
        $this->podIPs = $podIPs;

        return $this;
    }

    /** @return static */
    public function addPodIPs(PodIP $podIP): static
    {
        if (! $this->podIPs) {
            $this->podIPs = new Collection();
        }

        $this->podIPs[] = $podIP;

        return $this;
    }

    /**
     * The Quality of Service (QOS) classification assigned to the pod based on resource requirements See
     * PodQOSClass type for available QOS classes More info:
     * https://kubernetes.io/docs/concepts/workloads/pods/pod-qos/#quality-of-service-classes
     */
    public function getQosClass(): string|null
    {
        return $this->qosClass;
    }

    /**
     * The Quality of Service (QOS) classification assigned to the pod based on resource requirements See
     * PodQOSClass type for available QOS classes More info:
     * https://kubernetes.io/docs/concepts/workloads/pods/pod-qos/#quality-of-service-classes
     *
     * @return static
     */
    public function setQosClass(string $qosClass): static
    {
        $this->qosClass = $qosClass;

        return $this;
    }

    /**
     * A brief CamelCase message indicating details about why the pod is in this state. e.g. 'Evicted'
     */
    public function getReason(): string|null
    {
        return $this->reason;
    }

    /**
     * A brief CamelCase message indicating details about why the pod is in this state. e.g. 'Evicted'
     *
     * @return static
     */
    public function setReason(string $reason): static
    {
        $this->reason = $reason;

        return $this;
    }

    /**
     * Status of resources resize desired for pod's containers. It is empty if no resources resize is
     * pending. Any changes to container resources will automatically set this to "Proposed"
     */
    public function getResize(): string|null
    {
        return $this->resize;
    }

    /**
     * Status of resources resize desired for pod's containers. It is empty if no resources resize is
     * pending. Any changes to container resources will automatically set this to "Proposed"
     *
     * @return static
     */
    public function setResize(string $resize): static
    {
        $this->resize = $resize;

        return $this;
    }

    /**
     * Status of resource claims.
     *
     * @return iterable|PodResourceClaimStatus[]
     */
    public function getResourceClaimStatuses(): iterable|null
    {
        return $this->resourceClaimStatuses;
    }

    /**
     * Status of resource claims.
     *
     * @return static
     */
    public function setResourceClaimStatuses(iterable $resourceClaimStatuses): static
    {
        $this->resourceClaimStatuses = $resourceClaimStatuses;

        return $this;
    }

    /** @return static */
    public function addResourceClaimStatuses(PodResourceClaimStatus $resourceClaimStatuse): static
    {
        if (! $this->resourceClaimStatuses) {
            $this->resourceClaimStatuses = new Collection();
        }

        $this->resourceClaimStatuses[] = $resourceClaimStatuse;

        return $this;
    }

    /**
     * RFC 3339 date and time at which the object was acknowledged by the Kubelet. This is before the
     * Kubelet pulled the container image(s) for the pod.
     */
    public function getStartTime(): DateTimeInterface|null
    {
        return $this->startTime;
    }

    /**
     * RFC 3339 date and time at which the object was acknowledged by the Kubelet. This is before the
     * Kubelet pulled the container image(s) for the pod.
     *
     * @return static
     */
    public function setStartTime(DateTimeInterface $startTime): static
    {
        $this->startTime = $startTime;

        return $this;
    }
}
