<?php

declare(strict_types=1);

namespace Kcs\K8s\Symfony\Bundle\DependencyInjection;

use Kcs\K8s\Client\Options;
use Nette\PhpGenerator\PhpNamespace;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\PhpFileLoader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

use function class_exists;

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
        }

        if (isset($config['client']['endpoint'])) {
            $container->findDefinition('k8s_client.options')
                ->addMethodCall('setEndpoint', [$container->resolveEnvPlaceholders($config['client']['endpoint'])]);
        }

        if (! isset($config['client']['namespace'])) {
            return;
        }

        $container->findDefinition('k8s_client.options')
            ->addMethodCall('setNamespace', [$container->resolveEnvPlaceholders($config['client']['namespace'])]);
    }
}
