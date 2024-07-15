<?php

declare(strict_types=1);

namespace Kcs\K8s\Client\KubeConfig\Model;

readonly class UserExec
{
    public function __construct(private array $exec)
    {
    }

    public function getCommand(): string
    {
        return $this->exec['command'];
    }

    public function getApiVersion(): string
    {
        return $this->exec['apiVersion'];
    }

    /** @return array<string, string> */
    public function getEnv(): array
    {
        return $this->exec['env'] ?? [];
    }

    /** @return array<int, string> */
    public function getArgs(): array
    {
        return $this->exec['args'] ?? [];
    }

    public function getInstallHint(): string|null
    {
        return $this->exec['installHint'] ?? null;
    }

    public function isProviderClusterInfo(): bool
    {
        return $this->exec['provideClusterInfo'] ?? false;
    }
}
