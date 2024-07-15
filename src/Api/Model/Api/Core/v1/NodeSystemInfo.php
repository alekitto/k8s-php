<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Core\v1;

use Kcs\K8s\Attribute as Kubernetes;

/**
 * NodeSystemInfo is a set of ids/uuids to uniquely identify the node.
 */
class NodeSystemInfo
{
    #[Kubernetes\Attribute('architecture', required: true)]
    protected string $architecture;

    #[Kubernetes\Attribute('bootID', required: true)]
    protected string $bootID;

    #[Kubernetes\Attribute('containerRuntimeVersion', required: true)]
    protected string $containerRuntimeVersion;

    #[Kubernetes\Attribute('kernelVersion', required: true)]
    protected string $kernelVersion;

    #[Kubernetes\Attribute('kubeProxyVersion', required: true)]
    protected string $kubeProxyVersion;

    #[Kubernetes\Attribute('kubeletVersion', required: true)]
    protected string $kubeletVersion;

    #[Kubernetes\Attribute('machineID', required: true)]
    protected string $machineID;

    #[Kubernetes\Attribute('operatingSystem', required: true)]
    protected string $operatingSystem;

    #[Kubernetes\Attribute('osImage', required: true)]
    protected string $osImage;

    #[Kubernetes\Attribute('systemUUID', required: true)]
    protected string $systemUUID;

    public function __construct(
        string $architecture,
        string $bootID,
        string $containerRuntimeVersion,
        string $kernelVersion,
        string $kubeProxyVersion,
        string $kubeletVersion,
        string $machineID,
        string $operatingSystem,
        string $osImage,
        string $systemUUID,
    ) {
        $this->architecture = $architecture;
        $this->bootID = $bootID;
        $this->containerRuntimeVersion = $containerRuntimeVersion;
        $this->kernelVersion = $kernelVersion;
        $this->kubeProxyVersion = $kubeProxyVersion;
        $this->kubeletVersion = $kubeletVersion;
        $this->machineID = $machineID;
        $this->operatingSystem = $operatingSystem;
        $this->osImage = $osImage;
        $this->systemUUID = $systemUUID;
    }

    /**
     * The Architecture reported by the node
     */
    public function getArchitecture(): string
    {
        return $this->architecture;
    }

    /**
     * The Architecture reported by the node
     *
     * @return static
     */
    public function setArchitecture(string $architecture): static
    {
        $this->architecture = $architecture;

        return $this;
    }

    /**
     * Boot ID reported by the node.
     */
    public function getBootID(): string
    {
        return $this->bootID;
    }

    /**
     * Boot ID reported by the node.
     *
     * @return static
     */
    public function setBootID(string $bootID): static
    {
        $this->bootID = $bootID;

        return $this;
    }

    /**
     * ContainerRuntime Version reported by the node through runtime remote API (e.g. containerd://1.4.2).
     */
    public function getContainerRuntimeVersion(): string
    {
        return $this->containerRuntimeVersion;
    }

    /**
     * ContainerRuntime Version reported by the node through runtime remote API (e.g. containerd://1.4.2).
     *
     * @return static
     */
    public function setContainerRuntimeVersion(string $containerRuntimeVersion): static
    {
        $this->containerRuntimeVersion = $containerRuntimeVersion;

        return $this;
    }

    /**
     * Kernel Version reported by the node from 'uname -r' (e.g. 3.16.0-0.bpo.4-amd64).
     */
    public function getKernelVersion(): string
    {
        return $this->kernelVersion;
    }

    /**
     * Kernel Version reported by the node from 'uname -r' (e.g. 3.16.0-0.bpo.4-amd64).
     *
     * @return static
     */
    public function setKernelVersion(string $kernelVersion): static
    {
        $this->kernelVersion = $kernelVersion;

        return $this;
    }

    /**
     * Deprecated: KubeProxy Version reported by the node.
     */
    public function getKubeProxyVersion(): string
    {
        return $this->kubeProxyVersion;
    }

    /**
     * Deprecated: KubeProxy Version reported by the node.
     *
     * @return static
     */
    public function setKubeProxyVersion(string $kubeProxyVersion): static
    {
        $this->kubeProxyVersion = $kubeProxyVersion;

        return $this;
    }

    /**
     * Kubelet Version reported by the node.
     */
    public function getKubeletVersion(): string
    {
        return $this->kubeletVersion;
    }

    /**
     * Kubelet Version reported by the node.
     *
     * @return static
     */
    public function setKubeletVersion(string $kubeletVersion): static
    {
        $this->kubeletVersion = $kubeletVersion;

        return $this;
    }

    /**
     * MachineID reported by the node. For unique machine identification in the cluster this field is
     * preferred. Learn more from man(5) machine-id: http://man7.org/linux/man-pages/man5/machine-id.5.html
     */
    public function getMachineID(): string
    {
        return $this->machineID;
    }

    /**
     * MachineID reported by the node. For unique machine identification in the cluster this field is
     * preferred. Learn more from man(5) machine-id: http://man7.org/linux/man-pages/man5/machine-id.5.html
     *
     * @return static
     */
    public function setMachineID(string $machineID): static
    {
        $this->machineID = $machineID;

        return $this;
    }

    /**
     * The Operating System reported by the node
     */
    public function getOperatingSystem(): string
    {
        return $this->operatingSystem;
    }

    /**
     * The Operating System reported by the node
     *
     * @return static
     */
    public function setOperatingSystem(string $operatingSystem): static
    {
        $this->operatingSystem = $operatingSystem;

        return $this;
    }

    /**
     * OS Image reported by the node from /etc/os-release (e.g. Debian GNU/Linux 7 (wheezy)).
     */
    public function getOsImage(): string
    {
        return $this->osImage;
    }

    /**
     * OS Image reported by the node from /etc/os-release (e.g. Debian GNU/Linux 7 (wheezy)).
     *
     * @return static
     */
    public function setOsImage(string $osImage): static
    {
        $this->osImage = $osImage;

        return $this;
    }

    /**
     * SystemUUID reported by the node. For unique machine identification MachineID is preferred. This
     * field is specific to Red Hat hosts
     * https://access.redhat.com/documentation/en-us/red_hat_subscription_management/1/html/rhsm/uuid
     */
    public function getSystemUUID(): string
    {
        return $this->systemUUID;
    }

    /**
     * SystemUUID reported by the node. For unique machine identification MachineID is preferred. This
     * field is specific to Red Hat hosts
     * https://access.redhat.com/documentation/en-us/red_hat_subscription_management/1/html/rhsm/uuid
     *
     * @return static
     */
    public function setSystemUUID(string $systemUUID): static
    {
        $this->systemUUID = $systemUUID;

        return $this;
    }
}
