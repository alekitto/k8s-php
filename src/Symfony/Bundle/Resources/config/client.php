<?php

declare(strict_types=1);

namespace Symfony\Component\DependencyInjection\Loader\Configurator;

use Kcs\K8s\Api\Service\ServiceFactory;
use Kcs\K8s\Client\K8s;
use Kcs\K8s\Client\K8sFactory;
use Kcs\K8s\Client\Options;

return static function (ContainerConfigurator $container): void {
    $container->services()

        ->set('k8s_client.options', Options::class)
        ->set('k8s_client.factory', K8sFactory::class)

        ->set(K8s::class)
            ->public()
            ->args([service('k8s_client.options')])

        ->set(ServiceFactory::class)
            ->public()
            ->factory([service(K8s::class), 'api']);
};
