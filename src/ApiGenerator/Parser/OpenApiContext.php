<?php

declare(strict_types=1);

namespace Kcs\K8s\ApiGenerator\Parser;

use OpenApi\Annotations\AbstractAnnotation;
use OpenApi\Annotations\OpenApi;
use OpenApi\Annotations\Parameter;
use OpenApi\Annotations\Schema;
use RuntimeException;

use function get_debug_type;
use function sprintf;

readonly class OpenApiContext
{
    public function __construct(
        private AbstractAnnotation $subject,
        private OpenApi $openApi,
    ) {
    }

    public function getSubject(): AbstractAnnotation
    {
        return $this->subject;
    }

    public function findSchema(string $ref): Schema
    {
        $schema = $this->openApi->ref($ref);
        if (! $schema instanceof Schema) {
            throw new RuntimeException(sprintf(
                'Expected a Definition for %s, got: %s',
                $ref,
                get_debug_type($schema),
            ));
        }

        return $schema;
    }

    public function findParameter(string $ref): Parameter
    {
        $parameter = $this->openApi->ref($ref);
        if (! $parameter instanceof Parameter) {
            throw new RuntimeException(sprintf(
                'Expected a Parameter for %s, got: %s',
                $ref,
                get_debug_type($parameter),
            ));
        }

        return $parameter;
    }
}
