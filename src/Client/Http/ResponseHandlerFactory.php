<?php

declare(strict_types=1);

namespace Kcs\K8s\Client\Http;

use Kcs\K8s\Client\Http\Contract\ResponseHandlerInterface;
use Kcs\K8s\Client\Http\ResponseHandler\ErrorHandler;
use Kcs\K8s\Client\Http\ResponseHandler\FollowHandler;
use Kcs\K8s\Client\Http\ResponseHandler\SuccessHandler;
use Kcs\K8s\Client\Http\ResponseHandler\WatchHandler;
use Kcs\K8s\Client\Serialization\Serializer;

readonly class ResponseHandlerFactory
{
    /** @return ResponseHandlerInterface[] */
    public function makeHandlers(Serializer $serializer): array
    {
        return [
            new ErrorHandler($serializer),
            new FollowHandler($serializer),
            new WatchHandler($serializer),
            new SuccessHandler($serializer),
        ];
    }
}
