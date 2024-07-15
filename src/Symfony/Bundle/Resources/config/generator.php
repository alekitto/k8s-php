<?php

declare(strict_types=1);

namespace Symfony\Component\DependencyInjection\Loader\Configurator;

use Kcs\K8s\ApiGenerator\Code\CodeGenerator;
use Kcs\K8s\ApiGenerator\Code\CodeGenerator\ModelCodeGenerator;
use Kcs\K8s\ApiGenerator\Code\CodeGenerator\ServiceCodeGenerator;
use Kcs\K8s\ApiGenerator\Code\CodeGenerator\ServiceFactoryCodeGenerator;
use Kcs\K8s\ApiGenerator\Code\Writer\PhpFileWriter;

return static function (ContainerConfigurator $container): void {
    $container->services()

        ->set('k8s_client.code_generator.file_writer', PhpFileWriter::class)
            ->args([
                service('filesystem'),
            ])

        ->set('k8s_client.code_generator.service_code_generator', ServiceCodeGenerator::class)
        ->set('k8s_client.code_generator.model_code_generator', ModelCodeGenerator::class)
        ->set('k8s_client.code_generator.service_factory_code_generator', ServiceFactoryCodeGenerator::class)

        ->set(CodeGenerator::class)
            ->args([
                service('k8s_client.code_generator.file_writer'),
                service('k8s_client.code_generator.service_code_generator'),
                service('k8s_client.code_generator.model_code_generator'),
                service('k8s_client.code_generator.service_factory_code_generator'),
            ]);
};
