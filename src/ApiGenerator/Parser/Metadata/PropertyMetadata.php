<?php

declare(strict_types=1);

namespace Kcs\K8s\ApiGenerator\Parser\Metadata;

use OpenApi\Annotations\Property;
use OpenApi\Generator;

use function count;
use function preg_match;
use function str_replace;

readonly class PropertyMetadata
{
    public function __construct(private Property $property, private bool $isRequired)
    {
    }

    public function getType(): string|null
    {
        if ($this->property->type === 'object' && $this->property->additionalProperties !== Generator::UNDEFINED && $this->property->additionalProperties->type !== Generator::UNDEFINED) {
            return $this->property->additionalProperties->type;
        }

        if ($this->property->items !== Generator::UNDEFINED && $this->property->items->type !== Generator::UNDEFINED) {
            return $this->property->items->type;
        }

        if ($this->property->type === Generator::UNDEFINED) {
            return null;
        }

        return $this->property->type;
    }

    public function getDescription(): string
    {
        return (string) $this->property->description;
    }

    public function getName(): string
    {
        return $this->property->property;
    }

    public function isModelReference(): bool
    {
        if ($this->property->ref !== Generator::UNDEFINED) {
            return true;
        }

        if ($this->property->items !== Generator::UNDEFINED) {
            if ($this->property->items->ref !== Generator::UNDEFINED) {
                return true;
            }

            if ($this->property->items->allOf !== Generator::UNDEFINED && count($this->property->items->allOf) === 1 && $this->property->items->allOf[0]->ref !== Generator::UNDEFINED) {
                return true;
            }
        }

        return $this->property->allOf !== Generator::UNDEFINED && count($this->property->allOf) === 1 && $this->property->allOf[0]->ref !== Generator::UNDEFINED;
    }

    public function isReadyOnly(): bool
    {
        $isReadOnly = $this->property->readOnly;
        if ($isReadOnly !== Generator::UNDEFINED && $isReadOnly) {
            return true;
        }

        // Hacky solution since they aren't setting it in their OpenAPI spec properly.
        return (bool) preg_match('/Read-only\./', (string) $this->property->description);
    }

    public function isRequired(): bool
    {
        return $this->isRequired;
    }

    public function getGoPackageName(): string
    {
        $toReplace = '#/components/schemas/';

        if ($this->property->ref !== Generator::UNDEFINED) {
            return str_replace($toReplace, '', $this->property->ref);
        }

        if ($this->property->items !== Generator::UNDEFINED) {
            if ($this->property->items->ref !== Generator::UNDEFINED) {
                return str_replace($toReplace, '', $this->property->items->ref);
            }

            if ($this->property->items->allOf !== Generator::UNDEFINED && count($this->property->items->allOf) === 1 && $this->property->items->allOf[0]->ref !== Generator::UNDEFINED) {
                return str_replace($toReplace, '', $this->property->items->allOf[0]->ref);
            }
        }

        if ($this->property->allOf !== Generator::UNDEFINED && count($this->property->allOf) === 1 && $this->property->allOf[0]->ref !== Generator::UNDEFINED) {
            return str_replace($toReplace, '', $this->property->allOf[0]->ref);
        }

        return '';
    }

    public function isArray(): bool
    {
        return $this->property->type === 'array'
            || $this->property->type === 'object';
    }
}
