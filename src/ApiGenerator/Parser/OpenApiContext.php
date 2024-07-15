<?php

declare(strict_types=1);

namespace Kcs\K8s\ApiGenerator\Parser;

use RuntimeException;
use Swagger\Annotations\AbstractAnnotation;
use Swagger\Annotations\Definition;
use Swagger\Annotations\Parameter;
use Swagger\Annotations\Swagger;

use function get_debug_type;
use function sprintf;

readonly class OpenApiContext
{
    public function __construct(
        private AbstractAnnotation $subject,
        private Swagger $openApi,
    ) {
    }

    public function getSubject(): AbstractAnnotation
    {
        return $this->subject;
    }

    public function findDefinition(string $ref): Definition
    {
        $definition = $this->openApi->ref($ref);
        if (! $definition instanceof Definition) {
            throw new RuntimeException(sprintf(
                'Expected a Definition for %s, got: %s',
                $ref,
                get_debug_type($definition),
            ));
        }

        return $definition;
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
