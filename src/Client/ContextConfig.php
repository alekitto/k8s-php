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
        if ($this->context) {
            return $this->context->getAuthType();
        }

        return $this->options->getAuthType();
    }

    public function getClientKeyData(): string|null
    {
        if ($this->context) {
            return $this->context->getUserClientKeyData();
        }

        return null;
    }

    public function getClientKey(): string|null
    {
        if ($this->context) {
            return $this->context->getUserClientKey();
        }

        return null;
    }

    public function getClientCertificate(): string|null
    {
        if ($this->context) {
            return $this->context->getUserClientCertificate();
        }

        return null;
    }

    public function getClientCertificateData(): string|null
    {
        if ($this->context) {
            return $this->context->getUserClientCertificateData();
        }

        return null;
    }

    public function getUsername(): string|null
    {
        if ($this->context) {
            return $this->context->getUserUsername();
        }

        return $this->options->getUsername();
    }

    public function getPassword(): string|null
    {
        if ($this->context) {
            return $this->context->getUserPassword();
        }

        return $this->options->getPassword();
    }

    public function getToken(): string|null
    {
        if ($this->context) {
            return $this->context->getUserToken();
        }

        return $this->options->getToken();
    }

    public function getServer(): string
    {
        if ($this->context) {
            return $this->context->getServer();
        }

        return $this->options->getEndpoint();
    }

    public function getServerCertificateAuthority(): string|null
    {
        if ($this->context) {
            return $this->context->getServerCertificateAuthority();
        }

        return null;
    }

    public function getServerCertificateAuthorityData(): string|null
    {
        if ($this->context) {
            return $this->context->getServerCertificateAuthorityData();
        }

        return null;
    }

    public function getNamespace(): string
    {
        if ($this->context && $this->context->getNamespace()) {
            return $this->context->getNamespace();
        }

        return $this->options->getNamespace();
    }
}
