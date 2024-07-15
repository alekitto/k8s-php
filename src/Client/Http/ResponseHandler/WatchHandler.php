<?php

declare(strict_types=1);

namespace Kcs\K8s\Client\Http\ResponseHandler;

use Generator;
use IteratorAggregate;
use JsonMachine\Items;
use K8s\Api\Model\ApiMachinery\Apis\Meta\v1\WatchEvent;
use Kcs\K8s\Client\Exception\RuntimeException;
use Kcs\K8s\Client\Http\HttpClient;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;

use function is_callable;

class WatchHandler extends AbstractHandler
{
    public function handle(ResponseInterface $response, array $options): null
    {
        $watch = $this->getCallableOrFail($options);
        $stream = $response->getBody();

        $items = new Items(new class ($stream) implements IteratorAggregate {
            public function __construct(private readonly StreamInterface $stream, private readonly int $chunkSize = 1024 * 8)
            {
            }

            public function getIterator(): Generator
            {
                while (! $this->stream->eof()) {
                    yield $this->stream->read($this->chunkSize);
                }
            }
        });

        foreach ($items as $item) {
            $object = $this->serializer->deserialize($item, WatchEvent::class);
            $result = $watch($object);
            if ($result === false) {
                break;
            }
        }

        $stream->close();

        return null;
    }

    public function supports(ResponseInterface $response, array $options): bool
    {
        $isWatch = $options['query']['watch'] ?? false;
        if (! $isWatch) {
            return false;
        }

        $this->getCallableOrFail($options);

        return $this->isResponseContentType($response, HttpClient::CONTENT_TYPE_JSON)
            && $this->isResponseSuccess($response);
    }

    private function getCallableOrFail(array $options): callable
    {
        $watch = $options['handler'] ?? null;

        if (! is_callable($watch)) {
            throw new RuntimeException(
                'When using watch in your query you must specify the "handler" callable parameter',
            );
        }

        return $watch;
    }
}
