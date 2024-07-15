<?php

declare(strict_types=1);

namespace Kcs\K8s\Client\Http;

use Kcs\K8s\Client\Exception\RuntimeException;
use Kcs\K8s\Client\KubeConfig\ContextConfigFactory;
use Kcs\K8s\Contract\AuthType;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\StreamFactoryInterface;
use Psr\Http\Message\UriFactoryInterface;

use function base64_encode;
use function sprintf;
use function strtoupper;

readonly class RequestFactory
{
    private const ACTION_MAP = [
        'post' => 'POST',
        'get' => 'GET',
        'get-status' => 'GET',
        'patch' => 'PATCH',
        'patch-status' => 'PATCH',
        'put' => 'PUT',
        'put-status' => 'PUT',
        'connect' => 'GET',
        'delete' => 'DELETE',
        'deletecollection' => 'DELETE',
        'list' => 'GET',
        'watch' => 'GET',
        'watchlist' => 'GET',
    ];

    public function __construct(
        private RequestFactoryInterface $requestFactory,
        private StreamFactoryInterface $streamFactory,
        private UriFactoryInterface $uriFactory,
        private ContextConfigFactory $configFactory,
    ) {
    }

    public function makeRequest(
        string $uri,
        string $action,
        string|null $acceptType = null,
        string|null $body = null,
        string|null $contentType = null,
        string|null $httpMethod = null,
    ): RequestInterface {
        $httpMethod = $httpMethod ?? self::ACTION_MAP[$action] ?? null;

        if ($httpMethod === null) {
            throw new RuntimeException(sprintf(
                'The action "%s" has no recognized HTTP method.',
                $action,
            ));
        }

        $request = $this->requestFactory->createRequest(
            strtoupper($httpMethod),
            $uri,
        );

        if ($body) {
            $request = $request
                ->withBody($this->streamFactory->createStream($body))
                ->withHeader(
                    'Content-type',
                    $contentType ?? HttpClient::CONTENT_TYPE_JSON,
                );
        }

        if ($acceptType) {
            $request = $request->withHeader(
                'Accept',
                $acceptType,
            );
        }

        return $this->addAuthIfNeeded($request);
    }

    public function makeFromRequest(string $uri, RequestInterface $request): RequestInterface
    {
        return $this->addAuthIfNeeded($request)
            ->withUri($this->uriFactory->createUri($uri));
    }

    private function addAuthIfNeeded(RequestInterface $request): RequestInterface
    {
        $config = $this->configFactory->contextConfig();

        if ($config->getAuthType() === AuthType::Token) {
            $request = $request->withHeader(
                'Authorization',
                sprintf('Bearer %s', $config->getToken()),
            );
        } elseif ($config->getAuthType() === AuthType::Basic) {
            $request = $request->withHeader(
                'Authorization',
                sprintf(
                    'Basic %s',
                    base64_encode("{$config->getUsername()}:{$config->getPassword()}"),
                ),
            );
        }

        return $request;
    }
}
