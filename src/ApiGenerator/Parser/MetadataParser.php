<?php

declare(strict_types=1);

namespace Kcs\K8s\ApiGenerator\Parser;

use Kcs\K8s\Api\Model\ApiExtensions\v1\CustomResourceDefinition;
use Kcs\K8s\ApiGenerator\Parser\Formatter\GoPackageNameFormatter;
use Kcs\K8s\ApiGenerator\Parser\Formatter\ServiceGroupNameFormatter;
use Kcs\K8s\ApiGenerator\Parser\Metadata\DefinitionMetadata;
use Kcs\K8s\ApiGenerator\Parser\Metadata\Metadata;
use Kcs\K8s\ApiGenerator\Parser\Metadata\OperationMetadata;
use Kcs\K8s\ApiGenerator\Parser\Metadata\ServiceGroupMetadata;
use Kcs\K8s\ApiGenerator\Parser\MetadataGenerator\OperationMetadataGenerator;
use Kcs\K8s\Client\Metadata\ClassMetadataFactory;
use Kcs\K8s\Client\Metadata\Processor\AttributesProcessorLoader;
use Kcs\K8s\Client\Serialization\ModelDenormalizer;
use Kcs\K8s\Client\Serialization\ModelNormalizer;
use Kcs\K8s\Client\Serialization\Serializer as ClientSerializer;
use Kcs\Metadata\Loader\Processor\ProcessorFactory;
use OpenApi\Annotations\OpenApi;
use OpenApi\Annotations\Schema;
use OpenApi\Generator;
use OpenApi\Serializer;

use function array_pop;
use function array_reverse;
use function assert;
use function explode;
use function implode;
use function strtr;
use function ucfirst;

readonly class MetadataParser
{
    private GoPackageNameFormatter $goPkgNameFormatter;

    private ServiceGroupNameFormatter $groupNameFormatter;

    public function __construct(private OperationMetadataGenerator $serviceGenerator = new OperationMetadataGenerator())
    {
        $this->goPkgNameFormatter = new GoPackageNameFormatter();
        $this->groupNameFormatter = new ServiceGroupNameFormatter();
    }

    /** @param CustomResourceDefinition[] $definitions */
    public function parseFromCustomResourceDefinition(array $definitions, Serializer $serializer = new Serializer(), array $replacePairs = []): Metadata
    {
        $processorFactory = new ProcessorFactory();
        $processorFactory->registerProcessorsByAttributes(__DIR__ . '/../../Client/Metadata/Processor');

        $metadataFactory = new ClassMetadataFactory(new AttributesProcessorLoader($processorFactory));
        $clientSerializer = new ClientSerializer(new ModelNormalizer($metadataFactory), new ModelDenormalizer($metadataFactory));

        $openapi = CrdHelper::createOpenApi();
        foreach ($definitions as $crd) {
            $group = $crd->getGroup();
            $crdNames = $crd->getNames();

            $name = $crd->getName();
            $names = array_reverse(explode('.', $name));
            array_pop($names);

            foreach ($crd->getVersions() as $version) {
                $versionName = $version->getName();
                $modelName = ucfirst(strtr($crdNames->getSingular(), $replacePairs));
                $pkgName = implode('.', [...$names, $versionName, $modelName]);

                $schema = $version->getSchema()->getOpenAPIV3Schema();
                $oaiSchema = $serializer->deserialize($clientSerializer->serialize($schema), Schema::class);
                assert($oaiSchema instanceof Schema);
                $oaiSchema->schema = $pkgName;
                $oaiSchema->x = [
                    'kubernetes-group-version-kind' => [
                        (object) [
                            'kind' => $modelName,
                            'group' => $group,
                            'version' => $versionName,
                        ],
                    ],
                ];

                foreach ($oaiSchema->properties as $property) {
                    $name = $property->property;
                    if ($name !== 'metadata') {
                        continue;
                    }

                    if ($property->properties !== Generator::UNDEFINED || $property->type !== 'object') {
                        continue;
                    }

                    $property->allOf = [new Schema(['ref' => '#/components/schemas/io.k8s.apimachinery.pkg.apis.meta.v1.ObjectMeta'])];
                    $property->type = Generator::UNDEFINED;
                }

                $openapi->components->schemas[$pkgName] = $oaiSchema;

                $listSchema = CrdHelper::generateListSchema($crd, $modelName, $versionName);
                $openapi->components->schemas[$listSchema->schema] = $listSchema;

                if ($crd->getScope() === 'Namespaced') {
                    $pathItem = CrdHelper::generateListForAllNamespacesPath($crd, $modelName, $versionName);
                    $openapi->paths[$pathItem->path] = $pathItem;
                }

                $listPathItem = CrdHelper::generateListPath($crd, $modelName, $versionName);
                $openapi->paths[$listPathItem->path] = $listPathItem;

                $detailsPathItem = CrdHelper::generateDetailsPath($crd, $modelName, $versionName);
                $openapi->paths[$detailsPathItem->path] = $detailsPathItem;
            }
        }

        return $this->parse($openapi);
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
