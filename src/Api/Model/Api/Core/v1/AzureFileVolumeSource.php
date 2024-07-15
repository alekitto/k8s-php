<?php

declare(strict_types=1);

namespace Kcs\K8s\Api\Model\Api\Core\v1;

use Kcs\K8s\Attribute as Kubernetes;

/**
 * AzureFile represents an Azure File Service mount on the host and bind mount to the pod.
 */
class AzureFileVolumeSource
{
    #[Kubernetes\Attribute('readOnly')]
    protected bool|null $readOnly = null;

    #[Kubernetes\Attribute('secretName', required: true)]
    protected string $secretName;

    #[Kubernetes\Attribute('shareName', required: true)]
    protected string $shareName;

    public function __construct(string $secretName, string $shareName)
    {
        $this->secretName = $secretName;
        $this->shareName = $shareName;
    }

    /**
     * readOnly defaults to false (read/write). ReadOnly here will force the ReadOnly setting in
     * VolumeMounts.
     */
    public function isReadOnly(): bool|null
    {
        return $this->readOnly;
    }

    /**
     * readOnly defaults to false (read/write). ReadOnly here will force the ReadOnly setting in
     * VolumeMounts.
     *
     * @return static
     */
    public function setIsReadOnly(bool $readOnly): static
    {
        $this->readOnly = $readOnly;

        return $this;
    }

    /**
     * secretName is the  name of secret that contains Azure Storage Account Name and Key
     */
    public function getSecretName(): string
    {
        return $this->secretName;
    }

    /**
     * secretName is the  name of secret that contains Azure Storage Account Name and Key
     *
     * @return static
     */
    public function setSecretName(string $secretName): static
    {
        $this->secretName = $secretName;

        return $this;
    }

    /**
     * shareName is the azure share Name
     */
    public function getShareName(): string
    {
        return $this->shareName;
    }

    /**
     * shareName is the azure share Name
     *
     * @return static
     */
    public function setShareName(string $shareName): static
    {
        $this->shareName = $shareName;

        return $this;
    }
}
