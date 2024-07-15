<?php

declare(strict_types=1);

namespace Kcs\K8s\ApiGenerator\Parser\MetadataGenerator;

use Kcs\K8s\ApiGenerator\Parser\Metadata\Metadata;
use Kcs\K8s\ApiGenerator\Parser\Metadata\OperationMetadata;
use Kcs\K8s\ApiGenerator\Parser\Metadata\ResponseMetadata;
use Kcs\K8s\ApiGenerator\Parser\OpenApiContext;
use RuntimeException;
use Swagger\Annotations\Operation;
use Swagger\Annotations\Path;
use Swagger\Annotations\Response;

use function assert;

class OperationMetadataGenerator
{
    public const OPERATIONS = [
        'get',
        'delete',
        'post',
        'patch',
        'put',
        'options',
        'head',
    ];

    /** @return OperationMetadata[] */
    public function generate(OpenApiContext $openApiObject, Metadata $generatedApi): array
    {
        $path = $openApiObject->getSubject();
        assert($path instanceof Path);

        $serviceOperations = [];
        foreach (self::OPERATIONS as $httpOperation) {
            if (! isset($path->$httpOperation)) {
                continue;
            }

            $apiOperation = $path->$httpOperation;
            assert($apiOperation instanceof Operation);
            $responses = $this->parseResponses(
                $apiOperation->responses,
                $openApiObject,
                $generatedApi,
            );
            $serviceOperations[] = new OperationMetadata(
                $openApiObject,
                $path,
                $apiOperation,
                $responses,
            );
        }

        return $serviceOperations;
    }

    public function supports(OpenApiContext $openApiObject): bool
    {
        return $openApiObject->getSubject() instanceof Path;
    }

    /**
     * @param Response[] $responses
     *
     * @return ResponseMetadata[]
     */
    private function parseResponses(array $responses, OpenApiContext $openApiContext, Metadata $generatedApi): array
    {
        $responsesMetadata = [];

        foreach ($responses as $response) {
            assert($response instanceof Response);
            if (empty($response->schema) || empty($response->schema->ref)) {
                $responsesMetadata[] = new ResponseMetadata($response);

                continue;
            }

            $def = $openApiContext->findDefinition($response->schema->ref);
            $definition = $generatedApi->findDefinitionByGoPackageName($def->definition);
            if (! $definition) {
                throw new RuntimeException('No model found: ' . $def->definition);
            }

            $responsesMetadata[] = new ResponseMetadata($response, $definition);
        }

        return $responsesMetadata;
    }
}
