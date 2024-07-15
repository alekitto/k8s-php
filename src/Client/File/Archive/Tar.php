<?php

declare(strict_types=1);

namespace Kcs\K8s\Client\File\Archive;

use Kcs\K8s\Client\File\Contract\ArchiveInterface;
use Kcs\K8s\Client\File\Exception\FileException;
use PharData;
use Psr\Http\Message\StreamFactoryInterface;
use Psr\Http\Message\StreamInterface;

use function file_exists;
use function sprintf;
use function unlink;

readonly class Tar implements ArchiveInterface
{
    private PharData $tar;

    public function __construct(private string $file, private StreamFactoryInterface $streamFactory)
    {
        $this->tar = new PharData($file);
    }

    public function getRealPath(): string
    {
        return $this->file;
    }

    /** @inheritDoc */
    public function extractTo(string $path, $files = null, bool $overwrite = false): void
    {
        $result = $this->tar->extractTo(
            $path,
            $files,
            $overwrite,
        );
        if ($result === false) {
            throw new FileException(sprintf(
                'Failed to extract archive to: %s',
                $path,
            ));
        }
    }

    public function addFile(string $source, string $destination): void
    {
        $this->tar->addFile($source, $destination);
    }

    public function addFromString(string $destination, string $data): void
    {
        $this->tar->addFromString($destination, $data);
    }

    public function toStream(): StreamInterface
    {
        if (! file_exists($this->file)) {
            throw new FileException(sprintf(
                'The archive was not found. You must add files / data for it to be created.',
            ));
        }

        return $this->streamFactory->createStreamFromFile($this->file);
    }

    public function delete(): void
    {
        if (! file_exists($this->file)) {
            return;
        }

        if (! unlink($this->file)) {
            throw new FileException(sprintf(
                'Unable to remove tar archive: %s',
                $this->file,
            ));
        }
    }

    /** @inheritDoc */
    public function getUploadCommand(): array
    {
        return [
            'tar',
            'xf',
            '-',
            '-C',
            '/',
        ];
    }

    public function __toString(): string
    {
        return $this->getRealPath();
    }
}
