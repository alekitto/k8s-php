<?php

declare(strict_types=1);

namespace Kcs\K8s\Client\Metadata\Processor;

use Kcs\K8s\Attribute\Operation;
use Kcs\K8s\Client\Metadata\ModelMetadata;
use Kcs\K8s\Client\Metadata\OperationMetadata;
use Kcs\Metadata\Loader\Processor\Annotation\Processor;
use Kcs\Metadata\Loader\Processor\ProcessorInterface;
use Kcs\Metadata\MetadataInterface;

use function assert;

#[Processor(Operation::class)]
class OperationProcessor implements ProcessorInterface
{
    public function process(MetadataInterface $metadata, mixed $subject): void
    {
        assert($subject instanceof Operation);
        assert($metadata instanceof ModelMetadata);

        $operation = new OperationMetadata();
        $operation->type = $subject->type;
        $operation->path = $subject->path;
        $operation->response = $subject->response;
        $operation->body = $subject->body;

        $metadata->operations[] = $operation;
    }
}
