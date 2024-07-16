<?php

declare(strict_types=1);

namespace Kcs\K8s\ApiGenerator\Code;

use DateTimeInterface;
use Kcs\K8s\ApiGenerator\Code\CodeGenerator\CodeGeneratorTrait;
use Kcs\K8s\ApiGenerator\Parser\Metadata\DefinitionMetadata;
use Kcs\K8s\ApiGenerator\Parser\Metadata\PropertyMetadata;
use Kcs\K8s\Attribute\AttributeType;
use OpenApi\Generator;

use function str_starts_with;

readonly class ModelProperty
{
    use CodeGeneratorTrait;

    private const TYPE_MAP = [
        'integer' => 'int',
        'boolean' => 'bool',
    ];

    public function __construct(
        private string $phpPropertyName,
        private PropertyMetadata $property,
        private CodeOptions $options,
        private DefinitionMetadata|null $definition = null,
    ) {
    }

    public function isReadyOnly(): bool
    {
        return $this->property->isReadyOnly();
    }

    public function isRequired(): bool
    {
        return $this->property->isRequired();
    }

    public function isCollection(): bool
    {
        if (! $this->definition) {
            return false;
        }

        return $this->property->isArray()
            && $this->definition->isValidModel();
    }

    public function isModel(): bool
    {
        return $this->definition
            && $this->definition->isValidModel();
    }

    public function isDateTime(): bool
    {
        return $this->definition
            && $this->definition->isDateTime();
    }

    public function isBool(): bool
    {
        return $this->getPhpReturnType() === 'bool';
    }

    public function getModelFqcn(): string|null
    {
        if (! $this->definition || ! $this->definition->isValidModel()) {
            return null;
        }

        return $this->computeNamespace($this->definition->getPhpFqcn(), $this->options);
    }

    public function getModelClassName(): string|null
    {
        if (! $this->definition || ! $this->definition->isValidModel()) {
            return null;
        }

        return $this->definition->getClassName();
    }

    public function getPhpReturnType(): string|null
    {
        $type = $this->property->getType();
        if (isset(self::TYPE_MAP[$type])) {
            $type = self::TYPE_MAP[$type];
        }

        if (! $this->definition) {
            $type = $this->property->isArray() ? 'array' : $type;

            return $type === 'number' ? null : $type;
        }

        if ($this->isCollection()) {
            return 'iterable';
        }

        if ($this->definition->isValidModel()) {
            return $this->computeNamespace($this->definition->getPhpFqcn(), $this->options);
        }

        if ($this->definition->isDateTime()) {
            return DateTimeInterface::class;
        }

        return null;
    }

    public function getKubernetesType(): string|null
    {
        if ($this->isCollection()) {
            return 'collection';
        }

        if (! $this->definition && $this->property->isArray()) {
            return 'array';
        }

        if (! $this->definition) {
            return $this->property->getType();
        }

        if ($this->definition->isValidModel()) {
            return 'model';
        }

        if ($this->definition->isDateTime()) {
            return 'DateTime';
        }

        if ($this->definition->isIntOrString()) {
            return 'int-or-string';
        }

        if ($this->definition->isString()) {
            return 'string';
        }

        if ($this->definition->isJSONSchemaPropsOrBool()) {
            return 'mixed';
        }

        if ($this->definition->isJsonValue()) {
            return 'mixed';
        }

        if ($this->definition->isJSONSchemaPropsOrArray()) {
            return 'array';
        }

        return 'object';
    }

    public function getPhpDocType(): string
    {
        if ($this->isCollection()) {
            return 'iterable|' . $this->definition->getClassName() . '[]';
        }

        if (! $this->definition) {
            $docType = $this->property->getType() ?? 'mixed';
            $docType = $docType === 'number' ? 'mixed' : $docType;
            $docType = self::TYPE_MAP[$docType] ?? $docType;
            $docType .= $this->property->isArray() && $docType !== 'array' ? '[]' : '';

            return $docType;
        }

        if ($this->definition->isValidModel()) {
            $docType = $this->definition->getClassName();
        } elseif ($this->definition->isDateTime()) {
            $docType = 'DateTimeInterface';
        } elseif ($this->definition->isIntOrString()) {
            $docType = 'int|string';
        } elseif ($this->definition->isString()) {
            $docType = 'string';
        } elseif ($this->definition->isJSONSchemaPropsOrBool()) {
            $docType = 'string';
        } elseif ($this->definition->isJsonValue()) {
            $docType = 'mixed';
        } elseif ($this->definition->isJSONSchemaPropsOrArray()) {
            $docType = 'array';
        } else {
            $docType = 'object';

            if (str_starts_with($this->definition->getGoPackageName(), 'io.k8s.')) {
                $proposedType = 'Kcs\K8s\Api\\'.$this->definition->getPhpFqcn();
                if (class_exists($proposedType)) {
                    $docType = '\\'.$proposedType;
                }
            }
        }

        if ($this->property->isArray() && $docType !== 'array') {
            $docType .= '[]';
        }

        return $docType;
    }

    public function getDefaultConstructorValue(): array|null
    {
        return $this->isCollection() ? [] : null;
    }

    public function getName(): string
    {
        return $this->property->getName();
    }

    public function getPhpPropertyName(): string
    {
        return $this->phpPropertyName;
    }

    public function getAnnotationType(): AttributeType|null
    {
        if ($this->isCollection()) {
            return AttributeType::Collection;
        }

        if ($this->isModel()) {
            return AttributeType::Model;
        }

        if ($this->isDateTime()) {
            return AttributeType::DateTime;
        }

        return null;
    }

    public function getDescription(): string
    {
        return $this->property->getDescription() !== Generator::UNDEFINED ? $this->property->getDescription() : '';
    }

    /** @return PropertyMetadata[] */
    public function getModelProps(): array
    {
        if (! $this->definition) {
            return [];
        }

        return $this->definition->getProperties();
    }

    /** @return PropertyMetadata[] */
    public function getModelRequiredProps(): array
    {
        if (! $this->definition) {
            return [];
        }

        return $this->definition->getRequiredProperties();
    }
}
