<?php

declare(strict_types=1);

namespace Kcs\K8s\Client\Metadata;

use ArrayObject;
use Kcs\K8s\Attribute\AttributeType;
use Kcs\Metadata\PropertyMetadata;
use ReflectionNamedType;

use function is_array;
use function json_decode;
use function json_encode;

class ModelPropertyMetadata extends PropertyMetadata
{
    public string $attributeName;
    public AttributeType|null $attributeType;
    public string|null $model;
    public bool $required;

    public function getAttributeName(): string
    {
        return $this->attributeName;
    }

    public function isCollection(): bool
    {
        return $this->attributeType === AttributeType::Collection;
    }

    public function isDateTime(): bool
    {
        return $this->attributeType === AttributeType::DateTime;
    }

    public function isModel(): bool
    {
        return $this->attributeType === AttributeType::Model;
    }

    public function getModelFqcn(): string|null
    {
        return $this->model;
    }

    public function getValue(object $object): mixed
    {
        $reflection = $this->getReflection();
        $reflection->setAccessible(true);

        return $reflection->getValue($object);
    }

    public function setValue(object $object, mixed $value): void
    {
        $reflection = $this->getReflection();
        $reflection->setAccessible(true);

        if (is_array($value)) {
            $propertyType = $reflection->getType();
            if ($propertyType instanceof ReflectionNamedType && $propertyType->getName() === 'object') {
                $value = empty($value) ? new ArrayObject() : json_decode(json_encode($value), false);
            }
        }

        $reflection->setValue($object, $value);
    }
}
