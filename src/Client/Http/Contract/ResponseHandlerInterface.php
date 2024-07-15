<?php

declare(strict_types=1);

namespace Kcs\K8s\Client\Http\Contract;

use Psr\Http\Message\ResponseInterface;

interface ResponseHandlerInterface
{
    public function handle(ResponseInterface $response, array $options): mixed;

    public function supports(ResponseInterface $response, array $options): bool;
}
