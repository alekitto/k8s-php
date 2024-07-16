<?php

declare(strict_types=1);

namespace Kcs\K8s\ApiGenerator\Parser\Metadata;

use OpenApi\Annotations\Parameter;

use function str_replace;

readonly class ParameterMetadata
{
    private const TYPE_MAP = [
        'integer' => 'int',
        'boolean' => 'bool',
    ];

    public function __construct(private Parameter $parameter)
    {
    }

    public function isRequiredDefinition(): bool
    {
        return $this->parameter->in === 'body'
            && $this->parameter->required === true;
    }

    public function isQueryParam(): bool
    {
        return $this->parameter->in === 'query';
    }

    public function isBool(): bool
    {
        return $this->getPhpDocType() === 'bool';
    }

    public function getDefinitionGoPackageName(): string
    {
        if (empty($this->parameter->schema)) {
            return '';
        }

        $toReplace = '#/components/schemas/';

        return str_replace($toReplace, '', $this->parameter->schema->ref);
    }

    public function getName(): string|null
    {
        return $this->parameter->name;
    }

    public function getDescription(): string|null
    {
        return $this->parameter->description;
    }

    public function getPhpDocType(): string
    {
        $type = $this->parameter->schema->type ?? 'mixed';
        if (isset(self::TYPE_MAP[$type])) {
            return self::TYPE_MAP[$type];
        }

        return $type;
    }

    public function getPhpReturnType(): string|null
    {
        $type = $this->getPhpDocType();

        return $type === 'mixed' ? null : $type;
    }
}
