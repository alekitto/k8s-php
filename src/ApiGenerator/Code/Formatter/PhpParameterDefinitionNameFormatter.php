<?php

declare(strict_types=1);

namespace Kcs\K8s\ApiGenerator\Code\Formatter;

use Kcs\K8s\ApiGenerator\Parser\Metadata\DefinitionMetadata;

use function lcfirst;

readonly class PhpParameterDefinitionNameFormatter
{
    public function format(DefinitionMetadata $definition): string
    {
        return lcfirst($definition->getClassName());
    }
}
