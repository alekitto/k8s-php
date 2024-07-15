<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Core\v1;

use Kcs\K8s\Attribute as Kubernetes;
use Kcs\K8s\Attribute\AttributeType;

/**
 * ContainerUser represents user identity information
 */
class ContainerUser
{
    #[Kubernetes\Attribute('linux', type: AttributeType::Model, model: LinuxContainerUser::class)]
    protected LinuxContainerUser|null $linux = null;

    public function __construct(LinuxContainerUser|null $linux = null)
    {
        $this->linux = $linux;
    }

    /**
     * Linux holds user identity information initially attached to the first process of the containers in
     * Linux. Note that the actual running identity can be changed if the process has enough privilege to
     * do so.
     */
    public function getLinux(): LinuxContainerUser|null
    {
        return $this->linux;
    }

    /**
     * Linux holds user identity information initially attached to the first process of the containers in
     * Linux. Note that the actual running identity can be changed if the process has enough privilege to
     * do so.
     *
     * @return static
     */
    public function setLinux(LinuxContainerUser $linux): static
    {
        $this->linux = $linux;

        return $this;
    }
}
