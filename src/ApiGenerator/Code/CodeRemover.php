<?php

declare(strict_types=1);

namespace Kcs\K8s\ApiGenerator\Code;

use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use Symfony\Component\Console\Output\OutputInterface;

use function file_exists;
use function rmdir;
use function sprintf;
use function unlink;

readonly class CodeRemover
{
    use CodeDirectoriesTrait;

    public function removeCode(OutputInterface $output, CodeOptions $options): void
    {
        $directories = $this->getCodeDirectories($options);

        foreach ($directories as $dirPath) {
            if (! file_exists($dirPath)) {
                continue;
            }

            $output->writeln(sprintf(
                '<info>Deleting contents of directory: %s</info>',
                $dirPath,
            ));

            $dirIterator = new RecursiveIteratorIterator(
                new RecursiveDirectoryIterator($dirPath, RecursiveDirectoryIterator::SKIP_DOTS),
                RecursiveIteratorIterator::CHILD_FIRST,
            );

            foreach ($dirIterator as $file) {
                if ($file->isDir()) {
                    rmdir($file->getRealPath());
                } else {
                    unlink($file->getRealPath());
                }
            }
        }
    }
}
