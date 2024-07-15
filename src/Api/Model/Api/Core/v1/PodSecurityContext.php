<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Core\v1;

use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;
use Kcs\K8s\Collection;

/**
 * PodSecurityContext holds pod-level security attributes and common container settings. Some fields
 * are also present in container.securityContext.  Field values of container.securityContext take
 * precedence over field values of PodSecurityContext.
 */
class PodSecurityContext
{
    #[Kubernetes\Attribute('appArmorProfile', type: AttributeType::Model, model: AppArmorProfile::class)]
    protected AppArmorProfile|null $appArmorProfile = null;

    #[Kubernetes\Attribute('fsGroup')]
    protected int|null $fsGroup = null;

    #[Kubernetes\Attribute('fsGroupChangePolicy')]
    protected string|null $fsGroupChangePolicy = null;

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

    /** @var int[]|null */
    #[Kubernetes\Attribute('supplementalGroups')]
    protected array|null $supplementalGroups = null;

    /** @var iterable|Sysctl[]|null */
    #[Kubernetes\Attribute('sysctls', type: AttributeType::Collection, model: Sysctl::class)]
    protected $sysctls = null;

    #[Kubernetes\Attribute('windowsOptions', type: AttributeType::Model, model: WindowsSecurityContextOptions::class)]
    protected WindowsSecurityContextOptions|null $windowsOptions = null;

    /**
     * appArmorProfile is the AppArmor options to use by the containers in this pod. Note that this field
     * cannot be set when spec.os.name is windows.
     */
    public function getAppArmorProfile(): AppArmorProfile|null
    {
        return $this->appArmorProfile;
    }

    /**
     * appArmorProfile is the AppArmor options to use by the containers in this pod. Note that this field
     * cannot be set when spec.os.name is windows.
     *
     * @return static
     */
    public function setAppArmorProfile(AppArmorProfile $appArmorProfile): static
    {
        $this->appArmorProfile = $appArmorProfile;

        return $this;
    }

    /**
     * A special supplemental group that applies to all containers in a pod. Some volume types allow the
     * Kubelet to change the ownership of that volume to be owned by the pod:
     *
     * 1. The owning GID will be the FSGroup 2. The setgid bit is set (new files created in the volume will
     * be owned by FSGroup) 3. The permission bits are OR'd with rw-rw----
     *
     * If unset, the Kubelet will not modify the ownership and permissions of any volume. Note that this
     * field cannot be set when spec.os.name is windows.
     */
    public function getFsGroup(): int|null
    {
        return $this->fsGroup;
    }

    /**
     * A special supplemental group that applies to all containers in a pod. Some volume types allow the
     * Kubelet to change the ownership of that volume to be owned by the pod:
     *
     * 1. The owning GID will be the FSGroup 2. The setgid bit is set (new files created in the volume will
     * be owned by FSGroup) 3. The permission bits are OR'd with rw-rw----
     *
     * If unset, the Kubelet will not modify the ownership and permissions of any volume. Note that this
     * field cannot be set when spec.os.name is windows.
     *
     * @return static
     */
    public function setFsGroup(int $fsGroup): static
    {
        $this->fsGroup = $fsGroup;

        return $this;
    }

    /**
     * fsGroupChangePolicy defines behavior of changing ownership and permission of the volume before being
     * exposed inside Pod. This field will only apply to volume types which support fsGroup based
     * ownership(and permissions). It will have no effect on ephemeral volume types such as: secret,
     * configmaps and emptydir. Valid values are "OnRootMismatch" and "Always". If not specified, "Always"
     * is used. Note that this field cannot be set when spec.os.name is windows.
     */
    public function getFsGroupChangePolicy(): string|null
    {
        return $this->fsGroupChangePolicy;
    }

    /**
     * fsGroupChangePolicy defines behavior of changing ownership and permission of the volume before being
     * exposed inside Pod. This field will only apply to volume types which support fsGroup based
     * ownership(and permissions). It will have no effect on ephemeral volume types such as: secret,
     * configmaps and emptydir. Valid values are "OnRootMismatch" and "Always". If not specified, "Always"
     * is used. Note that this field cannot be set when spec.os.name is windows.
     *
     * @return static
     */
    public function setFsGroupChangePolicy(string $fsGroupChangePolicy): static
    {
        $this->fsGroupChangePolicy = $fsGroupChangePolicy;

        return $this;
    }

    /**
     * The GID to run the entrypoint of the container process. Uses runtime default if unset. May also be
     * set in SecurityContext.  If set in both SecurityContext and PodSecurityContext, the value specified
     * in SecurityContext takes precedence for that container. Note that this field cannot be set when
     * spec.os.name is windows.
     */
    public function getRunAsGroup(): int|null
    {
        return $this->runAsGroup;
    }

    /**
     * The GID to run the entrypoint of the container process. Uses runtime default if unset. May also be
     * set in SecurityContext.  If set in both SecurityContext and PodSecurityContext, the value specified
     * in SecurityContext takes precedence for that container. Note that this field cannot be set when
     * spec.os.name is windows.
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
     * SecurityContext.  If set in both SecurityContext and PodSecurityContext, the value specified in
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
     * SecurityContext.  If set in both SecurityContext and PodSecurityContext, the value specified in
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
     * if unspecified. May also be set in SecurityContext.  If set in both SecurityContext and
     * PodSecurityContext, the value specified in SecurityContext takes precedence for that container. Note
     * that this field cannot be set when spec.os.name is windows.
     */
    public function getRunAsUser(): int|null
    {
        return $this->runAsUser;
    }

    /**
     * The UID to run the entrypoint of the container process. Defaults to user specified in image metadata
     * if unspecified. May also be set in SecurityContext.  If set in both SecurityContext and
     * PodSecurityContext, the value specified in SecurityContext takes precedence for that container. Note
     * that this field cannot be set when spec.os.name is windows.
     *
     * @return static
     */
    public function setRunAsUser(int $runAsUser): static
    {
        $this->runAsUser = $runAsUser;

        return $this;
    }

    /**
     * The SELinux context to be applied to all containers. If unspecified, the container runtime will
     * allocate a random SELinux context for each container.  May also be set in SecurityContext.  If set
     * in both SecurityContext and PodSecurityContext, the value specified in SecurityContext takes
     * precedence for that container. Note that this field cannot be set when spec.os.name is windows.
     */
    public function getSeLinuxOptions(): SELinuxOptions|null
    {
        return $this->seLinuxOptions;
    }

    /**
     * The SELinux context to be applied to all containers. If unspecified, the container runtime will
     * allocate a random SELinux context for each container.  May also be set in SecurityContext.  If set
     * in both SecurityContext and PodSecurityContext, the value specified in SecurityContext takes
     * precedence for that container. Note that this field cannot be set when spec.os.name is windows.
     *
     * @return static
     */
    public function setSeLinuxOptions(SELinuxOptions $seLinuxOptions): static
    {
        $this->seLinuxOptions = $seLinuxOptions;

        return $this;
    }

    /**
     * The seccomp options to use by the containers in this pod. Note that this field cannot be set when
     * spec.os.name is windows.
     */
    public function getSeccompProfile(): SeccompProfile|null
    {
        return $this->seccompProfile;
    }

    /**
     * The seccomp options to use by the containers in this pod. Note that this field cannot be set when
     * spec.os.name is windows.
     *
     * @return static
     */
    public function setSeccompProfile(SeccompProfile $seccompProfile): static
    {
        $this->seccompProfile = $seccompProfile;

        return $this;
    }

    /**
     * A list of groups applied to the first process run in each container, in addition to the container's
     * primary GID, the fsGroup (if specified), and group memberships defined in the container image for
     * the uid of the container process. If unspecified, no additional groups are added to any container.
     * Note that group memberships defined in the container image for the uid of the container process are
     * still effective, even if they are not included in this list. Note that this field cannot be set when
     * spec.os.name is windows.
     */
    public function getSupplementalGroups(): array|null
    {
        return $this->supplementalGroups;
    }

    /**
     * A list of groups applied to the first process run in each container, in addition to the container's
     * primary GID, the fsGroup (if specified), and group memberships defined in the container image for
     * the uid of the container process. If unspecified, no additional groups are added to any container.
     * Note that group memberships defined in the container image for the uid of the container process are
     * still effective, even if they are not included in this list. Note that this field cannot be set when
     * spec.os.name is windows.
     *
     * @return static
     */
    public function setSupplementalGroups(array $supplementalGroups): static
    {
        $this->supplementalGroups = $supplementalGroups;

        return $this;
    }

    /**
     * Sysctls hold a list of namespaced sysctls used for the pod. Pods with unsupported sysctls (by the
     * container runtime) might fail to launch. Note that this field cannot be set when spec.os.name is
     * windows.
     *
     * @return iterable|Sysctl[]
     */
    public function getSysctls(): iterable|null
    {
        return $this->sysctls;
    }

    /**
     * Sysctls hold a list of namespaced sysctls used for the pod. Pods with unsupported sysctls (by the
     * container runtime) might fail to launch. Note that this field cannot be set when spec.os.name is
     * windows.
     *
     * @return static
     */
    public function setSysctls(iterable $sysctls): static
    {
        $this->sysctls = $sysctls;

        return $this;
    }

    /** @return static */
    public function addSysctls(Sysctl $sysctl): static
    {
        if (! $this->sysctls) {
            $this->sysctls = new Collection();
        }

        $this->sysctls[] = $sysctl;

        return $this;
    }

    /**
     * The Windows specific settings applied to all containers. If unspecified, the options within a
     * container's SecurityContext will be used. If set in both SecurityContext and PodSecurityContext, the
     * value specified in SecurityContext takes precedence. Note that this field cannot be set when
     * spec.os.name is linux.
     */
    public function getWindowsOptions(): WindowsSecurityContextOptions|null
    {
        return $this->windowsOptions;
    }

    /**
     * The Windows specific settings applied to all containers. If unspecified, the options within a
     * container's SecurityContext will be used. If set in both SecurityContext and PodSecurityContext, the
     * value specified in SecurityContext takes precedence. Note that this field cannot be set when
     * spec.os.name is linux.
     *
     * @return static
     */
    public function setWindowsOptions(WindowsSecurityContextOptions $windowsOptions): static
    {
        $this->windowsOptions = $windowsOptions;

        return $this;
    }
}
