<?php

declare(strict_types=1);

namespace Kcs\K8s\ApiGenerator\Parser\MetadataGenerator;

use Kcs\K8s\ApiGenerator\Parser\Metadata\Metadata;
use Kcs\K8s\ApiGenerator\Parser\Metadata\OperationMetadata;
use Kcs\K8s\ApiGenerator\Parser\Metadata\ResponseMetadata;
use Kcs\K8s\ApiGenerator\Parser\OpenApiContext;
use OpenApi\Annotations\PathItem;
use OpenApi\Annotations\Response;
use OpenApi\Generator;
use RuntimeException;

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
        assert($path instanceof PathItem);

        $serviceOperations = [];
        foreach (self::OPERATIONS as $httpOperation) {
            if (! isset($path->$httpOperation)) {
                continue;
            }

            $apiOperation = $path->$httpOperation;
            if ($apiOperation === Generator::UNDEFINED) {
                continue;
            }

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
        return $openApiObject->getSubject() instanceof PathItem;
    }

    /**
     * @param Response[] $responses
     *
     * @return ResponseMetadata[]
     */
    private function parseResponses(array $responses, OpenApiContext $openApiContext, Metadata $generatedApi): array
    {
        $responsesMetadata = [];

        foreach ($responses as $statusCode => $response) {
            assert($response instanceof Response);
            if ($response->content === Generator::UNDEFINED) {
                continue;
            }

            $mediaType = $response->content['application/json'] ?? $response->content['*/*'] ?? $response->content['application/jwk-set+json'];
            $ref = $mediaType->schema === Generator::UNDEFINED ? null : ($mediaType->schema->ref === Generator::UNDEFINED ? null : $mediaType->schema->ref);
            if ($ref === null) {
                $responsesMetadata[] = new ResponseMetadata($statusCode, $mediaType);

                continue;
            }

            $def = $openApiContext->findSchema($ref);
            $definition = $generatedApi->findDefinitionByGoPackageName($def->schema);
            if (! $definition) {
                throw new RuntimeException('No model found: ' . $def->schema);
            }

            $responsesMetadata[] = new ResponseMetadata($statusCode, $mediaType, $definition);
        }

        return $responsesMetadata;
    }
}
