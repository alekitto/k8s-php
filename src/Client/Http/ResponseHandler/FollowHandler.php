<?php

declare(strict_types=1);

namespace Kcs\K8s\Client\Http\ResponseHandler;

use Kcs\K8s\Client\Exception\RuntimeException;
use Kcs\K8s\Client\Http\Exception\HttpFollowException;
use Psr\Http\Message\ResponseInterface;
use Throwable;

use function is_callable;
use function sprintf;

class FollowHandler extends AbstractHandler
{
    /** @throws HttpFollowException */
    public function handle(ResponseInterface $response, array $options): null
    {
        $follow = $this->getCallableOrFail($options);
        $stream = $response->getBody();

        while (true) {
            try {
                $data = $stream->read(8196);
            } catch (Throwable $exception) {
                throw new HttpFollowException(
                    sprintf(
                        'Unable to follow the HTTP stream. Make sure your HTTP client timeout / duration settings are correctly configured. Error: %s',
                        $exception->getMessage(),
                    ),
                    $exception->getCode(),
                    $exception,
                );
            }

            $result = $follow($data);

            if ($result === false) {
                $stream->close();

                return null;
            }

            if ($stream->eof()) {
                break;
            }
        }

        return null;
    }

    /** @throws RuntimeException */
    public function supports(ResponseInterface $response, array $options): bool
    {
        $follow = $options['query']['follow'] ?? false;
        if (! $follow) {
            return false;
        }

        $this->getCallableOrFail($options);

        return $this->isResponseContentType($response, 'text/plain')
            && $this->isResponseSuccess($response);
    }

    private function getCallableOrFail(array $options): callable
    {
        $follow = $options['handler'] ?? null;

        if (! is_callable($follow)) {
            throw new RuntimeException(
                'When using follow in your query you must specify the "handler" callable parameter',
            );
        }

        return $follow;
    }
}
