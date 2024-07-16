<?php

declare(strict_types=1);

namespace Kcs\K8s\ApiGenerator\Github;

use function array_shift;
use function explode;
use function parse_url;
use function sprintf;
use function str_contains;
use function str_starts_with;
use function strtolower;
use function substr;

use const PHP_URL_PATH;

readonly class GitTag
{
    private string $ref;
    private string $commonName;
    private string $repositoryOwner;
    private string $repositoryName;

    /** @param array<string, mixed> $tag */
    public function __construct(array $tag)
    {
        $this->ref = $tag['ref'];
        $this->commonName = substr($tag['ref'], 10);

        $path = explode('/', parse_url($tag['url'], PHP_URL_PATH));
        array_shift($path); // ""
        array_shift($path); // "repos"

        $this->repositoryOwner = array_shift($path);
        $this->repositoryName = array_shift($path);
    }

    public function getRef(): string
    {
        return $this->ref;
    }

    public function getCommonName(): string
    {
        return $this->commonName;
    }

    public function getRepositoryName(): string
    {
        return $this->repositoryName;
    }

    public function getDownloadUrl(string $format = 'zip'): string
    {
        return sprintf('https://github.com/%s/%s/archive/%s.%s', $this->repositoryOwner, $this->repositoryName, $this->ref, $format);
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
