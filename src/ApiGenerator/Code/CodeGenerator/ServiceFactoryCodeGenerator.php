<?php

declare(strict_types=1);

namespace Kcs\K8s\ApiGenerator\Code\CodeGenerator;

use Kcs\K8s\ApiGenerator\Code\CodeFile;
use Kcs\K8s\ApiGenerator\Code\CodeOptions;
use Kcs\K8s\ApiGenerator\Parser\Metadata\Metadata;
use Kcs\K8s\ApiGenerator\Parser\Metadata\ServiceGroupMetadata;
use Kcs\K8s\Contract\ApiInterface;
use Nette\PhpGenerator\PhpNamespace;

use function explode;
use function lcfirst;
use function sprintf;
use function str_contains;
use function ucfirst;

readonly class ServiceFactoryCodeGenerator
{
    use CodeGeneratorTrait;

    public function generate(Metadata $metadata, CodeOptions $options): CodeFile
    {
        $namespace = new PhpNamespace($this->makeFinalNamespace('Service', $options));
        $namespace->addUse(ApiInterface::class);

        $class = $namespace->addClass('ServiceFactory');
        $class->addProperty('api')
            ->setPrivate()
            ->addComment('@var ApiInterface');

        $constructor = $class->addMethod('__construct');
        $param = $constructor->addParameter('api');
        $param->setType(ApiInterface::class);
        $constructor->addBody('$this->api = $api;');

        foreach ($metadata->getServiceGroups() as $serviceGroup) {
            $serviceFqcn = $this->makeFinalNamespace(
                $serviceGroup->getFqcn(),
                $options,
            );

            $namespace->addUse($serviceFqcn);

            $method = $class->addMethod($this->makeMethodName($serviceGroup));
            $method->setReturnType($serviceFqcn);
            $method->addBody(sprintf(
                'return new %s($this->api);',
                $namespace->simplifyName($serviceFqcn),
            ));
        }

        return new CodeFile(
            $namespace,
            $class,
        );
    }

    private function makeMethodName(ServiceGroupMetadata $serviceGroup): string
    {
        $method = lcfirst($serviceGroup->getVersion());

        if ($serviceGroup->getGroup()) {
            $group = $serviceGroup->getGroup();
            $group = str_contains($group, '.') ?
                explode('.', $serviceGroup->getGroup(), -1)[0] : $group;
            $method .= ucfirst($group);
        }

        return $method . $serviceGroup->getKind();
    }
}
