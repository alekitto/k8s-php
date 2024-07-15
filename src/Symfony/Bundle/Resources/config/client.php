<?php

declare(strict_types=1);

namespace Symfony\Component\DependencyInjection\Loader\Configurator;

use Kcs\ClassFinder\Finder\ComposerFinder;
use Kcs\K8s\Api\Service\ServiceFactory;
use Kcs\K8s\Client\File\ArchiveFactory;
use Kcs\K8s\Client\Http\Api;
use Kcs\K8s\Client\Http\HttpClient;
use Kcs\K8s\Client\Http\HttpClientFactory;
use Kcs\K8s\Client\Http\RequestFactory;
use Kcs\K8s\Client\Http\UriBuilder;
use Kcs\K8s\Client\K8s;
use Kcs\K8s\Client\Kind\KindManager;
use Kcs\K8s\Client\KubeConfig\ContextConfigFactory;
use Kcs\K8s\Client\Metadata\ClassMetadataFactory;
use Kcs\K8s\Client\Metadata\Processor\AttributesProcessorLoader;
use Kcs\K8s\Client\Options;
use Kcs\K8s\Client\Serialization\ModelDenormalizer;
use Kcs\K8s\Client\Serialization\ModelNormalizer;
use Kcs\K8s\Client\Serialization\Serializer;
use Kcs\K8s\Client\Websocket\WebsocketAdapterFactory;
use Kcs\K8s\Client\Websocket\WebsocketClientFactory;
use Kcs\Metadata\Loader\Processor\ProcessorFactory;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\StreamFactoryInterface;
use Psr\Http\Message\UriFactoryInterface;

return static function (ContainerConfigurator $container): void {
    $container->services()

        ->set('k8s_client.options', Options::class)
        ->set('k8s_client.http_request_factory', RequestFactoryInterface::class)
        ->set('k8s_client.http_stream_factory', StreamFactoryInterface::class)
        ->set('k8s_client.http_uri_factory', UriFactoryInterface::class)
        ->set('k8s_client.context_config_factory', ContextConfigFactory::class)
            ->args([service('k8s_client.options')])
        ->set('k8s_client.request_factory', RequestFactory::class)
            ->args([
                service('k8s_client.http_request_factory'),
                service('k8s_client.http_stream_factory'),
                service('k8s_client.http_uri_factory'),
                service('k8s_client.context_config_factory'),
            ])
        ->set('k8s_client.http_client_factory', HttpClientFactory::class)
            ->args([
                service('k8s_client.context_config_factory'),
                null,
                null,
            ])
        ->set('k8s_client.http_client', HttpClient::class)
            ->args([
                service('k8s_client.request_factory'),
                service('k8s_client.http_client_factory'),
                service('k8s_client.serializer'),
            ])

        ->set('k8s_client.metadata_processor_factory', ProcessorFactory::class)
        ->set('k8s_client.metadata.processor_loader', AttributesProcessorLoader::class)
            ->args([service('k8s_client.metadata_processor_factory')])
        ->set('k8s_client.metadata.class_finder', ComposerFinder::class)
            ->call('skipBogonFiles')
        ->set('k8s_client.metadata_factory', ClassMetadataFactory::class)
            ->args([
                service('k8s_client.metadata.processor_loader'),
                service('k8s_client.metadata.class_finder'),
                service('event_dispatcher'),
                null,
            ])

        ->set('k8s_client.model_normalizer', ModelNormalizer::class)
            ->args([service('k8s_client.metadata_factory')])
        ->set('k8s_client.model_denormalizer', ModelDenormalizer::class)
            ->args([service('k8s_client.metadata_factory')])

        ->alias(Serializer::class, 'k8s_client.serializer')
        ->set('k8s_client.serializer', Serializer::class)
            ->public()
            ->args([
                service('k8s_client.model_normalizer'),
                service('k8s_client.model_denormalizer'),
            ])

        ->set('k8s_client.uri_builder', UriBuilder::class)
            ->args([
                service('k8s_client.options'),
            ])

        ->set('k8s_client.kind_manager', KindManager::class)
            ->args([
                service('k8s_client.http_client'),
                service('k8s_client.uri_builder'),
                service('k8s_client.metadata_factory'),
                service('k8s_client.options'),
            ])

        ->set('k8s_client.archive_factory', ArchiveFactory::class)
            ->args([
                service('k8s_client.http_stream_factory'),
            ])

        ->set('k8s_client.websocket_adapter_factory', WebsocketAdapterFactory::class)
            ->args([
                service('k8s_client.options'),
                service('k8s_client.context_config_factory'),
            ])

        ->set('k8s_client.websocket_client_factory', WebsocketClientFactory::class)
            ->args([
                service('k8s_client.websocket_adapter_factory'),
                service('k8s_client.request_factory'),
            ])

        ->set('k8s_client.api', Api::class)
            ->args([
                service('k8s_client.http_client'),
                service('k8s_client.websocket_client_factory'),
                service('k8s_client.uri_builder'),
            ])

        ->set(K8s::class)
            ->public()
            ->args([
                param('k8s_client.default_namespace'),
                service('k8s_client.service_factory'),
                service('k8s_client.kind_manager'),
                service('k8s_client.archive_factory'),
                service('k8s_client.serializer'),
            ])

        ->alias(ServiceFactory::class, 'k8s_client.service_factory')
        ->set('k8s_client.service_factory', ServiceFactory::class)
            ->public()
            ->args([service('k8s_client.api')]);
};
