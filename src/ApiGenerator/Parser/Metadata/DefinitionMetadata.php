<?php

declare(strict_types=1);

namespace Kcs\K8s\ApiGenerator\Parser\Metadata;

use Kcs\K8s\ApiGenerator\Parser\Formatter\GoPackageName;
use Swagger\Annotations\Definition;
use Swagger\Annotations\Property;

use function array_filter;
use function array_map;
use function in_array;
use function sprintf;
use function str_contains;
use function str_ends_with;
use function strlen;
use function substr_compare;

readonly class DefinitionMetadata
{
    public const DEFINITION_JSON = '.JSON';

    public const DEFINITION_JSONSCHEMAPROPS_BOOL = '.JSONSchemaPropsOrBool';

    public const DEFINITION_JSONSCHEMAPROPS_ARRAY = '.JSONSchemaPropsOrArray';

    public const TYPE_MIXED = 'mixed';

    public const TYPE_OBJECT = 'object';

    public const TYPE_STRING = 'string';

    public const TYPE_INT_OR_STRING = 'int-or-string';

    public const TYPE_DATETIME = 'DateTime';

    public function __construct(private GoPackageName $goPackageName, private Definition $definition)
    {
    }

    public function getPhpFqcn(): string
    {
        return $this->makeFinalNamespace($this->goPackageName->getPhpFqcn());
    }

    public function getNamespace(): string
    {
        return $this->makeFinalNamespace($this->goPackageName->getPhpNamespace());
    }

    /** @return PropertyMetadata[] */
    public function getRequiredProperties(): array
    {
        return array_filter(
            $this->getProperties(),
            static fn (PropertyMetadata $propertyMetadata) => $propertyMetadata->isRequired(),
        );
    }

    public function getClassName(): string
    {
        return $this->goPackageName->getPhpName();
    }

    public function getGoPackageName(): string
    {
        return $this->goPackageName->getGoPackageName();
    }

    public function getDescription(): string
    {
        return (string) $this->definition->description;
    }

    public function isDeprecated(): bool
    {
        return str_contains($this->getDescription(), 'Deprecated:');
    }

    /** @return string[] */
    public function required(): array
    {
        return (array) $this->definition->required;
    }

    /** @return PropertyMetadata[] */
    public function getProperties(): array
    {
        return array_map(
            fn (Property $property) => new PropertyMetadata(
                $property,
                in_array($property->property, (array) $this->definition->required, true),
            ),
            (array) $this->definition->properties,
        );
    }

    public function getProperty(string $name): PropertyMetadata|null
    {
        foreach ($this->getProperties() as $property) {
            if ($property->getName() === $name) {
                return $property;
            }
        }

        return null;
    }

    public function getDefinitionReference(): string
    {
        return $this->definition->definition;
    }

    public function isValidModel(): bool
    {
        return $this->isObject()
            && ! empty($this->getProperties());
    }

    public function isObject(): bool
    {
        // There order here is odd, but in Kubernetes 1.13 and below they were not setting this to an object.
        // So we use this logic universally to catch Kubernetes 1.14 and above, and the last return logic for 1.13 and below.
        if ($this->definition->type && $this->definition->type === 'object') {
            return true;
        }

        return ! $this->definition->type
            && ! empty($this->getProperties());
    }

    public function isDateTime(): bool
    {
        return $this->definition->type === 'string'
            && $this->definition->format === 'date-time';
    }

    public function isIntOrString(): bool
    {
        return $this->definition->type === 'string'
            && $this->definition->format === 'int-or-string';
    }

    public function isString(): bool
    {
        return $this->definition->type === 'string'
            && ! isset($this->definition->format);
    }

    public function isJSONSchemaPropsOrBool(): bool
    {
        return $this->definitionEndsWith(self::DEFINITION_JSONSCHEMAPROPS_BOOL);
    }

    public function isJSONSchemaPropsOrArray(): bool
    {
        return $this->definitionEndsWith(self::DEFINITION_JSONSCHEMAPROPS_ARRAY);
    }

    public function isJsonValue(): bool
    {
        return $this->definitionEndsWith(self::DEFINITION_JSON);
    }

    public function getType(): string
    {
        if ($this->isDateTime()) {
            return self::TYPE_DATETIME;
        }

        if ($this->isIntOrString()) {
            return self::TYPE_INT_OR_STRING;
        }

        if ($this->isString()) {
            return self::TYPE_STRING;
        }

        if ($this->isObject()) {
            return self::TYPE_OBJECT;
        }

        if ($this->isJsonValue()) {
            return self::TYPE_MIXED;
        }

        return $this->definition->type;
    }

    public function isKindWithSpecAndMetadata(): bool
    {
        $properties = $this->getProperties();

        $spec = null;
        $meta = null;
        foreach ($properties as $property) {
            if ($property->getName() === 'spec') {
                $spec = $property;
            }

            if ($property->getName() !== 'metadata') {
                continue;
            }

            $meta = $property;
        }

        return $this->getKubernetesKind()
            && $spec
            && $meta;
    }

    public function getKubernetesGroup(): string|null
    {
        if (! isset($this->definition->x['kubernetes-group-version-kind'][0])) {
            return null;
        }

        return $this->definition->x['kubernetes-group-version-kind'][0]->group;
    }

    public function getKubernetesVersion(): string|null
    {
        if (! isset($this->definition->x['kubernetes-group-version-kind'][0])) {
            return null;
        }

        return $this->definition->x['kubernetes-group-version-kind'][0]->version;
    }

    public function getKubernetesKind(): string|null
    {
        if (! isset($this->definition->x['kubernetes-group-version-kind'][0])) {
            return null;
        }

        return $this->definition->x['kubernetes-group-version-kind'][0]->kind;
    }

    public function isPatch(): bool
    {
        return $this->definitionEndsWith('.Patch');
    }

    public function isItemList(): bool
    {
        return str_ends_with($this->getClassName(), 'List')
            && $this->getProperty('items');
    }

    private function definitionEndsWith(string $value): bool
    {
        return substr_compare($this->definition->definition, $value, -strlen($value)) === 0;
    }

    private function makeFinalNamespace(string $fqcn): string
    {
        return sprintf(
            'Model\\%s',
            $fqcn,
        );
    }
}
