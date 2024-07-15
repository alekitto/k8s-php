<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Core\v1;

use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;

/**
 * SecurityContext holds security configuration that will be applied to a container. Some fields are
 * present in both SecurityContext and PodSecurityContext.  When both are set, the values in
 * SecurityContext take precedence.
 */
class SecurityContext
{
    #[Kubernetes\Attribute('allowPrivilegeEscalation')]
    protected bool|null $allowPrivilegeEscalation = null;

    #[Kubernetes\Attribute('appArmorProfile', type: AttributeType::Model, model: AppArmorProfile::class)]
    protected AppArmorProfile|null $appArmorProfile = null;

    #[Kubernetes\Attribute('capabilities', type: AttributeType::Model, model: Capabilities::class)]
    protected Capabilities|null $capabilities = null;

    #[Kubernetes\Attribute('privileged')]
    protected bool|null $privileged = null;

    #[Kubernetes\Attribute('procMount')]
    protected string|null $procMount = null;

    #[Kubernetes\Attribute('readOnlyRootFilesystem')]
    protected bool|null $readOnlyRootFilesystem = null;

    #[Kubernetes\Attribute('runAsGroup')]
    protected int|null $runAsGroup = null;

    #[Kubernetes\Attribute('runAsNonRoot')]
    protected bool|null $runAsNonRoot = null;

    #[Kubernetes\Attribute('runAsUser')]
    protected int|null $runAsUser = null;

    #[Kubernetes\Attribute('seLinuxOptions', type: AttributeType::Model, model: SELinuxOptions::class)]
    protected SELinuxOptions|null $seLinuxOptions = null;

    #[Kubernetes\Attribute('seccompProfile', type: AttributeType::Model, model: SeccompProfile::class)]
    protected SeccompProfile|null $seccompProfile = null;

    #[Kubernetes\Attribute('windowsOptions', type: AttributeType::Model, model: WindowsSecurityContextOptions::class)]
    protected WindowsSecurityContextOptions|null $windowsOptions = null;

    /**
     * AllowPrivilegeEscalation controls whether a process can gain more privileges than its parent
     * process. This bool directly controls if the no_new_privs flag will be set on the container process.
     * AllowPrivilegeEscalation is true always when the container is: 1) run as Privileged 2) has
     * CAP_SYS_ADMIN Note that this field cannot be set when spec.os.name is windows.
     */
    public function isAllowPrivilegeEscalation(): bool|null
    {
        return $this->allowPrivilegeEscalation;
    }

    /**
     * AllowPrivilegeEscalation controls whether a process can gain more privileges than its parent
     * process. This bool directly controls if the no_new_privs flag will be set on the container process.
     * AllowPrivilegeEscalation is true always when the container is: 1) run as Privileged 2) has
     * CAP_SYS_ADMIN Note that this field cannot be set when spec.os.name is windows.
     *
     * @return static
     */
    public function setIsAllowPrivilegeEscalation(bool $allowPrivilegeEscalation): static
    {
        $this->allowPrivilegeEscalation = $allowPrivilegeEscalation;

        return $this;
    }

    /**
     * appArmorProfile is the AppArmor options to use by this container. If set, this profile overrides the
     * pod's appArmorProfile. Note that this field cannot be set when spec.os.name is windows.
     */
    public function getAppArmorProfile(): AppArmorProfile|null
    {
        return $this->appArmorProfile;
    }

    /**
     * appArmorProfile is the AppArmor options to use by this container. If set, this profile overrides the
     * pod's appArmorProfile. Note that this field cannot be set when spec.os.name is windows.
     *
     * @return static
     */
    public function setAppArmorProfile(AppArmorProfile $appArmorProfile): static
    {
        $this->appArmorProfile = $appArmorProfile;

        return $this;
    }

    /**
     * The capabilities to add/drop when running containers. Defaults to the default set of capabilities
     * granted by the container runtime. Note that this field cannot be set when spec.os.name is windows.
     */
    public function getCapabilities(): Capabilities|null
    {
        return $this->capabilities;
    }

    /**
     * The capabilities to add/drop when running containers. Defaults to the default set of capabilities
     * granted by the container runtime. Note that this field cannot be set when spec.os.name is windows.
     *
     * @return static
     */
    public function setCapabilities(Capabilities $capabilities): static
    {
        $this->capabilities = $capabilities;

        return $this;
    }

    /**
     * Run container in privileged mode. Processes in privileged containers are essentially equivalent to
     * root on the host. Defaults to false. Note that this field cannot be set when spec.os.name is
     * windows.
     */
    public function isPrivileged(): bool|null
    {
        return $this->privileged;
    }

    /**
     * Run container in privileged mode. Processes in privileged containers are essentially equivalent to
     * root on the host. Defaults to false. Note that this field cannot be set when spec.os.name is
     * windows.
     *
     * @return static
     */
    public function setIsPrivileged(bool $privileged): static
    {
        $this->privileged = $privileged;

        return $this;
    }

    /**
     * procMount denotes the type of proc mount to use for the containers. The default is DefaultProcMount
     * which uses the container runtime defaults for readonly paths and masked paths. This requires the
     * ProcMountType feature flag to be enabled. Note that this field cannot be set when spec.os.name is
     * windows.
     */
    public function getProcMount(): string|null
    {
        return $this->procMount;
    }

    /**
     * procMount denotes the type of proc mount to use for the containers. The default is DefaultProcMount
     * which uses the container runtime defaults for readonly paths and masked paths. This requires the
     * ProcMountType feature flag to be enabled. Note that this field cannot be set when spec.os.name is
     * windows.
     *
     * @return static
     */
    public function setProcMount(string $procMount): static
    {
        $this->procMount = $procMount;

        return $this;
    }

    /**
     * Whether this container has a read-only root filesystem. Default is false. Note that this field
     * cannot be set when spec.os.name is windows.
     */
    public function isReadOnlyRootFilesystem(): bool|null
    {
        return $this->readOnlyRootFilesystem;
    }

    /**
     * Whether this container has a read-only root filesystem. Default is false. Note that this field
     * cannot be set when spec.os.name is windows.
     *
     * @return static
     */
    public function setIsReadOnlyRootFilesystem(bool $readOnlyRootFilesystem): static
    {
        $this->readOnlyRootFilesystem = $readOnlyRootFilesystem;

        return $this;
    }

    /**
     * The GID to run the entrypoint of the container process. Uses runtime default if unset. May also be
     * set in PodSecurityContext.  If set in both SecurityContext and PodSecurityContext, the value
     * specified in SecurityContext takes precedence. Note that this field cannot be set when spec.os.name
     * is windows.
     */
    public function getRunAsGroup(): int|null
    {
        return $this->runAsGroup;
    }

    /**
     * The GID to run the entrypoint of the container process. Uses runtime default if unset. May also be
     * set in PodSecurityContext.  If set in both SecurityContext and PodSecurityContext, the value
     * specified in SecurityContext takes precedence. Note that this field cannot be set when spec.os.name
     * is windows.
     *
     * @return static
     */
    public function setRunAsGroup(int $runAsGroup): static
    {
        $this->runAsGroup = $runAsGroup;

        return $this;
    }

    /**
     * Indicates that the container must run as a non-root user. If true, the Kubelet will validate the
     * image at runtime to ensure that it does not run as UID 0 (root) and fail to start the container if
     * it does. If unset or false, no such validation will be performed. May also be set in
     * PodSecurityContext.  If set in both SecurityContext and PodSecurityContext, the value specified in
     * SecurityContext takes precedence.
     */
    public function isRunAsNonRoot(): bool|null
    {
        return $this->runAsNonRoot;
    }

    /**
     * Indicates that the container must run as a non-root user. If true, the Kubelet will validate the
     * image at runtime to ensure that it does not run as UID 0 (root) and fail to start the container if
     * it does. If unset or false, no such validation will be performed. May also be set in
     * PodSecurityContext.  If set in both SecurityContext and PodSecurityContext, the value specified in
     * SecurityContext takes precedence.
     *
     * @return static
     */
    public function setIsRunAsNonRoot(bool $runAsNonRoot): static
    {
        $this->runAsNonRoot = $runAsNonRoot;

        return $this;
    }

    /**
     * The UID to run the entrypoint of the container process. Defaults to user specified in image metadata
     * if unspecified. May also be set in PodSecurityContext.  If set in both SecurityContext and
     * PodSecurityContext, the value specified in SecurityContext takes precedence. Note that this field
     * cannot be set when spec.os.name is windows.
     */
    public function getRunAsUser(): int|null
    {
        return $this->runAsUser;
    }

    /**
     * The UID to run the entrypoint of the container process. Defaults to user specified in image metadata
     * if unspecified. May also be set in PodSecurityContext.  If set in both SecurityContext and
     * PodSecurityContext, the value specified in SecurityContext takes precedence. Note that this field
     * cannot be set when spec.os.name is windows.
     *
     * @return static
     */
    public function setRunAsUser(int $runAsUser): static
    {
        $this->runAsUser = $runAsUser;

        return $this;
    }

    /**
     * The SELinux context to be applied to the container. If unspecified, the container runtime will
     * allocate a random SELinux context for each container.  May also be set in PodSecurityContext.  If
     * set in both SecurityContext and PodSecurityContext, the value specified in SecurityContext takes
     * precedence. Note that this field cannot be set when spec.os.name is windows.
     */
    public function getSeLinuxOptions(): SELinuxOptions|null
    {
        return $this->seLinuxOptions;
    }

    /**
     * The SELinux context to be applied to the container. If unspecified, the container runtime will
     * allocate a random SELinux context for each container.  May also be set in PodSecurityContext.  If
     * set in both SecurityContext and PodSecurityContext, the value specified in SecurityContext takes
     * precedence. Note that this field cannot be set when spec.os.name is windows.
     *
     * @return static
     */
    public function setSeLinuxOptions(SELinuxOptions $seLinuxOptions): static
    {
        $this->seLinuxOptions = $seLinuxOptions;

        return $this;
    }

    /**
     * The seccomp options to use by this container. If seccomp options are provided at both the pod &
     * container level, the container options override the pod options. Note that this field cannot be set
     * when spec.os.name is windows.
     */
    public function getSeccompProfile(): SeccompProfile|null
    {
        return $this->seccompProfile;
    }

    /**
     * The seccomp options to use by this container. If seccomp options are provided at both the pod &
     * container level, the container options override the pod options. Note that this field cannot be set
     * when spec.os.name is windows.
     *
     * @return static
     */
    public function setSeccompProfile(SeccompProfile $seccompProfile): static
    {
        $this->seccompProfile = $seccompProfile;

        return $this;
    }

    /**
     * The Windows specific settings applied to all containers. If unspecified, the options from the
     * PodSecurityContext will be used. If set in both SecurityContext and PodSecurityContext, the value
     * specified in SecurityContext takes precedence. Note that this field cannot be set when spec.os.name
     * is linux.
     */
    public function getWindowsOptions(): WindowsSecurityContextOptions|null
    {
        return $this->windowsOptions;
    }

    /**
     * The Windows specific settings applied to all containers. If unspecified, the options from the
     * PodSecurityContext will be used. If set in both SecurityContext and PodSecurityContext, the value
     * specified in SecurityContext takes precedence. Note that this field cannot be set when spec.os.name
     * is linux.
     *
     * @return static
     */
    public function setWindowsOptions(WindowsSecurityContextOptions $windowsOptions): static
    {
        $this->windowsOptions = $windowsOptions;

        return $this;
    }
}
