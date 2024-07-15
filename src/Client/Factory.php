<?php

declare(strict_types=1);

namespace Kcs\K8s\Client;

use Http\Discovery\Exception\NotFoundException;
use Http\Discovery\Psr17FactoryDiscovery;
use Kcs\ClassFinder\Finder\ComposerFinder;
use Kcs\ClassFinder\Finder\FinderInterface;
use Kcs\K8s\Api\Service\ServiceFactory;
use Kcs\K8s\Client\Exception\RuntimeException;
use Kcs\K8s\Client\File\ArchiveFactory;
use Kcs\K8s\Client\Http\Api;
use Kcs\K8s\Client\Http\HttpClient;
use Kcs\K8s\Client\Http\HttpClientFactory;
use Kcs\K8s\Client\Http\RequestFactory;
use Kcs\K8s\Client\Http\UriBuilder;
use Kcs\K8s\Client\Kind\KindManager;
use Kcs\K8s\Client\KubeConfig\ContextConfigFactory;
use Kcs\K8s\Client\Metadata\ClassMetadataFactory;
use Kcs\K8s\Client\Metadata\Processor\AttributesProcessorLoader;
use Kcs\K8s\Client\Serialization\Contract\DenormalizerInterface;
use Kcs\K8s\Client\Serialization\Contract\NormalizerInterface;
use Kcs\K8s\Client\Serialization\ModelDenormalizer;
use Kcs\K8s\Client\Serialization\ModelNormalizer;
use Kcs\K8s\Client\Serialization\Serializer;
use Kcs\K8s\Client\Websocket\WebsocketAdapterFactory;
use Kcs\K8s\Client\Websocket\WebsocketClientFactory;
use Kcs\K8s\Contract\ApiInterface;
use Kcs\Metadata\Factory\MetadataFactoryInterface;
use Kcs\Metadata\Loader\Processor\ProcessorFactory;
use Psr\Cache\CacheItemPoolInterface;
use Psr\Http\Message\StreamFactoryInterface;

class Factory
{
    private ContextConfigFactory|null $contextConfigFactory = null;

    private ServiceFactory $serviceFactory;

    private HttpClientFactory $httpClientFactory;

    private HttpClient $httpClient;

    private RequestFactory $requestFactory;

    private Serializer $serializer;

    private UriBuilder $uriBuilder;

    private WebsocketAdapterFactory $websocketAdapterFactory;

    private WebsocketClientFactory $websocketClientFactory;

    private KindManager $kindManager;

    private ApiInterface $api;

    private NormalizerInterface $normalizer;

    private DenormalizerInterface $denormalizer;

    private ArchiveFactory $archiveFactory;

    private MetadataFactoryInterface $metadataFactory;

    private readonly CacheItemPoolInterface|null $cacheItemPool;

    public function __construct(private readonly Options $options)
    {
        $this->cacheItemPool = $this->options->getCache();
    }

    public function serviceFactory(): ServiceFactory
    {
        if (isset($this->serviceFactory)) {
            return $this->serviceFactory;
        }

        $this->serviceFactory = new ServiceFactory($this->makeApi());

        return $this->serviceFactory;
    }

    public function normalizer(): NormalizerInterface
    {
        if (isset($this->normalizer)) {
            return $this->normalizer;
        }

        $this->normalizer = new ModelNormalizer($this->metadataFactory());

        return $this->normalizer;
    }

    public function denormalizer(): DenormalizerInterface
    {
        if (isset($this->denormalizer)) {
            return $this->denormalizer;
        }

        $this->denormalizer = new ModelDenormalizer($this->metadataFactory());

        return $this->denormalizer;
    }

    public function serializer(): Serializer
    {
        if (isset($this->serializer)) {
            return $this->serializer;
        }

        $this->serializer = new Serializer(
            $this->normalizer(),
            $this->denormalizer(),
        );

        return $this->serializer;
    }

    public function metadataFactory(FinderInterface $classFinder = new ComposerFinder()): MetadataFactoryInterface
    {
        if (isset($this->metadataFactory)) {
            return $this->metadataFactory;
        }

        $processorFactory = new ProcessorFactory();
        $processorFactory->registerProcessors(__DIR__ . '/Metadata/Processor');

        return $this->metadataFactory = new ClassMetadataFactory(new AttributesProcessorLoader($processorFactory), $classFinder, cache: $this->cacheItemPool);
    }

    public function requestFactory(): RequestFactory
    {
        if (isset($this->requestFactory)) {
            return $this->requestFactory;
        }

        try {
            $this->requestFactory = new RequestFactory(
                $this->options->getHttpRequestFactory() ?? Psr17FactoryDiscovery::findRequestFactory(),
                $this->streamFactory(),
                $this->options->getHttpUriFactory() ?? Psr17FactoryDiscovery::findUriFactory(),
                $this->contextConfigFactory(),
            );
        } catch (NotFoundException $exception) {
            throw new RuntimeException(
                'You must provide a PSR-18 compatible HTTP Client and a PSR-17 compatible request / stream factory.',
                $exception->getCode(),
                $exception,
            );
        }

        return $this->requestFactory;
    }

    public function streamFactory(): StreamFactoryInterface
    {
        try {
            return $this->options->getStreamFactory() ?? Psr17FactoryDiscovery::findStreamFactory();
        } catch (NotFoundException $exception) {
            throw new RuntimeException(
                'You must install or provide a PSR-17 compatible stream factory.',
                $exception->getCode(),
                $exception,
            );
        }
    }

    public function archiveFactory(): ArchiveFactory
    {
        if (isset($this->archiveFactory)) {
            return $this->archiveFactory;
        }

        $this->archiveFactory = new ArchiveFactory($this->streamFactory());

        return $this->archiveFactory;
    }

    public function httpClientFactory(): HttpClientFactory
    {
        if (isset($this->httpClientFactory)) {
            return $this->httpClientFactory;
        }

        $this->httpClientFactory = new HttpClientFactory(
            $this->contextConfigFactory(),
            $this->options->getHttpClient(),
            $this->options->getHttpClientFactory(),
        );

        return $this->httpClientFactory;
    }

    public function httpClient(): HttpClient
    {
        if (isset($this->httpClient)) {
            return $this->httpClient;
        }

        $this->httpClient = new HttpClient(
            $this->requestFactory(),
            $this->httpClientFactory(),
            $this->serializer(),
        );

        return $this->httpClient;
    }

    public function makeUriBuilder(): UriBuilder
    {
        if (isset($this->uriBuilder)) {
            return $this->uriBuilder;
        }

        $this->uriBuilder = new UriBuilder($this->options);

        return $this->uriBuilder;
    }

    public function contextConfigFactory(): ContextConfigFactory
    {
        if (isset($this->contextConfigFactory)) {
            return $this->contextConfigFactory;
        }

        $this->contextConfigFactory = new ContextConfigFactory($this->options);

        return $this->contextConfigFactory;
    }

    public function websocketAdapterFactory(): WebsocketAdapterFactory
    {
        if (isset($this->websocketAdapterFactory)) {
            return $this->websocketAdapterFactory;
        }

        $this->websocketAdapterFactory = new WebsocketAdapterFactory(
            $this->options,
            $this->contextConfigFactory(),
        );

        return $this->websocketAdapterFactory;
    }

    public function makeWebsocketClientFactory(): WebsocketClientFactory
    {
        if (isset($this->websocketClientFactory)) {
            return $this->websocketClientFactory;
        }

        $this->websocketClientFactory = new WebsocketClientFactory(
            $this->websocketAdapterFactory(),
            $this->requestFactory(),
        );

        return $this->websocketClientFactory;
    }

    public function makeKindManager(): KindManager
    {
        if (isset($this->kindManager)) {
            return $this->kindManager;
        }

        $this->kindManager = new KindManager(
            $this->httpClient(),
            $this->makeUriBuilder(),
            $this->metadataFactory(),
            $this->options,
        );

        return $this->kindManager;
    }

    public function makeApi(): ApiInterface
    {
        if (isset($this->api)) {
            return $this->api;
        }

        $this->api = new Api(
            $this->httpClient(),
            $this->makeWebsocketClientFactory(),
            $this->makeUriBuilder(),
        );

        return $this->api;
    }
}
