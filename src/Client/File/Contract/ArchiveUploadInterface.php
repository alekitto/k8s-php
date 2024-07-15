<?php

declare(strict_types=1);

namespace Kcs\K8s\Client\File\Contract;

use Kcs\K8s\Client\File\Exception\FileException;
use Psr\Http\Message\StreamInterface;

interface ArchiveUploadInterface
{
    /**
     * The argv commands used to perform the upload to the pod of the archive.
     *
     * @return string[]
     */
    public function getUploadCommand(): array;

    /**
     * Return the archive as a PSR-7 stream.
     *
     * @throws FileException
     */
    public function toStream(): StreamInterface;
}
