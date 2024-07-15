<?php

declare(strict_types=1);

namespace Kcs\K8s\Client\Http\ResponseHandler;

use Kcs\K8s\Client\Http\Contract\ResponseHandlerInterface;
use Kcs\K8s\Client\Http\ResponseTrait;
use Kcs\K8s\Client\Serialization\Serializer;

abstract class AbstractHandler implements ResponseHandlerInterface
{
    use ResponseTrait;

    public function __construct(protected Serializer $serializer)
    {
    }
}
