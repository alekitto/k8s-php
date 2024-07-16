<?php

declare(strict_types=1);

namespace Kcs\K8s\ApiGenerator\Parser;

use Kcs\K8s\ApiGenerator\Parser\Formatter\GoPackageNameFormatter;
use Kcs\K8s\ApiGenerator\Parser\Formatter\ServiceGroupNameFormatter;
use Kcs\K8s\ApiGenerator\Parser\Metadata\DefinitionMetadata;
use Kcs\K8s\ApiGenerator\Parser\Metadata\Metadata;
use Kcs\K8s\ApiGenerator\Parser\Metadata\OperationMetadata;
use Kcs\K8s\ApiGenerator\Parser\Metadata\ServiceGroupMetadata;
use Kcs\K8s\ApiGenerator\Parser\MetadataGenerator\OperationMetadataGenerator;
use OpenApi\Annotations\OpenApi;
use OpenApi\Generator;

readonly class MetadataParser
{
    private GoPackageNameFormatter $goPkgNameFormatter;

    private ServiceGroupNameFormatter $groupNameFormatter;

    public function __construct(private OperationMetadataGenerator $serviceGenerator = new OperationMetadataGenerator())
    {
        $this->goPkgNameFormatter = new GoPackageNameFormatter();
        $this->groupNameFormatter = new ServiceGroupNameFormatter();
    }

    public function parse(OpenApi $openApi): Metadata
    {
        $metadata = new Metadata();
        $schemas = $openApi->components->schemas !== Generator::UNDEFINED ? $openApi->components->schemas : [];
        foreach ($schemas as $name => $definition) {
            $metadata->addDefinition(new DefinitionMetadata(
                $this->goPkgNameFormatter->format($name),
                $definition,
            ));
        }

        foreach ($openApi->paths as $path) {
            $openApiObject = new OpenApiContext($path, $openApi);
            foreach ($this->serviceGenerator->generate($openApiObject, $metadata) as $serviceOperationMetadata) {
                $metadata->addOperation($serviceOperationMetadata);
            }
        }

        // @todo What to do with endpoints not relating to a specific group?
        [$groups] = $this->getGroupedOperations($metadata);

        foreach ($groups as $group => $kinds) {
            foreach ($kinds as $kind => $versions) {
                foreach ($versions as $version => $operations) {
                    $metadata->addServiceGroup(new ServiceGroupMetadata(
                        $this->groupNameFormatter->format($group, $version, $kind),
                        $operations,
                    ));
                }
            }
        }

        return $metadata;
    }

    /** @return array{0: array<string, array<string, array<string, OperationMetadata[]>>>, 1: OperationMetadata[]} */
    private function getGroupedOperations(Metadata $generatedApi): array
    {
        $groups = [];
        $noGroup = [];

        foreach ($generatedApi->getOperations() as $operation) {
            if ($operation->getKubernetesGroup() === null) {
                $noGroup[] = $operation;
                continue;
            }

            $group = $operation->getKubernetesGroup() === '' ? 'core' : $operation->getKubernetesGroup();
            $kind = $operation->getKubernetesKind();
            $version = $operation->getKubernetesVersion();
            if (! isset($groups[$group])) {
                $groups[$group] = [];
            }

            if (! isset($groups[$group][$kind])) {
                $groups[$group][$kind] = [];
            }

            if (! isset($groups[$group][$kind][$version])) {
                $groups[$group][$kind][$version] = [];
            }

            $groups[$group][$kind][$version][] = $operation;
        }

        return [$groups, $noGroup];
    }
}
