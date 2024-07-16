<?php

declare(strict_types=1);

namespace Kcs\K8s\Client\File;

use Kcs\K8s\Client\Exception\InvalidArgumentException;
use Kcs\K8s\Client\File\Contract\ArchiveInterface;
use Kcs\K8s\Client\File\Exception\FileDownloadException;
use Kcs\K8s\Client\File\Handler\FileDownloadExecHandler;
use Kcs\K8s\Client\Kind\PodExecService;
use Throwable;

use function array_merge;
use function gettype;
use function is_string;
use function ltrim;
use function sprintf;

class FileDownloader
{
    use FileTrait;

    private string|null $file = null;

    /** @var string[] */
    private array $paths;

    private bool $compress = false;

    public function __construct(
        private readonly PodExecService $exec,
        private readonly ArchiveFactory $archiveFactory,
        private string|null $container = null,
    ) {
    }

    /**
     * Use a specific container. If not specified, defaults to the only container in the Pod.
     *
     * @param string $container the container name
     *
     * @return $this
     */
    public function useContainer(string $container): self
    {
        $this->container = $container;

        return $this;
    }

    /**
     * Path(s) to be downloaded from.
     *
     * @param string|string[] $path A single path, or array of paths.
     *
     * @return $this
     */
    public function from(string|array $path): self
    {
        $path = (array) $path;
        foreach ($path as $item) {
            if (! is_string($item)) {
                throw new InvalidArgumentException(sprintf(
                    'Expected a string path, received: %s',
                    gettype($path),
                ));
            }

            $this->paths[] = $item;
        }

        return $this;
    }

    /**
     * Download to specific file. It will be created. If not provided, a file is created in a temp location.
     *
     * @param string $file a full file path.
     *
     * @return $this
     */
    public function to(string $file): self
    {
        $this->file = $file;

        return $this;
    }

    /**
     * Compress the downloaded files (depends on support by the remote system).
     *
     * @return $this
     */
    public function compress(): self
    {
        $this->compress = true;

        return $this;
    }

    /**
     * Initiate the file download process.
     *
     * @throws FileDownloadException
     */
    public function download(): ArchiveInterface
    {
        if (empty($this->paths)) {
            throw new FileDownloadException('You must provide at least one path to download.');
        }

        $suffix = $this->compress ? '.gz' : '';
        $file = new FileResource($this->file ?? $this->getTempFilename($suffix));

        if ($this->container) {
            $this->exec->useContainer($this->container);
        }

        try {
            $execHandler = new FileDownloadExecHandler($file);
            $this->exec->useStdin()
                ->useStdout()
                ->useStderr()
                ->useTty(false)
                ->command($this->getDownloadCommand())
                ->run($execHandler);

            return $this->archiveFactory->factory($file->getPath());
        } catch (Throwable $e) {
            throw new FileDownloadException(
                sprintf('Failed to download files: %s', $e->getMessage()),
                $e->getCode(),
                $e,
            );
        }
    }

    private function getDownloadCommand(): array
    {
        $arg = 'c';
        if ($this->compress) {
            $arg .= 'z';
        }

        $arg .= 'f';

        $paths = [];
        foreach ($this->paths as $path) {
            $paths[] = ltrim($path, '/');
        }

        return array_merge([
            'tar',
            $arg,
            '-',
            '-C',
            '/',
        ], $paths);
    }
}
