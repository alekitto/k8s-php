<?php

declare(strict_types=1);

namespace Kcs\K8s\Client;

use Kcs\K8s\Client\KubeConfig\Model\FullContext;
use Kcs\K8s\Contract\AuthType;
use Kcs\K8s\Contract\ContextConfigInterface;

readonly class ContextConfig implements ContextConfigInterface
{
    public function __construct(private Options $options, private FullContext|null $context = null)
    {
    }

    public function getAuthType(): AuthType
    {
        return $this->context?->getAuthType() ??
            $this->options->getAuthType();
    }

    public function getClientKeyData(): string|null
    {
        return $this->context?->getUserClientKeyData();
    }

    public function getClientKey(): string|null
    {
        return $this->context?->getUserClientKey();
    }

    public function getClientCertificate(): string|null
    {
        return $this->context?->getUserClientCertificate();
    }

    public function getClientCertificateData(): string|null
    {
        return $this->context?->getUserClientCertificateData();
    }

    public function getUsername(): string|null
    {
        return $this->context?->getUserUsername() ??
            $this->options->getUsername();
    }

    public function getPassword(): string|null
    {
        return $this->context?->getUserPassword() ??
            $this->options->getPassword();
    }

    public function getToken(): string|null
    {
        return $this->context?->getUserToken() ??
            $this->options->getToken();
    }

    public function getServer(): string
    {
        return $this->context?->getServer() ??
            $this->options->getEndpoint();
    }

    public function getServerCertificateAuthority(): string|null
    {
        return $this->context?->getServerCertificateAuthority() ??
            $this->options->getServerCertificateAuthority();
    }

    public function getServerCertificateAuthorityData(): string|null
    {
        return $this->context?->getServerCertificateAuthorityData();
    }

    public function getNamespace(): string
    {
        return $this->context?->getNamespace() ??
            $this->options->getNamespace();
    }
}
