<?php

declare(strict_types=1);

namespace Kcs\K8s\Client\Http\Exception;

use Kcs\K8s\Exception\HttpException as BaseHttpException;
use Psr\Http\Message\ResponseInterface;
use Throwable;

class HttpException extends BaseHttpException
{
    public function __construct(private ResponseInterface $response, Throwable|null $previous = null)
    {
        parent::__construct(
            $response->getReasonPhrase(),
            $response->getStatusCode(),
            $previous,
        );
    }

    public function getResponse(): ResponseInterface
    {
        return $this->response;
    }
}
