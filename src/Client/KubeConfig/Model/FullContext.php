<?php

declare(strict_types=1);

namespace Kcs\K8s\Client\KubeConfig\Model;

use Kcs\K8s\Contract\AuthType;

class FullContext
{
    public function __construct(private Context $context, private Cluster $cluster, private User $user)
    {
    }

    public function getUserClientCertificate(): string|null
    {
        return $this->user->getClientCertificate();
    }

    public function getUserClientCertificateData(): string|null
    {
        return $this->user->getClientCertificateData();
    }

    public function getUserClientKey(): string|null
    {
        return $this->user->getClientKey();
    }

    public function getUserClientKeyData(): string|null
    {
        return $this->user->getClientKeyData();
    }

    public function getUserToken(): string|null
    {
        return $this->user->getToken();
    }

    public function getUserTokenFile(): string|null
    {
        return $this->user->getTokenFile();
    }

    public function getUserUsername(): string|null
    {
        return $this->user->getUsername();
    }

    public function getUserPassword(): string|null
    {
        return $this->user->getPassword();
    }

    public function getServerCertificateAuthority(): string|null
    {
        return $this->cluster->getCertificateAuthority();
    }

    public function getServerCertificateAuthorityData(): string|null
    {
        return $this->cluster->getCertificateAuthorityData();
    }

    public function getAuthType(): AuthType
    {
        return $this->user->getAuthType();
    }

    public function getServer(): string
    {
        return $this->cluster->getServer();
    }

    public function getNamespace(): string|null
    {
        return $this->context->getNamespace();
    }
}
