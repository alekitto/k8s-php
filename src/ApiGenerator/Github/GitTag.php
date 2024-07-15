<?php

declare(strict_types=1);

namespace Kcs\K8s\ApiGenerator\Github;

use function str_contains;
use function str_starts_with;
use function strtolower;
use function substr;

readonly class GitTag
{
    /** @param array<string, mixed> $tag */
    public function __construct(private array $tag)
    {
    }

    public function getRef(): string
    {
        return $this->tag['ref'];
    }

    public function getCommonName(): string
    {
        return substr($this->tag['ref'], 10);
    }

    public function isStable(): bool
    {
        $version = strtolower($this->getCommonName());

        return ! str_contains($version, '-rc')
            && ! str_contains($version, '-beta')
            && ! str_contains($version, '-dev')
            && ! str_contains($version, '-alpha');
    }

    public function startsWith(string $name): bool
    {
        return str_starts_with($this->getCommonName(), $name);
    }
}
