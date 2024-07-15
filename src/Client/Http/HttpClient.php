<?php

declare(strict_types=1);

namespace Kcs\K8s\Client\Http;

use Kcs\K8s\Client\Exception\InvalidArgumentException;
use Kcs\K8s\Client\Http\Exception\HttpException;
use Kcs\K8s\Client\Serialization\Serializer;
use Kcs\K8s\PatchInterface;
use Psr\Http\Message\RequestInterface;

class HttpClient
{
    public const CONTENT_TYPE_JSON = 'application/json';

    public function __construct(
        private readonly RequestFactory $requestFactory,
        private readonly HttpClientFactory $clientFactory,
        private readonly Serializer $serializer,
        private readonly ResponseHandlerFactory $handlerFactory = new ResponseHandlerFactory(),
    ) {
    }

    /**
     * @throws HttpException
     * @throws InvalidArgumentException
     */
    public function send(string $uri, string $action, array $options): mixed
    {
        $proxy = $options['proxy'] ?? null;
        $model = $options['model'] ?? null;
        $body = $options['body'] ?? null;
        $method = $options['method'] ?? null;

        $encodedBody = null;
        if (! $proxy && $body) {
            $encodedBody = $this->serializer->serialize(
                $body instanceof PatchInterface ? $body->toArray() : $body,
            );
        }

        $contentType = null;
        if ($body instanceof PatchInterface) {
            $contentType = $body->getContentType();
        }

        $acceptType = null;
        if ($model) {
            $acceptType = RequestFactory::CONTENT_TYPE_JSON;
        }

        if ($proxy && $proxy instanceof RequestInterface) {
            $request = $this->requestFactory->makeFromRequest(
                $uri,
                $proxy,
            );
        } else {
            $request = $this->requestFactory->makeRequest(
                $uri,
                $action,
                $acceptType,
                $encodedBody,
                $contentType,
                $method,
            );
        }

        $client = $this->clientFactory->makeClient($this->isStreamingRequest($options));
        $response = $client->sendRequest($request);
        $responseHandlers = $this->handlerFactory->makeHandlers($this->serializer);

        foreach ($responseHandlers as $responseHandler) {
            if ($responseHandler->supports($response, $options)) {
                return $responseHandler->handle($response, $options);
            }
        }

        throw new HttpException($response);
    }

    private function isStreamingRequest(array $options): bool
    {
        $isFollow = $options['query']['follow'] ?? false;
        $isWatch = $options['query']['watch'] ?? false;

        return $isFollow || $isWatch;
    }
}
