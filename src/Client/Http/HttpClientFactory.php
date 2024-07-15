<?php

declare(strict_types=1);

namespace Kcs\K8s\Client\Http;

use Http\Discovery\Exception\NotFoundException;
use Http\Discovery\Psr18ClientDiscovery;
use Kcs\K8s\Client\Exception\RuntimeException;
use Kcs\K8s\Client\KubeConfig\ContextConfigFactory;
use Kcs\K8s\Contract\HttpClientFactoryInterface;
use Psr\Http\Client\ClientInterface;

readonly class HttpClientFactory
{
    public function __construct(
        private ContextConfigFactory $configFactory,
        private ClientInterface|null $client = null,
        private HttpClientFactoryInterface|null $httpClientFactory = null,
    ) {
    }

    public function makeClient(bool $isStreaming): ClientInterface
    {
        if ($this->client) {
            return $this->client;
        }

        if ($this->httpClientFactory) {
            return $this->httpClientFactory->makeClient(
                $this->configFactory->contextConfig(),
                $isStreaming,
            );
        }

        try {
            return Psr18ClientDiscovery::find();
        } catch (NotFoundException $exception) {
            throw new RuntimeException(
                'You must provide a PSR-18 compatible HTTP Client and a PSR-17 compatible request / stream factory.',
                $exception->getCode(),
                $exception,
            );
        }
    }
}
