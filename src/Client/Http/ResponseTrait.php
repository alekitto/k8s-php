<?php

declare(strict_types=1);

namespace Kcs\K8s\Client\Http;

use Psr\Http\Message\ResponseInterface;

use function in_array;

trait ResponseTrait
{
    protected function isResponseSuccess(ResponseInterface $response): bool
    {
        return $response->getStatusCode() >= 200 && $response->getStatusCode() <= 299;
    }

    protected function isResponseError(ResponseInterface $response): bool
    {
        return $response->getStatusCode() >= 400 && $response->getStatusCode() <= 599;
    }

    protected function isResponseContentType(ResponseInterface $response, string $contentType): bool
    {
        $contentTypes = $response->getHeader('content-type');

        return in_array($contentType, $contentTypes, true);
    }
}
