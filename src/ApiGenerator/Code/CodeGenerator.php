<?php

declare(strict_types=1);

namespace Kcs\K8s\ApiGenerator\Code;

use Kcs\K8s\ApiGenerator\Code\CodeGenerator\ModelCodeGenerator;
use Kcs\K8s\ApiGenerator\Code\CodeGenerator\ServiceCodeGenerator;
use Kcs\K8s\ApiGenerator\Code\CodeGenerator\ServiceFactoryCodeGenerator;
use Kcs\K8s\ApiGenerator\Code\Writer\PhpFileWriter;
use Kcs\K8s\ApiGenerator\Parser\Metadata\Metadata;

readonly class CodeGenerator
{
    public function __construct(
        private PhpFileWriter $phpFileWriter = new PhpFileWriter(),
        private ServiceCodeGenerator $serviceCodeGenerator = new ServiceCodeGenerator(),
        private ModelCodeGenerator $modelCodeGenerator = new ModelCodeGenerator(),
        private ServiceFactoryCodeGenerator $serviceFactoryCodeGenerator = new ServiceFactoryCodeGenerator(),
    ) {
    }

    public function generateCode(Metadata $metadata, CodeOptions $options): void
    {
        foreach ($metadata->getDefinitions() as $model) {
            if (! $model->isValidModel()) {
                continue;
            }

            $codeFile = $this->modelCodeGenerator->generate($model, $metadata, $options);
            $this->phpFileWriter->write(
                $codeFile,
                $options,
            );
        }

        foreach ($metadata->getServiceGroups() as $serviceGroup) {
            $codeFile = $this->serviceCodeGenerator->generate(
                $serviceGroup,
                $metadata,
                $options,
            );
            $this->phpFileWriter->write(
                $codeFile,
                $options,
            );
        }

        $codeFile = $this->serviceFactoryCodeGenerator->generate(
            $metadata,
            $options,
        );
        $this->phpFileWriter->write(
            $codeFile,
            $options,
        );
    }
}
