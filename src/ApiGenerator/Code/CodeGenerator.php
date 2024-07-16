<?php

declare(strict_types=1);

namespace Kcs\K8s\ApiGenerator\Code;

use Kcs\K8s\ApiGenerator\Code\CodeGenerator\ModelCodeGenerator;
use Kcs\K8s\ApiGenerator\Code\CodeGenerator\ServiceCodeGenerator;
use Kcs\K8s\ApiGenerator\Code\CodeGenerator\ServiceFactoryCodeGenerator;
use Kcs\K8s\ApiGenerator\Code\Writer\PhpFileWriter;
use Kcs\K8s\ApiGenerator\Parser\Metadata\Metadata;

class CodeGenerator
{
    /** @var Metadata[] */
    private array $metadata = [];

    public function __construct(
        private readonly PhpFileWriter $phpFileWriter = new PhpFileWriter(),
        private readonly ServiceCodeGenerator $serviceCodeGenerator = new ServiceCodeGenerator(),
        private readonly ModelCodeGenerator $modelCodeGenerator = new ModelCodeGenerator(),
        private readonly ServiceFactoryCodeGenerator $serviceFactoryCodeGenerator = new ServiceFactoryCodeGenerator(),
    ) {
    }

    public function addMetadata(Metadata $metadata): void
    {
        $this->metadata[] = $metadata;
    }

    public function generateCode(CodeOptions $options): void
    {
        $generated = [];

        foreach ($this->metadata as $metadata) {
            foreach ($metadata->getDefinitions() as $model) {
                if (! $model->isValidModel()) {
                    continue;
                }

                $pkgName = $model->getGoPackageName();
                if (isset($generated[$pkgName])) {
                    continue;
                }

                $generated[$pkgName] = true;
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
        }

        $codeFile = $this->serviceFactoryCodeGenerator->generate(
            $this->metadata,
            $options,
        );
        $this->phpFileWriter->write(
            $codeFile,
            $options,
        );
    }
}
