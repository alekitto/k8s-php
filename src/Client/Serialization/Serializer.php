<?php

declare(strict_types=1);

namespace Kcs\K8s\Client\Serialization;

use Kcs\K8s\Client\Serialization\Contract\DenormalizerInterface;
use Kcs\K8s\Client\Serialization\Contract\NormalizerInterface;
use Kcs\K8s\Exception\Exception;

use function gettype;
use function is_array;
use function is_string;
use function json_decode;
use function json_encode;
use function sprintf;

use const JSON_THROW_ON_ERROR;

readonly class Serializer
{
    public function __construct(
        private NormalizerInterface $normalizer,
        private DenormalizerInterface $denormalizer,
    ) {
    }

    public function serialize(object|array $data): string
    {
        if (! is_array($data)) {
            $data = $this->normalizer->normalize($data);
        }

        return (string) json_encode($data, JSON_THROW_ON_ERROR);
    }

    /** @param class-string $model */
    public function deserialize(string|array $data, string|null $model = null): object
    {
        if (is_string($data)) {
            $data = json_decode($data, true, 512, JSON_THROW_ON_ERROR);
        }

        if (! is_array($data)) {
            throw new Exception(sprintf('Unable to deserialize data of type %s', gettype($data)));
        }

        return $this->denormalizer->denormalize(
            $data,
            $model,
        );
    }
}
