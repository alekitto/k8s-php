<?php

declare(strict_types=1);

namespace Kcs\K8s\Client\Metadata\Processor;

use Kcs\K8s\Attribute\Attribute;
use Kcs\K8s\Client\Metadata\ModelPropertyMetadata;
use Kcs\Metadata\Loader\Processor\Annotation\Processor;
use Kcs\Metadata\Loader\Processor\ProcessorInterface;
use Kcs\Metadata\MetadataInterface;

use function assert;

#[Processor(Attribute::class)]
class AttributeProcessor implements ProcessorInterface
{
    public function process(MetadataInterface $metadata, mixed $subject): void
    {
        assert($subject instanceof Attribute);
        assert($metadata instanceof ModelPropertyMetadata);

        $metadata->attributeName = $subject->name;
        $metadata->attributeType = $subject->type;
        $metadata->model = $subject->model;
        $metadata->required = $subject->required;
    }
}
