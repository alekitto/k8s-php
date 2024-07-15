<?php

declare(strict_types=1);

namespace Kcs\K8s\Client\Serialization;

use DateTimeImmutable;
use Exception;
use Kcs\K8s\Api\Model\ApiMachinery\Apis\Meta\v1\WatchEvent;
use Kcs\K8s\Client\Exception\RuntimeException;
use Kcs\K8s\Client\Metadata\ModelPropertyMetadata;
use Kcs\K8s\Client\Serialization\Contract\DenormalizerInterface;
use Kcs\K8s\Collection;
use Kcs\Metadata\Factory\MetadataFactoryInterface;
use UnexpectedValueException;

use function array_map;
use function is_string;
use function sprintf;

readonly class ModelDenormalizer implements DenormalizerInterface
{
    public function __construct(private MetadataFactoryInterface $metadataFactory)
    {
    }

    /** @inheritDoc */
    public function denormalize(array $data, string|null $modelFqcn = null): object
    {
        $modelFqcn ??= $this->findFModelFqcnFromData($data);

        $metadata = $this->metadataFactory->getMetadataFor($modelFqcn);
        $instance = $metadata->getReflectionClass()->newInstanceWithoutConstructor();

        foreach ($metadata->getAttributesMetadata() as $property) {
            if (! $property instanceof ModelPropertyMetadata) {
                continue;
            }

            if (! isset($data[$property->getAttributeName()])) {
                continue;
            }

            $value = $this->denormalizeValue(
                $modelFqcn,
                $property,
                $data[$property->getAttributeName()],
            );

            $property->setValue($instance, $value);
        }

        return $instance;
    }

    /**
     * @param class-string $modelFqcn
     *
     * @throws Exception
     */
    private function denormalizeValue(string $modelFqcn, ModelPropertyMetadata $property, mixed $value): mixed
    {
        if ($property->isCollection()) {
            $collectionModel = $property->getModelFqcn();

            $value = array_map(function (array $item) use ($collectionModel) {
                return $this->denormalize($item, $collectionModel);
            }, $value);

            $value = new Collection($value);
        } elseif ($property->isModel()) {
            $value = $this->denormalize(
                $value,
                $property->getModelFqcn(),
            );
        } elseif ($property->isDateTime()) {
            $value = new DateTimeImmutable($value);
        // Hacky solution, but we can guess the object type in this case
        } elseif ($modelFqcn === WatchEvent::class && $property->getName() === 'object') {
            $value = $this->denormalize(
                $value,
                $this->metadataFactory->getModelFqcnFromKind($value['apiVersion'], $value['kind']),
            );
        }

        return $value;
    }

    /**
     * @param array<string, mixed> $data
     *
     * @return class-string
     */
    private function findFModelFqcnFromData(array $data): string
    {
        $apiVersion = $data['apiVersion'] ?? null;
        $kind = $data['kind'] ?? null;

        if (! (is_string($apiVersion) && $apiVersion !== '')) {
            throw new UnexpectedValueException('The "apiVersion" must be a non-empty string.');
        }

        if (! (is_string($kind) && $kind !== '')) {
            throw new UnexpectedValueException('The "kind" must be a non-empty string.');
        }

        $modelFqcn = $this->metadataFactory->getModelFqcnFromKind($apiVersion, $kind);

        if ($modelFqcn === null) {
            throw new RuntimeException(sprintf(
                'Unable to find a Model for apiVersion "%s" and kind "%s".',
                $apiVersion,
                $kind,
            ));
        }

        return $modelFqcn;
    }
}
