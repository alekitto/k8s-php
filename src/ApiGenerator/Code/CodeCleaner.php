<?php

declare(strict_types=1);

namespace Kcs\K8s\ApiGenerator\Code;

use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Process\Process;

use function sprintf;

readonly class CodeCleaner
{
    use CodeDirectoriesTrait;

    public function cleanCode(CodeOptions $options, OutputInterface $output): void
    {
        $directories = $this->getCodeDirectories($options);

        foreach ($directories as $name => $dirPath) {
            $output->writeln(sprintf(
                '<info>Running php-cs-fixer on %s.</info>',
                $name,
            ));

            $commandProcess = new Process([
                'php',
                'vendor/bin/phpcbf',
                '--standard=Solido',
                $dirPath,
            ]);

            $commandProcess->setTimeout(null);
            $commandProcess->start();
            $commandProcess->wait();
        }
    }
}
