<?php

declare(strict_types=1);

namespace Tests\Kcs\K8s\Client;

use Http\Discovery\Psr17FactoryDiscovery;
use Kcs\K8s\Client\Options;
use Kcs\K8s\Contract\AuthType;
use Kcs\K8s\Contract\HttpClientFactoryInterface;
use Kcs\K8s\Contract\WebsocketClientFactoryInterface;
use Kcs\K8s\Websocket\Contract\WebsocketClientInterface;
use PHPUnit\Framework\TestCase;
use Prophecy\PhpUnit\ProphecyTrait;
use Psr\Cache\CacheItemPoolInterface;
use Psr\Http\Client\ClientInterface;

class OptionsTest extends TestCase
{
    use ProphecyTrait;

    private Options $subject;

    public function setUp(): void
    {
        parent::setUp();
        $this->subject = new Options(
            'https://foo.local/'
        );
    }

    public function testGetEndpoint(): void
    {
        $this->assertEquals('https://foo.local/', $this->subject->getEndpoint());
    }

    public function testGetNamespaceIsDefaultByDefault(): void
    {
        $this->assertEquals('default', $this->subject->getNamespace());
    }

    public function testGetAuthTypeIsTokenByDefault(): void
    {
        $this->assertEquals(AuthType::Token, $this->subject->getAuthType());
    }

    public function testGetSetHttpClient(): void
    {
        $client = $this->prophesize(ClientInterface::class);
        $this->subject->setHttpClient($client->reveal());

        $this->assertSame($client->reveal(), $this->subject->getHttpClient());
    }

    public function testGetSetCache(): void
    {
        $cache = $this->prophesize(CacheItemPoolInterface::class);
        $this->subject->setCache($cache->reveal());

        $this->assertSame($cache->reveal(), $this->subject->getCache());
    }

    public function testGetSetWebSocket(): void
    {
        $websocket = $this->prophesize(WebsocketClientInterface::class);
        $this->subject->setWebsocketClient($websocket->reveal());

        $this->assertSame($websocket->reveal(), $this->subject->getWebsocketClient());
    }

    public function testGetSetToken(): void
    {
        $this->subject->setToken('foo');

        $this->assertEquals('foo', $this->subject->getToken());
    }

    public function testGetSetUsername(): void
    {
        $this->subject->setUsername('foo');

        $this->assertEquals('foo', $this->subject->getUsername());
    }

    public function testGetSetPassword(): void
    {
        $this->subject->setPassword('foo');

        $this->assertEquals('foo', $this->subject->getPassword());
    }

    public function testGetSetHttpUriFactory(): void
    {
        $uriFactory = Psr17FactoryDiscovery::findUriFactory();

        $this->subject->setHttpUriFactory($uriFactory);
        $this->assertSame($uriFactory, $this->subject->getHttpUriFactory());
    }

    public function testGetSetEndpoint(): void
    {
        $this->subject->setEndpoint('https://foo');
        $this->assertEquals('https://foo', $this->subject->getEndpoint());
    }

    public function testGetSetNamespace(): void
    {
        $this->subject->setNamespace('meh');
        $this->assertEquals('meh', $this->subject->getNamespace());
    }

    public function testGetSetHttpRequestFactory(): void
    {
        $requestFactory = Psr17FactoryDiscovery::findRequestFactory();

        $this->subject->setHttpRequestFactory($requestFactory);
        $this->assertSame($requestFactory, $this->subject->getHttpRequestFactory());
    }

    public function testGetSetStreamFactory(): void
    {
        $streamFactory = Psr17FactoryDiscovery::findStreamFactory();

        $this->subject->setStreamFactory($streamFactory);
        $this->assertSame($streamFactory, $this->subject->getStreamFactory());
    }

    public function testGetSetWebsocketClientFactory(): void
    {
        $factory = $this->prophesize(WebsocketClientFactoryInterface::class);

        $this->subject->setWebsocketClientFactory($factory->reveal());
        $this->assertSame($factory->reveal(), $this->subject->getWebsocketClientFactory());
    }

    public function testGetSetHttpClientFactory(): void
    {
        $factory = $this->prophesize(HttpClientFactoryInterface::class);

        $this->subject->setHttpClientFactory($factory->reveal());
        $this->assertSame($factory->reveal(), $this->subject->getHttpClientFactory());
    }
}
