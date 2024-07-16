<?php

declare(strict_types=1);

namespace Kcs\K8s\ApiGenerator\Code\CodeGenerator;

use Kcs\K8s\ApiGenerator\Code\CodeFile;
use Kcs\K8s\ApiGenerator\Code\CodeGenerator\Service\OperationMethodCodeGenerator;
use Kcs\K8s\ApiGenerator\Code\CodeOptions;
use Kcs\K8s\ApiGenerator\Code\Formatter\DocBlockFormatterTrait;
use Kcs\K8s\ApiGenerator\Parser\Metadata\Metadata;
use Kcs\K8s\ApiGenerator\Parser\Metadata\ServiceGroupMetadata;
use Kcs\K8s\Contract\ApiInterface;
use Nette\PhpGenerator\PhpNamespace;

readonly class ServiceCodeGenerator
{
    use CodeGeneratorTrait;
    use DocBlockFormatterTrait;

    private OperationMethodCodeGenerator $operationCodeGenerator;

    public function __construct()
    {
        $this->operationCodeGenerator = new OperationMethodCodeGenerator();
    }

    public function generate(ServiceGroupMetadata $serviceGroup, Metadata $metadata, CodeOptions $options): CodeFile
    {
        $namespace = new PhpNamespace($this->computeNamespace($serviceGroup->getFinalNamespace(), $options));
        $namespace->addUse(ApiInterface::class);

        $class = $namespace->addClass($serviceGroup->getClassName());
        $class->addProperty('api')
            ->setPrivate()
            ->addComment('@var ApiInterface');

        $class->addProperty('namespace')
            ->setPrivate()
            ->addComment('@var string|null');

        $constructor = $class->addMethod('__construct');
        $param = $constructor->addParameter('api');
        $param->setType(ApiInterface::class);
        $constructor->addBody('$this->api = $api;');

        $method = $class->addMethod('useNamespace')->setReturnType('self');
        $param = $method->addParameter('namespace');
        $param->setType('string');
        $method->addBody(
            <<<'BODY'
            $this->namespace = $namespace;
            
            return $this;
            BODY,
        );

        if ($serviceGroup->getDescription()) {
            $class->addComment($this->formatDocblockDescription($serviceGroup->getDescription()));
        }

        foreach ($serviceGroup->getOperations() as $operation) {
            $this->operationCodeGenerator->generate(
                $operation,
                $namespace,
                $class,
                $metadata,
                $options,
            );
        }

        return new CodeFile(
            $namespace,
            $class,
        );
    }
}
