<?php

declare(strict_types=1);

namespace Kcs\K8s\Client\Metadata;

class OperationMetadata
{
    private const ACTIONS = [
        'watch-all' => 'watch',
        'list-all' => 'list',
        'deletecollection-all' => 'deletecollection',
    ];

    public string $type;
    public string $path;
    public string|null $body = null;
    public string|null $response = null;

    public function isBodyRequired(): bool
    {
        return $this->body !== null;
    }

    public function isResponseSelf(): bool
    {
        return $this->response === 'self';
    }

    public function getResponseFqcn(): string|null
    {
        if ($this->isResponseSelf()) {
            return null;
        }

        return $this->response;
    }

    public function getKubernetesAction(): string
    {
        return self::ACTIONS[$this->type] ?? $this->type;
    }
}
