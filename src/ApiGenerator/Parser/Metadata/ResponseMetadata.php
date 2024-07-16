<?php

declare(strict_types=1);

namespace Kcs\K8s\ApiGenerator\Parser\Metadata;

use OpenApi\Annotations\MediaType;

readonly class ResponseMetadata
{
    public function __construct(private int $statusCode, private MediaType $response, private DefinitionMetadata|null $definition = null)
    {
    }

    public function isSuccess(): bool
    {
        return $this->statusCode >= 200
            && $this->statusCode < 300;
    }

    public function isStringResponse(): bool
    {
        return $this->response->schema->type === 'string';
    }

    public function getDefinition(): DefinitionMetadata|null
    {
        return $this->definition;
    }
}
