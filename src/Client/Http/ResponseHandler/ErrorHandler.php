<?php

declare(strict_types=1);

namespace Kcs\K8s\Client\Http\ResponseHandler;

use Kcs\K8s\Api\Model\ApiMachinery\Apis\Meta\v1\Status;
use Kcs\K8s\Client\Exception\KubernetesException;
use Kcs\K8s\Client\Http\Exception\HttpException;
use Kcs\K8s\Client\Http\HttpClient;
use Psr\Http\Message\ResponseInterface;

use function assert;

class ErrorHandler extends AbstractHandler
{
    public function handle(ResponseInterface $response, array $options): never
    {
        if (! $this->isResponseContentType($response, HttpClient::CONTENT_TYPE_JSON)) {
            throw new HttpException($response);
        }

        $status = $this->serializer->deserialize(
            (string) $response->getBody(),
            Status::class,
        );

        assert($status instanceof Status);

        throw new KubernetesException($status);
    }

    public function supports(ResponseInterface $response, array $options): bool
    {
        return $this->isResponseError($response);
    }
}
