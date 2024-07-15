<?php

declare(strict_types=1);

namespace Kcs\K8s\Client\Metadata\Processor;

use Kcs\K8s\Attribute\Kind;
use Kcs\K8s\Client\Metadata\ModelMetadata;
use Kcs\Metadata\Loader\Processor\Annotation\Processor;
use Kcs\Metadata\Loader\Processor\ProcessorInterface;
use Kcs\Metadata\MetadataInterface;

use function assert;

#[Processor(Kind::class)]
class KindProcessor implements ProcessorInterface
{
    public function process(MetadataInterface $metadata, mixed $subject): void
    {
        assert($subject instanceof Kind);
        assert($metadata instanceof ModelMetadata);

        $metadata->kind = $subject->kind;
        $metadata->version = $subject->version;
        $metadata->group = $subject->group;
    }
}
