<?php

declare(strict_types=1);

namespace Kcs\K8s\Symfony\Bundle\DependencyInjection;

use Http\Discovery\Psr17FactoryDiscovery;
use Kcs\ClassFinder\Finder\ComposerFinder;
use Kcs\K8s\Client\Options;
use Kcs\K8s\Symfony\HttpClient\ClientFactory as SymfonyHttpClientFactory;
use Kcs\Metadata\Loader\Processor\Annotation\Processor;
use Nette\PhpGenerator\PhpNamespace;
use Psr\Http\Client\ClientInterface;
use ReflectionClass;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\Alias;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Definition;
use Symfony\Component\DependencyInjection\Loader\PhpFileLoader;
use Symfony\Component\DependencyInjection\Reference;
use Symfony\Component\HttpClient\Psr18Client;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

use function array_shift;
use function assert;
use function class_exists;
use function count;
use function dirname;

class K8sExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $container): void
    {
        $configuration = $this->getConfiguration($configs, $container);
        $config = $this->processConfiguration($configuration, $configs);

        $loader = new PhpFileLoader($container, new FileLocator(__DIR__ . '/../Resources/config'));
        $loader->load('client.php');

        if (class_exists(PhpNamespace::class)) {
            $loader->load('generator.php');
        }

        if (isset($config['client']['kubeconfig'])) {
            $container->findDefinition('k8s_client.options')
                ->setFactory([Options::class, 'fromKubeconfigFile'])
                ->setArguments([$container->resolveEnvPlaceholders($config['client']['kubeconfig'])]);
        } else {
            $container->findDefinition('k8s_client.options')
                ->setFactory([Options::class, 'inCluster']);
        }

        if (isset($config['client']['endpoint'])) {
            $container->findDefinition('k8s_client.options')
                ->addMethodCall('setEndpoint', [$container->resolveEnvPlaceholders($config['client']['endpoint'])]);
        }

        $container->setParameter('k8s_client.default_namespace', $config['client']['namespace']);

        if (isset($config['client']['websocket_adapter_factory'])) {
            $container->findDefinition('k8s_client.options')
                ->addMethodCall('setWebsocketClientFactory', [new Reference($config['client']['websocket_adapter_factory'])]);
        }

        if (isset($config['client']['websocket_client'])) {
            $container->findDefinition('k8s_client.options')
                ->addMethodCall('setWebsocketClient', [new Reference($config['client']['websocket_client'])]);
        }

        if (class_exists(Psr18Client::class)) {
            $container->removeDefinition('k8s_client.http_request_factory');
            $container->removeDefinition('k8s_client.http_stream_factory');
            $container->removeDefinition('k8s_client.http_uri_factory');
            $container->setAlias('k8s_client.http_request_factory', new Alias('psr18.http_client'));
            $container->setAlias('k8s_client.http_stream_factory', new Alias('psr18.http_client'));
            $container->setAlias('k8s_client.http_uri_factory', new Alias('psr18.http_client'));

            $container->findDefinition('k8s_client.http_client_factory')
                ->setArgument(2, new Definition(SymfonyHttpClientFactory::class));
        } else {
            if (! class_exists(Psr17FactoryDiscovery::class)) {
                throw new InvalidConfigurationException('Cannot find a valid PSR-17 factory. Please install symfony/http-client or the php-http/discovery package.');
            }

            $container->findDefinition('k8s_client.http_request_factory')
                ->setFactory([Psr17FactoryDiscovery::class, 'findRequestFactory']);
            $container->findDefinition('k8s_client.http_stream_factory')
                ->setFactory([Psr17FactoryDiscovery::class, 'findStreamFactory']);
            $container->findDefinition('k8s_client.http_uri_factory')
                ->setFactory([Psr17FactoryDiscovery::class, 'findUriFactory']);

            $container->findDefinition('k8s_client.http_client_factory')
                ->replaceArgument(
                    2,
                    (new Definition(ClientInterface::class))
                        ->setFactory([new Reference('k8s_client.options'), 'getHttpClientFactory']),
                );
        }

        $metadataProcessorDef = $container->findDefinition('k8s_client.metadata_processor_factory');
        $finder = (new ComposerFinder())
            ->in([dirname(__DIR__, 3) . '/Client/Metadata/Processor'])
            ->withAttribute(Processor::class);

        foreach ($finder as $reflClass) {
            assert($reflClass instanceof ReflectionClass);
            $attributes = $reflClass->getAttributes(Processor::class);

            if (count($attributes) === 0) {
                continue;
            }

            $annot = array_shift($attributes)->newInstance();
            assert($annot instanceof Processor);

            $metadataProcessorDef
                ->addMethodCall('registerProcessor', [$annot->annotation, $reflClass->getName()]);
        }

        $metadataFactoryDef = $container->findDefinition('k8s_client.metadata_factory');
        if (! isset($config['metadata']['cache'])) {
            return;
        }

        $metadataFactoryDef->replaceArgument(3, new Reference($config['metadata']['cache']));
    }
}
