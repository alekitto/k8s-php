<?php

declare(strict_types=1);

namespace Kcs\K8s\Client\KubeConfig\Model;

readonly class Context
{
    public function __construct(private array $data)
    {
    }

    public function getName(): string
    {
        return $this->data['name'];
    }

    public function getClusterName(): string
    {
        return $this->data['context']['cluster'];
    }

    public function getUserName(): string
    {
        return $this->data['context']['user'];
    }

    public function getNamespace(): string|null
    {
        return $this->data['context']['namespace'] ?? null;
    }

    public function __toString(): string
    {
        return $this->getName();
    }
}
