<?php

declare(strict_types=1);

namespace Kcs\K8s\ApiGenerator\Code\CodeGenerator;

use Kcs\K8s\ApiGenerator\Code\CodeOptions;

use function sprintf;

trait CodeGeneratorTrait
{
    private function computeNamespace(string $namespace, CodeOptions $options): string
    {
        return sprintf(
            '%s\\%s',
            $options->getRootNamespace(),
            $namespace,
        );
    }
}
