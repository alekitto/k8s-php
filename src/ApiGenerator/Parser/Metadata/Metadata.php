<?php

declare(strict_types=1);

namespace Kcs\K8s\ApiGenerator\Parser\Metadata;

use OpenApi\Generator;
use RuntimeException;

use function array_filter;
use function sprintf;

class Metadata
{
    /** @var OperationMetadata[] */
    private array $operations = [];

    /** @var DefinitionMetadata[] */
    private array $definitions = [];

    /** @var ServiceGroupMetadata[] */
    private array $serviceGroups = [];

    public function addOperation(OperationMetadata $serviceOperationMetadata): void
    {
        $this->operations[] = $serviceOperationMetadata;
    }

    public function addDefinition(DefinitionMetadata $definitionMetadata): void
    {
        $this->definitions[] = $definitionMetadata;
    }

    public function addServiceGroup(ServiceGroupMetadata $serviceGroup): void
    {
        $this->serviceGroups[] = $serviceGroup;
    }

    /** @return OperationMetadata[] */
    public function getOperations(): array
    {
        return $this->operations;
    }

    /** @return DefinitionMetadata[] */
    public function getDefinitions(): array
    {
        return $this->definitions;
    }

    public function findDefinitionByKind(string $kind, string $version): DefinitionMetadata
    {
        foreach ($this->getDefinitions() as $definition) {
            if ($definition->getKubernetesKind() === $kind && $definition->getKubernetesVersion() === $version) {
                return $definition;
            }
        }

        throw new RuntimeException(sprintf(
            'Cannot find DefinitionMetadata for Kind "%s" and Version "%s".',
            $kind,
            $version,
        ));
    }

    /** @return OperationMetadata[] */
    public function findOperationsByKind(string $kind): array
    {
        return array_filter(
            $this->operations,
            static fn (OperationMetadata $metadata) => $metadata->getKubernetesKind() === $kind,
        );
    }

    /** @return ServiceGroupMetadata[] */
    public function getServiceGroups(): array
    {
        return $this->serviceGroups;
    }

    public function findDefinitionByGoPackageName(string $name): DefinitionMetadata|null
    {
        if ($name === Generator::UNDEFINED) {
            return null;
        }

        foreach ($this->definitions as $definition) {
            if ($definition->getGoPackageName() === $name) {
                return $definition;
            }
        }

        return null;
    }
}
