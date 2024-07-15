<?php

declare(strict_types=1);

namespace Kcs\K8s\Client\File\Contract;

use Kcs\K8s\Client\File\Exception\FileException;

interface ArchiveInterface extends ArchiveUploadInterface
{
    /**
     * Get the full path to the archive.
     */
    public function getRealPath(): string;

    /**
     * Extract the archive to a specific location.
     *
     * @param string $path the path to extract to.
     * @param array|string|null $files The string file, or array of files, to extract. Defaults to all if not set.
     * @param bool $overwrite Whether to overwrite existing files.
     *
     * @throws FileException
     */
    public function extractTo(string $path, array|string|null $files = null, bool $overwrite = false): void;

    /**
     * Delete the archive.
     *
     * @throws FileException
     */
    public function delete(): void;

    /**
     * Add a file to the archive.
     *
     * @param string $source The source file.
     * @param string $destination The destination in the archive.
     */
    public function addFile(string $source, string $destination): void;

    /**
     * Add a file to the archive from string data.
     *
     * @param string $destination The destination in the archive.
     * @param string $data The string data.
     */
    public function addFromString(string $destination, string $data): void;
}
