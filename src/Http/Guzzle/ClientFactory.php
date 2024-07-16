<?php

declare(strict_types=1);

namespace Kcs\K8s\Http\Guzzle;

use GuzzleHttp\Client;
use Kcs\K8s\Contract\ContextConfigInterface;
use Kcs\K8s\Contract\HttpClientFactoryInterface;
use Psr\Http\Client\ClientInterface;

use function class_exists;

readonly class ClientFactory implements HttpClientFactoryInterface
{
    /** @param array<string, mixed> $defaults Any additional default options wanted for the Symfony HttpClient. */
    public function __construct(private array $defaults = [])
    {
    }

    public static function isAvailable(): bool
    {
        return class_exists(Client::class);
    }

    public function factory(ContextConfigInterface $fullContext, bool $isStreaming): ClientInterface
    {
        $options = $this->defaults;
        $options['timeout'] = $isStreaming ? -1 : ($options['timeout'] ?? 15);
        $options['base_uri'] = $fullContext->getServer();

        if ($fullContext->getClientCertificate()) {
            $options['cert'] = $fullContext->getClientCertificate();
            $options['ssl_key'] = $fullContext->getClientKey();
        }

        if ($fullContext->getServerCertificateAuthority()) {
            $options['verify'] = $fullContext->getServerCertificateAuthority();
        }

        return new Client($options);
    }
}
