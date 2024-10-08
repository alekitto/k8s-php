<?php

declare(strict_types=1);

namespace Kcs\K8s\Client\Http\ResponseHandler;

use Kcs\K8s\Client\Http\HttpClient;
use Psr\Http\Message\ResponseInterface;

class SuccessHandler extends AbstractHandler
{
    public function handle(ResponseInterface $response, array $options): mixed
    {
        $isProxy = $options['proxy'] ?? false;
        $model = $options['model'] ?? null;

        // In the case of a proxy operation, we return the raw response instead of trying to guess what is wanted.
        if ($isProxy) {
            return $response;
        }

        $result = (string) $response->getBody();
        if ($result && $model && $this->isResponseContentType($response, HttpClient::CONTENT_TYPE_JSON)) {
            return $this->serializer->deserialize($result, $model);
        }

        return $result;
    }

    public function supports(ResponseInterface $response, array $options): bool
    {
        return $this->isResponseSuccess($response);
    }
}
