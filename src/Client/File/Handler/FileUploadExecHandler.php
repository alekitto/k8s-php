<?php

declare(strict_types=1);

namespace Kcs\K8s\Client\File\Handler;

use Kcs\K8s\Client\File\Exception\FileUploadException;
use Kcs\K8s\Client\Websocket\Contract\Channel;
use Kcs\K8s\Client\Websocket\Contract\ContainerExecInterface;
use Kcs\K8s\Client\Websocket\ExecConnection;
use Psr\Http\Message\StreamInterface;

use function sprintf;

readonly class FileUploadExecHandler implements ContainerExecInterface
{
    private const READ_BYTES = 8192;

    public function __construct(private StreamInterface $stream)
    {
    }

    public function onOpen(ExecConnection $connection): void
    {
        while (! $this->stream->eof()) {
            $connection->write($this->stream->read(self::READ_BYTES));
        }

        $connection->close();
    }

    public function onClose(): void
    {
    }

    public function onReceive(Channel $channel, string $data, ExecConnection $connection): void
    {
        if ($channel === Channel::StdErr) {
            $connection->close();

            throw new FileUploadException(sprintf(
                'Error while uploading data: %s',
                $data,
            ));
        }
    }
}
