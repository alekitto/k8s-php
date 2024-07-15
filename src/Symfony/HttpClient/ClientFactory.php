<?php

declare(strict_types=1);

namespace Kcs\K8s\Symfony\HttpClient;

use Kcs\K8s\Contract\ContextConfigInterface;
use Kcs\K8s\Contract\HttpClientFactoryInterface;
use Psr\Http\Client\ClientInterface;
use RuntimeException;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\HttpClient\Psr18Client;

use function base64_decode;
use function class_exists;
use function constant;
use function defined;
use function sprintf;

readonly class ClientFactory implements HttpClientFactoryInterface
{
    /** @param array<string, mixed> $defaults Any additional default options wanted for the Symfony HttpClient. */
    public function __construct(private array $defaults = [])
    {
    }

    public function makeClient(ContextConfigInterface $fullContext, bool $isStreaming): ClientInterface
    {
        $options = $this->defaults;
        $options['timeout'] = $isStreaming ? -1 : ($options['timeout'] ?? 15);

        if ($fullContext->getClientCertificate()) {
            $options['local_cert'] = $fullContext->getClientCertificate();
        } elseif ($fullContext->getClientCertificateData()) {
            $options = $this->setCurlExtraSslDataOpt(
                $options,
                'CURLOPT_SSLCERT_BLOB',
                (string) $fullContext->getClientCertificateData(),
            );
        }

        if ($fullContext->getClientKey()) {
            $options['local_pk'] = $fullContext->getClientKey();
        } elseif ($fullContext->getClientKeyData()) {
            $options = $this->setCurlExtraSslDataOpt(
                $options,
                'CURLOPT_SSLKEY_BLOB',
                (string) $fullContext->getClientKeyData(),
            );
        }

        if ($fullContext->getServerCertificateAuthority()) {
            $options['cafile'] = $fullContext->getServerCertificateAuthority();
        } elseif ($fullContext->getServerCertificateAuthorityData()) {
            $options = $this->setCurlExtraSslDataOpt(
                $options,
                'CURLOPT_CAINFO_BLOB',
                (string) $fullContext->getServerCertificateAuthorityData(),
            );
        }

        return new Psr18Client(HttpClient::create($options));
    }

    public static function isAvailable(): bool
    {
        return class_exists(HttpClient::class);
    }

    private function setCurlExtraSslDataOpt(
        array $options,
        string $optName,
        string $value,
    ): array {
        if (! defined($optName)) {
            throw new RuntimeException(sprintf(
                'Unable to set CURL option "%s". Options to set certificate data via strings requires PHP 8.1+ and libcurl >= 7.71.0.',
                $optName,
            ));
        }

        $options['extra']['curl'][constant($optName)] = base64_decode($value);

        return $options;
    }
}
