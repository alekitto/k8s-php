<?php

declare(strict_types=1);

namespace Kcs\K8s\Client\Metadata;

use Kcs\K8s\Client\Exception\RuntimeException;
use Kcs\Metadata\ClassMetadata;

use function sprintf;

class ModelMetadata extends ClassMetadata
{
    public array $operations = [];
    public string $kind;
    public string $version;
    public string|null $group = null;

    public function getModelFqcn(): string
    {
        return $this->name;
    }

    /** @return OperationMetadata[] */
    public function getOperations(): array
    {
        return $this->operations;
    }

    public function getKind(): string
    {
        return $this->kind;
    }

    public function getVersion(): string
    {
        return $this->version;
    }

    public function getOperationByType(string $type): OperationMetadata
    {
        foreach ($this->operations as $operation) {
            if ($operation->getType() === $type) {
                return $operation;
            }
        }

        if ($this->kind) {
            $message = sprintf(
                'Kind "%s" with version "%s" (%s)',
                $this->kind,
                $this->version,
                $this->getModelFqcn(),
            );
        } else {
            $message = sprintf('class %s', $this->getModelFqcn());
        }

        throw new RuntimeException(sprintf(
            'The operation type "%s" is not recognised on %s.',
            $type,
            $message,
        ));
    }
}
