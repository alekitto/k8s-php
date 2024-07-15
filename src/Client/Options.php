<?php

declare(strict_types=1);

namespace Kcs\K8s\Client;

use Kcs\K8s\Client\KubeConfig\Model\FullContext;
use Kcs\K8s\Contract\AuthType;
use Kcs\K8s\Contract\HttpClientFactoryInterface;
use Kcs\K8s\Contract\WebsocketClientFactoryInterface;
use Kcs\K8s\Websocket\Contract\WebsocketClientInterface;
use Psr\Cache\CacheItemPoolInterface;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\StreamFactoryInterface;
use Psr\Http\Message\UriFactoryInterface;

class Options
{
    private CacheItemPoolInterface|null $cache = null;

    private ClientInterface|null $httpClient = null;

    private WebsocketClientInterface|null $websocketClient = null;

    private RequestFactoryInterface|null $httpRequestFactory = null;

    private StreamFactoryInterface|null $streamFactory = null;

    private UriFactoryInterface|null $uriFactory = null;

    private string|null $token = null;

    private string|null $username = null;

    private string|null $password = null;

    private AuthType $authType = AuthType::Token;

    private FullContext|null $configContext = null;

    private HttpClientFactoryInterface|null $httpClientFactory = null;

    private WebsocketClientFactoryInterface|null $websocketClientFactory = null;

    public function __construct(
        private string $endpoint,
        private string $namespace = 'default',
    ) {
    }

    public function getEndpoint(): string
    {
        return $this->endpoint;
    }

    public function setEndpoint(string $endpoint): self
    {
        $this->endpoint = $endpoint;

        return $this;
    }

    public function getNamespace(): string
    {
        return $this->namespace;
    }

    public function setNamespace(string $namespace): self
    {
        $this->namespace = $namespace;

        return $this;
    }

    public function setCache(CacheItemPoolInterface $cache): self
    {
        $this->cache = $cache;

        return $this;
    }

    public function getCache(): CacheItemPoolInterface|null
    {
        return $this->cache;
    }

    public function setHttpClient(ClientInterface $client): self
    {
        $this->httpClient = $client;

        return $this;
    }

    public function getHttpClient(): ClientInterface|null
    {
        return $this->httpClient;
    }

    public function setHttpUriFactory(UriFactoryInterface $uriFactory): self
    {
        $this->uriFactory = $uriFactory;

        return $this;
    }

    public function getHttpUriFactory(): UriFactoryInterface|null
    {
        return $this->uriFactory;
    }

    public function getHttpRequestFactory(): RequestFactoryInterface|null
    {
        return $this->httpRequestFactory;
    }

    public function setHttpRequestFactory(RequestFactoryInterface $httpRequestFactory): self
    {
        $this->httpRequestFactory = $httpRequestFactory;

        return $this;
    }

    public function getStreamFactory(): StreamFactoryInterface|null
    {
        return $this->streamFactory;
    }

    public function setStreamFactory(StreamFactoryInterface $streamFactory): self
    {
        $this->streamFactory = $streamFactory;

        return $this;
    }

    public function getToken(): string|null
    {
        return $this->token;
    }

    public function setToken(string $token): self
    {
        $this->token = $token;

        return $this;
    }

    public function getAuthType(): AuthType
    {
        return $this->authType;
    }

    public function setAuthType(AuthType $authType): self
    {
        $this->authType = $authType;

        return $this;
    }

    public function getUsername(): string|null
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getPassword(): string|null
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getWebsocketClient(): WebsocketClientInterface|null
    {
        return $this->websocketClient;
    }

    public function setWebsocketClient(WebsocketClientInterface $websocketClient): self
    {
        $this->websocketClient = $websocketClient;

        return $this;
    }

    public function getKubeConfigContext(): FullContext|null
    {
        return $this->configContext;
    }

    public function setKubeConfigContext(FullContext $context): self
    {
        $this->configContext = $context;

        return $this;
    }

    public function getHttpClientFactory(): HttpClientFactoryInterface|null
    {
        return $this->httpClientFactory;
    }

    public function setHttpClientFactory(HttpClientFactoryInterface $httpClientFactory): self
    {
        $this->httpClientFactory = $httpClientFactory;

        return $this;
    }

    public function getWebsocketClientFactory(): WebsocketClientFactoryInterface|null
    {
        return $this->websocketClientFactory;
    }

    public function setWebsocketClientFactory(WebsocketClientFactoryInterface $websocketClientFactory): self
    {
        $this->websocketClientFactory = $websocketClientFactory;

        return $this;
    }
}
