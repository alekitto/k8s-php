<?php

declare(strict_types=1);

namespace Kcs\K8s\Client\Metadata\Processor;

use Kcs\K8s\Client\Metadata\ModelPropertyMetadata;
use Kcs\Metadata\Loader\AttributesProcessorLoader as BaseLoader;
use Kcs\Metadata\MetadataInterface;
use ReflectionProperty;

class AttributesProcessorLoader extends BaseLoader
{
    protected function createPropertyMetadata(ReflectionProperty $reflectionProperty): MetadataInterface
    {
        return new ModelPropertyMetadata($reflectionProperty->class, $reflectionProperty->name);
    }
}
