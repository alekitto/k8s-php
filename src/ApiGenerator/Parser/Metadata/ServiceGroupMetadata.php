<?php

declare(strict_types=1);

namespace Kcs\K8s\ApiGenerator\Parser\Metadata;

use Kcs\K8s\ApiGenerator\Parser\Formatter\ServiceGroupName;

use function sprintf;
use function str_contains;
use function str_ends_with;
use function str_starts_with;

readonly class ServiceGroupMetadata
{
    /** @param OperationMetadata[] $operations */
    public function __construct(
        private ServiceGroupName $group,
        private array $operations,
    ) {
    }

    public function getFqcn(): string
    {
        return $this->makeFinalNamespace($this->group->getFqcn());
    }

    public function getFinalNamespace(): string
    {
        return $this->makeFinalNamespace($this->group->getFullNamespace());
    }

    public function getNamespace(): string
    {
        return $this->group->getFullNamespace();
    }

    public function getClassName(): string
    {
        return $this->group->getClassName();
    }

    public function getKind(): string
    {
        return $this->group->getKind();
    }

    public function getVersion(): string
    {
        return $this->group->getVersion();
    }

    public function getGroup(): string|null
    {
        return $this->group->getGroupName();
    }

    /** @return OperationMetadata[] */
    public function getOperations(): array
    {
        return $this->operations;
    }

    public function getDescription(): string
    {
        foreach ($this->operations as $operation) {
            if ($operation->getPhpMethodName() === 'read' && $operation->getReturnedDefinition()) {
                return $operation->getReturnedDefinition()->getDescription();
            }
        }

        return '';
    }

    public function getModelDefinition(): DefinitionMetadata|null
    {
        $operation = $this->getCreateOperation();
        if (! $operation) {
            return null;
        }

        return $operation->getReturnedDefinition();
    }

    public function getCreateOperation(): OperationMetadata|null
    {
        foreach ($this->operations as $operation) {
            if ($operation->getKubernetesAction() !== 'post') {
                continue;
            }

            if (str_starts_with($operation->getPhpMethodName(), 'create')) {
                return $operation;
            }
        }

        return null;
    }

    public function getDeleteOperation(): OperationMetadata|null
    {
        foreach ($this->operations as $operation) {
            if ($operation->getKubernetesAction() !== 'delete') {
                continue;
            }

            if (str_starts_with($operation->getPhpMethodName(), 'delete')) {
                return $operation;
            }
        }

        return null;
    }

    public function getDeleteCollectionOperation(bool $namespaced = true): OperationMetadata|null
    {
        foreach ($this->operations as $operation) {
            if ($operation->getKubernetesAction() !== 'deletecollection') {
                continue;
            }

            if ($namespaced && $operation->requiresNamespace()) {
                return $operation;
            }

            if (! $namespaced && ! $operation->requiresNamespace()) {
                return $operation;
            }
        }

        return null;
    }

    public function getWatchOperation(bool $namespaced = true): OperationMetadata|null
    {
        $operation = $this->getListOperation($namespaced);

        return $operation && $operation->isWatchable() ? $operation : null;
    }

    public function getListOperation(bool $namespaced = true): OperationMetadata|null
    {
        foreach ($this->operations as $operation) {
            if ($operation->getKubernetesAction() !== 'list') {
                continue;
            }

            $operationIsNamespaced = str_contains($operation->getUriPath(), '/{namespace}/');
            if ($operationIsNamespaced && $namespaced) {
                return $operation;
            }

            if (! $operationIsNamespaced && ! $namespaced) {
                return $operation;
            }
        }

        return null;
    }

    public function getReadOperation(): OperationMetadata|null
    {
        foreach ($this->operations as $operation) {
            if (str_ends_with($operation->getUriPath(), '/status')) {
                continue;
            }

            if ($operation->getKubernetesAction() === 'get') {
                return $operation;
            }
        }

        return null;
    }

    public function getReadStatusOperation(): OperationMetadata|null
    {
        foreach ($this->operations as $operation) {
            if (! str_ends_with($operation->getUriPath(), '/status')) {
                continue;
            }

            if ($operation->getKubernetesAction() === 'get') {
                return $operation;
            }
        }

        return null;
    }

    public function getPatchOperation(): OperationMetadata|null
    {
        foreach ($this->operations as $operation) {
            if (str_ends_with($operation->getUriPath(), '/status')) {
                continue;
            }

            if ($operation->getKubernetesAction() === 'patch') {
                return $operation;
            }
        }

        return null;
    }

    public function getPatchStatusOperation(): OperationMetadata|null
    {
        foreach ($this->operations as $operation) {
            if (! str_ends_with($operation->getUriPath(), '/status')) {
                continue;
            }

            if ($operation->getKubernetesAction() === 'patch') {
                return $operation;
            }
        }

        return null;
    }

    public function getPutOperation(): OperationMetadata|null
    {
        foreach ($this->operations as $operation) {
            if (str_ends_with($operation->getUriPath(), '/status')) {
                continue;
            }

            if ($operation->getKubernetesAction() === 'put') {
                return $operation;
            }
        }

        return null;
    }

    public function getPutStatusOperation(): OperationMetadata|null
    {
        foreach ($this->operations as $operation) {
            if (! str_ends_with($operation->getUriPath(), '/status')) {
                continue;
            }

            if ($operation->getKubernetesAction() === 'put') {
                return $operation;
            }
        }

        return null;
    }

    private function makeFinalNamespace(string $namespace): string
    {
        return sprintf(
            'Service\\%s',
            $namespace,
        );
    }
}
