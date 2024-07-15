<?php

declare(strict_types=1);

namespace Kcs\K8s\Client\File\Handler;

use Kcs\K8s\Client\File\Exception\FileDownloadException;
use Kcs\K8s\Client\File\FileResource;
use Kcs\K8s\Client\Websocket\Contract\Channel;
use Kcs\K8s\Client\Websocket\Contract\ContainerExecInterface;
use Kcs\K8s\Client\Websocket\ExecConnection;

use function sprintf;

readonly class FileDownloadExecHandler implements ContainerExecInterface
{
    public function __construct(private FileResource $file)
    {
    }

    public function onOpen(ExecConnection $connection): void
    {
    }

    public function onClose(): void
    {
        $this->file->close();
    }

    public function onReceive(Channel $channel, string $data, ExecConnection $connection): void
    {
        if ($channel === Channel::StdErr) {
            throw new FileDownloadException(sprintf(
                'Unable to download files from Pod: %s',
                $data,
            ));
        }

        if ($channel !== Channel::StdOut) {
            return;
        }

        $this->file->write($data);
    }
}
