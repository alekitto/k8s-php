<?php

declare(strict_types=1);

namespace Kcs\K8s\Client\KubeConfig\Model;

use Kcs\K8s\Client\Exception\RuntimeException;
use Kcs\K8s\Contract\AuthType;

readonly class User
{
    public function __construct(private array $data)
    {
    }

    public function getAuthType(): AuthType
    {
        if ($this->getClientKey() !== null || $this->getClientKeyData() !== null) {
            return AuthType::Certificate;
        }

        if ($this->getExec() !== null || $this->getToken() !== null || $this->getTokenFile() !== null) {
            return AuthType::Token;
        }

        if ($this->getUsername() !== null) {
            return AuthType::Basic;
        }

        throw new RuntimeException('Unable to determine the auth type defined for the user.');
    }

    public function getName(): string
    {
        return $this->data['name'];
    }

    public function getClientCertificate(): string|null
    {
        return $this->data['user']['client-certificate'] ?? null;
    }

    public function getClientCertificateData(): string|null
    {
        return $this->data['user']['client-certificate-data'] ?? null;
    }

    public function getClientKey(): string|null
    {
        return $this->data['user']['client-key'] ?? null;
    }

    public function getClientKeyData(): string|null
    {
        return $this->data['user']['client-key-data'] ?? null;
    }

    public function getUsername(): string|null
    {
        return $this->data['user']['username'] ?? null;
    }

    public function getPassword(): string|null
    {
        return $this->data['user']['password'] ?? null;
    }

    public function getToken(): string|null
    {
        return $this->data['user']['token'] ?? null;
    }

    public function getTokenFile(): string|null
    {
        return $this->data['user']['token-file'] ?? null;
    }

    public function getExec(): UserExec|null
    {
        return isset($this->data['user']['exec']) ? new UserExec($this->data['user']['exec']) : null;
    }

    public function __toString(): string
    {
        return $this->getName();
    }
}
