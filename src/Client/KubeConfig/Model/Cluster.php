<?php

declare(strict_types=1);

namespace Kcs\K8s\Client\KubeConfig\Model;

readonly class Cluster
{
    public function __construct(private array $data)
    {
    }

    public function getCertificateAuthority(): string|null
    {
        return $this->data['cluster']['certificate-authority'] ?? null;
    }

    public function getCertificateAuthorityData(): string|null
    {
        return $this->data['cluster']['certificate-authority-data'] ?? null;
    }

    public function getServer(): string
    {
        return $this->data['cluster']['server'];
    }

    public function getName(): string
    {
        return $this->data['name'];
    }

    public function __toString(): string
    {
        return $this->getName();
    }
}
