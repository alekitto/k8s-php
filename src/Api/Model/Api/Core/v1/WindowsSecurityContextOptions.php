<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Core\v1;

use Kcs\K8s\Attribute as Kubernetes;

/**
 * WindowsSecurityContextOptions contain Windows-specific options and credentials.
 */
class WindowsSecurityContextOptions
{
    #[Kubernetes\Attribute('gmsaCredentialSpec')]
    protected string|null $gmsaCredentialSpec = null;

    #[Kubernetes\Attribute('gmsaCredentialSpecName')]
    protected string|null $gmsaCredentialSpecName = null;

    #[Kubernetes\Attribute('hostProcess')]
    protected bool|null $hostProcess = null;

    #[Kubernetes\Attribute('runAsUserName')]
    protected string|null $runAsUserName = null;

    public function __construct(
        string|null $gmsaCredentialSpec = null,
        string|null $gmsaCredentialSpecName = null,
        bool|null $hostProcess = null,
        string|null $runAsUserName = null,
    ) {
        $this->gmsaCredentialSpec = $gmsaCredentialSpec;
        $this->gmsaCredentialSpecName = $gmsaCredentialSpecName;
        $this->hostProcess = $hostProcess;
        $this->runAsUserName = $runAsUserName;
    }

    /**
     * GMSACredentialSpec is where the GMSA admission webhook
     * (https://github.com/kubernetes-sigs/windows-gmsa) inlines the contents of the GMSA credential spec
     * named by the GMSACredentialSpecName field.
     */
    public function getGmsaCredentialSpec(): string|null
    {
        return $this->gmsaCredentialSpec;
    }

    /**
     * GMSACredentialSpec is where the GMSA admission webhook
     * (https://github.com/kubernetes-sigs/windows-gmsa) inlines the contents of the GMSA credential spec
     * named by the GMSACredentialSpecName field.
     *
     * @return static
     */
    public function setGmsaCredentialSpec(string $gmsaCredentialSpec): static
    {
        $this->gmsaCredentialSpec = $gmsaCredentialSpec;

        return $this;
    }

    /**
     * GMSACredentialSpecName is the name of the GMSA credential spec to use.
     */
    public function getGmsaCredentialSpecName(): string|null
    {
        return $this->gmsaCredentialSpecName;
    }

    /**
     * GMSACredentialSpecName is the name of the GMSA credential spec to use.
     *
     * @return static
     */
    public function setGmsaCredentialSpecName(string $gmsaCredentialSpecName): static
    {
        $this->gmsaCredentialSpecName = $gmsaCredentialSpecName;

        return $this;
    }

    /**
     * HostProcess determines if a container should be run as a 'Host Process' container. All of a Pod's
     * containers must have the same effective HostProcess value (it is not allowed to have a mix of
     * HostProcess containers and non-HostProcess containers). In addition, if HostProcess is true then
     * HostNetwork must also be set to true.
     */
    public function isHostProcess(): bool|null
    {
        return $this->hostProcess;
    }

    /**
     * HostProcess determines if a container should be run as a 'Host Process' container. All of a Pod's
     * containers must have the same effective HostProcess value (it is not allowed to have a mix of
     * HostProcess containers and non-HostProcess containers). In addition, if HostProcess is true then
     * HostNetwork must also be set to true.
     *
     * @return static
     */
    public function setIsHostProcess(bool $hostProcess): static
    {
        $this->hostProcess = $hostProcess;

        return $this;
    }

    /**
     * The UserName in Windows to run the entrypoint of the container process. Defaults to the user
     * specified in image metadata if unspecified. May also be set in PodSecurityContext. If set in both
     * SecurityContext and PodSecurityContext, the value specified in SecurityContext takes precedence.
     */
    public function getRunAsUserName(): string|null
    {
        return $this->runAsUserName;
    }

    /**
     * The UserName in Windows to run the entrypoint of the container process. Defaults to the user
     * specified in image metadata if unspecified. May also be set in PodSecurityContext. If set in both
     * SecurityContext and PodSecurityContext, the value specified in SecurityContext takes precedence.
     *
     * @return static
     */
    public function setRunAsUserName(string $runAsUserName): static
    {
        $this->runAsUserName = $runAsUserName;

        return $this;
    }
}
