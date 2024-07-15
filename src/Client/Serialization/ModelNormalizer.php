<?php

declare(strict_types=1);

namespace Kcs\K8s\Client\Serialization;

use DateTimeInterface;
use Kcs\K8s\Client\Metadata\ModelPropertyMetadata;
use Kcs\K8s\Client\Serialization\Contract\NormalizerInterface;
use Kcs\K8s\Collection;
use Kcs\Metadata\Factory\MetadataFactoryInterface;
use ReflectionObject;

use function array_map;
use function iterator_to_array;

use const DATE_RFC3339;

readonly class ModelNormalizer implements NormalizerInterface
{
    public function __construct(private MetadataFactoryInterface $metadataFactory)
    {
    }

    public function normalize(object $model): array
    {
        $data = [];
        $metadata = $this->metadataFactory->getMetadataFor($model);

        $instanceRef = new ReflectionObject($model);
        foreach ($metadata->getAttributesMetadata() as $property) {
            if (! $property instanceof ModelPropertyMetadata) {
                continue;
            }

            $phpValue = $property->getValue($model);
            if ($phpValue === null) {
                continue;
            }

            if ($phpValue instanceof Collection && $phpValue->isEmpty()) {
                continue;
            }

            $data[$property->getName()] = $this->normalizeValue(
                $property,
                $phpValue,
            );
        }

        return $data;
    }

    private function normalizeValue(ModelPropertyMetadata $property, mixed $value): mixed
    {
        if ($property->isModel()) {
            return (object) $this->normalize($value);
        }

        if (! empty($value) && $property->isCollection()) {
            return array_map(fn (object $item) => (object) $this->normalize($item), iterator_to_array($value));
        }

        if ($value instanceof DateTimeInterface && $property->isDateTime()) {
            return $value->format(DATE_RFC3339);
        }

        return $value;
    }
}
