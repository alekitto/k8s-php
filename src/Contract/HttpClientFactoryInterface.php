<?php

declare(strict_types=1);

namespace Kcs\K8s\Contract;

use Psr\Http\Client\ClientInterface;

interface HttpClientFactoryInterface
{
    /**
     * Make an instance of the Http Client based on a specific Kubernetes context configuration.
     *
     * @param bool $isStreaming Whether this client is intended for a streaming API call.
     */
    public function factory(ContextConfigInterface $fullContext, bool $isStreaming): ClientInterface;

    /**
     * Whether this factory can be used to create a valid client.
     */
    public static function isAvailable(): bool;
}
