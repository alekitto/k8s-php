<?php

declare(strict_types=1);

namespace Kcs\K8s\Client\File;

use Kcs\K8s\Client\File\Archive\Tar;
use Kcs\K8s\Client\File\Contract\ArchiveInterface;
use Psr\Http\Message\StreamFactoryInterface;

readonly class ArchiveFactory
{
    public function __construct(private StreamFactoryInterface $streamFactory)
    {
    }

    public function makeArchive(string $file): ArchiveInterface
    {
        return new Tar(
            $file,
            $this->streamFactory,
        );
    }
}
