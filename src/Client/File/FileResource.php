<?php

declare(strict_types=1);

namespace Kcs\K8s\Client\File;

use Kcs\K8s\Client\File\Exception\FileException;

use function fclose;
use function file_exists;
use function fopen;
use function fwrite;
use function sprintf;
use function unlink;

class FileResource
{
    /** @param resource|null $resource */
    public function __construct(private readonly string $file, private $resource = null)
    {
    }

    public function write(string $data): void
    {
        $result = @fwrite($this->resource(), $data);
        if ($result === false) {
            throw new FileException(sprintf(
                'Unable to write to file: %s',
                $this->file,
            ));
        }
    }

    public function close(): void
    {
        if (! @fclose($this->resource())) {
            throw new FileException(sprintf(
                'Unable to close file: %s',
                $this->file,
            ));
        }

        $this->resource = null;
    }

    public function delete(): void
    {
        if (! file_exists($this->file)) {
            return;
        }

        if ($this->resource) {
            $this->close();
        }

        if (! @unlink($this->file)) {
            throw new FileException(sprintf(
                'Unable to delete file: %s',
                $this->file,
            ));
        }
    }

    public function getPath(): string
    {
        return $this->file;
    }

    /** @return resource */
    private function resource()
    {
        if ($this->resource) {
            return $this->resource;
        }

        $this->resource = @fopen($this->file, 'wb');
        if ($this->resource === false) {
            throw new FileException(sprintf(
                'Unable to open file for writing: %s',
                $this->file,
            ));
        }

        return $this->resource;
    }
}
