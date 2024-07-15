<?php

declare(strict_types=1);

namespace Kcs\K8s\ApiGenerator\Github;

use Kcs\K8s\ApiGenerator\Exception\GithubException;
use Symfony\Component\HttpClient\Exception\ClientException;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Contracts\HttpClient\HttpClientInterface;

use function json_decode;
use function ltrim;
use function pathinfo;
use function sprintf;
use function urlencode;

use const JSON_THROW_ON_ERROR;

class GithubClient
{
    private const GITHUB_API_BASE = 'https://api.github.com';

    private HttpClientInterface $httpClient;

    public function __construct(HttpClientInterface|null $httpClient = null)
    {
        $this->httpClient = $httpClient ?? HttpClient::create();
    }

    public function getTags(string $owner, string $repo): GitTags
    {
        $gitTags = [];

        try {
            $response = $this->httpClient->request(
                'GET',
                $this->makeApiUri('/repos/' . $owner . '/' . $repo . '/git/refs/tags'),
                $this->makeHttpOptions(),
            );
            $tags = json_decode($response->getContent(), true, 512, JSON_THROW_ON_ERROR);
        } catch (ClientException $e) {
            if ($e->getCode() !== 404) {
                throw $e;
            }

            $tags = [];
        }

        foreach ($tags as $tag) {
            $gitTags[] = new GitTag($tag);
        }

        return new GitTags($gitTags);
    }

    public function getBlob(string $owner, string $repo, GitTag $tag, string $path): GitBlob
    {
        $pathInfo = pathinfo($path);
        $basePath = urlencode(ltrim($pathInfo['dirname'] ?? '', '/'));

        $response = $this->httpClient->request(
            'GET',
            $this->makeApiUri('/repos/' . $owner . '/' . $repo . '/git/trees/' . $tag->getCommonName() . ':' . $basePath),
            $this->makeHttpOptions(),
        );
        $tree = json_decode($response->getContent(), true, 512, JSON_THROW_ON_ERROR);

        $sha = null;
        foreach ($tree['tree'] as $branch) {
            if ($branch['path'] !== $pathInfo['basename']) {
                continue;
            }

            $sha = $branch['sha'];
        }

        if ($sha === null) {
            throw new GithubException(sprintf(
                'Unable to find the file in path "%s".',
                $path,
            ));
        }

        $response = $this->httpClient->request(
            'GET',
            $this->makeApiUri('/repos/' . $owner . '/' . $repo . '/git/blobs/' . $sha),
            $this->makeHttpOptions(),
        );

        $content = json_decode($response->getContent(), true, 512, JSON_THROW_ON_ERROR);

        return new GitBlob($content);
    }

    private function makeApiUri(string $path): string
    {
        return self::GITHUB_API_BASE . $path;
    }

    /** @return array<string, mixed> */
    private function makeHttpOptions(): array
    {
        return [
            'headers' => ['User-Agent' => 'K8s API Generator'],
        ];
    }
}
